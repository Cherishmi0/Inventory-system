<?php
class Dispatch_model extends CI_Model {
    function __construct()
    {
        //parent::__construct();
        $this->load->library('session');
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
        $query=$this->db->get();
        return $query->result();
    }

    public function getDispatches(){
        $this->db->select('d.quantity, d.unit, st.siteName AS site,d.description,d.dispatch_id, d.dispatched_user,d.created_at AS date,s.title,s.code,c.name As c_name,u.first_name,u.last_name');
        $this->db->from('dispatch AS D');
        $this->db->join('stock AS S', 'd.stock_id = s.stock_id');
        $this->db->join('category AS c', 's.category_id = c.category_id');
        $this->db->join('user AS u', 'u.user_id = d.created_by');
		$this->db->join('sites AS st', 'st.siteId = d.site', 'left');
        $query=$this->db->get();
        return $query->result();
    }

    public function getCurrentQuantity($stock_id){
        $this->db->select('*');
        $this->db->from('stock');
        $this->db->where('stock_id', $stock_id);
        $query=$this->db->get();
        $result = $query->row();
        return $result->quantity;
    }

}
