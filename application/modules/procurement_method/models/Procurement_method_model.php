<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Procurement_method_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
    Name        :   get_procure_methods
    Authur      :   Ismail
    Created     :   27-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_procure_methods() {
        $this->db->order_by('pro_method_name', 'ASC');

        return $this->db->get('ts_procurement_methods')->result();
    }

    /*
    Name        :   create_supplier
    Authur      :   Ismail
    Created     :   25-11-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function create_supplier($data) {
        return $this->db->insert('mt_suppliers', $data);
    }

    /*
    Name        :   get_supplier
    Authur      :   Ismail
    Created     :   25-11-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_supplier($id) {
        $this->db->where('supplier_id', $id);
        return $this->db->get('mt_suppliers')->row();
    }

    /*
    Name        :   update_supplier
    Authur      :   Ismail
    Created     :   25-11-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function update_supplier($id, $data) {
        $this->db->where('supplier_id', $id);

        return $this->db->update('mt_suppliers', $data);
    }
}
