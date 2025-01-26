<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- carosul link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>

  <!-- font link  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

  <!--===============Accrodian CSS ===============-->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.css">


  <link rel="stylesheet" href="<?= base_url() ?>css/login.css">
  <link rel="stylesheet" href="<?= base_url() ?>css/index.css">
  <link rel="stylesheet" href="<?= base_url() ?>css/navbar.css">
  <link rel="stylesheet" href="<?= base_url() ?>css/profile_navbar.css">
  <link rel="stylesheet" href="<?= base_url() ?>css/blog.css">
  <link rel="stylesheet" href="<?= base_url() ?>css/about_us.css">
  <link rel="stylesheet" href="<?= base_url() ?>css/contact.css">
  <link rel="stylesheet" href="<?= base_url() ?>css/profile.css">
  <link rel="stylesheet" href="<?= base_url() ?>css/tender.css">
  <link rel="stylesheet" href="<?= base_url() ?>css/tender_details.css">
  <link rel="stylesheet" href="<?= base_url() ?>css/footer.css">

  <title><?=$meta_title?></title>

  <script>
      var webPath = "<?php echo base_url(); ?>";
  </script>
</head>

<body style="font-family: Roboto !important;">
  <div class="container-fluid">
    <div class="row ts_top_header">
      <div class="col col-md-3">
        <p class="text-white pt-3 mb-0 text-center">
          <i class="fa-solid fa-phone-volume"></i>
          <span class="ms-1">2349067322844</span>
        </p>
      </div>
      <div class="col col-md-6 d-none d-md-block">
        <p class="text-center pt-3 mb-0 text-white ">
          <?php 
                  $userid = $this->session->userdata('user_id');

                  $user_pkg = $this->Common_model->get_user_pkg($userid);
    // custom_var_dump(discover_mgs($userid, $user_pkg));
            if ($this->ion_auth->logged_in()) {
              ?>
                  <script>
                    $(document).ready(function(){
                      let mgs='<?=discover_mgs($userid, $user_pkg)?>';
                      console.log(mgs);
                      $('#discover_msg_header').html(mgs);
                    });
                 
                
                </script>
              <?php
            } else {
              ?>
                <script>
                    $(document).ready(function(){
                      $('#discover_msg_header').html('Discover More Tender with Rokomari Tender! Sign up for our free 15-day');
                    });
                
                </script>
              <?php
            }
            
          ?>
          <span id="discover_msg_header"></span>
        </p>
      </div>
      <div class="col col-md-3 py-2 d-md-block">
        <p class="text-center ts_top_icon_customizer">
          <i class="fa-brands fa-facebook"></i>
          <i class="fa-brands fa-instagram"></i>
          <i class="fa-brands fa-twitter"></i>
          <i class="fa-brands fa-youtube"></i>
        </p>
      </div>
    </div>
  </div>

  <div class="container-fluid nav-background w-100 menu-bar">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid bottom-nav">
        <a class="navbar-brand" href="<?= base_url()?>">
          <img src="<?php echo base_url(); ?>images/logo.png" />
        </a>
        <button class="navbar-toggler mobile-view-btn" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?= base_url()?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('tenders')?>">Tender</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('about_us')?>">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('blogs')?>">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('contact_us')?>">Contact Us</a>
            </li>

            <?php
            if ($this->ion_auth->logged_in()) {
              $user_info=$this->Common_model->user_info();
              
                  ?>
                      <div class="dropdown">
                        <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <img style="width: 60px !important;" src="<?php echo base_url(); ?>images/profile_img.png" class="profile_nav_img" alt="">
                        </a>

                        
                        <ul class="dropdown-menu" style="margin-left: -185%; width:260px; padding: 20px;" aria-labelledby="dropdownMenuLink">
                       
                               <div class="card" style="width: 100%; padding:5px">
                                  <div class="text-center">
                                    <div>
                                      <img src="<?php echo base_url(); ?>images/profile_img.png" class="profile_image" alt="">
                                    </div>
                                    <div>
                                      <p class="my_profile_name"><?=$user_info->webu_full_name?></p>
                                      
                                    </div>
                                  </div><br>
                                   
                                   
                                    <li style="padding: 5px;"><i class="fa-solid fa-user profile_list_icon"></i><a style="color: black;" href="<?=base_url('user_profile')?>"> &nbsp  Profile</a></li>
                                    <li style="padding: 5px;"><i class="fa-solid fa fa-sign-out profile_list_icon"></i><a style="color: black;" href="<?= base_url('user-logout')?>"> &nbsp Logout</a></li>
                                    
                                    
                               </div>
                        </ul>
                     </div>
                   
                <?php
              }else {
                
                  ?>
                    <li class="nav-item">
                      <a class="nav-link btn btn-login" href="<?= base_url('user-login') ?>">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn btn-signup btn-primary" style="color:white !important" href="<?= base_url('user-registration') ?>">Sign UP</a>
                    </li>
                  <?php
              }
            
            ?>

            
           

          </ul>
        </div>
      </div>
    </nav>
  </div>