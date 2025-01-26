<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends Backend_Controller {

    /*
    Name        :   __construct
    Authur      :   Ismail
    Created     :   31-01-18
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

        $this->load->model('Payment_model');
    }
    
    /*
    Name        :   index
    Authur      :   Ismail
    Created     :   31-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function index()
    {
        $this->data['all_pay_his'] = $this->Payment_model->get_all_pay_his(); 
        
        $this->data['meta_title'] = 'All Payment History';
        $this->data['subview'] = 'index';
        $this->load->view('backend/_layout_main', $this->data);
    }
    
    /*
    Name        :   add
    Authur      :   Ismail
    Created     :   31-01-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function add()
    {
        // validate form input
        $this->form_validation->set_rules('webu_id', 'Web User', 'required|trim');
        $this->form_validation->set_rules('payment_month', 'Payment Month', 'trim|required');
        $this->form_validation->set_rules('payment_year', 'Payment Year', 'trim|required');
        $this->form_validation->set_rules('payment_date', 'Payment Date', 'trim|required');
        $this->form_validation->set_rules('payment_by', 'Payment By', 'trim|required|max_length[1]');
        $this->form_validation->set_rules('payment_amount', 'Payment Amount', 'trim|required');
        $this->form_validation->set_rules('payment_remarks', 'Remarks', 'trim|required|max_length[255]');

        if ($this->form_validation->run() == true) {
            $data = array();
            $data['webu_id'] = $this->input->post('webu_id');
            $data['payment_month'] = $this->input->post('payment_month');
            $data['payment_year'] = $this->input->post('payment_year');
            $data['payment_date'] = date('Y-m-d', strtotime($this->input->post('payment_date')));
            $data['payment_remarks'] = $this->input->post('payment_remarks');
            $data['payment_by'] = $this->input->post('payment_by');
            $data['payment_amount'] = $this->input->post('payment_amount');
            $data['payment_created'] = date('Y-m-d H:i:s');

            if($this->Common_model->save('ts_payment_history', $data))
            {
                $this->session->set_flashdata('success', 'Payment History Created Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('payment');

        }
        else {
            // display the create customer form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['webu_id'] = $this->Common_model->get_dropdown('ts_web_user', 'webu_id', 'webu_email', '-- Select User --');

            // $this->data['payment_month'] = array(
            //     'name'  => 'payment_month',
            //     'id'    => 'payment_month',
            //     'type'  => 'text',
            //     'class' => 'form-control',
            //     'value' => $this->form_validation->set_value('payment_month'),
            // );
            // $this->data['payment_year'] = array(
            //     'name'  => 'payment_year',
            //     'id'    => 'payment_year',
            //     'type'  => 'text',
            //     'class' => 'form-control',
            //     'value' => $this->form_validation->set_value('payment_year'),
            // );
            $this->data['payment_date'] = array(
                'name'  => 'payment_date',
                'id'    => 'payment_date',
                'type'  => 'text',
                'class' => 'form-control datepicker',
                'value' => $this->form_validation->set_value('payment_date'),
            );
            $this->data['payment_remarks'] = array(
                'name'  => 'payment_remarks',
                'id'    => 'payment_remarks',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('payment_remarks'),
            );
            $this->data['payment_amount'] = array(
                'name'  => 'payment_amount',
                'id'    => 'payment_amount',
                'type'  => 'number',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('payment_amount'),
            );
            
            // Load Page
            $this->data['meta_title'] = 'Create Payment';
            $this->data['subview'] = 'add';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   edit
    Authur      :   Ismail
    Created     :   01-02-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function edit($id)
    {
        // validate form input
        $this->form_validation->set_rules('webu_id', 'Web User', 'required|trim');
        $this->form_validation->set_rules('payment_month', 'Payment Month', 'trim|required');
        $this->form_validation->set_rules('payment_year', 'Payment Year', 'trim|required');
        $this->form_validation->set_rules('payment_date', 'Payment Date', 'trim|required');
        $this->form_validation->set_rules('payment_by', 'Payment By', 'trim|required|max_length[1]');
        $this->form_validation->set_rules('payment_remarks', 'Remarks', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('payment_amount', 'Payment Amount', 'trim|required');

        if ($this->form_validation->run() == true) {
            $data = array();
            $data['webu_id'] = $this->input->post('webu_id');
            $data['payment_month'] = $this->input->post('payment_month');
            $data['payment_year'] = $this->input->post('payment_year');
            $data['payment_date'] = date('Y-m-d', strtotime($this->input->post('payment_date')));
            $data['payment_remarks'] = $this->input->post('payment_remarks');
            $data['payment_by'] = $this->input->post('payment_by');
            $data['payment_amount'] = $this->input->post('payment_amount');

            if($this->Common_model->edit('ts_payment_history', 'payment_id', $id, $data))
            {
                $this->session->set_flashdata('success', 'Payment History Updated Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('payment');

        }
        else {
            // display the update user form
            
            $this->data['webu_id'] = $this->Common_model->get_dropdown('ts_web_user', 'webu_id', 'webu_email', '-- Select User --');

            $this->data['payment_details'] = $this->Common_model->get_single_row_by('ts_payment_history', 'payment_id', $id);

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['payment_date'] = array(
                'name'  => 'payment_date',
                'id'    => 'payment_date',
                'type'  => 'text',
                'class' => 'form-control datepicker',
                'value' => $this->form_validation->set_value('payment_date', date('d-m-Y', strtotime($this->data['payment_details']['payment_date']))),
            );
            $this->data['payment_remarks'] = array(
                'name'  => 'payment_remarks',
                'id'    => 'payment_remarks',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('payment_remarks', $this->data['payment_details']['payment_remarks']),
            );
            $this->data['payment_amount'] = array(
                'name'  => 'payment_amount',
                'id'    => 'payment_amount',
                'type'  => 'number',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('payment_amount', $this->data['payment_details']['payment_amount']),
            );
            
            // Load Page
            $this->data['meta_title'] = 'Update Payment History';
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
        if($this->Common_model->check_unique_for_callback('ts_payment_history', 'webu_id', $name, 'payment_id', $id))
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
        if($this->Common_model->check_unique_for_callback('ts_payment_history', 'payment_month', $sht_name, 'payment_id', $id))
        {
            $this->form_validation->set_message('_is_unique_short_name', 'The Division Short Name field must contain a unique value.');
            return false;
        }

        return true;
    }

}