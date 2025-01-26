<?php
if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Tender_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
    Name        :   get_all_tenders
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :
    ModifiedDate:
    */

    public function get_all_tenders() {
        $this->db->order_by( 'tender_auto_id', 'DESC' );

        return $this->db->get( 'ts_tenders' )->result();
    }

    /*
    Name        :   get_tender_details
    Authur      :   Ismail
    Created     :   24-01-18
    ModifiedBy  :
    ModifiedDate:
    */

    public function get_tender_details( $id ) {
        $this->db->select( 'A.*, B.inviter_name, C.source_name, D.category_name, E.sub_cat_name, F.division_name, G.district_name, H.pro_method_name' );

        $this->db->from( 'ts_tenders AS A' );

        $this->db->join( 'ts_inviters AS B', 'A.tender_inviter = B.inviter_id' );
        $this->db->join( 'ts_sources AS C', 'A.tender_source = C.source_id' );
        $this->db->join( 'ts_categories AS D', 'A.tender_category = D.category_id' );
        $this->db->join( 'ts_sub_categories AS E', 'A.tender_sub_category = E.sub_cat_id' );
        $this->db->join( 'ts_divisions AS F', 'A.tender_division = F.division_id' );
        $this->db->join( 'ts_districts AS G', 'A.tender_district = G.district_id' );
        $this->db->join( 'ts_procurement_methods AS H', 'A.tender_pro_method = H.pro_method_id' );

        $this->db->where( 'A.tender_auto_id', $id );

        return $this->db->get()->row();
    }

    /*
    Name        :   check_unique_value
    Authur      :   Ismail
    Created     :   24-01-18
    ModifiedBy  :
    ModifiedDate:
    */

    public function check_unique_value( $field, $value, $id ) {
        $this->db->select( '*' );

        $this->db->from( 'ts_tenders' );

        $this->db->where( "$field", $value );

        $this->db->where( 'tender_auto_id !=', $id );

        $query = $this->db->get();

        return ( $query->num_rows() >= 1 );
    }

    public function backup_tender_before_update( $tender_auto_id )
   {
    
        $tender_before_update = $this->db
        ->select( '*' )
        ->where( 'tender_auto_id', $tender_auto_id )
        ->get( 'ts_tenders' )
        ->row();
        $data = array();
        $data['tender_title'] = $tender_before_update->tender_title;
        $data['	tender_parent_id'] = $tender_before_update->tender_auto_id;
        $data['tender_manual_id'] = $tender_before_update->tender_manual_id;
        $data['tender_doc_price'] = $tender_before_update->tender_doc_price;
        $data['tender_security_amount'] = $tender_before_update->tender_security_amount;
        $data['tender_published_on'] = date('Y-m-d', strtotime($tender_before_update->tender_published_on));
        $data['tender_closed_on'] = date('Y-m-d', strtotime($tender_before_update->tender_closed_on));
        $data['tender_closed_time'] = $tender_before_update->tender_closed_time;
        $data['tender_prebid_meeting'] = date('Y-m-d', strtotime($tender_before_update->tender_prebid_meeting));
        $data['tender_opening'] = date('Y-m-d', strtotime($tender_before_update->tender_opening)); //04-03-18
        $data['tender_opening_time'] = $tender_before_update->tender_opening_time; //04-03-18
        $data['tender_schedule_purchase'] = date('Y-m-d', strtotime($tender_before_update->tender_schedule_purchase)); //04-03-18
        $data['tender_sche_pur_time'] = $tender_before_update->tender_sche_pur_time; //04-03-18
        
        $data['tender_inviter'] = $tender_before_update->tender_inviter;
        $data['tender_source'] = $tender_before_update->tender_source;
        $data['tender_division'] = $tender_before_update->tender_division;
        $data['tender_district'] = $tender_before_update->tender_district;

        $data['tender_procuring_div'] = $tender_before_update->tender_procuring_div; //06-03-18
        $data['tender_procuring_dist'] = $tender_before_update->tender_procuring_dist; //06-03-18

        $data['tender_category'] = $tender_before_update->tender_category;
        $data['tender_sub_category'] = $tender_before_update->tender_sub_category;
        $data['tender_pro_method'] = $tender_before_update->tender_pro_method;
        $data['tender_call_type'] = $tender_before_update->tender_call_type;
        $data['tender_on'] = $tender_before_update->tender_on;
        $data['tender_bidding_type'] = $tender_before_update->tender_bidding_type;
        $data['tender_img_url'] = $tender_before_update->tender_img_url;

        $this->db->insert("ts_tenders_updated", $data);
    }
}
