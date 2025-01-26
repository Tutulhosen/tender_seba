<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_settings extends Backend_Controller {

    /*
    Name        :   __construct
    Authur      :   Ismail
    Created     :   27-01-18
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

        $this->load->model('Package_settings_model');
    }
    
    /*
    Name        :   index
    Authur      :   Ismail
    Created     :   27-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function index()
    {
        
        $this->data['all_packages'] = $this->Package_settings_model->get_all_package(); 
        $this->data['meta_title'] = 'All Packages';
        $this->data['subview'] = 'index';
        $this->load->view('backend/_layout_main', $this->data);
    }
    
    /*
    Name        :   add
    Authur      :   Ismail
    Created     :   27-01-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function add()
    {
        
        // validate form input
        $this->form_validation->set_rules('pkg_name', 'Package Name', 'required|trim|is_unique[ts_packages.pkg_name]|max_length[30]');
        $this->form_validation->set_rules('pkg_duration', 'Package Duration', 'required|integer');
        $this->form_validation->set_rules('pkg_no_of_products', 'No of Products', 'required|integer');
        $this->form_validation->set_rules('pkg_price', 'Package Price', 'required|integer');
        $this->form_validation->set_rules('pkg_description', 'Package Description', 'max_length[100]');

        if ($this->form_validation->run() == true) {
          
            $data['pkg_name'] = $this->input->post('pkg_name');
            $data['pkg_duration'] = $this->input->post('pkg_duration');
            $data['pkg_no_of_products'] = $this->input->post('pkg_no_of_products');
            $data['pkg_price'] = $this->input->post('pkg_price');
            $data['pkg_description'] = $this->input->post('pkg_description');
            $data['pkg_created'] = date('Y-m-d H:i:s');

            if($pkg_id =$this->Common_model->create_with_return_id('ts_packages', $data))
            {
                $file_name=$pkg_id.'_'.time();
                $config['upload_path']      = './images/pkg/';
                $config['allowed_types']    = 'gif|jpg|png';
                $config['max_size']         = 5000;
                $config['max_width']        = 2024;
                $config['max_height']       = 2024;
                $config['file_name']        = $file_name;
                $this->load->library('upload', $config);

                if(! $this->upload->do_upload('tender_image'))
                {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>package Created Successfully but Image not uploaded! <br>' . $this->upload->display_errors() . '</div>');
                }
                else
                {
                    $tender_image_info = $this->upload->data();

                    $tender_img_data_arr = array();
                    $tender_img_data_arr['pkg_logo_path '] = base_url('images/pkg/') . $file_name . $tender_image_info['file_ext'];

                    $this->Common_model->edit('ts_packages', 'pkg_id', $pkg_id, $tender_img_data_arr);

                    $this->session->set_flashdata('success', 'Package Created Successfully.');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Failed! Please Try Again.');
            }

            redirect('package_settings');

        }
        else {
            // display the create supplier form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['pkg_name'] = array(
                'name'  => 'pkg_name',
                'id'    => 'pkg_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('pkg_name'),
                'required' => 'required'
            );
            $this->data['pkg_duration'] = array(
                'name'  => 'pkg_duration',
                'id'    => 'pkg_duration',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('pkg_duration'),
                'required' => 'required'
            );
            $this->data['pkg_no_of_products'] = array(
                'name'  => 'pkg_no_of_products',
                'id'    => 'pkg_no_of_products',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('pkg_no_of_products'),
                'required' => 'required'
            );
            $this->data['pkg_price'] = array(
                'name'  => 'pkg_price',
                'id'    => 'pkg_price',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('pkg_price'),
                'required' => 'required'
            );
            $this->data['pkg_description'] = array(
                'name'  => 'pkg_description',
                'id'    => 'pkg_description',
                'rows'  => '5',
                'cols'  => '5',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('pkg_description'),
                
            );
            
            // Load Page
            $this->data['meta_title'] = 'Create Package';
            $this->data['subview'] = 'add';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   edit
    Authur      :   Ismail
    Created     :   27-01-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function edit($id)
    {
        // validate form input
        $this->form_validation->set_rules('pkg_name', 'Package Name', 'trim|max_length[30]|callback_custom_validation_edit_pkg_name');
        $this->form_validation->set_rules('pkg_duration', 'Package Duration', 'required|integer');
        $this->form_validation->set_rules('pkg_no_of_products', 'No of Products', 'required|integer');
        $this->form_validation->set_rules('pkg_price', 'Package Price', 'required|integer');
        $this->form_validation->set_rules('pkg_description', 'Package Description', 'max_length[100]');

        if ($this->form_validation->run() == true) {
            $data['pkg_name'] = $this->input->post('pkg_name');
            $data['pkg_duration'] = $this->input->post('pkg_duration');
            $data['pkg_no_of_products'] = $this->input->post('pkg_no_of_products');
            $data['pkg_price'] = $this->input->post('pkg_price');
            $data['pkg_description'] = $this->input->post('pkg_description');
            $data['pkg_updated'] = date('Y-m-d H:i:s');

            if($this->Common_model->edit('ts_packages', 'pkg_id', $id, $data))
            {   
                $file_name=$id.'_'.time();
                $config['upload_path']      = './images/pkg/';
                $config['allowed_types']    = 'gif|jpg|png';
                $config['max_size']         = 5000;
                $config['max_width']        = 2024;
                $config['max_height']       = 2024;
                $config['file_name']        = $file_name;
                $this->load->library('upload', $config);

                if(! $this->upload->do_upload('tender_image'))
                {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>package Updated Successfully but Image not uploaded! <br>' . $this->upload->display_errors() . '</div>');
                }
                else
                {
                    $tender_image_info = $this->upload->data();

                    $tender_img_data_arr = array();
                    $tender_img_data_arr['pkg_logo_path '] = base_url('images/pkg/') . $file_name . $tender_image_info['file_ext'];

                    $this->Common_model->edit('ts_packages', 'pkg_id', $id, $tender_img_data_arr);

                    $this->session->set_flashdata('success', 'Package Updated Successfully.');
                }

            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('package_settings');

        }
        else {
            // display the update user form

            $this->data['package_details'] = $this->Common_model->get_single_row_by('ts_packages', 'pkg_id', $id);

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['pkg_name'] = array(
                'name'  => 'pkg_name',
                'id'    => 'pkg_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('pkg_name',$this->data['package_details']['pkg_name']),
                
            );
            $this->data['pkg_duration'] = array(
                'name'  => 'pkg_duration',
                'id'    => 'pkg_duration',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('pkg_duration',$this->data['package_details']['pkg_duration']),
                'required' => 'required'
            );
            $this->data['pkg_no_of_products'] = array(
                'name'  => 'pkg_no_of_products',
                'id'    => 'pkg_no_of_products',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('pkg_no_of_products',$this->data['package_details']['pkg_no_of_products']),
                'required' => 'required'
            );
            $this->data['pkg_price'] = array(
                'name'  => 'pkg_price',
                'id'    => 'pkg_price',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('pkg_price',$this->data['package_details']['pkg_price']),
                'required' => 'required'
            );

            $this->data['pkg_description'] = array(
                'name'  => 'pkg_description',
                'id'    => 'pkg_description',
                'rows'  => '5',
                'cols'  => '5',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('pkg_description',$this->data['package_details']['pkg_description']),
                
            );
            $this->data['pkg_id'] = array(
                'name'  => 'pkg_id',
                'id'    => 'pkg_id',
                'type'  => 'hidden',
                'value' => $this->form_validation->set_value('pkg_description',$this->data['package_details']['pkg_id']),
                
            );
            // Load Page
            $this->data['meta_title'] = 'Update package';
            $this->data['subview'] = 'edit';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   _is_unique_name
    Authur      :   Ismail
    Created     :   27-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function _is_unique_name($name, $id)
    {
        if($this->Common_model->check_unique_for_callback('ts_procurement_methods', 'pro_method_name', $name, 'pro_method_id', $id))
        {
            $this->form_validation->set_message('_is_unique_name', 'The Procurement Method field must contain a unique value.');
            return false;
        }

        return true;
    }
    public function custom_validation_edit_pkg_name($field_value){ 
        $id=$this->input->post('pkg_id');
       
        $is_name_conflict=$this->Package_settings_model->is_dublicate_pkg_by_name($field_value,$id);

        if ($is_name_conflict)
        {
        	$this->form_validation->set_message('custom_validation_edit_pkg_name', "dublicate name $field_value");
        	return FALSE;
        }
        else
        {
        	return TRUE;
        }
    }
}