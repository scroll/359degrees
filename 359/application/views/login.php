
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   session_start();
   
 }

function verifylogin()
 {
   
  if ($this->model->islogged()==1)
                        {
                        
                        } else {
                                   $this->form_validation->set_rules('username', 'потребител', 'trim|required|xss_clean');
                                   $this->form_validation->set_rules('password', 'парола', 'trim|required|xss_clean|callback_check_database');
                                  if($this->form_validation->run())
                                  {
                                   redirect('/', 'refresh');
                                   
                                  }   else {
                                             // $this->main();
                                           
                                           }
                                }

 }
 
 
 function check_database($password)
 {
  
   //Field validation succeeded.&nbsp; Validate against database
   $username = $this->input->post('username');
   
   //query the database
   $result = $this->user_model->login($username, $password);

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

    $_SESSION = $sess_array;
  
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

