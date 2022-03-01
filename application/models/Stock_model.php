<?php
class Stock_model extends CI_Model {
    function __construct()
    {
        //parent::__construct();
        $this->load->library('session');
    }

    public function addStock($formData){
    	$this->db->insert('stock', $formData);
        $insertId = $this->db->insert_id();
        return  $insertId;
    }

    public function updateStock($formData, $stock_id){
    	$this->db->set($formData);
        $this->db->where('stock_id',$stock_id);
        $update = $this->db->update('stock');
    }

    public function updateStockQuantity($quantity, $stock_id){
    	$sql = 'update stock set quantity=quantity+'.$quantity.' where stock_id=?';
        $this->db->query($sql, $stock_id);
    }

    public function addStockToIntermediate($formData){
    	$this->db->insert('stock_intermediate', $formData);
        $insertId = $this->db->insert_id();
        return  $insertId;
    }

    public function addDispatch($formData,$quantity, $stock_id){
        $this->db->insert('dispatch', $formData);
        $insertId = $this->db->insert_id();
        $sql = 'update stock set quantity=quantity-'.$quantity.' where stock_id=?';
        $this->db->query($sql, $stock_id);
        return  $insertId;
    }

    public function getStocks(){
        $this->db->select('*');
        $this->db->from('stock');
        $this->db->join('category', 'stock.category_id = category.category_id');
		$this->db->join('user', 'stock.created_by = user.user_id');
        $query=$this->db->get();
        return $query->result();
    }

    public function getCategories(){
        $this->db->select('*');
        $this->db->from('category');
        $query=$this->db->get();
        return $query->result();
    }

    public function getStockById($stock_id){
        $this->db->select('*');
        $this->db->from('stock');
        $this->db->where('stock_id', $stock_id);
        $query=$this->db->get();
        return $query->row();
    }

    public function getStockHistory($stock_id){
        $this->db->select('*');
        $this->db->from('stock_intermediate');
		$this->db->join('user', 'stock_intermediate.user_id = user.user_id');
        $this->db->where('stock_id', $stock_id);
        $query=$this->db->get();
        return $query->result();
    }

}
