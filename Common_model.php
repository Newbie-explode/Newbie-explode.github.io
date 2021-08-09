<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Common_model extends CI_Model {
 
    public function __construct() {
 
        parent::__construct();
        $this->load->database();
 
    }
    function verifyuser($email,$pass)
    {
        $this->db->select('*');
        $this->db->where('user_email',$email);
        $this->db->where('user_password',md5($pass));
        $this->db->limit('1');
        $query = $this->db->get('users');
        $row = $query->row_array();
        return $row;
    }
 
 
    public function insert($table,$product_data)
    {
        if($this->db->insert($table,$product_data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
 
 
    public function insert_and_get_last_inserted_id($table,$product_data)
    {
        if($this->db->insert($table,$product_data))
        {
            return $this->db->insert_id();
        }
        else
        {
            return false;
        }
    }
 
    public function update($table,$where_array,$update)
    {
 
        $this->db->where($where_array);
 
        if($this->db->update($table,$update))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
 
    public function delete_data($table,$where)
    {
 
        if($this->db->delete($table,$where))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>