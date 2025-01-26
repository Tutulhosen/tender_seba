<section class="content-header">
  <h1> <?=$meta_title; ?> </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><?=$meta_title; ?></li>
  </ol>
</section>

<section class="content">

  <div class="row">
    <div class="col-md-10">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?=$meta_title; ?></h3>
          <a href="<?=base_url('division')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Division</a> 
        </div>        
        <?php echo form_open_multipart("division/add");?>
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
                  <label>Division Name &nbsp; <small class="pull-right">(Max: 20)</small></label>
                  <div><?php echo form_error('division_name'); ?></div>
                  <?php echo form_input($division_name);?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Division Short Name &nbsp; <small class="pull-right">(Max: 10)</small></label>
                  <div><?php echo form_error('division_short_name'); ?></div>
                  <?php echo form_input($division_short_name);?>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">    
            <?php //echo form_input($user_id);?>        
            <?php echo form_submit('submit', 'Create Customer', "class='btn btn-primary pull-right'"); ?>
          </div>
        <?php echo form_close();?>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
