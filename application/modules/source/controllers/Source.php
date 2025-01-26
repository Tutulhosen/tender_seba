<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Source extends Backend_Controller {

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

        $this->load->model('Source_model');
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
        $this->data['all_sources'] = $this->Source_model->get_all_sources(); 
        
        $this->data['meta_title'] = 'All Source';
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
        $this->form_validation->set_rules('source_name', 'Source Name', 'required|trim|is_unique[ts_sources.source_name]|max_length[100]');
        $this->form_validation->set_rules('source_remarks', 'Source Remarks', 'trim|max_length[255]');

        if ($this->form_validation->run() == true) {
            $data['source_name'] = $this->input->post('source_name');
            $data['source_remarks'] = $this->input->post('source_remarks');
            $data['source_created'] = date('Y-m-d H:i:s');

            if($this->Common_model->save('ts_sources', $data))
            {
                $this->session->set_flashdata('success', 'Source Created Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('source');

        }
        else {
            // display the create source form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['source_name'] = array(
                'name'  => 'source_name',
                'id'    => 'source_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('source_name'),
                'required' => 'required'
            );
            $this->data['source_remarks'] = array(
                'name'  => 'source_remarks',
                'id'    => 'source_remarks',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('source_remarks'),
            );
            
            // Load Page
            $this->data['meta_title'] = 'Create Source';
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
        $this->form_validation->set_rules('source_name', 'Source Name', 'required|trim|max_length[100]|callback__is_unique_source['. $id .']');
        $this->form_validation->set_rules('source_remarks', 'Source Remarks', 'trim|max_length[255]');

        if ($this->form_validation->run() == true) {
            $data['source_name'] = $this->input->post('source_name');
            $data['source_remarks'] = $this->input->post('source_remarks');

            if($this->Common_model->edit('ts_sources', 'source_id', $id, $data))
            {
                $this->session->set_flashdata('success', 'Source Updated Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('source');

        }
        else {
            // display the update user form

            $this->data['source_details'] = $this->Common_model->get_single_row_by('ts_sources', 'source_id', $id);

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['source_name'] = array(
                'name'  => 'source_name',
                'id'    => 'source_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('source_name', $this->data['source_details']['source_name']),
                'required' => 'required'
            );
            $this->data['source_remarks'] = array(
                'name'  => 'source_remarks',
                'id'    => 'source_remarks',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('source_remarks', $this->data['source_details']['source_remarks']),
            );
            
            // Load Page
            $this->data['meta_title'] = 'Update Source';
            $this->data['subview'] = 'edit';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   _is_unique_source
    Authur      :   Ismail
    Created     :   25-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function _is_unique_source($name, $id)
    {
        if($this->Common_model->check_unique_for_callback('ts_sources', 'source_name', $name, 'source_id', $id))
        {
            $this->form_validation->set_message('_is_unique_source', 'The Source Name field must contain a unique value');

            return false;
        }

        return true;
    }

}