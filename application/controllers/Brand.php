<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

	function __construct(){
		// Initialization of class
        parent::__construct();
        //load models
        $this->load->model('Brand_model');
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
			$this->form_validation->set_rules('name','Name','required|min_length[3]');
            $this->form_validation->set_rules('code','Code','required|min_length[2]');
			if ($this->form_validation->run() == TRUE){
				$formData = array(
		      		'name' => $this->input->post("name"),
		      		'code' => $this->input->post("code"),
                    'status' => $this->input->post("status"),
					'date_added' => $this->session->userdata['userid'],
					'date_added' => date("Y-m-d h:i:s"),
		    	);
		 	  	$this->Brand_model->addBrand($formData);
				$this->session->set_flashdata('success',"Successfully inserted Brand !");
				redirect('brand');
			}
		}
		$this->getForm();
    }
    
    public function update()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$this->form_validation->set_rules('name','Name','required|min_length[3]');
            $this->form_validation->set_rules('code','Code','required|min_length[2]');
			if ($this->form_validation->run() == TRUE){
                $formData = array(
	                'name' => $this->input->post("name"),
		      		'code' => $this->input->post("code"),
	                'status' => $this->input->post("status"),
	            );  
		 	  	$this->Brand_model->updateBrand($formData,$this->input->get('brand_id'));
				$this->session->set_flashdata('success',"Successfully updated brand !");
				redirect('brand');
			}
		}
		$this->getUpdateForm();
	}

	public function getForm()
	{
		$this->load->view('common/header');
		$this->load->view('localization/brand_form');
		$this->load->view('common/footer');
    }
    
    public function getUpdateForm()
	{
        $data['brand_details'] = $this->Brand_model->getBrandById($this->input->get('brand_id'));
		$this->load->view('common/header');
		$this->load->view('localization/brand_update_form',$data);
		$this->load->view('common/footer');
	}

	public function getList()
	{
		$data['brands'] = $this->Brand_model->getBrands();
		$this->load->view('common/header');
		$this->load->view('localization/brand_list',$data);
		$this->load->view('common/footer');

	}


}
/*


*/
