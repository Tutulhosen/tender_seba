<?php defined('BASEPATH') or exit('No direct script access allowed');

class Api_Helpers
{
    private $load_ci_resources;
    private $email_config;
    public function __construct()
    {

        $this->load_ci_resources = &get_instance();
        $this->email_config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'touhidul.developer.2022@gmail.com',
            'smtp_pass' => 'qrjrzqkbmhjuglyd',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        $this->load_ci_resources->load->library('email');
        $this->load_ci_resources->email->initialize($this->email_config);
        $this->load_ci_resources->email->set_newline("\r\n");
    }

    public function send_opt_email()
    {
        
        $this->load_ci_resources->email->from($from_email, 'Identification');
        $this->load_ci_resources->email->to($to_email);
        $this->load_ci_resources->email->subject('Send Email Codeigniter');
        $this->load_ci_resources->email->message('The email send using codeigniter library');
    
    }
}
