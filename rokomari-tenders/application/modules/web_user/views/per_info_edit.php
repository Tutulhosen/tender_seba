
<div class="pt-1"></div>
<div class="mt-1"></div>

<div class="py-2"></div>
<div class="main_content container">
  
  <div class="row">
    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12">
      <div class="content-1" id="search_content">
        <div class="content-2" style="background-color: #f3f3f3; border:1px solid #dfdfdf;">
          <p class="h6 px-3 pt-3">Update Personal Information</p>
          <div class="text-justify px-3 py-1">
            <hr class="mt-1">

            <?php if($this->session->flashdata('success')):?>
              <div class="alert alert-success">
                <a class="close" data-dismiss="alert">&times;</a>
                <?php echo $this->session->flashdata('success');;?>
              </div>
            <?php endif; ?>

            <?php if(!empty($message)):?>
              <div class="alert alert-danger">
                <a class="close" data-dismiss="alert">&times;</a>
                <?php echo $message; ?>
              </div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('edit-account') ?>" id="personal_info_details_tbl">
              <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12 ml-3 mr-4">
                  <div class="form-group row">
                    <label class="col-sm-3">Name <span style="color: red;">*</span></label>
                    <input type="text" name="user_name" id="user_name" class="form-control col-sm-9" value="<?= set_value('user_name', $web_user_details['webu_full_name']) ?>" required>
                  </div>
                  <?php if(form_error('user_name') != ''): ?>
                  <div class="form-group row">
                    <label class="col-sm-3"></label>
                    <div class="col-sm-9"><?= form_error('user_name') ?></div>
                  </div>
                  <?php endif; ?>
                  <div class="form-group row">
                    <label class="col-sm-3">Cell No <span style="color: red;">*</span></label>
                    <input type="text" name="user_phone" id="user_phone" class="form-control col-sm-9" value="<?= set_value('user_phone', $web_user_details['webu_phone']) ?>" required>
                  </div>
                  <?php if(form_error('user_phone') != ''): ?>
                  <div class="form-group row">
                    <label class="col-sm-2"></label>
                    <div class="col-sm-10"><?= form_error('user_phone') ?></div>
                  </div>
                  <?php endif; ?>
                  <div class="form-group row">
                    <label class="col-sm-3">Email <span style="color: red;">*</span></label>
                    <input type="email" name="user_email" id="user_email" class="form-control col-sm-9" value="<?= set_value('user_email', $web_user_details['webu_email']) ?>" required>
                  </div>
                  <?php if(form_error('user_email') != ''): ?>
                  <div class="form-group row">
                    <label class="col-sm-1"></label>
                    <div class="col-sm-11"><?= form_error('user_email') ?></div>
                  </div>
                  <?php endif; ?>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group row">
                    <label class="col-sm-4">Designation <span style="color: red;">*</span></label>
                    <input type="text" name="user_designation" id="user_designation" class="form-control col-sm-8" value="<?= set_value('user_designation', $web_user_details['webu_designation']) ?>" required>
                  </div>
                  <?php if(form_error('user_designation') != ''): ?>
                  <div class="form-group row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8"><?= form_error('user_designation') ?></div>
                  </div>
                  <?php endif; ?>
                  <div class="form-group row">
                    <label class="col-sm-4">Company Name <span style="color: red;">*</span></label>
                    <input type="text" name="user_company_name" id="user_company_name" class="form-control col-sm-8" value="<?= set_value('user_company_name', $web_user_details['webu_company_name']) ?>" required>
                  </div>
                  <?php if(form_error('user_company_name') != ''): ?>
                  <div class="form-group row">
                    <label class="col-sm-3"></label>
                    <div class="col-sm-9"><?= form_error('user_company_name') ?></div>
                  </div>
                  <?php endif; ?>
                  <div class="form-group row">
                    <label class="col-sm-4">Company Type <span style="color: red;">*</span></label>
                    <?= form_dropdown('user_company_type', $webu_company_type, set_value('user_company_type', $web_user_details['webu_company_type']), 'class="form-control select2 col-sm-8" id="user_company_type" required') ?>
                  </div>
                  <?php if(form_error('user_company_type') != ''): ?>
                  <div class="form-group row">
                    <label class="col-sm-3"></label>
                    <div class="col-sm-9"><?= form_error('user_company_type') ?></div>
                  </div>
                  <?php endif; ?>
                  <div class="form-group row">
                    <label class="col-sm-4">Company Address</label>
                    <input type="text" name="user_company_address" id="user_company_address" class="form-control col-sm-8" value="<?= set_value('user_company_address', $web_user_details['webu_company_address']) ?>">
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4">Website</label>
                    <input type="text" name="user_website" id="user_website" class="form-control col-sm-8" value="<?= set_value('user_website', $web_user_details['webu_website']) ?>">
                  </div>
                  <div>
                    <button class="btn btn-primary pull-right" id="per_info_details_btn">Submit</button>
                  </div>
                </div>
              </div>
            </form>
            <p class="pt-1"></p>
            <hr class="mt-3">
          </div>
        </div>
        <p class="py-1"></p>
      </div>
    </div><!-- end of col-xl-8 -->

   <?= $this->load->view('frontend/quick_link_sidebar.php') ?>
  </div><!-- end main of row -->
</div> <!-- end of main_content -->
<div class="py-3"></div>