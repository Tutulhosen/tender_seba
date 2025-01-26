<?php defined('BASEPATH') or exit('No direct script access allowed');

class Data_Validation
{
    private $load_ci_resources;
    public function __construct()
    {

        $this->load_ci_resources = &get_instance();
        
    }

    public function user_registration_form_validate($user_input)
    {
        $message = [];
        $flag = true;
        if (empty($user_input['name'])) {
            $message[] = 'The name field  is required';
            $flag = false;
        }
        if (empty($user_input['email'])) {
            $message[] = 'The email field is required';
            $flag = false;
        }
        if (empty($user_input['mobile'])) {
            $message[] = 'The mobile field is required';
            $flag = false;
        }
        if (empty($user_input['password'])) {
            $message[] = 'The password field is required';
            $flag = false;
        }
        if (empty($user_input['confirm_password'])) {
            $message[] = 'The confirm password field is required';
            $flag = false;
        }
        if (strlen($user_input['confirm_password']) < 8) {
            $message[] = 'The confirm password field must be at least 8 charecters';
            $flag = false;
        }
        if (strlen($user_input['password'])< 8) {
            $message[] = 'The password field must be at least 8 charecters';
            $flag = false;
        }
        if ($user_input['password'] !== $user_input['confirm_password']) {
            $message[] = 'The password field and confirm password field must be same';
            $flag = false;
        }

        if ($this->is_email_user_exits($user_input['email'])) {
            $message[] = 'The email is already registered';
            $flag = false;
        }
        if ($this->is_phone_user_exits($user_input['mobile'])) {
            $message[] = 'The mobile number is already registered';
            $flag = false;
        }
        if ($this->is_email_user_correct_format($user_input['email']) == 'format_error') {
            $message[] = 'The email format is invalid';
            $flag = false;
        }
        if ($this->is_phone_user_correct_format($user_input['mobile']) == 'size_error') {
            $message[] = 'The mobile number must be 11 digit';
            $flag = false;
        }
        if ($this->is_phone_user_correct_format($user_input['mobile']) == 'format_error') {
            $message[] = 'The mobile number format is invalid';
            $flag = false;
        }

        //$message['success']=$flag;
        return ['message'=>$message,'flag'=>$flag];
    }
    public function is_phone_user_correct_format($phone_number)
    {
        if (strlen($phone_number) != 11) {
            return 'size_error';
        } else {
            $pattern = "/(01)[0-9]{9}/";
            $preg_answer = preg_match($pattern, $phone_number);
            if (!$preg_answer) {
                return 'format_error';
            }
        }
    }
    public function is_email_user_correct_format($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //Valid email!
            return 'format_ok';
        } else {
            return 'format_error';
        }
    }

    public function is_email_user_exits($email)
    {

        // $SQL="SELECT count(webu_id) FROM `ts_web_user` WHERE webu_email is not null";
        // $re = $this->load_ci_resources->db->query($SQL)->result_array();
        //$this->load_ci_resources->db->where('webu_email', '!=', NULL);

        $where = "webu_email is  NOT NULL";
        $this->load_ci_resources->db->where($where);
        $this->load_ci_resources->db->where('webu_email', $email);
        $this->load_ci_resources->db->from('ts_web_user');

        if ($this->load_ci_resources->db->count_all_results() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function is_phone_user_exits($webu_phone)
    {
        $where = "webu_phone is  NOT NULL";
        $this->load_ci_resources->db->where($where);
        $this->load_ci_resources->db->where('webu_phone', $webu_phone);
        $this->load_ci_resources->db->from('ts_web_user');
        if ($this->load_ci_resources->db->count_all_results() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function user_login_form_validate($user_input)
    {
        $message = [];
        $flag = true;
        if (empty($user_input['email'])) {
            $message[] = 'The email field  is required';
            $flag = false;
        }
        if (empty($user_input['password'])) {
            $message[] = 'The password field is required';
            $flag = false;
        }
        if ($this->is_email_user_correct_format($user_input['email']) == 'format_error') {
            $message[] = 'The email format is invalid';
            $flag = false;
        }
        return ['message'=>$message,'flag'=>$flag];
    }
    
}
