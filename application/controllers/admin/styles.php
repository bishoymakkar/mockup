<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Styles extends CI_Controller {


function __construct(){
   		
   		parent::__construct();

		$this->load->library('session');

 		if(!$this->session->userdata('admin_mockup_logged_in'))
	 		redirect('admin/login');

	 	$this->load->library('parser');

	 	$this->load->model('admin/styles_model' , 'style_instance' , TRUE);
	 	$this->load->model('admin/room_types_model' , 'room_type_instance' , TRUE);
 	}

 	public function index()
	{
		$data['tab']="styles";
		// $data['room_types'] = $this->room_type_instance->getUsers();
		$data['styles'] = $this->style_instance->get_all_styles();
   		$this->parser->parse('admin/manage-styles' , $data);
	}
	public function ofRoomTypes($id)
	{
		$temptemp = $this->room_type_instance->getSingleRoomType($id);
		$temp = $temptemp[0];
		$data['room_type_id'] = $temp->id;
		$data['room_type_title'] = $temp->title;
		$data['styles'] = $this->style_instance->getStylesOfRoomType($id);
		if($data['styles']==false)
			$data['empty']=TRUE;
   		$this->parser->parse('admin/children-styles' , $data);
	}

	function assign_room_type_style(){
		$room_type_id = $this->input->post( 'room_type_id' );
		$style_id = $this->input->post( 'style_id' );
		$resp = $this->style_instance->assign_room_type_style( $room_type_id, $style_id );
		echo $resp;
	}

	function add_room_type_style( $room_type_id )
	{
		$all_styles = $this->style_instance->get_all_styles();
		$data[ 'tab' ] = "styles";
		$data[ 'styles' ] = $all_styles;
		$data[ 'room_type_id' ] = $room_type_id;
		$this->parser->parse( 'admin/add_room_type_style', $data );
	}

	function view_create_style()
	{
		$this->load->view( 'admin/create-style' );
	}

	function create_style()
	{
		$data = $this->input->post();
		$title = $data[ 'title' ];
		$description = $data[ 'description' ];
		$image = $this->verifyImage();
		$this->style_instance->createStyle($title, $description, $image);
		$this->session->set_flashdata('info','Successfully Created Style!');
        redirect('admin/styles/');

	}

	// public function create($id = false)
	// {	
	// 	//Check if has explicit parent
	// 	if($id!=false)
	// 		$data['parent_id'] = $id;

	// 	//Check if No Parents at all
	// 	$this->checkIfNoUsers();

	// 	//Check Image
	// 	$image = $this->verifyImage();

	// 	echo intval( $this->validateForm() )

	// 	// if($this->validateForm())
	// 	// {

	// 	// 	//Return if Form Validated Without Image
	// 	// 	if(!$image){
	// 	// 		$this->session->set_flashdata('img','An Image is Required');		
	// 	// 		$this->parser->parse('admin/create-style' , $data);	
	// 	// 		return;
	// 	// 	}

	// 	// 	//Take User Data
	// 	// 	$data = $this->input->post();
	// 	// 	$title = $data['title'];
	// 	// 	$description = $data[ 'description' ];
	// 	// 	// $user_id = $data['user_id'];
	// 	// 	if($id!=FALSE)
	// 	// 		// $user_id = $id; 

	// 	// 	//Insert Record
	// 	// 	$this->style_instance->createStyle($title, $description, $image);
	// 	// 	$this->session->set_flashdata('info','Successfully Created Style!');
 //  //           redirect('admin/styles/');
	// 	// }
	// 	// else
	// 	// {
	// 	// 	//Check if image is uploaded When Form Validation Failed
	// 	// 	if(!$image)
	// 	// 		$this->session->set_flashdata('img','An Image is Required');		

	// 	// 	// //Return to View
 //  //  //   		// $data['users'] = $this->user_instance->getUsers();
	//  //  //  		// $this->parser->parse('admin/create-style' , $data);
	//  //   		$this->load->view( 'admin/create-style' );
	// 	// }

	// 	// echo $this->validateForm();


	// }
	function checkIfNoUsers()
	{
		$data['users'] = $this->user_instance->getUsers();
		if(!$data['users']==true)
   		{
			$this->session->set_flashdata('error', 'There are no Users to Create Styles Under');
			redirect('admin/styles');
		}
	}
	function verifyImage()
	{
		$config = array(
		'upload_path' => "./public/img/styles/",
		'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'max_size' => "2048000"
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
		$temp = $this->upload->data();
		return $temp['file_name'];
		}
		else
			return false;
	}
	function validateForm()
	{
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[49]');
		// $this->form_validation->set_rules('user_id', 'User', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        	return false;
        else
			return true;    		
	}
	public function edit($id)
	{
		$data['tab']="styles";
		if(!isset($id))
			redirect('admin/styles/');

		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[49]');
		
        if ($this->form_validation->run() == TRUE)
		{
			$tempold = $this->style_instance->getSingleStyle($id); 
			$old = $tempold[0];
			$data = $this->input->post();

			$title = $data['title'];

			$image = $this->verifyImage();
			if($image == FALSE)
				$image = $old->img;

			$this->style_instance->updateStyle($id, $title, $image);
            
            redirect('admin/styles/');
		}
		else
		{
			$data['style'] = $this->style_instance->getSingleStyle($id);
			$data['users'] = $this->user_instance->getUsers();
			$this->parser->parse('admin/edit-styles' , $data);
		}
	}
	public function delete($id)
	{
		$this->style_instance->deleteStyle($id);
		$this->session->set_flashdata('info','Style '.$id.' Deleted!');
		redirect('admin/styles/');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */