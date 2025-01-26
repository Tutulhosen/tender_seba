<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Division_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
    Name        :   get_divisions
    Authur      :   Ismail
    Created     :   25-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_divisions() {
        $this->db->order_by('division_name', 'ASC');

        return $this->db->get('ts_divisions')->result();
    }
}
