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
          <a href="<?=base_url('tender/add')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> Create Tender</a> 
          <a href="<?=base_url('tender')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Tender</a> 
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
                  <th>Tender Title</th>
                  <td><?php echo htmlspecialchars($tender_details->tender_title,ENT_QUOTES,'UTF-8');?></td>
                  <th>Inviter</th>
                  <td><?= $tender_details->inviter_name ?></td>
                </tr>
                <tr>
                  <th>Tender ID</th>
                  <td><?php echo htmlspecialchars($tender_details->tender_manual_id,ENT_QUOTES,'UTF-8');?></td>
                  <th>Source</th>
                  <td><?= $tender_details->source_name ?></td>
                </tr>
                <tr>
                  <th>Doc Price</th>
                  <td><?php echo htmlspecialchars($tender_details->tender_doc_price,ENT_QUOTES,'UTF-8');?></td>
                  <th>Category</th>
                  <td><?php echo htmlspecialchars($tender_details->category_name,ENT_QUOTES,'UTF-8');?></td>
                </tr>
                <tr>
                  <th>Security Amount</th>
                  <td><?php echo htmlspecialchars($tender_details->tender_security_amount,ENT_QUOTES,'UTF-8');?></td>
                  <th>Sub Category</th>
                  <td><?php echo htmlspecialchars($tender_details->sub_cat_name,ENT_QUOTES,'UTF-8');?></td>
                </tr>
                <tr>
                  <th>Published On</th>
                  <td><?php echo date('d-m-Y', strtotime($tender_details->tender_published_on));?></td>
                  <th>Division</th>
                  <td><?php echo htmlspecialchars($tender_details->division_name,ENT_QUOTES,'UTF-8');?></td>
                </tr>
                <tr>
                  <th>Closed On</th>
                  <td><?php echo date('d-m-Y', strtotime($tender_details->tender_closed_on));?></td>
                  <th>District</th>
                  <td><?php echo htmlspecialchars($tender_details->district_name,ENT_QUOTES,'UTF-8');?></td>
                </tr>
                <tr>
                  <th>Closed Time</th>
                  <td><?php echo htmlspecialchars($tender_details->tender_closed_time,ENT_QUOTES,'UTF-8');?></td>
                  <th>Call Type</th>
                  <td>
                  <?php 
                    if($tender_details->tender_call_type == 1)
                      echo '<span class="label label-info">Tender</span>';
                    else if($tender_details->tender_call_type == 2)
                      echo '<span class="label label-primary">Corrigendum</span>';
                    else if($tender_details->tender_call_type == 3)
                      echo '<span class="label label-danger">Cancellation</span>';
                    else if($tender_details->tender_call_type == 4)
                      echo '<span class="label label-success">Republished</span>';
                  ?>
                  </td>
                </tr>
                <tr>
                  <th></th>
                  <td></td>
                  <th>Tender On</th>
                  <td>
                  <?php 
                    if($tender_details->tender_on == 1)
                      echo '<span class="label label-info">Goods</span>';
                    else if($tender_details->tender_on == 2)
                      echo '<span class="label label-primary">Works</span>';
                    else if($tender_details->tender_on == 3)
                      echo '<span class="label label-success">Services</span>';
                  ?>
                  </td>
                </tr>
                <tr>
                  <th></th>
                  <td></td>
                  <th>Bidding Type</th>
                  <td>
                  <?php 
                    if($tender_details->tender_bidding_type == 1)
                      echo '<span class="label label-info">Local</span>';
                    else if($tender_details->tender_bidding_type == 2)
                      echo '<span class="label label-primary">International</span>';
                  ?>
                  </td>
                </tr>
                <tr>
                  <th>Pre-Bid Meeting</th>
                  <td><?= date('d-m-Y', strtotime($tender_details->tender_prebid_meeting)) ?></td>
                  <th>Created</th>
                  <td><?= date('d-m-Y H:i:s', strtotime($tender_details->tender_created)) ?></td>
                </tr>
                <tr>
                  <th>Procurement Method</th>
                  <td><?php echo htmlspecialchars($tender_details->pro_method_name,ENT_QUOTES,'UTF-8');?></td>
                  <th>Updated</th>
                  <td><?= date('d-m-Y H:i:s', strtotime($tender_details->tender_updated)) ?>
                  </td>
                </tr>
                <tr>
                  <th>Image</th>
                  <td colspan="3">
                    <img src="<?= $tender_details->tender_img_url; ?>" height="250" width="300" alt="No Image" style="border: 1px solid rgb(60, 141, 188);">
                  </td>
                </tr>
                <tr>
                  <th></th>
                  <td></td>
                  <th></th>
                  <td><a href="<?= base_url('tender/edit/' . $tender_details->tender_auto_id) ?>" class="btn btn-primary" >Edit This Tender</a></td>
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
