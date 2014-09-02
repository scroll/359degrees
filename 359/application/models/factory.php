<?php
class Factory extends CI_Model
{
  
  public function gettablefields($field,$var) //GENERATES TABLE FIELDS BY PARAMETER $VAR
    {
     if($this->db->table_exists($field))
	{
	    switch($var)
		{
		    case 'view':
			$tablefield['name'] = $field;
			$tablefield['names'] = $this->model->gettablefieldnames($field);
			$tablefield['content'] = $this->model->gettablefieldcontent($field,'view'); //load table fields :view:edit:delete:all: options 
			$tablefield['edit'] = $this->model->gettablefieldedit($field,'view');
			return  $tablefield; 
		    break;
		    case 'edit':
			$tablefield['name'] = $field;
			$tablefield['names'] = $this->model->gettablefieldnames($field);
			$tablefield['content'] = $this->model->gettablefieldcontent($field,'edit'); //load table fields :view:edit:delete:all: options 
			$tablefield['edit'] = $this->model->gettablefieldedit($field,'edit');    //load table fields :add:edit:all:view options 
			return  $tablefield; 
		    break;
		    case 'delete':
			$tablefield['name'] = $field;
			$tablefield['names'] = $this->model->gettablefieldnames($field);
			$tablefield['content'] = $this->model->gettablefieldcontent($field,'delete'); //load table fields :view:edit:delete:all: options
			$tablefield['edit'] = $this->model->gettablefieldedit($field,'delete');   
			return  $tablefield; 
		    break;
		    case 'all':
			$tablefield['name'] = $field;
			$tablefield['names'] = $this->model->gettablefieldnames($field);
			$tablefield['content'] = $this->model->gettablefieldcontent($field,'all'); //load table fields :view:edit:delete:all: options 
			$tablefield['edit'] = $this->model->gettablefieldedit($field,'all');    //load table fields :add:edit:all:view options 
			return  $tablefield; 
		    break;
		     case 'add':
			$tablefield['name'] = $field;
			$tablefield['names'] = $this->model->gettablefieldnames($field);
			$tablefield['content'] = $this->model->gettablefieldcontent($field,'view'); //load table fields :view:edit:delete:all: options
			$tablefield['edit'] = $this->model->gettablefieldedit($field,'add');    //load table fields :add:edit:all:view options 
			return  $tablefield; 
		    break;
		}
	}
	
	else
	{
	    return false;
	}
     
    }

}
?>