<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class District_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
    Name        :   get_districts
    Authur      :   Ismail
    Created     :   25-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_districts() {
        $this->db->select('A.*, B.division_name');

        $this->db->from('ts_districts AS A');

        $this->db->join('ts_divisions AS B', 'A.division_id = B.division_id');

        $this->db->order_by('district_name', 'ASC');

        return $this->db->get()->result();
    }
}
