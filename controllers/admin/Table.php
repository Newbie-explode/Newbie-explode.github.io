<?php 
class Table extends CI_Controller 
{
	function __construct()
	{
	/*call CodeIgniter's default Constructor*/
	parent::__construct();
	if(!$this->session->userdata('admin'))
			redirect('admin/display_records');
	}

	function index()
	{
		/*load registration view form*/
		$this->load->view('admin/dashboard');
	}

		/*Retrieve*/
	function displaydata()
	{
		

		/*load Model*/
		$this->load->model('admin');

		$result['data']=$this->admin->display_records();
      	$this->load->view('admin/parcel-list',$result);   		
	}
}
?>