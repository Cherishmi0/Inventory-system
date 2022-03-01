<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		// Initialization of class
        parent::__construct();
        //load models
        $this->load->model('User_model');
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
			$this->form_validation->set_rules('first_name','First Name','required|min_length[3]');
            $this->form_validation->set_rules('last_name','Last Name','required|min_length[3]');
            $this->form_validation->set_rules('phone','Phone','required|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('role','Role','required');
            $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('password','Password','required|min_length[3]');
            $this->form_validation->set_rules('confirm_password','Password Confirmation','required|matches[password]');
			if ($this->form_validation->run() == TRUE){
				$formData = array(
		      		'first_name' => $this->input->post("first_name"),
		      		'last_name' => $this->input->post("last_name"),
                    'phone' => $this->input->post("phone"),
                    'role' => $this->input->post("role"),
                    'email' => $this->input->post("email"),
                    'password' => md5($this->input->post("password")),
                    'status' => $this->input->post("status"),
					'created_by' => $this->session->userdata['userid'],
					'created_at' => date("Y-m-d h:i:s"),
		    	);
		 	  	$this->User_model->addUser($formData);
				$this->session->set_flashdata('success',"Successfully inserted user !");
				redirect('user');
			}
		}
		$this->getForm();
    }
    
    public function update()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$this->form_validation->set_rules('first_name','First Name','required|min_length[3]');
            $this->form_validation->set_rules('last_name','Last Name','required|min_length[3]');
            $this->form_validation->set_rules('phone','Phone','required|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('role','Role','required');
            if (!empty($this->input->post('password')))
            {
                $this->form_validation->set_rules('password','Password','required|min_length[3]');
                $this->form_validation->set_rules('confirm_password','Password Confirmation','required|matches[password]');
            }
			if ($this->form_validation->run() == TRUE){
                if (!empty($this->input->post('password'))){
                    $formData = array(
                        'first_name' => $this->input->post("first_name"),
                        'last_name' => $this->input->post("last_name"),
                        'phone' => $this->input->post("phone"),
                        'role' => $this->input->post("role"),
                        'password' => md5($this->input->post("password")),
                        'status' => $this->input->post("status"),
                    );
                }else{
                    $formData = array(
                        'first_name' => $this->input->post("first_name"),
                        'last_name' => $this->input->post("last_name"),
                        'phone' => $this->input->post("phone"),
                        'role' => $this->input->post("role"),
                        'status' => $this->input->post("status"),
                    );
                }
		 	  	$this->User_model->updateUser($formData,$this->input->get('user_id'));
				$this->session->set_flashdata('success',"Successfully updated user !");
				redirect('user');
			}
		}
		$this->getUpdateForm();
	}

	public function getForm()
	{
		$this->load->view('common/header');
		$this->load->view('user/user_form');
		$this->load->view('common/footer');
    }
    
    public function getUpdateForm()
	{
        $data['user_details'] = $this->User_model->getUserById($this->input->get('user_id'));
		$this->load->view('common/header');
		$this->load->view('user/user_update_form',$data);
		$this->load->view('common/footer');
	}

	public function getList()
	{
		$data['users'] = $this->User_model->getUsers();
		$this->load->view('common/header');
		$this->load->view('user/user_list',$data);
		$this->load->view('common/footer');

	}


}
/*


*/
