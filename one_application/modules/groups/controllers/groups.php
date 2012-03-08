<?php
/**
* 
*/
class Groups extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('group_model','get_db');
	}

	function index(){
		$this->data['content'] = 'groups/index';
		$this->load->view('themes/main_admin', $this->data);
	}

	function do_add(){
		$this->data['content']='form_add';
		$this->load->view('themes/main_admin', $this->data);
	}

	function do_edit(){
		$this->data['content']='groups/form_edit';
		$this->load->view('themes/main_admin', $this->data);
	}

	function do_insert($params = null){

	}

	function do_update($params = null){
		
	}

	function do_delete($params = null){

	}
}
?>