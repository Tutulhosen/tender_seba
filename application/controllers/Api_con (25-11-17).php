<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_con extends Backend_Controller {

    /*
    Name        :   __construct
    Authur      :   Ismail
    Created     :   20-11-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function __construct(){
        parent::__construct();

        $this->load->model('Api_model');
    }

    /*
    Name        :   driver_login
    Authur      :   Ismail
    Created     :   20-11-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function driver_login()
    {
        // validate form 
        $this->form_validation->set_rules('identity', 'Identity', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if($this->form_validation->run())
        {
            $identity = $this->input->post('identity');
            $password = $this->input->post('password');

            $check = $this->Api_model->check_driver_login($identity, $password);

            if($check['status'] === TRUE)
            {
                $response = array(
                    'status' => true,
                    'result' => array(
                        'id'          => $check['result']['id'],
                        'owner_name' => $check['result']['owner_name'],
                        'driver_email' => $check['result']['driver_email'],
                        'driver_phone' => $check['result']['driver_phone'],
                    )
                );
            }
            else
            {
                $response = array(
                    'status' => false,
                    'msg' => 'Wrong Identity Or Password'
                );
            }
        }
        else
        {
            $response = array(
                'status' => false,
                'msg' => 'Identity & Password field are required!'
            );
        }

        echo json_encode($response);
    }
    //END- driver_login


    /*
    Name        :   driver_registration
    Authur      :   Ismail
    Created     :   21-11-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function driver_registration()
    {
        // validate form 
        $this->form_validation->set_rules('owner_name', 'Owner Name', 'required|trim');
        $this->form_validation->set_rules('identity', 'Identity', 'required|trim');
        $this->form_validation->set_rules('driver_phone', 'Driver Phone', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim');

        if($this->form_validation->run())
        {
            $data = array();
            $data['owner_name'] = $this->input->post('owner_name');
            $data['driver_email'] = $this->input->post('identity');
            $data['driver_phone'] = $this->input->post('driver_phone');
            $data['password'] = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_password');
            $data['created'] = date('Y-m-d H:i:s');

            if($data['password'] != $confirm_password)
            {
                $response = array(
                    'status' => false,
                    'msg' => 'Password Mismatch.'
                );
            }
            else if($this->Common_model->exists('ec_driver_tbl', 'driver_email', $data['driver_email']))
            {
                $response = array(
                    'status' => false,
                    'msg' => 'This E-mail is already registered.'
                );
            }
            else if($this->Common_model->exists('ec_driver_tbl', 'driver_phone', $data['driver_phone']))
            {
                $response = array(
                    'status' => false,
                    'msg' => 'This mobile number is already registered.'
                );
            }
            else
            {
                $driver_id = $this->Common_model->create_with_return_id('ec_driver_tbl', $data);

                $response = array(
                    'status' => true,
                    'result' => array(
                        'id'          => $driver_id,
                    )
                );
            }
        }
        else
        {
            $response = array(
                'status' => false,
                'msg'    => 'Some required field(s) are empty.'
            );
        }

        echo json_encode($response);
    }
    //END- driver_registration


    /*
    Name        :   user_login
    Authur      :   Ismail
    Created     :   21-11-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function user_login()
    {
        // validate form 
        $this->form_validation->set_rules('identity', 'Identity', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if($this->form_validation->run())
        {
            $identity = $this->input->post('identity');
            $password = $this->input->post('password');

            $check = $this->Api_model->check_user_login($identity, $password);

            if($check['status'] === TRUE)
            {
                $response = array(
                    'status' => true,
                    'result' => array(
                        'id'          => $check['result']['id'],
                        'user_name' => $check['result']['user_name'],
                        'user_email' => $check['result']['user_email'],
                        'user_phone' => $check['result']['user_phone'],
                        'password' => $check['result']['user_password'],
                        'confirm_password' => $check['result']['user_password'],
                    )
                );
            }
            else
            {
                $response = array(
                    'status' => false,
                    'msg' => 'Wrong Identity Or Password'
                );
            }
        }
        else
        {
            $response = array(
                'status' => false,
                'msg' => 'Identity & Password field are required!'
            );
        }

        echo json_encode($response);
    }
    //END- user_login


    /*
    Name        :   user_registration
    Authur      :   Ismail
    Created     :   21-11-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function user_registration()
    {
        // validate form 
        $this->form_validation->set_rules('user_name', 'Your Name', 'required|trim');
        $this->form_validation->set_rules('identity', 'Identity', 'required|trim');
        $this->form_validation->set_rules('user_phone', 'Your Phone', 'required|trim');
        $this->form_validation->set_rules('user_address', 'Your Address', 'trim');
        $this->form_validation->set_rules('user_password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim');

        if($this->form_validation->run())
        {
            $data = array();
            $data['user_name'] = $this->input->post('user_name');
            $data['user_email'] = $this->input->post('identity');
            $data['user_phone'] = $this->input->post('user_phone');
            $data['user_address'] = $this->input->post('user_address');
            $data['user_password'] = $this->input->post('user_password');
            $confirm_password = $this->input->post('confirm_password');
            $data['created'] = date('Y-m-d H:i:s');

            if($data['user_password'] != $confirm_password)
            {
                $response = array(
                    'status' => false,
                    'msg' => 'Password Mismatch.'
                );
            }
            else if($this->Common_model->exists('ec_user_tbl', 'user_email', $data['user_email']))
            {
                $response = array(
                    'status' => false,
                    'msg' => 'This E-mail is already registered.'
                );
            }
            else if($this->Common_model->exists('ec_user_tbl', 'user_phone', $data['user_phone']))
            {
                $response = array(
                    'status' => false,
                    'msg' => 'This mobile number is already registered.'
                );
            }
            else
            {
                $user_id = $this->Common_model->create_with_return_id('ec_user_tbl', $data);

                $response = array(
                    'status' => true,
                    'result' => array(
                        'id'          => $user_id,
                    )
                );
            }
        }
        else
        {
            $response = array(
                'status' => false,
                'msg'    => 'Some required field(s) are empty.'
            );
        }

        echo json_encode($response);
    }
    //END- user_registration
}