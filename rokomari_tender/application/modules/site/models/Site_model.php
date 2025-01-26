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
    // $this->db->join('ts_sub_categories AS F', 'E.category_id = F.category_id', 'LEFT');//10-04-18
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
    public function get_tenders_by_search_criteria($inv, $inv_type, $ten_type, $call_type, $pro_place, $ten_on, $bid_type, $work_area, $source, $search_by, $date_1, $date_2)
    {

        $this->db->select('A.*, B.inviter_name, C.pro_method_name');

        $this->db->from('ts_tenders AS A');

        $this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');
        $this->db->join('ts_procurement_methods AS C', 'A.tender_pro_method = C.pro_method_id');

        $this->db->order_by('A.tender_auto_id', 'DESC');

        if($inv != '')
        {
            $this->db->like('B.inviter_name', $inv);
        }

        if(!empty($inv_type))
        {
            $this->db->where_in('B.inviter_type', $inv_type);
        }

        if(!empty($ten_type))
        {
            $this->db->where_in('C.pro_method_id', $ten_type);
        }

        if(!empty($call_type))
        {
            $this->db->where_in('A.tender_call_type', $call_type);
        }

        if($pro_place != '' && $pro_place != 0)
        {
            $this->db->where_in('A.tender_procuring_dist', $pro_place);
        }

        if(!empty($ten_on))
        {
            $this->db->where_in('A.tender_on', $ten_on);
        }

        if(!empty($bid_type))
        {
            $this->db->where_in('A.tender_bidding_type', $bid_type);
        }

        if($work_area != '' && $work_area != 0)
        {
            $this->db->where_in('A.tender_district', $work_area);
        }

        if($source != '' && $source != 0)
        {
            $this->db->where_in('A.tender_source', $source);
        }

        if($search_by != '' && $search_by != 0)
        {
            if($search_by == 1)
            {
                $search_field = 'A.tender_published_on';
            }
            else if($search_by == 2)
            {
                $search_field = 'A.tender_schedule_purchase';
            }
            else if($search_by == 3)
            {
                $search_field = 'A.tender_closed_on';
            }
            else if($search_by == 4)
            {
                $search_field = 'A.tender_opening';
            }
            else if($search_by == 5)
            {
                $search_field = 'A.tender_prebid_meeting';
            }

            if($date_1 != '')
            {
                $date_1 = date('Y-m-d', strtotime($date_1));
            
                $this->db->where($search_field . ' >=', $date_1);
            }
            
            if($date_2 != '')
            {
                $date_2 = date('Y-m-d', strtotime($date_2));

                $this->db->where($search_field . ' <=', $date_2);
            }
        }

        return $this->db->get()->result();
    }

}
