<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Objects extends CI_Controller {


function __construct(){
   		
   		parent::__construct();
       
		$this->load->library('session');

 		if(!$this->session->userdata('admin_mockup_logged_in'))
	 		redirect('admin/login');

	 	$this->load->library('parser');
	 	$this->load->model('admin/layout_model','layout_instance',true);
		$this->load->model('admin/objects_model','object_instance',true);

 	}

 	public function index()
	{
		$data['tab']="objects";
		$data['objects'] =$this->object_instance->getObjects();
		$this->parser->parse('admin/manage-objects',$data);
	}

	function deleteFromLayout( $id, $layout_id )
	{
		$resp = $this->object_instance->remove_from_layout( $id, $layout_id );
		redirect( 'admin/objects/ofLayout/'.$layout_id, 'refresh' );
	}

	public function ofLayout($id)
	{
		// GET ALL OBJECTS ..
		$allobjects = $this->object_instance->get_unique_objects( $id );
		if ( $allobjects == false ) $data[ 'allobjects' ] = array();
		else $data[ 'allobjects' ] = $allobjects;
		$temptemp = $this->layout_instance->getSingleLayout($id);
		$temp = $temptemp[0];
		$data['username'] = $temp->id;
		$data['layoutid'] = $temp->id;
		$data['objects'] = $this->object_instance->getObjectsOfLayout($id);
		if($data['objects']==false)
			$data['empty']=TRUE;
   		$this->parser->parse('admin/children-objects' , $data);
	}

	function check_layout_object( $layout_id, $object_id )
	{
		$resp = $this->object_instance->check_layout_object( $layout_id, $object_id );
		return $resp;
	}

	function view_object_layouts( $object_id )
	{
		$all_layouts = $this->object_instance->get_object_layouts( $object_id );
		$data[ 'tab' ] = 'objects';
		$data[ 'layouts' ] = $all_layouts;
		$this->parser->parse('admin/object_layouts' , $data);
	}

	function assign_object_to_layout()
	{
		$layout_id = $this->input->post( 'layout_id' );
		$object_id = $this->input->post( 'object_id' );

		$check = $this->check_layout_object( $layout_id, $object_id );

		if ( $check == 1 )
		{
			echo "This object is already assigned to this layout";
		}
		else
		{
			// $obj_info = $this->object_instance->get_object_info( $object_id );
			// foreach ($obj_info[0] as $key => $value) {
			// 	$object_arr[ $key ] = $value;
			// }
			// unset( $object_arr[ 'id' ] );
			$object_arr[ 'layout_id' ] = $layout_id;
			$resp = $this->object_instance->assign_object_to_layout( $layout_id, $object_id );
			echo $resp;
		}
	}

	function view_gallery( $id )
	{
		$data[ 'tab' ] = "objects";
		// LOOP THROUGH OBJECT FOLDER AND GET ALL IMAGES ..
		$counter = 0;
	    $images = array();
	    if( is_dir( getcwd().'/public/img/objects/'.$id."/" ) ){
	      if ( $handle = opendir( getcwd().'/public/img/objects/'.$id."/" ) ) {
	         while ( false !== ( $entry = readdir( $handle ) ) ) {
	            if( $entry != "." && $entry != ".." && ( preg_match('/\.jpe?g$/i',$entry ) || preg_match( '/\.png$/i',$entry) || preg_match('/\.gif$/i',$entry ) ) ){
	              $images[$counter]['image_name'] = '<div class="obj-gallery-item" style="position: relative; width: 180px; height: 180px; overflow: hidden; background: url('.base_url().'public/img/objects/'.$id.'/'.$entry.'); background-repeat: no-repeat; background-size: cover; background-position: center center; border: solid 2px #ddd;"><a style="position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; margin: auto; height: 30px; width: 40px; display: none;" class="btn btn-default" onclick="delete_object_photo('.$id.', \''.$entry.'\')"><i class="entypo-trash"></i></a></div>';
	              $counter++;
	            }
	        }
	        closedir($handle);
	      }
	    }
	    else{
	      $images[0]['image_name']="<h4 style='color: rgba(0,0,0,0.3)'><span class='entypo-cancel'></span>&nbsp;&nbsp;No images found for this object</h4>";
	    }
	    $data[ 'images' ] = $images;
	    $data[ 'object_id' ] = $id;
	    $this->parser->parse('admin/object_gallery' , $data);
	}

	function delete_object_photo(){
		$id = $this->input->post( 'id' );
		$file_name = $this->input->post( 'file_name' );
		$resp = $this->object_instance->delete_object_photo( $id, $file_name );
		echo $resp;
	}

	function upload_object_photo( $id, $element )
	{
		$file_name = $_FILES[$element]['name'];
        $file_type = $_FILES[$element]['type'];
        $file_size = $_FILES[$element]['size'];
        $temp = $_FILES[$element]['tmp_name'];

        // Check or file type to be only photos ..
        if($file_type == "image/jpeg" || $file_type == "image/jpg" || $file_type == "image/png" || $file_type == "image/gif"){
            if($file_size <= 800000){
                if(trim($file_name) != ""){
                    $resp = $this->object_instance->upload_object_photo( $file_name, $file_type, $file_size, $id, $temp );
                    echo $resp;
                }
            }else echo "Maximum file size allowed is 800 KB";
        }else echo "Please make sure you upload an image file";
	}

	function view_create_object( $layout_id )
	{
		$data[ 'layout_id' ] = $layout_id;
		$layout_info = $this->layout_instance->get_layout_info( $layout_id );
		// $conf_info = $this->layout_instance->get_layout_conf( $layout_id );
		$data[ 'layout_img' ] = $layout_info[0][ 'img' ];
		$this->parser->parse( 'admin/create-object', $data );
	}

	function view_create_standalone_object()
	{
		$layout_id = 0;
		$layout_info = $this->layout_instance->get_layout_info( $layout_id );
		// $conf_info = $this->layout_instance->get_layout_conf( $layout_id );
		// $data[ 'layout_img' ] = $layout_info[0][ 'img' ];
		$data = array();
		$this->parser->parse( 'admin/create_standalone-object', $data );
	}

	function create_standalone()
	{
		$image = $this->verifyImage();
		if ( $image != false )
		{
			$data = $this->input->post();
			$title = $data[ 'title' ];
			$description = $data[ 'description' ];
			$manu = $data[ 'manufacturer' ];
			$price = $data[ 'price' ];
			$link = $data[ 'link' ];
			$pwidth = $data[ 'pwidth' ];
			$pheight = $data[ 'pheight' ];
			$pdepth = $data[ 'pdepth' ];
			$this->object_instance->createStandaloneObject( $title, $description, $manu, $price, $image, $link, $pwidth, $pheight, $pdepth);
		}
		redirect( 'admin/objects/' );
	}

	public function create( $layout_id )
	{
   		// Check Image
		$image = $this->verifyImage();
		if ( $image != false )
		{
			$data = $this->input->post();
			$pos_x = ($data[ 'pos_x' ]/189)*100;
			$pos_y = ($data[ 'pos_y' ]/189)*100;
			$width = ($data[ 'width' ]/189)*100;
			$height = ($data[ 'height' ]/189)*100;
			$title = $data['title'];
			$description = $data[ 'description' ];
			$manu = $data['manufacturer'];
			$price = $data['price'];
			$link = $data['link'];
			$pwidth = $data['pwidth'];
			$pheight = $data['pheight'];
			$pdepth = $data['pdepth'];
			// $layout_id = $data['layout_id'];
			// $return = $data['return'];
			$this->object_instance->createObject($pos_x, $pos_y, $width, $height, $title, $description, $manu, $price, $image, $link, $pwidth, $pheight, $pdepth, $layout_id);
		}
		redirect( 'admin/objects/ofLayout/'.$layout_id, 'refresh' );
		
	}
	function checkIfNoLayouts()
	{
		$data['layouts'] = $this->layout_instance->getLayouts();
		if(!$data['layouts']==true)
   		{
			$this->session->set_flashdata('error', 'There are no Layouts to Create Objects Under');
			redirect('admin/objects/');
		}
	}
	function verifyImage()
	{
		$config = array(
		'upload_path' => "./public/img/objects/",
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
		$this->form_validation->set_rules('layout_id', 'Layout', 'trim|required');
		$this->form_validation->set_rules('pos_x' , 'Position X' , 'trim|required|integer');
		$this->form_validation->set_rules('pos_y' , 'Position Y' , 'trim|required|integer');
		$this->form_validation->set_rules('width' , 'Width' , 'trim|required|integer');
		$this->form_validation->set_rules('height' , 'Height' , 'trim|required|integer');
		$this->form_validation->set_rules('title' , 'Title' , 'trim|required|min_length[3]|max_length[95]');
		$this->form_validation->set_rules('manufacturer' , 'manufacturer' , 'trim|required|min_length[3]|max_length[95]');
		$this->form_validation->set_rules('price' , 'Price' , 'trim|required|integer');
		$this->form_validation->set_rules('link' , 'Link' , 'trim|required|min_length[3]|max_length[999]');
		$this->form_validation->set_rules('pwidth' , 'Width' , 'trim|required|integer');
		$this->form_validation->set_rules('pheight' , 'Height' , 'trim|required|integer');
		$this->form_validation->set_rules('pdepth' , 'Depth' , 'trim|required|integer');

        if ($this->form_validation->run() == FALSE)
        	return false;
        else
			return true;    		
	}
	public function delete($id)
	{
		$this->object_instance->deleteObject($id);
		$this->session->set_flashdata('info','Object '.$id.' Deleted!');
		redirect('admin/objects/');
	}

	function edit_in_layout( $obj_id, $lay_id )
	{
		$data['tab']="objects";
		$object_info = $this->object_instance->get_layout_obj_info( $obj_id, $lay_id );
		foreach ($object_info[0] as $key => $value) {
			$data[ $key ] = $value;
		}
		$this->parser->parse('admin/edit-object-in-layout',$data);
	}

	function update_object_in_layout( $obj_id, $lay_id )
	{
		$data = $this->input->post();
		$pos_x = ($data[ 'pos_x' ]/500)*100;
		$pos_y = ($data[ 'pos_y' ]/500)*100;
		$width = ($data[ 'width' ]/500)*100;
		$height = ($data[ 'height' ]/500)*100;
		$resp = $this->object_instance->updateObjectInLayout( $obj_id, $lay_id, $pos_x, $pos_y, $width, $height );
		// redirect( 'admin/objects/view_object_layouts/'.$obj_id, 'refresh' );
		redirect( 'admin/layouts', 'refresh' );

	}

	function remove_from_layout( $obj_id, $lay_id )
	{
		$resp = $this->object_instance->remove_from_layout( $obj_id, $lay_id );
		redirect( 'admin/objects/view_object_layouts/'.$obj_id, 'refresh' );
	}

	public function edit($id)
	{
		$data['tab']="objects";
		if( !isset($id) )
			redirect('admin/objects/');

		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

		$this->form_validation->set_rules('title' , 'Title' , 'trim|required|min_length[3]|max_length[95]');
		$this->form_validation->set_rules('manufacturer' , 'manufacturer' , 'trim|required|min_length[3]|max_length[95]');
		$this->form_validation->set_rules('price' , 'Price' , 'trim|required|integer');
		$this->form_validation->set_rules('link' , 'Link' , 'trim|required|min_length[3]|max_length[999]');
		$this->form_validation->set_rules('pwidth' , 'Width' , 'trim|required|integer');
		$this->form_validation->set_rules('pheight' , 'Height' , 'trim|required|integer');
		$this->form_validation->set_rules('pdepth' , 'Depth' , 'trim|required|integer');

		if($this->form_validation->run())
		{
			$oldtemp = $this->object_instance->getSingleObject($id);
			$old = $oldtemp[0];
			$data = $this->input->post();
			
			$title = $data['title'];
			$description = $data[ 'description' ];
			$manu = $data['manufacturer'];
			$price = $data['price'];
			$link = $data['link'];
			$pwidth = $data['pwidth'];
			$pheight = $data['pheight'];
			$pdepth = $data['pdepth'];
			$layout_img = "";
			
			$image = $this->verifyImage();
			if($image == FALSE)
				$image = $old->object_img;

			$this->object_instance->updateObject($id, $title, $description, $manu, $price, $image, $link, $pwidth, $pheight, $pdepth);
            
        	redirect('admin/objects/');
		}

		// /////////////////////////////////////////// //
		$this->load->helper(array('form', 'url'));

		$data['object'] = $this->object_instance->getSingleObject($id);
		if ( isset( $data[ 'object' ][0]->layout_id ) && $data[ 'object' ][0]->layout_id != 0 )
			$data['layout'] = $this->layout_instance->getSingleLayout($data['object'][0]->layout_id);
		else $data[ 'layout' ] = array();
		if ( $data[ 'object' ][0]->layout_id != 0 )
		{
			$data[ 'layout_entries' ] = $this->parser->parse( '/admin/layout_entries_template', array( 'layout'=> $data[ 'layout' ]), TRUE );
		}else $data[ 'layout_entries' ] = '';
		$this->parser->parse('admin/edit-object',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */