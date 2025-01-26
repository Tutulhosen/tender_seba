<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_user extends Backend_Controller {

    /*
    Name        :   __construct
    Authur      :   Ismail
    Created     :   15-02-18
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

        $this->load->model('Web_user_model');
    }
    
    /*
    Name        :   sign_up
    Authur      :   Ismail
    Created     :   15-02-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function sign_up()
    {
        // validate form input
        $this->form_validation->set_rules('user_name', 'Name', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required|max_length[16]');
        $this->form_validation->set_rules('user_password_confirm', 'Confirm Password', 'trim|required|matches[user_password]');
        $this->form_validation->set_rules('user_email', 'User E-mails', 'trim|required|valid_email|max_length[70]|is_unique[ts_web_user.webu_email]');
        $this->form_validation->set_rules('user_phone', 'Cell No', 'trim|required|max_length[20]|is_unique[ts_web_user.webu_phone]');
        // $this->form_validation->set_rules('webu_company_name', 'Company Name', 'trim|required|max_length[150]');
        // $this->form_validation->set_rules('webu_designation', 'Designation', 'trim|required|max_length[100]');
        // $this->form_validation->set_rules('webu_company_type', 'Company Type', 'trim|required');

        if ($this->form_validation->run() == true) {
            $data['webu_full_name'] = $this->input->post('webu_full_name');
            // $data['webu_user_name'] = $this->input->post('webu_user_name');
            $data['webu_password'] = $this->input->post('webu_password');
            $data['webu_status'] = $this->input->post('webu_status');
            $data['webu_email'] = $this->input->post('webu_email');
            $data['webu_phone'] = $this->input->post('webu_phone');
            // $data['webu_company_name'] = $this->input->post('webu_company_name');
            // $data['webu_designation'] = $this->input->post('webu_designation');
            // $data['webu_company_type'] = $this->input->post('webu_company_type');
            $data['webu_created'] = date('Y-m-d H:i:s');

            if($user_id = $this->Common_model->create_with_return_id('ts_web_user', $data))
            {
                $this->session->set_flashdata('success', 'Web User Created Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('Web_user/edit/' . $user_id);

        }
        else 
        {
            $this->data['meta_title'] = 'Sign Up - Rokomari Tender';
            $this->data['subview'] = 'sign_up_view';
            $this->load->view('frontend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   edit
    Authur      :   Ismail
    Created     :   31-01-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function edit($id)
    {
        // validate form input
        $this->form_validation->set_rules('webu_full_name', 'Full Name', 'required|trim|max_length[100]');
        // $this->form_validation->set_rules('webu_user_name', 'User Name', 'trim|required|callback__is_unique_user_name['. $id .']|max_length[50]');
        $this->form_validation->set_rules('webu_status', 'Status', 'trim|required');
        $this->form_validation->set_rules('webu_email', 'User E-mails', 'trim|required|valid_email|max_length[70]|callback__is_unique_email['. $id .']');
        $this->form_validation->set_rules('webu_phone', 'Cell No', 'trim|required|max_length[20]|callback__is_unique_phone['. $id .']');
        $this->form_validation->set_rules('webu_company_name', 'Company Name', 'trim|required|max_length[150]');
        $this->form_validation->set_rules('webu_designation', 'Designation', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('webu_company_type', 'Company Type', 'trim|required');

        if ($this->form_validation->run() == true) {
            $data = array();
            $data['webu_full_name'] = $this->input->post('webu_full_name');
            // $data['webu_user_name'] = $this->input->post('webu_user_name');
            $data['webu_password'] = $this->input->post('webu_password');
            $data['webu_status'] = $this->input->post('webu_status');
            $data['webu_email'] = $this->input->post('webu_email');
            $data['webu_phone'] = $this->input->post('webu_phone');
            $data['webu_company_name'] = $this->input->post('webu_company_name');
            $data['webu_designation'] = $this->input->post('webu_designation');
            $data['webu_company_type'] = $this->input->post('webu_company_type');

            if($this->Common_model->edit('ts_web_user', 'webu_id', $id, $data))
            {
                $this->session->set_flashdata('success', 'User Updated Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('Web_user');

        }
        else {
            // display the update user form

            $this->data['web_user_details'] = $this->Common_model->get_single_row_by('ts_web_user', 'webu_id', $id);

            $this->data['webu_company_type'] = $this->Common_model->get_dropdown('ts_sub_categories', 'sub_cat_id', 'sub_cat_name', '-- Select Company Type --');

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['webu_full_name'] = array(
                'name'  => 'webu_full_name',
                'id'    => 'webu_full_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('webu_full_name', $this->data['web_user_details']['webu_full_name']),
                'required' => 'required'
            );
            // $this->data['webu_user_name'] = array(
            //     'name'  => 'webu_user_name',
            //     'id'    => 'webu_user_name',
            //     'type'  => 'text',
            //     'class' => 'form-control',
            //     'value' => $this->form_validation->set_value('webu_user_name', $this->data['web_user_details']['webu_user_name']),
            //     'required' => 'required'
            // );
            $this->data['webu_email'] = array(
                'name'  => 'webu_email',
                'id'    => 'webu_email',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('webu_email', $this->data['web_user_details']['webu_email']),
                'required' => 'required'
            );
            $this->data['webu_phone'] = array(
                'name'  => 'webu_phone',
                'id'    => 'webu_phone',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('webu_phone', $this->data['web_user_details']['webu_phone']),
                'required' => 'required'
            );
            $this->data['webu_company_name'] = array(
                'name'  => 'webu_company_name',
                'id'    => 'webu_company_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('webu_company_name', $this->data['web_user_details']['webu_company_name']),
                'required' => 'required'
            );
            $this->data['webu_designation'] = array(
                'name'  => 'webu_designation',
                'id'    => 'webu_designation',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('webu_designation', $this->data['web_user_details']['webu_designation']),
                'required' => 'required'
            );
            
            // Load Page
            $this->data['meta_title'] = 'Update User';
            $this->data['subview'] = 'edit';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   _is_unique_email
    Authur      :   Ismail
    Created     :   03-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function _is_unique_email($email, $id)
    {
        if($this->Common_model->check_unique_for_callback('ts_web_user', 'webu_email', $email, 'webu_id', $id))
        {
            $this->form_validation->set_message('_is_unique_email', 'The E-mail field must contain a unique value.');
            return false;
        }

        return true;
    }
    
    /*
    Name        :   _is_unique_phone
    Authur      :   Ismail
    Created     :   03-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function _is_unique_phone($phone, $id)
    {
        if($this->Common_model->check_unique_for_callback('ts_web_user', 'webu_phone', $phone, 'webu_id', $id))
        {
            $this->form_validation->set_message('_is_unique_phone', 'The Cell No field must contain a unique value.');
            return false;
        }

        return true;
    }
    
    /*
    Name        :   payment_history
    Authur      :   Ismail
    Created     :   01-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    // public function payment_history($webu_id)
    // {
    //     $this->data['webu_pay_his'] = $this->Common_model->get_payment_history_by_user($webu_id);
    // }
    
    /*
    Name        :   details
    Authur      :   Ismail
    Created     :   03-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function details($webu_id)
    {
        $this->data['webu_basic_details'] = $this->Common_model->get_single_row_by('ts_web_user', 'webu_id', $webu_id);

        $this->data['company_type'] = $this->Common_model->get_name('ts_sub_categories', 'sub_cat_name', 'sub_cat_id', $this->data['webu_basic_details']['webu_company_type']);

        $this->data['webu_payment_history'] = $this->Common_model->get_data_by('ts_payment_history', 'webu_id', $webu_id);
            
        // Load Page
        $this->data['meta_title'] = 'User Details';
        $this->data['subview'] = 'details';
        $this->load->view('backend/_layout_main', $this->data);
    }

}