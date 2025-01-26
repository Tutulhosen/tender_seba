<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Division extends Backend_Controller {

    /*
    Name        :   __construct
    Authur      :   Ismail
    Created     :   25-01-18
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

        $this->load->model('Division_model');
    }
    
    /*
    Name        :   index
    Authur      :   Ismail
    Created     :   25-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function index()
    {
        $this->data['divisions'] = $this->Division_model->get_divisions(); 
        
        $this->data['meta_title'] = 'All Division';
        $this->data['subview'] = 'index';
        $this->load->view('backend/_layout_main', $this->data);
    }
    
    /*
    Name        :   add
    Authur      :   Ismail
    Created     :   25-01-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function add()
    {
        // validate form input
        $this->form_validation->set_rules('division_name', 'Division Name', 'required|trim|is_unique[ts_divisions.division_name]|max_length[20]');
        $this->form_validation->set_rules('division_short_name', 'Division Short Name', 'trim|is_unique[ts_divisions.division_short_name]|max_length[10]');

        if ($this->form_validation->run() == true) {
            $data['division_name'] = $this->input->post('division_name');
            $data['division_short_name'] = $this->input->post('division_short_name');
            $data['division_created'] = date('Y-m-d H:i:s');

            if($this->Common_model->save('ts_divisions', $data))
            {
                $this->session->set_flashdata('success', 'Division Created Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('division');

        }
        else {
            // display the create customer form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['division_name'] = array(
                'name'  => 'division_name',
                'id'    => 'division_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('division_name'),
                'required' => 'required'
            );
            $this->data['division_short_name'] = array(
                'name'  => 'division_short_name',
                'id'    => 'division_short_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('division_short_name'),
            );
            
            // Load Page
            $this->data['meta_title'] = 'Create Division';
            $this->data['subview'] = 'add';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   edit
    Authur      :   Ismail
    Created     :   25-01-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function edit($id)
    {
        // validate form input
        $this->form_validation->set_rules('division_name', 'Division Name', 'required|trim|max_length[20]|callback__is_unique_division['. $id .']');
        $this->form_validation->set_rules('division_short_name', 'Division Short Name', 'trim|max_length[10]|callback__is_unique_short_name['. $id .']');

        if ($this->form_validation->run() == true) {
            $data = array();
            $data['division_name'] = $this->input->post('division_name');
            $data['division_short_name'] = $this->input->post('division_short_name');

            if($this->Common_model->edit('ts_divisions', 'division_id', $id, $data))
            {
                $this->session->set_flashdata('success', 'Division Updated Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('division');

        }
        else {
            // display the update user form

            $this->data['division_details'] = $this->Common_model->get_single_row_by('ts_divisions', 'division_id', $id);

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['division_name'] = array(
                'name'  => 'division_name',
                'id'    => 'division_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('division_name', $this->data['division_details']['division_name']),
                'required' => 'required'
            );
            $this->data['division_short_name'] = array(
                'name'  => 'division_short_name',
                'id'    => 'division_short_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('division_short_name', $this->data['division_details']['division_short_name']),
            );
            
            // Load Page
            $this->data['meta_title'] = 'Update Division';
            $this->data['subview'] = 'edit';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   _is_unique_division
    Authur      :   Ismail
    Created     :   25-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function _is_unique_division($name, $id)
    {
        if($this->Common_model->check_unique_for_callback('ts_divisions', 'division_name', $name, 'division_id', $id))
        {
            $this->form_validation->set_message('_is_unique_division', 'The Division Name field must contain a unique value.');
            return false;
        }

        return true;
    }
    
    /*
    Name        :   _is_unique_short_name
    Authur      :   Ismail
    Created     :   25-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function _is_unique_short_name($sht_name, $id)
    {
        if($this->Common_model->check_unique_for_callback('ts_divisions', 'division_short_name', $sht_name, 'division_id', $id))
        {
            $this->form_validation->set_message('_is_unique_short_name', 'The Division Short Name field must contain a unique value.');
            return false;
        }

        return true;
    }

}