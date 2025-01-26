<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_data($table) {
        $this->db->select('*');
        $this->db->from($table);
        $query =  $this->db->get();
        
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    /*
    Name        :   save
    Authur      :   Ismail
    Created     :   20-11-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function save($table, $data) {
        if ($this->db->insert($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    /*
    Name        :   edit
    Authur      :   Ismail
    Created     :   20-11-17
    ModifiedBy  :   
    ModifiedDate:   
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
    Authur      :   Ismail
    Created     :   21-11-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function exists($table, $field, $item ) {
        $this->db->from($table);
        $this->db->where($field, $item);
        $query = $this->db->get();

        return ($query->num_rows() >= 1);
    }

    /*
    Name        :   exists_2_not_equal
    Authur      :   Ismail
    Created     :   23-12-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function exists_2_not_equal($table, $field_1, $item_1, $field_2, $item_2) 
    {
        $this->db->from($table);
        
        $this->db->where("$field_1 !=", $item_1);
        
        $this->db->where($field_2, $item_2);
        
        $query = $this->db->get();

        return ($query->num_rows() >= 1);
    }

    
    /*
    Name        :   get_dropdown
    Authur      :   Ismail
    Created     :   03-12-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_dropdown($table, $field1, $field2, $text)
    {
        $data[''] = $text;

        $this->db->select("$field1, $field2");
        $this->db->from($table);
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
    Created     :   03-12-17
    ModifiedBy  :   
    ModifiedDate:   
    for Elite Car
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
            $this->db->order_by($order_field, $order_value);
        }

        $this->db->from($table);
        $result = $this->db->get()->result();

        return $result;
    }
    
    /*
    Name        :   get_name
    Authur      :   Ismail
    Created     :   30-11-17
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
    Name        :   get_single_row_by
    Authur      :   Ismail
    Created     :   30-11-17
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
    Name        :   check_driver_on_job_by_date
    Authur      :   Ismail
    Created     :   10-12-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function check_driver_on_job_by_date($driver_id, $date)
    {
        $result = $this->db->where('driver_id', $driver_id)
                          ->where('start_date <=', $date)
                          ->where('end_date >=', $date)
                          ->get('ec_reservation_assign');
        
        if($result->num_rows() > 0)
            return 1;

        return 0;
    }


    /*
    Name        :   get_reservation_by_id
    Authur      :   Ismail
    Created     :   27-11-17
    ModifiedBy  :   Ismail
    ModifiedDate:   10-12-17    | moved to common_model from reservation_model
    */
    public function get_reservation_by_id($id) 
    {
        $this->db->select('A.*, A.id as reservation_id, B.user_name, B.user_phone, C.type_name, C.basic_price, C.mileage_cost, C.basic_hour, C.per_hour_ot_price, C.food_allowance, C.night_hold_allowance, D.end_date, D.created as assigned_date, E.driver_name, E.id as driver_id');

        $this->db->from('ec_reservation AS A');

        $this->db->join('ec_user_tbl AS B', 'A.app_user_id = B.id');
        $this->db->join('ec_car_types AS C', 'A.type_id = C.id');
        $this->db->join('ec_reservation_assign AS D', 'A.id = D.reservation_id', 'LEFT');
        $this->db->join('ec_driver_tbl AS E', 'D.driver_id = E.id', 'LEFT');

        $this->db->where('A.id', $id);

        $this->db->order_by('id', 'DESC');

        return $this->db->get()->row_array();
    }

    /*
    Name        :   get_assigned_driver_details
    Authur      :   Ismail
    Created     :   26-12-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function get_assigned_driver_details($reservation_id)
    {
        $this->db->select('driver_name, driver_phone, car_reg_no, car_model, A.id as driver_id');

        $this->db->from('ec_driver_tbl AS A');

        $this->db->join('ec_reservation_assign AS B', 'A.id = B.driver_id', 'LEFT');

        $this->db->where('B.reservation_id', $reservation_id);

        return $this->db->get()->row();
    }


    /*
    Name        :   get_daily_det_summary_for_whole_trip
    Authur      :   Ismail
    Created     :   27-12-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function get_daily_det_summary_for_whole_trip($reservation_id)
    {
        $this->db->select('SUM(A.distance) as total_distance, SUM(A.night_stay) as total_day_night_stay, SUM(A.other_cost) as total_other_cost, SUM(A.total_hour) as total_hour');

        $this->db->from('ec_driver_daily_det AS A');

        $this->db->where('reservation_id', $reservation_id);

        return $this->db->get()->row();
    }

    /*
    Name        :   calculate_reservation_fare
    Authur      :   Ismail
    Created     :   28-12-17
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function calculate_reservation_fare($reservation_id)
    {
        $data_fare = array();
        $data_fare['reservation_id'] = $reservation_id;

        $reservation_det = $this->get_reservation_by_id($reservation_id);
        $daily_det_sum = $this->get_daily_det_summary_for_whole_trip($reservation_id);

        $data_fare['total_day'] = $reservation_det['no_of_days'];
        $data_fare['total_day_cost'] = $reservation_det['no_of_days'] * $reservation_det['basic_price'];
        $data_fare['total_distance'] = $daily_det_sum->total_distance;
        $data_fare['total_distance_cost'] = ($daily_det_sum->total_distance / 1000) * $reservation_det['mileage_cost'];
        $data_fare['total_night_stay'] = $daily_det_sum->total_day_night_stay;
        $data_fare['total_night_stay_cost'] = $daily_det_sum->total_day_night_stay * $reservation_det['night_hold_allowance'];
        $data_fare['total_hour'] = $daily_det_sum->total_hour;

        $total_basic_hour = $reservation_det['basic_hour'] * $reservation_det['no_of_days'];
        $data_fare['total_extra_hour'] = $data_fare['total_hour'] - $total_basic_hour;

        if($data_fare['total_extra_hour'] > 0)
        {
            $data_fare['total_extra_hour_cost'] = $data_fare['total_extra_hour'] * $reservation_det['per_hour_ot_price'];
        }
        else
        {
            $data_fare['total_extra_hour_cost'] = 0;
        }

        $data_fare['total_other_cost'] = $daily_det_sum->total_other_cost;
        $data_fare['total_food_allowance_cost'] = $reservation_det['no_of_days'] * $reservation_det['food_allowance'];

        $data_fare['total_fare'] = $data_fare['total_day_cost'] + $data_fare['total_distance_cost'] + $data_fare['total_night_stay_cost'] + $data_fare['total_extra_hour_cost'] + $data_fare['total_other_cost'] + $data_fare['total_food_allowance_cost'];
        $data_fare['created'] = date('Y-m-d H:i:s');

        $this->save('ec_reservation_fare', $data_fare);
    }


    /*
    Name        :   get_total_driver_online
    Authur      :   Ismail
    Created     :   09-01-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function get_total_driver_online()
    {
        return $this->db->select('id')->where('status', 1)->get('ec_driver_tbl')->num_rows();
    }


    /*
    Name        :   get_total_driver_onjob
    Authur      :   Ismail
    Created     :   09-01-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function get_total_driver_onjob()
    {
        $this->db->select('A.id');

        $this->db->from('ec_driver_tbl AS A');

        $this->db->join('ec_reservation_assign AS B', 'A.id = B.driver_id');
        $this->db->join('ec_reservation AS C', 'B.reservation_id = C.id');

        $this->db->where('C.status', 3); 

        return $this->db->get()->num_rows();
    }


    /*
    Name        :   get_job_completed_by_month
    Authur      :   Ismail
    Created     :   09-01-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function get_job_completed_by_month($mnth)
    {
        $this->db->select('A.id');

        $this->db->from('ec_reservation AS A');

        $this->db->join('ec_reservation_assign AS B', 'A.id = B.reservation_id');

        $this->db->where('A.status', 4); 
        $this->db->where('month(B.end_date)', $mnth); 

        return $this->db->get()->num_rows();
    }


    /*
    Name        :   get_job_by_status
    Authur      :   Ismail
    Created     :   09-01-18
    ModifiedBy  :   
    ModifiedDate:   
    */
    public function get_job_by_status($status)
    {
        $this->db->select('A.id');

        $this->db->from('ec_reservation AS A');

        $this->db->where('A.status', $status); 

        return $this->db->get()->num_rows();
    }
}
