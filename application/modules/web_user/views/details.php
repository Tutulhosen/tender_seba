<style type="text/css">
  table, th, td {
    border: 1px solid black;
  }

  th, td {
    text-align: center;
    padding: 2px 3px;
  }

  .user_details_tbl td {
    text-align: center;
    padding: 4px 4px;
  }
  .user_details_tbl th {
    text-align: left;
    padding: 4px 4px;
  }
</style>

<section class="content-header">
  <h1> <?=$meta_title; ?> </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><?=$meta_title; ?></li>
  </ol>
</section>

<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?=$meta_title; ?> </h3>
          <a href="<?=base_url('web_user/add')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> Create Web User</a> 
        </div>        

          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <table class="user_details_tbl">
                  <tbody>
                    <tr>
                      <th>Full Name</th>
                      <td><?= $webu_basic_details['webu_full_name'] ?></td>
                      <th>Designation</th>
                      <td><?= $webu_basic_details['webu_designation'] ?></td>
                    </tr>
                    <tr>
                      <th>Cell No</th>
                      <td><?= $webu_basic_details['webu_phone'] ?></td>
                      <th>E-Mail</th>
                      <td><?= $webu_basic_details['webu_email'] ?></td>
                    </tr>
                    <tr>
                      <th>Company Name</th>
                      <td><?= $webu_basic_details['webu_company_name'] ?></td>
                      <th>Company Type</th>
                      <td><?= $company_type ?></td>
                    </tr>
                    <tr>
                      <th>Status</th>
                      <td>
                      <?php
                        if($webu_basic_details['webu_status'] == 1)
                          echo '<span class="label label-success">Active</span>';
                        else
                          echo '<span class="label label-danger">De-Active</span>';
                      ?>
                      </td>
                      <th></th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Web Access</th>
                      <td>
                      <?php
                        if($webu_basic_details['webu_web_access'] == 1)
                          echo '<span class="label label-success">Running</span>';
                        else if($webu_basic_details['webu_web_access'] == 2)
                          echo '<span class="label label-danger">Suspended</span>';
                        else
                          echo '<span class="label label-default">Not Subscribed</span>';
                      ?>
                      </td>
                      <th>Expired On</th>
                      <td><?= date('d-m-Y', strtotime($webu_basic_details['webu_web_acc_exp'])) ?></td>
                    </tr>
                    <tr>
                      <th>E-mail Alert</th>
                      <td>
                      <?php
                        if($webu_basic_details['webu_email_alert'] == 1)
                          echo '<span class="label label-success">Running</span>';
                        else if($webu_basic_details['webu_email_alert'] == 2)
                          echo '<span class="label label-danger">Suspended</span>';
                        else
                          echo '<span class="label label-default">Not Subscribed</span>';
                      ?>
                      </td>
                      <th>Expired On</th>
                      <td><?= date('d-m-Y', strtotime($webu_basic_details['webu_email_al_exp'])) ?></td>
                    </tr>
                    <tr>
                      <th>SMS Alert</th>
                      <td>
                      <?php
                        if($webu_basic_details['webu_sms_alert'] == 1)
                          echo '<span class="label label-success">Running</span>';
                        else if($webu_basic_details['webu_sms_alert'] == 2)
                          echo '<span class="label label-danger">Suspended</span>';
                        else
                          echo '<span class="label label-default">Not Subscribed</span>';
                      ?>
                      </td>
                      <th>Expired On</th>
                      <td><?= date('d-m-Y', strtotime($webu_basic_details['webu_sms_al_exp'])) ?></td>
                    </tr>
                    <tr>
                      <th>Auto Remainder</th>
                      <td>
                      <?php
                        if($webu_basic_details['webu_auto_reminder'] == 1)
                          echo '<span class="label label-success">Running</span>';
                        else if($webu_basic_details['webu_auto_reminder'] == 2)
                          echo '<span class="label label-danger">Suspended</span>';
                        else
                          echo '<span class="label label-default">Not Subscribed</span>';
                      ?>
                      </td>
                      <th>Expired On</th>
                      <td><?= date('d-m-Y', strtotime($webu_basic_details['webu_auto_re_exp'])) ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-6">
                <table>
                  <thead>
                    <tr>
                      <th>PID</th>
                      <th>P_Mnth</th>
                      <th>P_Date</th>
                      <th>P_BY</th>
                      <th>P_Amnt</th>
                      <th>Remarks</th>
                      <th>System Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  foreach($webu_payment_history as $payHisRow):
                    $mnth_year = '01-' . $payHisRow->payment_month . '-' . $payHisRow->payment_year;
                    $mnth_year = date('M, Y', strtotime($mnth_year));

                    if($payHisRow->payment_by == 1)
                      $payment_by = 'Bkash';
                    else if($payHisRow->payment_by == 2)
                      $payment_by = 'Bank';
                    else if($payHisRow->payment_by == 3)
                      $payment_by = 'Cash';
                  ?>
                    <tr>
                      <td><?= $payHisRow->payment_id ?></td>
                      <td><?= $mnth_year ?></td>
                      <td><?= date('d-m-Y', strtotime($payHisRow->payment_date)) ?></td>
                      <td><?= $payment_by ?></td>
                      <td><?= $payHisRow->payment_amount ?></td>
                      <td><?= $payHisRow->payment_remarks ?></td>
                      <td><?= date('d-m-Y H:i:s', strtotime($payHisRow->payment_created)) ?></td>

                    </tr>
                  <?php
                  endforeach;
                  ?>
                  </tbody>
                </table>
              </div>
            </div>            
            
          </div>
          <!-- /.box-body -->

          <div class="box-footer">  </div>
      </div> <!-- /.box -->
    </div>
  </div> <!-- /.row -->

</section> <!-- /.content -->
