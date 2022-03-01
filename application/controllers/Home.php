<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		// Initialization of class
		parent::__construct();
		//load models
		$this->load->model('Account_model');
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
		$this->load->view('common/dashboard');
		$this->load->view('common/footer');
	}

	public function home()
	{
		$this->load->view('common/header');
		$this->load->view('common/dashboard');
		$this->load->view('common/footer');
	}

	public function blank()
	{
		$this->load->view('common/header');
		$this->load->view('common/blank');
		$this->load->view('common/footer');
	}

}
/*


*/
