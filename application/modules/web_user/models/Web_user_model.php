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
    ModifiedBy  :   Ismail
    ModifiedDate:   05-03-18
    */
    public function get_all_web_user($field = null, $value = null, $field_2 = null, $value_2 = null) 
    {
        if($field != null)
        {
            //05-03-18
            $this->db->where("$field", $value);
        }

        if($field_2 != null)
        {
            //05-03-18
            $this->db->where("$field_2", $value_2);
        }

        $this->db->order_by('webu_created', 'DESC');

        return $this->db->get('ts_web_user')->result();
    }
}
