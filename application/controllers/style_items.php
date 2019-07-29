<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Style_items extends CI_Controller
{

	private $session_data;

	function __construct()
	{
		parent::__construct();
		// LOAD URL HELPER FOR REDIRECTIONS ..
		$this->load->helper('url');
		// SESSIONING ..
		$this->load->library( 'session' );
		// PARSER LIBRARY ..
		$this->load->library('parser');
		// LOAD USER MODEL ..
		$this->load->model('user_model','user_instance',true);
		// INITIALIZE THE GLOBAL VARIABLE ..
		$this->session_data = $this->session->userdata('mockup_logged_user_session');
		$this->session_data['fullname'] = trim($this->session_data['firstame']).' '.trim($this->session_data['lastname']);
		// REDIRECT IF NOT LOGGED IN ..
		if ( !$this->session_data ) redirect( 'home', 'refresh' );

	}

	function index(){

	}


	function room_type_styles($room_type = NULL)
	{
		$room_type or show_error('Invalid id.');
		$data['fullname'] = $this->session_data['fullname'];
		$data['image'] = (file_exists(FCPATH.'public/img/'.$this->session_data['img']) && is_file(FCPATH.'public/img/'.$this->session_data['img'])) ? site_url('public/img/'.$this->session_data['img']) : site_url('public/img/'.'admin_no_img.png');
		$data['room_type_styles'] = $this->user_instance->get_room_type_styles($room_type);
 		$data['script'] = 'version/2/js/room_type_styles.js';
 		$this->load->view('layouts/header');
 		$this->load->view('version/2/room_type_styles_view', $data);
 		$this->load->view('layouts/footer');
	}

	// function room_type_styles($room_type){
	// 	// GET ALL USER STYLES ..
	// 	$styles = $this->user_instance->get_room_type_styles( $room_type );
	// 	$data[ 'styles' ] = $styles;
	// 	$data[ 'map_img' ] = $this->session_data[ 'img' ];
	// 	// HANDLE WHEN USER HAS NO STYLES ..
	// 	if ( count ( $styles ) == 0 ) $data[ 'handle' ] = "<h4 class='ttU'>You haven't added any styles yet</h4>";
	// 	else $data[ 'handle' ] = '';
	// 	// PARSE HEADER DATA WITH THE TEMPLATE ..
	// 	$header = $this->parser->parse( 'header', array( 'logged_user_mail'=>$this->session_data[ 'email' ], 'logout_link'=>'<a href="'.base_url().'floorplan/logout">LOGOUT</a>' ), TRUE );
	// 	$data[ 'header' ] = $header;
	// 	$this->parser->parse( 'style_items_view', $data );
	// }

}
