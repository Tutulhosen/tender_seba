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
          <a href="<?=base_url('web_user')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Web User</a> 
        </div>        
        <?php echo form_open_multipart("web_user/add");?>
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
              <div class="col-md-10">
                <div class="form-group">
                  <label>Full Name &nbsp; <small class="pull-right">(Max: 100)</small></label>
                  <div><?php echo form_error('webu_full_name'); ?></div>
                  <?php echo form_input($webu_full_name);?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label>User E-mail &nbsp; <small class="pull-right">(Max: 70)</small></label>
                  <div><?php echo form_error('webu_email'); ?></div>
                  <?php echo form_input($webu_email);?>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Cell No &nbsp; <small class="pull-right">(Max: 20)</small></label>
                  <div><?php echo form_error('webu_phone'); ?></div>
                  <?php echo form_input($webu_phone);?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label>User Password &nbsp; <small class="pull-right">(Min: 8, Max: 20)</small></label>
                  <div><?php echo form_error('webu_password'); ?></div>
                  <?php echo form_input($webu_password);?>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Confirm Password &nbsp; <small class="pull-right">(Max: 16)</small></label>
                  <div><?php echo form_error('webu_password_confirm'); ?></div>
                  <?php echo form_input($webu_password_confirm);?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label>Company Name &nbsp; <small class="pull-right">(Max: 150)</small></label>
                  <div><?php echo form_error('webu_company_name'); ?></div>
                  <?php echo form_input($webu_company_name);?>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Designation &nbsp; <small class="pull-right">(Max: 100)</small></label>
                  <div><?php echo form_error('webu_designation'); ?></div>
                  <?php echo form_input($webu_designation);?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label>Company Type</label>
                  <div><?php echo form_error('webu_company_type'); ?></div>
                  <?php echo form_dropdown('webu_company_type', $webu_company_type, set_value('webu_company_type'), 'class="form-control select2" required');?>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Status</label>
                  <div>
                  <?php 
                    echo form_error('webu_status'); 
                    
                    $wus = set_value('webu_status') != '' ? set_value('webu_status') : 1;
                  ?>
                  </div>
                  <input type="radio" name="webu_status" value="1" <?= $wus==1? 'checked':'' ?> > Active
                  <input type="radio" name="webu_status" value="2" <?= $wus==2? 'checked':'' ?> > De-Active
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">    
            <?php //echo form_input($user_id);?>        
            <?php echo form_submit('submit', 'Create User', "class='btn btn-primary pull-right'"); ?>
          </div>
        <?php echo form_close();?>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
