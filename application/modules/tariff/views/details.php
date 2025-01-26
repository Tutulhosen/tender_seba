<style type="text/css">
  table, th, td {
    border: 1px solid black;
  }

  th, td {
    text-align: center;
    padding: 2px 3px;
  }

  .tariff_details_tbl th, td {
    text-align: center;
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
          <a href="<?=base_url('tariff/add')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> Create Tariff</a> 
          <a href="<?=base_url('tariff')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Tariff</a> 
        </div>        

          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <table class="tariff_details_tbl">
                  <tbody>
                    <tr>
                      <th>Name</th>
                      <td><?= $tariff_details['tariff_name'] ?></td>
                      <th>Amount</th>
                      <td><?= $tariff_details['tariff_amount'] ?></td>
                    </tr>
                    <tr>
                      <th>Duration</th>
                      <td>
                      <?php
                        echo $tariff_details['tariff_duration'];

                        if($tariff_details['tariff_month_year'] == 1)
                          echo ' Month (s)';
                        else echo ' Year (s)';
                      ?>
                      </td>
                      <th>BD or Overseas</th>
                      <td>
                      <?php
                        if($tariff_details['tariff_bd_overseas'] == 1)
                          echo '<span class="label label-success">For BD</span>';
                        else
                          echo '<span class="label label-info">Overseas</span>';
                      ?>
                      </td>
                    </tr>
                    <tr>
                      <th>Status</th>
                      <td>
                      <?php
                        if($tariff_details['tariff_status'] == 1)
                          echo '<span class="label label-success">Active</span>';
                        else
                          echo '<span class="label label-danger">De-Active</span>';
                      ?>
                      </td>
                      <th>Remarks</th>
                      <td><?= $tariff_details['tariff_remarks'] ?></td>
                    </tr>
                    <tr>
                      <th>Created</th>
                      <td><?= date('d-m-Y H:i:s', strtotime($tariff_details['tariff_created'])) ?>
                      </td>
                      <th>Update</th>
                      <td><?= date('d-m-Y H:i:s', strtotime($tariff_details['tariff_updated'])) ?></td>
                    </tr>
                    <tr>
                      <td colspan="4">
                        <a href="<?= base_url('tariff/edit/' . $tariff_details['tariff_id']) ?>" class="btn btn-primary">Edit This Tariff</a>
                      </td>
                    </tr>
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
