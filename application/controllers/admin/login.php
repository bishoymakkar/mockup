<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('admin/admin_users_model','admin_user_instance',TRUE);
   $this->load->library('session');

 }

 function index()
 {

  if($this->session->userdata('admin_mockup_logged_in'))
      redirect('admin/');

   //This method will have the credentials validation
   $this->load->library('form_validation');


   $this->form_validation->set_rules('admin_email', 'Email', 'trim|required|xss_clean');
   $this->form_validation->set_rules('admin_password', 'Password', 'trim|required|xss_clean|callback_check_database');


   if($this->form_validation->run() == FALSE){
      $this->load->view('admin/login');
   }else{
      redirect('admin/');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.&nbsp; Validate against database

   $email = $this->input->post('admin_email');
   //query the database
   $result = $this->admin_user_instance->login($email, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array('id' => $row->admin_id,'email' => $row->admin_email);
       $this->session->set_userdata('admin_mockup_logged_in', $sess_array);
     }

     // $theme_color = $this->user_instance->get_theme_color();
   
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid Email or Password');
     return FALSE;
   }
 }

 function logout()
 {
   $this->session->unset_userdata('admin_mockup_logged_in');
   redirect('admin/login');
 }

}
?>
