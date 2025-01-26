
<!-- <div class="pt-1"></div> -->
<!-- <div class="mt-1"></div> -->

<div class="py-2"></div>
<div class="main_content container">
  
  <div class="row">
    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12">
      <div class="content-1" id="search_content">
        <div class="content-2" style="background-color: #f3f3f3; border:1px solid #dfdfdf;">
          <p class="h6 px-3 pt-3">Personal Information</p>
          <div class="text-justify px-3 py-1">
            <hr class="mt-1">
            <?= $message ?>
            <form method="post" action="<?= base_url('user-registration') ?>" id="personal_info_tbl">
              <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 ml-3 mr-4">
                  <div class="form-group row">
                    <label class="col-sm-5">Name <span style="color: red;">*</span></label>
                    <input type="text" name="user_name" id="user_name" class="form-control col-sm-7" value="<?= set_value('user_name') ?>" required>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-5"></label>
                    <div class="col-sm-7"><?= form_error('user_name') ?></div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-5">Cell No <span style="color: red;">*</span></label>
                    <input type="text" name="user_phone" id="user_phone" class="form-control col-sm-7" value="<?= set_value('user_phone') ?>" required>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8"><?= form_error('user_phone') ?></div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-5">Email <span style="color: red;">*</span></label>
                    <input type="email" name="user_email" id="user_email" class="form-control col-sm-7" value="<?= set_value('user_email') ?>" required>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8"><?= form_error('user_email') ?></div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-5">Password <span style="color: red;">*</span></label>
                    <input type="password" name="user_password" id="user_password" class="form-control col-sm-7" required>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8"><?= form_error('user_password') ?></div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-5">Confirm Password <span style="color: red;">*</span></label>
                    <input type="password" name="user_confirm_password" id="user_confirm_password" class="form-control col-sm-7" required>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2"></label>
                    <div class="col-sm-10">
                      <?= form_error('user_confirm_password') ?>
                      <span id="password_mismatch_text" style="color: red;">Retyped password does not match with the original password!</span>  
                    </div>
                  </div>
                  <div class="checkbox">
                    <input type="checkbox" name="user_agree" id="user_agree" value="1" checked required> Yes, I agree with the terms and conditions. <br> <span id="user_agree_err_msg" style="color: red;">You must agree with our terms and conditions.</span>
                  </div>
                  <div class="checkbox">
                    <div><?= form_error('user_agree') ?></div>
                  </div>
                  <div>
                    <button class="btn btn-primary pull-right" id="per_info_btn">Submit</button>
                  </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                  <p>Subscribe with RokomariTender now to enjoy following services for <span style="color: red;">FREE:</span></p>
                  <ul class="list-group">
                    <li class="list-group-item">Email Notification on your preferred products for <span style="color: red;">10</span> days. <a href="#"><strong>Click here</strong></a> to see a sample email notification.
                    </li>
                    <li class="list-group-item">SMS Alert on your preferred products for 5 days. <a href="#"><strong>Click here</strong></a> to see a sample SMS alert.
                    </li>
                    <li class="list-group-item">Personal Web Space at RokomariTender where you can view your preferred tenders, search for your desired tenders, see various reports and much more. <a href="#"><strong>Click here</strong></a> to see a sample web space.</li>
                  </ul>
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

    <?= $this->load->view('frontend/quick_link_sidebar') ?>
  </div><!-- end main of row -->
</div> <!-- end of main_content -->
<div class="py-3"></div>