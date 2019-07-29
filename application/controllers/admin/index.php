<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {


function __construct(){
   		parent::__construct();
 		
   		$this->load->library('session');
   		$this->load->library('parser');

 		if(!$this->session->userdata('admin_mockup_logged_in'))
	 		redirect('admin/login');

	 	$this->load->model('admin/users_model' , 'user_instance' , TRUE);
	 	$this->load->model('admin/styles_model' , 'style_instance' , TRUE);
	 	$this->load->model('admin/configuration_model' , 'configuration_instance' , TRUE);
	 	$this->load->model('admin/layout_model' , 'layout_instance' , TRUE);
	 	$this->load->model('admin/objects_model' , 'object_instance' , TRUE);
	 	
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
		$data = $this->getCounts();
		$data['tab']="dash";
   		$this->parser->parse('admin/index' , $data);
	}
	public function getCounts()
	{
		$data['users'] = $this->user_instance->count();
		$data['styles'] = $this->style_instance->count();
		$data['configuration'] = $this->configuration_instance->count();
		$data['layouts'] = $this->layout_instance->count();
		$data['objects'] = $this->object_instance->count();

		return $data;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */