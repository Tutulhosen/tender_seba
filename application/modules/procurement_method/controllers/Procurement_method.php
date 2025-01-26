<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procurement_method extends Backend_Controller {

    /*
    Name        :   __construct
    Authur      :   Ismail
    Created     :   27-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function __construct(){
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()){
            // redirect them to the login page
            redirect('admin/dashboard');
        }elseif (!$this->ion_auth->is_admin() && !$this->ion_auth->is_setup_user()){
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You are not authorized to view this page.');
        }

        $this->load->model('Procurement_method_model');
    }
    
    /*
    Name        :   index
    Authur      :   Ismail
    Created     :   27-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function index()
    {
        $this->data['all_pro_methods'] = $this->Procurement_method_model->get_procure_methods(); 
        
        $this->data['meta_title'] = 'All Procurement Method';
        $this->data['subview'] = 'index';
        $this->load->view('backend/_layout_main', $this->data);
    }
    
    /*
    Name        :   add
    Authur      :   Ismail
    Created     :   27-01-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function add()
    {
        // validate form input
        $this->form_validation->set_rules('pro_method_name', 'Procurement Method', 'required|trim|is_unique[ts_procurement_methods.pro_method_name]|max_length[30]');

        if ($this->form_validation->run() == true) {
            $data['pro_method_name'] = $this->input->post('pro_method_name');
            $data['pro_method_created'] = date('Y-m-d H:i:s');

            if($this->Common_model->save('ts_procurement_methods', $data))
            {
                $this->session->set_flashdata('success', 'Procurement Method Created Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('procurement_method');

        }
        else {
            // display the create supplier form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['pro_method_name'] = array(
                'name'  => 'pro_method_name',
                'id'    => 'pro_method_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('pro_method_name'),
                'required' => 'required'
            );
            
            // Load Page
            $this->data['meta_title'] = 'Create Procurement Method';
            $this->data['subview'] = 'add';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   edit
    Authur      :   Ismail
    Created     :   27-01-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function edit($id)
    {
        // validate form input
        $this->form_validation->set_rules('pro_method_name', 'Procurement Method', 'required|trim|callback__is_unique_name|max_length[30]');

        if ($this->form_validation->run() == true) {
            $data['pro_method_name'] = $this->input->post('pro_method_name');;

            if($this->Common_model->edit('ts_procurement_methods', 'pro_method_id', $id, $data))
            {
                $this->session->set_flashdata('success', 'Procurement Method Updated Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('procurement_method');

        }
        else {
            // display the update user form

            $this->data['pro_method_details'] = $this->Common_model->get_single_row_by('ts_procurement_methods', 'pro_method_id', $id);

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['pro_method_name'] = array(
                'name'  => 'pro_method_name',
                'id'    => 'pro_method_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('pro_method_name', $this->data['pro_method_details']['pro_method_name']),
                'required' => 'required'
            );
            
            // Load Page
            $this->data['meta_title'] = 'Update Procurement Method';
            $this->data['subview'] = 'edit';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   _is_unique_name
    Authur      :   Ismail
    Created     :   27-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function _is_unique_name($name, $id)
    {
        if($this->Common_model->check_unique_for_callback('ts_procurement_methods', 'pro_method_name', $name, 'pro_method_id', $id))
        {
            $this->form_validation->set_message('_is_unique_name', 'The Procurement Method field must contain a unique value.');
            return false;
        }

        return true;
    }

}