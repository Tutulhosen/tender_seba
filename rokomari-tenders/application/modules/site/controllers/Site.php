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
        Authur      :   Touhidul Islam  
        Created     :   5-02-2023
        ModifiedBy  :
        ModifiedDate:
        */
    public function index($page = 0, $international_tender = false)
    {
       

        $this->data['tenders'] = $this->Site_model->get_home_page_basic_tender(6, $page, $international_tender);
       
        // $this->data['header_view'] = $header_view;  //03-04-18

        if($international_tender)   //03-04-18
        {
            $this->data['meta_title'] = 'International Tender - Rokomari Tender';
        }
        else
        {
            $this->data['meta_title'] = 'Rokomari Tender';
        }
        $this->data['basic_tenders'] = $this->Site_model->get_home_page_basic_tender(6, 0,false);
        $this->data['procurement_method']=$this->Common_model->get_data('ts_procurement_methods');


 
        $this->data['ts_inviters_govt']=$this->Common_model->get_data_by('ts_inviters', 'inviter_type', 2);
        $this->data['ts_inviters_private']=$this->Common_model->get_data_by('ts_inviters', 'inviter_type', 3);
        $this->data['ts_inviters_ngo']=$this->Common_model->get_data_by('ts_inviters', 'inviter_type', 1);
 
        $this->data['ts_sources']=$this->Common_model->get_data('ts_sources');
          
        $this->data['order_by_newest_oldest']=[
         'Newest First'=>1,
         'Oldest First' =>2,
         'Most Viewed On Top'=>3,
         'Early Expired On Top'=>4
       ];
 
       $this->data['call_type']=[
         'Tender'=>1,
         'Corrigendum' =>2,
         'Cancellation'=>3,
         'Republished'=>4
       ];
       $this->data['tender_inviter']=[
         'Government'=>2,
         'Private' =>3,
         'NGO'=>1
       ];
       $this->data['tender_on']=[
         'Goods'=>1,
         'Works' =>2,
         'Services'=>3
       ];
       
       $this->data['bidding_type']=[
        'Local'=>1,
        'International'=>2
       ];
       $this->data['districts']= $this->Common_model->get_data('ts_districts');
        $this->data['all_inviters'] = $this->Common_model->get_data('ts_inviters');
        $this->data['all_tender_pkg'] = $this->Common_model->get_data('ts_packages', 'pkg_id', '', 3);

        $this->data['subview'] = 'index';
        $this->load->view('frontend/_layout_main', $this->data);
    }
    

    /*
    Name        :   Tenders
    Authur      :   Touhidul Islam  
    Created     :   5-02-2023
    ModifiedBy  :
    ModifiedDate:
    */

    public function all_tenders()
    {
        $this->data['meta_title'] = 'All Tenders';
        $this->data['subview'] = 'all_tenders';
        $stat_tender=$this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 1);
        $start_corrigendum=$this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 2);
        $stat_republished=$this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 4);

        $userid = $this->session->userdata('user_id');

        $this->data['user_pkg'] = $this->Common_model->get_user_pkg($userid);

        $stat_tender_today=0;
        foreach($stat_tender as $key=>$stat_tender_single)
        {
            

               if(explode(' ',$stat_tender_single->tender_updated)[0]==date('Y-m-d'))
               {
                 $stat_tender_today++;
               }     
        }

       
        $stat_corrigendum_today=0;
        foreach($start_corrigendum as $key=>$start_corrigendum_single)
        {
               if(explode(' ',$start_corrigendum_single->tender_updated)[0]==date('Y-m-d'))
               {
                 $stat_corrigendum_today++;
               }     
        }
        
        
        $stat_republished_today=0;
        foreach($stat_republished as $key=>$stat_republished_single)
        {
               if(explode(' ',$stat_republished_single->tender_updated)[0]==date('Y-m-d'))
               {
                 $stat_republished_today++;
               }
        }
        $this->data['stat_tender'] = sizeof($stat_tender);
        $this->data['stat_tender_today'] = $stat_tender_today;

        $this->data['stat_corrigendum'] =sizeof($start_corrigendum);
        $this->data['stat_corrigendum_today'] = $stat_corrigendum_today;

        $this->data['stat_republished'] = sizeof($stat_republished);
        $this->data['stat_republished_today'] = $stat_republished_today;

        $this->data['basic_tenders'] = $this->Site_model->get_basic_tender();
        if($this->ion_auth->logged_in())   //08-03-18
        {
            
            $user_id = $this->session->userdata('user_id');

            $user_select_tenders = $this->Common_model->get_data_by('ts_user_cat_list', 'ucat_user_id', $user_id);
            if (!empty($user_select_tenders)) {
                $this->data['user_select_tenders']= $user_select_tenders[0]->ucat_sub_cat_id;
            }
            
            
            $fav_tens = $this->Common_model->get_data_by('ts_user_fav_ten_list', 'ufav_user_id', $user_id);
            if (!empty($fav_tens)) {
                $this->data['fvrt_ten_id']= $fav_tens[0]->save_tender_id;
            }
            
            $user_fav_ten_arr = array();
            foreach($fav_tens as $value)
            {
                array_push($user_fav_ten_arr, $value->ufav_tender_id);
            }

            $this->data['favorite_tenders'] = $user_fav_ten_arr;
            $this->data['is_logged_in']=true;
        }
        else
        {
            $this->data['favorite_tenders'] = [];
            $this->data['is_logged_in']=false; 
        }
        
        $all_categories_sub_categories = [];

        $all_categories = $this->Common_model->get_data('ts_categories', 'category_name', 'ASC');
        foreach ($all_categories as $key => $value) {
            $cat_sub_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $value->category_id);
            $temp['category_id'] = $value->category_id;
            $temp['category_name'] = $value->category_name;
            $temp['category_desc'] = $value->category_desc;
            $temp['category_created'] = $value->category_created;
            $temp['category_updated'] = $value->category_updated;
            $temp['sub_categories'] = $cat_sub_cat;

            array_push($all_categories_sub_categories, $temp);
        }
        $this->data['all_categories_sub_categories']=$all_categories_sub_categories;
        // custom_var_dump($this->data['all_categories_sub_categories']);
        $all_divisions_districts=[];

        $this->data['divisions']= $this->Common_model->get_data('ts_divisions');
        $this->data['districts']= $this->Common_model->get_data('ts_districts');
        
       
        foreach ($this->data['divisions'] as $key => $value) {
            $district_single = $this->Common_model->get_data_by('ts_districts', 'division_id', $value->division_id);
            $div_temp['division_id'] = $value->division_id;
            $div_temp['division_name'] = $value->division_name;
            $div_temp['district_single'] = $district_single;

            array_push($all_divisions_districts, $div_temp);
        }

       $this->data['procurement_method']=$this->Common_model->get_data('ts_procurement_methods');

       $this->data['all_divisions_districts']=$all_divisions_districts;

       $this->data['ts_inviters_govt']=$this->Common_model->get_data_by('ts_inviters', 'inviter_type', 2);
       $this->data['ts_inviters_private']=$this->Common_model->get_data_by('ts_inviters', 'inviter_type', 3);
       $this->data['ts_inviters_ngo']=$this->Common_model->get_data_by('ts_inviters', 'inviter_type', 1);

       $this->data['ts_sources']=$this->Common_model->get_data('ts_sources');
         
       $this->data['order_by_newest_oldest']=[
        'Newest First'=>1,
        'Oldest First' =>2,
        'Most Viewed On Top'=>3,
        'Early Expired On Top'=>4
      ];

      $this->data['call_type']=[
        'Tender'=>1,
        'Corrigendum' =>2,
        'Cancellation'=>3,
        'Republished'=>4
      ];
      $this->data['tender_inviter']=[
        'Government'=>2,
        'Private' =>3,
        'NGO'=>1
      ];
      $this->data['tender_on']=[
        'Goods'=>1,
        'Works' =>2,
        'Services'=>3
      ];
      
      $this->data['bidding_type']=[
       'Local'=>1,
       'International'=>2
      ];
        $this->data['all_inviters'] = $this->Common_model->get_data('ts_inviters');
        
        $this->data['subview'] = 'all_tenders';
       // custom_var_dump($this->data['all_categories_sub_categories']);
        //custom_var_dump($this->data['basic_tenders']);
        
        $this->load->view('frontend/_layout_main', $this->data);
    }

    public function tenders_details($tender_id){
       
        
        if(!$this->ion_auth->logged_in())
        {
            redirect('user-login');
        }

        if (!is_numeric($tender_id)) {
            exit;
        }

        $user_id = $this->session->userdata('user_id');
        $user_select_tenders = $this->Common_model->get_data_by('ts_user_cat_list', 'ucat_user_id', $user_id);
        $user_select_tenders_arr = array();
        if (!empty($user_select_tenders)) {
            foreach($user_select_tenders as $values)
            {
                array_push($user_select_tenders_arr, $values->ucat_sub_cat_id);
            }
        }
        $select_tenders = $this->Common_model->get_data_by('ts_tenders', 'tender_auto_id', $tender_id);
        $select_tender_cat_id=$select_tenders[0]->tender_sub_category;
        $user = $this->db->select('*')->from('ts_web_user')->where('webu_id', $user_id)->get()->result_array();
        $user_pck= $this->Common_model->get_tender_product_count();

        if ($user_pck) {
            $pkg_duration = $user_pck->pkg_duration;
        }else{
            $pkg_duration =null;
        }

         

        $user_created_at = $user[0]['webu_created']; 
        $now = time();
        $your_date = strtotime($user_created_at);
        $datediff = $now - $your_date;
        
        if (in_array($select_tender_cat_id, $user_select_tenders_arr) && $pkg_duration >= $datediff) {
            $stat_tender=$this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 1);
            $start_corrigendum=$this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 2);
            $stat_republished=$this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 4);
            
            $stat_tender_today=0;
            foreach($stat_tender as $key=>$stat_tender_single)
            {
                
    
                   if(explode(' ',$stat_tender_single->tender_updated)[0]==date('Y-m-d'))
                   {
                     $stat_tender_today++;
                   }     
            }
    
           
            $stat_corrigendum_today=0;
            foreach($start_corrigendum as $key=>$start_corrigendum_single)
            {
                   if(explode(' ',$start_corrigendum_single->tender_updated)[0]==date('Y-m-d'))
                   {
                     $stat_corrigendum_today++;
                   }     
            }
            
            
            $stat_republished_today=0;
            foreach($stat_republished as $key=>$stat_republished_single)
            {
                   if(explode(' ',$stat_republished_single->tender_updated)[0]==date('Y-m-d'))
                   {
                     $stat_republished_today++;
                   }     
            }
            $all_categories_sub_categories = [];

            $all_categories = $this->Common_model->get_data('ts_categories', 'category_name', 'ASC');
            foreach ($all_categories as $key => $value) {
                $cat_sub_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $value->category_id);
                $temp['category_id'] = $value->category_id;
                $temp['category_name'] = $value->category_name;
                $temp['category_desc'] = $value->category_desc;
                $temp['category_created'] = $value->category_created;
                $temp['category_updated'] = $value->category_updated;
                $temp['sub_categories'] = $cat_sub_cat;

                array_push($all_categories_sub_categories, $temp);
            }
            $this->data['all_categories_sub_categories']=$all_categories_sub_categories;
            $this->data['stat_tender'] = sizeof($stat_tender);
            $this->data['stat_tender_today'] = $stat_tender_today;
    
            $this->data['stat_corrigendum'] =sizeof($start_corrigendum);
            $this->data['stat_corrigendum_today'] = $stat_corrigendum_today;
    
            $this->data['stat_republished'] = sizeof($stat_republished);
            $this->data['stat_republished_today'] = $stat_republished_today;
    
            $this->data['meta_title'] = 'Tender_details - Rokomari Tender';
            $this->data['subview'] = 'tender_details';
            $tender_details=$this->Common_model->get_data_by('ts_tenders', 'tender_auto_id', $tender_id);
            $this->data['tender_details'] = $tender_details;
    
            $this->load->view('frontend/_layout_main', $this->data);
        }else {

            if ($user_pck && $pkg_duration < $datediff) {
                $stat_tender=$this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 1);
                $start_corrigendum=$this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 2);
                $stat_republished=$this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 4);
                
                $stat_tender_today=0;
                foreach($stat_tender as $key=>$stat_tender_single)
                {
                    
        
                       if(explode(' ',$stat_tender_single->tender_updated)[0]==date('Y-m-d'))
                       {
                         $stat_tender_today++;
                       }     
                }
        
               
                $stat_corrigendum_today=0;
                foreach($start_corrigendum as $key=>$start_corrigendum_single)
                {
                       if(explode(' ',$start_corrigendum_single->tender_updated)[0]==date('Y-m-d'))
                       {
                         $stat_corrigendum_today++;
                       }     
                }
                
                
                $stat_republished_today=0;
                foreach($stat_republished as $key=>$stat_republished_single)
                {
                       if(explode(' ',$stat_republished_single->tender_updated)[0]==date('Y-m-d'))
                       {
                         $stat_republished_today++;
                       }     
                }
                $all_categories_sub_categories = [];
    
                $all_categories = $this->Common_model->get_data('ts_categories', 'category_name', 'ASC');
                foreach ($all_categories as $key => $value) {
                    $cat_sub_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $value->category_id);
                    $temp['category_id'] = $value->category_id;
                    $temp['category_name'] = $value->category_name;
                    $temp['category_desc'] = $value->category_desc;
                    $temp['category_created'] = $value->category_created;
                    $temp['category_updated'] = $value->category_updated;
                    $temp['sub_categories'] = $cat_sub_cat;
    
                    array_push($all_categories_sub_categories, $temp);
                }
                $this->data['all_categories_sub_categories']=$all_categories_sub_categories;
                $this->data['stat_tender'] = sizeof($stat_tender);
                $this->data['stat_tender_today'] = $stat_tender_today;
        
                $this->data['stat_corrigendum'] =sizeof($start_corrigendum);
                $this->data['stat_corrigendum_today'] = $stat_corrigendum_today;
        
                $this->data['stat_republished'] = sizeof($stat_republished);
                $this->data['stat_republished_today'] = $stat_republished_today;
        
                $this->data['meta_title'] = 'Tender_details - Rokomari Tender';
                $this->data['subview'] = 'no_tender_details';
                $this->data['tender_details'] = "Your package duration is expired. Please renew to continue.";
        
                $this->load->view('frontend/_layout_main', $this->data);
            }else{
                $stat_tender=$this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 1);
                $start_corrigendum=$this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 2);
                $stat_republished=$this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 4);
                
                $stat_tender_today=0;
                foreach($stat_tender as $key=>$stat_tender_single)
                {
                    
        
                       if(explode(' ',$stat_tender_single->tender_updated)[0]==date('Y-m-d'))
                       {
                         $stat_tender_today++;
                       }     
                }
        
               
                $stat_corrigendum_today=0;
                foreach($start_corrigendum as $key=>$start_corrigendum_single)
                {
                       if(explode(' ',$start_corrigendum_single->tender_updated)[0]==date('Y-m-d'))
                       {
                         $stat_corrigendum_today++;
                       }     
                }
                
                
                $stat_republished_today=0;
                foreach($stat_republished as $key=>$stat_republished_single)
                {
                       if(explode(' ',$stat_republished_single->tender_updated)[0]==date('Y-m-d'))
                       {
                         $stat_republished_today++;
                       }     
                }
                $all_categories_sub_categories = [];
    
                $all_categories = $this->Common_model->get_data('ts_categories', 'category_name', 'ASC');
                foreach ($all_categories as $key => $value) {
                    $cat_sub_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $value->category_id);
                    $temp['category_id'] = $value->category_id;
                    $temp['category_name'] = $value->category_name;
                    $temp['category_desc'] = $value->category_desc;
                    $temp['category_created'] = $value->category_created;
                    $temp['category_updated'] = $value->category_updated;
                    $temp['sub_categories'] = $cat_sub_cat;
    
                    array_push($all_categories_sub_categories, $temp);
                }
                $this->data['all_categories_sub_categories']=$all_categories_sub_categories;
                $this->data['stat_tender'] = sizeof($stat_tender);
                $this->data['stat_tender_today'] = $stat_tender_today;
        
                $this->data['stat_corrigendum'] =sizeof($start_corrigendum);
                $this->data['stat_corrigendum_today'] = $stat_corrigendum_today;
        
                $this->data['stat_republished'] = sizeof($stat_republished);
                $this->data['stat_republished_today'] = $stat_republished_today;
        
                $this->data['meta_title'] = 'Tender_details - Rokomari Tender';
                $this->data['subview'] = 'no_tender_details';
                $this->data['tender_details'] = "You are not on this category";
        
                $this->load->view('frontend/_layout_main', $this->data);
            }
         
           
           
        }
        

        
       
    }

  

     /*
    Name        :   about_us
    Authur      :   Touhidul Islam
    Created     :   05-02-23
    ModifiedBy  :
    ModifiedDate:
    */
    public function about_us()
    {
        
        $this->data['meta_title'] = 'About Us - Rokomari Tender';
        $this->data['subview'] = 'about_us';
        $this->load->view('frontend/_layout_main', $this->data);
    }
     /*
    Name        :   all_blog
    Authur      :   Touhidul Islam
    Created     :   05-02-23
    ModifiedBy  :
    ModifiedDate:
    */
    public function all_blog()
    {
        $this->data['meta_title'] = 'Blog - Rokomari Tender';
        $this->data['subview'] = 'blog';
        $this->load->view('frontend/_layout_main', $this->data);
    }
    /*
    Name        :   contact_us
    Authur      :   Touhidul Islam
    Created     :   05-02-23
    ModifiedBy  :
    ModifiedDate:
    */
    public function contact_us()
    {
        $this->data['meta_title'] = 'Contact Us - Rokomari Tender';
        $this->data['subview'] = 'contact_us';
        $this->load->view('frontend/_layout_main', $this->data);
    }
    
    

    /*
    Name        :   index
    Authur      :   Ismail
    Created     :   12-02-18
    ModifiedBy  :   Ismail
    ModifiedDate:   10-04-18
    */
    // public function index($page = 0, $header_view = null, $international_tender = false)
    public function index_old($page = 0, $international_tender = false)
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
        $this->data['all_inviters'] = $this->Common_model->get_data('ts_inviters');
        $this->data['all_districs'] = $this->Common_model->get_data('ts_districts');

        $this->data['all_categories'] = $this->Common_model->get_data('ts_categories', 'category_name', 'ASC');    //add order 08-03-18

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
                array_push($user_fav_ten_arr, $value);
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
        // custom_var_dump($tenders);
        if($this->ion_auth->logged_in())   //08-03-18
        {
            $user_id = $this->session->userdata('user_id');

            $fav_tens = $this->Common_model->get_data_by('ts_user_fav_ten_list', 'ufav_user_id', $user_id);
            $user_fav_ten_arr = array();
            foreach($fav_tens as $value)
            {
                array_push($user_fav_ten_arr, $value->ufav_tender_id);
            }
            $is_logged_in=true;

            // $this->data['favorite_tenders'] = $user_fav_ten_arr;
        }else{
            $is_logged_in=false;
        }
        
        $output = '';
        foreach($tenders as $value)
        {
            if($is_logged_in){
                $user_id = $this->session->userdata('user_id');

                $fav_tens = $this->Common_model->get_data_by('ts_user_fav_ten_list', 'ufav_user_id', $user_id);
                    if (!empty($fav_tens)) {
                        $fvrt_ten_id= $fav_tens[0]->save_tender_id;
                    if (in_array($value->tender_auto_id, json_decode($fvrt_ten_id))) {
                        $color='red';
                    }else{
                        $color='black';
                            
                    }
                } else {
                    $color='black';
                }
                
                

                $user_select_tenders = $this->Common_model->get_data_by('ts_user_cat_list', 'ucat_user_id', $user_id);
                $user_select_tenders_arr = array();
                if (!empty($user_select_tenders)) {
                    foreach($user_select_tenders as $values)
                    {
                        array_push($user_select_tenders_arr, $values->ucat_sub_cat_id);
                    }
                }
                
         
                
                if (in_array($value->tender_sub_category, $user_select_tenders_arr)) {
                    
                    $love_button_='<div class="d-flex pt-3">
                        <button value="'.$value->tender_auto_id.'" id="save_btn_'.$value->tender_auto_id.'"class="btn save_btn '.$color.'" ><i class="fa-solid fa-bookmark "></i></button>  save 
                                
                            
                        </div>';
                }else{
                    $love_button_=null;
                        
                }
                
               
                
            }else
            {
                $love_button_=null;
            }
            $output .= '<div class="govt_tender_div">';
            $output .= '<div class="govt_tender_div2 container g-0">
                            <div class="d-flex">
                                <a href="javascript:void(0)" class="gov_tender_button">'.get_inviter_type_by_id($value->tender_inviter).' Tender</a>
                                <p class="gov_tender_id">ID: <span class="gov_tender_id_span">'.$value->tender_manual_id.'</span></p>
                            </div>
                            <div class="d-flex">
                                <div class="d-flex">
                                        <div>
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.99998 6.11079C9.63197 6.11654 9.26668 6.175 8.91526 6.2844C9.07782 6.57027 9.16437 6.89305 9.16665 7.2219C9.16665 7.47724 9.11635 7.73009 9.01864 7.966C8.92092 8.20191 8.77769 8.41627 8.59713 8.59683C8.41657 8.77738 8.20222 8.92061 7.96631 9.01833C7.7304 9.11605 7.47755 9.16634 7.2222 9.16634C6.89335 9.16406 6.57058 9.07751 6.2847 8.91495C6.05916 9.69717 6.08545 10.5305 6.35984 11.297C6.63424 12.0634 7.14283 12.7241 7.81358 13.1855C8.48433 13.6468 9.28323 13.8854 10.0971 13.8675C10.911 13.8495 11.6986 13.576 12.3484 13.0855C12.9982 12.5951 13.4772 11.9127 13.7176 11.1349C13.9579 10.3571 13.9475 9.52338 13.6877 8.75185C13.4279 7.98032 12.932 7.31009 12.2701 6.83608C11.6083 6.36208 10.8141 6.10833 9.99998 6.11079ZM19.8791 9.49273C17.9962 5.81877 14.2684 3.33301 9.99998 3.33301C5.73158 3.33301 2.00276 5.82051 0.120814 9.49308C0.0413845 9.6502 0 9.82379 0 9.99985C0 10.1759 0.0413845 10.3495 0.120814 10.5066C2.0038 14.1806 5.73158 16.6663 9.99998 16.6663C14.2684 16.6663 17.9972 14.1788 19.8791 10.5063C19.9586 10.3491 20 10.1756 20 9.9995C20 9.82344 19.9586 9.64985 19.8791 9.49273ZM9.99998 14.9997C6.57463 14.9997 3.43436 13.09 1.73852 9.99967C3.43436 6.9094 6.57429 4.99967 9.99998 4.99967C13.4257 4.99967 16.5656 6.9094 18.2614 9.99967C16.566 13.09 13.4257 14.9997 9.99998 14.9997Z" fill="#4CAF50" />
                                            </svg>
                                        </div>
                                        <p class="publish_views">'.$value->tender_view.' Views</p>
                                </div>
                                <div class="ms-4">
                                        <p class="publish_date">Publish Date '.custom_date_maker($value->tender_published_on).'</p>
                                </div>
                            </div>
                        </div>';

            $output .= '<div class="pt-md-4">
                                <p class="gov_tender_pragrap">
                                Invitation for supply of consumables, health item, ration-item, machineries, tools, furniture, surgical-items,medical-equipments,tailoring-works of dress, ribon, name-plate, labor, spare-parts of vehicle,transportation, computer-accessories, laundry-works
                                </p>
                        </div>';
            $output .= '<div class="govt_tender_div2 container g-0">
                            <div class="d-flex">
                                <div>
                                        <p class="close_on">Closed On('.left_day_count(date('Y-m-d'),$value->tender_closed_on).' )</p>
                                        <p class="close_on_date">'.custom_date_maker($value->tender_closed_on).'</p>
                                </div>
                                <div class="ms-5">
                                        <p class="close_on">Procuring Place</p>
                                        <div class="d-flex">
                                            <div>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2481 4.032C15.1278 2.91138 13.6145 2.27205 12.0301 2.25H11.9701C10.3856 2.27173 8.87202 2.91085 7.75148 4.03139C6.63094 5.15193 5.99182 6.66546 5.97009 8.25C5.95059 9.375 6.26709 10.4805 6.87909 11.4255L11.6011 21H12.4006L17.1211 11.4255C17.7346 10.4805 18.0511 9.375 18.0301 8.25C18.008 6.66559 17.3687 5.15229 16.2481 4.032ZM11.8876 3.75L12.0106 3.765L12.1216 3.75C13.2999 3.80132 14.4139 4.3021 15.2344 5.14939C16.0549 5.99668 16.5196 7.12611 16.5331 8.3055C16.5446 9.14254 16.3002 9.96313 15.8326 10.6575L15.8026 10.7085L15.7771 10.761L12.0001 18.4185L8.22459 10.7685L8.19909 10.71L8.16909 10.659C7.70151 9.96463 7.45711 9.14404 7.46859 8.307C7.48138 7.12625 7.94668 5.99539 8.76857 5.14755C9.59046 4.2997 10.7063 3.79948 11.8861 3.75H11.8876ZM12.8056 7.0035C12.6418 6.89398 12.458 6.81779 12.2648 6.77928C12.0716 6.74078 11.8726 6.74071 11.6794 6.77908C11.4861 6.81746 11.3023 6.89352 11.1384 7.00293C10.9746 7.11234 10.8339 7.25296 10.7243 7.41675C10.6148 7.58054 10.5386 7.7643 10.5001 7.95754C10.4616 8.15077 10.4615 8.3497 10.4999 8.54296C10.5383 8.73622 10.6144 8.92004 10.7238 9.0839C10.8332 9.24777 10.9738 9.38848 11.1376 9.498C11.4684 9.71919 11.8735 9.79992 12.2638 9.72242C12.6541 9.64492 12.9976 9.41554 13.2188 9.08475C13.44 8.75396 13.5208 8.34885 13.4433 7.95854C13.3658 7.56823 13.1364 7.22469 12.8056 7.0035ZM10.3051 5.7555C10.6324 5.52543 11.0024 5.36315 11.3933 5.2782C11.7843 5.19326 12.1882 5.18736 12.5815 5.26086C12.9747 5.33436 13.3493 5.48577 13.6832 5.70618C14.017 5.9266 14.3035 6.21156 14.5255 6.54431C14.7476 6.87706 14.901 7.25087 14.9764 7.64374C15.0519 8.03662 15.0481 8.44062 14.9651 8.83198C14.8821 9.22334 14.7217 9.59416 14.4933 9.92261C14.2649 10.2511 13.9731 10.5305 13.6351 10.7445C12.9734 11.1634 12.1742 11.307 11.4081 11.1446C10.6421 10.9822 9.96985 10.5266 9.5351 9.87528C9.10034 9.22394 8.93752 8.42841 9.08139 7.65864C9.22526 6.88886 9.66443 6.20585 10.3051 5.7555Z" fill="#0B63E5" />
                                                    </svg>
                                            </div>
                                            <p class="close_on_date">'.get_tender_district_by_id($value->tender_district).'</p>
                                        </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                '.$love_button_.'
                                <div class="ms-4 pt-3">
                                        <a href=" '. base_url() . 'site/tenders_details/' . $value->tender_auto_id .'" class="publish_view_details_btn">View
                                            Details <span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15.5 7.5L20 12M20 12L15.5 16.5M20 12H4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                            </span></a>
                                </div>
                            </div>
                            
                    </div>';
            $output .= '</div>';
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
        if (isset($_POST['date'])) {
            $date= $_POST['date'];
        }
        if (isset($_POST['order_by'])) {
            $order_by= $_POST['order_by'];
        }
        if (isset($_POST['pro_method'])) {
            $pro_method= $_POST['pro_method'];
        }else{
            $pro_method='';
        }
        if (isset($_POST['call_type'])) {
            $call_type= $_POST['call_type'];
        }
        if (isset($_POST['Inviter'])) {
            $Inviter= $_POST['Inviter'];
        }
      
        if (isset($_POST['tender_on'])) {
            $tender_on= $_POST['tender_on'];
        }
        if (isset($_POST['bidding_type'])) {
            $bidding_type= $_POST['bidding_type'];
        }else{
            $bidding_type='';
        }
        if (isset($_POST['districts'])) {
            $districts= $_POST['districts'];
        }
      
        $tenders = $this->Site_model->get_tenders_by_search_criterias($date, $order_by, $pro_method, $call_type, $Inviter, $tender_on, $bidding_type, $districts);
        
        
       
    if($this->ion_auth->logged_in())   
        {
            
            $is_logged_in=true;
        }
        else
        {
           
            $is_logged_in=false; 
        }
        // $is_logged_in=$this->ion_auth->logged_in();
       
        $output = '';
        if (!isset($tenders)) {
            echo "please select an option";
        } else {

            foreach($tenders as $value)
            {
                $output .= '<div class="govt_tender_div">';
                $output .= '<div class="govt_tender_div2 container g-0">
                                <div class="d-flex">
                                    <a href="javascript:void(0)" class="gov_tender_button">'.get_inviter_type_by_id($value->tender_inviter).' Tender</a>
                                    <p class="gov_tender_id">ID: <span class="gov_tender_id_span">'.$value->tender_manual_id.'</span></p>
                                </div>
                                <div class="d-flex">
                                    <div class="d-flex">
                                            <div>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.99998 6.11079C9.63197 6.11654 9.26668 6.175 8.91526 6.2844C9.07782 6.57027 9.16437 6.89305 9.16665 7.2219C9.16665 7.47724 9.11635 7.73009 9.01864 7.966C8.92092 8.20191 8.77769 8.41627 8.59713 8.59683C8.41657 8.77738 8.20222 8.92061 7.96631 9.01833C7.7304 9.11605 7.47755 9.16634 7.2222 9.16634C6.89335 9.16406 6.57058 9.07751 6.2847 8.91495C6.05916 9.69717 6.08545 10.5305 6.35984 11.297C6.63424 12.0634 7.14283 12.7241 7.81358 13.1855C8.48433 13.6468 9.28323 13.8854 10.0971 13.8675C10.911 13.8495 11.6986 13.576 12.3484 13.0855C12.9982 12.5951 13.4772 11.9127 13.7176 11.1349C13.9579 10.3571 13.9475 9.52338 13.6877 8.75185C13.4279 7.98032 12.932 7.31009 12.2701 6.83608C11.6083 6.36208 10.8141 6.10833 9.99998 6.11079ZM19.8791 9.49273C17.9962 5.81877 14.2684 3.33301 9.99998 3.33301C5.73158 3.33301 2.00276 5.82051 0.120814 9.49308C0.0413845 9.6502 0 9.82379 0 9.99985C0 10.1759 0.0413845 10.3495 0.120814 10.5066C2.0038 14.1806 5.73158 16.6663 9.99998 16.6663C14.2684 16.6663 17.9972 14.1788 19.8791 10.5063C19.9586 10.3491 20 10.1756 20 9.9995C20 9.82344 19.9586 9.64985 19.8791 9.49273ZM9.99998 14.9997C6.57463 14.9997 3.43436 13.09 1.73852 9.99967C3.43436 6.9094 6.57429 4.99967 9.99998 4.99967C13.4257 4.99967 16.5656 6.9094 18.2614 9.99967C16.566 13.09 13.4257 14.9997 9.99998 14.9997Z" fill="#4CAF50" />
                                                </svg>
                                            </div>
                                            <p class="publish_views">'.$value->tender_view.' Views</p>
                                    </div>
                                    <div class="ms-4">
                                            <p class="publish_date">Publish Date '.custom_date_maker($value->tender_published_on).'</p>
                                    </div>
                                </div>
                            </div>';
    
                $output .= '<div class="pt-md-4">
                                    <p class="gov_tender_pragrap">
                                    Invitation for supply of consumables, health item, ration-item, machineries, tools, furniture, surgical-items,medical-equipments,tailoring-works of dress, ribon, name-plate, labor, spare-parts of vehicle,transportation, computer-accessories, laundry-works
                                    </p>
                            </div>';
                            
                            if($is_logged_in){
                                $user_id = $this->session->userdata('user_id');
                
                                $fav_tens = $this->Common_model->get_data_by('ts_user_fav_ten_list', 'ufav_user_id', $user_id);
                                if (!empty($fav_tens)) {
                                    $fvrt_ten_id= $fav_tens[0]->save_tender_id;
                                    if (in_array($value->tender_auto_id, json_decode($fvrt_ten_id))) {
                                        $color='red';
                                    }else{
                                        $color='black';
                                            
                                    }
                                }else{
                                    $color='black';
                                }
                                
                                
                
                                $user_select_tenders = $this->Common_model->get_data_by('ts_user_cat_list', 'ucat_user_id', $user_id);
                                $user_select_tenders_arr = array();
                                if (!empty($user_select_tenders)) {
                                    foreach($user_select_tenders as $values)
                                    {
                                        array_push($user_select_tenders_arr, $values->ucat_sub_cat_id);
                                    }
                                }
                                
                         
                                
                                if (in_array($value->tender_sub_category, $user_select_tenders_arr)) {
                                    
                                    $love_button_='<div class="d-flex pt-3">
                                        <button value="'.$value->tender_auto_id.'" id="save_btn_'.$value->tender_auto_id.'"class="btn save_btn '.$color.'" ><i class="fa-solid fa-bookmark "></i></button>  save 
                                                
                                            
                                        </div>';
                                }else{
                                    $love_button_=null;
                                        
                                }
                                
                               
                                
                            }else
                            {
                                $love_button_=null;
                            }
                        
                $output .= '<div class="govt_tender_div2 container g-0">
                                <div class="d-flex">
                                    <div>
                                            <p class="close_on">Closed On('.left_day_count(date('Y-m-d'),$value->tender_closed_on).' )</p>
                                            <p class="close_on_date">'.custom_date_maker($value->tender_closed_on).'</p>
                                    </div>
                                    <div class="ms-5">
                                            <p class="close_on">Procuring Place</p>
                                            <div class="d-flex">
                                                <div>
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2481 4.032C15.1278 2.91138 13.6145 2.27205 12.0301 2.25H11.9701C10.3856 2.27173 8.87202 2.91085 7.75148 4.03139C6.63094 5.15193 5.99182 6.66546 5.97009 8.25C5.95059 9.375 6.26709 10.4805 6.87909 11.4255L11.6011 21H12.4006L17.1211 11.4255C17.7346 10.4805 18.0511 9.375 18.0301 8.25C18.008 6.66559 17.3687 5.15229 16.2481 4.032ZM11.8876 3.75L12.0106 3.765L12.1216 3.75C13.2999 3.80132 14.4139 4.3021 15.2344 5.14939C16.0549 5.99668 16.5196 7.12611 16.5331 8.3055C16.5446 9.14254 16.3002 9.96313 15.8326 10.6575L15.8026 10.7085L15.7771 10.761L12.0001 18.4185L8.22459 10.7685L8.19909 10.71L8.16909 10.659C7.70151 9.96463 7.45711 9.14404 7.46859 8.307C7.48138 7.12625 7.94668 5.99539 8.76857 5.14755C9.59046 4.2997 10.7063 3.79948 11.8861 3.75H11.8876ZM12.8056 7.0035C12.6418 6.89398 12.458 6.81779 12.2648 6.77928C12.0716 6.74078 11.8726 6.74071 11.6794 6.77908C11.4861 6.81746 11.3023 6.89352 11.1384 7.00293C10.9746 7.11234 10.8339 7.25296 10.7243 7.41675C10.6148 7.58054 10.5386 7.7643 10.5001 7.95754C10.4616 8.15077 10.4615 8.3497 10.4999 8.54296C10.5383 8.73622 10.6144 8.92004 10.7238 9.0839C10.8332 9.24777 10.9738 9.38848 11.1376 9.498C11.4684 9.71919 11.8735 9.79992 12.2638 9.72242C12.6541 9.64492 12.9976 9.41554 13.2188 9.08475C13.44 8.75396 13.5208 8.34885 13.4433 7.95854C13.3658 7.56823 13.1364 7.22469 12.8056 7.0035ZM10.3051 5.7555C10.6324 5.52543 11.0024 5.36315 11.3933 5.2782C11.7843 5.19326 12.1882 5.18736 12.5815 5.26086C12.9747 5.33436 13.3493 5.48577 13.6832 5.70618C14.017 5.9266 14.3035 6.21156 14.5255 6.54431C14.7476 6.87706 14.901 7.25087 14.9764 7.64374C15.0519 8.03662 15.0481 8.44062 14.9651 8.83198C14.8821 9.22334 14.7217 9.59416 14.4933 9.92261C14.2649 10.2511 13.9731 10.5305 13.6351 10.7445C12.9734 11.1634 12.1742 11.307 11.4081 11.1446C10.6421 10.9822 9.96985 10.5266 9.5351 9.87528C9.10034 9.22394 8.93752 8.42841 9.08139 7.65864C9.22526 6.88886 9.66443 6.20585 10.3051 5.7555Z" fill="#0B63E5" />
                                                        </svg>
                                                </div>
                                                <p class="close_on_date">'.get_tender_district_by_id($value->tender_district).'</p>
                                            </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                     '.$love_button_.'
                                    <div class="ms-4 pt-3">
                                            <a href=" '. base_url() . 'site/tenders_details/' . $value->tender_auto_id .'" class="publish_view_details_btn">View
                                                Details <span>
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.5 7.5L20 12M20 12L15.5 16.5M20 12H4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                </span></a>
                                    </div>
                                </div>
                                
                        </div>';
                $output .= '</div>';
            }
    
    
            if($output == '')
            {
                //03-03-18
                $output .= '<span style="color: red;">No Tender Found!</span>';
            }
        }
        



            echo $output;
        
        

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


    public function save_tender($id){
        $user_id = $this->session->userdata('user_id');
        $is_user_id_has_in_fav= $this->db->select('*')->from('ts_user_fav_ten_list')->where('ufav_user_id', $user_id)->get()->result();
        $fav_id_array=array();
        array_push($fav_id_array, $id);

        if (!$is_user_id_has_in_fav) {
            $data = array(
                'ufav_user_id' => $user_id,
                'save_tender_id' => json_encode($fav_id_array),
               
            );
            
            $this->db->insert('ts_user_fav_ten_list', $data);
        }else{
            $already_has=$this->db->select('save_tender_id')->from('ts_user_fav_ten_list')->where('ufav_user_id', $user_id)->get()->result();
            $has_already_array=$already_has[0]->save_tender_id;
            $fav_id_array=json_decode($has_already_array,true);



            if(!in_array((string)$id,$fav_id_array))
            {

                array_push($fav_id_array,$id);
                $data = array(
                    'save_tender_id' => json_encode($fav_id_array), 
                );
                $fav_id=$this->db->where('ufav_user_id', $user_id);
                $fav_id=$this->db->update('ts_user_fav_ten_list', $data);
            }else{
                $new_arr=array();
                $arr = $fav_id_array;
                $val = $id;
            
                $key = array_search($val, $arr, true);
                if ($key !== false) {
                    unset($arr[$key]);
                }
                foreach ($arr as $key => $value) {
                    array_push($new_arr, $value);
                }
                $data = array(
                    'save_tender_id' => json_encode($new_arr), 
                );
                $fav_id=$this->db->where('ufav_user_id', $user_id);
                $fav_id=$this->db->update('ts_user_fav_ten_list', $data);
                
              
            }
            echo 'OK';
            
           // custom_var_dump($fav_id_array);
            
        }

    }
   
    
}