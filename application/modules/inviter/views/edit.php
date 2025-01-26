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
          <a href="<?=base_url('inviter')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Inviter</a> 
        </div>        
        <?php echo form_open_multipart("inviter/edit/" . $inviter_details['inviter_id']);?>
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
                    <label>Inviter Name &nbsp;&nbsp;<small class="pull-right">(Max: 100)</small></label>
                    <div><?php echo form_error('inviter_name'); ?></div>
                    <?php echo form_input($inviter_name);?>
                  </div>

                  <div class="radio">
                    <div>
                    <?php 
                      echo form_error('inviter_type'); 
                      
                      $sv = set_value('inviter_type', $inviter_details['inviter_type']);
                    ?>
                    </div>
                    <label><input type="radio" name="inviter_type" value="1" <?= $sv == 1? 'checked' : ''; ?> >NGO</label>
                    <label><input type="radio" name="inviter_type" value="2" <?= $sv==2? 'checked' : ''; ?> >Government</label>
                    <label><input type="radio" name="inviter_type" value="3" <?= $sv==3? 'checked' : ''; ?> >Private</label>
                  </div>
              </div>

            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">    
            <?php //echo form_input($user_id);?>        
            <?php echo form_submit('submit', 'Update Inviter', "class='btn btn-primary pull-right'"); ?>
          </div>
        <?php echo form_close();?>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
