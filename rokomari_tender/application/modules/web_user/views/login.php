
<div class="pt-1"></div>
<div class="mt-1"></div>

<div class="py-2"></div>
<div class="main_content container">
  
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="content-1" id="search_content">
        <div class="content-2" style="background-color: #f3f3f3; border:1px solid #dfdfdf;">
          <p class="h6 px-3 pt-3">Login Information</p>
          <div class="text-justify px-3 py-1">
            <hr class="mt-1">
            
            <?php echo $message;?>
            
            <div class="row">
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 ml-3 mr-4">
                <form method="post" action="<?= base_url('user-login') ?>">
                  <div class="form-group row">
                    <label class="col-sm-3">Email<span style="color: red;">*</span></label>
                    <input type="email" name="identity" id="identity" class="form-control col-sm-9">
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8"><?= form_error('user_email') ?></div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3">Password<span style="color: red;">*</span></label>
                    <input type="password" name="password" id="password" class="form-control col-sm-9">
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8"><?= form_error('user_password') ?></div>
                  </div>
                  <div class="checkbox">
                    <input type="checkbox" name="remember" id="remember" value="1"> Remember me
                  </div>
                  <div>
                    <button class="btn btn-primary pull-right" id="">Submit</button>
                  </div>
                  <div style="clear: both;"></div>
                  <hr>
                  <div class="row">
                    <a href="<?= base_url('forgot_password') ?>">Forgot Password?</a>
                  </div>
                </form>
              </div>
              <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12">
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
            <p class="pt-1"></p>
            <hr class="mt-3">
          </div>
        </div>
        <p class="py-1"></p>
      </div>
    </div><!-- end of col-xl-8 -->
  </div><!-- end main of row -->
</div> <!-- end of main_content -->
<div class="py-3"></div>