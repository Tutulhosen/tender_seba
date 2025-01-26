<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Resources extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();	
		$this->load->library('Authorization_Token');
		$this->load->library('Rest_response_modifier');
		$this->load->model('api_model');		  
	}
  
	public function user_post()
	{  
		$array  = array('status'=>'ok','data'=>1);
		$this->response($array); 
	}
	public function record_post()
	{  
		$array  = array('status'=>'ok','data'=>'post api');
		$modified_response=$this->rest_response_modifier->sendResponse($array,'success');
		$this->response($modified_response); 
	}
	
	public function register_post()
	{   
		$token_data['user_id'] = 1210;
		$token_data['fullname'] = 'code10'; 
		$token_data['email'] = 'code@gmail10.com';

		$tokenData = $this->authorization_token->generateToken($token_data);

		$final = array();
		$final['token'] = $tokenData;
		$final['status'] = 'ok';
 
		$this->response($final); 

	}
	public function verify_post()
	{  
		$headers = $this->input->request_headers(); 
		$decodedToken = $this->authorization_token->validateToken($headers['Authorization']);

		$this->response($decodedToken);  
	}

    public function get_all_packages_get()
    {
        //$is_found = $this->api_model->get_all_pakg_list();

		$modified_response = $this->rest_response_modifier->sendResponse($this->api_model->get_all_pakg_list(),'success');
        $this->response($modified_response);
    }
    public function index_get()
    {
        //$is_found = $this->api_model->get_all_pakg_list();

		$modified_response = $this->rest_response_modifier->sendResponse($this->api_model->get_all_pakg_list(),'success');
        $this->response($modified_response);
    }
}

