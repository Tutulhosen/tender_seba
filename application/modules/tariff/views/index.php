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
          <a href="<?=base_url('tariff/add')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> Create Tariff</a> 
        </div>        

          <div class="box-body">
            <div id="infoMessage"><?php ?></div>            
            <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('success');?>
                </div>
            <?php endif; ?>
            <table id="" class="table table-bordered table-striped table-responsive">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Duration</th>
                  <th>Month/ Year</th>
                  <th>BD/ Overseas</th>
                  <th>Status</th>
                  <th>Remarks</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                foreach ($all_tariff as $tariffRow):

              ?>
              <tr>
                <td><?=$tariffRow->tariff_id;?></td>
                <td><?php echo htmlspecialchars($tariffRow->tariff_name,ENT_QUOTES,'UTF-8');?></td>
                <td><?php echo htmlspecialchars($tariffRow->tariff_duration,ENT_QUOTES,'UTF-8');?></td>
                <td>
                  <?php
                    if($tariffRow->tariff_month_year == 1)
                      echo '<span class="label label-success">Month</span>';
                    else if($tariffRow->tariff_month_year == 2)
                      echo '<span class="label label-info">Year</span>';
                  ?>
                </td>
                <td>
                  <?php
                    if($tariffRow->tariff_bd_overseas == 1)
                      echo '<span class="label label-success">For BD</span>';
                    else if($tariffRow->tariff_bd_overseas == 2)
                      echo '<span class="label label-info">For Overseas</span>';
                  ?>
                </td>
                <td>
                  <?php
                    if($tariffRow->tariff_status == 1)
                      echo '<span class="label label-success">Active</span>';
                    else if($tariffRow->tariff_status == 2)
                      echo '<span class="label label-danger">De-Active</span>';
                  ?>
                </td>
                <td><?php echo htmlspecialchars($tariffRow->tariff_remarks,ENT_QUOTES,'UTF-8');?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($tariffRow->tariff_created));?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($tariffRow->tariff_updated));?></td>
                <td style="text-align: center;">
                  <a href="<?= base_url('tariff/edit/' . $tariffRow->tariff_id) ?>" class="btn btn-primary btn-xs">Edit</a> | 
                  <a href="<?= base_url('tariff/details/' . $tariffRow->tariff_id) ?>" class="btn btn-info btn-xs">Details</a>
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

<!-- <script type="text/javascript">
  $(document).ready(function() {

    $('#example1').DataTable({
      order: [[0, 'desc']]
    });
  });
</script> -->