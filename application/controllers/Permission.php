<?php


class Permission extends CI_Controller {

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
	public function index()
	{
		$this->load->view('common/header');
		$this->load->view('common/permission');
		$this->load->view('common/footer');
	}
}
