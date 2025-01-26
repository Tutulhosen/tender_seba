<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends Frontend_Controller {

	function __construct (){
		parent::__construct();
        $this->load->model('Site_model');
        $this->load->model('Common_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning"> <i class="fa fa-warning"></i> ', '</div>');

        $this->config->load('pagination');
        $this->load->library('pagination');
	}


    /*
    Name        :   index
    Authur      :   Ismail
    Created     :   12-02-18
    ModifiedBy  :   Ismail
    ModifiedDate:   10-04-18
    */
    // public function index($page = 0, $header_view = null, $international_tender = false)
    public function index($page = 0, $international_tender = false)
    {
        if(!$this->ion_auth->logged_in() && $page != 0)
        {
            redirect('user-login');
        }
        else if($this->ion_auth->logged_in())   //08-03-18
        {
            $user_id = $this->session->userdata('user_id');

            $fav_tens = $this->Common_model->get_data_by('ts_user_fav_ten_list', 'ufav_user_id', $user_id);
            $user_fav_ten_arr = array();
            foreach($fav_tens as $value)
            {
                array_push($user_fav_ten_arr, $value->ufav_tender_id);
            }

            $this->data['favorite_tenders'] = $user_fav_ten_arr;
        }
        
        $this->data['srch_prd'] = '';
        $this->data['srch_invtr'] = '';
        $this->data['srch_workarea'] = '';
        $this->data['srch_new'] = '';

        $this->data['stat_tender'] = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 1));
        $this->data['stat_corrigendum'] = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 2));
        $this->data['stat_cancellation'] = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 3));
        $this->data['stat_republished'] = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 4));

        $config = $this->config->item('pagination');
        $config['base_url'] = base_url('site/index');
        $config['total_rows'] = $this->Site_model->get_home_page_total_rows();
        $config['per_page'] = 7;

        $this->pagination->initialize($config);
        
        $this->data['pagination_link'] = $this->pagination->create_links();

        if($international_tender)   //03-04-18
        {
            $this->data['tenders'] = $this->Site_model->get_home_page_basic_tender($config['per_page'], $page, $international_tender);
        }
        else
        {
            $this->data['tenders'] = $this->Site_model->get_home_page_basic_tender($config['per_page'], $page);
        }

        $this->data['all_sub_categories'] = $this->Common_model->get_data('ts_sub_categories');
        $this->data['all_categories'] = $this->Common_model->get_data('ts_categories', 'category_name', 'ASC');    //add order 08-03-18
        
        $this->data['all_inviters'] = $this->Common_model->get_data('ts_inviters');
        $this->data['all_districs'] = $this->Common_model->get_data('ts_districts');


        $this->data['total_tender'] = $config['total_rows'];

        // $this->data['header_view'] = $header_view;  //03-04-18

        if($international_tender)   //03-04-18
        {
            $this->data['meta_title'] = 'International Tender - Rokomari Tender';
        }
        else
        {
            $this->data['meta_title'] = 'Rokomari Tender';
        }

        $this->data['subview'] = 'index';
        $this->load->view('frontend/_layout_main', $this->data);
    }


    /*
    Name        :   show_image
    Authur      :   Ismail
    Created     :   12-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function show_image($tender_id)
    {
        $this->data['tender_details'] = $this->Site_model->get_tender_details($tender_id);

        $this->data['meta_title'] = 'Image - Rokomari Tender';
        $this->data['subview'] = 'show_image';
        $this->load->view('frontend/_layout_head2', $this->data);
    }


    /*
    Name        :   show_details
    Authur      :   Ismail
    Created     :   13-02-18
    ModifiedBy  :   Ismail
    ModifiedDate:   06-03-18
    */
    public function show_details($tender_id)
    {
        //increament tender view
        $this->Site_model->tender_view_increment($tender_id);

        $this->data['tender_details'] = $this->Site_model->get_tender_details($tender_id);
        
        $sche_pur_remain_days = (strtotime($this->data['tender_details']->tender_schedule_purchase) - strtotime(date('Y-m-d'))) / (60*60*24);

        if($sche_pur_remain_days <= 0)
        {
            $this->data['sche_pur_date_days_time'] = date('d-m-Y', strtotime($this->data['tender_details']->tender_schedule_purchase));
        }
        else
        {
            $this->data['sche_pur_date_days_time'] =  date('d-m-Y', strtotime($this->data['tender_details']->tender_schedule_purchase)) . ' (' . $sche_pur_remain_days . ' more days)';
        }

        if($this->data['tender_details']->tender_sche_pur_time != '')
        {
            $this->data['sche_pur_date_days_time'] .= ' at ' . $this->data['tender_details']->tender_sche_pur_time;
        }

        // opening
        $opening_remain_days = (strtotime($this->data['tender_details']->tender_opening) - strtotime(date('Y-m-d'))) / (60*60*24);

        if($opening_remain_days <= 0)
        {
            $this->data['opening_date_days_time'] = date('d-m-Y', strtotime($this->data['tender_details']->tender_opening));
        }
        else
        {
            $this->data['opening_date_days_time'] =  date('d-m-Y', strtotime($this->data['tender_details']->tender_opening)) . ' (' . $opening_remain_days . ' more days)';
        }

        if($this->data['tender_details']->tender_opening_time != '')
        {
            $this->data['opening_date_days_time'] .= ' at ' . $this->data['tender_details']->tender_opening_time;
        }

        $this->data['meta_title'] = 'Details - Rokomari Tender';
        $this->data['subview'] = 'show_details';
        $this->load->view('frontend/_layout_head2', $this->data);
    }


    /*
    Name        :   search_filter
    Authur      :   Ismail
    Created     :   12-02-18
    ModifiedBy  :   Ismail
    ModifiedDate:   10-04-18
    */
    public function search_filter($srch_sub_cat, $srch_invtr, $srch_workarea, $srch_new, $page = 0)
    {
        //10-04-18
        if(!$this->ion_auth->logged_in() && $page != 0)
        {
            redirect('user-login');
        }
        else if($this->ion_auth->logged_in())
        {
            $user_id = $this->session->userdata('user_id');

            $fav_tens = $this->Common_model->get_data_by('ts_user_fav_ten_list', 'ufav_user_id', $user_id);
            $user_fav_ten_arr = array();
            foreach($fav_tens as $value)
            {
                array_push($user_fav_ten_arr, $value->ufav_tender_id);
            }

            $this->data['favorite_tenders'] = $user_fav_ten_arr;
        }

        $this->data['stat_tender'] = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 1));
        $this->data['stat_corrigendum'] = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 2));
        $this->data['stat_cancellation'] = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 3));
        $this->data['stat_republished'] = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 4));

        $config = $this->config->item('pagination');
        $config['base_url'] = base_url('site/search_filter/' . $srch_sub_cat . '/' . $srch_invtr . '/' . $srch_workarea . '/' . $srch_new);
        $config['total_rows'] = $this->Site_model->get_search_filter_total_rows($srch_sub_cat, $srch_invtr, $srch_workarea);
        $config['per_page'] = 5;

        $this->pagination->initialize($config);
        
        $this->data['pagination_link'] = $this->pagination->create_links();

        $this->data['tenders'] = $this->Site_model->get_search_filter_tender($config['per_page'], $page, $srch_sub_cat, $srch_invtr, $srch_workarea, $srch_new);

        $this->data['srch_prd'] = $srch_sub_cat;
        $this->data['srch_invtr'] = $srch_invtr;
        $this->data['srch_workarea'] = $srch_workarea;
        $this->data['srch_new'] = $srch_new;

        $this->data['all_sub_categories'] = $this->Common_model->get_data('ts_sub_categories');
        $this->data['all_inviters'] = $this->Common_model->get_data('ts_inviters');
        $this->data['all_districs'] = $this->Common_model->get_data('ts_districts');

        $this->data['all_categories'] = $this->Common_model->get_data('ts_categories', 'category_name', 'ASC'); //add order 08-03-18

        $this->data['total_tender'] = $config['total_rows'];

        $this->data['meta_title'] = 'Rokomari Tender';
        $this->data['subview'] = 'index';
        $this->load->view('frontend/_layout_main', $this->data);

    }


    /*
    Name        :   get_tree
    Authur      :   Ismail
    Created     :   14-02-18
    ModifiedBy  :   Ismail
    ModifiedDate:   03-03-18
    */
    public function get_tree($treeid)
    {
        $output = '';

        if($treeid == 1)
        {
            $tree_element = $this->Common_model->get_data('ts_categories');

            foreach($tree_element as $value)
            {
                $output .= '<li class="hover-color-change" id="tree_branch'. $value->category_id .'" >';
                $output .= '<i class="fa fa-plus-square fa-fw"></i>' . $value->category_name;
                $output .= '<ul style="display: none; padding-left: 5%; font-size: 12px;">';

                $cat_sub_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $value->category_id);
                foreach($cat_sub_cat as $subcatRow)
                {
                    $output .= '<li class="list-unstyled" onclick="get_tender_by_left_tree('. $subcatRow->sub_cat_id .', \'sub_cat\')"><i class="fa fa-angle-right fa-fw"></i>'. $subcatRow->sub_cat_name .'</li>';
                }

                $output .= '</ul>';
                $output .= '</li>';
            }
        }
        else if($treeid == 2)
        {
            //at first only government inviter will show.   //030318
            $tree_element = $this->Common_model->get_data_by('ts_inviters', 'inviter_type', 2);

            foreach($tree_element as $value)
            {
                $output .= '<li class="hover-color-change" id="tree_branch_inviter'. $value->inviter_id .'" onclick="get_tender_by_left_tree('. $value->inviter_id .', \'inviter\')" >';
                $output .= '<i class="fa fa-minus-square fa-fw"></i>' . $value->inviter_name;
                $output .= '</li>';
            }
        }
        else if($treeid == 3)
        {
            $tree_element = $this->Common_model->get_data('ts_sources');

            foreach($tree_element as $value)
            {
                $output .= '<li class="hover-color-change" id="tree_branch_source'. $value->source_id .'" onclick="get_tender_by_left_tree('. $value->source_id .', \'source\')" >';
                $output .= '<i class="fa fa-minus-square fa-fw"></i>' . $value->source_name;
                $output .= '</li>';
            }
        }
        else if($treeid == 4)
        {
            $tree_element = $this->Common_model->get_data('ts_divisions');

            foreach($tree_element as $value)
            {
                $output .= '<li class="hover-color-change" id="tree_branch_location'. $value->division_id .'" >';
                $output .= '<i class="fa fa-plus-square fa-fw"></i>' . $value->division_name;
                $output .= '<ul style="display: none; padding-left: 5%;">';

                $div_district = $this->Common_model->get_data_by('ts_districts', 'division_id', $value->division_id);
                foreach($div_district as $div_dis_value)
                {
                    $output .= '<li class="list-unstyled" onclick="get_tender_by_left_tree('. $div_dis_value->district_id .', \'location\')" ><i class="fa fa-angle-right fa-fw"></i>'. $div_dis_value->district_name .'</li>';
                }

                $output .= '</ul>';
                $output .= '</li>';
            }
        }

        echo $output;
    }


    /*
    Name        :   get_tender_by_left_tree
    Authur      :   Ismail
    Created     :   14-02-18
    ModifiedBy  :   Ismail
    ModifiedDate:   08-03-18
    */
    public function get_tender_by_left_tree($id, $search_by)
    {
        $tenders = $this->Site_model->get_tender_by($id, $search_by);

        if($this->ion_auth->logged_in())   //08-03-18
        {
            $user_id = $this->session->userdata('user_id');

            $fav_tens = $this->Common_model->get_data_by('ts_user_fav_ten_list', 'ufav_user_id', $user_id);
            $user_fav_ten_arr = array();
            foreach($fav_tens as $value)
            {
                array_push($user_fav_ten_arr, $value->ufav_tender_id);
            }

            // $this->data['favorite_tenders'] = $user_fav_ten_arr;
        }
        
        $output = '';
        foreach($tenders as $value)
        {
            $output .= '<div class="content-2" style="background-color: #f3f3f3; border:1px solid #dfdfdf;">
                          <p class="h6 px-3 pt-3" id="tender_title'. $value->tender_auto_id .'">';
            
            if($this->ion_auth->logged_in() && in_array($value->tender_auto_id, $user_fav_ten_arr))
            {
                $output .= '<i class="fa fa-star" style="color: #ff0000;"></i> ';
            }

            $output .= $value->tender_title . '</p>
                          <div class="text-justify px-3 py-1">
                            <div class="row">
                              <div class="col-md-2">Tender ID</div>
                              <div class="col-md-10">: ' . $value->tender_manual_id . '</div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">Type</div>
                              <div class="col-md-10">: ' . $value->pro_method_name . '</div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">Inviter</div>
                              <div class="col-md-10">: ' . $value->inviter_name . '</div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">Doc. Price</div>
                              <div class="col-md-10">: ' . $value->tender_doc_price . '</div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">Sec. Amnt</div>
                              <div class="col-md-10">: ' . $value->tender_security_amount . '</div>
                            </div>
                            
                            <p class="pt-"></p>
                            <div class="float-right " style="margin-left: 10px; background-color: #ADD8E6; height: 30px;" title="Tender Viewed"> &nbsp;<strong>' . $value->tender_view . '</strong> &nbsp; </div>
                            <button class="btn float-right btn-sm border" onclick="show_details(' . $value->tender_auto_id . ')"><span title="Show Details"><i class="fa fa-info-circle" style="color: #00c0ef;"></i></span></button>';

            if($this->ion_auth->logged_in())
            {
                $output .=  '<button class=" mx-2 btn float-right btn-sm border" id="favcaticon' . $value->tender_auto_id . '" onclick="addorremvfavcat(' . $value->tender_auto_id . ')" title="Add to favorite" >';

            if(in_array($value->tender_auto_id, $user_fav_ten_arr))
                $output .= '<i class="fa fa-times" style="color: #ff0000;"></i></button>';
            else
                $output .= '<i class="fa fa-star" style="color: #ff0000;"></i></button>'; 
            }

            $output .=     '<p class="pt-4"></p>
                            <hr class="mt-3">
                          </div>
                          <div class="row pb-3">
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                              <p class="font-weight-normal px-3">Image: <a href="'. base_url('site/show_image/' . $value->tender_auto_id) . '" target="_blank"><i class="fa fa-image fa-fw pl-5"></i></a></p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                              <p class="font-weight-normal px-3">Published On: ' . date('d-m-Y', strtotime($value->tender_published_on)) . '</p>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                              <p class="font-weight-normal px-3">Closed On:  ' . date('d-m-Y', strtotime($value->tender_closed_on)) . '</p>
                            </div>
                          </div>  
                        </div>
                        <p class="py-1"></p>';
        }

        if($output == '')
        {
            //03-03-18
            $output .= '<span style="color: red;">No Tender Found!</span>';
        }

        $response = array(
            'total_tender' => sizeof($tenders),
            'result' => $output
        );

        echo json_encode($response);
    }


    /*
    Name        :   get_inviter_by_type
    Authur      :   Ismail
    Created     :   03-03-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_inviter_by_type($type)
    {        
        $tree_element = $this->Common_model->get_data_by('ts_inviters', 'inviter_type', $type);

        $output = '';
        foreach($tree_element as $value)
        {
            $output .= '<li class="hover-color-change" id="tree_branch_inviter'. $value->inviter_id .'" onclick="get_tender_by_left_tree('. $value->inviter_id .', \'inviter\')" >';
            $output .= '<i class="fa fa-minus-square fa-fw"></i>' . $value->inviter_name;
            $output .= '</li>';
        }

        echo $output;
    }


    /*
    Name        :   get_category_by_search_term
    Authur      :   Ismail
    Created     :   03-03-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_category_by_search_term($search_term)
    {
        $output = '';

        if($search_term == '')
        {
            $tree_element = $this->Common_model->get_data('ts_categories');
        }
        else
        {
            $tree_element = $this->Site_model->get_cat_by_search_term($search_term);
        }

        foreach($tree_element as $value)
        {
            $sub_tree_element = $this->Site_model->get_subcat_by_cat_and_search_term($value->category_id, $search_term);
            if(!empty($sub_tree_element))
            {
                $output .= '<li class="curpoint" id="tree_branch'. $value->category_id .'">';
                $output .= '<i class="fa fa-plus-square fa-fw"></i><span style="background-color: #32CD32;">' . $value->category_name . '</span>';
                $output .= '<ul style="display: block; padding-left: 5%; font-size: 12px;">';
            }
            else
            {
                $output .= '<li class="hover-color-change" id="tree_branch'. $value->category_id .'" >';
                $output .= '<i class="fa fa-plus-square fa-fw"></i>' . $value->category_name;
                $output .= '<ul style="display: none; padding-left: 5%; font-size: 12px;">';
            }

            $cat_sub_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $value->category_id);
            foreach($cat_sub_cat as $subcatRow)
            {
                if(stripos($subcatRow->sub_cat_name, $search_term) !== FALSE)
                {
                    $output .= '<li class="list-unstyled" onclick="get_tender_by_left_tree('. $subcatRow->sub_cat_id .', \'sub_cat\')" style="background-color: #32CD32;"><i class="fa fa-angle-right fa-fw"></i>'. $subcatRow->sub_cat_name .'</li>';
                }
                else
                {
                    $output .= '<li class="list-unstyled" onclick="get_tender_by_left_tree('. $subcatRow->sub_cat_id .', \'sub_cat\')"><i class="fa fa-angle-right fa-fw"></i>'. $subcatRow->sub_cat_name .'</li>';
                }
            }

            $output .= '</ul>';
            $output .= '</li>';
        }

        if($output == '')
        {
            $output .= '<span style="color: red;">No Product Found!</span>';
        }
        echo $output;
    }


    /*
    Name        :   advance_search
    Authur      :   Ismail
    Created     :   08-03-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function advance_search()
    {
        $this->data['all_categories'] = $this->Common_model->get_data('ts_categories', 'category_name', 'ASC'); 

        $this->data['procuring_place'] = $this->Common_model->get_dropdown('ts_districts', 'district_id', 'district_name', '-- Procuring Place --', 'district_name', 'ASC');

        $this->data['working_area'] = $this->Common_model->get_dropdown('ts_districts', 'district_id', 'district_name', '-- Working Area --', 'district_name', 'ASC');

        $this->data['source'] = $this->Common_model->get_dropdown('ts_sources', 'source_id', 'source_name', '-- Source --', 'source_name', 'ASC');

        
        $this->data['meta_title'] = 'Advance Search - Rokomari Tender';
        $this->data['subview'] = 'advance_search';
        $this->load->view('frontend/_layout_head2', $this->data);
    }


    /*
    Name        :   get_advance_search_result
    Authur      :   Ismail
    Created     :   10-03-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_advance_search_result()
    {
        $inv = $_POST['inviter'];
        $pro_place = $_POST['procuring_place'];

        $inv_type = array();
        if(!empty($_POST['inviter_type']))
        {
            foreach($_POST['inviter_type'] as $value)
                array_push($inv_type, $value);
        }

        $ten_type = array();
        if(!empty($_POST['tender_type']))
        {
            foreach($_POST['tender_type'] as $value)
            array_push($ten_type, $value);
        }

        $call_type = array();
        if(!empty($_POST['call_type']))
        {
            foreach($_POST['call_type'] as $value)
            array_push($call_type, $value);
        }

        $ten_on = array();
        if(!empty($_POST['tender_on']))
        {
            foreach($_POST['tender_on'] as $value)
            array_push($ten_on, $value);
        }      

        $bid_type = array();
        if(!empty($_POST['bidding_type']))
        {
            foreach($_POST['bidding_type'] as $value)
            array_push($bid_type, $value);
        }

        $work_area = $_POST['working_area'];
        $source = $_POST['source'];
        $search_by = $_POST['search_by_date'];
        $date_1 = $_POST['date_1'];
        $date_2 = $_POST['date_2'];

        if($inv == '' && empty($inv_type) && empty($ten_type) && empty($call_type) && $pro_place == '' && empty($ten_on) && empty($bid_type) && $work_area == '' && $source == '' && $date_1 == '' && $date_2 == '')
        {
            $response = array(
                'total_tender' => -1,
                'result' => '<span style="color: red;">No search criteria given!</span>'
            );
        }
        else
        {
            $tenders = $this->Site_model->get_tenders_by_search_criteria($inv, $inv_type, $ten_type, $call_type, $pro_place, $ten_on, $bid_type, $work_area, $source, $search_by, $date_1, $date_2);
            // $last_query = $this->db->last_query();

            if($this->ion_auth->logged_in())
            {
                $user_fav_ten_arr = $this->get_user_favorite_tender_array();
            }
            else
            {
                $user_fav_ten_arr = array();
            }

            $output = $this->generate_output_by_tenders($tenders, $user_fav_ten_arr);

            $response = array(
                'total_tender' => sizeof($tenders),
                'result' => $output
            );
        }

        echo json_encode($response);
    }
    //end - get_advance_search_result


    /*
    Name        :   get_user_favorite_tender_array
    Authur      :   Ismail
    Created     :   10-03-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_user_favorite_tender_array()
    {
        $user_id = $this->session->userdata('user_id');

        $fav_tens = $this->Common_model->get_data_by('ts_user_fav_ten_list', 'ufav_user_id', $user_id);
        $user_fav_ten_arr = array();
        foreach($fav_tens as $value)
        {
            array_push($user_fav_ten_arr, $value->ufav_tender_id);
        }

        return $user_fav_ten_arr;
    }


    /*
    Name        :   generate_output_by_tenders
    Authur      :   Ismail
    Created     :   10-03-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function generate_output_by_tenders($tenders, $user_fav_ten_arr)
    {
        $output = '';
        foreach($tenders as $value)
        {
            $output .= '<div class="content-2" style="background-color: #f3f3f3; border:1px solid #dfdfdf;">
                          <p class="h6 px-3 pt-3" id="tender_title'. $value->tender_auto_id .'">';
            
            if($this->ion_auth->logged_in() && in_array($value->tender_auto_id, $user_fav_ten_arr))
            {
                $output .= '<i class="fa fa-star" style="color: #ff0000;"></i> ';
            }

            $output .= $value->tender_title . '</p>
                          <div class="text-justify px-3 py-1">
                            <div class="row">
                              <div class="col-md-2">Tender ID</div>
                              <div class="col-md-10">: ' . $value->tender_manual_id . '</div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">Type</div>
                              <div class="col-md-10">: ' . $value->pro_method_name . '</div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">Inviter</div>
                              <div class="col-md-10">: ' . $value->inviter_name . '</div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">Doc. Price</div>
                              <div class="col-md-10">: ' . $value->tender_doc_price . '</div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">Sec. Amnt</div>
                              <div class="col-md-10">: ' . $value->tender_security_amount . '</div>
                            </div>
                            
                            <p class="pt-"></p>
                            <div class="float-right " style="margin-left: 10px; background-color: #ADD8E6; height: 30px;" title="Tender Viewed"> &nbsp;<strong>' . $value->tender_view . '</strong> &nbsp; </div>
                            <button class="btn float-right btn-sm border" onclick="show_details(' . $value->tender_auto_id . ')"><span title="Show Details"><i class="fa fa-info-circle" style="color: #00c0ef;"></i></span></button>';

            if($this->ion_auth->logged_in())
            {
                $output .=  '<button class=" mx-2 btn float-right btn-sm border" id="favcaticon' . $value->tender_auto_id . '" onclick="addorremvfavcat(' . $value->tender_auto_id . ')" title="Add to favorite" >';

            if(in_array($value->tender_auto_id, $user_fav_ten_arr))
                $output .= '<i class="fa fa-times" style="color: #ff0000;"></i></button>';
            else
                $output .= '<i class="fa fa-star" style="color: #ff0000;"></i></button>'; 
            }

            $output .=     '<p class="pt-4"></p>
                            <hr class="mt-3">
                          </div>
                          <div class="row pb-3">
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                              <p class="font-weight-normal px-3">Image: <a href="'. base_url('site/show_image/' . $value->tender_auto_id) . '" target="_blank"><i class="fa fa-image fa-fw pl-5"></i></a></p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                              <p class="font-weight-normal px-3">Published On: ' . date('d-m-Y', strtotime($value->tender_published_on)) . '</p>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                              <p class="font-weight-normal px-3">Closed On:  ' . date('d-m-Y', strtotime($value->tender_closed_on)) . '</p>
                            </div>
                          </div>  
                        </div>
                        <p class="py-1"></p>';
        }

        if($output == '')
        {
            $output .= '<span style="color: red;">No Tender Found!</span>';
        }

        return $output;
    }


    /*
    Name        :   about_us
    Authur      :   Ismail
    Created     :   09-04-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function about_us()
    {
        $this->data['meta_title'] = 'About Us - Rokomari Tender';
        $this->data['subview'] = 'about_us';
        $this->load->view('frontend/_layout_head2', $this->data);
    }


    /*
    Name        :   services
    Authur      :   Ismail
    Created     :   09-04-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function services()
    {
        $this->data['meta_title'] = 'Services - Rokomari Tender';
        $this->data['subview'] = 'services';
        $this->load->view('frontend/_layout_head2', $this->data);
    }


    /*
    Name        :   tariff
    Authur      :   Ismail
    Created     :   09-04-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function tariff()
    {
        $this->data['meta_title'] = 'Tariff - Rokomari Tender';
        $this->data['subview'] = 'tariff';
        $this->load->view('frontend/_layout_head2', $this->data);
    }


    /*
    Name        :   contact_us
    Authur      :   Ismail
    Created     :   10-04-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function contact_us()
    {
        $this->data['meta_title'] = 'Contact Us - Rokomari Tender';
        $this->data['subview'] = 'contact_us';
        $this->load->view('frontend/_layout_head2', $this->data);
    }
    
}