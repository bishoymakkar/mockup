<?php
Class Configuration_model extends CI_Model
{
	function getConfigurations()
	  {	
	    $sql = "SELECT configuration.title , style_id , style.title  AS style_title  , configuration.id , configuration.img , configuration.modified  FROM configuration INNER JOIN style ON style.id = style_id ORDER BY configuration.id DESC";

	    $query=$this->db->query($sql);
	      if ($query->num_rows>0)
	        return $query->result();
	      else 
	        return false ;
	  }

	function get_config_info( $id )
	{
		$sql = "SELECT * FROM configuration WHERE id = $id";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function getSingleConfiguration($id)
	{	
		$sql = "SELECT configuration.title , style_id , style.title  AS style_title  , configuration.id , configuration.img , configuration.modified  FROM configuration INNER JOIN style ON style.id = style_id WHERE configuration.id = $id ";

		$query=$this->db->query($sql);
		
		if ($query->num_rows==1)
			return $query->result();

		return false ;
	}

	function create_conf_area( $conf_id, $title, $posX, $posY, $width, $height )
	{
		$sql = "INSERT INTO conf_areas ( conf_id, title, pos_x, pos_y, width, height ) VALUES ( $conf_id, '$title', '$posX', '$posY', '$width', '$height' )";
		$this->db->query( $sql );
		return TRUE;
	}

	function get_configuration_areas( $id )
	{
		$sql = "SELECT * FROM conf_areas WHERE conf_id = $id";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function get_area_info( $id )
	{
		$sql = "SELECT * FROM conf_areas WHERE id = $id";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function save_conf_area_changes( $id, $title, $posX, $posY, $width, $height )
	{
		$sql = "UPDATE conf_areas SET title = '$title', pos_x = '$posX', pos_y = '$posY', width = '$width', height = '$height' WHERE id = $id";
		$this->db->query( $sql );
		return TRUE;
	}

	function delete_area( $id )
	{
		$sql = "DELETE FROM conf_areas WHERE id = $id";
		$this->db->query( $sql );
		return TRUE;
	}

	// function get_conf_areas( $conf_id )
	// {
	// 	$sql = "SELECT * FROM conf_areas WHERE conf_id = $conf_id";
	// 	$query = $this->db->query( $sql );
	// 	return $query->result_array();
	// }

	function get_area_layouts( $area_id )
	{
		$sql = "SELECT layout.id AS id, layout.title, layout.img, layout.modified, layout_area.area_id FROM layout JOIN layout_area ON layout_area.layout_id = layout.id WHERE layout_area.area_id = $area_id";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function get_conf_layouts( $conf_id )
	{
		$sql = "SELECT layout.id AS layout_id, layout.img AS layout_img, conf_areas.pos_x, conf_areas.pos_y, conf_areas.width, conf_areas.height FROM layout JOIN conf_areas ON conf_areas.id = layout.configuration_area_id JOIN configuration ON configuration.id = conf_areas.conf_id WHERE configuration.id = $conf_id";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function get_area_conf_id( $area_id )
	{
		$sql = "SELECT * FROM conf_areas WHERE id = $area_id";
		$query = $this->db->query( $sql );
		$row = $query->result_array();
		return $row[0][ 'conf_id' ];
	}

	function get_style_confs( $style_id )
	{
		$sql = "SELECT configuration.id AS configuration_id, configuration.title AS configuration_title, configuration.img AS configuration_img, style.title AS style_title, style.img AS style_img FROM configuration JOIN style ON style.id = configuration.style_id WHERE style_id = $style_id";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	// function get_conf_info( $conf_id )
	// {
	// 	$sql = "SELECT * FROM configuration WHERE id = $conf_id";
	// 	$query = $this->db->query( $sql );
	// 	return $query->result_array();
	// }

	function getConfigurationsOfStyle($id)
	{
		$sql = "SELECT configuration.title , style_id , style.title  AS style_title  , configuration.id , configuration.img , configuration.modified  FROM configuration INNER JOIN style ON style.id = style_id WHERE style_id = $id ";

		$query=$this->db->query($sql);
		
		if ($query->num_rows>0)
	        return $query->result();

		return false ;
	}
	function createConfiguration($title, $img , $style_id)
	{		
		$sql = "INSERT INTO configuration ( title , img , style_id , modified) VALUES ( '$title' , '$img' , '$style_id' , now() )";

		$result = $this->db->query($sql);
		
		if ($result)
			return $this->db->insert_id();

		return false ;
	}
	public function updateConfiguration($id , $title='', $img='' , $style_id='')
	{

		$sql = "UPDATE configuration SET title = '$title' , img = '$img' , style_id = '$style_id' , modified = now() WHERE id = $id";
		$result = $this->db->query($sql);

		if($result)
			return true;

		return false;
	}
	public function deleteConfiguration($id)
	{
		// Deleting the Image
		$image = $this->getSingleConfiguration($id);
		$image = $image[0];
		$image = $image->img;
		unlink("./public/img/configurations/$image");

		// Deleting The Record
		$sql = "DELETE FROM configuration WHERE id = $id";
		$result = $this->db->query($sql);

		if($result)
			return true;

		return false;
	}
	function count()
   {
      $sql = "SELECT count(id) FROM configuration";
      $query = $this->db->query($sql);
      $temp = $query->row_array(); 
      return $temp['count(id)'];
   }
}