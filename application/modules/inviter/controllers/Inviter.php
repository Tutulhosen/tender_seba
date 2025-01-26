<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inviter extends Backend_Controller {

    /*
    Name        :   __construct
    Authur      :   Ismail
    Created     :   23-01-18
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

        $this->load->model('Inviter_model');
    }
    
    /*
    Name        :   index
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function index()
    {
        $this->data['inviters'] = $this->Inviter_model->get_inviters(); 
        
        $this->data['meta_title'] = 'All Inviter';
        $this->data['subview'] = 'index';
        $this->load->view('backend/_layout_main', $this->data);
    }
    
    /*
    Name        :   add
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function add()
    {
        // validate form input
        $this->form_validation->set_rules('inviter_name', 'Inviter Name', 'required|trim|is_unique[ts_inviters.inviter_name]|max_length[100]');
        $this->form_validation->set_rules('inviter_type', 'Inviter Type', 'trim|required|max_length[1]');

        if ($this->form_validation->run() == true) {
            $data['inviter_name'] = $this->input->post('inviter_name');
            $data['inviter_type'] = $this->input->post('inviter_type');
            $data['inviter_created'] = date('Y-m-d H:i:s');

            if($this->Common_model->save('ts_inviters', $data))
            {
                $this->session->set_flashdata('success', 'Inviter Created Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('inviter');

        }
        else {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['inviter_name'] = array(
                'name'  => 'inviter_name',
                'id'    => 'inviter_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('inviter_name'),
                'required' => 'required'
            );
            
            // Load Page
            $this->data['meta_title'] = 'Create Inviter';
            $this->data['subview'] = 'add';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   edit
    Authur      :   Ismail
    Created     :   24-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function edit($id)
    {
        // validate form input
        $this->form_validation->set_rules('inviter_name', 'Inviter Name', 'required|trim|callback__check_unique_inviter['. $id .']|max_length[100]');
        $this->form_validation->set_rules('inviter_type', 'Inviter Type', 'trim|required|max_length[1]');

        if ($this->form_validation->run() == true) {
            $data['inviter_name'] = $this->input->post('inviter_name');
            $data['inviter_type'] = $this->input->post('inviter_type');

            if($this->Common_model->edit('ts_inviters', 'inviter_id', $id, $data))
            {
                $this->session->set_flashdata('success', 'Inviter Updated Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('inviter');

        }
        else {
            // display the update user form

            $this->data['inviter_details'] = $this->Common_model->get_single_row_by('ts_inviters', 'inviter_id', $id);

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['inviter_name'] = array(
                'name'  => 'inviter_name',
                'id'    => 'inviter_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('inviter_name', $this->data['inviter_details']['inviter_name']),
                'required' => 'required'
            );
                        
            // Load Page
            $this->data['meta_title'] = 'Update Inviter';
            $this->data['subview'] = 'edit';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   _check_unique_inviter
    Authur      :   Ismail
    Created     :   24-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function _check_unique_inviter($name, $id)
    {
        if($this->Inviter_model->check_unique_inviter($name, $id))
        {
            $this->form_validation->set_message('_check_unique_inviter', 'The Inviter Name field must contain a unique value.');
            return false;
        }

        return true;
    } 

}