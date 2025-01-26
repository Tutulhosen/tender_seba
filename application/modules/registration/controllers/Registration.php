<?php defined('BASEPATH') OR exit('No direct script access allowed');

include 'classes/SMSClient.php';

class Registration extends Backend_Controller {
    var $smsClient;
    var $img_path;
	public function __construct(){
		parent::__construct();	
		// if ($this->ion_auth->logged_in()){
		// 	redirect('admin/dashboard');
		// }

        $this->load->helper('string');
        $this->load->model('Common_model');
        $this->smsClient = new SMSClient('1587652994', '^Rl:_w=[', 'http://www.sms4bd.net');
        $this->img_path = realpath(APPPATH . '../student_img');
	}

	public function index(){

        $this->data['district'] = $this->Common_model->get_data('district');
        $this->data['post_office'] = $this->Common_model->get_data('post_office');
        $this->data['upzilla'] = $this->Common_model->get_data('upzilla');
        
        $this->data['link'] = '<a href="'.base_url().'signin" class="btn btn-success login">সাইন ইন</a>';    
        $this->data['meta_title'] = 'Registration';
		$this->data['subview'] = 'index';
    	$this->load->view('frontend/_layout_main', $this->data);
        
	}

    public function add(){
        if(!$this->input->post())
        {
           redirect("registration"); 
        }

        
        $this->data['district'] = $this->Common_model->get_data('district');
        $this->data['post_office'] = $this->Common_model->get_data('post_office');
        $this->data['upzilla'] = $this->Common_model->get_data('upzilla');

        $this->form_validation->set_rules('first_name', 'Student Name', 'required|trim');
        $this->form_validation->set_rules('father_name', 'Father`s Name', 'required|trim');
        $this->form_validation->set_rules('mother_name', 'Mother`s Name', 'required|trim');

        $this->form_validation->set_rules('father_nid', 'Mother`s NID', 'trim|min_length[13]|max_length[17]');
        $this->form_validation->set_rules('mother_nid', 'Mother`s NID', 'trim|min_length[13]|max_length[17]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|numeric|min_length[11]|max_length[11]');

        $this->form_validation->set_rules('day', 'Day', 'required|trim');
        $this->form_validation->set_rules('month', 'Month', 'required|trim');
        $this->form_validation->set_rules('year', 'Year', 'required|trim|min_length[4]|max_length[4]');

        $this->form_validation->set_rules('current_edu_institute', 'Current edu institute', 'required|trim');
        $this->form_validation->set_rules('current_edu_class', 'Current edu class', 'required|trim');
        $this->form_validation->set_rules('current_edu_year', 'Current edu year', 'required|trim');
        $this->form_validation->set_rules('current_edu_division', 'Current edu division', 'required|trim');
        $this->form_validation->set_rules('current_edu_sl', 'Current edu sl', 'required|trim');

        $this->form_validation->set_rules('application_exam_name', 'Application exam name', 'required|trim');
        $this->form_validation->set_rules('application_exam_year', 'Application exam year', 'required|trim|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('application_exam_gpa', 'Application exam gpa', 'required|trim');
        $this->form_validation->set_rules('application_comment', 'Application comment', 'required|trim');

        $this->form_validation->set_rules('permanent_village', 'Permanent village', 'required|trim');
        $this->form_validation->set_rules('permanent_post_office', 'Permanent post office', 'required|trim');
        $this->form_validation->set_rules('permanent_union', 'Permanent union', 'required|trim');
        $this->form_validation->set_rules('permanent_district', 'Permanent district', 'required|trim');

        $this->form_validation->set_rules('communication_address', 'Communication address', 'required|trim');

        $this->form_validation->set_rules('capable_your_family', 'Capable your family', 'required|trim');

        
        $this->form_validation->set_rules('academic_certificate', 'Academic Marksheet', 'callback_academic_certificate');
        

        if($_FILES['academic_certificate2']['size'] > 0){
            $this->form_validation->set_rules('academic_certificate2', 'Academic Certificate', 'callback_academic_certificate2');
        }

        $this->form_validation->set_rules('dob_certificate', 'DOB certificate', 'callback_dob_certificate');

        $this->form_validation->set_rules('testimonial', 'Testimonial', 'callback_testimonial');

        $this->form_validation->set_rules('userfile', 'Image', 'callback_userfile');

        // $this->form_validation->set_rules('terms', 'terms', 'required|trim');
           

         if ($this->form_validation->run() == true){
 
            if($_FILES['userfile']['size'] > 0){
                $new_file_name = time().$_FILES["userfile"]['name'];

                $config['allowed_types']= 'jpg|png|jpeg|gif|pdf';
                $config['upload_path']  = $this->img_path;
                $config['file_name']    = $new_file_name;
                $config['max_size']     = 1000;

                $this->load->library('upload', $config);
                //upload file to directory
                if($this->upload->do_upload('userfile')){
                    $uploadData = $this->upload->data();
                    $uploadedFile = $uploadData['file_name'];
                    // print_r($uploadedFile);
                    $this->data['message'] = 'File has been uploaded successfully.';
                }else{
                    echo $this->data['message'] = $this->upload->display_errors();
                }
            }

            if($_FILES['testimonial']['size'] > 0){
                $new_file_name1 = time().$_FILES["testimonial"]['name'];

                $config1['allowed_types']= 'jpg|png|jpeg|gif|pdf';
                $config1['upload_path']  = $this->img_path;
                $config1['file_name']    = $new_file_name1;
                $config1['max_size']     = 1000;

                $this->load->library('upload', $config1);
                //upload file to directory
                if($this->upload->do_upload('testimonial')){
                    $uploadData1 = $this->upload->data();
                    $uploadedFile1 = $uploadData1['file_name'];
                    // print_r($uploadedFile1);
                    $this->data['message'] = 'File has been uploaded successfully.';
                }else{
                    $this->data['message'] = $this->upload->display_errors();
                }
            }

            if($_FILES['dob_certificate']['size'] > 0){
                $new_file_name2 = time().$_FILES["dob_certificate"]['name'];

                $config2['allowed_types']= 'jpg|png|jpeg|gif|pdf';
                $config2['upload_path']  = $this->img_path;
                $config2['file_name']    = $new_file_name2;
                $config2['max_size']     = 1000;

                $this->load->library('upload', $config2);
                //upload file to directory
                if($this->upload->do_upload('dob_certificate')){
                    $uploadData2 = $this->upload->data();
                    $uploadedFile2 = $uploadData2['file_name'];
                    // print_r($uploadedFile2);
                    $this->data['message'] = 'File has been uploaded successfully.';
                }else{
                    $this->data['message'] = $this->upload->display_errors();
                }
            }

            if($_FILES['academic_certificate']['size'] > 0){
                $new_file_name3 = time().$_FILES["academic_certificate"]['name'];

                $config3['allowed_types']= 'jpg|png|jpeg|gif|pdf';
                $config3['upload_path']  = $this->img_path;
                $config3['file_name']    = $new_file_name3;
                $config3['max_size']     = 1000;

                $this->load->library('upload', $config3);
                //upload file to directory
                if($this->upload->do_upload('academic_certificate')){
                    $uploadData3 = $this->upload->data();
                    $uploadedFile3 = $uploadData3['file_name'];
                    // print_r($uploadedFile3);
                    $this->data['message'] = 'File has been uploaded successfully.';
                }else{
                    $this->data['message'] = $this->upload->display_errors();
                }
            }

            if($_FILES['academic_certificate2']['size'] > 0){
                $new_file_name4 = time().$_FILES["academic_certificate2"]['name'];

                $config4['allowed_types']= 'jpg|png|jpeg|gif|pdf';
                $config4['upload_path']  = $this->img_path;
                $config4['file_name']    = $new_file_name4;
                $config4['max_size']     = 1000;

                $this->load->library('upload', $config4);
                //upload file to directory
                if($this->upload->do_upload('academic_certificate2')){
                    $uploadData4 = $this->upload->data();
                    $uploadedFile4 = $uploadData4['file_name'];
                    // print_r($uploadedFile3);
                    $this->data['message'] = 'File has been uploaded successfully.';
                }else{
                    $this->data['message'] = $this->upload->display_errors();
                }
            }

            $email    = 'student@gmail.com';
            $identity = $this->Common_model->last_student_id('users');
            $password = random_string('alnum', 8);

            $form_data = array(
                'student_id'            => $identity,
                'first_name'            => $this->input->post('first_name'),
                'father_name'           => $this->input->post('father_name'),
                'mother_name'           => $this->input->post('mother_name'),
                'father_nid'            => $this->input->post('father_nid'),
                'mother_nid'            => $this->input->post('mother_nid'),
                'mobile'                => $this->input->post('mobile'),
                'dob'                   => $this->input->post('day').'-'.$this->input->post('month').'-'.$this->input->post('year'),
                
                'current_edu_institute' => $this->input->post('current_edu_institute'),
                'current_edu_class'     => $this->input->post('current_edu_class'),
                'current_edu_year'      => $this->input->post('current_edu_year'),
                'current_edu_division'  => $this->input->post('current_edu_division'),
                'current_edu_sl'        => $this->input->post('current_edu_sl'),
                'application_exam_name' => $this->input->post('application_exam_name'),
                'application_exam_year' => $this->input->post('application_exam_year'),
                'application_exam_gpa'  => $this->input->post('application_exam_gpa'),
                'application_comment'   => $this->input->post('application_comment'),
                'permanent_village'     => $this->input->post('permanent_village'),
                'permanent_post_office' => $this->input->post('permanent_post_office'),
                'permanent_union'       => $this->input->post('permanent_union'),
                'permanent_district'    => $this->input->post('permanent_district'),
                'communication_address' => $this->input->post('communication_address'),
                'capable_your_family'   => $this->input->post('capable_your_family'),
                'application_year'      => date('Y'),
                'status'                => 1
            );

            if(!empty($uploadedFile)){
                $form_data['image'] = $uploadedFile;
            }else{
                $form_data['image'] = '';
            }

            if(!empty($uploadedFile1)){
                $form_data['testimonial'] = $uploadedFile1;
            }else{
                $form_data['testimonial'] = '';
            }

            if(!empty($uploadedFile2)){
                $form_data['dob_certificate'] = $uploadedFile2;
            }else{
                $form_data['dob_certificate'] = '';
            }

            if(!empty($uploadedFile3)){
                $form_data['academic_certificate'] = $uploadedFile3;
            }else{
                $form_data['academic_certificate'] = '';
            }

            if(!empty($uploadedFile4)){
                $form_data['academic_certificate2'] = $uploadedFile4;
            }else{
                $form_data['academic_certificate2'] = '';
            }
            
            if($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $form_data)){                
                
                $this->session->set_flashdata('success', 'New Student Registration  Successfully.');

                $phone='+88'.$this->input->post('mobile');
                $message='Congratulations ! '.$this->input->post('first_name').'. Your Registration  Successfully. '.'username: '.$identity.' Password: '.$password.' (Zilla Parishad, Nator)';
                
                if(!empty($this->input->post('mobile'))){
                    $response = $this->smsClient->SendSMS("softheaven", $phone, $message, date('Y-m-d H:i:s'), SMSType::UCS2);
                    $result = $response->StatusMessage;  
                    // print_r($result);

                    // if($result = 'Accepted'){
                    //     echo 'Success';
                    // }else{
                    //     echo 'Failed';
                    // }

                }
                redirect("registration");
            }
        }

        $this->data['link'] = '<a href="'.base_url().'signin" class="btn btn-success login">সাইন ইন</a>';    
        $this->data['meta_title'] = 'Registration';
        $this->data['subview'] = 'index';
        $this->load->view('frontend/_layout_main', $this->data);
        }

        public function userfile($str){
            $this->load->helper('file');
            $allowed_mime_type_arr = array('image/gif','image/jpeg','image/png','image/x-png');
            
            $mime = get_mime_by_extension($_FILES['userfile']['name']);
           
            $file_size = 1050000; 
            $size_kb = '1 MB';

            if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
                if(!in_array($mime, $allowed_mime_type_arr)){                
                    $this->form_validation->set_message('userfile', 'Please select only jpg, jpeg, png, gif file.');
                    return false;
                }elseif($_FILES["userfile"]["size"] > $file_size){
                    $this->form_validation->set_message('userfile', 'Maximum file size '.$size_kb);
                    return false;
                }else{
                    return true;
                }
            }else{
                $this->form_validation->set_message('userfile', 'Please choose a file to upload.');
                return false;
            }

        }

        public function testimonial($str){
            $this->load->helper('file');
            $allowed_mime_type_arr = array('image/gif','image/jpeg','image/png','image/x-png');
            
            $mime = get_mime_by_extension($_FILES['testimonial']['name']);
            
            $file_size = 1050000; 
            $size_kb = '1 MB';


             if(isset($_FILES['testimonial']['name']) && $_FILES['testimonial']['name']!=""){
                if(!in_array($mime, $allowed_mime_type_arr)){                
                    $this->form_validation->set_message('testimonial', 'Please select only jpg, jpeg, png, gif file.');
                    return false;
                }elseif($_FILES["testimonial"]["size"] > $file_size){
                    $this->form_validation->set_message('testimonial', 'Maximum file size '.$size_kb);
                    return false;
                }else{
                    return true;
                }
            }else{
                $this->form_validation->set_message('testimonial', 'Please choose a file to upload.');
                return false;
            }

        }

        public function dob_certificate($str){
            $this->load->helper('file');
            $allowed_mime_type_arr = array('image/gif','image/jpeg','image/png','image/x-png');
            
            $mime = get_mime_by_extension($_FILES['dob_certificate']['name']);
            
            $file_size = 1050000; 
            $size_kb = '1 MB';

            
            if(isset($_FILES['dob_certificate']['name']) && $_FILES['dob_certificate']['name']!=""){
                if(!in_array($mime, $allowed_mime_type_arr)){                
                    $this->form_validation->set_message('dob_certificate', 'Please select only jpg, jpeg, png, gif file.');
                    return false;
                }elseif($_FILES["dob_certificate"]["size"] > $file_size){
                    $this->form_validation->set_message('dob_certificate', 'Maximum file size '.$size_kb);
                    return false;
                }else{
                    return true;
                }
            }else{
                $this->form_validation->set_message('dob_certificate', 'Please choose a file to upload.');
                return false;
            }

        }

        public function academic_certificate($str){
            $this->load->helper('file');
            $allowed_mime_type_arr = array('image/gif','image/jpeg','image/png','image/x-png');
            
            $mime = get_mime_by_extension($_FILES['academic_certificate']['name']);
            
            $file_size = 1050000; 
            $size_kb = '1 MB';


            if(isset($_FILES['academic_certificate']['name']) && $_FILES['academic_certificate']['name']!=""){
                if(!in_array($mime, $allowed_mime_type_arr)){                
                    $this->form_validation->set_message('academic_certificate', 'Please select only jpg, jpeg, png, gif file.');
                    return false;
                }elseif($_FILES["academic_certificate"]["size"] > $file_size){
                    $this->form_validation->set_message('academic_certificate', 'Maximum file size '.$size_kb);
                    return false;
                }else{
                    return true;
                }
            }else{
                $this->form_validation->set_message('academic_certificate', 'Please choose a file to upload.');
                return false;
            }

        }

        public function academic_certificate2($str){
            $this->load->helper('file');
            $allowed_mime_type_arr = array('image/gif','image/jpeg','image/png','image/x-png');
            
            $mime = get_mime_by_extension($_FILES['academic_certificate2']['name']);
            
            $file_size = 1050000; 
            $size_kb = '1 MB';


            if(isset($_FILES['academic_certificate2']['name']) && $_FILES['academic_certificate2']['name']!=""){
                if(!in_array($mime, $allowed_mime_type_arr)){                
                    $this->form_validation->set_message('academic_certificate2', 'Please select only jpg, jpeg, png, gif file.');
                    return false;
                }elseif($_FILES["academic_certificate2"]["size"] > $file_size){
                    $this->form_validation->set_message('academic_certificate2', 'Maximum file size '.$size_kb);
                    return false;
                }else{
                    return true;
                }
            }else{
                $this->form_validation->set_message('academic_certificate2', 'Please choose a file to upload.');
                return false;
            }
        }


}
