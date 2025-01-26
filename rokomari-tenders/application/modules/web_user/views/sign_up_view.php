<div class="container-fluid register-bg-image">
      <div class="row">
            <div class="col-md login_card_position">
                  <div class="login_card">
                        <div class="container">
                              <div class="d-flex justify-content-center">
                                    <img src="images/logo.png" alt="">
                              </div>
                              <div class="text-center mt-4">
                                    <h3 class="login_sign_in">Sign Up</h3>
                              </div>
                              <?= $message;?>
                              <div>
                                    <form method="post" action="<?= base_url('user-registration') ?>">
                                          <div class="mb-4 login_form">
                                                <input type="text" class="form-control login_form_input" name="user_name"
                                                      id="user_name" aria-describedby="emailHelp"
                                                      placeholder="Name">
                                          </div>
                                          <div class="mb-4 login_form">
                                                <input type="email" class="form-control login_form_input" name="user_email"
                                                      id="user_email" aria-describedby="emailHelp"
                                                      placeholder="Email">
                                          </div>
                                          <div class="mb-4 login_form">
                                                <input type="text" class="form-control login_form_input" name="user_phone"
                                                      id="user_phone" aria-describedby="emailHelp"
                                                      placeholder="Phone">
                                          </div>
                                          <div class="mb-4 login_form">
                                                <input type="password" class="form-control login_form_input" name="user_password"
                                                      id="user_password" placeholder="Password">
                                                      <!-- <p class="password_bottom_text">Password Must Be 8 Characters Long</p> -->
                                          </div>
                                          <div class="mb-4 login_form">
                                                <input type="password" class="form-control login_form_input" name="user_confirm_password"
                                                      id="user_confirm_password" placeholder="Confirm Password">
                                                      
                                          </div>
                                          <!-- <div class="d-flex justify-content-between me-4">
                                                <div class="d-flex align-items-center">
                                                      <img src="images/Checkboxes.svg" alt="">
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
                                          </div> -->
                                          <div class="mt-4 d-flex justify-content-center">
                                                <button type="submit" class="login_btn">Sign Up</button>
                                          </div>
                                    </form>

                                    <div class="mt-4 text-center">
                                          <p class="mt-2"> have an account? <span class="forgot_pass"><a href="<?= base_url('user-login') ?>">Login</a></span> </p>
                                    </div>

                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>