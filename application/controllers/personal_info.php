<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personal_info extends CI_Controller
{

  // GLOBAL VARIABLE TO HOLD SESSION INFO ..
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
    // REDIRECT TO HOME PAGE IF NOT LOGGED IN ..
    if ( !$this->session_data ) redirect( 'home', 'refresh' );
  }

  function index()
  {
    if ( $this->session_data )
    {
        $header = $this->parser->parse( 'header', array( 'logged_user_mail'=>$this->session_data[ 'email' ] ), TRUE );
    }
    else
    {
        $header = $this->parser->parse( 'header', array( 'logged_user_mail'=>'' ), TRUE );
    }
    $data[ 'header' ] = $header;
    $this->parser->parse( 'personal_info_view', $data);
  }
}
