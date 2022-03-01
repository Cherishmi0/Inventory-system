<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	function __construct(){
		// Initialization of class
    parent::__construct();
    //load models
    $this->load->model('Stock_model');
    // load form_validation library
    $this->load->library('form_validation');
    if(!$this->session->userdata('validated'))
    {
      redirect('account/sign_in');
    }
	}

	public function index()
	{
		$this->getList();
	}

	public function add()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$this->form_validation->set_rules('title','Title','required|is_unique[stock.title]');
			$this->form_validation->set_rules('quantity', 'Quantity', array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
			$this->form_validation->set_rules('unit','Unit','required');
			$this->form_validation->set_rules('price', 'Price', array('trim','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
			$this->form_validation->set_rules('category','Category','required');
			if ($this->form_validation->run() == TRUE){
				$formData = array(
		      		'title' => $this->input->post("title"),
		      		'description' => $this->input->post("description"),
					'code' => $this->input->post("code"),
					'quantity' => $this->input->post("quantity"),
					'unit' => $this->input->post("unit"),
					'price' => $this->input->post("price"),
					'category_id' => $this->input->post("category"),
					'status' => $this->input->post("status"),
					'created_by' => $this->session->userdata['userid'],
					'created_at' => date("Y-m-d h:i:s"),
		    	);
				$stock_id = $this->Stock_model->addStock($formData);
				   
				$formData = array(
					'stock_id' => $stock_id,
					'quantity' => $this->input->post("quantity"),
					'unit' => $this->input->post("unit"),
					'price' => $this->input->post("price"),
					'user_id' => $this->session->userdata['userid'],
					'type' => 0,
				);
				$this->Stock_model->addStockToIntermediate($formData);
				$this->session->set_flashdata('success',"Successfully inserted stock !");
				redirect('stock');
			}
		}
		$this->getForm();
	}

	public function update()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('quantity', 'Quantity', array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
			$this->form_validation->set_rules('price', 'Price', array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
			$this->form_validation->set_rules('category','Category','required');
			if ($this->form_validation->run() == TRUE){
				$formData = array(
		      		'title' => $this->input->post("title"),
		      		'description' => $this->input->post("description"),
					'code' => $this->input->post("code"),
					'quantity' => $this->input->post("quantity"),
					'price' => $this->input->post("price"),
					'category_id' => $this->input->post("category"),
					'status' => $this->input->post("status"),
		    	);
				$this->Stock_model->updateStock($formData,$this->input->get('stock_id'));
				$this->session->set_flashdata('success',"Successfully updated stock !");
				redirect('stock');
			}
		}
		$this->getUpdateForm();
	}

	public function updateQuantity()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$this->form_validation->set_rules('q_quantity', 'Quantity', array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
			$this->form_validation->set_rules('q_price', 'Price', array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
			if ($this->form_validation->run() == TRUE){
				$this->Stock_model->updateStockQuantity($this->input->post("q_quantity"),$this->input->get('stock_id'));
				$formData = array(
					'stock_id' => $this->input->get('stock_id'),
					'quantity' => $this->input->post("q_quantity"),
					'price' => $this->input->post("q_price"),
					'user_id' => $this->session->userdata['userid'],
					'type' => 1,
				);
				$this->Stock_model->addStockToIntermediate($formData);
				$this->session->set_flashdata('success',"Successfully added stock quantity !");
				redirect('stock/update?stock_id='.$this->input->get('stock_id'));
			}
		}
		$this->getUpdateForm();
	}

	public function addDispatch()
	{

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$this->form_validation->set_rules('stock','Stock','required');
			$this->form_validation->set_rules('quantity','Quantity','required');
			$this->form_validation->set_rules('site','Site','required');
			$this->form_validation->set_rules('description','Description','required');
			if ($this->form_validation->run() == TRUE) {
				$formData = array(
					'stock_id' => $this->input->post("stock"),
					'quantity' => $this->input->post("quantity"),
					'site' => $this->input->post("site"),
					'description' => $this->input->post("description"),
					'created_by' => $this->session->userdata['userid'],
					'created_at' => date("Y-m-d h:i:s"),
				);
				$this->Stock_model->addDispatch($formData,$this->input->post("quantity"),$this->input->post("stock"));
				$this->session->set_flashdata('success',"Successfully dispatched stock !");
				redirect('stock');
			}
		}
		$this->getDispatchForm();
	}

	public function getForm()
	{
		$data['categories'] = $this->Stock_model->getCategories();
		$this->load->view('common/header');
		$this->load->view('stock/stock_form',$data);
		$this->load->view('common/footer');

	}

	public function getUpdateForm()
	{
		$data['stock_details'] = $this->Stock_model->getStockById($this->input->get('stock_id'));
		$data['categories'] = $this->Stock_model->getCategories();
		$data['stock_histories'] = $this->Stock_model->getStockHistory($this->input->get('stock_id'));
		$this->load->view('common/header');
		$this->load->view('stock/stock_update_form',$data);
		$this->load->view('common/footer');

	}

	public function getDispatchForm(){
		$data['stocks'] = $this->Stock_model->getStocks();
		$this->load->view('common/header');
		$this->load->view('stock/dispatch_form',$data);
		$this->load->view('common/footer');
	}

	public function getList()
	{
		$data['stocks'] = $this->Stock_model->getStocks();
		$this->load->view('common/header');
		$this->load->view('stock/stock_list',$data);
		$this->load->view('common/footer');

	}


}

