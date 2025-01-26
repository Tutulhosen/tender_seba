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
          <a href="<?=base_url('subcategory/add')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> Create Sub Category</a> 
        </div>        

          <div class="box-body">
            <div id="infoMessage"><?php ?></div>            
            <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('success');?>
                </div>
            <?php endif; ?>
            <table id="example1" class="table table-bordered table-striped table-responsive">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Main Category</th>
                  <th>Created</th>
                  <th>Updated</th> 
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $sl=0;
                foreach ($subcategories as $subcategory):
                  $sl++;

              ?>
              <tr>
                <td><?=$sl;?></td>
                <td><?php echo htmlspecialchars($subcategory->sub_cat_name,ENT_QUOTES,'UTF-8');?></td>
                <td><?php echo htmlspecialchars($subcategory->sub_cat_desc,ENT_QUOTES,'UTF-8');?></td>
                <td><?php echo htmlspecialchars($subcategory->category_name,ENT_QUOTES,'UTF-8');?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($subcategory->sub_cat_created));?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($subcategory->sub_cat_updated));?></td> 
                <td class="text-center">
                  <!-- <input type="hidden" id="delete_subcategory_url" value="<?= base_url('subcategory/delete/') . $subcategory->sub_cat_id ?>" > -->
                  <a href="<?= base_url('subcategory/edit/' . $subcategory->sub_cat_id) ?>" class="btn btn-primary">Edit</a> <!-- |
                  <a href="#" class="btn btn-danger" onclick="delete_subcategory(<?= $subcategory->sub_cat_id ?>)">Delete</a> -->
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
