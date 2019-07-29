<?php
Class Room_types_model extends CI_Model
{
	function get_room_type_info( $room_type_id )
	{
		$sql = "SELECT * FROM room_type WHERE id = $room_type_id";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function get_all_room_types()
	{
		$sql = "SELECT * FROM room_type";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function getRoomTypes()
	  {	
	    $sql = "SELECT room_type.id , room_type.title , room_type_user.user , room_type.image, user.firstname , user.lastname FROM room_type LEFT OUTER JOIN room_type_user ON room_type_user.room_type = room_type.id LEFT OUTER JOIN user ON room_type_user.user = user.id ORDER BY room_type.id DESC";

	    $query=$this->db->query($sql);
	      if ($query->num_rows>0)
	        return $query->result();
	      else 
	        return false;
	  }
	function getSingleRoomType($id)
	{	
		$sql = "SELECT room_type.id , room_type.title , room_type.image FROM room_type WHERE room_type.id = $id";

		$query=$this->db->query($sql);
		
		if ($query->num_rows==1)
			return $query->result();

		return false ;
	}

	function assign_user_room_type( $user_id, $room_type_id )
	{
		$date = date( 'Y-m-d H:i:s' );
		$sql = "INSERT INTO room_type_user ( room_type, user, modified ) VALUES ( $room_type_id, $user_id, '$date' )";
		$this->db->query( $sql );
		return TRUE;
	}

	function getRoomTypesOfUser($user_id)
	{	
		// $sql = "SELECT room_type.id , title , user_id , room_type.img , room_type.modified , user.firstname , user.lastname FROM room_type INNER JOIN user ON room_type.user_id=user.id WHERE user_id = $user_id ORDER BY room_type.id DESC";
		$sql = "SELECT room_type.id, room_type.title, room_type_user.user, room_type.image, user.firstname, user.lastname FROM room_type LEFT OUTER JOIN room_type_user ON room_type_user.room_type = room_type.id LEFT OUTER JOIN user ON room_type_user.user = user.id WHERE room_type_user.user = $user_id ORDER BY room_type.id DESC";

		$query=$this->db->query($sql);
		
		if ($query->num_rows>0)
	        return $query->result();

		return false ;
	}
	function createRoomType($title, $img)
	{
		$sql = "INSERT INTO room_type ( title , `image` ) VALUES ( '$title' ,  '$img'  )";
		$result = $this->db->query($sql);
		$room_type_id = $this->db->insert_id();

		if ( $result )
			return $room_type_id;

		return false;
	}
	public function updateRoomType( $id , $title='' , $img='' )
	{

		$sql = "UPDATE room_type SET title = '$title' ,  `image` = '$img' WHERE id = $id";
		$result = $this->db->query($sql);

		if($result)
			return true;

		return false;
	}
	public function deleteRoomType($id)
	{
		// Deleting the Image
		$image = $this->getSingleRoomType($id);
		$image = $image[0];
		$image = $image->image;
		unlink("./public/img/room_types/$image");

		// Deleting The Record
		$sql = "DELETE FROM room_type WHERE id = $id";
        $result = $this->db->query($sql);
        

		$sql = "DELETE FROM room_type_user WHERE room_type = $id";
		$result = $this->db->query($sql);

		if($result)
			return true;

		return false;
	}
	
	function count()
   {
      $sql = "SELECT count(id) FROM room_type";
      $query = $this->db->query($sql);
      $temp = $query->row_array(); 
      return $temp['count(id)'];
   }
}