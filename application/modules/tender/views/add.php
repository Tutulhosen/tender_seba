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
          <h3 class="box-title"><?=$meta_title; ?></h3>
          <a href="<?=base_url('tender')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Tender</a> 
        </div>        
        <?php echo form_open_multipart("tender/add");?>
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
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Tender Title</label>
                      <div><?= form_error('tender_title') ?></div>
                      <?= form_input($tender_title) ?>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Tender Description</label>
                      <div><?= form_error('tender_description') ?></div>
                      <?= form_textarea($tender_description) ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tender ID &nbsp;&nbsp;<small class="pull-right">(Max: 20)</small></label>
                      <div><?= form_error('tender_manual_id') ?></div>
                      <?= form_input($tender_manual_id) ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Doc Price &nbsp;&nbsp;<small class="pull-right">(Max: 100)</small></label>
                      <div><?= form_error('tender_doc_price') ?></div>
                      <?= form_input($tender_doc_price) ?>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Security Amount &nbsp;&nbsp;<small class="pull-right">(Max: 255)</small></label>
                      <div><?= form_error('tender_security_amount') ?></div>
                      <?= form_input($tender_security_amount) ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Published On</label>
                      <div><?= form_error('tender_published_on') ?></div>
                      <input type="" class="form-control datepicker" name="tender_published_on" value="<?= set_value('tender_published_on') ?>" placeholder="Click to select date (DD-MM-YYYY)" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Closed On</label>
                      <div><?= form_error('tender_closed_on') ?></div>
                      <input type="" class="form-control datepicker" name="tender_closed_on" value="<?= set_value('tender_closed_on') ?>" placeholder="Click to select date (DD-MM-YYYY)" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Closed Time &nbsp;&nbsp;<small class="pull-right">(Max: 8)</small></label>
                      <div><?= form_error('tender_closed_time') ?></div>
                      <?= form_input($tender_closed_time) ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Pre-Bid Meeting</label>
                      <div><?= form_error('tender_prebid_meeting') ?></div>
                      <input type="" class="form-control datepicker" name="tender_prebid_meeting" value="<?= set_value('tender_prebid_meeting') ?>" placeholder="Click to select date (DD-MM-YYYY)" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Opening Date</label>
                      <div><?= form_error('tender_opening') ?></div>
                      <input type="" class="form-control datepicker" name="tender_opening" value="<?= set_value('tender_opening') ?>" placeholder="Click to select date (DD-MM-YYYY)" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Opening Time &nbsp;&nbsp;<small class="pull-right">(Max: 8)</small></label>
                      <div><?= form_error('tender_opening_time') ?></div>
                      <?= form_input($tender_opening_time) ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Schedule Purchase</label>
                      <div><?= form_error('tender_schedule_purchase') ?></div>
                      <input type="" class="form-control datepicker" name="tender_schedule_purchase" value="<?= set_value('tender_schedule_purchase') ?>" placeholder="Click to select date (DD-MM-YYYY)" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Schedule Purchase Time &nbsp;&nbsp;<small class="pull-right">(Max: 8)</small></label>
                      <div><?= form_error('tender_sche_pur_time') ?></div>
                      <?= form_input($tender_sche_pur_time) ?>
                    </div>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Select Image</label>
                      <input type="file" name="tender_image" id="tender_image" class="btn btn-info">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <img src="#" id="tender_image_pre" alt="No Image" height="170" width="240" style="border: 1px solid rgb(60, 141, 188);" >
                    </div>
                  </div>
                </div>
              </div>
              <!-- END left side -->

              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Inviter</label>
                      <div><?= form_error('tender_inviter') ?></div>
                      <?php
                        $more_attr = 'class="form-control select2" required';
                        echo form_dropdown('tender_inviter', $inviters, set_value('tender_inviter'), $more_attr) ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Source</label>
                      <div><?= form_error('tender_source') ?></div>
                      <?php
                        $more_attr = 'class="form-control select2" required';
                        echo form_dropdown('tender_source', $sources, set_value('tender_source'), $more_attr) ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Category</label>
                      <div><?= form_error('tender_category') ?></div>
                      <?php
                        $more_attr = 'class="form-control select2" id="tender_category" required';
                        echo form_dropdown('tender_category', $categories, set_value('tender_category'), $more_attr) ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Sub Category</label>
                      <div><?= form_error('tender_sub_category') ?></div>
                      <?php
                        $more_attr = 'class="form-control select2" id="tender_sub_category" required';
                        if(set_value('tender_category') != '')
                        {
                          echo form_dropdown('tender_sub_category', $sub_categories, set_value('tender_sub_category'), $more_attr);
                        }
                        else
                        {
                          echo form_dropdown('tender_sub_category', '-- Select Category --', set_value('tender_sub_category'), $more_attr);
                        } 
                        ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Working Division</label>
                      <div><?= form_error('tender_division') ?></div>
                      <?php
                        $more_attr = 'class="form-control select2" id="tender_division" required';
                        echo form_dropdown('tender_division', $divisions, set_value('tender_division'), $more_attr) ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Working District</label>
                      <div><?= form_error('tender_district') ?></div>
                      <?php
                        $more_attr = 'class="form-control select2" id="tender_district" required';
                        if(set_value('tender_division') != '')
                        {
                          echo form_dropdown('tender_district', $districts, set_value('tender_district'), $more_attr);
                        }
                        else
                        {
                          echo form_dropdown('tender_district', '-- Select Working Division --', set_value('tender_district'), $more_attr);
                        } 
                      ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Procuring Division</label>
                      <div><?= form_error('tender_procuring_div') ?></div>
                      <?php
                        $more_attr = 'class="form-control select2" id="tender_procuring_div"';
                        echo form_dropdown('tender_procuring_div', $procu_divisions, set_value('tender_procuring_div'), $more_attr) ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Procuring District</label>
                      <div><?= form_error('tender_procuring_dist') ?></div>
                      <?php
                        $more_attr = 'class="form-control select2" id="tender_procuring_dist" ';
                        if(set_value('tender_procuring_div') != '')
                        {
                          echo form_dropdown('tender_procuring_dist', $procu_districts, set_value('tender_procuring_dist'), $more_attr);
                        }
                        else
                        {
                          echo form_dropdown('tender_procuring_dist', '-- Select Procuring Division --', set_value('tender_procuring_dist'), $more_attr);
                        } 
                      ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Procurement Method</label>
                      <div><?= form_error('tender_pro_method') ?></div>
                      <?php
                        $more_attr = 'class="form-control select2" id="tender_pro_method" required';
                        echo form_dropdown('tender_pro_method', $pro_methods, set_value('tender_pro_method'), $more_attr); 
                      ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Call Type</label>
                      <div>
                      <?php 
                        echo form_error('tender_call_type');

                        $tct = set_value('tender_call_type') != ''? set_value('tender_call_type') : 1; 
                      ?>
                      </div>

                      <input type="radio" name="tender_call_type" value="1" <?= $tct==1? 'checked':'' ?> > Tender &nbsp;&nbsp;&nbsp;
                      <input type="radio" name="tender_call_type" value="2" <?= $tct==2? 'checked':'' ?> > Corrigendum <br>
                      <input type="radio" name="tender_call_type" value="3" <?= $tct==3? 'checked':'' ?> > Cancellation &nbsp;&nbsp;&nbsp;
                      <input type="radio" name="tender_call_type" value="4" <?= $tct==4? 'checked':'' ?> > Republished
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tender On</label>
                      <div>
                      <?php 
                        echo form_error('tender_on');

                        $tct = set_value('tender_on') != ''? set_value('tender_on') : 1; 
                      ?>
                      </div>

                      <input type="radio" name="tender_on" value="1" <?= $tct==1? 'checked':'' ?> > Goods &nbsp;&nbsp;&nbsp;
                      <input type="radio" name="tender_on" value="2" <?= $tct==2? 'checked':'' ?> > Works <br>
                      <input type="radio" name="tender_on" value="3" <?= $tct==3? 'checked':'' ?> > Services
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Bidding Type</label>
                      <div>
                      <?php 
                        echo form_error('tender_bidding_type');

                        $tct = set_value('tender_bidding_type') != ''? set_value('tender_bidding_type') : 1; 
                      ?>
                      </div>

                      <input type="radio" name="tender_bidding_type" value="1" <?= $tct==1? 'checked':'' ?> > Local &nbsp;&nbsp;&nbsp;
                      <input type="radio" name="tender_bidding_type" value="2" <?= $tct==2? 'checked':'' ?> > International
                    </div>
                  </div>
                </div>
              </div>
              <!-- END right side -->
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">    
            <?php //echo form_input($user_id);?>        
            <?php echo form_submit('submit', 'Create Tender', "class='btn btn-primary pull-right'"); ?>
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

    $('#tender_category').change(function() {
      var tcat = $(this).val();

      if(tcat == '' || tcat == 0)
        return;

      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Common_con/get_sub_cat_by_cat/'); ?>",
        data: { category_id : tcat },
        success: function(data)
        {
          // alert(data);
          $('#tender_sub_category').html(data);
        }
      });
    });

    $('#tender_division').change(function() {
      var tdiv = $(this).val();

      if(tdiv == '' || tdiv == 0)
        return;

      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Common_con/get_dist_by_divi/'); ?>",
        data: { division_id : tdiv },
        success: function(data)
        {
          // alert(data);
          $('#tender_district').html(data);
        }
      });
    });

    //procuring division  //06-03-18
    $('#tender_procuring_div').change(function() {
      var tprodiv = $(this).val();

      if(tprodiv == '' || tprodiv == 0)
        return;

      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Common_con/get_dist_by_divi/'); ?>",
        data: { division_id : tprodiv },
        success: function(data)
        {
          // alert(data);
          $('#tender_procuring_dist').html(data);
        }
      });
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