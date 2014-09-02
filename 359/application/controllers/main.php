<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

 function __construct() {

        parent::__construct();
	 session_start();
         $GLOBALS['supermessage']='';
          }

function main()
    {
        $this->load->view('header_view');
	$field['home'] = $this->model->getpost(1);
	$field['imagesgalvideo'] = $this->model->getimages(2);
	$field['whoarewe'] = $this->model->getpost(3);
	$this->load->view('popup_view');
        $this->load->view('user_main_view',$field);
	$this->load->view('user_main_view_scripts');
        $this->load->view('footer_view');
    }
 function main_admin()
    {
        $this->load->view('header_view');
	$field['home'] = $this->model->getpost(1);
	$field['whoarewe'] = $this->model->getpost(3);
	$field['whoareweimg'] = $this->model->getimages(3);
	$field['imagesgalvideo'] = $this->model->getimages(2);

	//FACTORY LOAD TABLE START
	$tablefield = $this->factory->gettablefields('users','all'); //load table fields :view:edit:delete:add:all: options
	$field['table'] = $this->parser->parse('table_template',$tablefield, TRUE); //load table view



	$this->load->view('popup_view');
	$this->load->view('user_main_view_admin',$field);
	$this->load->view('user_main_view_admin_scripts');
        $this->load->view('footer_view');
    }
 function savenewpost()
  {

    if ($this->model->islogged()==1)
                        {
			 $cat = $this->input->post('cat');
			 $txt = $this->input->post('txt');
			 $this->model->savenewpost($txt,$cat);
			 redirect('/');
			}
			 else {
			 $this->main();
			}
  }
 function savepost()
  {

    if ($this->model->islogged()==1)
                        {
			 $this->model->savepost();
			 redirect('/');
			}
			 else {
			 $GLOBALS['supermessage']="no cheating";
			 $this->main();
			}
  }
 function savehome()
  {

    if ($this->model->islogged()==1)
                        {
			 $where = $this->input->post('id');
			 $txt=$this->input->post('txt');
			 $txt = str_replace('"',"'", $txt);
			 $this->model->savehome($where,$txt);
			 redirect('/');
			}
			 else {
			 $this->main();
			}
  }
 function deletepost()
  {

    if ($this->model->islogged()==1)
                        {
			 $where = $this->input->post('id');
			 $this->model->deletepost($where);
			 redirect('/');
			} else {
			  $this->main();
			}
  }


function makejpg($src, $dest) {
				$source_image = imagecreatefromgif($src);
				imagefilter($source_image, IMG_FILTER_GRAYSCALE);
				imagejpeg($source_image, $dest);
			      }


function deleteimage()
 {
    if ($this->model->islogged()==1)
                        {
			 $id =   $this->input->post('id', TRUE);
			 $type =   $this->input->post('type', TRUE);
			 if ($this->model->deleteimage($id,$type))

			 {
			  //$this->model->deletepost($this->model->getfieldbyfield('posts','id','img',$_POST['id']));
			  echo "image deleted";
			 } else {echo "failed";}

			}
			 else {
			 $this->main();
			}
 }

 public function upload()
    {

     if ($this->model->islogged()==1)
                        {
			   $cat = $this->input->post('cat');
			   $type = $this->input->post('type');
			   $txt = $this->input->post('txt');
			   $postbind = $this->input->post('postbind');
			   $data = array
			    (
			       'cat' => $cat,
			       'txt' => $txt,
			       'postbind' => $postbind
			    );

			    $this->db->insert('images', $data);
			    $id = $this->db->insert_id();

			      $config['upload_path'] =HDD.'upload/img/';
			      if ($cat == 2) {
					      $config['allowed_types'] = 'gif';
					     } else {$config['allowed_types'] = 'jpg|jpeg';}
			      $config['file_name'] = $id;
			      //$config['max_size']	= '100';
			      //$config['max_width']  = '1024';
			      //$config['max_height']  = '768';

			      $this->load->library('upload', $config);

			      if (! $this->upload->do_upload('image'))
			      {

				  $this->db->delete('images', array('id' => $id));
				  echo $this->upload->display_errors();

			      }
			      else
			      {
			       if ($type=='ajax')
			         {
				           echo     "<script>top.$('.mce-btn.mce-open').parent().find('.mce-textbox').val('".URL."upload/img/".$this->upload->data()['file_name']."').closest('.mce-window').find('.mce-primary').click();</script>";
				 }

			       if ($type=='video')
			         {
				    $src= HDD.'upload/img/'.$id.'.gif';
				    $dest= HDD.'upload/img/'.$id.'.jpg';
				    $this->makejpg($src, $dest);
				    redirect('/');
				 }
			      }
			}
			 else {
			 $GLOBALS['supermessage']="no cheating";
			 $this->main();
			}

    }
public function index()
	{

		if ($this->model->islogged()==1)
                        {

                          $this->main_admin();

                        } else
                          {
                              $this->main();
                          }
	}


 function updateimgtxt()
  {

    if ($this->model->islogged()==1)
                        {
			 $id=$this->input->post('id');
			 $txt=$this->input->post('txt');
			 $txt = str_replace('"',"'", $txt);
			 $start=strrpos($txt, "width='")+7;
			 $end = stripos ( $txt ,"'" , $start );
			 $width = substr ($txt, $start, $end-$start)+40;
			 $this->model->updateimgtxt($id,$txt,$width);
			 redirect('/');
			}
			 else {
			 $this->main();
			}
  }

function navigate()
	 {
	  $navigate= $this->input->post('navigate');
	  switch ($navigate) {
					      case 'add':
					        $table= $this->input->post('table');
						if($this->model->addrow($table)===1452)  // check forreign key error
						       {
							   echo 'Tables are binded by ID field make sure to use correct values';
						       } else {redirect(URL);}
					      break;
					      case 'save':
					       $table= $this->input->post('table');
					       if($this->model->saverow($table)===1452)  // check forreign key error
						       {
							    echo 'Tables are binded by ID field make sure to use correct values';
						       } else {redirect(URL);}
					       break;

					       case 'delete':
						$table= $this->input->post('table');
						if($this->model->deleterow($table))
						       {
							   redirect(URL);
						       } else {echo 'ERROR';}
					       break;

			     }
	 }

function validatecaptcha()
 {
    if (!empty($_REQUEST['captcha'])) {
				       if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha'])
					  {
					    unset($_SESSION['captcha']);
					    return false;

					   } else {
						     unset($_SESSION['captcha']);
						     return true;
						  }
				       }
 }
function submit()
   {
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[28]');
    $this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_validatecaptcha');
    $this->form_validation->set_rules('msg', 'Message', 'required');
     if ($this->form_validation->run() == FALSE)
		{
			 echo "<div class='alert alert-danger' role='alert'><strong>".validation_errors()."</strong></div>";
		}
		else
		{
			 echo "<div class='alert alert-success' role='alert'><strong>Message Sent</strong></div>";
		}
   }


public function logout()
  {

   $this->session->sess_destroy();
   redirect('/', 'refresh');

  }

}
