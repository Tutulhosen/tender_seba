<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web_user extends Backend_Controller
{

    /*
    Name        :   __construct
    Authur      :   Ismail
    Created     :   15-02-18
    ModifiedBy  :   Ismail
    ModifiedDate:   08-04-18 | email-verification, user-login
    09-04-18 | user-registration
     */
    public function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->logged_in() && $this->uri->segment(1) != 'user-registration' && $this->uri->segment(1) != 'user-login' && $this->uri->segment(1) != 'email-verification' && $this->uri->segment(2) != 'activate') {
            // redirect them to the login page
            // return show_error('You are not authorized to view this page.');

            // die($this->uri->segment(1));

            redirect('user-login');
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
    ModifiedBy  :   Ismail
    ModifiedDate:   08-04-18
     */
    public function sign_up()
    {
        if ($this->ion_auth->logged_in()) {
            redirect('dashboard');
        }

        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('user_name', 'Name', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|max_length[70]|is_unique[ts_web_user.webu_email]');
        $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[user_confirm_password]');
        $this->form_validation->set_rules('user_confirm_password', 'Confirm Password', 'required');
        $this->form_validation->set_rules('user_agree', 'Terms & Conditions', 'required', array('required' => 'You must agree with our terms and conditions.'));

        $this->form_validation->set_rules('user_phone', 'Cell No', 'trim|required|max_length[20]|is_unique[ts_web_user.webu_phone]', array('is_unique' => 'The Cell No is already occupied.'));

        if ($this->form_validation->run() == true) {
            $email = strtolower($this->input->post('user_email'));
            $identity = $email;
            $password = $this->input->post('user_password');

            $additional_data = array(
                'webu_full_name' => $this->input->post('user_name'),
                'webu_phone' => $this->input->post('user_phone'),

            );
        }

        if ($this->form_validation->run() == true && ($id = $this->ion_auth->register($identity, $password, $email, $additional_data))) {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());

            redirect('email-verification');
        } else {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['meta_title'] = 'Sign Up - Rokomari Tender';
            $this->data['subview'] = 'sign_up_view';
            $this->load->view('frontend/_layout_head2', $this->data);
        }
    }

    /*
    Name        :   edit
    Authur      :   Ismail
    Created     :   22-02-18
    ModifiedBy  :
    ModifiedDate:
     */
    public function edit()
    {
        $id = $this->session->userdata('user_id');

        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('user_name', 'Name', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|max_length[70]|callback__is_unique_email[' . $id . ']');
        // $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[user_confirm_password]');
        // $this->form_validation->set_rules('user_confirm_password', 'Confirm Password', 'required');
        $this->form_validation->set_rules('user_phone', 'Cell No', 'trim|required|max_length[20]|callback__is_unique_phone[' . $id . ']');
        $this->form_validation->set_rules('user_company_name', 'Company Name', 'trim|required|max_length[150]');
        $this->form_validation->set_rules('user_designation', 'Designation', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('user_company_type', 'Company Type', 'trim|required');
        $this->form_validation->set_rules('user_company_address', 'Company Address', 'trim');
        $this->form_validation->set_rules('user_website', 'Website', 'trim');

        if ($this->form_validation->run() == true) {
            $email = strtolower($this->input->post('user_email'));
            $identity = $email;
            // $password = $this->input->post('user_password');

            $additional_data = array(
                'webu_full_name' => $this->input->post('user_name'),
                'webu_phone' => $this->input->post('user_phone'),
                'webu_email' => $this->input->post('user_email'),
                // 'webu_password'  => $this->input->post('user_password'),
                'webu_company_name' => $this->input->post('user_company_name'),
                'webu_designation' => $this->input->post('user_designation'),
                'webu_company_type' => $this->input->post('user_company_type'),
                'webu_company_address' => $this->input->post('user_company_address'),
                'webu_website' => $this->input->post('user_website'),
            );
        }

        if ($this->form_validation->run() == true && $this->Common_model->edit('ts_web_user', 'webu_id', $id, $additional_data)) {
            $this->session->set_flashdata('success', 'Your Information Successfully Updated.');

            redirect('edit-account');
        } else {
            $this->data['web_user_details'] = $this->Common_model->get_single_row_by('ts_web_user', 'webu_id', $id);

            $this->data['webu_company_type'] = $this->Common_model->get_dropdown('ts_sub_categories', 'sub_cat_id', 'sub_cat_name', '-- Select Company Type --');

            // set the flash data error message if there is one
            $this->data['message'] = $this->db->error();
            $this->data['message'] = $this->data['message']['message'];

            // Load Page
            $this->data['meta_title'] = 'Update Personal Information';
            $this->data['subview'] = 'per_info_edit';
            $this->load->view('frontend/_layout_head2', $this->data);
        }
    }

    /*
    Name        :   login
    Authur      :   Ismail
    Created     :   22-02-18
    ModifiedBy  :   Ismail
    ModifiedDate:   08-04-18
     */
    public function login()
    {
        if ($this->ion_auth->logged_in()) {
            redirect('dashboard');
        }

        //validate form input
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

        if ($this->form_validation->run() == true) {
            // check to see if the user is logging in
            // check for "remember me"
            $remember = (bool) $this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->ion_auth->messages());

                redirect('dashboard');
            } else {
                // if the login was un-successful
                // redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());

                redirect('user-login');
            }
        } else {
            // the user is not logging in so display the login page
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

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
    ModifiedBy  :   Ismail
    ModifiedDate:   06-03-18
     */
    public function dashboard()
    {
        $userid = $this->session->userdata('user_id');

        $user_pkg = $this->Common_model->get_user_pkg($userid);

        $is_valid_pkg = false;

        if (!empty($user_pkg)) {
           
            $now = time(); // or your date as well
            $your_date = strtotime($user_pkg->upkg_created_at);
            $datediff = $now - $your_date;
            $day_count=round($datediff / (60 * 60 * 24));
            if($user_pkg->pkg_duration-$day_count>7)
            {
                $is_valid_pkg = true;
                $this->data['pkg_message_color'] = 'success';
                $this->data['pkg_message'] = 'You are Enjoying '.$user_pkg->pkg_name.' package';
            }
            elseif($user_pkg->pkg_duration-$day_count<7 && $user_pkg->pkg_duration-$day_count>0)
            {
                $is_valid_pkg = true;
                $difference=$user_pkg->pkg_duration-$day_count;
                $this->data['pkg_message_color'] = 'warning';
                $this->data['pkg_message'] = 'Warning '.$user_pkg->pkg_name.' package will expire in '.$difference.' days';
            }
            elseif($user_pkg->pkg_duration==$day_count)
            {
                $is_valid_pkg = true;
       
                $this->data['pkg_message_color'] = 'danger';
                $this->data['pkg_message'] = 'Warning '.$user_pkg->pkg_name.' package will expire today';
            }
            elseif($user_pkg->pkg_duration>$day_count)
            {
                $is_valid_pkg = false;
                
            }

        } else {
            $is_valid_pkg = false;
        }
    
        if($is_valid_pkg)
        {
            $this->data['all_categories'] = $this->Common_model->get_data('ts_categories', 'category_name', 'ASC');
            $this->data['user_cats'] = $this->Common_model->get_user_cats($userid);
            $user_sub_cat_list_arr = array();
            foreach ($this->data['user_cats'] as $value) {
                array_push($user_sub_cat_list_arr, $value->sub_cat_id);
            }
    
            $this->data['user_sub_cat_list_arr'] = $user_sub_cat_list_arr;
    
            $this->data['total_user_cat'] = sizeof($this->data['user_cats']);
            $this->data['subview'] = 'dashboard';
        }
        else
        {
            $this->data['pkg_message'] = 'Please Select Any Package';
            $this->data['all_pkg'] = $this->Common_model->get_data('ts_packages', 'pkg_price', 'ASC');
            $this->data['subview'] = 'select_package'; 
        }




       //06-03-18

        $this->data['meta_title'] = 'Dashboard';

        $this->load->view('frontend/_layout_head2', $this->data);
    }

    /*
    Name        :   add_user_products
    Authur      :   Ismail
    Created     :   24-02-18
    ModifiedBy  :
    ModifiedDate:
     */
    public function add_user_products()
    {
        $user_sub_cat_name = $this->input->post('user_sub_cat_name');

        $this->Web_user_model->delete_user_products();

        $this->db->trans_begin();

        $data = array();
        foreach ($user_sub_cat_name as $value) {
            $data['ucat_user_id'] = $this->session->userdata('user_id');
            $data['ucat_sub_cat_id'] = $value;

            $this->Common_model->save('ts_user_cat_list', $data);
        }

        if ($this->db->trans_status() == true) {
            $this->db->trans_commit();

            $this->session->set_flashdata('msgProduct', '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Successfully Saved!</div>');
        } else {
            $this->db->trans_rollback();

            $this->session->set_flashdata('msgProduct', '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>Failed! Please try again.</div>');
        }

        redirect('dashboard');
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
        if ($this->Common_model->check_unique_for_callback('ts_web_user', 'webu_email', $email, 'webu_id', $id)) {
            $this->form_validation->set_message('_is_unique_email', 'The Email address is already occupied.');
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
        if ($this->Common_model->check_unique_for_callback('ts_web_user', 'webu_phone', $phone, 'webu_id', $id)) {
            $this->form_validation->set_message('_is_unique_phone', 'The Cell No is already occupied.');
            return false;
        }

        return true;
    }

    /*
    Name        :   email_varification
    Authur      :   Ismail
    Created     :   25-02-18
    ModifiedBy  :
    ModifiedDate:
     */
    public function email_varification()
    {
        // Load Page
        $this->data['meta_title'] = 'Rokomari Tender | Email Varification';
        $this->data['subview'] = 'email_varification';
        $this->load->view('frontend/_layout_head2', $this->data);
    }

    /*
    Name        :   email_varification
    Authur      :   Ismail
    Created     :   25-02-18
    ModifiedBy  :   Ismail
    ModifiedDate:   08-04-18
     */
    // public function activate($id, $code=false)
    public function activate($id, $code)
    {
        // activate the user
        // if ($code !== false){
        $activation = $this->ion_auth->activate($id, $code);
        // }else if ($this->ion_auth->is_admin()){
        //     $activation = $this->ion_auth->activate($id);
        // }

        if ($activation) {
            // redirect them to the auth page
            $this->session->set_flashdata('message', $this->ion_auth->messages());

            redirect("user-login");
        } else {
            // redirect them to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("forgot_password");
        }
    }

    /*
    Name        :   get_user_favorite_category
    Authur      :   Ismail
    Created     :   04-03-18
    ModifiedBy  :
    ModifiedDate:
     */
    public function get_user_favorite_category()
    {
        $user_fav_cat = $this->Common_model->get_user_cats($this->session->userdata('user_id'));

        $output = '';
        foreach ($user_fav_cat as $value) {
/*            $output .= '<li class="hover-color-change" id="tree_branch'. $value->category_id .'" >';
$output .= '<i class="fa fa-plus-square fa-fw"></i>' . $value->category_name;
$output .= '<ul style="display: none; padding-left: 5%; font-size: 12px;">';

$cat_sub_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $value->category_id);
foreach($cat_sub_cat as $subcatRow)
{*/
            $output .= '<li class="list-unstyled hover-color-change" onclick="get_tender_by_left_tree(' . $value->ucat_sub_cat_id . ', \'sub_cat\')"><i class="fa fa-minus-square fa-fw"></i>' . $value->sub_cat_name . '</li>';
            /*}

        $output .= '</ul>';
        $output .= '</li>';*/
        }

        echo $output;
    }

    /*
    Name        :   reminders
    Authur      :   Ismail
    Created     :   04-03-18
    ModifiedBy  :   Ismail
    ModifiedDate:   06-03-18
     */
    public function reminders()
    {
        $this->data['all_categories'] = $this->Common_model->get_data('ts_categories');

        $today = date('Y-m-d');
        $today_plus_1 = date('Y-m-d', strtotime($today . "+1 day"));
        $today_plus_2 = date('Y-m-d', strtotime($today . "+2 days"));
        $today_plus_3 = date('Y-m-d', strtotime($today . "+3 days"));
        $today_plus_4 = date('Y-m-d', strtotime($today . "+4 days"));
        $today_plus_5 = date('Y-m-d', strtotime($today . "+5 days"));
        $today_plus_6 = date('Y-m-d', strtotime($today . "+6 days"));

        $this->data['today_plus_str_1'] = $today . "+1 day";
        $this->data['today_plus_str_2'] = $today . "+2 days";
        $this->data['today_plus_str_3'] = $today . "+3 days";
        $this->data['today_plus_str_4'] = $today . "+4 days";
        $this->data['today_plus_str_5'] = $today . "+5 days";
        $this->data['today_plus_str_6'] = $today . "+6 days";

        $this->data['today'] = $today;
        $this->data['today_plus_1'] = $today_plus_1;
        $this->data['today_plus_2'] = $today_plus_2;
        $this->data['today_plus_3'] = $today_plus_3;
        $this->data['today_plus_4'] = $today_plus_4;
        $this->data['today_plus_5'] = $today_plus_5;
        $this->data['today_plus_6'] = $today_plus_6;

        $schedule_purchase_today = $this->Common_model->get_data_by('ts_tenders', 'tender_schedule_purchase', $today);
        $this->data['schedule_purchase_today'] = sizeof($schedule_purchase_today) == 0 ? '' : sizeof($schedule_purchase_today);

        $schedule_purchase_plus_1 = $this->Common_model->get_data_by('ts_tenders', 'tender_schedule_purchase', $today_plus_1);
        $this->data['schedule_purchase_plus_1'] = sizeof($schedule_purchase_plus_1) == 0 ? '' : sizeof($schedule_purchase_plus_1);

        $schedule_purchase_plus_2 = $this->Common_model->get_data_by('ts_tenders', 'tender_schedule_purchase', $today_plus_2);
        $this->data['schedule_purchase_plus_2'] = sizeof($schedule_purchase_plus_2) == 0 ? '' : sizeof($schedule_purchase_plus_2);

        $schedule_purchase_plus_3 = $this->Common_model->get_data_by('ts_tenders', 'tender_schedule_purchase', $today_plus_3);
        $this->data['schedule_purchase_plus_3'] = sizeof($schedule_purchase_plus_3) == 0 ? '' : sizeof($schedule_purchase_plus_3);

        $schedule_purchase_plus_4 = $this->Common_model->get_data_by('ts_tenders', 'tender_schedule_purchase', $today_plus_4);
        $this->data['schedule_purchase_plus_4'] = sizeof($schedule_purchase_plus_4) == 0 ? '' : sizeof($schedule_purchase_plus_4);

        $schedule_purchase_plus_5 = $this->Common_model->get_data_by('ts_tenders', 'tender_schedule_purchase', $today_plus_5);
        $this->data['schedule_purchase_plus_5'] = sizeof($schedule_purchase_plus_5) == 0 ? '' : sizeof($schedule_purchase_plus_5);

        $schedule_purchase_plus_6 = $this->Common_model->get_data_by('ts_tenders', 'tender_schedule_purchase', $today_plus_6);
        $this->data['schedule_purchase_plus_6'] = sizeof($schedule_purchase_plus_6) == 0 ? '' : sizeof($schedule_purchase_plus_6);
        //schedule purchase end

        //preebid meeting start
        $prebid_meeting_today = $this->Common_model->get_data_by('ts_tenders', 'tender_prebid_meeting', $today);
        $this->data['prebid_meeting_today'] = sizeof($prebid_meeting_today) == 0 ? '' : sizeof($prebid_meeting_today);

        $prebid_meeting_plus_1 = $this->Common_model->get_data_by('ts_tenders', 'tender_prebid_meeting', $today_plus_1);
        $this->data['prebid_meeting_plus_1'] = sizeof($prebid_meeting_plus_1) == 0 ? '' : sizeof($prebid_meeting_plus_1);

        $prebid_meeting_plus_2 = $this->Common_model->get_data_by('ts_tenders', 'tender_prebid_meeting', $today_plus_2);
        $this->data['prebid_meeting_plus_2'] = sizeof($prebid_meeting_plus_2) == 0 ? '' : sizeof($prebid_meeting_plus_2);

        $prebid_meeting_plus_3 = $this->Common_model->get_data_by('ts_tenders', 'tender_prebid_meeting', $today_plus_3);
        $this->data['prebid_meeting_plus_3'] = sizeof($prebid_meeting_plus_3) == 0 ? '' : sizeof($prebid_meeting_plus_3);

        $prebid_meeting_plus_4 = $this->Common_model->get_data_by('ts_tenders', 'tender_prebid_meeting', $today_plus_4);
        $this->data['prebid_meeting_plus_4'] = sizeof($prebid_meeting_plus_4) == 0 ? '' : sizeof($prebid_meeting_plus_4);

        $prebid_meeting_plus_5 = $this->Common_model->get_data_by('ts_tenders', 'tender_prebid_meeting', $today_plus_5);
        $this->data['prebid_meeting_plus_5'] = sizeof($prebid_meeting_plus_5) == 0 ? '' : sizeof($prebid_meeting_plus_5);

        $prebid_meeting_plus_6 = $this->Common_model->get_data_by('ts_tenders', 'tender_prebid_meeting', $today_plus_6);
        $this->data['prebid_meeting_plus_6'] = sizeof($prebid_meeting_plus_6) == 0 ? '' : sizeof($prebid_meeting_plus_6);
        //prebid meeting end

        //submission start  //06-03-18
        $submission_today = $this->Common_model->get_data_by('ts_tenders', 'tender_closed_on', $today);
        $this->data['submission_today'] = sizeof($submission_today) == 0 ? '' : sizeof($submission_today);

        $submission_plus_1 = $this->Common_model->get_data_by('ts_tenders', 'tender_closed_on', $today_plus_1);
        $this->data['submission_plus_1'] = sizeof($submission_plus_1) == 0 ? '' : sizeof($submission_plus_1);

        $submission_plus_2 = $this->Common_model->get_data_by('ts_tenders', 'tender_closed_on', $today_plus_2);
        $this->data['submission_plus_2'] = sizeof($submission_plus_2) == 0 ? '' : sizeof($submission_plus_2);

        $submission_plus_3 = $this->Common_model->get_data_by('ts_tenders', 'tender_closed_on', $today_plus_3);
        $this->data['submission_plus_3'] = sizeof($submission_plus_3) == 0 ? '' : sizeof($submission_plus_3);

        $submission_plus_4 = $this->Common_model->get_data_by('ts_tenders', 'tender_closed_on', $today_plus_4);
        $this->data['submission_plus_4'] = sizeof($submission_plus_4) == 0 ? '' : sizeof($submission_plus_4);

        $submission_plus_5 = $this->Common_model->get_data_by('ts_tenders', 'tender_closed_on', $today_plus_5);
        $this->data['submission_plus_5'] = sizeof($submission_plus_5) == 0 ? '' : sizeof($submission_plus_5);

        $submission_plus_6 = $this->Common_model->get_data_by('ts_tenders', 'tender_closed_on', $today_plus_6);
        $this->data['submission_plus_6'] = sizeof($submission_plus_6) == 0 ? '' : sizeof($submission_plus_6);

        //opening start
        $opening_today = $this->Common_model->get_data_by('ts_tenders', 'tender_opening', $today);
        $this->data['opening_today'] = sizeof($opening_today) == 0 ? '' : sizeof($opening_today);

        $opening_plus_1 = $this->Common_model->get_data_by('ts_tenders', 'tender_opening', $today_plus_1);
        $this->data['opening_plus_1'] = sizeof($opening_plus_1) == 0 ? '' : sizeof($opening_plus_1);

        $opening_plus_2 = $this->Common_model->get_data_by('ts_tenders', 'tender_opening', $today_plus_2);
        $this->data['opening_plus_2'] = sizeof($opening_plus_2) == 0 ? '' : sizeof($opening_plus_2);

        $opening_plus_3 = $this->Common_model->get_data_by('ts_tenders', 'tender_opening', $today_plus_3);
        $this->data['opening_plus_3'] = sizeof($opening_plus_3) == 0 ? '' : sizeof($opening_plus_3);

        $opening_plus_4 = $this->Common_model->get_data_by('ts_tenders', 'tender_opening', $today_plus_4);
        $this->data['opening_plus_4'] = sizeof($opening_plus_4) == 0 ? '' : sizeof($opening_plus_4);

        $opening_plus_5 = $this->Common_model->get_data_by('ts_tenders', 'tender_opening', $today_plus_5);
        $this->data['opening_plus_5'] = sizeof($opening_plus_5) == 0 ? '' : sizeof($opening_plus_5);

        $opening_plus_6 = $this->Common_model->get_data_by('ts_tenders', 'tender_opening', $today_plus_6);
        $this->data['opening_plus_6'] = sizeof($opening_plus_6) == 0 ? '' : sizeof($opening_plus_6);
        // echo $this->db->last_query();die;

        // Load Page
        $this->data['meta_title'] = 'Rokomari Tender | Reminders';
        $this->data['subview'] = 'reminders';
        $this->load->view('frontend/_layout_head2', $this->data);
    }

    /*
    Name        :   get_tender_for_reminder
    Authur      :   Ismail
    Created     :   06-03-18
    ModifiedBy  :   Ismail
    ModifiedDate:   08-03-18
     */
    public function get_tender_for_reminder($type, $date)
    {
        $tenders = $this->Web_user_model->get_tender_for_reminder($type, $date);

        if ($this->ion_auth->logged_in()) //08-03-18
        {
            $user_id = $this->session->userdata('user_id');

            $fav_tens = $this->Common_model->get_data_by('ts_user_fav_ten_list', 'ufav_user_id', $user_id);
            $user_fav_ten_arr = array();
            foreach ($fav_tens as $value) {
                array_push($user_fav_ten_arr, $value->ufav_tender_id);
            }

            // $this->data['favorite_tenders'] = $user_fav_ten_arr;
        }

        $output = '';
        foreach ($tenders as $value) {
            $output .= '<div class="content-2" style="background-color: #f3f3f3; border:1px solid #dfdfdf;">
                          <p class="h6 px-3 pt-3" id="tender_title' . $value->tender_auto_id . '">';

            if ($this->ion_auth->logged_in() && in_array($value->tender_auto_id, $user_fav_ten_arr)) {
                $output .= '<i class="fa fa-star" style="color: #ff0000;"></i> ';
            }

            $output .= $value->tender_title . '</p>
                          <div class="text-justify px-3 py-1">
                            <div class="row">
                              <div class="col-md-2">Tender ID</div>
                              <div class="col-md-10">: ' . $value->tender_manual_id . '</div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">Type</div>
                              <div class="col-md-10">: ' . $value->pro_method_name . '</div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">Inviter</div>
                              <div class="col-md-10">: ' . $value->inviter_name . '</div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">Doc. Price</div>
                              <div class="col-md-10">: ' . $value->tender_doc_price . '</div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">Sec. Amnt</div>
                              <div class="col-md-10">: ' . $value->tender_security_amount . '</div>
                            </div>

                            <p class="pt-"></p>
                            <div class="float-right " style="margin-left: 10px; background-color: #ADD8E6; height: 30px;" title="Tender Viewed"> &nbsp;<strong>' . $value->tender_view . '</strong> &nbsp; </div>
                            <button class="btn float-right btn-sm border" onclick="show_details(' . $value->tender_auto_id . ')"><span title="Show Details"><i class="fa fa-info-circle" style="color: #00c0ef;"></i></span></button>
                            <button class=" mx-2 btn float-right btn-sm border" id="favcaticon' . $value->tender_auto_id . '" onclick="addorremvfavcat(' . $value->tender_auto_id . ')" title="Add to favorite" >';

            if ($this->ion_auth->logged_in() && in_array($value->tender_auto_id, $user_fav_ten_arr)) {
                $output .= '<i class="fa fa-times" style="color: #ff0000;"></i>';
            } else {
                $output .= '<i class="fa fa-star" style="color: #ff0000;"></i>';
            }

            $output .= '</button>
                            <p class="pt-4"></p>
                            <hr class="mt-3">
                          </div>
                          <div class="row pb-3">
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                              <p class="font-weight-normal px-3">Image: <a href="' . base_url('site/show_image/' . $value->tender_auto_id) . '" target="_blank"><i class="fa fa-image fa-fw pl-5"></i></a></p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                              <p class="font-weight-normal px-3">Published On: ' . date('d-m-Y', strtotime($value->tender_published_on)) . '</p>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                              <p class="font-weight-normal px-3">Closed On:  ' . date('d-m-Y', strtotime($value->tender_closed_on)) . '</p>
                            </div>
                          </div>
                        </div>
                        <p class="py-1"></p>';
        }

        if ($output == '') {
            //03-03-18
            $output .= '<span style="color: red;">No Tender Found!</span>';
        }

        $response = array(
            'total_tender' => sizeof($tenders),
            'result' => $output,
        );

        echo json_encode($response);
    }

    /*
    Name        :   add_or_remove_fav
    Authur      :   Ismail
    Created     :   08-03-18
    ModifiedBy  :
    ModifiedDate:
     */
    public function add_or_remove_fav($tender_id)
    {
        $id = $this->session->userdata('user_id');

        if ($this->Common_model->exists('ts_user_fav_ten_list', 'ufav_user_id', $id, 'ufav_tender_id', $tender_id)) {
            if ($this->Common_model->delete_data('ts_user_fav_ten_list', 'ufav_user_id', $id, 'ufav_tender_id', $tender_id)) {
                echo 1;
            } else {
                echo 'Error when try to remove from favorite';
            }

        } else {
            $data = array();
            $data['ufav_user_id'] = $id;
            $data['ufav_tender_id'] = $tender_id;

            if ($this->Common_model->save('ts_user_fav_ten_list', $data)) {
                echo 1;
            } else {
                echo 'Error when try to add to favorite';
            }

        }
    }

    /*
    Name        :   favorite_tenders
    Authur      :   Ismail
    Created     :   07-03-18
    ModifiedBy  :
    ModifiedDate:
     */
    public function favorite_tenders()
    {
        $userid = $this->session->userdata('user_id');

        $this->data['favorite_tenders'] = $this->Web_user_model->get_user_favorite_tenders($userid);

        $this->data['size_of_fav_ten'] = sizeof($this->data['favorite_tenders']);

        $this->data['all_categories'] = $this->Common_model->get_data('ts_categories', 'category_name', 'ASC');

        $this->data['meta_title'] = 'Favorite Tenders';
        $this->data['subview'] = 'favorite_tenders';
        $this->load->view('frontend/_layout_head2', $this->data);
    }
    public function buy_package()
    { 
        $userid = $this->session->userdata('user_id');
        $pkg_id=$this->input->post('pkg_id');
        
        $data=[
          'upkg_user_id'=>$userid,
          'upkg_pkg_id'=>$pkg_id,
          'upkg_created_at'=>date('Y-m-d')
        ];
    

        $this->Common_model->save('ts_user_pkg_list', $data);
    } 
}
