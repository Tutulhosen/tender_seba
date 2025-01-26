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
        
        if (!$this->ion_auth->logged_in() && $this->uri->segment(2) != 'sign_up' && $this->uri->segment(2) != 'login'){
            // redirect them to the login page
            // redirect('admin/dashboard');
            return show_error('You are not authorized to view this page.');
        }
        // elseif (!$this->ion_auth->is_admin() && !$this->ion_auth->is_setup_user() && $this->uri->segment(2) != 'sign_up'){
        //     // redirect them to the home page because they must be an administrator to view this
        //     return show_error('You are not authorized to view this page.');
        // }

        $this->load->model('Web_user_model');
    }
    
    /*
    Name        :   sign_up
    Authur      :   Ismail
    Created     :   19-02-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function sign_up()
    {
        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('user_name', 'Name', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|max_length[70]|is_unique[ts_web_user.webu_email]');
        $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[user_confirm_password]');
        $this->form_validation->set_rules('user_confirm_password', 'Confirm Password', 'required');
        $this->form_validation->set_rules('user_agree', 'Terms & Conditions', 'required', array('required' => 'You must agree with our terms and conditions.'));
        $this->form_validation->set_rules('user_phone', 'Cell No', 'trim|required|max_length[20]|is_unique[ts_web_user.webu_phone]');

        if ($this->form_validation->run() == true) {
            $email    = strtolower($this->input->post('user_email'));
            $identity = $email;
            $password = $this->input->post('user_password');

            $additional_data = array(
                'webu_full_name' => $this->input->post('user_name'),
                'webu_phone'  => $this->input->post('user_phone'),
                
            );
        }

        if ($this->form_validation->run() == true && ($id = $this->ion_auth->register($identity, $password, $email, $additional_data))) 
        {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());

            if ($this->ion_auth->login($identity, $password))
            {
                //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('web_user/edit/' . $id);
            }
            else
            {
                // if the login was un-successful
                // redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('login'); // use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        } 
        else 
        {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));


            $this->data['meta_title'] = 'Sign Up - Rokomari Tender';
            $this->data['subview'] = 'sign_up_view';
            $this->load->view('frontend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   sign_up1
    Authur      :   Ismail
    Created     :   15-02-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    // public function sign_up1()
    // {
    //     // validate form input
    //     $this->form_validation->set_rules('user_name', 'Name', 'required|trim|max_length[100]');
    //     $this->form_validation->set_rules('user_password', 'Password', 'trim|required|max_length[20]|min_length[8]');
    //     $this->form_validation->set_rules('user_confirm_password', 'Confirm Password', 'trim|required|matches[user_password]');
    //     $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email|max_length[70]|is_unique[ts_web_user.webu_email]');
    //     $this->form_validation->set_rules('user_phone', 'Cell No', 'trim|required|max_length[20]|is_unique[ts_web_user.webu_phone]');
    //     $this->form_validation->set_rules('user_agree', 'Terms & Conditions', 'required', array('required' => 'You must agree with our terms and conditions.'));

    //     if ($this->form_validation->run() == true) {
    //         $data['webu_full_name'] = $this->input->post('user_name');
    //         $data['password'] = $this->input->post('user_password');
    //         $data['webu_email'] = $this->input->post('user_email');
    //         $data['webu_phone'] = $this->input->post('user_phone');
    //         $data['webu_created'] = date('Y-m-d H:i:s');

    //         if($user_id = $this->Common_model->create_with_return_id('ts_web_user', $data))
    //         {
    //             if ($this->ion_auth->login($data['webu_email'], $data['password']))
    //             {
    //                 //if the login is successful
    //                 //redirect them back to the edit page
    //                 $this->session->set_flashdata('message', $this->ion_auth->messages());
    //                 redirect('Web_user/edit/' . $user_id);
    //             }else{
    //                 // if the login was un-successful
    //                 // redirect them back to the login page
    //                 $this->session->set_flashdata('message', $this->ion_auth->errors());
    //                 redirect('login'); // use redirects instead of loading views for compatibility with MY_Controller libraries
    //             }
    //             // $this->session->set_flashdata('success', 'You are registered Successfully! Please fill the following information for further process.');
    //         }
    //         else
    //         {
    //             $this->session->set_flashdata('errorMsg', '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>Failed! Please try again or Contact Us.</div>');
    //         }
    //     }

    //     $this->data['meta_title'] = 'Sign Up - Rokomari Tender';
    //     $this->data['subview'] = 'sign_up_view';
    //     $this->load->view('frontend/_layout_main', $this->data);
    // }
    
    /*
    Name        :   edit
    Authur      :   Ismail
    Created     :   22-02-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function edit($id)
    {
        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('user_name', 'Name', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|max_length[70]|callback__is_unique_email['. $id .']');
        $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[user_confirm_password]');
        $this->form_validation->set_rules('user_confirm_password', 'Confirm Password', 'required');
        $this->form_validation->set_rules('user_phone', 'Cell No', 'trim|required|max_length[20]|callback__is_unique_phone['. $id .']');
        $this->form_validation->set_rules('user_company_name', 'Company Name', 'trim|required|max_length[150]');
        $this->form_validation->set_rules('user_designation', 'Designation', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('user_company_type', 'Company Type', 'trim|required');

        if ($this->form_validation->run() == true) {
            $email    = strtolower($this->input->post('user_email'));
            $identity = $email;
            $password = $this->input->post('user_password');

            $additional_data = array(
                'webu_full_name' => $this->input->post('user_name'),
                'webu_phone'  => $this->input->post('user_phone'),
                'webu_email' => $this->input->post('user_email'),
                'webu_password'  => $this->input->post('user_password'),
                'webu_company_name'  => $this->input->post('user_company_name'),
                'webu_designation' => $this->input->post('user_designation'),
                'webu_company_type'  => $this->input->post('user_company_type')
            );
        }

        if ($this->form_validation->run() == true && $this->Common_model->edit('ts_web_user', 'webu_id', $id, $additional_data)) 
        {
            $this->session->set_flashdata('success', 'Your Information Successfully Updated.');
        } 
        else 
        {
            $this->data['web_user_details'] = $this->Common_model->get_single_row_by('ts_web_user', 'webu_id', $id);

            $this->data['webu_company_type'] = $this->Common_model->get_dropdown('ts_sub_categories', 'sub_cat_id', 'sub_cat_name', '-- Select Company Type --');

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : $this->db->error());

            $this->data['user_company_name'] = array(
                'name'  => 'user_company_name',
                'id'    => 'user_company_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('user_company_name', $this->data['web_user_details']['webu_company_name']),
                'required' => 'required'
            );
            $this->data['user_designation'] = array(
                'name'  => 'user_designation',
                'id'    => 'user_designation',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('user_designation', $this->data['web_user_details']['webu_designation']),
                'required' => 'required'
            );
            
            // Load Page
            $this->data['meta_title'] = 'Update Personal Information';
            $this->data['subview'] = 'per_info_edit';
            $this->load->view('frontend/_layout_main', $this->data);
        }
    }

    
    /*
    Name        :   login
    Authur      :   Ismail
    Created     :   22-02-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function login(){
        //validate form input
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

        if ($this->form_validation->run() == true){
            // check to see if the user is logging in
            // check for "remember me"
            $remember = (bool) $this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)){
                //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('web_user/dashboard/' . $this->session->userdata('user_id'));
            }else{
                // if the login was un-successful
                // redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('web_user/login'); // use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        }else{
            // the user is not logging in so display the login page
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            // $this->data['identity'] = array('name' => 'identity',
            //     'id'    => 'identity',
            //     'type'  => 'text',
            //     'class' => 'form-control',
            //     'placeholder' => 'Email',
            //     'value' => $this->form_validation->set_value('identity'),
            // );
            // $this->data['password'] = array('name' => 'password',
            //     'id'   => 'password',
            //     'type' => 'password',
            //     'class' => 'form-control',
            //     'placeholder' => 'Password',
            // );
            
            $this->data['meta_title'] = 'Login';
            $this->data['subview'] = 'login';
            $this->load->view('frontend/_layout_head2', $this->data);
        }
    }
    
    /*
    Name        :   logout
    Authur      :   Ismail
    Created     :   22-02-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function logout()
    {
        // log the user out
        $logout = $this->ion_auth->logout();
        
        // redirect them to the login page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('site');
    }
    
    /*
    Name        :   dashboard
    Authur      :   Ismail
    Created     :   22-02-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function dashboard($userid)
    {
        $this->data['all_categories'] = $this->Common_model->get_data('ts_categories');
        $this->data['user_cats'] = $this->Common_model->get_user_cats($userid);

        $this->data['meta_title'] = 'Dashboard';
        $this->data['subview'] = 'dashboard';
        $this->load->view('frontend/_layout_head2', $this->data);
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