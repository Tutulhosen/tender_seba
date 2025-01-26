<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Backend_Controller {

    /*
    Name        :   __construct
    Authur      :   Ismail
    Created     :   12-10-17
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

        $this->load->model('Category_model');
    }
    
    /*
    Name        :   index
    Authur      :   Ismail
    Created     :   12-10-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function index()
    {
        $this->data['categories'] = $this->Category_model->get_categories(); 
        
        $this->data['meta_title'] = 'All Category';
        $this->data['subview'] = 'index';
        $this->load->view('backend/_layout_main', $this->data);
    }
    
    /*
    Name        :   add
    Authur      :   Ismail
    Created     :   12-10-17
    ModifiedBy  :   Ismail
    ModifiedDate:   30-10-17
    */
    public function add()
    {
        // validate form input
        $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim|is_unique[ts_categories.category_name]');
        $this->form_validation->set_rules('category_desc', 'Category Description', 'trim');

        if ($this->form_validation->run() == true) {
            $data['category_name'] = $this->input->post('category_name');
            $data['category_desc'] = $this->input->post('category_desc');
            $data['category_created'] = date('Y-m-d H:i:s');

            if($this->Category_model->create_category($data))
            {
                $this->session->set_flashdata('success', 'Category Created Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('category');

        }
        else {
            // display the create category form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['category_name'] = array(
                'name'  => 'category_name',
                'id'    => 'category_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('category_name'),
                'required' => 'required'
            );
            $this->data['category_desc'] = array(
                'name'  => 'category_desc',
                'id'    => 'category_desc',
                'rows'  => '3',
                'cols'  => '10',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('category_desc'),
            );
            
            // Load Page
            $this->data['meta_title'] = 'Create Category';
            $this->data['subview'] = 'add';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   edit
    Description :

    Authur      :   Ismail
    Created     :   12-10-17

    ModifiedBy  :
    ModifiedDate:
    */
    public function edit($id)
    {
        // validate form input
        $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');
        $this->form_validation->set_rules('category_desc', 'Category Description', 'trim');

        if ($this->form_validation->run() == true) {
            $data['category_name'] = $this->input->post('category_name');
            $data['category_desc'] = $this->input->post('category_desc');

            if($this->Category_model->update_category($id, $data))
            {
                $this->session->set_flashdata('success', 'Category Updated Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('category');

        }
        else {
            // display the update user form

            $this->data['category_details'] = $this->Category_model->get_category($id);

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['category_name'] = array(
                'name'  => 'category_name',
                'id'    => 'category_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('category_name', $this->data['category_details']->category_name),
                'required' => 'required'
            );
            $this->data['category_desc'] = array(
                'name'  => 'category_desc',
                'id'    => 'category_desc',
                'rows'  => '3',
                'cols'  => '10',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('category_desc', $this->data['category_details']->category_desc),
            );
            
            // Load Page
            $this->data['meta_title'] = 'Update Category';
            $this->data['subview'] = 'edit';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   delete
    Description :

    Authur      :   Ismail
    Created     :   12-10-17

    ModifiedBy  :
    ModifiedDate:
    */
    public function delete()
    {
        $category_id = $_POST['category_id'];

        $this->Category_model->delete_category($category_id);

        echo 'Category Deleted Successfully.';
    }

 

}