<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$meta_title;?> </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/plugins/iCheck/all.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/plugins/select2/select2.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">
  <!-- text Editor -->
  <!-- <link rel="stylesheet" href="<?=base_url();?>awedget/assets/plugins/texteditor/editor.css"> -->

  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?=base_url();?>awedget/assets/css/custom.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- jQuery 2.2.3 -->
  <script src="<?=base_url();?>awedget/assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="<?=base_url().'admin/dashboard';?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"> Admin Panel</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="javascript:void();" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li><a target="_blank" href="http://mirpurtraders.com/" class="btn btn-success">Visit Website</a></li>
          <li class="dropdown user user-menu">
            <a href="javascript:void();" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url();?>awedget/assets/img/no-avatar.jpeg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=ucwords($this->session->userdata('first_name').' '.$this->session->userdata('last_name'));?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?=base_url();?>awedget/assets/img/no-avatar.jpeg" class="img-circle" alt="User Image">
                <p><small>Member since <strong><?=date('j F, Y', $this->session->userdata('created_on'));?></strong></small> </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="javascript:void();" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url('login/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>awedget/assets/img/no-avatar.jpeg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=ucwords($this->session->userdata('first_name').' '.$this->session->userdata('last_name'));?></p>
          <a href="javascript:void();"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview <?=backend_activate_menu_class('dashboard');?>"> <a href="<?=base_url('admin/dashboard');?>"> <i class="fa fa-dashboard"></i> <span>Dashboard</span></a> </li>     

        <?php if($this->ion_auth->is_admin() || $this->ion_auth->is_setup_user() ) : ?>

        <li class="treeview <?=backend_activate_menu_class('inviter');?> <?=backend_activate_menu_class('source');?> <?=backend_activate_menu_class('division');?> <?=backend_activate_menu_class('district');?> <?=backend_activate_menu_class('category');?> <?=backend_activate_menu_class('subcategory');?> <?=backend_activate_menu_class('procurement_method');?>">
          <a href="javascript:void();">
            <i class="fa fa-cogs"></i> <span>Setup</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('inviter');?>"><i class="fa fa-circle-o"></i> Inviter</a></li>
            <li><a href="<?=base_url('source');?>"><i class="fa fa-circle-o"></i> Source</a></li>
            <li><a href="<?=base_url('division');?>"><i class="fa fa-circle-o"></i> Division</a></li>
            <li><a href="<?=base_url('district');?>"><i class="fa fa-circle-o"></i> District</a></li>
            <li><a href="<?=base_url('category');?>"><i class="fa fa-circle-o"></i> Category</a></li>
            <li><a href="<?=base_url('subcategory');?>"><i class="fa fa-circle-o"></i> Sub Category</a></li>
            <li><a href="<?=base_url('procurement_method');?>"><i class="fa fa-circle-o"></i> Procurement Method</a></li>
            <li><a href="<?=base_url('package_settings');?>"><i class="fa fa-circle-o"></i> Package Settings</a></li>
          </ul>
        </li>
        <?php endif; ?>

        <?php if($this->ion_auth->is_admin() || $this->ion_auth->is_stock_manager() ) : ?>
        <li class="treeview <?=backend_activate_menu_class('tender');?> ">
          <a href="javascript:void();">
            <i class="fa fa-list"></i> <span>Tender</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('tender/add');?>"><i class="fa fa-circle-o"></i> Tender Insert</a></li>
            <li><a href="<?=base_url('tender');?>"><i class="fa fa-circle-o"></i> Tender List</a></li>
          </ul>
        </li>
        <?php endif; ?>

        <?php if($this->ion_auth->is_admin() || $this->ion_auth->is_invoice_generator() ) : ?>
        <li class="treeview <?=backend_activate_menu_class('web_user');?> <?=backend_activate_menu_class('payment');?> ">
          <a href="javascript:void();">
            <i class="fa fa-money"></i> <span>Web Users</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('web_user');?>"><i class="fa fa-circle-o"></i> Web Users List</a></li>
            <li><a href="<?=base_url('payment/add');?>"><i class="fa fa-circle-o"></i> Add Payment</a></li>
            <li><a href="<?=base_url('payment');?>"><i class="fa fa-circle-o"></i> Payment History</a></li>
            <li><a href="<?=base_url('web_user/sent_mail');?>" target="_blank"><i class="fa fa-circle-o"></i> Sent Mail</a></li>
          </ul>
        </li>
        <?php endif; ?>

        <?php if($this->ion_auth->is_admin() || $this->ion_auth->is_invoice_generator() ) : ?>
        <li class="treeview <?=backend_activate_menu_class('tariff');?> ">
          <a href="javascript:void();">
            <i class="fa fa-money"></i> <span>Tariff</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('tariff');?>"><i class="fa fa-circle-o"></i> All Tariff</a></li>
            <li><a href="<?=base_url('tariff/add');?>"><i class="fa fa-circle-o"></i> Add Tariff</a></li>
          </ul>
        </li>
        <?php endif; ?>

       <?php if($this->ion_auth->is_admin() || $this->ion_auth->is_invoice_generator() || $this->ion_auth->is_setup_user() || $this->ion_auth->is_stock_manager() ) : ?>
        <li class="treeview <?=backend_activate_menu_class('feedback');?> ">
          <a href="javascript:void();">
            <i class="fa fa-list-alt"></i> <span>Feedback</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('feedback');?>"><i class="fa fa-circle-o"></i> Feedback List</a></li>
            <li><a href="<?=base_url('report/category_wise_form');?>"><i class="fa fa-circle-o"></i> Category Wise</a></li>
            <li><a href="<?=base_url('report/stock_report_form');?>"><i class="fa fa-circle-o"></i> Stock Report</a></li>
            <li><a href="<?=base_url('report/customer_payment_his_form');?>"><i class="fa fa-circle-o"></i> Customer Payment History</a></li>
            <li><a href="<?=base_url('report/all_customer_balance');?>" target="_blank"><i class="fa fa-circle-o"></i> All Customer Balance</a></li>
            <li><a href="<?=base_url('report/sales_report_form');?>"><i class="fa fa-circle-o"></i> Sales Report</a></li>
            <li><a href="<?=base_url('report/return_report_form');?>"><i class="fa fa-circle-o"></i> Return Report</a></li>
            <li><a href="<?=base_url('report/cash_receive_form');?>"><i class="fa fa-circle-o"></i> Cash Receive Report</a></li>
          </ul>
        </li>
        <?php endif; ?>
        
        <?php if($this->ion_auth->is_admin() ) : ?>
        <li class="treeview <?=backend_activate_menu_class('manage_user');?>">
          <a href="javascript:void();">
            <i class="fa fa-user"></i> <span>Manage Users</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('admin/manage_user/all');?>"><i class="fa fa-circle-o"></i> User List</a></li>
            <li><a href="<?=base_url('admin/manage_user/add');?>"><i class="fa fa-circle-o"></i> Add User</a></li>
          </ul>
        </li>
        <?php endif; ?>
          
        <li class="<?=backend_activate_menu_class('change_password');?>"><a href="<?php echo base_url('change_password');?>"><i class="fa fa-book"></i> <span>Change Password</span></a></li>        
      </ul>
    </section>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">