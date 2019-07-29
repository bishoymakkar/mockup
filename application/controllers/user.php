<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {


	function __construct(){
   		parent::__construct();
   		$this->load->library('parser');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		//load the login model
   		$this->load->model('user_model','user_instance',TRUE);

   		if(isset($this->session) && $this->session->userdata('mockup_email') != '')
   		{
   			redirect('home');
   			// echo "test";
   			// echo $this->session->userdata('mockup_email');
   		}
 	}

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
	public function index()
	{
		// $this->load->view('home');
	}

	public function login()
	{
		$this->session->set_userdata('last_page', 'login');
		$header_data = array( 'header_title'=>'Select a price, size & type to receive furniture suggestions!' );
		$header_html = $this->parser->parse( 'header', $header_data, TRUE );
		$data[ 'header_html' ] = $header_html;
		$this->parser->parse( 'login', $data );
		// $this->load->view('login');
	}

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
	                  'mockup_id' => $usr_result->row()->id,
	                  'mockup_loginuser' => TRUE,
	                  'mockup_logged_in' => TRUE
	             );
	             $this->session->set_userdata( 'mockup_logged_user_session', $sessiondata );
				$data['action'] = 'refresh';
				$last_page = $this->session->userdata('last_page');
			    // $this->load->view('home', $data);
			    redirect('home');
	        }
	        else
	        {
	            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid email and password!</div>');
				$last_page = $this->session->userdata('last_page');
				$data['action'] = 'login';
			    $this->load->view('login', $data);
	        }
		}
	}

	function register(){
		$header_data = array( 'header_title'=>'Select a price, size & type to receive furniture suggestions!' );
		$header_html = $this->parser->parse( 'header', $header_data, TRUE );
		$data[ 'header_html' ] = $header_html;
		$this->parser->parse( 'register', $data );
		// $this->load->view('register');
	}

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
			if($this->user_instance->check_email($email))
			{
			    $this->load->view('register');
				echo '<div class="alert alert-warning text-center" role="alert">Email Already Registered!</div>';
			}
			else
			{
				$user_array = array(
					'email' => $email,
					'firstname' => $firstname,
					'lastname' => $lastname,
					'password' => $password,
				);
			  	$this->user_instance->register($user_array);
				$last_page = $this->session->userdata('last_page');
				$data['action'] = 'none';
			    $this->load->view('login', $data);
				echo '<div class="alert alert-success text-center" role="alert">Successfully registered!</div>';
			}
		}
	}

	public function logoutpublic()
 	{
 		$this->session->unset_userdata('mockup_logged_user_session');
        redirect('home/login');
 	}
    public function logout()
 	{
 		$this->session->unset_userdata('mockup_logged_user_session');
        redirect('home/loginpublic');
 	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
