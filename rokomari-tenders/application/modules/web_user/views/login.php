<div class="container-fluid login-bg-image">
      <div class="row">
            <div class="col-md login_card_position">
                  <div class="login_card">
                        <div class="container">
                              <div class="d-flex justify-content-center">
                                    <img src="images/logo.png" alt="">
                              </div>
                              <div class="text-center mt-4">
                                    <h3 class="login_sign_in">Sign in</h3>
                              </div>
                              <?= $message;?>
                              <div>
                             
                                    <form method="post" action="<?= base_url('user-login') ?>">
                                          <div class="mb-4 login_form">
                                                <input type="email" name="identity" class="form-control login_form_input"
                                                      id="identity" aria-describedby="emailHelp"
                                                      placeholder="Enter Your Mail">
                                          </div>
                                          <div class="mb-4 login_form">
                                                <input type="password" name="password" class="form-control login_form_input"
                                                      id="password" placeholder="Password">
                                                      <!-- <p class="password_bottom_text">Password Must Be 8 Characters Long</p> -->
                                          </div>
                                          <div class="d-flex justify-content-between me-4">
                                                <div class="d-flex align-items-center">
                                                <input type="checkbox" name="remember" id="remember" value="1"> 
                                                      <p class="keep_me_sign">Keep me signed in</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                      <a href="">
                                                            <img src="images/google.svg" alt="">
                                                      </a>
                                                      <a href="">
                                                            <img src="images/facebook.svg" class="ms-3" alt="">
                                                      </a>
                                                </div>
                                          </div>
                                          <div class="mt-4 d-flex justify-content-center">
                                                <button type="submit" class="btn login_btn">Login</button>
                                          </div>
                                    </form>

                                    <div class="mt-4 text-center">
                                          <a href="<?= base_url('forgot_password') ?>" class="forgot_pass">Forgot password?</a>
                                          <p class="mt-2">Do not have an account? <span class="forgot_pass"><a href="<?= base_url('user-registration') ?>">Sign Up</a></span> </p>
                                    </div>

                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>