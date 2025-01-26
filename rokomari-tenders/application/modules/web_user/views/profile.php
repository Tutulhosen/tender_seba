
<?php

   if ($this->ion_auth->logged_in()) {
       $user_id=$this->session->userdata('user_id');
       $pck_product_no=$this->Common_model->get_tender_product_count();
       if (!empty($pck_product_no)) {
          $user_selected_product=$this->Web_user_model->get_user_selected_product_count();
          $user_selected_product_no=count($this->Web_user_model->get_user_selected_product_count());
          $remaining_product_no= $pck_product_no->pkg_no_of_products - $user_selected_product_no;
       }

        
    }

?>
<div class="container-fluid teder_bg_image " style="background-image: none;">
    
</div>
<div class="d-md-flex align-items-start" style="margin-top: -50px;">
            <div class="col col-md-4 px-5">
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                <div class="d-flex align-items-center justify-content-around mx-3 my-4">
                  <div>
                    <img src="images/profile_img.png" class="profile_image" alt="">
                  </div>
                  <div>
                    <p class="my_profile_name"><?=$user_info->webu_full_name?></p>
                    <!-- <button class="my_profile_btn">My Profile</button> -->
                  </div>
                </div>
                <hr class="hr_my_profile">

                <button class="nav-link active d-flex align-items-center mb-2 ps-4" id="v-pills-tender-tab"
                  data-bs-toggle="pill" data-bs-target="#v-pills-tender" type="button" role="tab"
                  aria-controls="v-pills-tender" aria-selected="true">
                  <i class="fa-solid fa-newspaper profile_list_icon"></i>
                  <p class="ms-3 profile_list_text">My Profile</p>
                </button>
                <button class="nav-link d-flex align-items-center mb-2 ps-4" id="v-pills-my-package-tab"
                  data-bs-toggle="pill" data-bs-target="#v-pills-my-package" type="button" role="tab"
                  aria-controls="v-pills-my-package" aria-selected="true">
                  <i class="fa-solid fa-box-open profile_list_icon"></i>
                  <p class="ms-3 profile_list_text">My Package</p>
                </button>
                <button class="nav-link d-flex align-items-center mb-2 ps-4" id="v-pills-package-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-package" type="button" role="tab" aria-controls="v-pills-package"
                  aria-selected="false">
                  <i class="fa-solid fa-calculator profile_list_icon"></i>
                  <p class="ms-3 profile_list_text">Easy Package</p>
                </button>
                <button class="nav-link d-flex align-items-center mb-2 ps-4" id="v-pills-notification-tab"
                  data-bs-toggle="pill" data-bs-target="#v-pills-notification" type="button" role="tab"
                  aria-controls="v-pills-notification" aria-selected="false">
                  <i class="fa-solid fa-bell profile_list_icon"></i>
                  <p class="ms-3 profile_list_text">Notification</p>
                </button>
                <button class="nav-link d-flex align-items-center mb-2 ps-4" id="v-pills-save-list-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-save-list" type="button" role="tab" aria-controls="v-pills-save-list"
                  aria-selected="false">
                  <i class="fa-solid fa-heart profile_list_icon"></i>
                  <p class="ms-3 profile_list_text">Save Listed Tender</p>
                </button>
                <button class="nav-link d-flex align-items-center mb-2 ps-4" id="v-pills-profile-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                  aria-selected="false">
                  <i class="fa-solid fa-user profile_list_icon"></i>
                  <p class="ms-3 profile_list_text">Update Profile</p>
                </button>
              </div>
            </div>


            <div class="tab-content container col col-md-8 px-0" id="v-pills-tabContent">

                <div class="tab-pane fade show active" id="v-pills-tender" role="tabpanel" aria-labelledby="v-pills-tender-tab"
                  tabindex="0">

                  <div class="d-flex justify-content-center mt-4">
                    <h3 class="save_listed">Profile Information</h3>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-5">
                      <div class="profile_information_border">
                        <div class="d-flex justify-content-center">
                          <img src="images/profile_img.png" class="profile_infor_img" alt="">
                        </div>
                        <div class="text-center">
                          <p class="profile_list_icon">My Profile</p>
                        </div>
                        <div class="mt-4">
                          <div class="d-flex mb-2">
                            <p class="profile_inf_head">Name:</p>
                            <p><?=$user_info->webu_full_name?></p>
                          </div>
                          <div class="d-flex mb-2">
                            <p class="profile_inf_head">Member ID:</p>
                            <p><?=$user_info->remember_code?></p>
                          </div>
                          <div class="d-flex mb-2">
                            <p class="profile_inf_head">Mobile:</p>
                            <p><?=$user_info->webu_phone?></p>
                          </div>
                          <div class="d-flex mb-2">
                            <p class="profile_inf_head">Email:</p>
                            <p><?=$user_info->webu_email?></p>
                          </div>
                          <div class="d-flex mb-2">
                            <p class="profile_inf_head">Gender:</p>
                            <p><?=$user_info->remember_code?></p>
                          </div>
                          <div class="d-flex mb-2">
                            <p class="profile_inf_head">Address:</p>
                            <p><?=$user_info->remember_code?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-7 mt-4 mt-md-0">
                      <div class="profile_information_border p-4">
                        <div class="d-flex justify-content-center">
                          <img src="images/logo.png" class="" alt="">
                        </div>
                        <div class="text-center mt-3">
                          <p class="profile_list_icon">Company Profile</p>
                        </div>
                        <div class="mt-4">
                          <div class="d-flex mb-2">
                            <p class="profile_inf_head">Company Name:</p>
                            <p>Company Name</p>
                          </div>
                          <div class="d-flex mb-2">
                            <p class="profile_inf_head">Member ID:</p>
                            <p>0153456789</p>
                          </div>
                          <div class="d-flex mb-2">
                            <p class="profile_inf_head">Company Type:</p>
                            <p>IT/computer</p>
                          </div>
                          <div class="d-flex mb-2">
                            <p class="profile_inf_head">Industry:</p>
                            <p>IT</p>
                          </div>
                          <div class="d-flex mb-2">
                            <p class="profile_inf_head">Mobile:</p>
                            <p>0153456789</p>
                          </div>
                          <div class="d-flex mb-2">
                            <p class="profile_inf_head">Email:</p>
                            <p>Email@gmail.com</p>
                          </div>
                          <div class="d-flex mb-2">
                            <p class="profile_inf_head">Website:</p>
                            <p>Email@gmail.com</p>
                          </div>
                          <div class="d-flex mb-2">
                            <p class="profile_inf_head">Address:</p>
                            <p>Address: 123354/3455765jdfhbn</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5 mt-4">
                      <div class="profile_information_border">
                        <div class="text-center">
                          <p class="profile_list_icon">My Package</p>
                        </div>
                        <?php 
                            if (!empty($user_pck)) {
                                ?> 
                                    <div class="mt-4">
                                      <div class="d-flex mb-2">
                                        <p class="profile_inf_head">Package Name:</p>
                                        <p><?=$user_pck->pkg_name?></p>
                                      </div>
                                      <div class="d-flex mb-2">
                                        <p class="profile_inf_head">Price:</p>
                                        <p><?=$user_pck->pkg_price?></p>
                                      </div>
                                      <div class="d-flex mb-2">
                                        <p class="profile_inf_head">Purchasing:</p>
                                        <p><?=$user_pck->pkg_created?></p>
                                      </div>
                                      <div class="d-flex mb-2">
                                        <p class="profile_inf_head">Expired:</p>
                                        <p><?=$user_pck->pkg_created?></p>
                                      </div>
                                    </div>
                                <?php
                            } else {
                              ?> <p>No Package Found</p> <br> <a class="btn btn-sm btn-primary" href="<?=base_url('user_dashboard')?>">Select Package</a> <?php
                            }
                            
                        ?>
                        

                      </div>
                    </div>
                    <div class="col-md-7"></div>
                  </div>

                </div>
                <div class="tab-pane fade" id="v-pills-my-package" role="tabpanel" aria-labelledby="v-pills-my-package-tab"
                  tabindex="0">

                  <?php 
                      if (!empty($user_pck)) {
                              ?>
                                     <div class="row">
                                        <div class="col-md-8 px-3">
                                          
                                          <input type="hidden" id="pck_product_no" value="<?=$pck_product_no->pkg_no_of_products?>"><br>
                                          <h3 style="color: blue;">You are Enjoying <?=$user_pkg->pkg_name?> package</h3>
                                          <div class="selected_tenders" style="padding: 10px;">
                                          <p style="color: red;" >Remaining Selection items: <span class="remaining_items"></span> <span class="pck_products_no"><?=$remaining_product_no?></span></p><br>
                                                <?php

                                                            if ($pck_product_no->pkg_no_of_products>0) {
                                                                  ?> 
                                                                        
                                                                              <?php
                                                                                    foreach ($user_selected_product as $product) {
                                                                                          // var_dump($product);
                                                                                          ?> 
                                                                                                <ul>
                                                                                                    <li class="selected_product" data-id="<?=$product->sub_cat_id?>" style="padding: 5px;"><?=$product->sub_cat_name?></li>
                                                                                                </ul>
                                                                                                
                                                                                          
                                                                                          <?php 
                                                                                    }
                                                                              
                                                                              ?>
                                                                        
                                                                  
                                                                  <?php
                                                            }
                                                
                                                ?>
                                          </div>
                                          <button class="btn btn-primary save_btn" style="margin-left: 0px; display:none">Save</button>
                                        </div>
                                      </div>
                                      <?php
                                          if ($remaining_product_no !=0) {
                                              ?> <a class="btn btn-sm btn-primary" href="web_user/dashboard/add_more">add more</a> <?php
                                          }
                                      ?>
                              <?php
                      } else {
                    
                        ?> <p>No Package Found</p> <br> <a class="btn btn-sm btn-primary" href="<?=base_url('user_dashboard')?>">Select Package</a> <?php
                      }
                      
                  ?>

                  
                </div>
                <div class="tab-pane fade" id="v-pills-package" role="tabpanel" aria-labelledby="v-pills-package-tab"
                  tabindex="0">

                  <div class="d-flex justify-content-center mt-4">
                    <h3 class="save_listed">Our Package</h3>
                  </div>

                  <div class="row">
                    <?php
                     
                        if (!empty($all_tenders)) {
                          foreach ($all_tenders as $key=>$all_tender) {
                            if($key == 0 && $duration>=$pkg_duration)
                                   {
                                     continue;
                                   }
                            ?> 
                                <div class="col-md-6">
                                  <div class="package_profil_box p-4">
                                    <div class="icon-dolar">
                                      <div>
                                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect width="80" height="80" rx="8" fill="#E7F5E8" />
                                          <path opacity="0.2"
                                            d="M25.1731 31.6587C25.0597 31.851 25 32.0701 25 32.2933V47.7062C25 47.928 25.059 48.1458 25.171 48.3373C25.283 48.5287 25.4439 48.687 25.6372 48.7957L39.3872 56.5301C39.5743 56.6353 39.7853 56.6906 40 56.6906L40.0016 56.6906L40.1483 39.9998L25.1731 31.6587L25.1731 31.6587Z"
                                            fill="#4CAF50" />
                                          <path
                                            d="M55 47.7063V32.2935C55 32.0717 54.941 31.8539 54.829 31.6624C54.717 31.4709 54.5561 31.3127 54.3628 31.204L40.6128 23.4696C40.4257 23.3644 40.2147 23.3091 40 23.3091C39.7853 23.3091 39.5743 23.3644 39.3872 23.4696L25.6372 31.204C25.4439 31.3127 25.283 31.4709 25.171 31.6624C25.059 31.8539 25 32.0717 25 32.2935V47.7063C25 47.9281 25.059 48.1459 25.171 48.3374C25.283 48.5288 25.4439 48.6871 25.6372 48.7958L39.3872 56.5302C39.5743 56.6354 39.7853 56.6907 40 56.6907C40.2147 56.6907 40.4257 56.6354 40.6128 56.5302L54.3628 48.7958C54.5561 48.6871 54.717 48.5288 54.829 48.3374C54.941 48.1459 55 47.9281 55 47.7063Z"
                                            stroke="#4CAF50" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                          <path d="M47.6597 43.8298V35.7048L32.5 27.3438" stroke="#4CAF50" stroke-width="2.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                          <path d="M54.8274 31.6603L40.148 39.9998L25.1729 31.6587" stroke="#4CAF50" stroke-width="2.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                          <path d="M40.1486 40L40.002 56.6908" stroke="#4CAF50" stroke-width="2.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        </svg>
                                      </div>
                                      <div class="dolar-per-montd">
                                        <p class="dolar"> <?= $all_tender->pkg_price ?> </p>
                                        <span class="per-month">/Per Month</span>
                                      </div>
                                    </div>
                                    <h3 class="one_step_standard"><?= $all_tender->pkg_name ?></h3>
                                    <p class="one_step_pragrap">Upgrade your social portfolio with a stunning profile & enhanced shots.</p>
                                    <a href="<?php base_url() ?>Web_user/buy_package?id=<?= $all_tender->pkg_id ?>" class="btn get-started-btn w-40">Get Started
                                      <i class="fa-solid fa-arrow-right mt-2 ms-2"></i>
                                  </a>
                                    <hr>
  
                                    <div class="checkbox-list">
                                      <div>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect width="24" height="24" rx="12" fill="#E7F5E8" />
                                          <path d="M16.8125 8.93799L10.6875 15.0627L7.625 12.0005" stroke="#4CAF50" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                      </div>
                                      <div>
                                        <p class="one_step_pragrap ms-3">User Dashboard</p>
                                      </div>
                                    </div>
                                    <div class="checkbox-list">
                                      <div>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect width="24" height="24" rx="12" fill="#E7F5E8" />
                                          <path d="M16.8125 8.93799L10.6875 15.0627L7.625 12.0005" stroke="#4CAF50" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                      </div>
                                      <div>
                                        <p class="one_step_pragrap ms-3">Post 3 Ads per week</p>
                                      </div>
                                    </div>
                                    <div class="checkbox-list">
                                      <div>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect width="24" height="24" rx="12" fill="#E7F5E8" />
                                          <path d="M16.8125 8.93799L10.6875 15.0627L7.625 12.0005" stroke="#4CAF50" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                      </div>
                                      <div>
                                        <p class="one_step_pragrap ms-3">Multiple images & videos</p>
                                      </div>
                                    </div>
                                    <div class="checkbox-list">
                                      <div>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect width="24" height="24" rx="12" fill="#E7F5E8" />
                                          <path d="M16.8125 8.93799L10.6875 15.0627L7.625 12.0005" stroke="#4CAF50" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                      </div>
                                      <div>
                                        <p class="one_step_pragrap text-decoration-line-through ms-3">Basic customer support</p>
                                      </div>
                                    </div>
                                    <div class="checkbox-list">
                                      <div>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect width="24" height="24" rx="12" fill="#E7F5E8" />
                                          <path d="M16.8125 8.93799L10.6875 15.0627L7.625 12.0005" stroke="#4CAF50" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                      </div>
                                      <div>
                                        <p class="one_step_pragrap text-decoration-line-through ms-3">Featured ads</p>
                                      </div>
                                    </div>
                                    <div class="checkbox-list">
                                      <div>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect width="24" height="24" rx="12" fill="#E7F5E8" />
                                          <path d="M16.8125 8.93799L10.6875 15.0627L7.625 12.0005" stroke="#4CAF50" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                      </div>
                                      <div>
                                        <p class="one_step_pragrap text-decoration-line-through ms-3">Special ads badge</p>
                                      </div>
                                    </div>
                                    <div class="checkbox-list">
                                      <div>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect width="24" height="24" rx="12" fill="#E7F5E8" />
                                          <path d="M16.8125 8.93799L10.6875 15.0627L7.625 12.0005" stroke="#4CAF50" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                      </div>
                                      <div>
                                        <p class="one_step_pragrap text-decoration-line-through ms-3">Max 12 team members</p>
                                      </div>
                                    </div>
  
                                  </div>
                                </div>
                              <?php
                          }
                        }
                    
                    ?>
                    
                    
                  </div>

                </div>
                <div class="tab-pane fade" id="v-pills-notification" role="tabpanel" aria-labelledby="v-pills-notification-tab"
                  tabindex="0">

                  <div class="d-flex justify-content-center mt-4">
                    <h3 class="save_listed">Notification</h3>
                  </div>

                  <div class="notification_section">
                    <div class="d-flex align-items-center gap-4">
                      <div class="d-flex align-items-center gap-1">
                        <img src="images/VscCalendar.svg" alt="">
                        <p>22/03/23</p>
                      </div>
                      <div class="d-flex align-items-center gap-1">
                        <img src="images/watch_icon.svg" alt="">
                        <p>12:39 PM</p>
                      </div>
                    </div>
                    <div class="mt-3">
                      <p>We are delighted to inform you that our company has recently launched a new tender software to improve
                        the tendering process.</p>
                    </div>
                  </div>
                  <div class="notification_section">
                    <div class="d-flex align-items-center gap-4">
                      <div class="d-flex align-items-center gap-1">
                        <img src="images/VscCalendar.svg" alt="">
                        <p>22/03/23</p>
                      </div>
                      <div class="d-flex align-items-center gap-1">
                        <img src="images/watch_icon.svg" alt="">
                        <p>12:39 PM</p>
                      </div>
                    </div>
                    <div class="mt-3">
                      <p>We are delighted to inform you that our company has recently launched a new tender software to improve
                        the tendering process.</p>
                    </div>
                  </div>
                  <div class="notification_section">
                    <div class="d-flex align-items-center gap-4">
                      <div class="d-flex align-items-center gap-1">
                        <img src="images/VscCalendar.svg" alt="">
                        <p>22/03/23</p>
                      </div>
                      <div class="d-flex align-items-center gap-1">
                        <img src="images/watch_icon.svg" alt="">
                        <p>12:39 PM</p>
                      </div>
                    </div>
                    <div class="mt-3">
                      <p>We are delighted to inform you that our company has recently launched a new tender software to improve
                        the tendering process.</p>
                    </div>
                  </div>

                </div>
                <div class="tab-pane fade" id="v-pills-save-list" role="tabpanel" aria-labelledby="v-pills-save-list-tab"
                  tabindex="0">

                  <div class="d-flex justify-content-center mt-4">
                    <h3 class="save_listed">Your Save Listed Tender</h3>
                  </div>
                  <div>
                        
                      <?php
                        if (!empty($all_save_tenders )) {
                          foreach($all_save_tenders as $key=>$value)
                          {
  
                          ?>
                                <div class="govt_tender_div">
                                      <div class="govt_tender_div2 container g-0">
                                            <div class="d-flex">
                                                  <a href="javascript:void(0)" class="gov_tender_button"><?=get_inviter_type_by_id($value->tender_inviter)?> Tender</a>
                                                  <p class="gov_tender_id">ID: <span class="gov_tender_id_span"><?=$value->tender_manual_id?></span></p>
                                            </div>
                                            <div class="d-flex">
                                                  <div class="d-flex">
                                                        <div>
                                                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.99998 6.11079C9.63197 6.11654 9.26668 6.175 8.91526 6.2844C9.07782 6.57027 9.16437 6.89305 9.16665 7.2219C9.16665 7.47724 9.11635 7.73009 9.01864 7.966C8.92092 8.20191 8.77769 8.41627 8.59713 8.59683C8.41657 8.77738 8.20222 8.92061 7.96631 9.01833C7.7304 9.11605 7.47755 9.16634 7.2222 9.16634C6.89335 9.16406 6.57058 9.07751 6.2847 8.91495C6.05916 9.69717 6.08545 10.5305 6.35984 11.297C6.63424 12.0634 7.14283 12.7241 7.81358 13.1855C8.48433 13.6468 9.28323 13.8854 10.0971 13.8675C10.911 13.8495 11.6986 13.576 12.3484 13.0855C12.9982 12.5951 13.4772 11.9127 13.7176 11.1349C13.9579 10.3571 13.9475 9.52338 13.6877 8.75185C13.4279 7.98032 12.932 7.31009 12.2701 6.83608C11.6083 6.36208 10.8141 6.10833 9.99998 6.11079ZM19.8791 9.49273C17.9962 5.81877 14.2684 3.33301 9.99998 3.33301C5.73158 3.33301 2.00276 5.82051 0.120814 9.49308C0.0413845 9.6502 0 9.82379 0 9.99985C0 10.1759 0.0413845 10.3495 0.120814 10.5066C2.0038 14.1806 5.73158 16.6663 9.99998 16.6663C14.2684 16.6663 17.9972 14.1788 19.8791 10.5063C19.9586 10.3491 20 10.1756 20 9.9995C20 9.82344 19.9586 9.64985 19.8791 9.49273ZM9.99998 14.9997C6.57463 14.9997 3.43436 13.09 1.73852 9.99967C3.43436 6.9094 6.57429 4.99967 9.99998 4.99967C13.4257 4.99967 16.5656 6.9094 18.2614 9.99967C16.566 13.09 13.4257 14.9997 9.99998 14.9997Z" fill="#4CAF50" />
                                                              </svg>
                                                        </div>
                                                        <p class="publish_views"><?=$value->tender_view?> Views</p>
                                                  </div>
                                                  <div class="ms-4">
                                                        <p class="publish_date">Publish Date <?=custom_date_maker($value->tender_published_on)?></p>
                                                  </div>
                                            </div>
                                      </div>
                                      <div class="pt-md-4">
                                            <p class="gov_tender_pragrap">
                                            <?= $value->tender_description ?>
  
                                            </p>
                                      </div>
                                      <div class="govt_tender_div2 container g-0">
                                            <div class="d-flex">
                                                  <div>
                                                        <p class="close_on">Closed On(<?= left_day_count(date('Y-m-d'),$value->tender_closed_on);?> )</p>
                                                        <p class="close_on_date"><?=custom_date_maker($value->tender_closed_on)?></p>
                                                  </div>
                                                  <div class="ms-5">
                                                        <p class="close_on">Procuring Place</p>
                                                        <div class="d-flex">
                                                              <div>
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2481 4.032C15.1278 2.91138 13.6145 2.27205 12.0301 2.25H11.9701C10.3856 2.27173 8.87202 2.91085 7.75148 4.03139C6.63094 5.15193 5.99182 6.66546 5.97009 8.25C5.95059 9.375 6.26709 10.4805 6.87909 11.4255L11.6011 21H12.4006L17.1211 11.4255C17.7346 10.4805 18.0511 9.375 18.0301 8.25C18.008 6.66559 17.3687 5.15229 16.2481 4.032ZM11.8876 3.75L12.0106 3.765L12.1216 3.75C13.2999 3.80132 14.4139 4.3021 15.2344 5.14939C16.0549 5.99668 16.5196 7.12611 16.5331 8.3055C16.5446 9.14254 16.3002 9.96313 15.8326 10.6575L15.8026 10.7085L15.7771 10.761L12.0001 18.4185L8.22459 10.7685L8.19909 10.71L8.16909 10.659C7.70151 9.96463 7.45711 9.14404 7.46859 8.307C7.48138 7.12625 7.94668 5.99539 8.76857 5.14755C9.59046 4.2997 10.7063 3.79948 11.8861 3.75H11.8876ZM12.8056 7.0035C12.6418 6.89398 12.458 6.81779 12.2648 6.77928C12.0716 6.74078 11.8726 6.74071 11.6794 6.77908C11.4861 6.81746 11.3023 6.89352 11.1384 7.00293C10.9746 7.11234 10.8339 7.25296 10.7243 7.41675C10.6148 7.58054 10.5386 7.7643 10.5001 7.95754C10.4616 8.15077 10.4615 8.3497 10.4999 8.54296C10.5383 8.73622 10.6144 8.92004 10.7238 9.0839C10.8332 9.24777 10.9738 9.38848 11.1376 9.498C11.4684 9.71919 11.8735 9.79992 12.2638 9.72242C12.6541 9.64492 12.9976 9.41554 13.2188 9.08475C13.44 8.75396 13.5208 8.34885 13.4433 7.95854C13.3658 7.56823 13.1364 7.22469 12.8056 7.0035ZM10.3051 5.7555C10.6324 5.52543 11.0024 5.36315 11.3933 5.2782C11.7843 5.19326 12.1882 5.18736 12.5815 5.26086C12.9747 5.33436 13.3493 5.48577 13.6832 5.70618C14.017 5.9266 14.3035 6.21156 14.5255 6.54431C14.7476 6.87706 14.901 7.25087 14.9764 7.64374C15.0519 8.03662 15.0481 8.44062 14.9651 8.83198C14.8821 9.22334 14.7217 9.59416 14.4933 9.92261C14.2649 10.2511 13.9731 10.5305 13.6351 10.7445C12.9734 11.1634 12.1742 11.307 11.4081 11.1446C10.6421 10.9822 9.96985 10.5266 9.5351 9.87528C9.10034 9.22394 8.93752 8.42841 9.08139 7.65864C9.22526 6.88886 9.66443 6.20585 10.3051 5.7555Z" fill="#0B63E5" />
                                                                    </svg>
                                                              </div>
                                                              <p class="close_on_date"><?=get_tender_district_by_id($value->tender_district)?></p>
                                                        </div>
                                                  </div>
                                            </div>
                                            <div class="d-flex">
                                                  <?php
                                                        if($this->ion_auth->logged_in() && !empty($user_pkg))
                                                        {
                                                        
                                                        ?>
                                                        <div class="d-flex pt-3">
                                                            
                                                              
                                                              <?php
                                                                    if (!empty($fvrt_ten_id)) {
                                                                          if (in_array($value->tender_auto_id, json_decode($fvrt_ten_id))) {
                                                                                $color='red';
                                                                        }else{
                                                                                $color='black';
                                                                        }
                                                                    }else{
                                                                          $color='black';
                                                                    }
                                                                    
                                                              ?>
                                                              <button value="<?=$value->tender_auto_id?>" id="save_btn_<?=$value->tender_auto_id?>"  class="btn save_btn <?=$color?>" ><i class="fa-solid fa-bookmark "></i></button>  save 
                                                        </div>
                                                        <?php
                                                        }
                                                  ?>
                                                  <div class="ms-4 pt-3">
                                                        <a href="<?= base_url() . 'site/tenders_details/' . $value->tender_auto_id ?>" class="publish_view_details_btn">View
                                                              Details <span>
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                          <path d="M15.5 7.5L20 12M20 12L15.5 16.5M20 12H4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                              </span></a>
                                                  </div>
                                            </div>
                                            
                                      </div>
                                </div>
                          <?php
                          }
                        }else {
                          echo "No Tender Found";
                        }
                        
                        ?>


                  </div>

                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                  tabindex="0">

                  <div class="d-flex justify-content-center mt-4">
                    <h3 class="save_listed">Update Profile</h3>
                  </div>

                  <div class="update_profile_border">
                    <div>
                      <p class="profile_list_icon">Your Information</p>
                    </div>
                    <form class="row g-3 my-2" method="POST" enctype="multipart/form-data">
                      <div class="col-md-6">
                        <fieldset class="border ps-3">
                          <legend class="float-none w-auto legend_name">Your Name<span>**</span> </legend>
                          <input type="text" class="form-control fieldset_input" id="inputEmail4" value="<?=$user_info->webu_full_name?>">
                        </fieldset>
                      </div>
                      <div class="col-md-6">
                        <fieldset class="border ps-3">
                          <legend class="float-none w-auto legend_name">Mobile<span>**</span> </legend>
                          <input type="text" class="form-control fieldset_input" id="inputEmail4"
                          value="<?=$user_info->webu_phone?>">
                        </fieldset>
                      </div>
                      <div class="col-md-6">
                        <fieldset class="border ps-3">
                          <legend class="float-none w-auto legend_name">Select Gender<span>**</span> </legend>
                          <select name="" id="" class="">
                            <option value="">Choose Gender</option>
                            <option value="">Male</option>
                            <option value="">Female</option>
                          </select>
                        </fieldset>
                      </div>
                      <div class="col-md-6">
                        <fieldset class="border ps-3">
                          <legend class="float-none w-auto legend_name">Profile Photo</legend>
                          <input type="file" class="form-control fieldset_input" id="formFile" placeholder="Enter Your Mobile">
                        </fieldset>
                      </div>
                      <div class="col-md-12">
                        <fieldset class="border ps-3">
                          <legend class="float-none w-auto legend_name">Email</legend>
                          <input type="email" class="form-control fieldset_input" id="formFile" value="<?=$user_info->webu_email?>">
                        </fieldset>
                      </div>
                      <div class="col-md-12">
                        <fieldset class="border ps-3">
                          <legend class="float-none w-auto legend_name">Address</legend>
                          <input type="text" class="form-control fieldset_input" id="formFile" placeholder="Enter Your Address">
                        </fieldset>
                      </div>
                      <div class="col-md-6">
                        <fieldset class="border ps-3">
                          <legend class="float-none w-auto legend_name">Old Password</legend>
                          <input type="password" class="form-control fieldset_input" id="formFile"
                            placeholder="Enter Your Password">
                        </fieldset>
                      </div>
                      <div class="col-md-6">
                        <fieldset class="border ps-3">
                          <legend class="float-none w-auto legend_name">Password</legend>
                          <input type="password" class="form-control fieldset_input" id="formFile"
                            placeholder="Enter Your Password">
                        </fieldset>
                      </div>
                      <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-cancle me-3">Cancle</button>
                        <button type="submit" class="btn btn-update">Update</button>
                      </div>
                    </form>

                  </div>
                  <div class="update_profile_border">
                    <div>
                      <p class="profile_list_icon">Your Company Information</p>
                    </div>
                    <form class="row g-3 my-2">
                      <div class="col-md-6">
                        <fieldset class="border ps-3">
                          <legend class="float-none w-auto legend_name">Company Name<span>**</span> </legend>
                          <input type="text" class="form-control fieldset_input" id="inputEmail4" placeholder="Company Name">
                        </fieldset>
                      </div>
                      <div class="col-md-6">
                        <fieldset class="border ps-3">
                          <legend class="float-none w-auto legend_name">Industry </legend>
                          <input type="text" class="form-control fieldset_input" id="inputEmail4" placeholder="Industry Name">
                        </fieldset>
                      </div>
                      <div class="col-md-6">
                        <fieldset class="border ps-3">
                          <legend class="float-none w-auto legend_name">Company Type<span>**</span> </legend>
                          <select name="" id="" class="">
                            <option value="">Choose Type</option>
                            <option value="1">Software Company</option>
                            <option value="2">Surgical Company</option>
                          </select>
                        </fieldset>
                      </div>
                      <div class="col-md-6">
                        <fieldset class="border ps-3">
                          <legend class="float-none w-auto legend_name">Company Logo</legend>
                          <input type="file" class="form-control fieldset_input" id="formFile" placeholder="Enter Your Mobile">
                        </fieldset>
                      </div>
                      <div class="col-md-6">
                        <fieldset class="border ps-3">
                          <legend class="float-none w-auto legend_name">Contact Mobile</legend>
                          <input type="text" class="form-control fieldset_input" id="formFile" placeholder="Enter Your Mobile">
                        </fieldset>
                      </div>
                      <div class="col-md-6">
                        <fieldset class="border ps-3">
                          <legend class="float-none w-auto legend_name">Website</legend>
                          <input type="text" class="form-control fieldset_input" id="formFile" placeholder="Website Link">
                        </fieldset>
                      </div>
                      <div class="col-md-12">
                        <fieldset class="border ps-3">
                          <legend class="float-none w-auto legend_name">Email</legend>
                          <input type="email" class="form-control fieldset_input" id="formFile" placeholder="Enter Your Email">
                        </fieldset>
                      </div>
                      <div class="col-md-12">
                        <fieldset class="border ps-3">
                          <legend class="float-none w-auto legend_name">Address</legend>
                          <input type="text" class="form-control fieldset_input" id="formFile" placeholder="Enter Your Address">
                        </fieldset>
                      </div>
                      <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-cancle me-3">Cancle</button>
                        <button type="submit" class="btn btn-update">Update</button>
                      </div>
                    </form>

                  </div>

                </div>
            </div>
    </div>


    <script>
          $(document).on('click', '.save_btn', function(e){
                  e.preventDefault();
                  let save_tender_id=$(this).val();
                  $.ajax({
                        type:"GET",
                        url:"site/save_tender/" + save_tender_id,
                        success:function(data)
                        {
                              
                              if($('#save_btn_'+save_tender_id).hasClass('red'))
                              {
                                    $('#save_btn_'+save_tender_id).removeClass("red");
                                    $('#save_btn_'+save_tender_id).addClass("black");
                              }else
                              {
                                    $('#save_btn_'+save_tender_id).removeClass("black");
                                    $('#save_btn_'+save_tender_id).addClass("red"); 
                              }
                  
                              
                        }
                  });
            });
</script>