<?php
class Site_model extends CI_Model{
	function __construct()
	{
		//parent::__construct();
		$this->load->library('session');
	}

	public function addSite($formData){
		$this->db->insert('sites', $formData);
		$insertId = $this->db->insert_id();
		return  $insertId;
	}

	public function getSites(){
		$this->db->select('*');
		$this->db->from('sites');
		$query=$this->db->get();
		return $query->result();
	}
}
