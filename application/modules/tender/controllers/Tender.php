<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tender extends Backend_Controller {

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
        }elseif (!$this->ion_auth->is_admin() && !$this->ion_auth->is_setup_user()){
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You are not authorized to view this page.');
        }

        $this->load->model('Tender_model');
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
        $this->data['tenders'] = $this->Tender_model->get_all_tenders(); 
        
        $this->data['meta_title'] = 'All Tenders';
        $this->data['subview'] = 'index';
        $this->load->view('backend/_layout_main', $this->data);
    }
    
    /*
    Name        :   add
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :   Ismail
    ModifiedDate:   06-03-18
    */
    public function add()
    {
        // validate form input
        $this->form_validation->set_rules('tender_title', 'Tender Title', 'required|trim|is_unique[ts_tenders.tender_title]');  //03-03-18
        
        $this->form_validation->set_rules('tender_description', 'Tender Description', 'required|trim'); 

        $this->form_validation->set_rules('tender_manual_id', 'Tender ID', 'required|trim|is_unique[ts_tenders.tender_manual_id]|max_length[20]');
        $this->form_validation->set_rules('tender_doc_price', 'Doc Price', 'required|trim|max_length[100]');    //03-03-18
        $this->form_validation->set_rules('tender_security_amount', 'Security Amount', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('tender_published_on', 'Published On', 'required|trim');
        $this->form_validation->set_rules('tender_closed_on', 'Closed On', 'required|trim');
        $this->form_validation->set_rules('tender_closed_time', 'Closed Time', 'required|trim|max_length[8]');
        $this->form_validation->set_rules('tender_prebid_meeting', 'Pre-Bid Meeting', 'trim');
        $this->form_validation->set_rules('tender_opening', 'Opening Date', 'trim');    //04-03-18
        $this->form_validation->set_rules('tender_opening_time', 'Opening Time', 'trim|max_length[8]');    //04-03-18
        $this->form_validation->set_rules('tender_schedule_purchase', 'Schedule Purchase Date', 'trim');    //04-03-18
        $this->form_validation->set_rules('tender_sche_pur_time', 'Schedule Purchase Time', 'trim|max_length[8]');    //04-03-18
        $this->form_validation->set_rules('tender_inviter', 'Inviter', 'required|trim');
        $this->form_validation->set_rules('tender_source', 'Source', 'required|trim');
        $this->form_validation->set_rules('tender_division', 'Working Division', 'required|trim');
        $this->form_validation->set_rules('tender_district', 'Working District', 'required|trim');

        $this->form_validation->set_rules('tender_procuring_div', 'Procuring Division', 'trim'); //06-03-18
        $this->form_validation->set_rules('tender_procuring_dist', 'Procuring District', 'trim'); //06-03-18

        $this->form_validation->set_rules('tender_category', 'Category', 'required|trim');
        $this->form_validation->set_rules('tender_sub_category', 'Sub Category', 'required|trim');
        $this->form_validation->set_rules('tender_pro_method', 'Procurement Method', 'required|trim');
        $this->form_validation->set_rules('tender_call_type', 'Call Type', 'required|trim');
        $this->form_validation->set_rules('tender_on', 'Tender On', 'required|trim');
        $this->form_validation->set_rules('tender_bidding_type', 'Bidding Type', 'required|trim');

        if ($this->form_validation->run() == true) {
            $data = array();
            $data['tender_title'] = $this->input->post('tender_title');
            $data['tender_description'] = $this->input->post('tender_description');
            $data['tender_manual_id'] = $this->input->post('tender_manual_id');
            $data['tender_doc_price'] = $this->input->post('tender_doc_price');
            $data['tender_security_amount'] = $this->input->post('tender_security_amount');
            $data['tender_published_on'] = date('Y-m-d', strtotime($this->input->post('tender_published_on')));
            $data['tender_closed_on'] = date('Y-m-d', strtotime($this->input->post('tender_closed_on')));
            $data['tender_prebid_meeting'] = date('Y-m-d', strtotime($this->input->post('tender_prebid_meeting')));
            $data['tender_opening'] = date('Y-m-d', strtotime($this->input->post('tender_opening'))); //04-03-18
            $data['tender_opening_time'] = $this->input->post('tender_opening_time'); //04-03-18
            $data['tender_schedule_purchase'] = date('Y-m-d', strtotime($this->input->post('tender_schedule_purchase'))); //04-03-18
            $data['tender_sche_pur_time'] = $this->input->post('tender_sche_pur_time'); //04-03-18
            $data['tender_closed_time'] = $this->input->post('tender_closed_time');
            $data['tender_inviter'] = $this->input->post('tender_inviter');
            $data['tender_source'] = $this->input->post('tender_source');
            $data['tender_division'] = $this->input->post('tender_division');
            $data['tender_district'] = $this->input->post('tender_district');

            $data['tender_procuring_div'] = $this->input->post('tender_procuring_div'); //06-03-18
            $data['tender_procuring_dist'] = $this->input->post('tender_procuring_dist');  //06-03-18

            $data['tender_category'] = $this->input->post('tender_category');
            $data['tender_sub_category'] = $this->input->post('tender_sub_category');
            $data['tender_pro_method'] = $this->input->post('tender_pro_method');
            $data['tender_call_type'] = $this->input->post('tender_call_type');
            $data['tender_on'] = $this->input->post('tender_on');
            $data['tender_bidding_type'] = $this->input->post('tender_bidding_type');
            $data['tender_created'] = date('Y-m-d H:i:s');

            if($tender_id = $this->Common_model->create_with_return_id('ts_tenders', $data))
            {
                $file_name=$tender_id.'_'.time();
                $config['upload_path']      = './images/tender/';
                $config['allowed_types']    = 'gif|jpg|png';
                $config['max_size']         = 5000;
                $config['max_width']        = 2024;
                $config['max_height']       = 2024;
                $config['file_name']        = $file_name;

                $this->load->library('upload', $config);
                if(! $this->upload->do_upload('tender_image'))
                {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>Tender Created Successfully but Image not uploaded! <br>' . $this->upload->display_errors() . '</div>');
                }
                else
                {
                    $this->session->set_flashdata('success', 'Tender Created Successfully.');

                    $tender_image_info = $this->upload->data();

                    $tender_img_data_arr = array();
                    $tender_img_data_arr['tender_img_url'] = base_url('images/tender/') . $file_name . $tender_image_info['file_ext'];

                    $this->Common_model->edit('ts_tenders', 'tender_auto_id', $tender_id, $tender_img_data_arr);

                    //start transparent
                    // $stamp = imagecreatefrompng('./images/rokomari_tender_transparent.png');
                    // $im = imagecreatefromjpeg('./images/tender/' . $tender_id . $tender_image_info['file_ext']); 

                    // $sx = imagesx($stamp);
                    // $sy = imagesy($stamp);

                    // imagecopy($im, $stamp, imagesx($im) - $sx + 280, imagesy($im) - $sy + 130, 0, 0, imagesx($stamp), imagesy($stamp));

                    // header('Content-type: image/png');
                    // imagepng($im, './images/tender/' . $tender_id . $tender_image_info['file_ext']);
                    // imagedestroy($im);
                    // //end transparent
                    // exit;
                }
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('tender');

        }
        else {
            // display the create category form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['inviters'] = $this->Common_model->get_dropdown('ts_inviters', 'inviter_id', 'inviter_name', '-- Select Inviter --');
            
            $this->data['sources'] = $this->Common_model->get_dropdown('ts_sources', 'source_id', 'source_name', '-- Select Source --');
            
            $this->data['categories'] = $this->Common_model->get_dropdown('ts_categories', 'category_id', 'category_name', '-- Select Category --');

            if(($set_cat_value = $this->form_validation->set_value('tender_category')) != '')
            {
                $sub_cat_by_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $set_cat_value);
                $this->data['sub_categories'] = $this->Common_model->get_1dropdown($sub_cat_by_cat, 'sub_cat_id', 'sub_cat_name', '-- Select Sub Category --');
            }

            $this->data['divisions'] = $this->Common_model->get_dropdown('ts_divisions', 'division_id', 'division_name', '-- Select Working Division --');

            if(($set_div_value = $this->form_validation->set_value('tender_division')) != '')
            {
                $dis_by_div = $this->Common_model->get_data_by('ts_districts', 'division_id', $set_div_value);
                $this->data['districts'] = $this->Common_model->get_1dropdown($dis_by_div, 'district_id', 'district_name', '-- Select District --');
            }

            $this->data['procu_divisions'] = $this->Common_model->get_dropdown('ts_divisions', 'division_id', 'division_name', '-- Select Procuring Division --'); //06-03-18

            //06-03-18
            if(($set_prodiv_value = $this->form_validation->set_value('tender_procuring_div')) != '')
            {
                $dis_by_prodiv = $this->Common_model->get_data_by('ts_districts', 'division_id', $set_prodiv_value);
                $this->data['procu_districts'] = $this->Common_model->get_1dropdown($dis_by_prodiv, 'district_id', 'district_name', '-- Select Procuring District --');
            }

            $this->data['pro_methods'] = $this->Common_model->get_dropdown('ts_procurement_methods', 'pro_method_id', 'pro_method_name', '-- Select Procurement Method --');

            $this->data['tender_title'] = array(
                'name'  => 'tender_title',
                'id'    => 'tender_title',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tender_title'),
                'required' => 'required'
            );
            $this->data['tender_description'] = array(
                'name'  => 'tender_description',
                'id'    => 'tender_description',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tender_description'),
                'required' => 'required'
            );

            $this->data['tender_manual_id'] = array(
                'name'  => 'tender_manual_id',
                'id'    => 'tender_manual_id',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tender_manual_id'),
                'required' => 'required'
            );
            $this->data['tender_doc_price'] = array(
                'name'  => 'tender_doc_price',
                'id'    => 'tender_doc_price',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tender_doc_price'),
                'required' => 'required'
            );
            $this->data['tender_security_amount'] = array(
                'name'  => 'tender_security_amount',
                'id'    => 'tender_security_amount',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tender_security_amount'),
                'required' => 'required'
            );
            $this->data['tender_closed_time'] = array(
                'name'  => 'tender_closed_time',
                'id'    => 'tender_closed_time',
                'type'  => 'text',
                'class' => 'form-control',
                'placeholder' => '12:00 pm',
                'value' => $this->form_validation->set_value('tender_closed_time'),
                'required' => 'required'
            );
            //04-03-18
            $this->data['tender_opening_time'] = array(
                'name'  => 'tender_opening_time',
                'id'    => 'tender_opening_time',
                'type'  => 'text',
                'class' => 'form-control',
                'placeholder' => '12:00 pm',
                'value' => $this->form_validation->set_value('tender_opening_time')
            );
            //04-03-18
            $this->data['tender_sche_pur_time'] = array(
                'name'  => 'tender_sche_pur_time',
                'id'    => 'tender_sche_pur_time',
                'type'  => 'text',
                'class' => 'form-control',
                'placeholder' => '12:00 pm',
                'value' => $this->form_validation->set_value('tender_sche_pur_time')
            );
            
            // Load Page
            $this->data['meta_title'] = 'Create Tender';
            $this->data['subview'] = 'add';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   edit
    Authur      :   Ismail
    Created     :   24-01-18
    ModifiedBy  :   Ismail
    ModifiedDate:   04-03-18
    */
    public function edit($id)
    {
      
        // validate form input
        $this->form_validation->set_rules('tender_title', 'Tender Title', 'required|trim|callback__is_unique_title['. $id .']');    //03-03-18
        $this->form_validation->set_rules('tender_manual_id', 'Tender ID', 'required|trim|callback__is_unique_manual_id['. $id .']|max_length[20]');
        
        $this->form_validation->set_rules('tender_description', 'Tender Description', 'required'); 

        $this->form_validation->set_rules('tender_doc_price', 'Doc Price', 'required|trim|max_length[100]');     //03-03-18
        $this->form_validation->set_rules('tender_security_amount', 'Security Amount', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('tender_published_on', 'Published On', 'required|trim');
        $this->form_validation->set_rules('tender_closed_on', 'Closed On', 'required|trim');
        $this->form_validation->set_rules('tender_closed_time', 'Closed Time', 'required|trim|max_length[8]');
        $this->form_validation->set_rules('tender_prebid_meeting', 'Pre-Bid Meeting', 'trim');
        $this->form_validation->set_rules('tender_opening', 'Opening Date', 'trim');    //04-03-18
        $this->form_validation->set_rules('tender_opening_time', 'Opening Time', 'trim|max_length[8]');    //04-03-18
        $this->form_validation->set_rules('tender_schedule_purchase', 'Schedule Purchase Date', 'trim');    //04-03-18
        $this->form_validation->set_rules('tender_sche_pur_time', 'Schedule Purchase Time', 'trim|max_length[8]');    //04-03-18

        $this->form_validation->set_rules('tender_inviter', 'Inviter', 'required|trim');
        $this->form_validation->set_rules('tender_source', 'Source', 'required|trim');
        $this->form_validation->set_rules('tender_division', 'Working Division', 'required|trim');
        $this->form_validation->set_rules('tender_district', 'Working District', 'required|trim');

        $this->form_validation->set_rules('tender_procuring_div', 'Procuring Division', 'trim'); //06-03-18
        $this->form_validation->set_rules('tender_procuring_dist', 'Procuring District', 'trim'); //06-03-18

        $this->form_validation->set_rules('tender_category', 'Category', 'required|trim');
        $this->form_validation->set_rules('tender_sub_category', 'Sub Category', 'required|trim');
        $this->form_validation->set_rules('tender_pro_method', 'Procurement Method', 'required|trim');
        $this->form_validation->set_rules('tender_call_type', 'Call Type', 'required|trim');
        $this->form_validation->set_rules('tender_on', 'Tender On', 'required|trim');
        $this->form_validation->set_rules('tender_bidding_type', 'Tender Bidding Type', 'required|trim');

        if ($this->form_validation->run() == true) {
            $data = array();
            $data['tender_title'] = $this->input->post('tender_title');
            $data['tender_description'] = $this->input->post('tender_description');
            $data['tender_manual_id'] = $this->input->post('tender_manual_id');
            $data['tender_doc_price'] = $this->input->post('tender_doc_price');
            $data['tender_security_amount'] = $this->input->post('tender_security_amount');
            $data['tender_published_on'] = date('Y-m-d', strtotime($this->input->post('tender_published_on')));
            $data['tender_closed_on'] = date('Y-m-d', strtotime($this->input->post('tender_closed_on')));
            $data['tender_closed_time'] = $this->input->post('tender_closed_time');
            $data['tender_prebid_meeting'] = date('Y-m-d', strtotime($this->input->post('tender_prebid_meeting')));
            $data['tender_opening'] = date('Y-m-d', strtotime($this->input->post('tender_opening'))); //04-03-18
            $data['tender_opening_time'] = $this->input->post('tender_opening_time'); //04-03-18
            $data['tender_schedule_purchase'] = date('Y-m-d', strtotime($this->input->post('tender_schedule_purchase'))); //04-03-18
            $data['tender_sche_pur_time'] = $this->input->post('tender_sche_pur_time'); //04-03-18
            
            $data['tender_inviter'] = $this->input->post('tender_inviter');
            $data['tender_source'] = $this->input->post('tender_source');
            $data['tender_division'] = $this->input->post('tender_division');
            $data['tender_district'] = $this->input->post('tender_district');

            $data['tender_procuring_div'] = $this->input->post('tender_procuring_div'); //06-03-18
            $data['tender_procuring_dist'] = $this->input->post('tender_procuring_dist'); //06-03-18

            $data['tender_category'] = $this->input->post('tender_category');
            $data['tender_sub_category'] = $this->input->post('tender_sub_category');
            $data['tender_pro_method'] = $this->input->post('tender_pro_method');
            $data['tender_call_type'] = $this->input->post('tender_call_type');
            $data['tender_on'] = $this->input->post('tender_on');
            $data['tender_bidding_type'] = $this->input->post('tender_bidding_type');

            $this->Tender_model->backup_tender_before_update($id);

            if($this->Common_model->edit('ts_tenders', 'tender_auto_id', $id, $data))
            { 
                $file_name=$id.'_'.time();
                $config['upload_path']      = './images/tender/';
                $config['allowed_types']    = 'gif|jpg|png';
                $config['max_size']         = 5000;
                $config['max_width']        = 2024;
                $config['max_height']       = 2024;
                $config['file_name']        = $file_name;
                $config['overwrite']        = true;

                $this->load->library('upload', $config);
                if(! $this->upload->do_upload('tender_image'))
                {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>Tender Updated Successfully but Image not uploaded! <br>' . $this->upload->display_errors() . '</div>');
                }
                else
                {
                    $this->session->set_flashdata('success', 'Tender Updated Successfully.');

                    $tender_image_info = $this->upload->data();

                    $tender_img_data_arr = array();
                    $tender_img_data_arr['tender_img_url'] = base_url('images/tender/') . $file_name . $tender_image_info['file_ext'];

                    $this->Common_model->edit('ts_tenders', 'tender_auto_id', $id, $tender_img_data_arr);


                    //start transparent
                    // $stamp = imagecreatefrompng('./images/rokomari_tender_transparent.png');
                    // $im = imagecreatefromjpeg('./images/tender/' . $id . $tender_image_info['file_ext']); 

                    // $sx = imagesx($stamp);
                    // $sy = imagesy($stamp);

                    // imagecopy($im, $stamp, imagesx($im) - $sx + 280, imagesy($im) - $sy + 130, 0, 0, imagesx($stamp), imagesy($stamp));

                    // header('Content-type: image/png');
                    // imagepng($im, './images/tender/' . $id . $tender_image_info['file_ext']);
                    // imagedestroy($im);
                    // //end transparent
                }
            }
            else
            {
                $this->session->set_flashdata('success', 'Failed! Please Try Again.');
            }

            redirect('tender');

        }
        else {
            // display the update user form

            $this->data['tender_details'] = $this->Tender_model->get_tender_details($id);
            
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : '');

            $this->data['inviters'] = $this->Common_model->get_dropdown('ts_inviters', 'inviter_id', 'inviter_name', '-- Select Inviter --');
            
            $this->data['sources'] = $this->Common_model->get_dropdown('ts_sources', 'source_id', 'source_name', '-- Select Source --');
            
            $this->data['categories'] = $this->Common_model->get_dropdown('ts_categories', 'category_id', 'category_name', '-- Select Category --');

            $sub_cat_by_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $this->data['tender_details']->tender_category);
            $this->data['sub_categories'] = $this->Common_model->get_1dropdown($sub_cat_by_cat, 'sub_cat_id', 'sub_cat_name', '-- Select Sub Category --');

            $this->data['divisions'] = $this->Common_model->get_dropdown('ts_divisions', 'division_id', 'division_name', '-- Select Division --');

            $dis_by_div = $this->Common_model->get_data_by('ts_districts', 'division_id', $this->data['tender_details']->tender_division);
            $this->data['districts'] = $this->Common_model->get_1dropdown($dis_by_div, 'district_id', 'district_name', '-- Select District --');

            $this->data['procu_divisions'] = $this->Common_model->get_dropdown('ts_divisions', 'division_id', 'division_name', '-- Select Procuring Division --'); //06-03-18

            $dis_by_prodiv = $this->Common_model->get_data_by('ts_districts', 'division_id', $this->data['tender_details']->tender_procuring_div); //06-03-18
            $this->data['procu_districts'] = $this->Common_model->get_1dropdown($dis_by_prodiv, 'district_id', 'district_name', '-- Select Procuring District --'); //06-03-18

            $this->data['pro_methods'] = $this->Common_model->get_dropdown('ts_procurement_methods', 'pro_method_id', 'pro_method_name', '-- Select Procurement Method --');

            $this->data['tender_title'] = array(
                'name'  => 'tender_title',
                'id'    => 'tender_title',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tender_title', $this->data['tender_details']->tender_title),
                'required' => 'required'
            );
            $this->data['tender_description'] = array(
                'name'  => 'tender_description',
                'id'    => 'tender_description',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tender_description', $this->data['tender_details']->tender_description),
                'required' => 'required'
            );
            $this->data['tender_manual_id'] = array(
                'name'  => 'tender_manual_id',
                'id'    => 'tender_manual_id',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tender_manual_id', $this->data['tender_details']->tender_manual_id),
                'required' => 'required'
            );
            $this->data['tender_doc_price'] = array(
                'name'  => 'tender_doc_price',
                'id'    => 'tender_doc_price',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tender_doc_price', $this->data['tender_details']->tender_doc_price),
                'required' => 'required'
            );
            $this->data['tender_security_amount'] = array(
                'name'  => 'tender_security_amount',
                'id'    => 'tender_security_amount',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tender_security_amount', $this->data['tender_details']->tender_security_amount),
                'required' => 'required'
            );
            $this->data['tender_closed_time'] = array(
                'name'  => 'tender_closed_time',
                'id'    => 'tender_closed_time',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tender_closed_time', $this->data['tender_details']->tender_closed_time),
                'required' => 'required'
            );
            //04-03-18
            $this->data['tender_opening_time'] = array(
                'name'  => 'tender_opening_time',
                'id'    => 'tender_opening_time',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tender_opening_time', $this->data['tender_details']->tender_opening_time)
            );
            //04-03-18
            $this->data['tender_sche_pur_time'] = array(
                'name'  => 'tender_sche_pur_time',
                'id'    => 'tender_sche_pur_time',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tender_sche_pur_time', $this->data['tender_details']->tender_sche_pur_time)
            );
            
            // Load Page
            $this->data['meta_title'] = 'Update Tender';
            $this->data['subview'] = 'edit';
            $this->load->view('backend/_layout_main', $this->data);
        }
    }
    
    /*
    Name        :   _is_unique_title
    Authur      :   Ismail
    Created     :   24-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function _is_unique_title($title, $id)
    {
        if($this->Tender_model->check_unique_value('tender_title', $title, $id))
        {
            $this->form_validation->set_message('_is_unique_title', 'The Tender Title field must contain a unique value.');
            return false;
        }

        return true;
    }
    
    /*
    Name        :   _is_unique_manual_id
    Authur      :   Ismail
    Created     :   24-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function _is_unique_manual_id($manual_id, $id)
    {
        if($this->Tender_model->check_unique_value('tender_manual_id', $manual_id, $id))
        {
            $this->form_validation->set_message('_is_unique_manual_id', 'The Tender ID field must contain a unique value.');
            return false;
        }

        return true;
    }
    
    /*
    Name        :   details
    Authur      :   Ismail
    Created     :   24-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function details($id)
    {
        $this->data['tender_details'] = $this->Tender_model->get_tender_details($id); 
        
        $this->data['meta_title'] = 'Tender Details';
        $this->data['subview'] = 'details';
        $this->load->view('backend/_layout_main', $this->data);
    }

 

}