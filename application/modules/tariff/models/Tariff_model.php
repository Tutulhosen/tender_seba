<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tariff_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
    Name        :   get_all_tariff
    Authur      :   Ismail
    Created     :   04-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_all_tariff() {
        $this->db->order_by('tariff_id', 'DESC');

        return $this->db->get('ts_tariffs')->result();
    }
}
