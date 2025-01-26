<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    /*
    Name        :   check_driver_login
    Authur      :   Ismail
    Created     :   20-11-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function check_driver_login($identity, $password)
    {
        $this->db->where('driver_email', $identity);
        $this->db->where('password', $password);

        $result = $this->db->get('ec_driver_tbl');

        if($result->num_rows() > 0)
        {
            $response['status'] = true;
            $response['result'] = $result->row_array();

            return $response;
        }

        $response['status'] = false;
        return $response;
    }


    /*
    Name        :   check_user_login
    Authur      :   Ismail
    Created     :   21-11-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function check_user_login($identity, $password)
    {
        $this->db->where('user_email', $identity);
        $this->db->where('user_password', $password);

        $result = $this->db->get('ec_user_tbl');

        if($result->num_rows() > 0)
        {
            $response['status'] = true;
            $response['result'] = $result->row_array();

            return $response;
        }

        $response['status'] = false;
        return $response;
    }


    /*
    Name        :   get_app_user_details
    Authur      :   Ismail
    Created     :   25-11-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_app_user_details($app_user_id)
    {
        $this->db->where('id', $app_user_id);

        return $this->db->get('ec_user_tbl')->row_array();
    }


    /*
    Name        :   get_driver_details
    Authur      :   Ismail
    Created     :   25-11-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_driver_details($driver_id)
    {
        $this->db->where('id', $driver_id);

        return $this->db->get('ec_driver_tbl')->row_array();
    }

    /*
    Name        :   get_resrvtn_id_by_drvr_by_date
    Authur      :   Ismail
    Created     :   03-12-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_resrvtn_id_by_drvr_by_date($driver_id, $date)
    {
        $this->db->select('reservation_id');

        $this->db->where('driver_id', $driver_id);
        $this->db->where('start_date <=', $date);
        $this->db->where('end_date >=', $date);

        $query = $this->db->get('ec_reservation_assign');

        if($query->num_rows() > 0)
        {
            return $query->row()->reservation_id;
        }

        return 0;
    }


    /*
    Name        :   check_driver_start_trip
    Authur      :   Ismail
    Created     :   03-12-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function check_driver_start_trip($driver_id, $reservation_id, $start_lat, $start_long)
    {
        $this->db->where('driver_id', $driver_id);
        $this->db->where('reservation_id', $reservation_id);
        $this->db->where('start_lat', $start_lat);
        $this->db->where('start_long', $start_long);

        return $this->db->get('ec_driver_daily_det')->num_rows();
    }


    /*
    Name        :   check_driver_already_closed_trip
    Authur      :   Ismail
    Created     :   03-12-17
    ModifiedBy  :   Ismail
    ModifiedDate:   09-12-17
    */
    public function check_driver_already_closed_trip($daily_det_id)
    {
        //comment out 09-12-17
        // $this->db->where('driver_id', $driver_id);
        // $this->db->where('reservation_id', $reservation_id);
        // $this->db->where('start_lat', $start_lat);
        // $this->db->where('start_long', $start_long);

        $this->db->where('id', $daily_det_id);      //09-12-17

        $this->db->where('end_lat', '');
        $this->db->where('end_long', '');

        return $this->db->get('ec_driver_daily_det')->num_rows();
    }


    /*
    Name        :   update_driver_daily_det
    Authur      :   Ismail
    Created     :   03-12-17
    ModifiedBy  :   Ismail
    ModifiedDate:   09-12-17    || no need for this function 
    */
    // public function update_driver_daily_det($daily_det_id, $data)
    // {
    //     // comment out on 09-12-17
    //     // $this->db->where('driver_id', $driver_id);
    //     // $this->db->where('reservation_id', $reservation_id);
    //     // $this->db->where('start_lat', $start_lat);
    //     // $this->db->where('start_long', $start_long);

    //     $this->db->where('id', $daily_det_id);

    //     return $this->db->update('ec_driver_daily_det', $data);
    // }


    /*
    Name        :   get_driver_all_assigned_job
    Authur      :   Ismail
    Created     :   03-12-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_driver_all_assigned_job($driver_id)
    {
        $this->db->select('A.*, C.user_phone');
        
        $this->db->from('ec_reservation AS A');

        $this->db->join('ec_reservation_assign AS B', 'A.id = B.reservation_id');
        $this->db->join('ec_user_tbl AS C', 'A.app_user_id = C.id');

        $this->db->where('B.driver_id', $driver_id);

        return $this->db->get()->result();
    }


    /*
    Name        :   check_is_last_day_of_reservation
    Authur      :   Ismail
    Created     :   09-12-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function check_is_last_day_of_reservation($reservation_id, $driver_id)
    {
        $this->db->where('reservation_id', $reservation_id);
        $this->db->where('driver_id', $driver_id);
        $this->db->where('end_date', date('Y-m-d'));

        $query = $this->db->get('ec_reservation_assign');

        if($query->num_rows() > 0)
            return 1;

        return 0;
    }
}