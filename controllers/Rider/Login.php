<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller
{
 
    function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
 
        $set_session = $this->session->userdata('logged_in');
        if ($set_session != 0) {
            redirect('rider/dashboard');
        }
    }
 
    public function index()
    {
        $this->load->view('rider/riderloginpage');
    }
 
    public function check()
    {
 
        if (isset($_POST['btnLogin'])) {
            $email = $_POST['txtEmail'];
            $password = $_POST['txtPassword'];
 
            $res = $this->common_model->verifyuser($email, $password);
 
            if (!empty($res)) {
                
                    $ses_user = array(
                        "user_id" => $res['user_id'],
                        "user_first_name" => $res['user_first_name'],
                        "user_last_name" => $res['user_last_name'],
                        "user_email" => $res['user_email'],
                        "logged_in" => 1
                    );
                    $this->session->set_userdata($ses_user);
                    redirect('rider/login');
            } else {
                $ses_user = array("logged_in" => 0);
                $this->session->set_userdata($ses_user);
                $this->session->set_flashdata('error', 'Invalid Usename or Password !!');
                redirect('rider/login');
            }
        }
 
    }
 
 
    public function register()
    {
        if ($this->input->post('btnRegister'))
        {
            $arrData["user_first_name"] = $_POST['txtFname'];
            $arrData["user_last_name"] = $_POST['txtLname'];
            $arrData["user_email"] = $_POST['txtEmail'];
            $arrData["user_password"] = md5($_POST['txtPassword']);
            $arrData["user_token"] = md5(time());
            $arrData["user_created"] = date('Y-m-d H:i:s');
            $last_insertId = $this->common_model->insert_and_get_last_inserted_id('users',$arrData);
 
 
            if ($last_insertId)
            {
                $this->session->set_flashdata('success', 'Register Successfully !!');
                redirect('rider/login');
 
            } else
            {
                $this->session->set_flashdata('error', 'Failed to Register !!');
                redirect('rider/login/register');
            }
 
        }
        $this->load->view('rider/register');
 
    }
 
 
    public function unique_email()
    {
        $que = 'SELECT user_email FROM users WHERE user_email = "' . $_POST['txtEmail'] . '"';
        $query1 = $this->db->query($que)->result_array();
        if (!empty($query1)) {
            echo 'true';
        } else {
            echo 'false';
        }
    }
 
    public function already_exists()
    {
        $que = 'SELECT user_email FROM users WHERE user_email = "' . $_POST['txtEmail'] . '"';
        $query1 = $this->db->query($que)->result_array();
        if (!empty($query1)) {
            echo 'false';
        } else {
            echo 'true';
        }
    } 

    public function adminlogin()
    {
        $this->load->view('admin/ninja-logintemp');
    }   
}