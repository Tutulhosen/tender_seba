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
          <a href="<?=base_url('car_type/add')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> Add New Car Type</a> 
          <a href="<?=base_url('car_type')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Car Type</a> 
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
              <tbody>
                <tr>
                  <th>Type Name</th>
                  <td><?php echo htmlspecialchars($car_type_details['type_name'],ENT_QUOTES,'UTF-8');?></td>
                  <th>Basic Price</th>
                  <td><?php echo htmlspecialchars($car_type_details['basic_price'],ENT_QUOTES,'UTF-8');?></td>
                </tr>
                <tr>
                  <th>Basic Hour</th>
                  <td><?php echo htmlspecialchars($car_type_details['basic_hour'],ENT_QUOTES,'UTF-8');?></td>
                  <th>Extra Per Hour</th>
                  <td><?php echo htmlspecialchars($car_type_details['per_hour_ot_price'],ENT_QUOTES,'UTF-8');?></td>
                </tr>
                <tr>
                  <th>Mileage Cost</th>
                  <td><?php echo htmlspecialchars($car_type_details['mileage_cost'],ENT_QUOTES,'UTF-8');?></td>
                  <th>Night Hold Allowance</th>
                  <td><?php echo htmlspecialchars($car_type_details['night_hold_allowance'],ENT_QUOTES,'UTF-8');?></td>
                </tr>
                <tr>
                  <th></th>
                  <td></td>
                  <th>Food Allowance</th>
                  <td><?php echo htmlspecialchars($car_type_details['food_allowance'],ENT_QUOTES,'UTF-8');?></td>
                </tr>
                <tr>
                  <th>Cars</th>
                  <td><?= $car_type_details['cars'] ?></td>
                  <th>Status</th>
                  <td>
                    <?php 
                      if($car_type_details['status'])
                        echo '<span class="label label-success">Enabled</span>';
                      else
                        echo '<span class="label label-danger">Disabled</span>';  
                    ?>
                  </td>
                </tr>
                <tr>
                  <th>Image</th>
                  <td colspan="3">
                    <img src="<?= $car_type_details['img_url']; ?>" height="250" width="300" alt="No Image" style="border: 1px solid rgb(60, 141, 188);">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">  </div>
      </div> <!-- /.box -->
    </div>
  </div> <!-- /.row -->

</section> <!-- /.content -->
