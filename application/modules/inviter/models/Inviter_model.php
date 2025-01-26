<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Inviter_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
    Name        :   get_inviters
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_inviters() {
        $this->db->order_by('inviter_name', 'ASC');

        return $this->db->get('ts_inviters')->result();
    }

    /*
    Name        :   check_unique_inviter
    Authur      :   Ismail
    Created     :   24-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function check_unique_inviter($name, $id) {
        $this->db->select('inviter_id');

        $this->db->where('inviter_name', $name);
        $this->db->where('inviter_id !=', $id);
        
        $query = $this->db->get('ts_inviters');

        return ($query->num_rows() >= 1);
    }
}
