<?php
Class Users_model extends CI_Model
{
	function getUsers()
	  {
	    $sql = "SELECT * FROM user";

	    $query=$this->db->query($sql);
	      if ($query->num_rows>0)
	        return $query->result();
	      else
	        return false ;
	  }
	function getSingleUser($id)
	{
		$sql = "SELECT * FROM user WHERE id = $id";

		$query=$this->db->query($sql);

		if ($query->num_rows==1)
			return $query->result();

		return false ;
	}
	function createUser( $firstname, $lastname ,$email ,$password ,$img )
	{
		// $password = md5($password);

		$sql = "INSERT INTO user ( firstname , lastname , email , password , img , modified) VALUES ( '$firstname' , '$lastname' , '$email' , '$password' , '$img' , now() )";

		$result = $this->db->query($sql);

		if ($result)
			return $this->db->insert_id();

			////////////
			// $msg = 'Dear '.$lastname.',<br><br>Please visit <a href="http://staging.qpixdev.com/mockup/">Mockup Studio</a> and login using your account,<br><br>Your password is '.$password.',<br><br>Best Regards,<br>Mockup Studio Team,';
			// $this->send_mail( $email, "Mockup Studio has added you as a user.", $msg);
		return false ;
	}

	// function send_mail( $mail, $subject, $msg ){
  //       $receiver  = $mail;
  //       $title = $subject;
  //       $sender  = "Mockup Studios";
  //       $sender_mail = "dina.moh.m@gmail.com";
  //       $message = '<html><body>';
  //       //$message .= "Hey $mail,<br><br>";
  //       $message .= $msg;
  //       $message .= "</body></html>";
  //       $ci = get_instance();
  //       $ci->load->library('email');
  //       $config['protocol'] = "smtp";
  //       $config['smtp_host'] = "ssl://smtp.gmail.com";
  //       $config['smtp_port'] = "465";
  //       $config['smtp_user'] = "dina.moh.m@gmail.com";
  //       $config['smtp_pass'] = "DDDMoh9394";
  //       $config['charset'] = "utf-8";
  //       $config['mailtype'] = "html";
  //       $config['newline'] = "\r\n";
  //       $ci->email->initialize($config);
	//
  //       $ci->email->from($sender_mail, $sender);
  //       $list = array($receiver);
  //       $ci->email->to($list);
  //       $this->email->reply_to('dina.moh.m@gmail.com', 'Mallet');
  //       $ci->email->subject($title);
  //       $ci->email->message($message);
  //       // $ci->email->send();
  //       if(!$ci->email->send())
  //       {
  //         //  $this->email->print_debugger();
	// 				echo "yes";
  //       }
	// 			else {
	// 				echo "no";
	// 			}
  //   }

	public function updateUser($id , $firstname, $lastname , $email, $password, $img)
	{

		$sql = "UPDATE user SET firstname = '$firstname' , lastname = '$lastname' , email = '$email' , password = '$password' , img = '$img' , modified = now() WHERE id = $id";
		$result = $this->db->query($sql);

		if($result)
			return true;

		return false;
	}
	public function deleteUser($id)
	{
		// Deleting the Image
		$image = $this->getSingleUser($id);
		$image = $image[0];
		$image = $image->img;
		unlink("./public/img/designs/$image");

		// Deleting The Record
		$sql = "DELETE FROM user WHERE id = '$id' ";
		$result = $this->db->query($sql);

		// Delete user styles ..
		$sql = "DELETE FROM room_type_user WHERE user = $id";
		$this->db->query( $sql );

		if($result)
			return true;

		return false;
	}

	////////////////////////

	public function checkEmail($email)
	{
		$sql = "SELECT * FROM user WHERE email = '$email'";

		$query=$this->db->query($sql);

		if ($query->num_rows==1)
			return false;

		return true;
	}

	public function showUser($id)
	{
		$sql = "SELECT * FROM user WHERE id='$id'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function editUser($id, $firstname, $lastname, $email,$password)
    {
        $sql="UPDATE user SET firstname='$firstname', lastname='$lastname', email='$email',password='$password' WHERE id='$id'";
        $query = $this->db->query($sql);
    }

    function count()
   {
      $sql = "SELECT count(id) FROM user";
      $query = $this->db->query($sql);
      $temp = $query->row_array();
      return $temp['count(id)'];
   }

}
