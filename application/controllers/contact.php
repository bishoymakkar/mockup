<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller
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
		// INITIALIZE THE GLOBAL VARIABLE ..
		$this->session_data = $this->session->userdata('mockup_logged_user_session');
	}

	function index(){
		// SHOW USER EMAIL AND A LINK TO LOGOUT IF HE'S LOGGED IN ..
		if ( $this->session_data )
		{
			$header = $this->parser->parse( 'header', array( 'logged_user_mail'=>$this->session_data[ 'email' ], 'logout_link'=>'<a href="'.base_url().'floorplan/logout">LOGOUT</a>' ), TRUE );
		}
		else
		{
			// OTHERWISE, HIDE IT ..
			$header = $this->parser->parse( 'header', array( 'logged_user_mail'=>'', 'logout_link'=>'' ), TRUE );
		}
		$data[ 'header' ] = $header;
		// PARSE THE ARRAY WITH THE VIEW ..
		$this->parser->parse( 'contact_view', $data );
	}

}