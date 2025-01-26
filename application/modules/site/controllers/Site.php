<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends Frontend_Controller {

	function __construct (){
		parent::__construct();
        $this->load->model('Site_model');
        $this->load->model('Common_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning"> <i class="fa fa-warning"></i> ', '</div>');
	}

	public function index()
	{
        redirect('site/profile');
	}

    public function profile(){
        if (!$this->ion_auth->logged_in()){
            // redirect them to the login page
            redirect('signin');
        }

        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

        //list the users
        $this->data['users'] = $this->ion_auth->user()->row();

        //Load page
        $this->data['link'] = '<a href="'.base_url().'signin/logout" class="btn btn-success login">সাইন আউট</a>';
        $this->data['meta_title'] = ''. $this->data['users']->first_name;
        $this->data['subview'] = 'profile';
        $this->load->view('frontend/_layout_main', $this->data);
    }
}