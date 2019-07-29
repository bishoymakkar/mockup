<?php
Class Objects_model extends CI_Model
{
	function getObjects()
	  {	
	    $sql = "SELECT object.id , layout_object.pos_x , layout_object.pos_y, layout_object.frame_width, layout_object.frame_height, object.title, manufacturer, price, object.img as object_img, layout.img as layout_img, product_width, product_height, product_depth, layout_object.layout_id, link, object.modified FROM object LEFT OUTER JOIN layout_object ON layout_object.object_id = object.id LEFT OUTER JOIN layout ON layout_object.layout_id = layout.id ORDER BY object.id DESC";

	    $query=$this->db->query($sql);
	      if ($query->num_rows>0)
	        return $query->result();
	      else 
	        return false ;
	  }

	  function get_layout_obj_info( $obj_id, $lay_id )
	  {
	  	$sql = "SELECT layout_object.pos_x, layout_object.pos_y, layout_object.frame_width, layout_object.frame_height, layout.id AS layout_id, layout_object.object_id AS object_id, layout.img AS layout_img FROM layout_object JOIN layout ON layout.id = layout_object.layout_id WHERE object_id = $obj_id AND layout_id = $lay_id";
	  	$query = $this->db->query( $sql );
	  	return $query->result_array();
	  }

	 function get_unique_objects( $layout_id )
	 {
		$sql = "SELECT object.title, object.id, layout.title as layout_title, layout.id as layout_id FROM object LEFT OUTER JOIN layout_object ON layout_object.object_id = object.id LEFT OUTER JOIN layout ON layout.id = layout_object.layout_id WHERE layout.id != $layout_id OR layout.id is NULL";

	    $query=$this->db->query($sql);
	      if ($query->num_rows>0)
	        return $query->result();
	      else 
	        return false ;
	 }
	function getSingleObject($id)
	{	
		$sql = "SELECT object.id , layout_object.pos_x , layout_object.pos_y, layout_object.frame_width, layout_object.frame_height, object.title, description, manufacturer, price, object.img as object_img, layout.img as layout_img, product_width, product_height, product_depth, layout_object.layout_id, link, object.modified FROM object LEFT OUTER JOIN layout_object ON layout_object.object_id = object.id LEFT OUTER JOIN layout ON layout_object.layout_id = layout.id where object.id = $id ORDER BY object.id DESC";

		$query=$this->db->query($sql);
		
		if ($query->num_rows==1)
			return $query->result();

		return false ;
	}

	function check_layout_object( $layout_id, $object_id )
	{
		$sql = "SELECT * FROM object JOIN layout_object ON layout_object.object_id = object.id WHERE object.id = $object_id AND layout_object.layout_id = $layout_id";
		$query = $this->db->query( $sql );
		return $query->num_rows();
	}

	// function get_object_info( $id )
	// {
	// 	$sql = "SELECT object.id FROM object WHERE id = $id";
	// 	$query = $this->db->query( $sql );
	// 	return $query->result_array();
	// }

	function assign_object_to_layout( $layout_id, $object_id )
	{
		$sql = "INSERT INTO layout_object ( object_id, layout_id, pos_x, pos_y, frame_width, frame_height ) VALUES ( $object_id, $layout_id, 0, 0, 0, 0 )";
		$this->db->query( $sql );
		$new_obj_id = $this->db->insert_id();
		return $object_id;
	}

	function get_product_info( $id )
	{
		$sql = "SELECT object.title AS prod_name, object.description AS prod_desc, object.img AS prod_img FROM object WHERE id = $id";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function get_product_images( $id )
	{
		$counter = 0;
	    $images = array();
	    if( is_dir( getcwd().'/public/img/objects/'.$id."/" ) ){
	      if ( $handle = opendir( getcwd().'/public/img/objects/'.$id."/" ) ) {
	         while ( false !== ( $entry = readdir( $handle ) ) ) {
	            if( $entry != "." && $entry != ".." && ( preg_match('/\.jpe?g$/i',$entry ) || preg_match( '/\.png$/i',$entry) || preg_match('/\.gif$/i',$entry ) ) ){
	              $images[$counter]['image_name'] = '<div class="obj-gallery-item" style="position: relative; width: 70px; height: 70px; overflow: hidden; background: url('.base_url().'public/img/objects/'.$id.'/'.$entry.'); background-repeat: no-repeat; background-size: cover; background-position: center center;"></div>';
	              $counter++;
	            }
	        }
	        closedir($handle);
	      }
	    }
	    return $images;
	}

	function get_layout_objects( $layout_id )
	{
		$sql = "SELECT object.id, object.title, object.description, object.manufacturer, object.img, object.price, object.link, object.product_width, object.product_height, object.product_depth, object.modified, layout_object.layout_id, layout_object.pos_x, layout_object.pos_y, layout_object.frame_width, layout_object.frame_height FROM object JOIN layout_object ON layout_object.object_id = object.id WHERE layout_object.layout_id = $layout_id";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function get_item_info( $id )
	{
		$sql = "SELECT * FROM object WHERE id = $id";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function upload_object_photo( $file_name, $file_type, $file_size, $id, $temp )
	{
		if ( !is_dir( getcwd()."/public/img/objects" ) ) mkdir( getcwd()."/public/img/objects", 0755 );
		if ( !is_dir( getcwd()."/public/img/objects/$id" ) ) mkdir( getcwd()."/public/img/objects/$id", 0755 );
		// UPLOAD THE FILE ..
		move_uploaded_file( $temp, getcwd()."/public/img/objects/$id/".$file_name );
		return TRUE;
	}

	function delete_object_photo( $id, $file_name )
	{
		unlink( getcwd().'/public/img/objects/'.$id.'/'.$file_name );
		return TRUE;
	}

	function getObjectsOfLayout($id)
	{	
		$sql = "SELECT object.id , layout_object.pos_x , layout_object.pos_y, layout_object.frame_width, layout_object.frame_height, object.title, manufacturer, price, object.img as object_img, layout.img as layout_img, product_width, product_height, product_depth, layout_object.layout_id, link, object.modified FROM object LEFT OUTER JOIN layout_object ON layout_object.object_id = object.id INNER JOIN layout ON layout_object.layout_id = layout.id where layout_object.layout_id = $id ORDER BY object.id DESC";

		$query=$this->db->query($sql);
		
		if ($query->num_rows>0)
	        return $query->result();

		return false ;
	}
	function createObject($pos_x, $pos_y, $width, $height, $title, $description, $manu, $price, $img, $link, $pwidth, $pheight, $pdepth, $layout_id)
	{	
		$sql = "INSERT INTO object ( title, description, manufacturer, price, img, link, product_width, product_height, product_depth, modified) VALUES ( '$title', '$description', '$manu', $price, '$img', '$link', $pwidth, $pheight, $pdepth, now() )";
		$result = $this->db->query($sql);
		$object_id = $this->db->insert_id();
		$sql = "INSERT INTO layout_object (layout_id, object_id, pos_x, pos_y, frame_width, frame_height) VALUES ($layout_id, $object_id, $pos_x, $pos_y, $width, $height)";
		$result = $this->db->query( $sql );
		if ($result)
			return $object_id;
		return false ;
	}

	function createStandaloneObject( $title, $description, $manu, $price, $image, $link, $pwidth, $pheight, $pdepth )
	{
		$sql = "INSERT INTO object (  title, description, manufacturer, price, img, link, product_width, product_height, product_depth, modified ) VALUES ( '$title', '$description', '$manu', '$price', '$image', '$link', '$pwidth', '$pheight', '$pdepth', now() )";
		$result = $this->db->query($sql);
		if ($result)
			return $this->db->insert_id();
		return false;
	}

	function get_object_layouts( $id )
	{
		$sql = "SELECT layout_object.object_id AS object_id, layout.id AS layout_id, layout.title AS layout_title, layout.img AS layout_img, layout_object.pos_x, layout_object.pos_y, layout_object.frame_width, layout_object.frame_height FROM layout_object JOIN layout ON layout.id = layout_object.layout_id WHERE layout_object.object_id = $id";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function remove_from_layout( $obj_id, $lay_id )
	{
		$sql = "DELETE FROM layout_object WHERE object_id = $obj_id AND layout_id = $lay_id";
		$this->db->query( $sql );
		return TRUE;
	}

	function updateObjectInLayout( $obj_id, $lay_id, $pos_x, $pos_y, $width, $height )
	{
		$sql = "UPDATE layout_object SET pos_x = $pos_x, pos_y = $pos_y, frame_width = $width, frame_height = $height WHERE object_id = $obj_id AND layout_id = $lay_id";
		$this->db->query( $sql );
		return TRUE;
	}

	public function updateObject($id, $title, $description, $manu, $price, $img, $link, $pwidth, $pheight, $pdepth )
	{

		$sql = "UPDATE object SET title = '$title', description='$description', manufacturer = '$manu', price = $price , img = '$img', link = '$link', product_width = $pwidth, product_height = $pheight, product_depth = $pdepth, modified = now() WHERE id = $id";

		$result = $this->db->query($sql);

		if($result)
			return true;

		return false;
	}

	// function remove_from_layout( $id, $layout_id )
	// {
	// 	$sql = "DELETE FROM layout_object WHERE object_id = $id AND layout_id = $layout_id";
	// 	$this->db->query( $sql );
	// 	return TRUE;
	// }

	public function deleteObject($id)
	{
		// Deleting the Image
		$image = $this->getSingleObject($id);
		$image = $image[0];
		$image = $image->object_img;
		echo $image;
		unlink("./public/img/objects/$image");

		// Deleting The Record
		$sql = "DELETE FROM object WHERE id = '$id' ";
		$result = $this->db->query($sql);

		// DELETE Object layout relation ..
		$sql = "DELETE FROM layout_object WHERE object_id = $id";
		$this->db->query( $sql );

		if($result)
			return true;

		return false;
	}
	function count()
   {
      $sql = "SELECT count(id) FROM object";
      $query = $this->db->query($sql);
      $temp = $query->row_array(); 
      return $temp['count(id)'];
   }


	
}