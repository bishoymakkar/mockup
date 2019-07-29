<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

private $session_data;

	function __construct(){
   		parent::__construct();
		$this->load->helper(['url']);
		$this->load->library(['session']);
		$this->load->database();
   		$this->load->library('parser');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->library('form_validation');
		//load the login model
   		$this->load->model('user_model','user_instance',TRUE);
   		$this->session_data = $this->session->userdata('mockup_logged_user_session');
        if ( $this->session_data ) redirect('room_types', 'refresh');
 	}

 	// login page
 	public function index()
 	{
 		$data['script'] = 'public/js/home.js';
 		$this->load->view('layouts/header');
 		$this->load->view('version/2/login');
 		$this->load->view('layouts/footer', $data);
 	}

 	// function index(){
 	// 	if ( $this->session_data )
		// {
		// 	$header = $this->parser->parse( 'header', array( 'logged_user_mail'=>$this->session_data[ 'email' ] ), TRUE );
		// }
		// else
		// {
		// 	$header = $this->parser->parse( 'header', array( 'logged_user_mail'=>'', 'logout_link'=>'' ), TRUE );
		// }
		// $data[ 'header' ] = $header;
		// $this->parser->parse( 'home_view', $data );
 	// }

 	public function login()
 	{

      	$email = $this->input->post('email');
 		$password = $this->input->post('password');
        
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		if ($this->form_validation->run() === TRUE)
		{
			$login = $this->user_instance->login($email, $password);

			if ($login)
			{
				foreach ($login as $row)
				{
					$data = array('id' => $row->id, 'email' => $row->email, 'firstame' => $row->firstname, 'lastname' => $row->lastname, 'img' => $row->img);
					$this->session->set_userdata('mockup_logged_user_session', $data);
				}
				redirect('room_types', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('errors', '<div class="alert alert-warning alert-dismissible fade show">'.'Incorrect email address and/or password.'.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}
		}
		else
		{
			$this->session->set_flashdata('errors', validation_errors('<div class="alert alert-danger">', '</div>'));
		}
		redirect('home');
 	}
 	public function loginpublic()
 	{		
 		$email = "moebel.de";
 		$password = "12345";
		
			$login = $this->user_instance->login($email, $password);

			if ($login)
			{
				foreach ($login as $row)
				{
					$data = array('id' => $row->id, 'email' => $row->email, 'firstame' => $row->firstname, 'lastname' => $row->lastname, 'img' => $row->img);
					$this->session->set_userdata('mockup_logged_user_session', $data);
				}
				redirect('room_types', 'refresh');
			}
		
		
	redirect('home');
 	}

 	// function login(){
 	// 	$email = $this->input->post( 'email' );
 	// 	$pass = $this->input->post( 'pass' );

 	// 	if ( trim( $email ) == "" )
 	// 		$resp =  "Please enter your E-mail address";
 	// 	else if ( trim( $pass ) == "" )
 	// 		$resp =  "Make sure you enter your password correctly";
 	// 	else
 	// 	{
 	// 		$resp = $this->user_instance->login( $email, $pass );
 	// 		if ( $resp )
 	// 		{
 	// 			foreach ($resp as $row) {
 	// 				$session_array = array( 'id'=>$row->id, 'email'=>$row->email, 'firstame'=>$row->firstname, 'lastname'=>$row->lastname, 'img'=>$row->img );
  //               	$this->session->set_userdata('mockup_logged_user_session', $session_array);
 	// 			}
  //               $resp = TRUE;
 	// 		} else $resp = FALSE;
 	// 	}
 	// 	echo $resp;
 	// }


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	// public function index()
	// {
 //   		if(isset($this->session) && $this->session->userdata('mockup_email') != '')
 //   		{
 //   			// echo "test";
 //   			$data = array('firstname' => $this->session->userdata('mockup_firstname'));
 //   			$this->load->view('home', $data);
 //   			if($this->session->userdata('mockup_logged_in') != '')
 //   			{
	// 			$this->session->unset_userdata('mockup_logged_in');
	// 			echo '<div class="alert alert-success text-center" role="alert">Successfully Logged in!</div>';
 //   			}
 //   		}
 //   		else
 //   		{
 //   			$header_data = array( 'header_title'=>'Select a price, size & type to receive furniture suggestions!' );
 //   			$header_html = $this->parser->parse( 'header', $header_data, TRUE );
 //   			$data[ 'header_html' ] = $header_html;
 //   			$this->parser->parse( 'home', $data );
 //   			// $this->load->view('home');
 //   		}
	// }

	// public function get_new_furniture()
	// {
	// 	$url_options = $this->input->post('url');
	// 	$url = "http://52.28.60.250:8080/MockupService/rest/suggestion?".$url_options;
	// 	$ch = curl_init();
	// 	curl_setopt($ch,CURLOPT_URL,$url);
	// 	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	// 	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 4);
	// 	$json = curl_exec($ch);
	// 	if(!$json) {
	// 	    echo curl_error($ch);
	// 	    // echo "test";
	// 	}
	// 	curl_close($ch);
	// 	echo $json;
	// }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
