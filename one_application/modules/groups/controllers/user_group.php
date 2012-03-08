<?php  
/**
* 
*/
class User_group extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_group_model','get_db');
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