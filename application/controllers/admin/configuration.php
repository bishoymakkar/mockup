<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuration extends CI_Controller {


function __construct(){
   		
   		parent::__construct();

		$this->load->library('session');

 		if(!$this->session->userdata('admin_mockup_logged_in'))
	 		redirect('admin/login');

	 	$this->load->library('parser');
	 	$this->load->model('admin/styles_model' , 'style_instance' , TRUE);
	 	$this->load->model('admin/configuration_model' , 'configuration_instance' ,TRUE);
 	}

 	public function index()
	{
		$data['tab']="config";
   		$data['configs'] = $this->configuration_instance->getConfigurations();
		$data['styles'] = $this->style_instance->getStyles();
   		$this->parser->parse('admin/manage-config' , $data);
	}
	public function ofStyle($id)
	{
		$temptemp = $this->style_instance->getSingleStyle($id); 
		$temp = $temptemp[0];
		$data['username'] = $temp->title;
		$data['styleid'] = $temp->id;
		$data['configs'] = $this->configuration_instance->getConfigurationsOfStyle($id);
		if($data['configs']==false)
			$data['empty']=TRUE;
   		$this->parser->parse('admin/children-configuration' , $data);
	}

	function view_areas( $id )
	{
		$areas = $this->configuration_instance->get_configuration_areas( $id );
		$data[ 'areas' ] = $areas;
		$data['tab']="config";
		$data[ 'conf_id' ] = $id;
		$this->parser->parse( 'admin/manage_conf_areas', $data );
	}

	function edit_area( $id )
	{
		$area_info = $this->configuration_instance->get_area_info( $id );
		$conf_id = $area_info[0][ 'conf_id' ];
		$conf_info = $this->configuration_instance->get_config_info( $conf_id );
		$conf_img = $conf_info[0][ 'img' ];
		$data[ 'conf_img' ] = $conf_img;
		foreach ($area_info[0] as $key => $value) {
			$data[ $key ] = $value;
		}
		$data[ 'tab' ] = 'config';
		$this->parser->parse( 'admin/edit_conf_areas', $data );
	}

	function view_create_conf_area( $conf_id )
	{
		$data[ 'tab' ] = 'config';
		// GET CONFIGURATION IMAGE ..
		$conf_info = $this->configuration_instance->get_config_info( $conf_id );
		$data[ 'conf_img' ] = $conf_info[0][ 'img' ];
		$data[ 'conf_id' ] = $conf_id;
		$this->parser->parse( 'admin/create_configuration_area', $data );
	}

	function create_conf_area( $conf_id ){
		$title = $this->input->post( 'title' );
		$posX = intVal( round( ($this->input->post( 'pos_x' )/360)*100 ) );
		$posY = intVal( round( ($this->input->post( 'pos_y' )/277)*100 ) );
		$width = intVal( round( ($this->input->post( 'width' )/360)*100 ) );
		$height = intVal( round( ($this->input->post( 'height' )/277)*100 ) );
		$resp = $this->configuration_instance->create_conf_area( $conf_id, $title, $posX, $posY, $width, $height );
		redirect( 'admin/configuration/view_areas/'.$conf_id, 'refresh' );
	}

	function save_conf_area_changes( $id )
	{
		$title = $this->input->post( 'title' );
		$posX = intVal( round( ($this->input->post( 'pos_x' )/360)*100 ) );
		$posY = intVal( round( ($this->input->post( 'pos_y' )/277)*100 ) );
		$width = intVal( round( ($this->input->post( 'width' )/360)*100 ) );
		$height = intVal( round( ($this->input->post( 'height' )/277)*100 ) );
		$conf_id = $this->configuration_instance->get_area_conf_id( $id );

		$resp = $this->configuration_instance->save_conf_area_changes( $id, $title, $posX, $posY, $width, $height );
		redirect( 'admin/configuration/view_areas/'.$conf_id );
	}

	function delete_area( $id )
	{
		$resp = $this->configuration_instance->delete_area( $id );
		redirect( 'admin/configuration', 'refresh' );
	}

	function view_area_layouts( $id )
	{
		$layouts = $this->configuration_instance->get_area_layouts( $id );
		$data[ 'layouts' ] = $layouts;
		$data[ 'tab' ] = "config";
		$this->parser->parse( 'admin/area_layouts', $data );
	}

	public function create($id = false)
	{
		//Check Excplicit Parent
		if($id!=false)
			$data['parent_id'] = $id;

		//Check if No Parents at all
		$this->checkIfNoStyles();

		//Check Image
		$image = $this->verifyImage();

		if($this->validateForm())
		{
			//Return if Form Validated Without Image
			if(!$image){
				$this->session->set_flashdata('img','An Image is Required');		
				$this->parser->parse('admin/create-config' , $data);	
				return;
			}

			$data = $this->input->post();
			$title = $data['title'];
			$style_id = $data['style_id'];
			if($id!=FALSE)
				$style_id = $id; 

			//Insert Record
			$this->configuration_instance->createConfiguration($title, $image , $style_id);
            
            redirect('admin/configuration/');
		}
		else
		{
			//Check if image is uploaded When Form Validation Failed
			if(!$image)
				$this->session->set_flashdata('img','An Image is Required');		

			//Return to View
			$data['styles'] = $this->style_instance->getStyles();
	   		$this->parser->parse('admin/create-config' , $data);
		}
	}
	function checkIfNoStyles()
	{
		$data['styles'] = $this->style_instance->getStyles();
		if(!$data['styles']==true)
   		{
			$this->session->set_flashdata('error', 'There are no Styles to Create Configurations Under');
			redirect('admin/configuration');
		}
	}
	function verifyImage()
	{
		$config = array(
		'upload_path' => "./public/img/configurations/",
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
		$this->form_validation->set_rules('style_id', 'Style', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        	return false;
        else
			return true;    		
	}
	public function delete($id)
	{
		$this->configuration_instance->deleteConfiguration($id);
		$this->session->set_flashdata('info','Configuration '.$id.' Deleted!');
		redirect('admin/configuration/');
	}
	public function edit($id)
	{
		$data['tab']="config";
		if(!isset($id))
			redirect('admin/configuration/');

		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[49]');
		$this->form_validation->set_rules('style_id', 'User', 'trim|required');

        if ($this->form_validation->run() == TRUE)
		{
			$oldtemp = $this->configuration_instance->getSingleConfiguration($id); 
			$old = $oldtemp[0];
			$data = $this->input->post();

			$title = $data['title'];
			$style_id = $data['style_id'];
			
			$image = $this->verifyImage();
			if($image == FALSE)
				$image = $old->img;

			$this->configuration_instance->updateConfiguration($id, $title, $image , $style_id);
            
            redirect('admin/configuration/');
		}
		else
		{
			$data['config'] = $this->configuration_instance->getSingleConfiguration($id);
			$data['styles'] = $this->style_instance->getStyles();
			$this->parser->parse('admin/edit-config' , $data);
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */