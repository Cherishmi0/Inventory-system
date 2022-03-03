<?php
class Brand_model extends CI_Model {
    function __construct()
    {
        //parent::__construct();
        $this->load->library('session');
    }

    public function addBrand($formData){
    	$this->db->insert('brand', $formData);
        $insertId = $this->db->insert_id();
        return  $insertId;
    }

    public function updateBrand($formData, $brand_id){
    	$this->db->set($formData);
        $this->db->where('brand_id',$brand_id);
        $update = $this->db->update('brand');
    }

    public function getBrands(){
        $this->db->select('*');
        $this->db->from('brand');
        $query=$this->db->get();
        return $query->result();
    }

    public function getBrandById($brand_id){
        $this->db->select('*');
        $this->db->from('brand');
        $this->db->where('brand_id', $brand_id);
        $query=$this->db->get();
        return $query->row();
    }
}
