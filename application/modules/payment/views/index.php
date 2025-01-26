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
          <a href="<?=base_url('payment/add')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> Add Payment History </a> 
        </div>        

          <div class="box-body">
            <div id="infoMessage"><?php ?></div>            
            <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('success');?>
                </div>
            <?php endif; ?>
            <table id="example1" class="table table-bordered table-striped table-responsive">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>User Name</th>
                  <th>Payment Month & Year</th>
                  <th>Payment Date</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                foreach ($all_pay_his as $payRow):

              ?>
              <tr>
                <td><?=$payRow->payment_id;?></td>
                <td><?php echo htmlspecialchars($payRow->webu_email,ENT_QUOTES,'UTF-8');?></td>
                <td>
                <?php 
                  $pay_m_y = '01-' . $payRow->payment_month . '-' . $payRow->payment_year;
                  $pay_m_y = date('M Y', strtotime($pay_m_y));

                  echo $pay_m_y;
                ?>
                </td>
                <td><?php echo date('d-m-Y', strtotime($payRow->payment_date));?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($payRow->payment_created));?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($payRow->payment_updated));?></td>
                <td style="text-align: center;">
                  <a href="<?= base_url('payment/edit/' . $payRow->payment_id) ?>" class="btn btn-primary">Edit</a>
                </td>
              </tr>
              <?php endforeach;?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">  </div>
      </div> <!-- /.box -->
    </div>
  </div> <!-- /.row -->

</section> <!-- /.content -->
