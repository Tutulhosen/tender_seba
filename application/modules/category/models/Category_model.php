<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
    Name        :   get_categories
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_categories() {
        $this->db->order_by('category_name', 'ASC');

        return $this->db->get('ts_categories')->result();
    }

    /*
    Name        :   create_category
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function create_category($data) {
        return $this->db->insert('ts_categories', $data);
    }

    /*
    Name        :   get_category
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_category($id) {
        $this->db->where('category_id', $id);
        return $this->db->get('ts_categories')->row();
    }

    /*
    Name        :   update_category
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function update_category($id, $data) {
        $this->db->where('category_id', $id);

        return $this->db->update('ts_categories', $data);
    }

    /*
    Name        :   delete_category
    Authur      :   Ismail
    Created     :   12-10-17

    ModifiedBy  :
    ModifiedDate:
    */
    // public function delete_category($id) {
    //     $this->db->where('category_id', $id);
    //     $this->db->delete('ts_categories');
    // }
}
