<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Feedback_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
    Name        :   get_all_feedback
    Authur      :   Ismail
    Created     :   05-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_all_feedback() {

        $this->db->select('A.*, B.webu_email');

        $this->db->from('ts_feedbacks AS A');

        $this->db->join('ts_web_user AS B', 'A.webu_id = B.webu_id');

        $this->db->order_by('feedback_seen', 'ASC');
        $this->db->order_by('feedback_updated', 'DESC');

        return $this->db->get()->result();
    }
}
