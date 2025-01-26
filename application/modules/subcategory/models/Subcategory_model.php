<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subcategory_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
    Name        :   get_subcategories
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_subcategories() {
        $this->db->select('A.*, B.category_name');

        $this->db->from('ts_sub_categories AS A');
        $this->db->join('ts_categories AS B', 'A.category_id = B.category_id', 'LEFT');

        $this->db->order_by('A.sub_cat_name', 'ASC');

        return $this->db->get()->result();
    }

    /*
    Name        :   create_subcategory
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function create_subcategory($data) {
        return $this->db->insert('ts_sub_categories', $data);
    }

    /*
    Name        :   get_subcategory
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_subcategory($id) {
        $this->db->where('sub_cat_id', $id);
        return $this->db->get('ts_sub_categories')->row();
    }

    /*
    Name        :   update_subcategory
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function update_subcategory($id, $data) {
        $this->db->where('sub_cat_id', $id);

        return $this->db->update('ts_sub_categories', $data);
    }

    /*
    Name        :   delete_subcategory
    Authur      :   Ismail
    Created     :   12-10-17
    ModifiedBy  :
    ModifiedDate:
    */
    // public function delete_subcategory($id) {
    //     $this->db->where('sub_cat_id', $id);
    //     $this->db->delete('mt_sub_categories');
    // }

    /*
    Name        :   get_subcategories_by_category
    Authur      :   Ismail
    Created     :   23-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_subcategories_by_category($category_id) {
        $this->db->where('category_id', $category_id);

        return $this->db->get('ts_sub_categories')->result_array();
    }
}
