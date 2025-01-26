<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Backend_Controller {

	public function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()):
            redirect('login');
        endif;

        if (!$this->ion_auth->logged_in()){
            // redirect them to the login page
            redirect('admin/dashboard');
        }elseif (!$this->ion_auth->is_admin() && !$this->ion_auth->is_invoice_generator() && !$this->ion_auth->is_setup_user() && !$this->ion_auth->is_stock_manager() && !$this->ion_auth->is_default_user()){
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You are not authorized to view this page.');
        }

        $this->load->model('Dashboard_model');
    }

	public function index()
	{
        $this->data['current_applicants'] = $this->Dashboard_model->get_count('users', 1); 
        $this->data['current_shortlist'] = $this->Dashboard_model->get_count('users', 2); 
        $this->data['current_finallist'] = $this->Dashboard_model->get_count('users', 3); 
        $this->data['total_payment'] = $this->Dashboard_model->get_count('users', 4);
        $this->data['total_reject'] = $this->Dashboard_model->get_count('users', 5); 
        $this->data['total_applicants'] = $this->Dashboard_model->get_count2('users', 0); 

		$this->data['meta_title'] = 'Dashboard';
		$this->data['subview'] = 'dashboard/index';
    	$this->load->view('backend/_layout_main', $this->data);
	}

	public function blank(){
		$this->data['page_heading'] = 'Blank Page';
		$this->data['subview'] = 'dashboard/blank';
    	$this->load->view('backend/_layout_main', $this->data);
	}	

}