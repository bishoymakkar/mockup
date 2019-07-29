<?php
Class Blueprint_model extends CI_Model
{
	function getBlueprints()
	  {	
	    $sql = "SELECT * FROM blueprint";

	    $query=$this->db->query($sql);
	      if ($query->num_rows>0)
	        return $query->result();
	      else 
	        return false ;
	  }
	function getSingleBlueprint($id)
	{	
	$sql = "SELECT * FROM blueprint WHERE id = $id";

	$query=$this->db->query($sql);
	  if ($query->num_rows==1)
	    return $query->result();
	  else 
	    return false ;
	}
	function createBlueprint($title, $img , $user_id)
	{	
	$sql = "INSERT INTO blueprint ( title , img , user_id , modified) VALUES ( '$title' , '$img' , $user_id , now() )";

	$result = $this->db->query($sql);
	  if ($result)
	    return $this->db->insert_id();
	  else 
	    return false ;
	}
}