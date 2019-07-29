<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {


function __construct(){

   		parent::__construct();

		$this->load->library('session');
 		if(!$this->session->userdata('admin_mockup_logged_in'))
	 		redirect('admin/login');

	 	$this->load->library('parser');
	 	$this->load->model('admin/users_model' , 'user_instance' , TRUE);
	 	$this->load->helper(array('form', 'url'));
 	}

 	public function index()
	{
		$data = array('users' => $this->user_instance->getUsers());
		$data['tab']="users";

		$this->parser->parse('admin/manage-users',$data);
	}


	public function create()
	{

		$data['tab']="users";
		$image = $this->verifyImage();

		if($this->validateForm())
		{
			if(!$image){
				$this->session->set_flashdata('error','An Image is Required');
				$this->parser->parse('admin/create-user' , $data);
				// redirect('admin/users/create');
				return;
			}
			$data = $this->input->post();
			$firstname = $data['fname'];
			$lastname = $data['lname'];
			$email = $data['email'];
			$password = $data['password'];

			$this->user_instance->createUser($firstname, $lastname , $email , $password , $image);
      $msg = 'Dear '.$email.',<br><br>Please visit <a href="http://staging.qpixdev.com/mockup/">Mockup Studio</a> and login using your account,<br><br>Your password is '.$password.',<br><br>Best Regards,<br>Mockup Studio Team,';
      $this->send_email( $email, "Mockup Studios has added you as a user.", $msg);

            $this->session->set_flashdata('info','Successfully Created User!');
            redirect('admin/users/');

		}
		else
		{
			if(!$image){
				$this->session->set_flashdata('error','An Image is Required');
			}
            $this->parser->parse('admin/create-user' , $data);
		}

	}

function send_email($email, $subject, $msg)
{
  $receiver  = $email;
  $title = $subject;
  $sender  = "Mockup Studios";
  $sender_mail = "osherif@qpixsolutions.com";
  $message = '<html><body>';
  //$message .= "Hey $mail,<br><br>";
  $message .= $msg;
  $message .= "</body></html>";
  $ci = get_instance();
  $ci->load->library('email');
  $config['protocol'] = "smtp";
  $config['smtp_host'] = "ssl://smtp.gmail.com";
  $config['smtp_port'] = "465";
  $config['smtp_user'] = "osherif@qpixsolutions.com";
  $config['smtp_pass'] = "Oo123456..";
  $config['charset'] = "utf-8";
  $config['mailtype'] = "html";
  $config['newline'] = "\r\n";
  $ci->email->initialize($config);

  $ci->email->from($sender_mail, $sender);
  $list = array($receiver);
  $ci->email->to($list);
  $this->email->reply_to('mou.mustafa.89@gmail.com', 'Mallet');
  $ci->email->subject($title);
  $ci->email->message($message);
  // $ci->email->send();
  if(!$ci->email->send())
  {
     $this->email->print_debugger();
  //   echo "yes";
  // }
  // else {
  //   echo "no";
  }
}

public function delete_user($id)
{

	$this->user_instance->deleteUser($id);
	$this->session->set_flashdata('info','User '.$id.' Deleted!');
	redirect('admin/users/');
}

	function verifyImage()
	{
		$config = array(
		'upload_path' => getcwd()."/public/img/designs/",
		'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'max_size' => "2048000"
		);

		$this->load->library('upload', $config);
		$image = $this->upload->do_upload();

		if($image)
		{
			$temp = $this->upload->data();
			return $temp['file_name'];
		}
		else
			return false;
	}
	function validateForm()
	{
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|max_length[120]');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|max_length[120]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[120]|callback_email_check');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[60]|min_length[5]');

        if ($this->form_validation->run() == FALSE)
        	return false;
        else
			return true;
	}

	function callback_email_check($email)
	{
		return $this->user_instance->checkEmail($email);
	}


	public function edit($id)
	{
		if(!isset($id))
			redirect('admin/users/');

		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|max_length[120]');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|max_length[120]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[120]');
		$this->form_validation->set_rules('password', 'Password', 'trim|max_length[60]|min_length[5]');

        if ($this->form_validation->run() == TRUE)
		{
			$tempold = $this->user_instance->getSingleUser($id);
			$old = $tempold[0];


			$data = $this->input->post();
			$firstname = $data['fname'];
			$lastname = $data['lname'];
			$email = $data['email'];

			if($data['password']=="")
				$password = $old->password;
			else
				// $password = md5($data['password']);
				$password = $data[ 'password' ];
			$image = $this->verifyImage();
			if($image == FALSE)
				$image = $old->img;

			$this->user_instance->updateUser($id, $firstname, $lastname , $email , $password , $image);

            redirect('admin/users/');
		}
		else
		{
			$data['tab']="users";
            $data = array('user' => $this->user_instance->getSingleUser($id));
			$this->parser->parse('admin/edit-users',$data);
		}
	}
	public function showUser($id)
	{
		$data['tab']="users";
		$user_show = $this->user_instance->showUser($id);
		$data = array('user' => $user_show);
		$this->parser->parse('admin/editUser_view',$data);
	}

	public function editUser($id)
    {
    	$data['tab']="users";
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $this->user_instance->editUser($id, $first_name, $last_name, $email, $password);

        $this->index();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
