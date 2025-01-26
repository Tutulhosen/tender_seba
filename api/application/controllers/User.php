<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class User extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        $params['rounds'] = 8;
        $params['salt_prefix'] = version_compare(PHP_VERSION, '5.3.7', '<') ? '$2a$' : '$2y$';
        $this->load->library('Authorization_Token');
        $this->load->library('Rest_response_modifier');
        $this->load->library('Data_Validation');
        $this->load->library('bcrypt');
        $this->load->model('user_model');
        $this->load->model('Common_model');
        $this->load->model('Api_model');
        $this->load->library('email');
    }
    public function login_post()
    {

        //var_dump($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), false));

        $email = $this->input->post('email');
        $Password = $this->input->post('password');
        $user_input = [
            'email' => $email,
            'password' => $Password
        ];

        $validated_data = $this->data_validation->user_login_form_validate($user_input);
        if (!$validated_data['flag']) {
            $modified_response = $this->rest_response_modifier->sendError(implode(', ', $validated_data['message']));
            $this->response($modified_response);
        }
        $user_data = [
            'email' => $email,
        ];

        $is_user_found = $this->user_model->is_user_exits_login($user_data);

        if ($is_user_found['flag']) {
            //$password=$this->bcrypt->hash($Password);

            if ($this->bcrypt->verify($Password, $is_user_found['info']->password)) {

                $token_data['webu_id'] = $is_user_found['info']->webu_id;
                $token_data['webu_full_name'] = $is_user_found['info']->webu_full_name;
                $token_data['webu_email'] = $is_user_found['info']->webu_email;
                $token_data['webu_phone'] = $is_user_found['info']->webu_phone;

                $tokenData = $this->authorization_token->generateToken($token_data);
                $response_data = [
                    'webu_id' => $is_user_found['info']->webu_id,
                    'webu_full_name' => $is_user_found['info']->webu_full_name,
                    'webu_email' =>  $is_user_found['info']->webu_email,
                    'webu_phone' => $is_user_found['info']->webu_phone,
                    'token' => $tokenData
                ];
                $modified_response = $this->rest_response_modifier->sendResponse($response_data, 'success');
                $this->response($modified_response);
            } else {
                $result_for_respone = 'Sorry Password does not match';
                $modified_response = $this->rest_response_modifier->sendError($result_for_respone);
                $this->response($modified_response);
            }
        } else {
            $result_for_respone = 'Sorry No account found using email ' . $email;
            $modified_response = $this->rest_response_modifier->sendError($result_for_respone);
            $this->response($modified_response);
        }
    }
    public function registration_post()
    {

        $name = $this->input->post('name');
        $mobile = $this->input->post('mobile');
        $email = $this->input->post('email');
        $Password = $this->input->post('Password');
        $Confirm_Password = $this->input->post('Confirm_Password');
        $user_input = [
            'name' => $name,
            'mobile' => $mobile,
            'email' => $email,
            'password' => $Password,
            'confirm_password' => $Confirm_Password,
        ];


        $validated_data = $this->data_validation->user_registration_form_validate($user_input);
        if (!$validated_data['flag']) {
            $modified_response = $this->rest_response_modifier->sendError(implode(', ', $validated_data['message']));
            $this->response($modified_response);
        }
        $email_otp = rand(1000000, 9999999);
        $data = [
            'webu_full_name' => $name,
            'webu_phone' => $mobile,
            'webu_email' => $email,
            'password' => $this->bcrypt->hash($Password),
            'email_otp' => $email_otp,
        ];
        $inserted = $this->user_model->registration_insert($data);
        if ($inserted) {
            $message = 'Your Account OTP is : ';
            $message .= $email_otp;
            $this->email->from('mysofthaven@tender.com', 'TenderSheba');
            $this->email->to($email);
            $this->email->subject('Account verification OTP');
            $this->email->message($message);
            $this->email->send();
        }
        $result_for_respone = 'Registration has been Completed Successfully and OTP send to ' . $email;

        $modified_response = $this->rest_response_modifier->sendResponse($result_for_respone, 'success');
        $this->response($modified_response);
    }
    public function verify_email_otp_post()
    {

        $email = $this->input->post('email');
        $email_otp = $this->input->post('email_otp');

        if (empty($email_otp)) {
            $message = 'The email otp field  is required';
            $modified_response = $this->rest_response_modifier->sendError($message);
            $this->response($modified_response);
        }
        $data['email'] = $email;
        $data['email_otp'] = $email_otp;
        $is_found = $this->user_model->verify_email_otp($data);



        if ($is_found['status']) {
            $token_data['webu_id'] = $is_found['webu_id'];
            $token_data['webu_full_name'] = $is_found['webu_full_name'];
            $token_data['webu_email'] = $is_found['webu_email'];
            $token_data['webu_phone'] = $is_found['webu_phone'];

            $tokenData = $this->authorization_token->generateToken($is_found);
            $response_data = [
                'webu_id' => $is_found['webu_id'],
                'webu_full_name' => $is_found['webu_full_name'],
                'webu_email' => $is_found['webu_email'],
                'webu_phone' => $is_found['webu_phone'],
                'token' => $tokenData
            ];
            $modified_response = $this->rest_response_modifier->sendResponse($response_data, 'success');
            $this->response($modified_response);
        } else {
            $message = 'The email otp field  is not found';
            $modified_response = $this->rest_response_modifier->sendError($message);
            $this->response($modified_response);
        }
    }
    public function verify_post()
    {

        $headers = $this->input->request_headers();
        //var_dump($headers);
        $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);

        $this->response($decodedToken);
    }
    public function dashboard_post()
    {
        $is_logged_in = $this->is_logged_in();

        if ($is_logged_in['error_flag']) {
            $modified_response = $this->rest_response_modifier->sendError($is_logged_in['message']);
            $this->response($modified_response);
        } else {
            $userid = $is_logged_in['message']->webu_id;
            $user_pkg = $this->Common_model->get_user_pkg($userid);
            $is_valid_pkg = false;
            $user_package_information = [];
            if (!empty($user_pkg)) {

                $now = time(); // or your date as well
                $your_date = strtotime($user_pkg->upkg_created_at);
                $datediff = $now - $your_date;
                $day_count = round($datediff / (60 * 60 * 24));
                if ($user_pkg->pkg_duration - $day_count > 7) {
                    $is_valid_pkg = true;
                    $user_package_information['user_package_text_flag'] = 'success';
                    $user_package_information['user_package_pkg_id'] = $user_pkg->pkg_id;
                    $user_package_information['user_package_message'] = 'You are Enjoying ' . $user_pkg->pkg_name . ' package';
                } elseif ($user_pkg->pkg_duration - $day_count < 7 && $user_pkg->pkg_duration - $day_count > 0) {
                    $is_valid_pkg = true;
                    $difference = $user_pkg->pkg_duration - $day_count;
                    $user_package_information['user_package_text_flag'] = 'warning';
                    $user_package_information['user_package_pkg_id'] = $user_pkg->pkg_id;
                    $user_package_information['user_package_message'] = 'Warning ' . $user_pkg->pkg_name . ' package will expire in ' . $difference . ' days';
                } elseif ($user_pkg->pkg_duration == $day_count) {
                    $is_valid_pkg = true;

                    $user_package_information['user_package_text_flag']  = 'danger';
                    $user_package_information['user_package_pkg_id'] = $user_pkg->pkg_id;
                    $user_package_information['user_package_message'] = 'Warning ' . $user_pkg->pkg_name . ' package will expire today';
                } elseif ($user_pkg->pkg_duration > $day_count) {
                    $is_valid_pkg = false;
                }
            } else {
                $is_valid_pkg = false;
            }
            if (!$is_valid_pkg) {
                $user_package_information['user_package_text_flag']  = 'No_package_yet';
                $user_package_information['user_package_pkg_id'] = 0;
                $user_package_information['user_package_message'] = 'Please Select Any Package Below';
            }

            $all_categories_sub_categories = [];

            $all_categories = $this->Common_model->get_data('ts_categories', 'category_name', 'ASC');
            foreach ($all_categories as $key => $value) {
                $cat_sub_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $value->category_id);
                $temp['category_id'] = $value->category_id;
                $temp['category_name'] = $value->category_name;
                $temp['category_desc'] = $value->category_desc;
                $temp['category_created'] = $value->category_created;
                $temp['category_updated'] = $value->category_updated;
                $temp['sub_categories'] = $cat_sub_cat;

                array_push($all_categories_sub_categories, $temp);
            }



            $user_category = $this->Common_model->get_user_cats($userid);
            $all_packages = $this->Common_model->get_data('ts_packages', 'pkg_price', 'ASC');

            $data['all_categories_sub_categories'] = $all_categories_sub_categories;
            $data['user_category'] = $user_category;
            $data['all_packages'] = $all_packages;
            $data['user_package_information'] = $user_package_information;
            $data['user_infomation'] = $is_logged_in['message'];

            $modified_response = $this->rest_response_modifier->sendResponse($data, 'success');
            $this->response($modified_response);
        }
    }
    public function is_logged_in()
    {
        $headers = $this->input->request_headers();

        if (!array_key_exists('Authorization', $headers)) {
            $error_flag = true;
            $message = 'Token not given';
        }
        $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
        if ($decodedToken['status']) {

            $error_flag = false;
            $message = $decodedToken['data'];
        } else {
            $error_flag = true;
            $message = $decodedToken['message'];
        }

        $is_verified['error_flag'] = $error_flag;
        $is_verified['message'] = $message;

        return  $is_verified;
    }

    public function select_package_post()
    {
        $is_logged_in = $this->is_logged_in();

        if ($is_logged_in['error_flag']) {
            $modified_response = $this->rest_response_modifier->sendError($is_logged_in['message']);
            $this->response($modified_response);
        } else {
            $userid = $this->input->post('user_id');
            $package_id = $this->input->post('package_id');
            $data['userid'] = $userid;
            $data['package_id'] = $package_id;
            $result_for_respone = $this->user_model->package_select($data);

            //$result_for_respone = 'Registration has been Completed Successfully and OTP send to ' . $email;
            $modified_response = $this->rest_response_modifier->sendResponse($result_for_respone, 'success');
            $this->response($modified_response);
        }
    }
    public function select_user_cat_post()
    {

        $is_logged_in = $this->is_logged_in();

        if ($is_logged_in['error_flag']) {
            $modified_response = $this->rest_response_modifier->sendError($is_logged_in['message']);
            $this->response($modified_response);
        } else {
            $userid = $this->input->post('user_id');
            $request_sub_categories = $this->input->post('request_sub_categories');

            $data['userid'] = $userid;
            $data['request_sub_categories'] = json_decode($request_sub_categories, true);

            $result_for_respone = $this->user_model->select_user_cat_post($data);

            if ($result_for_respone) {
                $success_message = 'You have Succesfully Selected Products';
                $user_cat_updated_flag = true;
                $data_response['success_message'] = $success_message;
                $data_response['user_cat_updated_flag'] = $user_cat_updated_flag;

                $modified_response = $this->rest_response_modifier->sendResponse($data_response, 'success');
                $this->response($modified_response);
            } else {
                $message = 'Sorry Due to Some technical issue can not solve your request';
                $modified_response = $this->rest_response_modifier->sendError($message);
                $this->response($modified_response);
            }
        }
    }

    public function home_page_post()
    {
        $is_logged_in = $this->is_logged_in();

        if ($is_logged_in['error_flag']) {
            //$modified_response = $this->rest_response_modifier->sendError($is_logged_in['message']);
            //$this->response($modified_response);
            $favorite_tenders = [];
            $is_logged_in_flag = false;
            $page = 1;
            $userid = '';
            $limit = 7;
        } else {
            $userid = $is_logged_in['message']->webu_id;
            $fav_tens = $this->Common_model->get_data_by('ts_user_fav_ten_list', 'ufav_user_id', $userid);
            $user_fav_ten_arr = array();
            foreach ($fav_tens as $value) {
                array_push($user_fav_ten_arr, $value->ufav_tender_id);
            }

            $favorite_tenders = $user_fav_ten_arr;
            $is_logged_in_flag = true;
            $page = $this->input->post('page');
            if (empty($page)) {
                $page = 1;
            }

            $limit = 5;
        }
        $number_of_new_tender = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 1));
        $number_of_corrigendum = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 2));
        $number_of_cancellation = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 3));
        $number_of_republished = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 4));

        $all_inviters = $this->Common_model->get_data('ts_inviters'); /* for search */
        $all_districts = $this->Common_model->get_data('ts_districts'); /* for search */
        $all_products = $this->Common_model->get_data('ts_sub_categories'); /* for search */
        $additional_filter = [
            'Newest First' => 1,
            'Oldest First'=>2,
            'Most Viewed On Top'=>3,
            'Early Expired On Top'=>4,
        ];

        $search_tender_by_product_inviter_source_location = [
            'Product' => array('search_by_key_type' => 'Product', 'search_by_key_id'=>1, 'sub_id' => ''),
            'Inviter' => array('search_by_key_type' => 'Inviter', 'search_by_key_id'=>2, 'sub_ids' => array(
                array(
                    
                    'inviter_type'=>'Governmant',
                    'inviter_type_id'=>2, 
                    ),
                    array(
                    
                    'inviter_type'=>'Private',
                    'inviter_type_id'=>3, 
                    ),
                    array(
                    
                    'inviter_type'=>'NGO',
                    'inviter_type_id'=>1, 
                    ),
            )),
            'Source' => array('search_by_key_type' => 'Source',   'search_by_key_id'=>3, 'sub_id' => ''),
            'Location' => array('search_by_key_type' => 'Location', 'search_by_key_id'=>4, 'sub_id' => ''),
        ];



        $tenders = $this->Api_model->get_home_page_basic_tender($page, $limit, $userid);
        $total_tenders = $this->Api_model->get_home_page_total_tender();

        $all_categories_sub_categories = [];

        $all_categories = $this->Common_model->get_data('ts_categories', 'category_name', 'ASC');
        foreach ($all_categories as $key => $value) {
            $cat_sub_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $value->category_id);
            $temp['category_id'] = $value->category_id;
            $temp['category_name'] = $value->category_name;
            $temp['category_desc'] = $value->category_desc;
            $temp['category_created'] = $value->category_created;
            $temp['category_updated'] = $value->category_updated;
            $temp['sub_categories'] = $cat_sub_cat;

            array_push($all_categories_sub_categories, $temp);
        }

        $data_response = [
            'is_logged_in' => $is_logged_in_flag,
            'statistical_result_cout' => array(
                'number_of_new_tender' => $number_of_new_tender,
                'number_of_corrigendum' => $number_of_corrigendum,
                'number_of_cancellation' => $number_of_cancellation,
                'number_of_republished' => $number_of_republished,
            ),
            'all_inviters' => $all_inviters,
            'all_districts' => $all_districts,
            'all_products' => $all_products,
            'additional_filter' => $additional_filter,
            'search_tender_by_product_inviter_source_location' => $search_tender_by_product_inviter_source_location,
            'all_categories_sub_categories' => $all_categories_sub_categories,
            'total_tenders' => $total_tenders,
            'tenders' => $tenders,
            'favorite_tenders' => $favorite_tenders,
        ];
        $modified_response = $this->rest_response_modifier->sendResponse($data_response, 'success');
        $this->response($modified_response);
    }
    public function search_tenders_post()
    {
        $is_logged_in = $this->is_logged_in();
        $srch_sub_cat = $this->input->post('srch_sub_cat');
        $srch_invtr =   $this->input->post('srch_invtr');
        $srch_workarea = $this->input->post('srch_workarea');
        $srch_new = $this->input->post('srch_new');

        if ($is_logged_in['error_flag']) {
            //$modified_response = $this->rest_response_modifier->sendError($is_logged_in['message']);
            //$this->response($modified_response);
            $favorite_tenders = [];
            $is_logged_in_flag = false;
            $page = 1;
            $limit = 7;
            $userid = 0;
        } else {
            $userid = $is_logged_in['message']->webu_id;
            $fav_tens = $this->Common_model->get_data_by('ts_user_fav_ten_list', 'ufav_user_id', $userid);
            $user_fav_ten_arr = array();
            foreach ($fav_tens as $value) {
                array_push($user_fav_ten_arr, $value->ufav_tender_id);
            }

            $favorite_tenders = $user_fav_ten_arr;
            $is_logged_in_flag = true;
            $page = $this->input->post('page');
            if (empty($page)) {
                $page = 1;
            }

            $limit = 5;
        }
        $number_of_new_tender = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 1));
        $number_of_corrigendum = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 2));
        $number_of_cancellation = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 3));
        $number_of_republished = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 4));

        $all_inviters = $this->Common_model->get_data('ts_inviters'); /* for search */
        $all_districts = $this->Common_model->get_data('ts_districts'); /* for search */
        $all_products = $this->Common_model->get_data('ts_sub_categories'); /* for search */
        $additional_filter = [
            1 => 'Newest First',
            2 => 'Oldest First',
            3 => 'Most Viewed On Top',
            4 => 'Early Expired On Top',
        ];

        $search_tender_by_product_inviter_source_location = [
            'Product' => array('search_by_key_type' => 'Product', 'search_by_key_id'=>1, 'sub_id' => ''),
            'Inviter' => array('search_by_key_type' => 'Inviter', 'search_by_key_id'=>2, 'sub_ids' => array(
                array(
                    
                    'inviter_type'=>'Governmant',
                    'inviter_type_id'=>2, 
                    ),
                    array(
                    
                    'inviter_type'=>'Private',
                    'inviter_type_id'=>3, 
                    ),
                    array(
                    
                    'inviter_type'=>'NGO',
                    'inviter_type_id'=>1, 
                    ),
            )),
            'Source' => array('search_by_key_type' => 'Source',   'search_by_key_id'=>3, 'sub_id' => ''),
            'Location' => array('search_by_key_type' => 'Location', 'search_by_key_id'=>4, 'sub_id' => ''),
        ];



        $tenders = $this->Api_model->get_search_filter_tender($page, $limit, $srch_sub_cat, $srch_invtr, $srch_workarea, $srch_new, $userid);
        $total_tenders = $this->Api_model->get_search_filter_total_rows($srch_sub_cat, $srch_invtr, $srch_workarea, $userid);

        $all_categories_sub_categories = [];

        $all_categories = $this->Common_model->get_data('ts_categories', 'category_name', 'ASC');
        foreach ($all_categories as $key => $value) {
            $cat_sub_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $value->category_id);
            $temp['category_id'] = $value->category_id;
            $temp['category_name'] = $value->category_name;
            $temp['category_desc'] = $value->category_desc;
            $temp['category_created'] = $value->category_created;
            $temp['category_updated'] = $value->category_updated;
            $temp['sub_categories'] = $cat_sub_cat;

            array_push($all_categories_sub_categories, $temp);
        }

        $data_response = [
            'is_logged_in' => $is_logged_in_flag,
            'statistical_result_cout' => array(
                'number_of_new_tender' => $number_of_new_tender,
                'number_of_corrigendum' => $number_of_corrigendum,
                'number_of_cancellation' => $number_of_cancellation,
                'number_of_republished' => $number_of_republished,
            ),
            'all_inviters' => $all_inviters,
            'all_districts' => $all_districts,
            'all_products' => $all_products,
            'additional_filter' => $additional_filter,
            'search_tender_by_product_inviter_source_location' => $search_tender_by_product_inviter_source_location,
            'all_categories_sub_categories' => $all_categories_sub_categories,
            'total_tenders' => $total_tenders,
            'tenders' => $tenders,
            'favorite_tenders' => $favorite_tenders,
        ];
        $modified_response = $this->rest_response_modifier->sendResponse($data_response, 'success');
        $this->response($modified_response);
    }

    public function search_keys_product_inviter_source_location_post()
    {

        $search_key = $this->input->post('search_key');
        if ($search_key == 1) {
            $all_categories_sub_categories = [];

            $all_categories = $this->Common_model->get_data('ts_categories', 'category_name', 'ASC');
            foreach ($all_categories as $key => $value) {
                $cat_sub_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $value->category_id);
                $temp['category_id'] = $value->category_id;
                $temp['category_name'] = $value->category_name;
                $temp['category_desc'] = $value->category_desc;
                $temp['category_created'] = $value->category_created;
                $temp['category_updated'] = $value->category_updated;
                $temp['sub_categories'] = $cat_sub_cat;

                array_push($all_categories_sub_categories, $temp);
            }
            $search_by_key_type = 'category';
            $search_by_key_id = 1;
            $search_by_keys = $all_categories_sub_categories;
        } elseif ($search_key == 2) {

            $inviter_government = $this->Common_model->get_data_by('ts_inviters', 'inviter_type', 2);
            $inviter_ngo = $this->Common_model->get_data_by('ts_inviters', 'inviter_type', 1);
            $inviter_private = $this->Common_model->get_data_by('ts_inviters', 'inviter_type', 3);

            $search_by_key_type = 'inviters';
            $search_by_key_id = 2;
            $search_by_keys = array(
               'Governmant'=> array(
                    'inviter_type' => 'Governmant',
                    'inviter_type_id' => 2,
                    'inviter_data' => $inviter_government
                ),
               'NGO' => array(
                    'inviter_type' => 'NGO',
                    'inviter_type_id' => 1,
                    'inviter_data' => $inviter_ngo
                ),
              'Private'=>array(
                    'inviter_type' => 'Private',
                    'inviter_type_id' => 3,
                    'inviter_data' => $inviter_private
                ),
            );
        } elseif ($search_key == 3) {
            $sources = $this->Common_model->get_data('ts_sources');

            $search_by_key_type = 'source';
            $search_by_key_id = 3;
            $search_by_keys = $sources;

        }elseif ($search_key == 4) {
            $all_divisions_districts = [];

            $all_divisions = $this->Common_model->get_data('ts_divisions');
            foreach ($all_divisions as $key => $value) {
                $district = $this->Common_model->get_data_by('ts_districts', 'division_id', $value->division_id);

                $temp['division_id'] = $value->division_id;
                $temp['division_name'] = $value->division_name;
                $temp['district'] = $district;

                array_push($all_divisions_districts, $temp);
            }
            $search_by_key_type = 'location';
            $search_by_key_id = 4;
            $search_by_keys = $all_divisions_districts;

        } 
        else {
            $search_by_key_type = '';
            $search_by_key_id = '';
            $search_by_keys = '';
        }

        $data_response=[
            'search_by_key_type'=>$search_by_key_type,
            'search_by_key_id'=>$search_by_key_id,
            'search_by_keys'=>$search_by_keys
        ];
        $modified_response = $this->rest_response_modifier->sendResponse($data_response, 'success');
        $this->response($modified_response);
    }
    public function get_tender_by_search_keys_product_inviter_source_location_post()
    {
        $is_logged_in = $this->is_logged_in();

        $specific_search_id=$this->input->post('specific_search_id');
        $search_by_key_id=$this->input->post('search_by_key_id');
        $search_by_key_type=$this->input->post('search_by_key_type');

        if($search_by_key_id == 1 && $search_by_key_type=='category')
        {
            $search_by='sub_cat';
        }
        elseif($search_by_key_id == 2 && $search_by_key_type=='inviters')
        {
            $search_by='inviter';
        }
        elseif($search_by_key_id == 3 && $search_by_key_type=='source')
        {
            $search_by='source';
        }
        elseif($search_by_key_id == 4 && $search_by_key_type=='location')
        {
            $search_by='location';
        }
        else
        {
            $search_by='';
        }

        if ($is_logged_in['error_flag']) {
            //$modified_response = $this->rest_response_modifier->sendError($is_logged_in['message']);
            //$this->response($modified_response);
            $favorite_tenders = [];
            $is_logged_in_flag = false;
            $page = 1;
            $limit = 7;
            $userid = 0;
        } else {
            $userid = $is_logged_in['message']->webu_id;
            $fav_tens = $this->Common_model->get_data_by('ts_user_fav_ten_list', 'ufav_user_id', $userid);
            $user_fav_ten_arr = array();
            foreach ($fav_tens as $value) {
                array_push($user_fav_ten_arr, $value->ufav_tender_id);
            }

            $favorite_tenders = $user_fav_ten_arr;
            $is_logged_in_flag = true;
            $page = $this->input->post('page');
            if (empty($page)) {
                $page = 1;
            }

            $limit = 5;
        }
        
    
        
        $number_of_new_tender = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 1));
        $number_of_corrigendum = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 2));
        $number_of_cancellation = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 3));
        $number_of_republished = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 4));

        $all_inviters = $this->Common_model->get_data('ts_inviters'); /* for search */
        $all_districts = $this->Common_model->get_data('ts_districts'); /* for search */
        $all_products = $this->Common_model->get_data('ts_sub_categories'); /* for search */
        $additional_filter = [
            1 => 'Newest First',
            2 => 'Oldest First',
            3 => 'Most Viewed On Top',
            4 => 'Early Expired On Top',
        ];

        $search_tender_by_product_inviter_source_location = [
            'Product' => array('search_by_key_type' => 'Product', 'search_by_key_id'=>1, 'sub_id' => ''),
            'Inviter' => array('search_by_key_type' => 'Inviter', 'search_by_key_id'=>2, 'sub_ids' => array(
                array(
                    
                    'inviter_type'=>'Governmant',
                    'inviter_type_id'=>2, 
                    ),
                    array(
                    
                    'inviter_type'=>'Private',
                    'inviter_type_id'=>3, 
                    ),
                    array(
                    
                    'inviter_type'=>'NGO',
                    'inviter_type_id'=>1, 
                    ),
            )),
            'Source' => array('search_by_key_type' => 'Source',   'search_by_key_id'=>3, 'sub_id' => ''),
            'Location' => array('search_by_key_type' => 'Location', 'search_by_key_id'=>4, 'sub_id' => ''),
        ];



        $tenders = $this->Api_model->get_tender_by($specific_search_id, $search_by,$page,$limit,$userid);
        $total_tenders=$this->Api_model->get_tender_by_total_rows($specific_search_id, $search_by,$userid);

        $all_categories_sub_categories = [];

        $all_categories = $this->Common_model->get_data('ts_categories', 'category_name', 'ASC');
        foreach ($all_categories as $key => $value) {
            $cat_sub_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $value->category_id);
            $temp['category_id'] = $value->category_id;
            $temp['category_name'] = $value->category_name;
            $temp['category_desc'] = $value->category_desc;
            $temp['category_created'] = $value->category_created;
            $temp['category_updated'] = $value->category_updated;
            $temp['sub_categories'] = $cat_sub_cat;

            array_push($all_categories_sub_categories, $temp);
        }

        $data_response = [
            'is_logged_in' => $is_logged_in_flag,
            'statistical_result_cout' => array(
                'number_of_new_tender' => $number_of_new_tender,
                'number_of_corrigendum' => $number_of_corrigendum,
                'number_of_cancellation' => $number_of_cancellation,
                'number_of_republished' => $number_of_republished,
            ),
            'all_inviters' => $all_inviters,
            'all_districts' => $all_districts,
            'all_products' => $all_products,
            'additional_filter' => $additional_filter,
            'search_tender_by_product_inviter_source_location' => $search_tender_by_product_inviter_source_location,
            'all_categories_sub_categories' => $all_categories_sub_categories,
            'total_tenders' => $total_tenders,
            'tenders' => $tenders,
            'favorite_tenders' => $favorite_tenders,
        ];
        $modified_response = $this->rest_response_modifier->sendResponse($data_response, 'success');
        $this->response($modified_response);
       
        
       
    }
}
