<?php


class Site extends CI_Controller {

	function __construct(){
		// Initialization of class
		parent::__construct();
		//load models
		$this->load->model('Site_model');
		// load form_validation library
		$this->load->library('form_validation');
		if(!$this->session->userdata('validated'))
		{
			redirect('account/sign_in');
		}
	}

	public function add()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$this->form_validation->set_rules('site_name','Site Name','required|min_length[3]|is_unique[sites.siteName]');
			$this->form_validation->set_rules('phone','Phone','required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('email','Site Email','required|valid_email|is_unique[user.email]');
			$this->form_validation->set_rules('street','Site Address : Street','required|min_length[3]');
			$this->form_validation->set_rules('suburb','Site Address : Suburb','required|min_length[3]');
			$this->form_validation->set_rules('post_code','Site Address : PostCode','required|min_length[3]');


			if ($this->form_validation->run() == TRUE){
				$formData = array(
					'siteName' => $this->input->post("site_name"),
					'phone' => $this->input->post("phone"),
					'siteEmail' => $this->input->post("email"),
					'addressStreet' => $this->input->post("street"),
					'suburb' => $this->input->post("suburb"),
					'postCode' => $this->input->post("post_code"),

				);
				$this->Site_model->addSite($formData);
				$this->session->set_flashdata('success',"Successfully inserted new Site !");
				redirect('site/add');
			}
		}
		$this->getForm();
	}

	public function getForm()
	{
		$this->load->view('common/header');
		$this->load->view('site/add_site');
		$this->load->view('common/footer');
	}
}
