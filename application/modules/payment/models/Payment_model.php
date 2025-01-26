<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
    Name        :   get_all_pay_his
    Authur      :   Ismail
    Created     :   31-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_all_pay_his() {
        $this->db->select('A.*, B.webu_email');

        $this->db->from('ts_payment_history AS A');

        $this->db->join('ts_web_user AS B', 'A.webu_id = B.webu_id');
        
        $this->db->order_by('payment_id', 'DESC');

        return $this->db->get()->result();
    }
}
