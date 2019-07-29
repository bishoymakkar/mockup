<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Room_types extends CI_Controller {


function __construct(){
   		
   		parent::__construct();

		$this->load->library('session');

 		if(!$this->session->userdata('admin_mockup_logged_in'))
	 		redirect('admin/login');

	 	$this->load->library('parser');

	 	$this->load->model('admin/room_types_model' , 'room_type_instance' , TRUE);
	 	$this->load->model('admin/users_model' , 'user_instance' , TRUE);
 	}

 	public function index()
	{
		$data['tab']="room_types";
		// $data['users'] = $this->user_instance->getUsers();
		$data['room_types'] = $this->room_type_instance->get_all_room_types();
   		$this->parser->parse('admin/manage-room-types' , $data);
	}
	public function ofUser($id)
	{
		$temptemp = $this->user_instance->getSingleUser($id);
		$temp = $temptemp[0];
		$data['username'] = $temp->firstname." ".$temp->lastname;
		$data['userid'] = $temp->id;
		$data['room_types'] = $this->room_type_instance->getRoomTypesOfUser($id);
		if($data['room_types']==false)
			$data['empty']=TRUE;
   		$this->parser->parse('admin/children-room-types' , $data);
	}

	function assign_user_room_type(){
		$user_id = $this->input->post( 'user_id' );
		$room_type = $this->input->post( 'room_type' );
		$resp = $this->room_type_instance->assign_user_room_type( $user_id, $room_type );
		echo $resp;
	}

	function add_user_room_type( $user_id )
	{
		$all_room_types = $this->room_type_instance->get_all_room_types();
		$data[ 'tab' ] = "room_types";
		$data[ 'room_types' ] = $all_room_types;
		$data[ 'user_id' ] = $user_id;
		$this->parser->parse( 'admin/add_user_room_type', $data );
	}

	function view_create_room_type()
	{
		$data['users'] = $this->user_instance->getUsers();
		$this->parser->parse( 'admin/create-room-type', $data );
	}

	function create_room_types()
	{
		$data = $this->input->post();
		$title = $data[ 'title' ];
		$image = $this->verifyImage();
		$this->room_type_instance->createRoomType($title, $image);
		$this->session->set_flashdata('info','Successfully Created Room Type!');
        redirect('admin/room_types/');

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
		'upload_path' => "./public/img/room_types/",
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
		$data['tab']="room_types";
		if(!isset($id))
			redirect('admin/room_types/');

		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[49]');
		
        if ($this->form_validation->run() == TRUE)
		{
			$tempold = $this->room_type_instance->getSingleRoomType($id); 
			$old = $tempold[0];
			$data = $this->input->post();

			$title = $data['title'];

			$image = $this->verifyImage();
			if($image == FALSE)
				$image = $old->image;

			$this->room_type_instance->updateRoomType($id, $title, $image);
            
            redirect('admin/room_types/');
		}
		else
		{
			$data['room_types'] = $this->room_type_instance->getSingleRoomType($id);
			$this->parser->parse('admin/edit-room-type' , $data);
		}
	}
	public function delete($id)
	{
		$this->room_type_instance->deleteRoomType($id);
		$this->session->set_flashdata('info','Room Type '.$id.' Deleted!');
		redirect('admin/room_types/');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */