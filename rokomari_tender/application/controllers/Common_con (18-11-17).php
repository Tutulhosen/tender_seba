<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_con extends Backend_Controller {

    /*
    Name        :   __construct
    Authur      :   Ismail
    Created     :   25-10-17
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
    Name        :   get_customer_invoices_and_pay_his
    Authur      :   Ismail
    Created     :   25-10-17
    ModifiedBy  :   Ismail
    ModifiedDate:   8-11-17     |   change (balance)
                    9-11-17     |   order by sales_inv_no
    */
    public function get_customer_invoices_and_pay_his()
    {
        $customer_id = $_POST['customer_id'];

        $customer_invoices = $this->Common_model->get_data_by('mt_sales_invoice', 'sales_inv_customer', $customer_id, null, null, 'sales_inv_no', 'desc');      //9-11-17

        $customer_invoices = $this->Common_model->get_2dropdown($customer_invoices, 'sales_inv_no', 'sales_inv_no', '-- Select Invoice --');

        $pay_his_details = $this->Common_model->get_data_by('mt_customer_payment', 'customer_id', $customer_id);

        $output_pay_his = '';
        $sl = 0;
        foreach($pay_his_details as $row_pay_his)
        {
            $sl++;
            $output_pay_his .= '<tr>';
            $output_pay_his .= '<td>' . $sl . '</td>';
            $output_pay_his .= '<td>' . $row_pay_his->payment_details . '</td>';
            $output_pay_his .= '<td>' . $row_pay_his->invoice_no . '</td>';
            $output_pay_his .= '<td>' . $row_pay_his->debit . '</td>';
            $output_pay_his .= '<td>' . $row_pay_his->credit . '</td>';
            if($row_pay_his->balance >= 0)
            {
                $output_pay_his .= '<td>(' . $row_pay_his->balance . ')</td>';
            }
            else
            {
                $output_pay_his .= '<td>' . ( (-1) * $row_pay_his->balance) . '</td>';
            }
            $output_pay_his .= '<td>' . date('d-m-Y', strtotime($row_pay_his->date)) . '</td>';
            $output_pay_his .= '</tr>';
        }

        $response = array(
            'payment_his' => $output_pay_his,
            'customer_invoices' => $customer_invoices
        );

        echo json_encode($response);
    }


    /*
    Name        :   get_customer_pay_his_by_invoice
    Authur      :   Ismail
    Created     :   30-10-17
    ModifiedBy  :   Ismail
    ModifiedDate:   9-11-17     | (balance) 
    */
    public function get_customer_pay_his_by_invoice()
    {
        $invoice_no = $_POST['invoice_no'];

        $cus_pay_his_by_inv = $this->Common_model->get_data_by('mt_customer_payment', 'invoice_no', $invoice_no);

        $output_pay_his_by_inv = '';
        $sl = 0;
        foreach($cus_pay_his_by_inv as $row_pay_his_by_inv)
        {
            $sl++;
            $output_pay_his_by_inv .= '<tr>';
            $output_pay_his_by_inv .= '<td>' . $sl . '</td>';
            $output_pay_his_by_inv .= '<td>' . $row_pay_his_by_inv->payment_details . '</td>';
            $output_pay_his_by_inv .= '<td>' . $row_pay_his_by_inv->invoice_no . '</td>';
            $output_pay_his_by_inv .= '<td>' . $row_pay_his_by_inv->debit . '</td>';
            $output_pay_his_by_inv .= '<td>' . $row_pay_his_by_inv->credit . '</td>';
            if($row_pay_his_by_inv->balance >= 0)
            {
                $output_pay_his_by_inv .= '<td>(' . $row_pay_his_by_inv->balance . ')</td>';
            }
            else
            {
                $output_pay_his_by_inv .= '<td>' . ( (-1) * $row_pay_his_by_inv->balance) . '</td>';
            }
            $output_pay_his_by_inv .= '<td>' . date('d-m-Y', strtotime($row_pay_his_by_inv->date)) . '</td>';
            $output_pay_his_by_inv .= '</tr>';
        }

        $response = array(
            'payment_his' => $output_pay_his_by_inv
        );

        echo json_encode($response);
    }

    /*
    Name        :   get_customer_invoices
    Authur      :   Ismail
    Created     :   25-10-17
    ModifiedBy  :
    ModifiedDate:
    */
    public function convert_price()
    {
        $curr_unit = $_POST['curr_unit'];
        $sale_unit = $_POST['sale_unit'];
        $mrp = $_POST['mrp'];

        $converted_price = $this->Common_model->convert_unit($mrp, $sale_unit, $curr_unit);

        echo $converted_price;
    }

}