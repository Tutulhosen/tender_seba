<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manage_user_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

     public function user_list() {
        // count query
        $this->db->select('*');
        $this->db->from('users');
        // $this->db->where('student_id <=',0);
        $query = $this->db->get()->result();

        return $query;
    }

    public function get_data() {
        // count query
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get()->result();

        return $query;
    }

    public function get_info($id) {
        $query = $this->db->from('users')
                        ->where('id', $id)
                        ->get()->row();
        return $query;
    }

    function delete($id) {
        $img_path = 'student_img/';
        $info = $this->get_info($id);

        if(file_exists($img_path.$info->image)){
           @unlink($img_path.$info->image);
        }

        $this->db->where('id', $id);
        $this->db->delete('users');
        
        return TRUE;
    }

}
