<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Web_user_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
    Name        :   get_all_web_user
    Authur      :   Ismail
    Created     :   31-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_all_web_user() {
        $this->db->order_by('webu_created', 'DESC');

        return $this->db->get('ts_web_user')->result();
    }

    /*
    Name        :   delete_user_products
    Authur      :   Ismail
    Created     :   24-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function delete_user_products() {
        $this->db->where('ucat_user_id', $this->session->userdata('user_id'));

        return $this->db->delete('ts_user_cat_list');
    }

    /*
    Name        :   get_user_favorite_category
    Authur      :   Ismail
    Created     :   04-03-18
    ModifiedBy  :
    ModifiedDate:
    */
    // public function get_user_favorite_category() 
    // {
    //     $this->db->select('A.*, B.sub_cat_name');

    //     $this->db->from('ts_user_cat_list AS A');

    //     $this->db->join('ts_sub_categories AS B', 'A.ucat_sub_cat_id = B.sub_cat_id');

    //     $this->db->where('ucat_user_id', $this->session->userdata('user_id'));

    //     return $this->db->get()->result();
    // }

    /*
    Name        :   get_tender_for_reminder
    Authur      :   Ismail
    Created     :   06-03-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_tender_for_reminder($type, $date)
    {
        $this->db->select('A.*, B.inviter_name, C.pro_method_name');

        $this->db->from('ts_tenders AS A');

        $this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');
        $this->db->join('ts_procurement_methods AS C', 'A.tender_pro_method = C.pro_method_id');

        $this->db->order_by('A.tender_auto_id', 'DESC');

        if($type == 'schedule_pur')
        {
            $this->db->where('tender_schedule_purchase', $date);
        }
        else if($type == 'prebid_meet')
        {
            $this->db->where('tender_prebid_meeting', $date);
        }
        else if($type == 'closed_on')
        {
            $this->db->where('tender_closed_on', $date);
        }
        else if($type == 'opening')
        {
            $this->db->where('tender_opening', $date);
        }

        return $this->db->get()->result();
    }

    /*
    Name        :   get_user_favorite_tenders
    Authur      :   Ismail
    Created     :   08-03-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_user_favorite_tenders($user_id)
    {
        $this->db->select('B.*, C.inviter_name, D.pro_method_name');

        $this->db->from('ts_user_fav_ten_list AS A');

        $this->db->join('ts_tenders AS B', 'A.ufav_tender_id = B.tender_auto_id');
        $this->db->join('ts_inviters AS C', 'B.tender_inviter = C.inviter_id');
        $this->db->join('ts_procurement_methods AS D', 'B.tender_pro_method = D.pro_method_id');

        $this->db->order_by('A.ufav_created', 'DESC');

        $this->db->where('A.ufav_user_id', $user_id);

        return $this->db->get()->result();
    }
}
