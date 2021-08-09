<?php
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin'))
			redirect('admin/dashboard');
	}
	function index()
	{
		$this->load->view('admin/dashboard');
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}
}