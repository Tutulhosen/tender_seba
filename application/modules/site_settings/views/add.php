<section class="content-header">
  <h1> <?=$meta_title; ?> </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><?=$meta_title; ?></li>
  </ol>
</section>

<section class="content">

  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?=$meta_title; ?></h3>
          <a href="<?=base_url('package_settings')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Packages</a> 
        </div>        
        <?php echo form_open_multipart("package_settings/add");?>
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
              <div class="col-md-8">
                <div class="form-group">
                  <label>Package Name &nbsp;<small class="pull-right">(Max: 30)</small></label>
                  <div><?php echo form_error('pkg_name'); ?></div>
                  <?php echo form_input($pkg_name);?>

                  <label>Package Duration &nbsp;<small class="pull-right">(In days)</small></label>
                  <div><?php echo form_error('pkg_duration'); ?></div>
                  <?php echo form_input($pkg_duration);?>

                  <label>Number of products &nbsp;<small class="pull-right">(Count)</small></label>
                  <div><?php echo form_error('pkg_no_of_products'); ?></div>
                  <?php echo form_input($pkg_no_of_products);?>

                  <label>Price &nbsp;<small class="pull-right">(In BDT.)</small></label>
                  <div><?php echo form_error('pkg_price'); ?></div>
                  <?php echo form_input($pkg_price);?>

                  <label>Package Description &nbsp;<small class="pull-right">(Max: 100)</small></label>
                  <div><?php echo form_error('pkg_description'); ?></div>
                  <?php echo form_textarea($pkg_description);?>
                </div>
              </div>
            </div>
            <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Select Image</label>
                      <input type="file" name="tender_image" id="tender_image" class="btn btn-info" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <img src="#" id="tender_image_pre" alt="No Image" height="170" width="240" style="border: 1px solid rgb(60, 141, 188);" >
                    </div>
                  </div>
                </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">    
            <?php //echo form_input($user_id);?>        
            <?php echo form_submit('submit', 'Create Package', "class='btn btn-primary pull-right'"); ?>
          </div>
        <?php echo form_close();?>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#tender_image').change(function() {
      readURL(this);
    });
  });

  function readURL(input){
    if(input.files && input.files[0])
    {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#tender_image_pre').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>