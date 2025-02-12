<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends Backend_Controller {

	public function __construct(){
		parent::__construct();	
		//$this->load->model('Common_model');
		// $this->load->model('Shop_model');

		// if ($this->ion_auth->logged_in()){
		// 	redirect('site/profile');
		// }
	}

	public function index(){
		//validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() == true){
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)){
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('site/profile');
			}else{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('signin'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}else{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'class' => 'form-control',
				'placeholder' => 'Username',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
				'class' => 'form-control',
				'placeholder' => 'Password',
			);

			$this->data['link'] = '<a href="'.base_url().'registration" class="btn btn-success login">সাইন আপ </a>';
			$this->data['meta_title'] = 'signin';
			$this->data['subview'] = 'index';
	    	$this->load->view('frontend/_layout_main', $this->data);
		}
	}

	// log the user out
	public function logout()
	{
		// log the user out
		$logout = $this->ion_auth->logout();
		
		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('signin');
	}

	// activate the user
	public function activate($id, $code=false){
		if ($code !== false){
			$activation = $this->ion_auth->activate($id, $code);
		}else if ($this->ion_auth->is_admin()){
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation){
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("signin");
		}else{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("forgot_password");
		}
	}
	
}
