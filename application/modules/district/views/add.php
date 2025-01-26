<section class="content-header">
  <h1> <?=$meta_title; ?> </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><?=$meta_title; ?></li>
  </ol>
</section>

<section class="content">

  <div class="row">
    <div class="col-md-7">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?=$meta_title; ?></h3>
          <a href="<?=base_url('district')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All District</a> 
        </div>        
        <?php echo form_open_multipart("district/add");?>
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
              <div class="col-md-12">
                  <div class="form-group">
                    <label>Division</label>
                    <div><?php echo form_error('division_id'); ?></div>
                    <?php echo form_dropdown('division_id', $divisions, set_value('division_id'), 'class="form-control" required');?>
                  </div>

                  <div class="form-group">
                    <label>District Name &nbsp; <small class="pull-right">(Max: 20)</small></label>
                    <div><?php echo form_error('district_name'); ?></div>
                    <?php echo form_input($district_name);?>
                  </div>

                  <div class="form-group">
                    <label>District Short Name &nbsp; <small class="pull-right">(Max: 10)</small></label>
                    <div><?php echo form_error('district_short_name'); ?></div>
                    <?php echo form_input($district_short_name);?>
                  </div>
              </div>

            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">    
            <?php //echo form_input($user_id);?>        
            <?php echo form_submit('submit', 'Create District', "class='btn btn-primary pull-right'"); ?>
          </div>
        <?php echo form_close();?>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
