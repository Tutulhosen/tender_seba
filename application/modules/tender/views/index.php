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
          <a href="<?=base_url('tender/add')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> Add New Tender</a> 
        </div>        

          <div class="box-body">
            <div id="infoMessage"><?php ?></div>            
            <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('success');?>
                </div>
            <?php endif; ?>

            <?php 
              if($this->session->flashdata('error')):
                echo $this->session->flashdata('error');
              endif; 
            ?>
            <table id="tenderList" class="table table-bordered table-striped table-responsive">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Doc Price</th>
                  <th>Published On</th>
                  <th>Closed On</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                foreach ($tenders as $rowtender):

              ?>
              <tr>
                <td><?=$rowtender->tender_manual_id;?></td>
                <td><?php echo htmlspecialchars($rowtender->tender_title,ENT_QUOTES,'UTF-8');?></td>
                <td><?php echo htmlspecialchars($rowtender->tender_doc_price,ENT_QUOTES,'UTF-8');?></td>
                <td><?php echo date('d-m-Y', strtotime($rowtender->tender_published_on));?></td>
                <td><?php echo date('d-m-Y', strtotime($rowtender->tender_closed_on));?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($rowtender->tender_created));?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($rowtender->tender_updated));?></td>
                <td class="text-center">
                  <a href="<?= base_url('tender/edit/' . $rowtender->tender_auto_id) ?>" class="btn btn-xs btn-primary">Edit</a> |
                  <a href="<?= base_url('tender/details/' . $rowtender->tender_auto_id) ?>" class="btn btn-xs btn-info" >Details</a>
                </td>
              </tr>
              <?php endforeach;?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">  </div>
      </div> <!-- /.box -->
    </div>
  </div> <!-- /.row -->

</section> <!-- /.content -->

<script type="text/javascript">
  $(document).ready(function() {
    $('#tenderList').DataTable({
      order: [[5, 'desc']]
    });
  });
</script>