<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_user extends Backend_Controller {

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

        $this->load->model('Web_user_model');
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
        $this->data['all_web_user'] = $this->Web_user_model->get_all_web_user(); 
        
        $this->data['meta_title'] = 'All Web User';
        $this->data['subview'] = 'index';
        $this->load->view('backend/_layout_main', $this->data);
    }
    
    /*
    Name        :   add
    Authur      :   Ismail
    Created     :   31-01-18
    ModifiedBy  :   Ismail
    ModifiedDate:   19-02-18 | password max and min length
    */
    public function add()
    {
        // validate form input
        $this->form_validation->set_rules('webu_full_name', 'Full Name', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('webu_password', 'User Password', 'trim|required|max_length[20]|min_length[8]');
        $this->form_validation->set_rules('webu_password_confirm', 'Password Confirm', 'trim|required|matches[webu_password]');
        $this->form_validation->set_rules('webu_status', 'Status', 'trim|required');
        $this->form_validation->set_rules('webu_email', 'User E-mails', 'trim|required|valid_email|max_length[70]|is_unique[ts_web_user.webu_email]');
        $this->form_validation->set_rules('webu_phone', 'Cell No', 'trim|required|max_length[20]|is_unique[ts_web_user.webu_phone]');
        $this->form_validation->set_rules('webu_company_name', 'Company Name', 'trim|required|max_length[150]');
        $this->form_validation->set_rules('webu_designation', 'Designation', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('webu_company_type', 'Company Type', 'trim|required');

        if ($this->form_validation->run() == true) {
            $data['webu_full_name'] = $this->input->post('webu_full_name');
            // $data['webu_user_name'] = $this->input->post('webu_user_name');
            // $data['webu_password'] = $this->input->post('webu_password');
            $data['password'] = $this->input->post('webu_password');
            $data['webu_status'] = $this->input->post('webu_status');
            $data['webu_email'] = $this->input->post('webu_email');
            $data['webu_phone'] = $this->input->post('webu_phone');
            $data['webu_company_name'] = $this->input->post('webu_company_name');
            $data['webu_designation'] = $this->input->post('webu_designation');
            $data['webu_company_type'] = $this->input->post('webu_company_type');
            $data['webu_created'] = date('Y-m-d H:i:s');

            if($this->Common_model->save('ts_web_user', $data))
            {
                $this->session->set_flashdata('success', 'Web User Created Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('Web_user');

        }
        else {
            // display the create customer form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['webu_company_type'] = $this->Common_model->get_dropdown('ts_sub_categories', 'sub_cat_id', 'sub_cat_name', '-- Select Company Type --');

            $this->data['webu_full_name'] = array(
                'name'  => 'webu_full_name',
                'id'    => 'webu_full_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('webu_full_name'),
                'required' => 'required'
            );
            $this->data['webu_password'] = array(
                'name'  => 'webu_password',
                'id'    => 'webu_password',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('webu_password'),
                'required' => 'required'
            );
            $this->data['webu_password_confirm'] = array(
                'name'  => 'webu_password_confirm',
                'id'    => 'webu_password_confirm',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('webu_password_confirm'),
                'required' => 'required'
            );
            $this->data['webu_email'] = array(
                'name'  => 'webu_email',
                'id'    => 'webu_email',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('webu_email'),
                'required' => 'required'
            );
            $this->data['webu_phone'] = array(
                'name'  => 'webu_phone',
                'id'    => 'webu_phone',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('webu_phone'),
                'required' => 'required'
            );
            $this->data['webu_company_name'] = array(
                'name'  => 'webu_company_name',
                'id'    => 'webu_company_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('webu_company_name'),
                'required' => 'required'
            );
            $this->data['webu_designation'] = array(
                'name'  => 'webu_designation',
                'id'    => 'webu_designation',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('webu_designation'),
                'required' => 'required'
            );
            
            // Load Page
            $this->data['meta_title'] = 'Create Web User';
            $this->data['subview'] = 'add';
            $this->load->view('backend/_layout_main', $this->data);
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
    
    /*
    Name        :   sent_mail
    Authur      :   Ismail
    Created     :   04-03-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function sent_mail()
    {
        $today = date('Y-m-d');

        $today_mail_format = date('F j, Y');

        $today_strtotime = strtotime($today);

        $today_plus_1 = date('Y-m-d', strtotime($today . "+1 day"));
        $today_plus_2 = date('Y-m-d', strtotime($today . "+2 days"));
        $today_plus_3 = date('Y-m-d', strtotime($today . "+3 days"));
        $today_plus_4 = date('Y-m-d', strtotime($today . "+4 days"));
        $today_plus_5 = date('Y-m-d', strtotime($today . "+5 days"));
        $today_plus_6 = date('Y-m-d', strtotime($today . "+6 days"));

        $todays_all_tender = $this->Common_model->get_tenders_by_created_and($today);
        
        $todays_new_tender = $this->Common_model->get_tenders_by_created_and($today, 'tender_call_type', 1);
        $todays_new_tender_size = sizeof($todays_new_tender);

        $todays_corrigendum = $this->Common_model->get_tenders_by_created_and($today, 'tender_call_type', 2);
        $todays_corrigendum_size = sizeof($todays_corrigendum);

        $todays_cancellation = $this->Common_model->get_tenders_by_created_and($today, 'tender_call_type', 3);
        $todays_cancellation_size = sizeof($todays_cancellation);

        $todays_republished = $this->Common_model->get_tenders_by_created_and($today, 'tender_call_type', 4);
        $todays_republished_size = sizeof($todays_republished);

        // Reminder
        $schedule_purchase_today = $this->Common_model->get_data_by('ts_tenders', 'tender_schedule_purchase', $today);
        $schedule_purchase_today = sizeof($schedule_purchase_today);

        $schedule_purchase_plus_1 = $this->Common_model->get_data_by('ts_tenders', 'tender_schedule_purchase', $today_plus_1);
        $schedule_purchase_plus_1 = sizeof($schedule_purchase_plus_1);

        $schedule_purchase_plus_2 = $this->Common_model->get_data_by('ts_tenders', 'tender_schedule_purchase', $today_plus_2);
        $schedule_purchase_plus_2 = sizeof($schedule_purchase_plus_2);

        $schedule_purchase_plus_3 = $this->Common_model->get_data_by('ts_tenders', 'tender_schedule_purchase', $today_plus_3);
        $schedule_purchase_plus_3 = sizeof($schedule_purchase_plus_3);

        $schedule_purchase_plus_4 = $this->Common_model->get_data_by('ts_tenders', 'tender_schedule_purchase', $today_plus_4);
        $schedule_purchase_plus_4 = sizeof($schedule_purchase_plus_4);

        $schedule_purchase_plus_5 = $this->Common_model->get_data_by('ts_tenders', 'tender_schedule_purchase', $today_plus_5);
        $schedule_purchase_plus_5 = sizeof($schedule_purchase_plus_5);

        $schedule_purchase_plus_6 = $this->Common_model->get_data_by('ts_tenders', 'tender_schedule_purchase', $today_plus_6);
        $schedule_purchase_plus_6 = sizeof($schedule_purchase_plus_6);
        //schedule purchase end

        //preebid meeting start
        $prebid_meeting_today = $this->Common_model->get_data_by('ts_tenders', 'tender_prebid_meeting', $today);
        $prebid_meeting_today = sizeof($prebid_meeting_today);

        $prebid_meeting_plus_1 = $this->Common_model->get_data_by('ts_tenders', 'tender_prebid_meeting', $today_plus_1);
        $prebid_meeting_plus_1 = sizeof($prebid_meeting_plus_1);

        $prebid_meeting_plus_2 = $this->Common_model->get_data_by('ts_tenders', 'tender_prebid_meeting', $today_plus_2);
        $prebid_meeting_plus_2 = sizeof($prebid_meeting_plus_2);

        $prebid_meeting_plus_3 = $this->Common_model->get_data_by('ts_tenders', 'tender_prebid_meeting', $today_plus_3);
        $prebid_meeting_plus_3 = sizeof($prebid_meeting_plus_3);

        $prebid_meeting_plus_4 = $this->Common_model->get_data_by('ts_tenders', 'tender_prebid_meeting', $today_plus_4);
        $prebid_meeting_plus_4 = sizeof($prebid_meeting_plus_4);

        $prebid_meeting_plus_5 = $this->Common_model->get_data_by('ts_tenders', 'tender_prebid_meeting', $today_plus_5);
        $prebid_meeting_plus_5 = sizeof($prebid_meeting_plus_5);

        $prebid_meeting_plus_6 = $this->Common_model->get_data_by('ts_tenders', 'tender_prebid_meeting', $today_plus_6);
        $prebid_meeting_plus_6 = sizeof($prebid_meeting_plus_6);
        //prebid meeting end

        //opening start
        $opening_today = $this->Common_model->get_data_by('ts_tenders', 'tender_opening', $today);
        $opening_today = sizeof($opening_today);

        $opening_plus_1 = $this->Common_model->get_data_by('ts_tenders', 'tender_opening', $today_plus_1);
        $opening_plus_1 = sizeof($opening_plus_1);

        $opening_plus_2 = $this->Common_model->get_data_by('ts_tenders', 'tender_opening', $today_plus_2);
        $opening_plus_2 = sizeof($opening_plus_2);

        $opening_plus_3 = $this->Common_model->get_data_by('ts_tenders', 'tender_opening', $today_plus_3);
        $opening_plus_3 = sizeof($opening_plus_3);

        $opening_plus_4 = $this->Common_model->get_data_by('ts_tenders', 'tender_opening', $today_plus_4);
        $opening_plus_4 = sizeof($opening_plus_4);

        $opening_plus_5 = $this->Common_model->get_data_by('ts_tenders', 'tender_opening', $today_plus_5);
        $opening_plus_5 = sizeof($opening_plus_5);

        $opening_plus_6 = $this->Common_model->get_data_by('ts_tenders', 'tender_opening', $today_plus_6);
        $opening_plus_6 = sizeof($opening_plus_6);
        //End reminder

        $mail_bdytnd = '<br><br>
                        <table width="50%" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody>
                                <tr>
                                    <td colspan="4" style="font-family:arial,sans-serif,verdana;width:114.5pt;border-top:solid #1879e4 1.0pt;border-left:solid #1879e4 1.0pt;border-bottom:none;border-right:solid #1879e4 1.0pt;background:#1879e4;font-size:10pt;font-weight:bold;color:#fff;text-align:center" align="center">
                                        Summary
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:37.5pt;border-top:solid #f5df18 1.0pt;border-left:solid #f5df18 1.0pt;border-bottom:solid #f5df18 1.0pt;border-right:solid #f5df18 1.0pt;background:#f5df18;padding:0.5pt" width="50" align="center">
                                        <p class="MsoNormal"><b><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">New</span></b></p>
                                    </td>
                                    <td style="width:37.5pt;border-top:solid #f5df18 1.0pt;border-left:none;border-bottom:solid #f5df18 1.0pt;border-right:solid #f5df18 1.0pt;background:#f5df18;padding:0.5pt" width="50" align="center">
                                            <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><b>Corrigendum</b></span></p>
                                    </td>
                                    <td style="width:37.5pt;border-top:solid #f5df18 1.0pt;border-left:none;border-bottom:solid #f5df18 1.0pt;border-right:solid #f5df18 1.0pt;background:#f5df18;padding:0.5pt" width="50" align="center">
                                        <p style="text-align:center" class="MsoNormal" align="center"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><b>Cancellation</b></span></p>
                                    </td>
                                    <td style="width:37.5pt;border-top:solid #f5df18 1.0pt;border-left:none;border-bottom:solid #f5df18 1.0pt;border-right:solid #f5df18 1.0pt;background:#f5df18;padding:0.5pt" width="50" align="center">
                                        <p style="text-align:center" class="MsoNormal" align="center"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><b>Republished</b></span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:none;border-left:solid #f5df18 1.0pt;border-bottom:solid #f5df18 1.0pt;border-right:solid #f5df18 1.0pt;background:#ffffff;padding:0.5pt" align="center">
                                        <p class="MsoNormal"> <span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555;text-decoration:none"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $todays_new_tender_size .'</a> </span></p>
                                    </td>
                                    <td style="border:none;border-bottom:solid #f5df18 1.0pt;border-right:solid #f5df18 1.0pt;background:#ffffff;padding:0.5pt" align="center">
                                        <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $todays_corrigendum_size .'</a></span></p>
                                    </td>
                                    <td style="border:none;border-bottom:solid #f5df18 1.0pt;border-right:solid #f5df18 1.0pt;background:#ffffff;padding:0.5pt" align="center">
                                        <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $todays_cancellation_size .'</a></span></p>
                                    </td>
                                    <td style="border:none;border-bottom:solid #f5df18 1.0pt;border-right:solid #f5df18 1.0pt;background:#ffffff;padding:0.5pt" align="center">
                                        <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $todays_republished_size .'</a></span></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
        
                        <div style="width:100%;height:auto;margin-top:10pt" align="center">
                            <div style="width:100%;height:24px;background:#1879e4" align="center">
                                <span style="font-family:arial,sans-serif,verdana;line-height:24px;font-size:10pt;font-weight:bold;color:#fff;margin-left:10px">Reminder</span>
                            </div>   
                            <div align="center">
                                <table style="width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tbody>
                                        <tr>
                                            <td style="width:112.5pt;border-top:solid #f5df18 1.0pt;border-left:solid #f5df18 1.0pt;border-bottom:solid #f5df18 1.0pt;border-right:solid #f5df18 1.0pt;background:#f5df18;padding:0.5pt" width="150" align="left">
                                                <p class="MsoNormal"><b><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Events</span></b></p>
                                            </td>
                                            <td style="width:60.0pt;border-top:solid #f5df18 1.0pt;border-left:none;border-bottom:solid #f5df18 1.0pt;border-right:solid #f5df18 1.0pt;background:#f5df18;padding:0.5pt" width="80" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><b>Today</b><br>['. date('d/m/y') .']</span></p>
                                            </td>
                                            <td style="width:60.0pt;border-top:solid #f5df18 1.0pt;border-left:none;border-bottom:solid #f5df18 1.0pt;border-right:solid #f5df18 1.0pt;background:#f5df18;padding:0.5pt" width="80" align="center">
                                                <p style="text-align:center" class="MsoNormal" align="center"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><b>Tomorrow</b><br>['. date('d/m/y', strtotime($today . "+1 day")) .']</span></p>
                                            </td>
                                            <td style="width:60.0pt;border-top:solid #f5df18 1.0pt;border-left:none;border-bottom:solid #f5df18 1.0pt;border-right:solid #f5df18 1.0pt;background:#f5df18;padding:0.5pt" width="80" align="center">
                                                <p style="text-align:center" class="MsoNormal" align="center"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><b>Mon</b><br>['. date('d/m/y', strtotime($today . "+2 day")) .']</span></p>
                                            </td>
                                            <td style="width:60.0pt;border-top:solid #f5df18 1.0pt;border-left:none;border-bottom:solid #f5df18 1.0pt;border-right:solid #f5df18 1.0pt;background:#f5df18;padding:0.5pt" width="80" align="center">
                                                <p style="text-align:center" class="MsoNormal" align="center"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><b>Tue</b><br>['. date('d/m/y', strtotime($today . "+3 day")) .']</span></p>
                                            </td>
                                            <td style="width:60.0pt;border-top:solid #f5df18 1.0pt;border-left:none;border-bottom:solid #f5df18 1.0pt;border-right:solid #f5df18 1.0pt;background:#f5df18;padding:0.5pt" width="80" align="center">
                                                <p style="text-align:center" class="MsoNormal" align="center"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><b>Wed</b><br>['. date('d/m/y', strtotime($today . "+4 day")) .']</span></p>
                                            </td>
                                            <td style="width:60.0pt;border-top:solid #f5df18 1.0pt;border-left:none;border-bottom:solid #f5df18 1.0pt;border-right:solid #f5df18 1.0pt;background:#f5df18;padding:0.5pt" width="80" align="center">
                                                <p style="text-align:center" class="MsoNormal" align="center"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><b>Thu</b><br>['. date('d/m/y', strtotime($today . "+5 day")) .']</span></p>
                                            </td>
                                            <td style="width:60.0pt;border-top:solid #f5df18 1.0pt;border-left:none;border-bottom:solid #f5df18 1.0pt;border-right:solid #f5df18 1.0pt;background:#f5df18;padding:0.5pt" width="80" align="center">
                                                <p style="text-align:center" class="MsoNormal" align="center"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><b>Fri</b><br>['. date('d/m/y', strtotime($today . "+6 day")) .']</span></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none;border-left:solid #ebedd7 1.0pt;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="left">
                                                <p class="MsoNormal"> <span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555;text-decoration:none">Schedule Purchase</span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $schedule_purchase_today .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $schedule_purchase_plus_1 .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $schedule_purchase_plus_2 .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $schedule_purchase_plus_3 .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $schedule_purchase_plus_4 .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $schedule_purchase_plus_5 .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $schedule_purchase_plus_6 .'</a></span></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border:none;border-left:solid #ebedd7 1.0pt;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="left">
                                                <p class="MsoNormal"> <span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555;text-decoration:none">Pre-Bid Meeting</span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $prebid_meeting_today .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $prebid_meeting_plus_1 .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $prebid_meeting_plus_2 .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $prebid_meeting_plus_3 .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $prebid_meeting_plus_4 .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $prebid_meeting_plus_5 .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $prebid_meeting_plus_6 .'</a></span></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:none;border-left:solid #ebedd7 1.0pt;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="left">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555;text-decoration:none">Submission</span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" ></a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" ></a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" ></a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" ></a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" ></a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" ></a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" ></a></span></p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="border-top:none;border-left:solid #ebedd7 1.0pt;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="left">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555;text-decoration:none">Opening</span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $opening_today .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $opening_plus_1 .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $opening_plus_2 .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $opening_plus_3 .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $opening_plus_4 .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $opening_plus_5 .'</a></span></p>
                                            </td>
                                            <td style="border:none;border-bottom:solid #ebedd7 1.0pt;border-right:solid #ebedd7 1.0pt;background:#fff;padding:0.5pt" align="center">
                                                <p class="MsoNormal"><span style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"><a style="color:#555;text-decoration:none" href="#" target="_blank" >'. $opening_plus_6 .'</a></span></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div style="font-weight:bold;color:#ffffff;padding:8px;background-color:#a2ce53;font-size:11px"><a style="color:black;text-decoration:none" href="#" target="_blank" >Only RokomariTender can send notifications based on ORGANIZATION, LOCATION, SPECIAL REQUIREMENTS (Auction, Lease, Sale, EOI, International Tenders etc.)</a></div>
                        <br>
                        <div style="font-weight:bold;color:#6c75f4;height:35px;line-height:35px">New Notification ['. ($todays_new_tender_size + $todays_corrigendum_size) .']</div>

                        <div style="font-family:arial,sans-serif,verdana;border-bottom:2px solid #ce3d72;height:35px;width:100%;color:#187fdb;font-size:10pt;font-weight:bold;line-height:35px">Tender ['. $todays_new_tender_size .']</div>

                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>';

        // $new_tender_first = true;
        foreach($todays_new_tender as $new_tender_value)
        {
            $tender_closed_on = date('d-M-y', strtotime($new_tender_value->tender_closed_on));
            $tender_closed_strtotime = strtotime($new_tender_value->tender_closed_on);
            if($today_strtotime > $tender_closed_strtotime)
            {
                $closed_remaining_days = ($today_strtotime - $tender_closed_strtotime) / (60*60*24) . ' days back';
            }
            else
            {
                $closed_remaining_days = ($tender_closed_strtotime - $today_strtotime) / (60*60*24) . ' days more';
            }
                $mail_bdytnd .= '<tr>
                                    <td style="border:1.0pt solid;border-color:#ebedd7">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555" width="15%">Title</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#2595dc" width="85%">:<a style="color:#2595dc;text-decoration:none" href="#" target="_blank" >'. $new_tender_value->tender_title .'</a></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Type</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $new_tender_value->pro_method_name .'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Inviter</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $new_tender_value->inviter_name .'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Procuring Place</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $new_tender_value->district_name .'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Document Price</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $new_tender_value->tender_doc_price .'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Security Amount</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $new_tender_value->tender_security_amount .'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Published On</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. date('d-M-y', strtotime($new_tender_value->tender_published_on)) .' ['. $new_tender_value->source_name .']</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Closed On</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $tender_closed_on .' ('. $closed_remaining_days .')</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"> </td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555;text-align:right"><a href="'. base_url('rokomari_tender/site/show_image/' . $new_tender_value->tender_auto_id) .'" target="_blank" >Show Image</a> &nbsp;&nbsp; <a href="'. base_url('rokomari_tender/site/show_details/' . $new_tender_value->tender_auto_id) .'" target="_blank" >Show Details</a>&nbsp;&nbsp; </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr><td style="height:5px;font-size:0.1em">&nbsp;</td></tr>';
        }

            $mail_bdytnd .= '</tbody>
                        </table>

                        <div style="font-family:arial,sans-serif,verdana;border-bottom:2px solid #ce3d72;height:35px;width:100%;color:#187fdb;font-size:10pt;font-weight:bold;line-height:35px">Corrigendum Notice ['. $todays_corrigendum_size .']</div>
         
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>';

        foreach($todays_corrigendum as $corrigendum_value)
        {
            $tender_published_on = date('d-M-y', strtotime($corrigendum_value->tender_published_on));

            $tender_closed_on = date('d-M-y', strtotime($corrigendum_value->tender_closed_on));
            $tender_closed_strtotime = strtotime($corrigendum_value->tender_closed_on);
            if($today_strtotime > $tender_closed_strtotime)
                $closed_remaining_days = 0;
            else
                $closed_remaining_days = ($tender_closed_strtotime - $today_strtotime) / (60*60*24);

                $mail_bdytnd .= '<tr>
                                    <td style="border:1.0pt solid;border-color:#ebedd7">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                
                                            <tbody>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555" width="15%">Title</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#2595dc" width="85%">:<a style="color:#2595dc;text-decoration:none" href="#" target="_blank" >'. $corrigendum_value->tender_title .'</a></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555" width="15%">Orginal Title</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#2595dc" width="85%">:<a style="color:#2595dc;text-decoration:none" href="#" target="_blank" >Original Title</a></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Type</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $corrigendum_value->pro_method_name .'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Inviter</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $corrigendum_value->inviter_name .'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Procuring Place</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $corrigendum_value->district_name .'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Published On</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $tender_published_on .' ['. $corrigendum_value->source_name .']</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Closed On</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $tender_closed_on .' ('. $closed_remaining_days .' days more)</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"> </td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555;text-align:right"><a href="#" target="_blank" >Show Original Tender Image</a> &nbsp;&nbsp; <a href="#" target="_blank" >Show Original Tender Details</a> &nbsp;&nbsp; <a href="'. base_url('rokomari_tender/site/show_image/' . $corrigendum_value->tender_auto_id) .'" target="_blank" >Show Image</a> &nbsp;&nbsp; <a href="'. base_url('rokomari_tender/site/show_details/' . $corrigendum_value->tender_auto_id) .'" target="_blank" >Show Details</a> &nbsp;&nbsp; </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr><td style="height:5px;font-size:0.1em">&nbsp;</td></tr>';
        }

            $mail_bdytnd .= '</tbody>
                        </table>
      
                        <div style="font-weight:bold;color:#6c75f4;border-bottom:2px solid #7ca4ee;height:35px;line-height:35px">Cancellation Notification ['. $todays_cancellation_size .']</div>
                            
                        <div style="font-family:arial,sans-serif,verdana;border-bottom:2px solid #ce3d72;height:35px;width:100%;color:#187fdb;font-size:10pt;font-weight:bold;line-height:35px">Tender ['. $todays_cancellation_size .']</div>
         
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">    
                            <tbody>';
        foreach($todays_cancellation as $cancellation_value)
        {
            $tender_published_on = date('d-M-y', strtotime($cancellation_value->tender_published_on));
            $tender_published_strtotime = strtotime($cancellation_value->tender_published_on);
            if($today_strtotime > $tender_published_strtotime)
            {
                $published_remaining_days = ' (' . ($today_strtotime - $tender_published_strtotime) / (60*60*24) . ' days back)';
            }
            else
            {
                $published_remaining_days = '(' . ($tender_published_strtotime - $today_strtotime) / (60*60*24) . ' days more )';

                if($published_remaining_days[1] == '0')
                    $published_remaining_days = '';
            }

            $tender_closed_on = date('d-M-y', strtotime($cancellation_value->tender_closed_on));
            $tender_closed_strtotime = strtotime($cancellation_value->tender_closed_on);
            if($today_strtotime > $tender_closed_strtotime)
            {
                $closed_remaining_days = ($today_strtotime - $tender_closed_strtotime) / (60*60*24) . ' days back';
            }
            else
            {
                $closed_remaining_days = ($tender_closed_strtotime - $today_strtotime) / (60*60*24) . ' days more';
            }
                $mail_bdytnd .= '<tr>
                                    <td style="border:1.0pt solid;border-color:#ebedd7">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555" width="15%">Title</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#2595dc" width="85%">:<a style="color:#2595dc;text-decoration:none" href="#" target="_blank" >'. $cancellation_value->tender_title .'</a></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Type</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $cancellation_value->pro_method_name .'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Inviter</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $cancellation_value->inviter_name .'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Procuring Place</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $cancellation_value->district_name .'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Published On</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $tender_published_on . $published_remaining_days .' ['. $cancellation_value->source_name .'] &nbsp; <span style="color:#2595dc">Also published on 2 more source(s)</span></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Closed On</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $tender_closed_on .' ('. $closed_remaining_days .')</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"> </td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555;text-align:right">
                                                        <a href="'. base_url('rokomari_tender/site/show_image/' . $cancellation_value->tender_auto_id) .'" target="_blank" >Show Image</a> &nbsp;&nbsp; 
                                                        <a href="'. base_url('rokomari_tender/site/show_details/' . $cancellation_value->tender_auto_id) .'" target="_blank" >Show Details</a>&nbsp;&nbsp; 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr><td style="height:5px;font-size:0.1em">&nbsp;</td></tr>';
        }
                                
            $mail_bdytnd .= '</tbody>
                        </table> 
      
                        <div style="font-weight:bold;color:#6c75f4;border-bottom:2px solid #7ca4ee;height:35px;line-height:35px">Republished Notification ['. $todays_republished_size .']</div>
                            
                        <div style="font-family:arial,sans-serif,verdana;border-bottom:2px solid #ce3d72;height:35px;width:100%;color:#187fdb;font-size:10pt;font-weight:bold;line-height:35px">Tender ['. $todays_republished_size .']</div>
         
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">    
                            <tbody>';

        foreach($todays_republished as $republish_value)
        {
            $tender_published_on = date('d-M-y', strtotime($republish_value->tender_published_on));
            $tender_published_strtotime = strtotime($republish_value->tender_published_on);
            if($today_strtotime > $tender_published_strtotime)
            {
                $published_remaining_days = ($today_strtotime - $tender_published_strtotime) / (60*60*24) . ' days back';
            }
            else
            {
                $published_remaining_days = ($tender_published_strtotime - $today_strtotime) / (60*60*24) . ' days more';
            }

            $tender_closed_on = date('d-M-y', strtotime($republish_value->tender_closed_on));
            $tender_closed_strtotime = strtotime($republish_value->tender_closed_on);
            if($today_strtotime > $tender_closed_strtotime)
            {
                $closed_remaining_days = ($today_strtotime - $tender_closed_strtotime) / (60*60*24) . ' days back';
            }
            else
            {
                $closed_remaining_days = ($tender_closed_strtotime - $today_strtotime) / (60*60*24) . ' days more';
            }
                $mail_bdytnd .= '<tr>
                                    <td style="border:1.0pt solid;border-color:#ebedd7">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555" width="15%">Title</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#2595dc" width="85%">:<a style="color:#2595dc;text-decoration:none" href="#" target="_blank" >'. $republish_value->tender_title .'</a></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Type</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $republish_value->pro_method_name .'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Inviter</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $republish_value->inviter_name .'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Procuring Place</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $republish_value->district_name .'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Published On</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $tender_published_on .' ('. $published_remaining_days .') ['. $republish_value->source_name .'] &nbsp; <span style="color:#2595dc">Also published on 2 more source(s)</span></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">Closed On</td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555">:'. $tender_closed_on .' ('. $closed_remaining_days .')</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555"> </td>
                                                    <td style="font-family:arial,sans-serif,verdana;font-size:8.5pt;color:#555;text-align:right">
                                                        <a href="'. base_url('rokomari_tender/site/show_image/' . $republish_value->tender_auto_id) .'" target="_blank" >Show Image</a> &nbsp;&nbsp; 
                                                        <a href="'. base_url('rokomari_tender/site/show_details/' . $republish_value->tender_auto_id) .'" target="_blank" >Show Details</a>&nbsp;&nbsp; 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr><td style="height:5px;font-size:0.1em">&nbsp;</td></tr>';
        }
                                
            $mail_bdytnd .= '</tbody>
                        </table>         

                        <div style="margin-top:50px;font-family:arial,sans-serif,verdana;font-size:9pt">
                                    Yours sincerely,<br><br>
                                    Customer Care Team
                        </div>
                        <div style="width:177px;height:83px;margin-top:5px;font-family:arial,sans-serif,verdana;font-size:9pt"><img src="'. base_url('rokomari_tender/assets/images/rokomari_tender_logo.png') .'" alt="" class="CToWUd"></div>
                        <div style="margin-top:2px;font-family:arial,sans-serif,verdana;font-size:9pt">
                            M: <a href="tel:+880%20xxxx-123123" value="+880xxxx123123" target="_blank">+88 0xxxx123123</a><br>
                            <a href="5Z0V" target="_blank" >www.rokomaritender.com</a> <br><br>
                            <p>
                                <a style="font-family:arial,sans-serif,verdana;font-size:9pt" href="" target="_blank" >Click here to unsubscribe from such email</a><br>
                            </p>
                        </div>
                    </div>';
    
        // echo $mail_bdytnd;

        $all_active_user = $this->Web_user_model->get_all_web_user('webu_status', 1, 'webu_email_alert', 1);

        $successfully_sent = 0;
        $failed_tosent = 0;
        $failed_mails = '';

        foreach($all_active_user as $user_value)
        {
            $email_al_exp_days = (strtotime($user_value->webu_email_al_exp) - strtotime($today)) / (60*60*24);

            $mail_uinf = '<div style="width:800px;height:auto">
                        <table width="61%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td style="font-family:arial,sans-serif,verdana;font-size:9pt" width="15%">Date</td>
                                    <td style="font-family:arial,sans-serif,verdana;font-size:9pt" width="1%" align="center">:</td>
                                    <td style="font-family:arial,sans-serif,verdana;font-size:9pt" width="45">&nbsp;'. $today_mail_format .'</td>
                                </tr>
                                <tr>
                                    <td style="font-family:arial,sans-serif,verdana;font-size:9pt">Attention</td>
                                    <td style="font-family:arial,sans-serif,verdana;font-size:9pt" align="center">:</td>
                                    <td style="font-family:arial,sans-serif,verdana;font-size:9pt">&nbsp;'. $user_value->webu_full_name .', '. $user_value->webu_designation .', '. $user_value->webu_company_name .'
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family:arial,sans-serif,verdana;font-size:9pt">Member ID</td>
                                    <td style="font-family:arial,sans-serif,verdana;font-size:9pt" align="center">:</td>
                                    <td style="font-family:arial,sans-serif,verdana;font-size:9pt">&nbsp;'. $user_value->webu_id .'
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="margin-top:20px;font-family:arial,sans-serif,verdana;font-size:9pt">
                            Dear Sir,<br>
                            Good day from RokomariTender. Please find below tender updates for  as per your preferences. <span style="color:Red">Email Alert will be expired after '. $email_al_exp_days .' days.</span>
                        </div>';

            $this->email->from('info@rokomaritender.com', 'RokomariTender');
            $this->email->to($user_value->webu_email);
            // $this->email->cc('another@another-example.com');
            // $this->email->bcc('them@their-example.com');

            $this->email->subject('Email Notification from RokomariTender');
            $this->email->message($mail_uinf . $mail_bdytnd);

            if($this->email->send())
            {
                $successfully_sent++;
            }
            else
            {
                $failed_tosent++;
                $failed_mails .= $user_value->webu_email . '<br>';
            }
        }

        echo 'Successfully Sent: ' . $successfully_sent . '<br><br>' . $failed_tosent . '<br><br>Following users emails are not sent:<br><br>' . $failed_mails;
    }

}