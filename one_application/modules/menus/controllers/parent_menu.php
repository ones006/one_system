<?php
/**
* 
*/
class Parent_menu extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('parent_menu_model','get_db');
	}

	function index(){
		$this->data['content'] = 'index';
		$this->load->view('themes/main_admin', $this->data);
	}

	function do_add(){

	}

	function do_edit(){

	}

	function do_insert(){

	}

	function do_update(){
		
	}
}
?>