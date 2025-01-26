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
          <a href="<?=base_url('feedback')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Feedback</a> 
          <a href="<?=base_url('feedback/add')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> Add Feedback</a> 
        </div>        
        <?php echo form_open_multipart("feedback/edit/" . $feedback_details['feedback_id']);?>
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
                  <label>User</label>
                  <div><?php echo form_error('webu_id'); ?></div>
                  <?php echo form_dropdown('webu_id', $webu_id, set_value('webu_id', $feedback_details['webu_id']), 'class="form-control select2" required');?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Subject</label>
                  <div><?php echo form_error('feedback_subject'); ?></div>
                  <?php echo form_input($feedback_subject);?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Description</label>
                  <div><?php echo form_error('feedback_description'); ?></div>
                  <?php echo form_textarea($feedback_description);?>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">    
            <?php //echo form_input($user_id);?>        
            <?php echo form_submit('submit', 'Update Feedback', "class='btn btn-primary pull-right'"); ?>
          </div>
        <?php echo form_close();?>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
