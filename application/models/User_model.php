<?php
class User_model extends CI_Model {
    function __construct()
    {
        //parent::__construct();
        $this->load->library('session');
    }

    public function addUser($formData){
    	$this->db->insert('user', $formData);
        $insertId = $this->db->insert_id();
        return  $insertId;
    }

    public function updateUser($formData, $user_id){
    	$this->db->set($formData);
        $this->db->where('user_id',$user_id);
        $update = $this->db->update('user');
    }

    public function getUsers(){
        $this->db->select('*');
        $this->db->from('user');
        $query=$this->db->get();
        return $query->result();
    }

    public function getUserById($user_id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $user_id);
        $query=$this->db->get();
        return $query->row();
    }
}
