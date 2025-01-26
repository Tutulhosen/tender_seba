<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Source_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
    Name        :   get_all_sources
    Authur      :   Ismail
    Created     :   25-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_all_sources() {
        $this->db->order_by('source_name', 'ASC');

        return $this->db->get('ts_sources')->result();
    }
}
