<style type="text/css">
  .history_table table, th, td {
    border: 1px solid black;
  }

  th, td {
    padding: 2px 4px;
    text-align: center;
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
    <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?=$meta_title; ?></h3>
          <a href="<?=base_url('payment')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Payment History</a> 
        </div>        
        <?php echo form_open_multipart("payment/add");?>
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
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Web User</label>
                      <div><?php echo form_error('webu_id'); ?></div>
                      <?php echo form_dropdown('webu_id', $webu_id, set_value('webu_id'), 'class="form-control select2" id="webu_id"');?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Payment Month</label>
                      <div><?php echo form_error('payment_month'); ?></div>
                      <select name="payment_month" class="form-control">
                        <option value="">-- Select Month --</option>
                        <option value="1" <?= set_value('payment_month')==1? 'selected':'' ?> >January</option>
                        <option value="2" <?= set_value('payment_month')==2? 'selected':'' ?> >February</option>
                        <option value="3" <?= set_value('payment_month')==3? 'selected':'' ?> >March</option>
                        <option value="4" <?= set_value('payment_month')==4? 'selected':'' ?> >April</option>
                        <option value="5" <?= set_value('payment_month')==5? 'selected':'' ?> >May</option>
                        <option value="6" <?= set_value('payment_month')==6? 'selected':'' ?> >June</option>
                        <option value="7" <?= set_value('payment_month')==7? 'selected':'' ?> >July</option>
                        <option value="8" <?= set_value('payment_month')==8? 'selected':'' ?> >August</option>
                        <option value="9" <?= set_value('payment_month')==9? 'selected':'' ?> >September</option>
                        <option value="10" <?= set_value('payment_month')==10? 'selected':'' ?> >October</option>
                        <option value="11" <?= set_value('payment_month')==11? 'selected':'' ?> >November</option>
                        <option value="12" <?= set_value('payment_month')==12? 'selected':'' ?> >December</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Payment Year</label>
                      <div><?php echo form_error('payment_year'); ?></div>
                      <select name="payment_year" class="form-control">
                        <option value="">-- Select Year --</option>
                        <?php 
                          $ii = date('Y', strtotime('-2 years'));
                          for( ; $ii <= 2030; $ii++):
                            if($ii == date('Y') && set_value('payment_year') == ''): 
                              echo '<option value="' . $ii . '" selected>' . $ii . '</option>';
                            elseif($ii == set_value('payment_year')):
                              echo '<option value="' . $ii . '" selected>' . $ii . '</option>';
                            else:
                              echo '<option value="' . $ii . '" >' . $ii . '</option>';
                            endif;
                          endfor;
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Payment Date</label>
                      <div><?php echo form_error('payment_date'); ?></div>
                      <?= form_input($payment_date) ?>
                      <!-- <input type="" name="payment_date" class="datepicker form-control" placeholder="Click to select date (DD-MM-YYYY)" value="<?= set_value('payment_date') ?>"> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Payment By</label>
                      <div><?php echo form_error('payment_by'); ?></div>
                      <select name="payment_by" class="form-control">
                        <option value="">-- Payment By --</option>
                        <option value="1" <?= set_value('payment_by')==1? 'selected':'' ?> >Bkash</option>
                        <option value="2" <?= set_value('payment_by')==2? 'selected':'' ?> >Bank</option>
                        <option value="3" <?= set_value('payment_by')==3? 'selected':'' ?> >Cash</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Payment Amount</label>
                      <div><?php echo form_error('payment_amount'); ?></div>
                      <?= form_input($payment_amount) ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Payment Remarks &nbsp; <small class="pull-right">(Max: 255)</small></label>
                      <div><?php echo form_error('payment_remarks'); ?></div>
                      <?= form_input($payment_remarks) ?>
                    </div>
                  </div>
                </div>
              </div>
                <!-- end of left side -->

            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">    
            <?php //echo form_input($user_id);?>        
            <?php echo form_submit('submit', 'Add Payment', "class='btn btn-primary pull-right'"); ?>
          </div>
        <?php echo form_close();?>
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-4">
      <table class="history_table" style="border-collapse: collapse;">
        <thead>
          <tr>
            <th>Pay Month</th>
            <th>Pay Date</th>
            <th>Amount</th>
            <th>Payment By</th>
          </tr>
        </thead>
        <tbody id="webu_payment_history">
          
        </tbody>
      </table>
    </div>
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->

<script type="text/javascript">
  $(document).ready(function() {

    $('#webu_id').change(function(){
      var webu_id = $(this).val();

      if(webu_id == '' || webu_id == 0)
        return;

      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Common_con/get_user_pay_history'); ?>",
        data: { webu_id: webu_id },
        success: function(data)
        {
          $('#webu_payment_history').html(data);
        }
      });
    });
  });
</script>