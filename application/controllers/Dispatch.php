<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dispatch extends CI_Controller {

	function __construct(){
		// Initialization of class
		parent::__construct();
		//load models
		$this->load->model('Dispatch_model');
		$this->load->model('Report_model');
		$this->load->model('Site_model');
		// load form_validation library
		$this->load->library('form_validation');
		if(!$this->session->userdata('validated'))
		{
		redirect('account/sign_in');
		}
		if (!in_array($this->uri->segment(1), PERMISSION[$this->session->userdata('role')])){
            redirect('permission');
        }
	}

	public function index()
	{
		$this->getList();
	}

	public function add()
	{

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$this->form_validation->set_rules('stock','Stock','required');
			$this->form_validation->set_rules('quantity','Quantity','required|callback_validate_quantity['.$this->input->post("stock").']');
			$this->form_validation->set_rules('unit','Unit','required');
			$this->form_validation->set_rules('site','Site','required');
			$this->form_validation->set_rules('description','Description','required');
			$this->form_validation->set_rules('dispatched_user','Dispatched User','required');
			if ($this->form_validation->run() == TRUE) {
				$formData = array(
					'stock_id' => $this->input->post("stock"),
					'quantity' => $this->input->post("quantity"),
					'unit' => $this->input->post("unit"),
					'site' => $this->input->post("site"),
					'description' => $this->input->post("description"),
					'dispatched_user' => $this->input->post("dispatched_user"),
					'created_by' => $this->session->userdata['userid'],
					'created_at' => date("Y-m-d h:i:s"),
				);
				$this->Dispatch_model->addDispatch($formData,$this->input->post("quantity"),$this->input->post("stock"));
				$this->session->set_flashdata('success',"Successfully dispatched stock !");
				redirect('dispatch');
			}
		}
		$this->getForm();
	}

	public function getForm(){
		$data['stocks'] = $this->Dispatch_model->getStocks();
		$data['sites'] = $this->Site_model->getSites();
		$this->load->view('common/header');
		$this->load->view('dispatch/dispatch_form',$data);
		$this->load->view('common/footer');
	}

	public function getList()
	{
		$data['dispatches'] = $this->Dispatch_model->getDispatches();
		$this->load->view('common/header');
		$this->load->view('dispatch/dispatch_list',$data);
		$this->load->view('common/footer');

	}


	function validate_quantity($quantity,$stock_id)
	{
		if($stock_id>0){
			if(is_numeric($quantity)){
				if($quantity > 0){
					$current_quantity = $this->Dispatch_model->getCurrentQuantity($stock_id);
					if($current_quantity >= $quantity){
						return true;
					}else{
						$this->form_validation->set_message('validate_quantity','This item does not have enough quantity to dispatch !');
						return false;
					}
				}else{
					$this->form_validation->set_message('validate_quantity','The Quantity field should be grateer than 0!');
					return false;
				}
				
			}else{
				$this->form_validation->set_message('validate_quantity','The Quantity field should be valid integer.!');
				return false;
			}
		}else{
			$this->form_validation->set_message('validate_quantity','Stock field is required first!');
			return false;
		}
		
	}


}
/*


*/
