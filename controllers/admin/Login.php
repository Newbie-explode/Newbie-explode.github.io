<?php
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('admin'))
			redirect('admin/dashboard');
	}
	function index()
	{
		$this->load->view('admin/ninja-logintemp');
	}
	function verify()
	{
		//username:admin password:123456
		$this->load->model('admin');
		$check = $this->admin->validate();
		if($check)
		{
			$this->session->set_userdata('admin','2');
			redirect('admin/dashboard');
		}
		else
		{
			redirect('admin');
		}
	}

	function riderlogin()
	{
		$this->load->view('rider/riderloginpage');
	}
}