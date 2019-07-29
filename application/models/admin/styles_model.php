<?php
Class Styles_model extends CI_Model
{
	function get_style_info( $style_id )
	{
		$sql = "SELECT * FROM style WHERE id = $style_id";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function get_all_styles()
	{
		$sql = "SELECT * FROM style";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function getStyles()
	  {	
	    $sql = "SELECT style.id , style.title ,  style_room_type.room_type_id , style.img , style.modified, room_type.title AS room_type_title FROM style JOIN style_room_type ON style.id = style_room_type.style_id JOIN room_type ON room_type.id = style_room_type.room_type_id ORDER BY style.id DESC";

	    $query=$this->db->query($sql);
	      if ($query->num_rows>0)
	        return $query->result();
	      else 
	        return false;
	  }
	function getSingleStyle($id)
	{	
		$sql = "SELECT style.id , style.title ,  style.img , style.modified FROM style WHERE style.id = $id";

		$query=$this->db->query($sql);
		
		if ($query->num_rows==1)
			return $query->result();

		return false ;
	}

	function assign_room_type_style( $room_type_id, $style_id )
	{
		$date = date( 'Y-m-d H:i:s' );
		$sql = "INSERT INTO style_room_type ( style_id, room_type_id, modified ) VALUES ( $style_id, $room_type_id, '$date' )";
		$this->db->query( $sql );
		return TRUE;
	}

	function getStylesOfRoomType($room_type_id)
	{	
		// $sql = "SELECT style.id , title , user_id , style.img , style.modified , user.firstname , user.lastname FROM style INNER JOIN user ON style.user_id=user.id WHERE user_id = $user_id ORDER BY style.id DESC";
		$sql = "SELECT style.id, style.title, style_room_type.room_type_id, style.img, style.modified, room_type.title AS room_type_title FROM style JOIN style_room_type ON style.id = style_room_type.style_id JOIN room_type ON room_type.id = style_room_type.room_type_id WHERE style_room_type.room_type_id = $room_type_id ORDER BY style.id DESC";

		$query=$this->db->query($sql);
		
		if ($query->num_rows>0)
	        return $query->result();

		return false ;
	}
	function createStyle($title,  $description , $img)
	{
		$date = date( 'Y-m-d H:i:s' );
		$sql = "INSERT INTO style ( title , description, img , modified) VALUES ( '$title'  , '$description' , '$img' , now() )";
		$result = $this->db->query($sql);
		$style_id = $this->db->insert_id();

		if ( $result )
			return $style_id;

		return false;
	}
	public function updateStyle( $id , $title=''  , $img='' )
	{

		$sql = "UPDATE style SET title = '$title' , img = '$img' , modified = now() WHERE id = $id";
		$result = $this->db->query($sql);

		if($result)
			return true;

		return false;
	}
	public function deleteStyle($id)
	{
		// Deleting the Image
		$image = $this->getSingleStyle($id);
		$image = $image[0];
		$image = $image->img;
		unlink("./public/img/styles/$image");

		// Deleting The Record
		$sql = "DELETE FROM style WHERE id = $id";
		$result = $this->db->query($sql);

		// Delete user style record ..
		$sql = "DELETE FROM style_room_type WHERE style_id = $id";
		$this->db->query( $sql );

		if($result)
			return true;

		return false;
	}
	
	function count()
   {
      $sql = "SELECT count(id) FROM style";
      $query = $this->db->query($sql);
      $temp = $query->row_array(); 
      return $temp['count(id)'];
   }
}