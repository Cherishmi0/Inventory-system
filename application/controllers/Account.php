<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct(){
	  // Initialization of class
    parent::__construct();
    //load models
    $this->load->model('Account_model');
    // load form_validation library
    $this->load->library('form_validation');
	}

	public function sign_in()
	{
    if($this->session->userdata('validated'))
		{
		  redirect('home');
    }
		$this->load->view('account/login');
	}

	public function login()
  {
    $email = $this->input->post("email");
    $password = $this->input->post("password");

    $result = $this->Account_model->authanticate($email, $password);
    if(! $result){
      $data['message'] = "Invalid Username or Password";
      $this->load->view('account/login',$data);
    }else{
      redirect('home');
    }

   }
	public function logout()
  {
    $this->session->sess_destroy();
    $this->load->view('account/login');
  }

	public function profile()
	{
		$data['profile'] = $this->Account_model->getProfile($this->session->userdata['userid']);
		$this->load->view('common/header');
		$this->load->view('account/profile',$data);
		$this->load->view('common/footer');
  }

  public function inventory_request()
	{
    $data['error_free'] = false;
    if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('company','Company','required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('phone', 'Phone Number', 'required');
			$this->form_validation->set_rules('note','Note','required');
			if ($this->form_validation->run() == TRUE){
				$formData = array(
					'name' => $this->input->post("name"),
					'company' => $this->input->post("company"),
					'email' => $this->input->post("email"),
					'phone' => $this->input->post("phone"),
					'note' => $this->input->post("note"),
				);
				$this->Account_model->addRequest($formData);
				$this->session->set_flashdata('success',"Your request is success!");
				$data['error_free'] = true;
      }
		}
		$this->load->view('account/login',$data);
	}
}

?>
