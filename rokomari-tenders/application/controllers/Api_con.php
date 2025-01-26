<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_con extends Backend_Controller {

    /*
    Name        :   __construct
    Authur      :   Ismail
    Created     :   14-11-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function __construct(){
        parent::__construct();
        
        // if (!$this->ion_auth->logged_in()){
        //     // redirect them to the login page
        //     redirect('admin/dashboard');
        // }elseif (!$this->ion_auth->is_admin() && !$this->ion_auth->is_invoice_generator() && !$this->ion_auth->is_setup_user() && !$this->ion_auth->is_stock_manager() && !$this->ion_auth->is_default_user()){
        //     // redirect them to the home page because they must be an administrator to view this
        //     return show_error('You must be an administrator to view this page.');
        // }

        // $this->load->model('Invoice_model');
    }

    /*
    Name        :   convert_price
    Authur      :   Ismail
    Created     :   14-11-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function convert_price($mrp, $curr_unit, $sale_unit)
    {
        $converted_price = $this->Common_model->convert_unit($mrp, $sale_unit, $curr_unit);

        echo $converted_price;
    }

}