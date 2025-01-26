<section class="content-header">
  <h1> <?=$meta_title; ?> </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><?=$meta_title; ?></li>
  </ol>
</section>

<section class="content">

  <div class="row">
    <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?=$meta_title; ?></h3>
          <a href="<?=base_url('tariff')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Tariff</a> 
          <a href="<?=base_url('tariff/add')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> Add Tariff</a> 
        </div>        
        <?php echo form_open_multipart("tariff/edit/" . $tariff_details['tariff_id']);?>
          <div class="box-body">
            <!-- <div id="infoMessage"><?php //echo $message;?></div> -->
            <div><?php //echo validation_errors(); ?></div>
            <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('success');;?>
                </div>
            <?php endif; ?>
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name &nbsp; <small class="pull-right">(Max: 20)</small></label>
                  <div><?php echo form_error('tariff_name'); ?></div>
                  <?php echo form_input($tariff_name);?>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Duration</label>
                  <div><?php echo form_error('tariff_duration'); ?></div>
                  <?php echo form_input($tariff_duration);?>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Month or Year</label>
                  <div>
                  <?php 
                    echo form_error('tariff_month_year'); 
                  
                    $tmy = set_value('tariff_month_year', $tariff_details['tariff_month_year']);
                  ?>
                  </div>
                  <input type="radio" name="tariff_month_year" value="1" <?= $tmy==1? 'checked':'' ?> > Month &nbsp;&nbsp;
                  <input type="radio" name="tariff_month_year" value="2" <?= $tmy==2? 'checked':'' ?> > Year
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Amount</label>
                  <div><?php echo form_error('tariff_amount'); ?></div>
                  <?php echo form_input($tariff_amount);?>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>BD or Overseas</label>
                  <div>
                  <?php 
                    echo form_error('tariff_bd_overseas'); 
                  
                    $tmy = set_value('tariff_bd_overseas', $tariff_details['tariff_bd_overseas']);
                  ?>
                  </div>
                  <input type="radio" name="tariff_bd_overseas" value="1" <?= $tmy==1? 'checked':'' ?> > BD &nbsp;&nbsp;
                  <input type="radio" name="tariff_bd_overseas" value="2" <?= $tmy==2? 'checked':'' ?> > Overseas
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Status</label>
                  <div>
                  <?php 
                    echo form_error('tariff_status'); 
                  
                    $tst = set_value('tariff_status', $tariff_details['tariff_status']);
                  ?>
                  </div>
                  <input type="radio" name="tariff_status" value="1" <?= $tst==1? 'checked':'' ?> > Active &nbsp;&nbsp;
                  <input type="radio" name="tariff_status" value="2" <?= $tst==2? 'checked':'' ?> > De-Active
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Remarks</label>
                  <div><?php echo form_error('tariff_remarks'); ?></div>
                  <?php echo form_input($tariff_remarks);?>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">    
            <?php //echo form_input($user_id);?>        
            <?php echo form_submit('submit', 'Update Tariff', "class='btn btn-primary pull-right'"); ?>
          </div>
        <?php echo form_close();?>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
