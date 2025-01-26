<div class="container-fluid login-bg-image">
  <div class="row">
    <div class="offset-xl-3 offset-lg-3 offset-md-2 col-xl-6 col-lg-6 col-md-8 col-sm-12 col-xs-12">
      <div class="content-1" id="search_content" style="margin-top:130px">
        <div class="content-2" style="background-color: #f3f3f3; border:1px solid #dfdfdf;">
          <p class="h6 px-3 pt-3">Forgot Password</p>
          <div class="text-justify px-3 py-1">
            <hr class="mt-1">
            
            <?php echo $message;?>
            
            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-10">
                <form method="post" action="<?= base_url('forgot_password') ?>" class="ml-3 mr-3">
                  <div class="form-group ">
                    <label class="col-sm-3">Email <span style="color: red;">*</span></label>
                    <input type="email" name="identity" id="identity" class="form-control col-sm-8">
                  </div>
                  <div class="form-group ">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-7"><?= form_error('user_email') ?></div>
                  </div>
                  <button class="btn btn-primary text-right" id="">Submit</button>
                </form>
              </div>
            </div>
            <p class="pt-1"></p>
            <hr class="mt-3">
          </div>
        </div>
        <p class="py-1"></p>
      </div>
    </div>
    <!-- end of col-xl-8 -->
  </div>
</div>
<!-- <div class="pt-5"></div> -->
