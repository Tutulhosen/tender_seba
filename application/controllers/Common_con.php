<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_con extends Backend_Controller {

    /*
    Name        :   __construct
    Authur      :   Ismail
    Created     :   25-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function __construct(){
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()){
            // redirect them to the login page
            redirect('admin/dashboard');
        }elseif (!$this->ion_auth->is_admin() && !$this->ion_auth->is_invoice_generator() && !$this->ion_auth->is_setup_user() && !$this->ion_auth->is_stock_manager() && !$this->ion_auth->is_default_user()){
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }

        // $this->load->model('Invoice_model');
    }


    /*
    Name        :   get_sub_cat_by_cat
    Authur      :   Ismail
    Created     :   25-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_sub_cat_by_cat()
    {
        $category_id = $_POST['category_id'];

        $all_subcategory = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $category_id);

        echo $this->Common_model->get_2dropdown($all_subcategory, 'sub_cat_id', 'sub_cat_name', '-- Select Sub Category --');
    }


    /*
    Name        :   get_dist_by_divi
    Authur      :   Ismail
    Created     :   25-01-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_dist_by_divi()
    {
        $division_id = $_POST['division_id'];

        $all_district = $this->Common_model->get_data_by('ts_districts', 'division_id', $division_id);

        echo $this->Common_model->get_2dropdown($all_district, 'district_id', 'district_name', '-- Select District --');
    }


    /*
    Name        :   get_user_pay_history
    Authur      :   Ismail
    Created     :   03-02-18
    ModifiedBy  :
    ModifiedDate:
    */
    public function get_user_pay_history()
    {
        $webu_id = $_POST['webu_id'];

        $all_pay_his_by_user = $this->Common_model->get_data_by('ts_payment_history', 'webu_id', $webu_id);

        if(empty($all_pay_his_by_user))
            $output = '<tr><td colspan="4" style="color: red;">No payment history found!</td></tr>';
        else
            $output = '';
    
        foreach($all_pay_his_by_user as $value)
        {
            $output .= '<tr>';

            $mnth_year = '01-' . $value->payment_month . '-' . $value->payment_year;
            $mnth_year = date('M Y', strtotime($mnth_year));

            $output .= '<td>' . $mnth_year . '</td>';
            $output .= '<td>' . date('d-m-Y', strtotime($value->payment_date)) . '</td>';
            $output .= '<td>' . $value->payment_amount . '</td>';

            if($value->payment_by == 1)
                $output .= '<td style="background-color: #d3d3d3;">Bkash</td>';
            else if($value->payment_by == 2)
                $output .= '<td style="background-color: #ffffe0;">Bank</td>';
            else if($value->payment_by == 3)
                $output .= '<td style="background-color: #98fb98;">Cash</td>';
        
            $output .= '</tr>';
        }

        echo $output;
    }

}