<?php class Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

function islogged()
    {

    if ($this->session->userdata('username'))
            {
                    $user = $this->session->userdata('username');
                    $password =$this->session->userdata('password');


                       if (isset($user))
                        {
                              $this -> db -> select('id, username, password, auth');
                              $this -> db -> from('users');
                              $this -> db -> where('username', $user);
                              $this -> db -> where('password', $password);
                              $this -> db -> limit(1);

                              $query = $this -> db -> get();

                              if($query -> num_rows() == 1)
                              {
                                 foreach ($query->result() as $row)
                                    {
                                      return $row->auth;
                                    }

                              }


                        }
                        else
                              {
                                return false;
                              }


            }
    }
function getpost($cat)
    {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('cat',$cat);
        $query = $this -> db -> get();

              if($query -> num_rows() > 0)
              {
                return $query->result();
              }
              else
              {
                return false;
              }
    }
function getimages($cat)
    {
        $this->db->select('*');
        $this->db->where('cat',$cat);
        $this->db->from('images');
        $query = $this -> db -> get();

              if($query -> num_rows() > 0)
              {
                return $query->result();
              }
              else
              {
                return false;
              }
    }

function savenewpost($txt,$cat)
    {
         $data = array(
			       'txt' => $txt,
			       'cat' => $cat
			);

	if (!$this->db->insert('posts', $data))
            {echo  $this->db->_error_message(); }
    }

function savepost()
    {
         $where = $this->input->post('id');
         $data = array(
			       'txt' => $this->input->post('txt')

			);
	$this->db->where('id', $where);
	if (!$this->db->update('posts', $data))
            {echo  $this->db->_error_message(); }

    }
function savehome($where,$txt)
    {

         $data = array(
			       'txt' => $txt
			);
	$this->db->where('id', $where);
	if (!$this->db->update('posts', $data))
            {echo  $this->db->_error_message(); }

    }
function updateimgtxt($id,$txt,$width)
    {
		$data = array(

			       'txt' => $txt,
			       'width' => $width

			     );
	        $this->db->where('id', $id);
	        if (!$this->db->update('images', $data))
		    {echo  $this->db->_error_message(); }


    }

function deleteimage($id,$type)
    {
	if ($this->db->delete('images', array('id' => $id)))
           {
                $path = 'upload/img/'.$id.'.jpg';
		$pathg = 'upload/img/'.$id.'.gif';
                if(unlink($path))
		    {
			if ($type='video') {unlink($pathg);}
			return true;
		     }
                else {
                      return false;
                    }


            }
           else {echo  $this->db->_error_message(); }
    }
function deletepost($where)
    {

	if (!$this->db->delete('posts', array('id' => $where)))
            {echo  $this->db->_error_message(); }
    }
function login($username, $password)
            {

              $this -> db -> select('id, username, password');
              $this -> db -> from('users');
              $this -> db -> where('username', $username);
              $this -> db -> where('password', MD5($password));
              $this -> db -> limit(1);

              $query = $this -> db -> get();

              if($query -> num_rows() == 1)
              {
                return $query->result();
              }
              else
              {
                return false;
              }
            }


function getfieldbyid($db,$field,$whereid)
    {

                              $this -> db -> select($field);
                              $this -> db -> from($db);
                              $this -> db -> where('id', $whereid);
                              $this -> db -> limit(1);
                              $query = $this -> db -> get();
                              if($query)
                              {
                              foreach ($query->result() as $row)
                              {
                                return $row->$field;
                              }
                              }else {return false;}

    }


 function getfieldbyfield($db,$field,$wherefield,$whereid)
    {

                              $this -> db -> select($field);
                              $this -> db -> from($db);
                              $this -> db -> where($wherefield, $whereid);
                              $this -> db -> limit(1);
                              $query = $this -> db -> get();
                              if($query)
                              {
                              foreach ($query->result() as $row)
                              {
                                return $row->$field;
                              }
                              }else {return false;}

    }



//FACTORY SECTION START

			    //TABLES PARAMETERS SECTION START

				    function gettablefieldnames($table)
					{
					    $names='';
						foreach($this->db->list_fields($table) as $fieldname)
						{

						  $names.="<th>".$fieldname."</th>";

						}
					    return $names;
					}

				    function gettablefieldedit($table,$params)
					{
					    $lenght = count($this->db->list_fields($table));
					    $resp = floor(12/($lenght));
					    switch($params)
						    {
							    case 'add':
								    $names="<div class='col-md-12 editform'><form class='form' action='URL/main/navigate' method='post' role='form'>";

								    $first = false;
									foreach($this->db->list_fields($table) as $fieldname)
									{
									 if($first)
									 {
									  $names.="<div class='col-md-$resp' style='padding:0px;'>
										   <input type='text' class='form-control input-sm edittableform' name='$fieldname' placeholder='$fieldname' value=''>
										   </div>";
									 } else {
										  $names.="<input type='hidden' class='edittableform' name='$fieldname'  value=''>";
										  $names.="<input type='hidden' class='edittableform' name='table' value='$table'>";
										 }
									 $first=true;
									}
								    $names.="<div class='col-md-4 col-md-offset-8' style='margin-top:10px;'><button type='submit' name='navigate' value='add' class='btn btn-sm btn-default pull-right'>Add</button>";
								    $names.="</div></form>
									     </div>";
								    return $names;
							    break;
							    case 'edit':
								    $names='<div class="col-md-12 editform"><form class="form" method="post" role="form">';

								    $first = false;
									foreach($this->db->list_fields($table) as $fieldname)
									{
									 if($first)
									 {
									  $names.="<div class='col-md-$resp' style='padding:0px;'>
										   <input type='text' class='form-control input-sm edittableform' name='$fieldname' placeholder='$fieldname' value=''>
										   </div>";
									 } else {
										  $names.="<input type='hidden' class='edittableform' name='$fieldname'  value=''>";
										  $names.="<input type='hidden' class='edittableform' name='table' value='$table'>";
										 }
									 $first=true;
									}
								    $names.="<div class='col-md-4 col-md-offset-8' style='margin-top:10px;'>";
								    $names.="<button type='submit' name='navigate' value='save' class='btn btn-sm btn-default pull-right'>Save</button></div></form>
									     </div>";
								    return $names;
							    break;
							    case 'all':
								    $names="<div class='col-md-12 editform'><form class='form' action='index.php/main/navigate' method='post' role='form'>";

								    $first = false;
									foreach($this->db->list_fields($table) as $fieldname)
									{
									 if($first)
									 {
									  $names.="<div class='col-md-$resp' style='padding:0px;'>
										   <input type='text' class='form-control input-sm edittableform' name='$fieldname' placeholder='$fieldname' value=''>
										   </div>";
									 } else {
										  $names.="<input type='hidden' class='edittableform' name='$fieldname'  value=''>";
										  $names.="<input type='hidden'  name='table' value='$table'>";
										 }
									 $first=true;
									}
								    $names.="<div class='col-md-4 col-md-offset-8' style='margin-top:10px;'><button type='submit' name='navigate' value='add' class='btn btn-sm btn-default pull-right'>Add</button>";
								    $names.="<button type='submit' name='navigate' value='save' class='btn btn-sm btn-default pull-right'>Save</button></div></form>
									     </div>";
								    return $names;
							    break;
							    case 'delete':
								    $names="<div class='col-md-12 editform'><form class='form' action='index.php/main/navigate' method='post' role='form'>";

								    $first = false;
									foreach($this->db->list_fields($table) as $fieldname)
									{
									 if($first)
									 {
									  $names.="<div class='col-md-$resp' style='padding:0px;'>
										   <input type='text' class='form-control input-sm edittableform' name='$fieldname' placeholder='$fieldname' value=''>
										   </div>";
									 } else {
										  $names.="<input type='hidden' class='edittableform' name='$fieldname'  value=''>";
										  $names.="<input type='hidden' class='edittableform' name='table' value='$table'>";
										 }
									 $first=true;
									}
								    $names.="<div class='col-md-4 col-md-offset-8'>";
								    $names.="</div></form>
									     </div>";
								    return $names;
							    break;
							    case 'view':
								    $names="<div class='col-md-12 editform'><form class='form' action='index.php/main/navigate' method='post' role='form'>";

								    $first = false;
									foreach($this->db->list_fields($table) as $fieldname)
									{
									 if($first)
									 {
									  $names.="<div class='col-md-$resp' style='padding:0px;'>
										   <input type='text' class='form-control input-sm edittableform' name='$fieldname' placeholder='$fieldname' value=''>
										   </div>";
									 } else {
										  $names.="<input type='hidden' class='edittableform' name='$fieldname'  value=''>";
										  $names.="<input type='hidden'  name='table' value='$table'>";
										 }
									 $first=true;
									}
								    $names.="<div class='col-md-4 col-md-offset-8'>";
								    $names.="</div></form>
									     </div>";
								    return $names;
							    break;
						    }

					}

				     function gettablefieldcontent($table,$params)
					{
					    switch($params)
						    {
							    case 'view':
									    foreach($this->db->list_fields($table) as $fieldname)
										    {

										       $names[]=$fieldname;

										    }

										 $content='';

										 $this -> db -> select('*');
										 $this -> db -> from($table);
										 $query = $this -> db -> get();
												      if($query)
												      {

													    foreach ($query->result() as $row)
													    {
													     $content.="<tr>";
													       foreach($names as $rowname)
														  {
														       $content.="<td>".$row->$rowname."</td>";
														  }
													     $content.="</tr>";
													    }

												      }else {return false;}

										return $content;

							    break;
							    case 'edit':
									    foreach($this->db->list_fields($table) as $fieldname)
										    {

										       $names[]=$fieldname;

										    }

										 $content='';

										 $this -> db -> select('*');
										 $this -> db -> from($table);
										 $query = $this -> db -> get();
												      if($query)
												      {

													    foreach ($query->result() as $row)
													    {
													     $content.="<tr>";
													       foreach($names as $rowname)
														  {
														       $content.="<td>".$row->$rowname."</td>";
														  }
													      $content.="<td>
															 <button class='edit'><span class='glyphicon glyphicon-pencil'></span></button>
															</td>";
													      $content.="</tr>";
													    }

												      }else {return false;}

										return $content;

							    break;
							    case 'delete':
									    foreach($this->db->list_fields($table) as $fieldname)
										    {
										       $names[]=$fieldname;
										    }

										 $content='';

										 $this -> db -> select('*');
										 $this -> db -> from($table);
										 $query = $this -> db -> get();
												      if($query)
												      {
													    foreach ($query->result() as $row)
													    {
													     $content.="<tr>";
													     $id=$row->$names[0];
													     foreach($names as $rowname)
														  {
														       $content.="<td>".$row->$rowname."</td>";
														  }
													     $content.="<td>
															    <form  action='index.php/main/navigate' method='post' role='form'>
																<input type='hidden' name='id' value='$id'>
																<input type='hidden' name='table' value='$table'>
																<button onClick='return confirmdia();' type='submit' name='navigate' value='delete'>
																<span  class='glyphicon glyphicon-remove' ></span>
																</button>
															    </form>
															 </td>";
													     $content.="</tr>";
													    }

												      }else {return false;}

										return $content;
							    break;
							    case 'all':
									    foreach($this->db->list_fields($table) as $fieldname)
										    {

										       $names[]=$fieldname;

										    }

										 $content='';

										 $this -> db -> select('*');
										 $this -> db -> from($table);
										 $query = $this -> db -> get();
												      if($query)
												      {
													    foreach ($query->result() as $row)
													    {
													     $id=$row->$names[0];
													     $content.="<tr>";
													       foreach($names as $rowname)
														  {
														       $content.="<td>".$row->$rowname."</td>";
														  }
													     $content.="<td>
															 <button class='edit'><span class='glyphicon glyphicon-pencil'></span></button>
															</td>";
													     $content.="<td>
															    <form  action='index.php/main/navigate' method='post' role='form'>
																<input type='hidden' name='id' value='$id'>
																<input type='hidden' name='table' value='$table'>
																<button onClick='return confirmdia();' type='submit' name='navigate' value='delete'>
																<span  class='glyphicon glyphicon-remove' ></span>
																</button>
															    </form>
															 </td>";
													     $content.="</tr>";
													    }

												      }else {return false;}

										return $content;
							    break;
						    }

					}

			    //TABLES PARAMETERS SECTION  END

			    //MANUPULATE DB ROWS START
				    function gettablecolomnsnames($table)
					{
					    return $this->db->list_fields($table);
					}


				    function addrow($table)
					{

					    $fields=$this->gettablecolomnsnames($table);
					    foreach($fields as $index=>$row)
						{  if($index==0)
							{
								$data[$row]='';
							} else { $data[$row]=$this->input->post($row);}
						}

						    if (!$this->db->insert($table,$data)) {
								    return $this->db->_error_number();
								} else {return true;}

					}
				    function deleterow($table)
					{
					    $this->db->where('id', $this->input->post('id'));
						    if (!$this->db->delete($table)) {
								    return $this->db->_error_message();;
								} else {return true;}

					}
				    function saverow($table)
					{
					    $fields=$this->gettablecolomnsnames($table);
					    foreach($fields as $index=>$row)
						{  if($index==0)
							{
							       $id = $this->input->post($row);
							} else { $data[$row]=$this->input->post($row);}
						}

						 $this->db->where($fields[0], $id);
					    if (!$this->db->update($table,$data)) {
								    return $this->db->_error_number();
								} else {return true;}

					}
			    //MANUPULATE DB ROWS END

//FACTORY SECTION END

}
?>