<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //Updated: 04-03-18 - Ismail - add two more pera 
    public function get_data($table, $order_field = null, $order_value = null, $limit=null) {
        $this->db->select('*');
        $this->db->from($table);

        if($order_field != null)
        {
            $this->db->order_by($order_field, $order_value);    //04-03-18
        }
        $this->db->limit($limit);
        $query =  $this->db->get();
        
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_data_by_id($table, $field, $id , $order_field = null, $order_value = null) {
        $this->db->select('*');
        $this->db->from($table);

        $this->db->where($field, $id);    //04-03-18


        if($order_field != null)
        {
            $this->db->order_by($order_field, $order_value);    //04-03-18
        }

        $query =  $this->db->get();
        
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function save($table, $data) {
        if ($this->db->insert($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    /*
    Name        :   edit
    Authur      :   
    Created     :   
    ModifiedBy  :   Ismail
    ModifiedDate:   26-10-17
    */
    public function edit($table, $field, $value, $data) {
        $this->db->where($field, $value);

        if ($this->db->update($table, $data)) {
            return true;
        } else {
            return false;
        }
    }


    /*
    Name        :   exists
    Authur      :   
    Created     :   
    ModifiedBy  :   Ismail
    ModifiedDate:   08-03-18
    */
    public function exists($table, $field, $item, $field_2 = null, $value_2 = null ) {
        $this->db->from($table);
        $this->db->where($field, $item);

        if($field_2 != null)
        {
            $this->db->where($field_2, $value_2);   //08-03-18
        }

        $query = $this->db->get();

        return ($query->num_rows() >= 1);
    }


    /*
    Name        :   delete_data
    Authur      :   Ismail
    Created     :   08-03-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function delete_data($table, $field, $item, $field_2 = null, $value_2 = null ) 
    {
        $this->db->where($field, $item);

        if($field_2 != null)
        {
            $this->db->where($field_2, $value_2); 
        }

        $this->db->delete($table);

        return ($this->db->affected_rows() >= 1);
    }

    
    /*
    Name        :   get_dropdown
    Authur      :   Ismail
    Created     :   12-10-17
    ModifiedBy  :   Ismail
    ModifiedDate:   10-03-18
    */
    public function get_dropdown($table, $field1, $field2, $text, $order_field = null, $order_value = null)
    {
        $data[''] = $text;

        $this->db->select("$field1, $field2");
        $this->db->from($table);

        if($order_field != null)
        {
            $this->db->order_by($order_field, $order_value);    //10-03-18
        }

        $result = $this->db->get()->result_array();

        foreach($result as $row)
        {
            $data[$row[$field1]] = $row[$field2];
        }

        return $data;
    }

    /*
    Name        :   get_1dropdown
    Authur      :   Ismail
    Created     :   15-10-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_1dropdown($result, $field1, $field2, $text)
    {
        $data[''] = $text;

        foreach($result as $row)
        {
            $data[$row->$field1] = $row->$field2;
        }

        return $data;
    }
    
    /*
    Name        :   get_dropdown2
    Authur      :   Ismail
    Created     :   12-10-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_dropdown2($result, $field1, $field2, $text)
    {
        $data = '<option value="" >' . $text . '</option>';

        foreach($result as $row)
        {
            $data .= '<option value="'. $row[$field1] .'">' . $row[$field2] . '</option>';
        }

        return $data;
    }
    
    /*
    Name        :   get_2dropdown
    Authur      :   Ismail
    Created     :   25-10-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_2dropdown($result, $field1, $field2, $text)
    {
        $data = '<option value="" >' . $text . '</option>';

        foreach($result as $row)
        {
            $data .= '<option value="'. $row->$field1 .'">' . $row->$field2 . '</option>';
        }

        return $data;
    }

    /*
    Name        :   get_dropdown3
    Authur      :   Ismail
    Created     :   12-10-17
    ModifiedBy  :   Ismail
    ModifiedDate:   14-10-17
    */
    public function get_dropdown3($table, $field1, $field2, $text)
    {
        $this->db->select("$field1, $field2");
        $this->db->from($table);
        $result = $this->db->get()->result();

        $data = '<option value="" >' . $text . '</option>';

        foreach($result as $row)
        {
            $data .= '<option value="'. $row->$field1 .'">' . $row->$field2 . '</option>';
        }

        return $data;
    }


    /*
    Name        :   get_data_by
    Parameter   :   7 - Seven
    Authur      :   Ismail
    Created     :   14-10-17
    ModifiedBy  :   Ismail
    ModifiedDate:   8-11-17     |   add 2 perameter for order_by
    */
    public function get_data_by($table, $field_name, $field_value, $field_2 = null, $value_2 = null, $order_field = null, $order_value = null)
    {
        $this->db->where("$field_name", $field_value);

        if($value_2 != null)
        {
            $this->db->where("$field_2", $value_2);
        }

        if($order_field != null)
        {
            //8-11-17
            $this->db->order_by($order_field, $order_value);
        }

        $this->db->from($table);
        $result = $this->db->get()->result();

        return $result;
    }

    /*
    Name        :   get_data2_by_like
    Authur      :   Ismail
    Created     :   03-03-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function get_data2_by_like($table, $field_name, $field_value, $before_after_both = 'both')
    {
        $this->db->like("$field_name", $field_value, $before_after_both);

        $this->db->from($table);
        
        $result = $this->db->get()->result();

        return $result;
    }
    
    /*
    Name        :   convert_unit
    Authur      :   Ismail
    Created     :   16-10-17
    ModifiedBy  :   Ismail
    ModifiedDate:   17-10-17
    */
    public function convert_unit($qty, $from, $to)
    {
        $from = $this->db->select('unit_name')
                        ->where('unit_id', $from)
                        ->get('mt_units')->row()->unit_name;

        $to = $this->db->select('unit_name')
                        ->where('unit_id', $to)
                        ->get('mt_units')->row()->unit_name;

        if($from == 'Yard' && $to == 'Coil')
        {
            return round(((1/109) * $qty), 2);
        }
        if($from == 'Yard' && $to == 'Feet')
        {
            return round((3 * $qty), 2);
        }
        if($from == 'Yard' && $to == 'Meter')
        {
            return round(((1/1.09) * $qty), 2);
        }

        if($from == 'Coil' && $to == 'Yard')
        {
            return round((109 * $qty), 2);
        }
        if($from == 'Coil' && $to == 'Meter')
        {
            return round((100 * $qty), 2);
        }
        if($from == 'Coil' && $to == 'Feet')
        {
            return round((327 * $qty), 2);
        }

        if($from == 'Meter' && $to == 'Coil')
        {
            return round(((1/100) * $qty), 2);
        }
        if($from == 'Meter' && $to == 'Feet')
        {
            return round((3.27 * $qty), 2);
        }
        if($from == 'Meter' && $to == 'Yard')
        {
            return round((1.09 * $qty), 2);
        }

        if($from == 'Feet' && $to == 'Coil')
        {
            return round((( 1/( 3*109 ) ) * $qty), 2);
        }
        if($from == 'Feet' && $to == 'Meter')
        {
            return round(( (1/3.27) * $qty), 2);
        }
        if($from == 'Feet' && $to == 'Yard')
        {
            return round(( (1/3) * $qty), 2);
        }

        return $qty;
    }
    
    /*
    Name        :   get_name
    Authur      :   Ismail
    Created     :   16-10-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function get_name($table, $get_name, $field_name, $field_value)
    {
        $this->db->select("$get_name");
        $this->db->where("$field_name", $field_value);
        $this->db->from("$table");

        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row()->$get_name;

        return '';
    }
    
    /*
    Name        :   get_2name
    Authur      :   Ismail
    Created     :   26-10-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function get_2name($table, $get_name, $field_1, $value_1, $field_2, $value_2)
    {
        $this->db->select("$get_name");

        $this->db->where("$field_1", $value_1);
        $this->db->where("$field_2", $value_2);
        
        $this->db->from("$table");

        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row()->$get_name;

        return '';
    }
    
    /*
    Name        :   get_3name
    Authur      :   Ismail
    Created     :   11-11-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function get_3name($table, $get_name, $field_1, $value_1, $field_2, $value_2, $field_3, $value_3)
    {
        $this->db->select("$get_name");

        $this->db->where("$field_1", $value_1);
        $this->db->where("$field_2", $value_2);
        $this->db->where("$field_3", $value_3);
        
        $this->db->from("$table");

        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row()->$get_name;

        return '';
    }

    /*
    Name        :   get_product_details_by_company
    Authur      :   Ismail
    Created     :   16-10-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function get_product_details_by_company($product_id, $company_id)
    {
        $this->db->select('A.*, B.product_name, C.company_name');

        $this->db->from('mt_product_to_company AS A');
        $this->db->join('mt_products AS B', 'A.product_id = B.product_id');
        $this->db->join('mt_companies AS C', 'A.company_id = C.company_id');

        $this->db->where('A.product_id', $product_id);
        $this->db->where('A.company_id', $company_id);
        
        return $this->db->get()->row_array();
    }

    /*
    Name        :   create
    Authur      :   Ismail
    Created     :   22-10-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function create($table, $data)
    {
        $this->db->insert("$table", $data);
    }

    /*
    Name        :   edit_2
    Authur      :   Ismail
    Created     :   24-10-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function edit_2($table, $field_1, $value_1, $field_2, $value_2, $data) {
        $this->db->where($field_1, $value_1);
        $this->db->where($field_2, $value_2);
        if ($this->db->update($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    /*
    Name        :   get_customer_balance
    Authur      :   Ismail
    Created     :   23-10-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function get_customer_balance($customer_id)
    {

        $sql = 'SELECT balance FROM mt_customer_payment 
                WHERE customer_id = '. $customer_id .' AND id = (SELECT MAX(id) 
                FROM mt_customer_payment WHERE customer_id = '. $customer_id .')';
        $query = $this->db->query($sql);

        if($query->num_rows() > 0)
        {
            return $query->row()->balance;
        }

        return 0.00;
    }

    /*
    Name        :   get_single_row_by
    Authur      :   Ismail
    Created     :   26-10-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function get_single_row_by($table, $field_name, $field_value, $field_2 = null, $value_2 = null)
    {
        $this->db->where("$field_name", $field_value);

        if($value_2 != null)
        {
            $this->db->where("$field_2", $value_2);
        }

        $this->db->from($table);

        $row = $this->db->get()->row_array();

        return $row;
    }


    /*
    Name        :   create_with_return_id
    Authur      :   Ismail
    Created     :   29-10-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function create_with_return_id($table, $data)
    {
        $this->db->insert("$table", $data);

        return $this->db->insert_id();
    }


    /*
    Name        :   check_unique_for_callback
    Authur      :   Ismail
    Created     :   29-10-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function check_unique_for_callback($table, $unique_field, $unique_value, $id_field, $id_value)
    {
        $this->db->select("*");

        $this->db->where("$unique_field", $unique_value);
        $this->db->where("$id_field !=", $id_value);

        $query = $this->db->get("$table");

        return ($query->num_rows() >= 1);
    }


    /*
    Name        :   get_payment_history_by_user
    Authur      :   Ismail
    Created     :   01-02-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function get_payment_history_by_user($webu_id)
    {
        $this->db->select("A.*, B.*");

        $this->db->from('ts_payment_history AS A');

        $this->db->join('ts_web_user AS B', 'A.webu_id = B.webu_id');

        $this->db->where("B.webu_id", $webu_id);

        return $this->db->get()->result();
    }


    /*
    Name        :   get_user_cats
    Authur      :   Ismail
    Created     :   22-02-18
    ModifiedBy  :   Ismail
    ModifiedDate:   04-03-18
    */
    public function get_user_cats($webu_id)
    {
        $this->db->select("A.*, B.sub_cat_name, B.sub_cat_id");

        $this->db->from('ts_user_cat_list AS A');

        $this->db->join('ts_sub_categories AS B', 'A.ucat_sub_cat_id = B.sub_cat_id');

        $this->db->where("A.ucat_user_id", $webu_id);

        $this->db->order_by("B.sub_cat_name", 'ASC');   //04-03-18

        return $this->db->get()->result();
    }
    public function get_user_pkg($webu_id)
    {
        if(empty($webu_id))
        {
            return ;
        }
        $sql="SELECT *from ts_user_pkg_list INNER join ts_packages on ts_user_pkg_list.upkg_pkg_id=ts_packages.pkg_id WHERE ts_user_pkg_list.upkg_user_id=$webu_id ORDER BY ts_user_pkg_list.upkg_id DESC LIMIT 1;";    
        $query = $this->db->query($sql);
        return $query->row();
    }
    
    public function get_cat_tender_count($key,$val)
    {
        $sql="SELECT count(*) as total_tender FROM `ts_tenders` WHERE $key = $val";    
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function user_info()
    {
        $user_id=$this->session->userdata('user_id');
        $sql="SELECT * from ts_web_user  WHERE webu_id= $user_id ";    
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function get_tender_product_count()
    {
        $user_id=$this->session->userdata('user_id');
        $sql="SELECT * from ts_user_pkg_list  WHERE upkg_user_id= $user_id ";    
        $query = $this->db->query($sql);
        $user_pck_id=  $query->row();
        if (!empty($user_pck_id)) {
            $user_pcks_id=$user_pck_id->upkg_pkg_id;
            $sql="SELECT * from ts_packages INNER join ts_user_pkg_list on ts_packages.pkg_id=ts_user_pkg_list.upkg_pkg_id WHERE ts_packages.pkg_id=$user_pcks_id";    
            $query = $this->db->query($sql);
            return $query->row();
        }
        
      
       
    }

    public function get_user_count($key,$val)
    {
        $sql="SELECT count(*) as total_tender FROM `ts_tenders` WHERE $key = $val";    
        $query = $this->db->query($sql);
        return $query->row();
    }


        //get favourate tenders
        public function get_fav_tender($save_tender_id){

            $user_id = $this->session->userdata('user_id');
            $this->db->select('A.*, B.inviter_name, C.pro_method_name');
            $this->db->from('ts_tenders AS A');
            $this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');
            $this->db->join('ts_procurement_methods AS C', 'A.tender_pro_method = C.pro_method_id');
            $this->db->join('ts_user_cat_list AS D', 'A.tender_sub_category = D.ucat_sub_cat_id');
            $this->db->where('D.ucat_user_id', $user_id);
            $this->db->where_in('A.tender_auto_id', $save_tender_id);
            return $this->db->get()->result();

        }
    
   
    
}
