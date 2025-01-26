<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tariff extends Backend_Controller {

    /*
    Name        :   __construct
    Authur      :   Ismail
    Created     :   04-02-18
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

        $this->load->model('Tariff_model');
    }
    
    /*
    Name        :   index
    Authur      :   Ismail
    Created     :   04-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function index()
    {
        $this->data['all_tariff'] = $this->Tariff_model->get_all_tariff(); 
        
        $this->data['meta_title'] = 'All Tariff';
        $this->data['subview'] = 'index';
        $this->load->view('backend/_layout_main', $this->data);
    }
    
    /*
    Name        :   add
    Authur      :   Ismail
    Created     :   04-02-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function add()
    {
        // validate form input
        $this->form_validation->set_rules('tariff_name', 'Tariff Name', 'required|trim|max_length[20]|is_unique[ts_tariffs.tariff_name]');
        $this->form_validation->set_rules('tariff_duration', 'Duration', 'trim|required');
        $this->form_validation->set_rules('tariff_month_year', 'Month or Year', 'trim|required');
        $this->form_validation->set_rules('tariff_remarks', 'Remarks', 'trim|required');
        $this->form_validation->set_rules('tariff_bd_overseas', 'BD or Overseas', 'trim|required');
        $this->form_validation->set_rules('tariff_amount', 'Tariff Amount', 'trim|required');
        $this->form_validation->set_rules('tariff_status', 'Tariff Status', 'trim|required');

        if ($this->form_validation->run() == true) {
            $data['tariff_name'] = $this->input->post('tariff_name');
            $data['tariff_duration'] = $this->input->post('tariff_duration');
            $data['tariff_month_year'] = $this->input->post('tariff_month_year');
            $data['tariff_remarks'] = $this->input->post('tariff_remarks');
            $data['tariff_bd_overseas'] = $this->input->post('tariff_bd_overseas');
            $data['tariff_amount'] = $this->input->post('tariff_amount');
            $data['tariff_status'] = $this->input->post('tariff_status');
            $data['tariff_created'] = date('Y-m-d H:i:s');

            if($this->Common_model->save('ts_tariffs', $data))
            {
                $this->session->set_flashdata('success', 'Tariff Created Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('tariff');

        }
        else {
            // display the create customer form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['tariff_name'] = array(
                'name'  => 'tariff_name',
                'id'    => 'tariff_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tariff_name'),
                'required' => 'required'
            );
            $this->data['tariff_duration'] = array(
                'name'  => 'tariff_duration',
                'id'    => 'tariff_duration',
                'type'  => 'number',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tariff_duration'),
                'required' => 'required'
            );
            $this->data['tariff_remarks'] = array(
                'name'  => 'tariff_remarks',
                'id'    => 'tariff_remarks',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tariff_remarks'),
                'required' => 'required'
            );
            $this->data['tariff_amount'] = array(
                'name'  => 'tariff_amount',
                'id'    => 'tariff_amount',
                'type'  => 'number',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tariff_amount'),
                'required' => 'required'
            );
            
            // Load Page
            $this->data['meta_title'] = 'Create Tariff';
            $this->data['subview'] = 'add';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   edit
    Authur      :   Ismail
    Created     :   04-02-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function edit($id)
    {
        // validate form input
        $this->form_validation->set_rules('tariff_name', 'Tariff Name', 'required|trim|max_length[20]|callback__is_unique_name['. $id .']');
        $this->form_validation->set_rules('tariff_duration', 'Duration', 'trim|required');
        $this->form_validation->set_rules('tariff_month_year', 'Month or Year', 'trim|required');
        $this->form_validation->set_rules('tariff_remarks', 'Remarks', 'trim|required');
        $this->form_validation->set_rules('tariff_bd_overseas', 'BD or Overseas', 'trim|required');
        $this->form_validation->set_rules('tariff_amount', 'BD or Overseas', 'trim|required');
        $this->form_validation->set_rules('tariff_status', 'Tariff Status', 'trim|required');

        if ($this->form_validation->run() == true) {
            $data = array();
            $data['tariff_name'] = $this->input->post('tariff_name');
            // $data['webu_user_name'] = $this->input->post('webu_user_name');
            $data['tariff_duration'] = $this->input->post('tariff_duration');
            $data['tariff_month_year'] = $this->input->post('tariff_month_year');
            $data['tariff_remarks'] = $this->input->post('tariff_remarks');
            $data['tariff_bd_overseas'] = $this->input->post('tariff_bd_overseas');
            $data['tariff_amount'] = $this->input->post('tariff_amount');
            $data['tariff_status'] = $this->input->post('tariff_status');

            if($this->Common_model->edit('ts_tariffs', 'tariff_id', $id, $data))
            {
                $this->session->set_flashdata('success', 'Tariff Updated Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('tariff');

        }
        else {
            // display the update user form

            $this->data['tariff_details'] = $this->Common_model->get_single_row_by('ts_tariffs', 'tariff_id', $id);

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['tariff_name'] = array(
                'name'  => 'tariff_name',
                'id'    => 'tariff_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tariff_name', $this->data['tariff_details']['tariff_name']),
                'required' => 'required'
            );
            $this->data['tariff_duration'] = array(
                'name'  => 'tariff_duration',
                'id'    => 'tariff_duration',
                'type'  => 'number',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tariff_duration', $this->data['tariff_details']['tariff_duration']),
                'required' => 'required'
            );
            $this->data['tariff_remarks'] = array(
                'name'  => 'tariff_remarks',
                'id'    => 'tariff_remarks',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tariff_remarks', $this->data['tariff_details']['tariff_remarks']),
                'required' => 'required'
            );
            $this->data['tariff_amount'] = array(
                'name'  => 'tariff_amount',
                'id'    => 'tariff_amount',
                'type'  => 'number',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tariff_amount', $this->data['tariff_details']['tariff_amount']),
                'required' => 'required'
            );
            
            // Load Page
            $this->data['meta_title'] = 'Update Tariff';
            $this->data['subview'] = 'edit';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   _is_unique_name
    Authur      :   Ismail
    Created     :   04-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function _is_unique_name($name, $id)
    {
        if($this->Common_model->check_unique_for_callback('ts_tariffs', 'tariff_name', $name, 'tariff_id', $id))
        {
            $this->form_validation->set_message('_is_unique_name', 'The Tariff Name field must contain a unique value.');
            return false;
        }

        return true;
    }
    
    /*
    Name        :   details
    Authur      :   Ismail
    Created     :   04-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function details($tariff_id)
    {
        $this->data['tariff_details'] = $this->Common_model->get_single_row_by('ts_tariffs', 'tariff_id', $tariff_id);
            
        // Load Page
        $this->data['meta_title'] = 'Tariff Details';
        $this->data['subview'] = 'details';
        $this->load->view('backend/_layout_main', $this->data);
    }

}