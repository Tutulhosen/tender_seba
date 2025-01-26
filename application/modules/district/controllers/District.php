<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class District extends Backend_Controller {

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

        $this->load->model('District_model');
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
        $this->data['all_districts'] = $this->District_model->get_districts(); 
        
        $this->data['meta_title'] = 'All District';
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
        $this->form_validation->set_rules('division_id', 'Division', 'required|trim');
        $this->form_validation->set_rules('district_name', 'District Name', 'required|trim|is_unique[ts_districts.district_name]|max_length[20]');
        $this->form_validation->set_rules('district_short_name', 'District Short Name', 'trim|is_unique[ts_districts.district_short_name]|max_length[10]');

        if ($this->form_validation->run() == true) {
            $data['division_id'] = $this->input->post('division_id');
            $data['district_name'] = $this->input->post('district_name');
            $data['district_short_name'] = $this->input->post('district_short_name');
            $data['district_created'] = date('Y-m-d H:i:s');

            if($this->Common_model->save('ts_districts', $data))
            {
                $this->session->set_flashdata('success', 'District Created Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('district');

        }
        else {
            // display the create unit form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['divisions'] = $this->Common_model->get_dropdown('ts_divisions', 'division_id', 'division_name', '-- Select Division --');

            $this->data['district_name'] = array(
                'name'  => 'district_name',
                'id'    => 'district_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('district_name'),
                'required' => 'required'
            );
            $this->data['district_short_name'] = array(
                'name'  => 'district_short_name',
                'id'    => 'district_short_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('district_short_name'),
            );
            
            // Load Page
            $this->data['meta_title'] = 'Create District';
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
        $this->form_validation->set_rules('division_id', 'Division', 'required|trim');
        $this->form_validation->set_rules('district_name', 'District Name', 'required|trim|max_length[20]|callback__is_unique_name['. $id .']');
        $this->form_validation->set_rules('district_short_name', 'District Short Name', 'trim|max_length[10]|callback__is_unique_short_name['. $id .']');

        if ($this->form_validation->run() == true) {
            $data['division_id'] = $this->input->post('division_id');
            $data['district_name'] = $this->input->post('district_name');
            $data['district_short_name'] = $this->input->post('district_short_name');

            if($this->Common_model->edit('ts_districts', 'district_id', $id, $data))
            {
                $this->session->set_flashdata('success', 'District Updated Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('district');

        }
        else {
            // display the update user form

            $this->data['district_details'] = $this->Common_model->get_single_row_by('ts_districts', 'district_id', $id);

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['divisions'] = $this->Common_model->get_dropdown('ts_divisions', 'division_id', 'division_name', '-- Select Division --');

            $this->data['district_name'] = array(
                'name'  => 'district_name',
                'id'    => 'district_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('district_name', $this->data['district_details']['district_name']),
                'required' => 'required'
            );
            $this->data['district_short_name'] = array(
                'name'  => 'district_short_name',
                'id'    => 'district_short_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('district_short_name', $this->data['district_details']['district_short_name']),
            );
            
            // Load Page
            $this->data['meta_title'] = 'Update Unit';
            $this->data['subview'] = 'edit';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   _is_unique_name
    Authur      :   Ismail
    Created     :   25-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function _is_unique_name($name, $id)
    {
        if($this->Common_model->check_unique_for_callback('ts_districts', 'district_name', $name, 'district_id', $id))
        {
            $this->form_validation->set_message('_is_unique_name', 'The District Name field must contain a unique value.');
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
        if($this->Common_model->check_unique_for_callback('ts_districts', 'district_short_name', $sht_name, 'district_id', $id))
        {
            $this->form_validation->set_message('_is_unique_short_name', 'The District Short Name field must contain a unique value.');
            return false;
        }

        return true;
    }
}