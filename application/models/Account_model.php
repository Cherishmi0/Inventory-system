<?php
class Account_model extends CI_Model {
    function __construct()
    {
        //parent::__construct();
        $this->load->library('session');
    }

    public function authanticate($email, $password){
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $this->db->where('status', 1);
        $query = $this->db->get('user');
        if(!empty($query->result())){
            $row = $query->row();
            $data = array(
                    'userid' => $row->user_id,
                    'name' => $row->first_name.' '.$row->last_name,
                    'role' => $row->role,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        return false;
    }

    public function addRequest($formData){
    	$this->db->insert('request', $formData);
      $insertId = $this->db->insert_id();
      return  $insertId;
    }

    public function getProfile($user_id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $user_id);
        $query=$this->db->get();
        return $query->row();
    }
}
