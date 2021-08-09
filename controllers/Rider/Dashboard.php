<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $set_session = $this->session->userdata('logged_in');
        if($set_session == 0){
            redirect('rider/riderloginpage');
        }
    }
public function index()
{

/*load Model*/
        $this->load->model('admin');

        $result['data']=$this->admin->display_records();
        $this->load->view('rider/riderDashboard',$result); 
}
}
?>