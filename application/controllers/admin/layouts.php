<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layouts extends CI_Controller {


function __construct(){
   		
   		parent::__construct();
       
        $this->load->library('parser');
		$this->load->library('session');

 		if(!$this->session->userdata('admin_mockup_logged_in'))
	 		redirect('admin/login');

	 	$this->load->library('parser');
	 	$this->load->model('admin/layout_model','layout_instance',true);
		$this->load->model('admin/configuration_model','configuration_instance',true);
 	}

 	public function index()
	{
		$data['tab']="layouts";
		$data['layout'] =$this->layout_instance->getAll();
		$this->parser->parse('admin/manage-layouts',$data);
	}

	function view_area_layouts( $id )
	{
		$layouts = $this->layout_instance->get_area_layouts( $id );
		$area_info = $this->layout_instance->get_area_info( $id );
		$alllayouts = $this->layout_instance->getAll();
		$data[ 'alllayouts' ] = $alllayouts;
		$data[ 'area_title' ] = $area_info[0][ 'title' ];
		$data[ 'layout' ] = $layouts;
		$data[ 'tab' ] = "layouts";
		$data[ 'area_id' ] = $id;
		$this->parser->parse( 'admin/children-layouts', $data );
	}

	function check_area_layout( $area_id, $layout_id )
	{
		$resp = $this->layout_instance->check_area_layout( $area_id, $layout_id );
		return $resp;
	}

	function assign_layout_to_area()
	{
		$area_id = $this->input->post( 'area_id' );
		$layout_id = $this->input->post( 'layout_id' );
		$check = $this->check_area_layout( $area_id, $layout_id );

		if ( $check == 1 )
		{
			echo "This layout is already assigned to this area";
		}
		else
		{
			// $layout_info = $this->layout_instance->get_layout_info( $layout_id );
			// foreach ($layout_info[0] as $key => $value) {
			// 	$layout_arr[ $key ] = $value;
			// }
			// unset( $layout_arr[ 'id' ] );
			// $layout_arr[ 'configuration_area_id' ] = $area_id;
			$resp = $this->layout_instance->assign_layout_to_area( $layout_id, $area_id );
			echo $resp;
		}
	}

	public function ofConfiguration($id)
	{
		$temptemp = $this->configuration_instance->getSingleConfiguration($id);
		$temp = $temptemp[0];
		$data['username'] = $temp->title;
		$data['configid'] = $temp->id;
		$data['layouts'] = $this->layout_instance->getLayoutsOfConfiguration($id);
		if($data['layouts']==false)
			$data['empty']=TRUE;
   		$this->parser->parse('admin/children-layouts' , $data);
	}

	function view_create_layout( $area_id ){
		$data[ 'area_id' ] = $area_id;
		$data[ 'tab' ] = "config";
		$this->parser->parse( 'admin/create-layout', $data );
	}

	public function create( $area_id )
	{
		$title = $this->input->post( 'title' );
		$image = $this->verifyImage();
		if ( $image != 'false' )
			$this->layout_instance->createLayout($image, $area_id, $title);
		if ( $area_id != 0 )
			redirect( 'admin/layouts/view_area_layouts/'.$area_id, 'refresh' );
		else redirect( 'admin/layouts/', 'refresh' );
	}
	function checkIfNoConfigs()
	{
		$data['configs'] = $this->configuration_instance->getConfigurations();
		if(!$data['configs']==true)
   		{
			$this->session->set_flashdata('error', 'There are no Configurations to Create Layouts Under');
			redirect('admin/layouts/');
		}
	}
	function verifyImage()
	{
		$config = array(
		'upload_path' => "./public/img/layouts/",
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
			return 'false';
	}
	function validateForm()
	{
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('configuration_id', 'Configuration', 'trim|required');
		$this->form_validation->set_rules('pos_x' , 'Position X' , 'trim|required|integer');
		$this->form_validation->set_rules('pos_y' , 'Position Y' , 'trim|required|integer');
		$this->form_validation->set_rules('width' , 'Width' , 'trim|required|integer');
		$this->form_validation->set_rules('height' , 'Height' , 'trim|required|integer');

        if ($this->form_validation->run() == FALSE)
        	return false;
        else
			return true;    		
	}


	public function delete( $id, $area_id )
	{
		$this->layout_instance->deleteLayout($id);
   		$this->session->set_flashdata('info','Layout '.$id.' Deleted!');
   		if ( $area_id != 0 )
			redirect('admin/layouts/view_area_layouts/'.$area_id);
		else redirect('admin/layouts/', 'refresh');
	}

	function edit_layout($id)
	{
		// $data['tab']="layouts";
		// if(!isset($id))
		// 	redirect('admin/layouts/');

		// $this->load->helper(array('form', 'url'));
  //       $this->load->library('form_validation');

		// if($this->form_validation->run())
		// {
		// 	$oldtemp = $this->layout_instance->getSingleLayout($id); 
		// 	$old = $oldtemp[0];
		// 	$data = $this->input->post();

		// 	$title = $data[ 'title' ];
		// 	$image = $this->verifyImage();
		// 	if($image == FALSE)
		// 		$image = $old->layout_img;

		// 	$resp = $this->layout_instance->updateLayout($id, $image, $title);
		// 	echo $resp;
            
  //       	// redirect('admin/layouts/');
		// }

		// // /////////////////////////////////////////// //
		// $this->load->helper(array('form', 'url'));

		// $data['layout'] = $this->layout_instance->getSingleLayout($id);
		// // $data['config'] = $this->configuration_instance->getSingleConfiguration($data['layout'][0]->configuration_id);
		$layout_info = $this->layout_instance->get_layout_info( $id );
		foreach ($layout_info[0] as $key => $value) {
			$data[ $key ] = $value;
		}
		$data[ 'layout_info' ] = $layout_info;
		$data[ 'tab' ] = "config";
		$this->parser->parse('admin/edit-layout',$data);

	}

	function update_layout( $id )
	{
		$title = $this->input->post( 'title' );
		$image = $this->verifyImage();

		if ( $image == "false" )
		{
			$resp = $this->layout_instance->updateLayout( $id, $title, '' );
		}
		else
		{
			$image = $this->verifyImage();
			$resp = $this->layout_instance->updateLayout( $id, $title, $image );
		}

		redirect( '/admin/layouts/edit_layout/'.$id );
	}


}