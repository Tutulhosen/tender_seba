<div class="clear hidden-xs hidden-sm"> </div>
<div class="main-section">
        
        <div class="row">

          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-3">
            
            <div class="main-content">
              <h3>সাইন ইন করুন</h3>
              <?php echo form_open("signin");?>
                  
                  <div class="row">
                      <div class="col-xs-12">
                        <div id="infoMessage"><?php echo $message;?></div>
                      </div>
                      <div class="col-xs-12">
                          <div class="form-group has-feedback">
                            <?php echo form_input($identity);?>        
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                            <?php echo form_input($password);?>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                      <div class="checkbox icheck">
                        <label for="remember">
                          <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>  Remember Me
                        </label>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <?php echo form_submit('submit', 'Sign In', "class='btn btn-info sending'"); ?>
                    </div>
                    <!-- /.col -->
                  </div>
                <?php echo form_close();?>
            </div>
          </div>
        </div>
    </div>
    <div class="clear hidden-xs hidden-sm"> </div>