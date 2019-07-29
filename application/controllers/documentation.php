<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documentation extends CI_Controller
{

	function index(){
		$this->load->view( 'documentation' );
	}

}