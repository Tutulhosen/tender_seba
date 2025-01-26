<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends Backend_Controller {

    /*
    Name        :   __construct
    Authur      :   Ismail
    Created     :   05-02-18
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

        $this->load->model('Feedback_model');
    }
    
    /*
    Name        :   index
    Authur      :   Ismail
    Created     :   04-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function index()
    {
        $this->data['all_feedback'] = $this->Feedback_model->get_all_feedback(); 
        
        $this->data['meta_title'] = 'All Feedback';
        $this->data['subview'] = 'index';
        $this->load->view('backend/_layout_main', $this->data);
    }
    
    /*
    Name        :   add
    Authur      :   Ismail
    Created     :   05-02-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function add()
    {
        // validate form input
        $this->form_validation->set_rules('webu_id', 'Web User', 'required|trim');
        $this->form_validation->set_rules('feedback_subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('feedback_description', 'Description', 'trim|required');

        if ($this->form_validation->run() == true) {
            $data['webu_id'] = $this->input->post('webu_id');
            $data['feedback_subject'] = $this->input->post('feedback_subject');
            $data['feedback_description'] = $this->input->post('feedback_description');
            $data['feedback_created'] = date('Y-m-d H:i:s');

            if($this->Common_model->save('ts_feedbacks', $data))
            {
                $this->session->set_flashdata('success', 'Feedback Created Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('feedback');

        }
        else {
            // display the create customer form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['webu_id'] = $this->Common_model->get_dropdown('ts_web_user', 'webu_id', 'webu_email', '-- Select User --');

            $this->data['feedback_subject'] = array(
                'name'  => 'feedback_subject',
                'id'    => 'feedback_subject',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('feedback_subject'),
                'required' => 'required'
            );
            $this->data['feedback_description'] = array(
                'name'  => 'feedback_description',
                'id'    => 'feedback_description',
                'type'  => 'text',
                'row'   => '4',
                'col'   => '5',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('feedback_description'),
                'required' => 'required'
            );
            
            // Load Page
            $this->data['meta_title'] = 'Create Feedback';
            $this->data['subview'] = 'add';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   edit
    Authur      :   Ismail
    Created     :   05-02-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function edit($id)
    {
        // validate form input
        $this->form_validation->set_rules('webu_id', 'Web User', 'required|trim');
        $this->form_validation->set_rules('feedback_subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('feedback_description', 'Description', 'trim|required');


        if ($this->form_validation->run() == true) {
            $data = array();
            $data['webu_id'] = $this->input->post('webu_id');
            $data['feedback_subject'] = $this->input->post('feedback_subject');
            $data['feedback_description'] = $this->input->post('feedback_description');

            if($this->Common_model->edit('ts_feedbacks', 'feedback_id', $id, $data))
            {
                $this->session->set_flashdata('success', 'Feedback Updated Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('feedback');

        }
        else {
            // display the update user form

            $up_feed_data = array();
            $up_feed_data['feedback_seen'] = 2;
            $this->Common_model->edit('ts_feedbacks', 'feedback_id', $id, $up_feed_data);

            $this->data['feedback_details'] = $this->Common_model->get_single_row_by('ts_feedbacks', 'feedback_id', $id);

            // set Feedback flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['webu_id'] = $this->Common_model->get_dropdown('ts_web_user', 'webu_id', 'webu_email', '-- Select User --');

            $this->data['feedback_subject'] = array(
                'name'  => 'feedback_subject',
                'id'    => 'feedback_subject',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('feedback_subject', $this->data['feedback_details']['feedback_subject']),
                'required' => 'required'
            );
            $this->data['feedback_description'] = array(
                'name'  => 'feedback_description',
                'id'    => 'feedback_description',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('feedback_description', $this->data['feedback_details']['feedback_description']),
                'required' => 'required'
            );
            
            // Load Page
            $this->data['meta_title'] = 'Update Feedback';
            $this->data['subview'] = 'edit';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   answer
    Authur      :   Ismail
    Created     :   05-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function answer($id)
    {
        $up_feed_data = array();
        $up_feed_data['feedback_seen'] = 2;
        $this->Common_model->edit('ts_feedbacks', 'feedback_id', $id, $up_feed_data);
     
        $this->data['feedback_details'] = $this->Common_model->get_single_row_by('ts_feedbacks', 'feedback_id', $id);

        $this->data['user_details'] = $this->Common_model->get_single_row_by('ts_web_user', 'webu_id', $this->data['feedback_details']['webu_id']);

        $this->data['feedback_answer'] = $this->Common_model->get_data_by('ts_feedback_answers', 'feedback_id', $id);

        $this->data['message'] = '';
            
        // Load Page
        $this->data['meta_title'] = 'Answer Feedback';
        $this->data['subview'] = 'answer';
        $this->load->view('backend/_layout_main', $this->data);
    }
    
    /*
    Name        :   insert_answer
    Authur      :   Ismail
    Created     :   05-02-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function insert_answer()
    {
        $feedback_id = $this->input->post('feedback_id');

        // validate form input
        $this->form_validation->set_rules('answer_answer', 'Feedback', 'required|trim');

        if ($this->form_validation->run() == true) {
            $data = array();
            $data['answer_answer'] = $this->input->post('answer_answer');
            $data['feedback_id'] = $feedback_id;
            $data['answer_from'] = 2;
            $data['answer_created'] = date('Y-m-d H:i:s');

            if($this->Common_model->save('ts_feedback_answers', $data))
            {
                $this->session->set_flashdata('success', 'Answer Inserted Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('feedback/answer/' . $data['feedback_id']);

        }
        else {
            // display the create customer form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            if($feedback_id == '' || $feedback_id == 0)
                redirect('feedback');
            else
            {
                redirect('feedback/answer/' . $feedback_id);
            }
        }
    }

}