<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase extends CI_Controller
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
		// LOAD OBJECTS MODEL ..
		$this->load->model('admin/objects_model','object_instance',true);
		// LOAD CART MODEL ..
		$this->load->model('cart_model','cart_instance',true);
		// INITIALIZE THE GLOBAL VARIABLE ..
		$this->session_data = $this->session->userdata('mockup_logged_user_session');
		// REDIRECT IF NOT LOGGED IN ..
		if ( !$this->session_data ) redirect( 'home', 'refresh' );
	}

	function index(){
		// LOAD USER CART ITEMS ..
		$cart_info = $this->cart_instance->get_user_cart( $this->session_data[ 'id' ] );
		$cart_id = $cart_info[0][ 'cart_id' ];
		$cart_items = $this->cart_instance->get_cart_items( $cart_id );

		// CALCULATE THE TOTAL PRICE FOR EACH CART ITEM AND THE INDEX ..
		for ( $i = 0; $i < count( $cart_items ); $i++ ) 
		{
			$cart_items[ $i ][ 'total' ] = $cart_items[ $i ][ 'item_price' ] * $cart_items[ $i ][ 'item_qty' ];
			$cart_items[ $i ][ 'index' ] = ( $i + 1 );
		}

		$data[ 'cart_items' ] = $cart_items;
		// SAVE FIRST CART ITEM IMAGE AND NAME ..
		$data[ 'first_item_img' ] = $cart_items[0][ 'item_img' ];
		$data[ 'first_item_name' ] = $cart_items[0][ 'item_name' ];
		// LOAD USER FLOORPLAN ..
		$plan = $this->user_instance->get_user_plan( $this->session_data[ 'id' ] );
		$data[ 'user_floor_plan' ] = $plan[0][ 'img' ];
		$header = $this->parser->parse( 'header', array( 'logged_user_mail'=>$this->session_data[ 'email' ], 'logout_link'=>'<a href="'.base_url().'floorplan/logout">LOGOUT</a>' ), TRUE );
		
		$data[ 'header' ] = $header;
		$this->parser->parse( 'cart_view', $data );
	}

	// FUNCTION TO ADD AN ITEM TO CART ..
	function add_item_to_cart()
	{
		$id = $this->input->post( 'id' );
		// GET CART ID ..
		$cart_info = $this->cart_instance->get_user_cart( $this->session_data[ 'id' ] );
		if ( count( $cart_info ) == 0 )
		{
			// CREATE NEW CART FOR THIS USER ..
			$cart_id = $this->cart_instance->create_cart( $this->session_data[ 'id' ] );
		}
		else
		{
			// CART EXISTS, STORE IT'S ID ..
			$cart_id = $cart_info[0][ 'cart_id' ];	
		}
		
		// CHECK IF ITEM IS ALREADY ADDED ..
		$flag = $this->cart_instance->check_cart_item_exists( $cart_id, $id );
		if ( $flag == 1 ) 
		{
			$flag = "This item is already added to your cart";
			$html = "";
		}
		else
		{
			$flag = $this->cart_instance->add_item_to_cart( $cart_id, $id );
			// GET ITEM INFO ..
			$item_info = $this->object_instance->get_item_info( $id );
			foreach ($item_info[0] as $key => $value) {
				$data[ $key ] = $value;
			}
			// PARSE ITEM DATA WITH ITEM TEMPLATE ..
			$html = $this->parser->parse( 'cart_item_template', $data, TRUE );
		}
		// CREATE RESPONSE ARRAY ..
		$response = array( 'flag'=>$flag, 'html'=>$html );
		echo json_encode( $response );
	}

	// FUNCTION TO OBJECTS OF A GIVEN LAYOUT ..
	function get_layout_objects(){
		$layout_id = $this->input->post( 'layout_id' );
		$objects = $this->object_instance->get_layout_objects( $layout_id );
		$data[ 'objects' ] = $objects;
		// PARSE OBJECTS ARRAY WITH OBJECTS TEMPLATE ..
		$html = $this->parser->parse( 'layout_objects_template', $data, TRUE );
		// PARSE WITH MAP TEMPLATE ..
		$map_objects_html = $this->parser->parse( 'map_objects_html_template', $data, TRUE );
		// CREATE RESPONSE ARRAY ..
		$response = array( 'html'=>$html, 'objects'=>$objects, 'map_objects_html'=>$map_objects_html );
		echo json_encode( $response );
	}

	// FUNCTION TO REMOVE ITEM FROM CART ..
	function remove_cart_item()
	{
		$item_id = $this->input->post( 'item_id' );
		$cart_info = $this->cart_instance->get_user_cart( $this->session_data[ 'id' ] );
		$cart_id = $cart_info[0][ 'cart_id' ];
		$resp = $this->cart_instance->remove_cart_item( $cart_id, $item_id );
		echo $resp;
	}

	// FUNCTION TO UPDATE QUANTITY OF A GIVEN CART ITEM ..
	function update_cart_item(){
		$item_id = $this->input->post( 'item_id' );
		$qty = $this->input->post( 'qty' );
		$cart_info = $this->cart_instance->get_user_cart( $this->session_data[ 'id' ] );
		$cart_id = $cart_info[0][ 'cart_id' ];
		$resp = $this->cart_instance->update_cart_item( $cart_id, $item_id, $qty );
		echo $resp;
	}

	// FUNCTION TO FINALIZE PURCHASE ..
	function finalize_purchase(){
		$cart_info = $this->cart_instance->get_user_cart( $this->session_data[ 'id' ] );
		$cart_id = $cart_info[0][ 'cart_id' ];
		$cart_items = $this->cart_instance->get_cart_items( $cart_id );

		for ( $i = 0; $i < count( $cart_items ); $i++ ) 
		{
			$cart_items[ $i ][ 'total' ] = $cart_items[ $i ][ 'item_price' ] * $cart_items[ $i ][ 'item_qty' ];
			$cart_items[ $i ][ 'index' ] = ( $i + 1 );
		}

		$data[ 'cart_items' ] = $cart_items;
		$header = $this->parser->parse( 'header', array( 'logged_user_mail'=>$this->session_data[ 'email' ], 'logout_link'=>'<a href="'.base_url().'floorplan/logout">LOGOUT</a>' ), TRUE );
		
		$data[ 'header' ] = $header;
		$this->parser->parse( 'finalize_purchase', $data );
	}

}