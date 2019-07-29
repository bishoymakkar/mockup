<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {


	function __construct(){
   		parent::__construct();
   		// LOAD PARSER LIBRARY ..
   		$this->load->library('parser');
   		// LOAD SESSION LIBRARY ..
		$this->load->library('session');
		// LOAD FORM HELPER ..
		$this->load->helper('form');
		// LOAD URL HELPER ..
		$this->load->helper('url');
		// LOAD HTML HELPER ..
		$this->load->helper('html');
		// LOAD DATABASE ..
		$this->load->database();
		// LOAD FORM VALIDATION ..
		$this->load->library('form_validation');
		//load the login model
   		$this->load->model('user_model','user_instance',TRUE);

   		// IF USER IS NOT LOGGED IN, REDIRECT TO LOGIN PAGE ..
   		if(!isset($this->session) || (isset($this->session) && $this->session->userdata('mockup_email') == ''))
   		{
   			redirect('user/login');
   		}
 	}

	public function index()
	{
		$mockup_id = $this->session->userdata('mockup_id');
		// LOAD USER FURNITURE FROM THE DATABASE ..
		$furniture = $this->user_instance->get_user_furniture($mockup_id);
		$data = array('furniture'=>$furniture);
		$header_data = array( 'header_title'=>'Select a price, size & type to receive furniture suggestions!' );
		// PARSE HEADER INFORMATION WITH HEADER VIEW ..
		$header_html = $this->parser->parse( 'header', $header_data, TRUE );
		$data[ 'header_html' ] = $header_html;
		// PARSE DATA ARRAY WITH GALLERY VIEW ..
		$this->parser->parse( 'gallery', $data );
	}

	// SAVE FURNITURE INFORMATION IN THE DATABSAE ..
	public function save_furniture(){
		// POST URL SENT FROM CLIENT SIDE ..
		$url = $this->input->post("url");
		// POST IMAGE TOO ..
		$background_image = $this->input->post("background_image");
		// RETRIEVE MOCK UP ID FROM THE SESSION ..
		$mockup_id = $this->session->userdata('mockup_id');
		// SAVE IT ..
		return $this->user_instance->save_furniture($url, $background_image, $mockup_id);
	}

	// VIEW LOGIN PAGE ..
	public function login()
	{
		$this->session->set_userdata('last_page', 'login');
		$this->load->view('login');
	}

	// VERIFY USER LOGIN CREDENTIALS ..
	public function verify_login()
	{
		//get the posted values
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		//set validations
		$this->form_validation->set_rules("email", "Username", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");

		if ($this->form_validation->run() == FALSE)
		{
		   //validation fails
			$last_page = $this->session->userdata('last_page');
			$data['action'] = 'login';
		    $this->load->view('login', $data);
		}
		else
		{
	        $usr_result = $this->user_instance->verify_login($email, $password);
	        if ($usr_result->num_rows() > 0) //active user record is present
	        {
	             //set the session variables
	             $sessiondata = array(
	                  'mockup_firstname' => $usr_result->row()->firstname,
	                  'mockup_email' => $email,
	                  'mockup_loginuser' => TRUE,
	                  'mockup_logged_in' => TRUE
	             );
	             $this->session->set_userdata($sessiondata);
				$data['action'] = 'refresh';
				$last_page = $this->session->userdata('last_page');
			    // $this->load->view('home', $data);
			    redirect('home');
	        }
	        else
	        {
	        	// USER NOT FOUND IN THE DATABASE, REDIRECT TO LOGIN PAGE AGAIN ..
	            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid email and password!</div>');
				$last_page = $this->session->userdata('last_page');
				$data['action'] = 'login';
			    $this->load->view('login', $data);
	        }
		}
	}

	// VIEW REGISTRATION PAGE ..
	function register(){
		$this->load->view('register');
	}

	// SAVE NEW USER INFORMATION IN THE DATABASE ..
	function register_user(){
		//get the posted values
		$email = $this->input->post("email");
		$firstname = $this->input->post("firstname");
		$lastname = $this->input->post("lastname");
		$password = $this->input->post("password");

		//set validations
		$this->form_validation->set_rules("password", "Password", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required");
		$this->form_validation->set_rules("firstname", "First Name", "trim|required");
		$this->form_validation->set_rules("lastname", "Last Name", "trim|required");

		if ($this->form_validation->run() == FALSE)
		{
		   //validation fails
			$last_page = $this->session->userdata('last_page');
			$data['action'] = 'register';
		    $this->load->view('register', $data);
		}
		else
		{
			$user_array = array(
				'email' => $email, 
				'firstname' => $firstname, 
				'lastname' => $lastname, 
				'password' => md5($password), 
			);
		  	$this->user_instance->register($user_array);
			$last_page = $this->session->userdata('last_page');
			$data['action'] = 'none';
		    $this->load->view('login', $data);
			echo '<div class="alert alert-success text-center" role="alert">Successfully registered!</div>';
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */