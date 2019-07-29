<?php session_start(); if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Floorplan extends CI_Controller
{

	private $session_data;

	function __construct()
	{
		parent::__construct();
		// LOAD URL HELPER FOR REDIRECTIONS ..
		$this->load->helper('url');
		// PARSER LIBRARY ..
		$this->load->library('parser');
		// SESSIONING ..
		$this->load->library( 'session' );
		// LOAD USER MODEL ..
		$this->load->model('user_model','user_instance',true);
		// LOAD CART MODEL ..
		$this->load->model('cart_model','cart_instance',true);
		// LOAD OBJECTS MODEL ..
		$this->load->model('admin/objects_model','object_instance',true);
		// LOAD CONFIGURATION MODEL ..
		$this->load->model('admin/configuration_model','configuration_instance',true);
		// LOAD STYLES MODEL ..
		$this->load->model('admin/styles_model','styles_instance',true);
		// INITIALIZE THE GLOBAL VARIABLE ..
		$this->session_data = $this->session->userdata('mockup_logged_user_session');
		// REDIRECT TO HOME PAGE IF NOT LOGGED IN ..
		if ( !$this->session_data ) redirect( 'home', 'refresh' );
	}

	// function index(){
	// 	// LOAD USER FLOORPLAN ..
	// 	$plan = $this->user_instance->get_user_plan( $this->session_data[ 'id' ] );
	// 	// STORE PLAN IMAGE IN 'user_floor_plan' INDEX ..
	// 	$data[ 'user_floor_plan' ] = $plan[0][ 'img' ];
	// 	// LOAD USER CART ITEMS ..
	// 	$cart_info = $this->cart_instance->get_user_cart( $this->session_data[ 'id' ] );
	// 	// HANDLE IF USER CART IS EMPTY ..
	// 	if ( count( $cart_info ) > 0 )
	// 	{
	// 		$cart_id = $cart_info[0][ 'cart_id' ];
	// 		// GET CART ITEMS BY CART ID ..
	// 		$cart_items = $this->cart_instance->get_cart_items( $cart_id );
	// 		$data[ 'cart_items' ] = $cart_items;
	// 	}
	// 	else
	// 	{
	// 		// RETURN AN EMPTY ARRAY IF CART IS EMPTY ..
	// 		$data[ 'cart_items' ] = array();
	// 	}

	// 	// INITIALIZE HEADER DATA AND PARSE IT WITH HEADER TEMPLATE ..
	// 	$header = $this->parser->parse( 'header', array( 'logged_user_mail'=>$this->session_data[ 'email' ], 'logout_link'=>'<a href="'.base_url().'floorplan/logout">LOGOUT</a>' ), TRUE );
	// 	$data[ 'header' ] = $header;
	// 	// PARSE DATA ARRAY WITH FLOORPLAN VIEW ..
	// 	$this->parser->parse( 'floorplan_view', $data );
	// }

	// FUNCTION TO VIEW SINGLE PRODUCT ..
	function product(){
		$id = $this->input->post( 'id' );
		// GET PRODUCT INFO BY ID ..
		$prod_info = $this->object_instance->get_product_info( $id );
		// GET PRODUCT IMAGES ..
		$prod_images = $this->object_instance->get_product_images( $id );
		// SAVE INFO IN AN ARRAY ..
		foreach ($prod_info[0] as $key => $value) {
			$data[ $key ] = $value;
		}
		// SAVE IMAGES IN SAME ARRAY ..
		$data[ 'prod_images' ] = $prod_images;
		// PARSE DATA WITH SINGLE PRODUCT TEMPLATE ..
		$html = $this->parser->parse( 'product_inner_template', $data, TRUE );
		// CREATE RESPONSE ARRAY ..
		$response = array( 'html'=>$html, 'dataVal'=>$data );
		echo json_encode( $response );
	}

	// FUNCTION TO VIEW CONFIGURATION LAYOUTS ..
	function configuration_layouts( $conf_id )
	{
		// GET CONFIGURATION INFO ..
		$conf_info = $this->configuration_instance->get_config_info( $conf_id );
		$data[ 'conf_title' ] = $conf_info[0][ 'title' ];
		$data[ 'conf_img' ] = $conf_info[0][ 'img' ];
		// LOAD CONFIGURATION LAYOUTS ..
		$conf_layouts = $this->configuration_instance->get_configuration_areas( $conf_id );
		// HANDLE IF THIS CONFIGURATION HAS NO LAYOUTS ..
		if ( count ( $conf_layouts ) == 0 ) $data[ 'handle' ] = '<h4 class="ttU">This configuration has no layouts</h4>';
		else $data[ 'handle' ] = '';
		// LOOP ON LAYOUTS AND SET A COUNTER INDEX FOR EVERY LAYOUT ..
		for ( $i = 0; $i < count( $conf_layouts ); $i++ ) $conf_layouts[ $i ][ 'layout_count' ] = ( $i + 1 );
		$data[ 'layouts' ] = $conf_layouts;

		if ( count( $conf_layouts ) == 0 )
		{
			// IF THERE IS NO LAYOUTS, REDIRECT TO 'layouts' FUNCTION ..
			$this->layouts( -1 );
		}
		else{
			// OTHERWISE, CALL 'layouts' WITH THE CONFIGURATION AREA ID AS A PARAMETER ..
			redirect( 'floorplan/layouts/'.$conf_layouts[0][ 'id' ], 'refresh' );
		}
	}

	function layouts($config_area_id = NULL)
	{
		if ( $config_area_id == -1 )
		{
			$data[ 'msg' ] = 'Unable to retrieve data, please contact website adminstrator';
			$data[ 'layouts' ] = array();
			$data[ 'layouts_handle' ] = '';
			$data[ 'areas' ] = array();
			$data[ 'conf_img_disp' ] = 'dN';
			$data[ 'preload_disp' ] = 'dN';
			$data[ 'big_img' ] = '';
		}
		else
		{
			// LOAD CONFIG AREA OBJECTS ..
			$area_layouts = $this->configuration_instance->get_area_layouts( $config_area_id );
			if ( count( $area_layouts ) == 0 )
			{
				$data[ 'layouts_handle' ] = '<h4 class="text-muted taC marTop0" style="padding: 0px 13px; text-align: left;"><span class="fa fa-close"></span>&nbsp;&nbsp;NO LAYOUTS AVAILABLE</h4>';
				$data[ 'layouts' ] = array();
				$data[ 'big_img' ] = '';
			}
			else
			{
				// $data[ 'big_img' ] = '<img class="big-img" src="'.base_url().'public/img/gif_preloader.gif">';
				$data[ 'big_img' ] = '<img class="big-img" src="'.base_url().'public/img/no-image.jpg">';
				$data[ 'layouts' ] = $area_layouts;
				$data[ 'layouts_handle' ] = '';
			}

			// GET AREA CONF ID ..
			$conf_info = $this->configuration_instance->get_area_info( $config_area_id );
			$conf_id = $conf_info[0][ 'conf_id' ];
			// GET CONFIGURATION INFO ..
			$configuration = $this->configuration_instance->get_config_info( $conf_id );
			// GET CONFIGURATION AREAS ..
			$conf_layouts = $this->configuration_instance->get_configuration_areas( $conf_id );
			// HANDLE IF NO LAYOUTS FOR THIS CONFIGURATION ..
			if ( count ( $conf_layouts ) == 0 ) $data[ 'handle' ] = '<h4 class="ttU">This configuration has no layouts</h4>';
			else $data[ 'handle' ] = '';

			// SELECT THE LAYOUT WITH AN ID EQUALT TO THE PASSED CONFIGURATION AREA ID ..
			for ( $i = 0; $i < count( $conf_layouts ); $i++ )
			{
				$conf_layouts[ $i ][ 'layout_count' ] = ( $i + 1 );
				if ( $conf_layouts[ $i ][ 'id' ] == $config_area_id ) $conf_layouts[ $i ][ 'class' ] = 'selected-area';
				else $conf_layouts[ $i ][ 'class' ] = '';
			}
			$data[ 'areas' ] = $conf_layouts;
			$data[ 'configuration_id' ] = $conf_id;
			// LOAD USER CART ITEMS ..
			$cart_info = $this->cart_instance->get_user_cart( $this->session_data[ 'id' ] );
			// HANDLE WHEN CART IS EMPTY ..
			if ( count( $cart_info ) > 0 )
			{
				$cart_id = $cart_info[0][ 'cart_id' ];
				$cart_items = $this->cart_instance->get_cart_items( $cart_id );
				$data[ 'cart_items' ] = $cart_items;
			}
			else
			{
				$data[ 'cart_items' ] = array();
			}
			$plan = $this->user_instance->get_user_plan( $this->session_data[ 'id' ] );
			if (!empty($plan)) 
			{
				$data['user_floor_plan'] = $plan[0][ 'img' ];
			}
			if (!empty($configuration)) 
			{
				$data['conf_img'] = $configuration[0][ 'img' ];
			}
			$data[ 'conf_img_disp' ] = '';
			$data[ 'preload_disp' ] = '';
			$data[ 'msg' ] = '';
		}
		// echo "<pre>";var_dump($data);die;
		$data['script'] = 'version/2/js/floorplan_layouts.js';
		$this->load->view('layouts/header');
		$this->load->view('version/2/floorplan_layouts_view', $data);
		$this->load->view('layouts/footer');
	}

	// FUNCTION TO VIEW LAYOUTS OF A CONFIGURATION ..
	// function layouts( $config_area_id ){
	// 	if ( $config_area_id == -1 )
	// 	{
	// 		$data[ 'msg' ] = 'Unable to retrieve data, please contact website adminstrator';
	// 		$data[ 'layouts' ] = array();
	// 		$data[ 'layouts_handle' ] = '';
	// 		$data[ 'areas' ] = array();
	// 		$data[ 'conf_img_disp' ] = 'dN';
	// 		$data[ 'preload_disp' ] = 'dN';
	// 		$data[ 'big_img' ] = '';
	// 	}
	// 	else
	// 	{
	// 		// LOAD CONFIG AREA OBJECTS ..
	// 		$area_layouts = $this->configuration_instance->get_area_layouts( $config_area_id );
	// 		if ( count( $area_layouts ) == 0 )
	// 		{
	// 			$data[ 'layouts_handle' ] = '<h4 class="text-muted taC marTop0" style="padding: 0px 13px; text-align: left;"><span class="fa fa-close"></span>&nbsp;&nbsp;NO LAYOUTS AVAILABLE</h4>';
	// 			$data[ 'layouts' ] = array();
	// 			$data[ 'big_img' ] = '';
	// 		}
	// 		else
	// 		{
	// 			// $data[ 'big_img' ] = '<img class="big-img" src="'.base_url().'public/img/gif_preloader.gif">';
	// 			$data[ 'big_img' ] = '<img class="big-img" src="'.base_url().'public/img/no-image.jpg">';
	// 			$data[ 'layouts' ] = $area_layouts;
	// 			$data[ 'layouts_handle' ] = '';
	// 		}

	// 		// GET AREA CONF ID ..
	// 		$conf_info = $this->configuration_instance->get_area_info( $config_area_id );
	// 		$conf_id = $conf_info[0][ 'conf_id' ];
	// 		// GET CONFIGURATION INFO ..
	// 		$configuration = $this->configuration_instance->get_config_info( $conf_id );
	// 		// GET CONFIGURATION AREAS ..
	// 		$conf_layouts = $this->configuration_instance->get_configuration_areas( $conf_id );
	// 		// HANDLE IF NO LAYOUTS FOR THIS CONFIGURATION ..
	// 		if ( count ( $conf_layouts ) == 0 ) $data[ 'handle' ] = '<h4 class="ttU">This configuration has no layouts</h4>';
	// 		else $data[ 'handle' ] = '';

	// 		// SELECT THE LAYOUT WITH AN ID EQUALT TO THE PASSED CONFIGURATION AREA ID ..
	// 		for ( $i = 0; $i < count( $conf_layouts ); $i++ )
	// 		{
	// 			$conf_layouts[ $i ][ 'layout_count' ] = ( $i + 1 );
	// 			if ( $conf_layouts[ $i ][ 'id' ] == $config_area_id ) $conf_layouts[ $i ][ 'class' ] = 'selected-area';
	// 			else $conf_layouts[ $i ][ 'class' ] = '';
	// 		}
	// 		$data[ 'areas' ] = $conf_layouts;
	// 		$data[ 'configuration_id' ] = $conf_id;
	// 		// LOAD USER CART ITEMS ..
	// 		$cart_info = $this->cart_instance->get_user_cart( $this->session_data[ 'id' ] );
	// 		// HANDLE WHEN CART IS EMPTY ..
	// 		if ( count( $cart_info ) > 0 )
	// 		{
	// 			$cart_id = $cart_info[0][ 'cart_id' ];
	// 			$cart_items = $this->cart_instance->get_cart_items( $cart_id );
	// 			$data[ 'cart_items' ] = $cart_items;
	// 		}
	// 		else
	// 		{
	// 			$data[ 'cart_items' ] = array();
	// 		}
	// 		$plan = $this->user_instance->get_user_plan( $this->session_data[ 'id' ] );
	// 		$data[ 'user_floor_plan' ] = $plan[0][ 'img' ];
	// 		$data[ 'conf_img' ] = $configuration[0][ 'img' ];
	// 		$data[ 'conf_img_disp' ] = '';
	// 		$data[ 'preload_disp' ] = '';
	// 		$data[ 'msg' ] = '';
	// 	}
	// 	$header = $this->parser->parse( 'header', array( 'logged_user_mail'=>$this->session_data[ 'email' ], 'logout_link'=>'<a href="'.base_url().'floorplan/logout">LOGOUT</a>' ), TRUE );

	// 	$data[ 'header' ] = $header;
	// 	$this->parser->parse( 'floorplan_layouts_view', $data );
	// }

	function style_configurations($style_id = NULL)
	{
		$style_id or show_error('Invalid id.');
		// $style_id = $this->input->post('id');
		$data['style_configs'] = $this->configuration_instance->get_style_confs($style_id);
		$style_info = $this->styles_instance->get_style_info($style_id);
		$data['style_title'] = $style_info[0][ 'title' ];
		// LOAD USER CART ITEMS ..
		$cart_info = $this->cart_instance->get_user_cart($this->session_data['id']);
		// HANDLE WHEN CART IS EMPTY ..
		$data['cart_items'] = array();
		if (count($cart_info) > 0)
		{
			$cart_id = $cart_info[0]['cart_id'];
			$cart_items = $this->cart_instance->get_cart_items($cart_id);
			$data['cart_items'] = $cart_items;
		}
		$data['script'] = 'version/2/js/style_configs.js';
		$this->load->view('layouts/header');
		$this->load->view('version/2/style_configs_view', $data);
		$this->load->view('layouts/footer');
	}

	// FUNCTION TO VIEW ALL CONFIGURATIONS OF A GIVEN STYLE ..
	// function style_configurations( $style_id )
	// {
	// 	// GET CONFIGURATION ..
	// 	$confs = $this->configuration_instance->get_style_confs( $style_id );
	// 	if ( count( $confs ) == 1 )
	// 	{
	// 		// IF ONLY 1 CONFIGURATION IS FOUND, SELECT IT AND REDIRECT TO VIEW IT'S LAYOUTS ..
	// 		redirect( 'floorplan/configuration_layouts/'.$confs[0][ 'configuration_id' ] );
	// 	}
	// 	else
	// 	{
	// 		$data[ 'confs' ] = $confs;
	// 		// HANDLE IF NO CINFIGURATIONS FOUND FOR THIS STYLE ..
	// 		if ( count( $confs ) == 0 ) $data[ 'handle' ] = '<h4 class="ttU no-configration">You have no configurations yet</h4>';
	// 		else $data[ 'handle' ] = '';
	// 		// GET STYLE INFO ..
	// 		$style_info = $this->styles_instance->get_style_info( $style_id );
	// 		$data[ 'style_title' ] = $style_info[0][ 'title' ];
	// 		// LOAD USER CART ITEMS ..
	// 		$cart_info = $this->cart_instance->get_user_cart( $this->session_data[ 'id' ] );
	// 		// HANDLE WHEN CART IS EMPTY ..
	// 		if ( count( $cart_info ) > 0 ){
	// 			$cart_id = $cart_info[0][ 'cart_id' ];
	// 			$cart_items = $this->cart_instance->get_cart_items( $cart_id );
	// 			$data[ 'cart_items' ] = $cart_items;
	// 		}
	// 		else{
	// 			$data[ 'cart_items' ] = array();
	// 		}
	// 		$header = $this->parser->parse( 'header', array( 'logged_user_mail'=>$this->session_data[ 'email' ], 'logout_link'=>'<a href="'.base_url().'floorplan/logout">LOGOUT</a>' ), TRUE );

	// 		$data[ 'header' ] = $header;
	// 		$this->parser->parse( 'style_confs_view', $data );
	// 	}
	// }

	// FUNCTION TO LOGOUT USERS AND REDIRECT TO HOME PAGE ..
	function logout()
 	{
 		$this->session->unset_userdata('mockup_logged_user_session');
        redirect('home', 'refresh');
 	}

}
