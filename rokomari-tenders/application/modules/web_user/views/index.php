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
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Cell No</th>
                  <th>Status</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                foreach ($all_web_user as $webuRow):

              ?>
              <tr>
                <td><?=$webuRow->webu_id;?></td>
                <td><?php echo htmlspecialchars($webuRow->webu_full_name,ENT_QUOTES,'UTF-8');?></td>
                <td><?php echo htmlspecialchars($webuRow->webu_email,ENT_QUOTES,'UTF-8');?></td>
                <td><?php echo htmlspecialchars($webuRow->webu_phone,ENT_QUOTES,'UTF-8');?></td>
                <td>
                  <?php
                    if($webuRow->webu_status == 1)
                      echo '<span class="label label-success">Active</span>';
                    else if($webuRow->webu_status == 2)
                      echo '<span class="label label-danger">De-Active</span>';
                  ?>
                </td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($webuRow->webu_created));?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($webuRow->webu_updated));?></td>
                <td style="text-align: center;">
                  <a href="<?= base_url('web_user/edit/' . $webuRow->webu_id) ?>" class="btn btn-primary btn-xs">Edit</a> | 
                  <a href="<?= base_url('web_user/details/' . $webuRow->webu_id) ?>" class="btn btn-info btn-xs">Details</a> <!-- | 
                  <a href="<?= base_url('web_user/payment_history/' . $webuRow->webu_id) ?>" class="btn bg-maroon btn-xs">Payment History</a> -->
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
