<?php
Class User_model extends CI_Model{


	function register($user_array)
	{
		$this->db->insert('user', $user_array);
		return $this->db->insert_id();
	}

	function get_all()
	{
		$sql = "SELECT * FROM user";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function login( $email, $pass )
	{
		// $pass = md5( $pass );
		$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$pass'";
		$query = $this->db->query( $sql );
		return $query->result();
	}

	function get_user_room_types( $id )
	{
		$sql = "SELECT room_type.id, room_type.title, room_type.image FROM room_type JOIN room_type_user ON room_type_user.room_type = room_type.id JOIN user ON user.id = room_type_user.user WHERE user.id = $id";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function get_room_type_styles($id){
		$sql = "SELECT style.id AS style_id, style.title AS style_title, style.description AS style_desc, style.img AS style_img FROM style LEFT OUTER JOIN style_room_type ON style.id = style_room_type.style_id WHERE style_room_type.room_type_id = $id";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function get_user_plan( $id )
	{
		$sql = "SELECT * FROM user WHERE id = $id";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function verify_login($email, $password)
	{
		// $sql = "select * from user where email = '" . $email . "' and password = '" . md5($password)."'";
		$sql = "select * from user where email = '" . $email . "' and password = '" . $password."'";
		$query = $this->db->query($sql);
		return $query;
	}

	function check_email($email)
	{
		$sql = "select * from user where email = '" . $email . "'";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
			return TRUE;
		else return FALSE;
	}

	function save_furniture($url, $background_image, $user_id)
	{
		$sql = "INSERT INTO gallery (url, background_image, user_id) VALUES ('$url', '$background_image', $user_id)";
		$query = $this->db->query($sql);
		return $query;
	}

	function get_user_furniture($user_id)
	{
		$sql = "SELECT * FROM gallery WHERE user_id = $user_id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

}