
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   session_start();

 }

function verifylogin()
 {
      $this->form_validation->set_rules('username', 'user', 'trim|required|xss_clean');
      $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');
     if($this->form_validation->run())
     {
      redirect('/', 'refresh');
     }   else {
                  $this->load->view('header_view');
                  $field['home'] = $this->model->getpost(1);
                  $field['imagesgalvideo'] = $this->model->getimages(2);
                  $field['whoarewe'] = $this->model->getpost(3);
                  $field['error'] = validation_errors();
                  $this->load->view('popup_view');
                  $this->load->view('user_main_view',$field);
                  $this->load->view('user_main_view_scripts');
                  $this->load->view('footer_view');
              }
 }


 function check_database($password)
 {

   //Field validation succeeded.&nbsp; Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->model->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'username' => $row->username,
         'password' => $row->password
       );


     }

   $this->session->set_userdata($sess_array);

     return TRUE;
   }
   else
   {
     session_unset();
     return false;
   }
 }






}

?>
