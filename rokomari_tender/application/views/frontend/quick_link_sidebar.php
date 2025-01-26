    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
      <div class="content-1">
        <?php
          if($this->uri->segment(2) != 'sign_up' && !$this->ion_auth->logged_in())
          {
        ?>
        <p class="h4 text-right text-white bg-primary px-2 py-4 curpoint" id="ten_day_sign_up">
          Sign Up to get <br> <span class="text-warning"> 10 days </span><br> Free Service
        </p>
        <?php 
          }
        ?>
        <?php
          if(!$this->ion_auth->logged_in())
          {
            echo $this->load->view('frontend/right_login_section'); 
          
            echo '<div class="my-2"></div>';
          }
        ?>
        <div class="quick-link border" style="font-size: 13px;">
          <p class="h6 bg-primary px-2 py-2 text-white">Quick Link</p>
          <ul class="list-unstyled px-1">
          <?php
            if($this->ion_auth->logged_in())
            {
          ?>
            <li class="py-2"><a class="btn btn-light text-primary" href="<?= base_url('user-logout') . $sufx ?>">Logout</a></li>
            <li class="py-2"><a class="btn btn-light text-primary" href="<?= base_url('reminder') . $sufx ?>">Reminders</a></li>
          <?php
            }
          ?>
            <li class="py-2"><a class="btn btn-light text-primary" href="<?= base_url() ?>">Home</a></li>
            <li class="py-2"><a class="btn btn-light text-primary" href="<?= base_url('advanced-search') . $sufx ?>">Advanced Search</a></li>
            <!-- <li class="py-2"><a class="btn btn-light text-primary" href="#">My Calendar</a></li> -->
            <li class="py-2"><a class="btn btn-light text-primary" href="<?= base_url('international-tender') . $sufx ?>">International Tender</a></li>
            <li class="py-2"><a class="btn btn-light text-primary" href="#">Services and Billing</a></li>
            <?php
              if($this->ion_auth->logged_in())
              {
            ?>
            <li class="py-2"><a class="btn btn-light text-primary" href="<?= base_url('dashboard') . $sufx ?>">Change Products</a></li>
            <li class="py-2"><a class="btn btn-light text-primary" href="<?= base_url('favorite-tender') . $sufx ?>">Favorite Tenders</a></li>
            <li class="py-2"><a class="btn btn-light text-primary" href="<?= base_url('edit-account') . $sufx ?>">My Account</a></li>
            <?php
              }
            ?>
            <li class="py-2"><a class="btn btn-light text-primary" href="#">E-mail History</a></li>
            <li class="py-2"><a class="btn btn-light text-primary" href="#">Sign Out</a></li>
          </ul>
        </div>
      </div>
    </div><!-- end of col-xl-2 -->  