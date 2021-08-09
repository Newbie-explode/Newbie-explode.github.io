<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Rider_Controller extends CI_Controller {
  
     public function __construct()
        {
         parent::__construct();
         $this->load->model('Form_model');
             $this->load->library(array('form_validation','session'));
                 $this->load->helper(array('url','html','form'));
                 $this->rider = $this->session->userdata('rider');
        }
  
  
    public function index()
    {
     $this->load->view('rider/RiderLoginpage');
    }
    public function post_login()
    {
 
        $this->form_validation->set_rules('rideremail', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() == FALSE)
        {  
            $this->load->view('rider/RiderLoginpage');
        }
        else
        {   
            $data = array(
               'email' => $this->input->post('rideremail'),
               'password' => md5($this->input->post('password')),
 
             );
   
            $check = $this->Form_model->auth_check($data);
            
            if($check != false)
            {
 
                 $user = array(
                 'rider' => $check->name,
                 'rideremail' => $check->email,
                 'password' => $check->Password
                );
  
            $this->session->set_userdata($user);
 
             redirect( base_url('rider/riderDashboard') ); 
            }
 
           $this->session->set_flashdata('message', 'Invalid email or password');
           redirect('rider/Rider_Controller');
        }
         
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('rider/Rider_Controller'));
    }    

    public function dashboard()
    {
       if(empty($this->rider_name))
        {
            redirect(base_url('rider/Rider_Controller'));
        }

       $this->load->view('rider/riderDashboard');
    }
}