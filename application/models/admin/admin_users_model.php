<?php
Class admin_users_model extends CI_Model
{
	function login ($email , $password)
	  {	
	    $password = MD5($password);

	    $sql = "SELECT id AS admin_id ,email AS admin_email FROM admin_users WHERE email = '$email' AND password = '$password'";

	    $query=$this->db->query($sql);
	    
	      if ($query->num_rows==1)
	      {
	        return $query->result();
	      }
	      else 
	      {
	        return false ;
	      }
	  }

function get_admins(){

$sql = "SELECT * FROM user ";
		$query = $this->db->query($sql);
		return $query->result_array();


}





}