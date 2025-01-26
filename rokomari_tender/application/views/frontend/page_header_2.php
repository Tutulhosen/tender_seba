<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/select2.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- bootstrap datepicker 10-03-18 -->
    <link rel="stylesheet" href="<?=base_url();?>assets/js/datepicker/datepicker3.css">
    
    <!-- rokomariTender custom css 09-04-18 -->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/rokomari_tender.css">
    
    <title>Rokomari Tender</title>
    
    <style type="text/css">
        [class^=border]{
              display: inline-block;
              margin:1em;
              width: 500px;
              height: 400px;
              background-color: #1aa326;
              border:15px solid green;
            }

        .banner{
            background-image: url("<?= base_url() ?>assets/images/main_banner.jpg");
            height: 450px;
            background-position: center center; 
                }
            
        .tender{
            width: 50%;
            height: 200px;
            background: green;
        }    
        .sm-3{
            border-radius: 200px 0px 200px 200px;
            -moz-border-radius: 200px 0px 200px 200px;
            -webkit-border-radius: 200px 0px 200px 200px;
            border: 0px solid #000000;

            -webkit-box-shadow: -1px 6px 3px -4px rgba(51,46,45,1);
            -moz-box-shadow: -1px 6px 3px -4px rgba(51,46,45,1);
            box-shadow: -1px 6px 3px -4px rgba(51,46,45,1);
        }       

        .content-1 .content-2 .content-3 {
            -webkit-box-shadow: 2px 6px 0px -5px rgba(163,159,158,1);
            -moz-box-shadow: 2px 6px 0px -5px rgba(163,159,158,1);
            box-shadow: 2px 6px 0px -5px rgba(163,159,158,1);

        }   

        .col-xl-3, .col-lg-3, .col-md-12, .col-sm-12, .col-xs-12{
            padding-right: 5px !important;
            padding-left: 5px !important;
        }

        .rt_footer{
            border-top: 2px solid #8f131a;
        }

        .abix-tree-list li {
         list-style: none;
        }

        .abix-tree-list .collapsed span.icon, 
        .abix-tree-list .expanded span.icon {
            margin-right: 6px;
            cursor: pointer;
        }

      @media only screen and (min-width : 320px) and (max-width : 767.98px) {
          .form-control{
              margin-bottom: 15px;
          }

      }
      
      @media only screen and (min-width : 320px) and (max-width : 768px) {
          .content-1{
              margin-bottom: 15px;
          }
      }
        
      #mySidenav a {
        /*position: absolute; //08-04-18*/
        position: fixed;
        left: -60px;
        transition: 0.3s;
        padding: 15px;
        width: 100px;
        text-decoration: none;
        font-size: 20px;
        color: white;
        border-radius: 0 5px 5px 0;
      }

      #mySidenav a:hover {
        left: 0;
      }

      #about {
        top: 190px;
        background-color: #f44336;
      }

      #blog {
          top: 260px;
          background-color: #f44336;
      }

      #projects {
          top: 330px;
          background-color: #f44336;
      }
      .Login .form-control{
       padding: 0 10px;
      }
      .quick-link .input-group .form-control{
       padding: 0 10px;
      }

      .curpoint {
        cursor: pointer;
      }

      .hover-color-change:hover {
        background: yellow;
        cursor: pointer;
      }

    </style>

    <script>
      var webPath = "<?php echo base_url(); ?>";
    </script>
  </head>
  
  <body>
    <?php
      $sufx = $this->config->item('url_suffix');  //08-04-18
    ?>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light justify-content-between text-primary">
        <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/rokomari_tender_logo.png" class="img-fluid" style="width: 70%;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto pt-">
            <li class="nav-item active">
              <a class="nav-link text-primary active" href="<?= base_url() ?>" ><span class="<?= backend_activate_menu_method('index') ?>">Home </span><span class="sr-only">(current)</span></a>

            </li>
            <li class="nav-item">
              <a class="nav-link text-primary" href="<?= base_url('about-us') . $sufx ?>"><span class="<?= backend_activate_menu_method('about_us') ?>">About us</span></a>
            </li>
            
            <li class="nav-item">
              <a class="text-primary nav-link disabled" href="<?= base_url('services') . $sufx ?>"><span class="<?= backend_activate_menu_method('services') ?>">Services</span></a>
            </li>
            <li class="nav-item">
              <a class="text-primary nav-link" href="#">How it works</a>
            </li>
            <li class="nav-item">
              <a class="text-primary nav-link" href="<?= base_url('tariff') . $sufx ?>"><span class="<?= backend_activate_menu_method('tariff') ?>">Tariff</span></a>
            </li>
            <li class="nav-item">
              <a class="text-primary nav-link" href="<?= base_url('contact-us') . $sufx ?>"><span class="<?= backend_activate_menu_method('contact_us') ?>">Contact Us</span></a>
            </li>
          </ul>
          <div class="form-inline my-2 my-lg-0">
            <i class="fa fa-phone fa-fw"></i>+880 17557480272
            <div class="px-2"></div>
            <?php
              if($this->ion_auth->logged_in()):
            ?>
              <a class="btn btn-primary" href="<?= base_url('user-logout') . $sufx ?>" role="button">Logout</a>
            <?php
              else:
            ?>
              <a class="btn btn-primary" href="<?= base_url('user-login') . $sufx ?>" role="button">Login</a>
            <?php
              endif;
            ?>
            <div class="px-2"></div>
            <?php
              if(!$this->ion_auth->logged_in())
              {
            ?>
              <a class="btn btn-success" href="<?= base_url('user-registration') . $sufx ?>" role="button">Sign Up</a>
            <?php
              }
            ?>
          </div>
        </div>
      </nav>
    </div>
    <!-- end of navbar -->
    <div class="my-"></div>

    <!-- <div class="banner">
      <div class="container ">
        <div class="pt-5"></div>
        <div class="pt-5"></div>
        <div class="pt-5"></div>
        <div class="pt-5"></div>
        <div class="pt-5"></div>
        <div class="pt-5"></div>
        <div class="pt-5"></div>
        <div class="pt-5"></div>
        <div class="row justify-content-end text-center ">
          <div class="sm-3 bg-secondary">
            <p class="h6 text-light px-4 pt-4"> New Tender</p>
            <p class="h1 text-light"> 120</p>
          </div>
          <div class="sm-3 bg-success">
            <p class="h6 text-light px-4 pt-4">Corrigendum</p>
            <p class="h1 text-light">20</p>
          </div>
          <div class="sm-3 bg-dark">
            <p class="h6 text-light px-4 pt-4">Cancellation</p>
            <p class="h1 text-light">10</p>
          </div>
          <div class="sm-3 bg-warning">
            <p class="h6 text-light px-4 pt-4">Republished</p>
            <p class="h1 text-light"> 40</p>
          </div>
          <div class="sm-3 bg-danger">
            <p class="h5 text-light px-4 pt-4">Favorite</p>
            <p class="h1 text-light"> 10</p>
          </div>
        </div>
      </div>  
    </div> -->
    <div id="mySidenav" class="d-none d-sm-block sidenav">
      <a href="#" id="about"><i class="fa fa-facebook float-right"></i></a>
      <a href="#" id="blog"><i class="fa fa-twitter float-right"></i></a>
      <a href="#" id="projects"><i class="fa fa-youtube float-right"></i></a>
    </div>
<!-- end of banner -->