        <?php
          $sufx = $this->config->item('url_suffix');
        ?>
        <div class="Login border" style="font-size: 13px;">
          <form class="px-2 py-3" action="<?= base_url('user-login') . $sufx ?>" method="post">
            <div class="form-group">
              <label for="exampleDropdownFormEmail1">Email address</label>
              <input type="email" class="form-control" id="identity" name="identity" placeholder="email@example.com">
            </div>
        
            <div class="form-group">
              <label for="exampleDropdownFormPassword1">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
          
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1">
              <label class="form-check-label" for="remember">
                Remember me
              </label>
            </div>
            <p class="my-1"></p>
            <button type="submit" class="btn btn-primary btn-sm">Sign in</button>

          </form>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= base_url('user-registration') . $sufx ?>">New around here?</a>
          <a class="dropdown-item" href="<?= base_url('forgot_password') ?>">Forgot password?</a>
        </div>