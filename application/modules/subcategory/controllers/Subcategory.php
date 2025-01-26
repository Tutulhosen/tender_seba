<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends Backend_Controller {

    /*
    Name        :   __construct
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function __construct(){
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()){
            // redirect them to the login page
            redirect('admin/dashboard');
        }elseif (!$this->ion_auth->is_admin() && !$this->ion_auth->is_setup_user() && $this->uri->segment(2) != 'get_sub_categories_by_category'){
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You are not authorized to view this page.');
        }

        $this->load->model('Subcategory_model');
    }
    
    /*
    Name        :   index
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function index()
    {
        $this->data['subcategories'] = $this->Subcategory_model->get_subcategories(); 
        
        $this->data['meta_title'] = 'All Sub Category';
        $this->data['subview'] = 'index';
        $this->load->view('backend/_layout_main', $this->data);
    }
    
    /*
    Name        :   add
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function add()
    {
        // validate form input
        $this->form_validation->set_rules('category_id', 'Main Category', 'required|trim');
        $this->form_validation->set_rules('sub_cat_name', 'Sub Category Name', 'required|trim');
        $this->form_validation->set_rules('sub_cat_desc', 'Sub Category Description', 'trim');

        if ($this->form_validation->run() == true) {
            $data['category_id'] = $this->input->post('category_id');
            $data['sub_cat_name'] = $this->input->post('sub_cat_name');
            $data['sub_cat_desc'] = $this->input->post('sub_cat_desc');
            $data['sub_cat_created'] = date('Y-m-d H:i:s');

            if($this->Subcategory_model->create_subcategory($data))
            {
                $this->session->set_flashdata('success', 'Sub Category Created Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('subcategory');

        }
        else {
            // display the create category form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['categories'] = $this->Common_model->get_dropdown('ts_categories', 'category_id', 'category_name', '-- Select Category --');

            $this->data['sub_cat_name'] = array(
                'name'  => 'sub_cat_name',
                'id'    => 'sub_cat_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('sub_cat_name'),
                'required' => 'required'
            );
            $this->data['sub_cat_desc'] = array(
                'name'  => 'sub_cat_desc',
                'id'    => 'sub_cat_desc',
                'rows'  => '3',
                'cols'  => '10',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('sub_cat_desc'),
            );
            
            // Load Page
            $this->data['meta_title'] = 'Create Sub Category';
            $this->data['subview'] = 'add';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   edit
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function edit($id)
    {
        // validate form input
        $this->form_validation->set_rules('category_id', 'Main Category', 'required|trim');
        $this->form_validation->set_rules('sub_cat_name', 'Sub Category Name', 'required|trim');
        $this->form_validation->set_rules('sub_cat_desc', 'Sub Category Description', 'trim');

        if ($this->form_validation->run() == true) {
            $data['category_id'] = $this->input->post('category_id');
            $data['sub_cat_name'] = $this->input->post('sub_cat_name');
            $data['sub_cat_desc'] = $this->input->post('sub_cat_desc');

            if($this->Subcategory_model->update_subcategory($id, $data))
            {
                $this->session->set_flashdata('success', 'Sub Category Updated Successfully.');
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('subcategory');

        }
        else {
            // display the update user form

            $this->data['subcategory_details'] = $this->Subcategory_model->get_subcategory($id);

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['categories'] = $this->Common_model->get_dropdown('ts_categories', 'category_id', 'category_name', '-- Select Category --');

            $this->data['sub_cat_name'] = array(
                'name'  => 'sub_cat_name',
                'id'    => 'sub_cat_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('sub_cat_name', $this->data['subcategory_details']->sub_cat_name),
                'required' => 'required'
            );
            $this->data['sub_cat_desc'] = array(
                'name'  => 'sub_cat_desc',
                'id'    => 'sub_cat_desc',
                'rows'  => '3',
                'cols'  => '10',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('sub_cat_desc', $this->data['subcategory_details']->sub_cat_desc),
            );
            
            // Load Page
            $this->data['meta_title'] = 'Update Sub Category';
            $this->data['subview'] = 'edit';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   delete
    Authur      :   Ismail
    Created     :   12-10-17
    ModifiedBy  :
    ModifiedDate:
    */
    // public function delete()
    // {
    //     $sub_cat_id = $_POST['sub_cat_id'];

    //     $this->Subcategory_model->delete_subcategory($sub_cat_id);

    //     echo 'Sub Category Deleted Successfully.';
    // }
    
    /*
    Name        :   get_sub_categories_by_category
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_sub_categories_by_category()
    {
        $category_id = $_POST['category_id'];

        $sub_categories = $this->Subcategory_model->get_subcategories_by_category($category_id);

        $result = $this->Common_model->get_dropdown2($sub_categories, 'sub_cat_id', 'sub_cat_name', '-- Select Sub Category --');

        echo $result;
    }

 

}