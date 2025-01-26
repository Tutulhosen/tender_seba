<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
    Name        :   get_home_page_basic_tender
    Authur      :   Ismail
    Created     :   12-02-18
    ModifiedBy  :   Ismail
    ModifiedDate:   03-04-18
    */
    public function get_home_page_basic_tender($limit, $start, $international_tender = false)
    {
    	$this->db->select('A.*, B.inviter_name, C.pro_method_name');

    	$this->db->from('ts_tenders AS A');

    	$this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');
    	$this->db->join('ts_procurement_methods AS C', 'A.tender_pro_method = C.pro_method_id');

        if($international_tender)   //03-04-18
        {
            $this->db->where('A.tender_bidding_type', 2);
        }
        
    	$this->db->order_by('A.tender_auto_id', 'DESC');

    	$this->db->limit($limit, $start);
    
    	return $this->db->get()->result();
    }

    /*
    Name        :   get_tender_details
    Authur      :   Ismail
    Created     :   12-02-18
    ModifiedBy  :   Ismail
    ModifiedDate:   10-04-18    //join sub_cat on tender_sub_category
    */
    public function get_tender_details($tender_id)
    {
    	$this->db->select('A.*, B.inviter_name, C.pro_method_name, D.source_name, E.category_name, F.sub_cat_name, G.district_name, H.district_name as procuring_dist_name');

    	$this->db->from('ts_tenders AS A');

    	$this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id', 'LEFT');
        $this->db->join('ts_procurement_methods AS C', 'A.tender_pro_method = C.pro_method_id', 'LEFT');
        $this->db->join('ts_sources AS D', 'A.tender_source = D.source_id', 'LEFT');
        $this->db->join('ts_categories AS E', 'A.tender_category = E.category_id', 'LEFT');
        $this->db->join('ts_sub_categories AS F', 'A.tender_sub_category = F.sub_cat_id', 'LEFT');
        $this->db->join('ts_districts AS G', 'A.tender_district = G.district_id', 'LEFT');
        $this->db->join('ts_districts AS H', 'A.tender_procuring_dist = H.district_id', 'LEFT');//06-03-18

    	$this->db->where('A.tender_auto_id', $tender_id);
    
    	return $this->db->get()->row();
    }

    /*
    Name        :   get_home_page_total_rows
    Authur      :   Ismail
    Created     :   12-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_home_page_total_rows()
    {
    	return $this->db->get('ts_tenders')->num_rows();
    }

    /*
    Name        :   get_search_filter_total_rows
    Authur      :   Ismail
    Created     :   12-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_search_filter_total_rows($sub_cat, $inviter, $workarea)
    {
    	$this->db->select('A.*, B.inviter_name, C.pro_method_name');

    	$this->db->from('ts_tenders AS A');

    	$this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');
    	$this->db->join('ts_procurement_methods AS C', 'A.tender_pro_method = C.pro_method_id');

    	if($sub_cat != 0)
    	{
    		$this->db->where('A.tender_sub_category', $sub_cat);
    	}

    	if($inviter != 0)
    	{
    		$this->db->where('A.tender_inviter', $inviter);
    	}

    	if($workarea != 0)
    	{
    		$this->db->where('A.tender_district', $workarea);
    	}
    
    	return $this->db->get()->num_rows();
    }

    /*
    Name        :   get_search_filter_tender
    Authur      :   Ismail
    Created     :   12-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_search_filter_tender($limit, $start, $sub_cat, $inviter, $workarea, $order)
    {
    	$this->db->select('A.*, B.inviter_name, C.pro_method_name');

    	$this->db->from('ts_tenders AS A');

    	$this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');
    	$this->db->join('ts_procurement_methods AS C', 'A.tender_pro_method = C.pro_method_id');

    	if($sub_cat != 0)
    	{
    		$this->db->where('A.tender_sub_category', $sub_cat);
    	}

    	if($inviter != 0)
    	{
    		$this->db->where('A.tender_inviter', $inviter);
    	}

    	if($workarea != 0)
    	{
    		$this->db->where('A.tender_district', $workarea);
    	}

    	if($order == 1)
    	{
    		$this->db->order_by('A.tender_auto_id', 'DESC');
    	}
    	else if($order == 2)
    	{
    		$this->db->order_by('A.tender_auto_id', 'ASC');
    	}
    	else if($order == 3)
    	{
    		$this->db->order_by('A.tender_view', 'DESC');
    	}
    	else if($order == 4)
    	{
    		$this->db->order_by('A.tender_closed_on', 'ASC');

            $this->db->where('A.tender_closed_on >=', date('Y-m-d'));
    	}

    	$this->db->limit($limit, $start);
    
    	return $this->db->get()->result();
    }

    /*
    Name        :   tender_view_increment
    Authur      :   Ismail
    Created     :   14-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function tender_view_increment($tender_id)
    {
        $this->db->set('tender_view', 'tender_view + 1', false);

        $this->db->where('tender_auto_id', $tender_id);
        
        $this->db->update('ts_tenders');
    }

    /*
    Name        :   get_tender_by
    Authur      :   Ismail
    Created     :   14-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    // public function get_tender_by($id, $search_by)
    // {
    //     $total_sub_cat= $this->db->select('A.*');
    //     $total_sub_cat= $this->db->from('ts_tenders AS A');
    //     $total_sub_cat= $this->db->join('ts_sub_categories AS B', 'A.tender_sub_category = B.sub_cat_id');
    //     if ($search_by == 'sub_cat') {
    //         $total_sub_cat= $this->db->where('A.tender_sub_category', $id);
    //     }
    //     if ($search_by == 'inviter') {
    //         $total_sub_cat= $this->db->where('A.tender_inviter', $id);
    //     }
    //     if ($search_by == 'source') {
    //         $total_sub_cat= $this->db->where('A.tender_source', $id);
    //     }
    //     if ($search_by == 'location') {
    //         $total_sub_cat= $this->db->where('A.tender_district', $id);
    //     }

    //     $total_sub_cat= $this->db->get()->result();
    //     $total_sub_cat_count= sizeof($total_sub_cat);
    //     $limit=tender_count_percent_with_pak($total_sub_cat_count);

    //     $user_id = $this->session->userdata('user_id');
    //     $this->db->select('A.*, B.inviter_name, C.pro_method_name');

    //     $this->db->from('ts_tenders AS A');

    //     $this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');
    //     $this->db->join('ts_procurement_methods AS C', 'A.tender_pro_method = C.pro_method_id');
    //     if ($this->ion_auth->logged_in()) {
    //         $this->db->join('ts_user_cat_list AS D', 'A.tender_sub_category = D.ucat_sub_cat_id');
    //     }
        
    //     $this->db->order_by('A.tender_auto_id', 'DESC');

    //     if($search_by == 'sub_cat')
    //     {
    //         $this->db->where('tender_sub_category', $id);
    //         // if ($this->ion_auth->logged_in()) {
    //         //     $this->db->where('D.ucat_user_id', $user_id);
    //         // }else{
    //         //     $this->db->limit($limit, 0);
    //         // }
    //     }
    //     else if($search_by == 'inviter')
    //     {
    //         $this->db->where('tender_inviter', $id);
    //         if ($this->ion_auth->logged_in()) {
    //             $this->db->where('D.ucat_user_id', $user_id);
    //         }else{
    //             $this->db->limit($limit, 0);
    //         }
    //     }
    //     else if($search_by == 'source')
    //     {
    //         $this->db->where('tender_source', $id);
    //         if ($this->ion_auth->logged_in()) {
    //             $this->db->where('D.ucat_user_id', $user_id);
    //         }else{
    //             $this->db->limit($limit, 0);
    //         }
    //     }
    //     else if($search_by == 'location')
    //     {
    //         $this->db->where('tender_district', $id);
    //         if ($this->ion_auth->logged_in()) {
    //             $this->db->where('D.ucat_user_id', $user_id);
    //         }else{
    //             $this->db->limit($limit, 0);
    //         }
    //     }
        
    //     return $this->db->get()->result();
        
    // }

    public function get_tender_by($id, $search_by)
    {
        $this->db->select('A.*, B.inviter_name, C.pro_method_name');

        $this->db->from('ts_tenders AS A');

        $this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');
        $this->db->join('ts_procurement_methods AS C', 'A.tender_pro_method = C.pro_method_id');

        $this->db->order_by('A.tender_auto_id', 'DESC');

        if($search_by == 'sub_cat')
        {
            $this->db->where('tender_sub_category', $id);
        }
        else if($search_by == 'inviter')
        {
            $this->db->where('tender_inviter', $id);
        }
        else if($search_by == 'source')
        {
            $this->db->where('tender_source', $id);
        }
        else if($search_by == 'location')
        {
            $this->db->where('tender_district', $id);
        }

        return $this->db->get()->result();
    }
    /*
    Name        :   get_subcat_by_cat_and_search_term
    Authur      :   Ismail
    Created     :   03-03-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_subcat_by_cat_and_search_term($category_id, $search_term)
    {
        $this->db->select('A.*, B.*');

        $this->db->from('ts_sub_categories AS A');

        $this->db->join('ts_categories AS B', 'A.category_id = B.category_id');

        $this->db->order_by('A.sub_cat_name', 'ASC');

        $this->db->like('A.sub_cat_name', $search_term);

        return $this->db->get()->result();
    }

    /*
    Name        :   get_cat_by_search_term
    Authur      :   Ismail
    Created     :   03-03-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_cat_by_search_term($search_term)
    {
        $this->db->select('A.category_id, A.category_name');
        $this->db->distinct();

        $this->db->from('ts_categories AS A');

        $this->db->join('ts_sub_categories AS B', 'A.category_id = B.category_id', 'left');
        // $this->db->join('ts_sub_categories AS C', 'A.category_id = C.category_id', 'right');

        $this->db->order_by('A.category_name', 'ASC');

        $this->db->like('A.category_name', $search_term);
        $this->db->or_like('B.sub_cat_name', $search_term);

        return $this->db->get()->result();
    }


    /*
    Name        :   get_tenders_by_search_criteria
    Authur      :   Ismail
    Created     :   11-03-18
    ModifiedBy  :   
    ModifiedDate:   
    */


    public function get_tenders_by_search_criterias($date, $order_by, $pro_method, $call_type, $Inviter, $tender_on, $bidding_type, $districts){
        $user_id = $this->session->userdata('user_id');
        if (empty($date) && empty($order_by) && empty($pro_method) && empty($call_type) && empty($Inviter) && empty($tender_on) && empty($bidding_type) && empty($districts)) {
            return ;
        }else {
            $this->db->select('*');
            $this->db->from('ts_tenders AS A');
            $this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');
    
            $this->db->order_by('A.tender_auto_id', 'DESC');
            if(!empty($date))
            {
                $this->db->where_in('A.tender_published_on', $date);
            }
    
            if(!empty($order_by))
            {
                if($order_by == 1)
                {
                    $this->db->order_by('A.tender_auto_id', 'DESC');
                }
                else if($order_by == 2)
                {
                    $this->db->order_by('A.tender_auto_id', 'ASC');
                }
                else if($order_by == 3)
                {
                    $this->db->order_by('A.tender_view', 'DESC');
                }
                else if($order_by == 4)
                {
                    $this->db->order_by('A.tender_closed_on', 'ASC');
    
                    $this->db->where('A.tender_closed_on >=', date('Y-m-d'));
                }
            }
    
            
    
            if(!empty($pro_method))
            {
                $this->db->where_in('A.tender_pro_method', $pro_method);
            }
            if(!empty($call_type))
            {
                $this->db->where_in('A.tender_call_type', $call_type);
            }
            if(!empty($Inviter))
            {
                $this->db->where_in('B.inviter_type', $Inviter);
            }
            if(!empty($tender_on))
            {
                $this->db->where_in('A.tender_on', $tender_on);
            }
            if(!empty($bidding_type))
            {
                $this->db->where_in('A.tender_bidding_type', $bidding_type);
            }
            if(!empty($districts))
            {
                $this->db->where_in('A.tender_district', $districts);
            }
            return  $this->db->get()->result();
            // if ($this->ion_auth->logged_in()) {
            //     return  $this->db->get()->result();
            // } else {
            //     $limit=tender_count_percent_with_pak(sizeof($this->db->get()->result()));
            //     return $this->get_tenders_by_search_criterias_logout_user($date, $order_by, $pro_method, $call_type, $Inviter, $tender_on, $bidding_type, $districts,$limit);
                
            // }
        }
       
          
    }
    public function get_tenders_by_search_criterias_logout_user($date, $order_by, $pro_method, $call_type, $Inviter, $tender_on, $bidding_type, $districts,$limit){
        
        $this->db->select('*');
        $this->db->from('ts_tenders AS A');
        $this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');

        $this->db->order_by('A.tender_auto_id', 'DESC');
        if(!empty($date))
        {
            $this->db->where_in('A.tender_published_on', $date);
        }

        if(!empty($order_by))
        {
            if($order_by == 1)
            {
                $this->db->order_by('A.tender_auto_id', 'DESC');
            }
            else if($order_by == 2)
            {
                $this->db->order_by('A.tender_auto_id', 'ASC');
            }
            else if($order_by == 3)
            {
                $this->db->order_by('A.tender_view', 'DESC');
            }
            else if($order_by == 4)
            {
                $this->db->order_by('A.tender_closed_on', 'ASC');

                $this->db->where('A.tender_closed_on >=', date('Y-m-d'));
            }
        }

        

        if(!empty($pro_method))
        {
            $this->db->where_in('A.tender_pro_method', $pro_method);
        }
        if(!empty($call_type))
        {
            $this->db->where_in('A.tender_call_type', $call_type);
        }
        if(!empty($Inviter))
        {
            $this->db->where_in('B.inviter_type', $Inviter);
        }
        if(!empty($tender_on))
        {
            $this->db->where_in('A.tender_on', $tender_on);
        }
        if(!empty($bidding_type))
        {
            $this->db->where_in('A.tender_bidding_type', $bidding_type);
        }
        if(!empty($districts))
        {
            $this->db->where_in('A.tender_district', $districts);
        }
        $this->db->limit((int)$limit, 0);
        return  $this->db->get()->result();
      
          
    }

    public function has_user_package(){
        
            $user_id = $this->session->userdata('user_id');
            // $pkg = $this->Common_model->get_data_by('ts_user_pkg_list', 'upkg_user_id', $user_id);
             $this->db->select('upkg_id');
             $this->db->from('ts_user_pkg_list');
             $this->db->where('upkg_user_id', $user_id);
            $pkg = $this->db->get()->result();
            
            if (!empty($pkg)) {
              return true;
            }else {
                return false;
            }
        
        
    }

    //get basic tenders for loggedin and logged out user
    public function get_basic_tender(){
        
    	
        $user_id = $this->session->userdata('user_id');

        if ($this->ion_auth->logged_in() && $this->has_user_package()) {
                $this->db->select('A.*, B.inviter_name, C.pro_method_name');
                $this->db->from('ts_tenders AS A');
                $this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');
                $this->db->join('ts_procurement_methods AS C', 'A.tender_pro_method = C.pro_method_id');
              
                $this->db->join('ts_user_cat_list AS D', 'A.tender_sub_category = D.ucat_sub_cat_id');
                $this->db->where('D.ucat_user_id', $user_id);
                return $this->db->get()->result();
            
            
        } else {
            $this->db->select('A.*, B.inviter_name, C.pro_method_name');
            $this->db->from('ts_tenders AS A');
    	    $this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');
            $this->db->join('ts_procurement_methods AS C', 'A.tender_pro_method = C.pro_method_id');
            $this->db->limit(8, 0);
    	   return $this->db->get()->result();
            
        }
        
    	
        
    }




}
