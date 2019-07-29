<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blueprints extends CI_Controller {


function __construct(){
   		parent::__construct();

   		$this->load->helper(array('form','url'));
   		$this->load->library('session');
   		$this->load->library('parser');

   		$this->load->model('admin/Blueprint_model' , 'blueprint_instance' , TRUE);

 		if(!$this->session->userdata('admin_mockup_logged_in'))
	 		redirect('admin/Login');
 	}

 	// Manage Designs
	public function index()
	{
   		$this->load->view('admin/manage-blueprints');
	}
	public function uploadPicture()
	{
		
		$DIR = getcwd()."/public/img/designs/";

		if (!empty($_FILES["fileupload"])) {
		    $myFile = $_FILES["fileupload"];

		    if ($myFile["error"] !== UPLOAD_ERR_OK) {
		        echo "An error occurred.";
		        exit;
		    }

		    // ensure a safe filename
		    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

		    // don't overwrite an existing file
		    $i = 0;
		    $parts = pathinfo($name);
		    while (file_exists($DIR . $name)) {
		        $i++;
		        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
		    }

		    // preserve file from temporary directory
		    $success = move_uploaded_file($myFile["tmp_name"], $DIR . $name);
		    if (!$success) { 
		        echo "Unable to save file.";
		        exit;
		    }

		    // set proper permissions on the new file
		    chmod($DIR . $name, 0644);

		    echo $name;
		}
	}
	public function createBlueprint()
	{
		$title = $this->input->post('title');
		$img = $this->input->post('post_image');
		$user_id = $this->input->post('user');

		$id = $this->blueprint_instance->createBlueprint( $title , $img , $user_id );

		redirect("admin/blueprints/createNewStyle/$id");
	}
	public function createNewStyle($id)
	{	

		$data = $this->blueprint_instance->getSingleBlueprint($id);
		$this->parser->parse('admin/create-style' , $data[0]);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */