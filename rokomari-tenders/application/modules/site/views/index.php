<div class="container-fluid background-image-header header">
    <div class="d-flex text-hero">
        <div class="col-md-8 mobile-hero_section">
            <h3 class="text-hero-tagline">
                The easiest way to create your website.
            </h3>
            <p class="mt-2 text-hero-tagline2 text-white">
                Welcome to our Tender Opportunities page, where we bring you the latest information on available
                tenders.
                Bootstrap code with a well-organized Figma file to design & develop your next websites in minutes.
            </p>
            <div class="mt-2 mb-5">
            <?php

                    if (!$this->ion_auth->logged_in()) {
                        ?> 
                            <a href="<?= base_url('user-registration') ?>" class="btn btn-primary btn-home-tripography">Get Started</a>
                        <?php
                    }

            ?>
                
                <a href="<?= base_url('tenders') ?>" class="btn btn-view-tender ms-3 btn-home-tripography">View Tender</a>
            </div>

        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<div class="hero_section">

    <!-- Start We serve over 100+Govt Tender Section -->
    <div class="container  server-over-section">
        <div class="row ">
            <div class="col-md-7 ">
                <div class="app-image">
                    <a href="" class="app-image-fst-div">
                        <img src="images/logo-v3-1.png" class="gov_project_logo" alt="">
                    </a>
                    <a href="" class="app-image-fst-div">
                        <img src="images/lrb-1.png" class="gov_project_logo" alt="">
                    </a>
                    <a href="" class="app-image-fst-div">
                        <img src="images/Government_ministry.png" class="gov_project_logo" alt="">
                    </a>
                </div>
                <div class="app-image2">
                    <a href="" class="app-image-fst-div">
                        <img src="images/1664110602.png" class="gov_project_logo" alt="">
                    </a>
                    <a href="" class="app-image-fst-div">
                        <img src="images/lrb.png" class="gov_project_logo" alt="">
                    </a>
                    <a href="" class="app-image-fst-div">
                        <img src="images/Untitled-1-011.png" class="gov_project_logo" alt="">
                    </a>
                </div>
                <!-- <div class="right_arrow">
                    <i class="fa-solid fa-arrow-right"></i>
                </div> -->

                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner carousel-item-image">
                        <div class="carousel-item active">
                            <img src="images/logo-v3-1.png" class="d-block carosul-company-image" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/lrb-1.png" class="d-block carosul-company-image" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Government_ministry.png" class="d-block carosul-company-image" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/1664110602.png" class="d-block carosul-company-image" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/lrb.png" class="d-block carosul-company-image" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Untitled-1-011.png" class="d-block carosul-company-image" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
            <div class="col-md-5 mt-4 hero_section-2nd-div">
                <p class="h2_we_serve_tagline">
                    We serve over 100+Govt Tender
                </p>
                <p class="para_under_we_serve_tagline">
                    Connect LemonWares with your favourite tools that you use daily and keep things on track.
                </p>
            </div>
        </div>
    </div>
    <!-- End We serve over 100+Govt Tender Section -->

    <!-- Start Find your tender Section -->
    <div class="container ">
        <div class="row  m-5">
            <div class="col-md-7 find_your_tender-mobile-view">
                <h2 class="find_your_tender">Find your tender</h2>
                <img src="images/Group-53.png" class="find_your_tender-image" alt="">
                <p class="mt-3 text-center need_more_option"><span>Need more search options ? </span><a href="<?=base_url('tenders')?>" class="text-decoration-none">Advanced Search</a></p>
            </div>
           
            <div class="col-md-5 shadow_search_box p-4">
                <div class="text-center mb-4">
                        <p class="advanc_text"> Search Your One-Stop Solution </p>
                </div>
                <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                    <input type="date" class="form-control" name="date" id="date">
                            </div>
                            <div class="col-md-6 mb-3">
                                    <select name="order_by" id="order_by" class="form-control select_box_text">
                                        <option value="">Order by</option>
                                        <?php
                                        foreach ($order_by_newest_oldest as $key => $value) {
                                        ?><option value="<?= $value ?>"><?= $key ?></option><?php
                                                                                        }
                                                                                                ?>
                                    </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                    <select name="pro_method" id="pro_method" class="form-control select_box_text">
                                        <option value="">Procurement Method</option>
                                        <?php
                                        foreach ($procurement_method as $key => $value) {
                                        ?><option value="<?= $value->pro_method_id ?>"><?= $value->pro_method_name ?></option><?php
                                                                                                                            }
                                                                                                                                    ?>
                                    </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                    <select name="call_type" id="call_type" class="form-control select_box_text">
                                        <option value="">Call Type</option>
                                        <?php
                                        foreach ($call_type as $key => $value) {
                                        ?><option value="<?= $value ?>"><?= $key ?></option><?php
                                                                                        }
                                                                                                ?>
                                    </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                    <select name="Inviter" id="Inviter" class="form-control select_box_text">
                                        <option value="">Inviter</option>
                                        <?php
                                        foreach ($tender_inviter as $key => $value) {
                                        ?><option value="<?= $value ?>"><?= $key ?></option><?php
                                                                                        }
                                                                                                ?>
                                    </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                    <select name="tender_on" id="tender_on" class="form-control select_box_text">
                                        <option value="">Tender On</option>
                                        <?php
                                        foreach ($tender_on as $key => $value) {
                                        ?><option value="<?= $value ?>"><?= $key ?></option><?php
                                                                                        }
                                                                                                ?>
                                    </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                    <select name="bidding_type" id="bidding_type" class="form-control select_box_text">
                                        <option value="">Bidding </option>
                                        <?php
                                        foreach ($bidding_type as $key => $value) {
                                        ?><option value="<?= $value ?>"><?= $key ?></option><?php
                                                                                        }
                                                                                                ?>
                                    </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                    <select name="districts" id="districts" class="form-control select_box_text">
                                        <option value="">Place</option>
                                        <?php
                                        foreach ($districts as $key => $value) {
                                        ?><option value="<?= $value->district_id ?>"><?= $value->district_name ?></option><?php
                                                                                                                        }
                                                                                                                            ?>
                                    </select>
                            </div>

                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary w-100" id="src">Search Tender <i class="fa-solid fa-arrow-right mt-2 ms-2"></i></button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End Find your tender Section -->

    <!-- Start Recent Tenders section -->
    <div class="container  mx-auto">
        <div class="row  Recent-Tenders">
            <div class="col-md-4">
                <p class="recent_tenders">Recent Tenders</p>
                <div class="after_recent_tenders"></div>
            </div>
            <div class="col-md-5"></div>
            <div class="col-md-3 all_tender_typonography text-end">
                
                <a href="<?= base_url('tenders') ?>" class="all-tender">All Tender <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="row  mb-4">
            <?php
            //custom_var_dump($tenders);
            foreach ($tenders as $value) {
            ?>
                <div class="col-md-4 mb-3">
                    <div class="travel-card">
                        <p class="recent_travel"> <span class="after_travel"><i class="fa-sharp fa-solid fa-minus"></i><i class="fa-sharp fa-solid fa-minus travel-icon"></i></span> <?=$value->inviter_name;?></p>
                        <h3 class="top-10-beautiful"><?=substr($value->tender_title,0,35)?>...</h3>
                        <p class="date-March-25"><?=custom_date_maker($value->tender_published_on)?><span class="date-dot"> </span> </p>
                        <a href="<?php echo base_url();?>site/tenders_details/<?php echo $value->tender_auto_id;?>" class="view-tender">View Tender
                            <span class="view-tender-arrow">
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            <?php
            }

            ?>


        </div>
    </div>
    <!-- End Recent Tenders section -->
</div>

<!-- Start blue background section -->
<div class="container-fluid blue-background"></div>
<!-- End blue background section -->

<!-- Start Running Tender Section -->
<div class="container  mb-5">
    <div class="row ">
        <div class="col-md-4 running-tender tender_border">
            <div>
                <svg width="83" height="83" viewBox="0 0 83 83" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.375 10.375L15.5625 5.1875H62.25L67.4375 10.375V72.625L62.25 77.8125H15.5625L10.375 72.625V10.375ZM15.5625 10.375V72.625H62.25V10.375H15.5625ZM20.75 20.75L25.9375 15.5625H51.875L57.0625 20.75V25.9375L51.875 31.125H25.9375L20.75 25.9375V20.75ZM25.9375 20.75V25.9375H51.875V20.75H25.9375ZM77.8125 25.9375H72.625V36.3125H77.8125V25.9375ZM72.625 41.5H77.8125V51.875H72.625V41.5ZM77.8125 57.0625H72.625V67.4375H77.8125V57.0625Z" fill="#4CAF50" />
                </svg>
            </div>
            <div class="tender-text-div">
                <p class="tender-heading-text">Running Tender</p>
                <h3 class="tender-heading-number">15463</h3>
            </div>
        </div>
        <div class="col-md-4 running-tender tender_border">
            <div>
                <svg width="71" height="73" viewBox="0 0 71 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M40.4298 21.4837C39.4613 22.1646 38.3687 22.6432 37.2159 22.8913C36.063 23.1395 34.873 23.1523 33.7152 22.9291C32.5574 22.7058 31.4551 22.251 30.4725 21.5911C29.4899 20.9312 28.6468 20.0794 27.9923 19.0855C27.3378 18.0916 26.8851 16.9755 26.6606 15.8022C26.436 14.629 26.4442 13.4222 26.6845 12.2522C26.9248 11.0821 27.3926 9.97238 28.0604 8.98765C28.7282 8.00291 29.5827 7.16292 30.5741 6.51668C32.5314 5.20565 34.9209 4.73374 37.2204 5.2041C39.5198 5.67447 41.542 7.04886 42.8451 9.02683C44.1482 11.0048 44.6261 13.4255 44.1743 15.7597C43.7225 18.094 42.3779 20.1519 40.4342 21.4837H40.4298ZM37.967 10.2607C37.4837 9.90813 36.9354 9.6578 36.3548 9.52458C35.7742 9.39135 35.173 9.37797 34.5872 9.48523C34.0013 9.59249 33.4427 9.81819 32.9447 10.1489C32.4466 10.4796 32.0193 10.9086 31.6881 11.4102C31.3569 11.9119 31.1287 12.476 31.0169 13.069C30.9052 13.6619 30.9122 14.2716 31.0377 14.8618C31.1631 15.4519 31.4044 16.0105 31.7471 16.5041C32.0898 16.9977 32.5269 17.4164 33.0325 17.7352C34.0092 18.3369 35.1772 18.5332 36.2932 18.2833C37.4092 18.0334 38.387 17.3565 39.0231 16.3937C39.6591 15.4308 39.9043 14.2562 39.7076 13.1145C39.5108 11.9729 38.8873 10.9522 37.967 10.2652V10.2607ZM49.5488 10.3957C50.8287 9.52269 52.3686 9.12956 53.9035 9.28397C55.4384 9.43839 56.8722 10.1307 57.9579 11.2417C58.7316 12.0326 59.3021 13.0039 59.6193 14.0704C59.9366 15.1369 59.9909 16.2661 59.7776 17.3589C59.5643 18.4517 59.0898 19.4747 58.3957 20.3383C57.7017 21.2018 56.8093 21.8794 55.7968 22.3117C54.5809 22.8273 53.2408 22.9631 51.9483 22.7017C50.6557 22.4404 49.4695 21.7938 48.5415 20.8447C47.8441 20.1338 47.3102 19.2753 46.9781 18.3307C46.646 17.3861 46.524 16.3787 46.6206 15.3807C46.7173 14.3827 47.0303 13.4186 47.5373 12.5576C48.0443 11.6966 48.7327 10.9599 49.5533 10.4002L49.5488 10.3957ZM51.6788 17.6407C52.0955 18.0614 52.6598 18.297 53.2478 18.2958C53.5389 18.2951 53.827 18.2364 54.0958 18.1228C54.3645 18.0092 54.6085 17.8431 54.8139 17.6339C55.0194 17.4247 55.1821 17.1766 55.293 16.9036C55.4038 16.6306 55.4605 16.3381 55.4599 16.0429C55.4593 15.7477 55.4013 15.4555 55.2894 15.183C55.1774 14.9105 55.0136 14.663 54.8073 14.4547C54.3941 14.0333 53.8356 13.7913 53.2497 13.7797C52.9571 13.7791 52.6672 13.8373 52.3969 13.951C52.1265 14.0647 51.8811 14.2316 51.6748 14.4421C51.4685 14.6526 51.3053 14.9025 51.1948 15.1773C51.0843 15.4521 51.0286 15.7464 51.031 16.0432C51.0324 16.6425 51.2649 17.2129 51.6788 17.6407ZM14.1553 56.6917H22.1872V61.2142H14.1553C12.7493 61.2013 11.4057 60.6236 10.419 59.6077C9.42849 58.5881 8.87373 57.2139 8.87472 55.7827V47.6377C8.27727 47.6174 7.69007 47.4746 7.14856 47.2178C6.60706 46.961 6.12248 46.5956 5.72409 46.1437C5.30077 45.7088 4.96855 45.1917 4.7474 44.6233C4.52625 44.0549 4.42074 43.447 4.43722 42.8362V33.0172C4.45053 30.8932 5.28034 28.8637 6.74472 27.3562C8.20466 25.8667 10.1793 25.0162 12.2472 25.0027H20.4122C19.3109 26.3328 18.4813 27.8716 17.9716 29.5297H12.2472C11.3466 29.5559 10.4897 29.9292 9.85097 30.5737C9.22361 31.2278 8.87326 32.1047 8.87472 33.0172V43.0612H13.3122V55.7782C13.3019 55.9008 13.3163 56.0242 13.3544 56.141C13.3926 56.2578 13.4537 56.3655 13.5341 56.4577C13.7125 56.5975 13.93 56.6763 14.1553 56.6827V56.6917ZM46.5491 27.3607C45.823 26.6172 44.9592 26.0265 44.0072 25.6226C43.0553 25.2188 42.0341 25.0096 41.0022 25.0072H29.9972C27.9285 25.024 25.9504 25.87 24.4947 27.3607C23.0303 28.8682 22.2005 30.8977 22.1872 33.0217V47.3227C22.1809 48.5506 22.6419 49.7337 23.4741 50.6257C23.873 51.077 24.3577 51.442 24.8991 51.6988C25.4405 51.9555 26.0274 52.0987 26.6247 52.1197V62.5732C26.6206 63.2867 26.7557 63.994 27.0222 64.6543C27.2888 65.3146 27.6815 65.9149 28.1778 66.4207C28.9766 67.1767 29.9839 67.6672 31.0622 67.8247H39.9372C41.1854 67.6585 42.3289 67.0304 43.148 66.061C43.9671 65.0916 44.404 63.8494 44.3747 62.5732V52.1152C44.9722 52.0949 45.5594 51.9521 46.1009 51.6953C46.6424 51.4385 47.127 51.0731 47.5253 50.6212C47.9483 50.187 48.2804 49.6706 48.5015 49.103C48.7227 48.5354 48.8284 47.9283 48.8122 47.3182V33.0172C48.8153 30.903 48.0031 28.8759 46.5491 27.3607ZM44.3747 47.5432H39.9372V62.5732C39.9329 62.8104 39.8374 63.0365 39.671 63.2032C39.5953 63.2941 39.4997 63.3658 39.3918 63.4127C39.284 63.4596 39.1668 63.4803 39.0497 63.4732H31.9053C31.6734 63.4622 31.4539 63.3639 31.2898 63.1974C31.1256 63.031 31.0286 62.8083 31.0178 62.5732V47.5432H26.6247V33.0172C26.6247 32.1037 26.9753 31.2262 27.601 30.5737C28.2397 29.9292 29.0966 29.5559 29.9972 29.5297H41.0022C41.6744 29.5417 42.3286 29.7525 42.8843 30.1362C43.4401 30.5199 43.8732 31.0598 44.1307 31.6897C44.2996 32.1109 44.3826 32.5625 44.3747 33.0172V47.5432ZM56.8441 61.2097H48.8122V56.6872H56.7997C57.0251 56.6808 57.2426 56.602 57.421 56.4622C57.5103 56.3736 57.5802 56.2669 57.6261 56.149C57.672 56.0311 57.6928 55.9048 57.6872 55.7782V43.0612H62.1247V33.0172C62.1262 32.1047 61.7758 31.2278 61.1485 30.5737C60.5098 29.9292 59.6529 29.5559 58.7522 29.5297H53.0278C52.5184 27.8715 51.6888 26.3326 50.5872 25.0027H58.7522C60.8204 25.0219 62.7977 25.8676 64.2547 27.3562C65.7191 28.8637 66.5489 30.8932 66.5622 33.0172V42.8362C66.5622 44.0647 66.1052 45.2437 65.2798 46.1347C64.4544 47.0302 63.3273 47.5657 62.1247 47.6332V55.7782C62.1247 57.2137 61.57 58.5862 60.5805 59.6032C59.5938 60.6191 58.2501 61.1968 56.8441 61.2097ZM17.7497 9.25268C16.4292 9.25113 15.1384 9.64949 14.0426 10.3967C12.9468 11.1439 12.0961 12.206 11.5993 13.4467C11.098 14.687 10.9679 16.0495 11.2252 17.3643C11.4824 18.6791 12.1157 19.888 13.046 20.8402C13.9759 21.7913 15.1644 22.4397 16.4595 22.7026C17.7546 22.9655 19.0976 22.8309 20.3169 22.316C21.5362 21.8011 22.5764 20.9294 23.3048 19.812C24.0332 18.6947 24.4165 17.3825 24.406 16.0432C24.406 14.2432 23.7048 12.5152 22.4535 11.2417C21.8373 10.6123 21.1045 10.1126 20.2973 9.77122C19.4901 9.42988 18.6243 9.25366 17.7497 9.25268ZM17.7497 18.3067C17.4571 18.3073 17.1672 18.2491 16.8969 18.1354C16.6265 18.0216 16.3811 17.8547 16.1748 17.6442C15.9685 17.4338 15.8053 17.1839 15.6948 16.9091C15.5843 16.6343 15.5286 16.34 15.531 16.0432C15.5321 15.4456 15.7658 14.8725 16.1813 14.4487C16.5968 14.0249 17.1604 13.7844 17.7497 13.7797C18.3372 13.7902 18.8976 14.0324 19.3118 14.4551C19.7261 14.8777 19.9616 15.4473 19.9685 16.0432C19.9673 16.6408 19.7336 17.2138 19.3181 17.6377C18.9027 18.0615 18.339 18.3019 17.7497 18.3067Z" fill="#0B63E5" />
                </svg>
            </div>
            <div class="tender-text-div">
                <p class="tender-heading-text">Tender User</p>
                <h3 class="tender-heading-number">15463</h3>
            </div>
        </div>
        <div class="col-md-4 running-tender">
            <div>
                <svg width="82" height="83" viewBox="0 0 82 83" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M48.6875 5.70625L66.1125 23.8625L66.625 25.9375V36.3125H61.5V31.125H41V10.375H15.375V67.4375H35.875V72.625H12.8125L10.25 70.0312V7.78125L12.8125 5.1875H47.15L48.6875 5.70625ZM46.125 10.375V25.9375H60.9875L46.125 10.375ZM66.625 83H61.5V67.4375H46.125V62.25H61.5V46.6875H66.625V62.25H82V67.4375H66.625V83Z" fill="#4CAF50" />
                </svg>
            </div>
            <div class="tender-text-div">
                <p class="tender-heading-text">New Tender</p>
                <h3 class="tender-heading-number">564</h3>
            </div>
        </div>
    </div>
</div>
<!-- End Running Tender Section -->

<!-- Start Why you join Rokmari Tender Section -->

<div class="container  mt-5">
    <div class="row ">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center p-3">
            <h3 class="why-you-join">Why You Join Rokomari Tender</h3>
        </div>
        <div class="col-md-3"></div>
    </div>

    <div class="row ">
        <div class="col-md-3 text-center">
            <div>
                <svg width="101" height="100" viewBox="0 0 101 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_38_3423)">
                        <path d="M50.3994 100C78.0136 100 100.399 77.6142 100.399 50C100.399 22.3858 78.0136 0 50.3994 0C22.7852 0 0.399414 22.3858 0.399414 50C0.399414 77.6142 22.7852 100 50.3994 100Z" fill="#E1F1FD" />
                        <path d="M36.2994 23.8868C42.5841 20.5497 49.8765 19.6398 56.7886 21.3301C63.7007 23.0205 69.75 27.1933 73.7854 33.0542C77.8207 38.9151 79.5604 46.0552 78.6732 53.1155C77.7861 60.1757 74.3341 66.6634 68.9743 71.3439C63.6144 76.0243 56.7208 78.5707 49.6053 78.4985C42.4899 78.4263 35.6493 75.7406 30.3855 70.9524C25.1217 66.1642 21.802 59.6078 21.0583 52.531C20.3146 45.4541 22.1988 38.3509 26.3522 32.573" stroke="#4CAF50" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M34.877 24.1654L36.8215 19.9619" stroke="#4CAF50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M34.876 23.874L38.9885 25.5302" stroke="#4CAF50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M49.8994 72.1268C62.3959 72.1268 72.5263 61.9964 72.5263 49.4999C72.5263 37.0035 62.3959 26.873 49.8994 26.873C37.4029 26.873 27.2725 37.0035 27.2725 49.4999C27.2725 61.9964 37.4029 72.1268 49.8994 72.1268Z" stroke="#4CAF50" stroke-width="3" />
                        <path d="M49.8997 30.4521H49.8997C49.1984 30.4521 48.6299 31.0207 48.6299 31.722V33.4151C48.6299 34.1164 49.1984 34.6849 49.8997 34.6849H49.8997C50.601 34.6849 51.1696 34.1164 51.1696 33.4151V31.722C51.1696 31.0207 50.601 30.4521 49.8997 30.4521Z" fill="#4CAF50" />
                        <path d="M49.9007 64.3145H49.9007C49.1994 64.3145 48.6309 64.883 48.6309 65.5843V67.2774C48.6309 67.9787 49.1994 68.5472 49.9007 68.5472H49.9007C50.602 68.5472 51.1705 67.9787 51.1705 67.2774V65.5843C51.1705 64.883 50.602 64.3145 49.9007 64.3145Z" fill="#4CAF50" />
                        <path d="M68.9473 49.5003V49.5003C68.9473 48.799 68.3787 48.2305 67.6774 48.2305H65.9843C65.283 48.2305 64.7145 48.799 64.7145 49.5003V49.5003C64.7145 50.2016 65.283 50.7701 65.9843 50.7701H67.6774C68.3787 50.7701 68.9473 50.2016 68.9473 49.5003Z" fill="#4CAF50" />
                        <path d="M35.085 49.5003V49.5003C35.085 48.799 34.5164 48.2305 33.8151 48.2305H32.122C31.4207 48.2305 30.8522 48.799 30.8522 49.5003V49.5003C30.8522 50.2016 31.4207 50.7701 32.122 50.7701H33.8151C34.5164 50.7701 35.085 50.2016 35.085 49.5003Z" fill="#4CAF50" />
                        <path d="M43.3008 49.633L47.9813 54.1824L57.6997 44.7363" stroke="#4CAF50" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                    <defs>
                        <clipPath id="clip0_38_3423">
                            <rect width="101" height="100" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <h3 class="uptime-heading">99.9% Uptime</h3>
            <p class="uptime-pragrap">We Keep Your Web build Online 24x7x365.Downtime not only costs you lost visitors
                but also damages your
                reputation and search engine rankings.</p>
        </div>
        <div class="col-md-3 text-center">
            <div>
                <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M50 100C77.6142 100 100 77.6142 100 50C100 22.3858 77.6142 0 50 0C22.3858 0 0 22.3858 0 50C0 77.6142 22.3858 100 50 100Z" fill="#E1F1FD" />
                    <path d="M43.2416 83.6015C43.4613 83.697 43.6982 83.7464 43.9378 83.7467C44.6495 83.745 45.2903 83.3144 45.5602 82.6559L46.9842 79.2147C48.7166 79.4514 50.4733 79.4489 52.205 79.2073L53.635 82.6517C53.8109 83.0847 54.1527 83.4294 54.5843 83.6089C55.0159 83.7883 55.5013 83.7877 55.9324 83.6071L61.8847 81.1392C62.3242 80.9587 62.6727 80.609 62.8517 80.1688C63.0271 79.7435 63.0227 79.2653 62.8396 78.8432L61.4157 75.3937C62.8092 74.3383 64.0518 73.0972 65.1087 71.7049L68.5379 73.1242C68.9701 73.311 69.4593 73.3161 69.8953 73.1383C70.3312 72.9605 70.6774 72.6148 70.8557 72.179L73.327 66.2192C73.5049 65.7895 73.5061 65.307 73.3302 64.8765C73.1547 64.4413 72.8105 64.0956 72.3761 63.9182L69.9348 62.9018L30.1573 62.5391L26.7913 63.9265C25.9085 64.3057 25.497 65.3262 25.8699 66.2117L28.3311 72.1826C28.5103 72.6109 28.8519 72.9507 29.281 73.1278C29.7104 73.309 30.1947 73.3098 30.6247 73.1301L34.077 71.7043C35.1358 73.0976 36.3786 74.3408 37.7714 75.4001L36.356 78.8217C36.166 79.2492 36.1583 79.7355 36.3347 80.1687C36.5133 80.6077 36.8605 80.9568 37.2985 81.1376L43.2416 83.6015Z" stroke="#4CAF50" stroke-width="3" />
                    <path d="M69.0712 63.2471H69.0704H33.4485C27.4568 63.2471 22.5996 58.3898 22.5996 52.3981C22.5996 46.4064 27.4568 41.5492 33.4485 41.5492C33.5241 41.5492 33.5916 41.5497 33.6546 41.5511L34.6612 41.574L35.0637 40.6512C37.0904 36.0042 41.6783 33 46.748 33C51.8178 33 56.4056 36.0042 58.4324 40.6512L58.8155 41.5295L59.7735 41.5511C63.4841 41.6348 66.8015 43.885 68.2513 47.3017L68.6136 48.1557L69.5395 48.213C73.5977 48.4638 76.7225 51.8932 76.5959 55.9571C76.4693 60.021 73.1371 63.2493 69.0712 63.2471Z" stroke="#4CAF50" stroke-width="3" />
                    <path d="M49.5957 73.5468H49.5977C55.5976 73.523 60.9696 69.824 63.1322 64.2274C63.2894 63.8261 63.2193 63.3713 62.9485 63.0359C62.6776 62.7004 62.2475 62.5361 61.8219 62.6055C61.3966 62.6748 61.0412 62.9668 60.8907 63.3705C59.1024 68.0534 54.6096 71.1471 49.5967 71.1471C44.5838 71.1471 40.091 68.0534 38.3027 63.3704C38.1522 62.9668 37.7968 62.6748 37.3715 62.6055C36.9459 62.5361 36.5158 62.7004 36.2449 63.0359C35.9741 63.3713 35.904 63.8261 36.0612 64.2273C38.2238 69.824 43.5958 73.523 49.5957 73.5468Z" fill="#4CAF50" stroke="#4CAF50" stroke-width="0.5" />
                </svg>
            </div>
            <h3 class="uptime-heading"> Fast Web Hosting</h3>
            <p class="uptime-pragrap">We Keep Your Web build Online 24x7x365.Downtime not only costs you lost visitors
                but also damages your
                reputation and search engine rankings.</p>
        </div>
        <div class="col-md-3 text-center">
            <div>
                <svg width="101" height="100" viewBox="0 0 101 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_38_3447)">
                        <path d="M50.3994 100C78.0136 100 100.399 77.6142 100.399 50C100.399 22.3858 78.0136 0 50.3994 0C22.7852 0 0.399414 22.3858 0.399414 50C0.399414 77.6142 22.7852 100 50.3994 100Z" fill="#E1F1FD" />
                        <path d="M75.4925 62.5393V64.0078C75.4925 64.9947 75.1005 65.9411 74.4027 66.6389C73.7049 67.3367 72.7584 67.7288 71.7716 67.7288H27.1203C26.1334 67.7288 25.187 67.3367 24.4892 66.6389C23.7914 65.9411 23.3994 64.9947 23.3994 64.0078V36.7209C23.3994 35.7341 23.7914 34.7876 24.4892 34.0898C25.187 33.392 26.1334 33 27.1203 33H71.7716C72.7584 33 73.7049 33.392 74.4027 34.0898C75.1005 34.7876 75.4925 35.7341 75.4925 36.7209V42.7489" stroke="#4CAF50" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M69.4424 43.2324V47.3862" stroke="#4CAF50" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M69.4424 57.0781V61.2319" stroke="#4CAF50" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M76.8609 47.8906L73.4141 49.8386" stroke="#4CAF50" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M65.4711 54.624L62.0244 56.572" stroke="#4CAF50" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M62.0244 47.8916L65.4709 49.8401" stroke="#4CAF50" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M73.4141 54.626L76.8605 56.5745" stroke="#4CAF50" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M30.7969 57.7299L38.6026 49.9243L44.3353 55.657L56.3107 43.6816" stroke="#4CAF50" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                    <defs>
                        <clipPath id="clip0_38_3447">
                            <rect width="101" height="100" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <h3 class="uptime-heading">Free SSL Certificates</h3>
            <p class="uptime-pragrap">We Keep Your Web build Online 24x7x365.Downtime not only costs you lost visitors
                but also damages your
                reputation and search engine rankings.</p>
        </div>
        <div class="col-md-3 text-center">
            <div>
                <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M49.8155 100C77.3278 100 99.631 77.6142 99.631 50C99.631 22.3858 77.3278 0 49.8155 0C22.3032 0 0 22.3858 0 50C0 77.6142 22.3032 100 49.8155 100Z" fill="#E1F1FD" />
                    <path d="M26.4907 45.8496H23.7125C23.2368 45.8496 22.7806 46.0533 22.4442 46.416C22.1079 46.7787 21.9189 47.2706 21.9189 47.7834V55.54C21.9189 56.0528 22.1079 56.5447 22.4442 56.9074C22.7806 57.27 23.2368 57.4738 23.7125 57.4738H26.4907" stroke="#4CAF50" stroke-width="3.11405" stroke-linecap="round" />
                    <path d="M73.9591 45.8496H75.9168C76.3925 45.8496 76.8487 46.0533 77.1851 46.416C77.5214 46.7787 77.7104 47.2706 77.7104 47.7834V55.54C77.7104 56.0528 77.5214 56.5447 77.1851 56.9074C76.8487 57.27 76.3925 57.4738 75.9168 57.4738H73.1387" stroke="#4CAF50" stroke-width="3.11405" stroke-linecap="round" />
                    <path d="M60.2123 70.5232H63.8578C67.9737 67.5176 71.0298 63.2702 72.5822 58.3979C74.1345 53.5255 74.1022 48.2822 72.4899 43.4296C70.8777 38.577 67.7694 34.368 63.6168 31.4141C59.4642 28.4601 54.4835 26.9151 49.3984 27.0036C44.3134 27.092 39.3887 28.8093 35.3401 31.9059C31.2915 35.0025 28.3297 39.3171 26.8852 44.2229C25.4406 49.1286 25.5885 54.3699 27.3073 59.1853C29.0262 64.0008 32.2264 68.1394 36.4431 71" stroke="#4CAF50" stroke-width="3" stroke-linecap="round" />
                    <path d="M57.3702 72.8249H47.7345C47.2301 72.8227 46.747 72.6166 46.3903 72.2516C46.0337 71.8866 45.8323 71.3922 45.8301 70.876V70.6218C45.8326 70.1057 46.034 69.6114 46.3906 69.2465C46.7472 68.8815 47.2302 68.6754 47.7345 68.6729H57.3702C57.8746 68.6751 58.3577 68.8811 58.7144 69.2462C59.0711 69.6112 59.2724 70.1056 59.2746 70.6218V70.876C59.2726 71.3923 59.0714 71.8869 58.7147 72.2519C58.358 72.617 57.8747 72.823 57.3702 72.8249Z" stroke="#4CAF50" stroke-width="3" stroke-linecap="round" />
                    <path d="M35.057 55.8622H41.2785V54.3537H37.6138V54.294L38.8879 53.0454C40.682 51.4091 41.1635 50.5909 41.1635 49.598C41.1635 48.0852 39.9277 47.0156 38.057 47.0156C36.2246 47.0156 34.9675 48.1108 34.9717 49.8239H36.7231C36.7189 48.9886 37.2473 48.4773 38.0442 48.4773C38.8112 48.4773 39.3822 48.9545 39.3822 49.7216C39.3822 50.4162 38.9561 50.8935 38.1635 51.6562L35.057 54.5327V55.8622ZM42.2959 54.3281H46.4849V55.8622H48.2491V54.3281H49.3315V52.8494H48.2491V47.1349H45.9394L42.2959 52.875V54.3281ZM46.519 52.8494H44.1539V52.7812L46.4508 49.1463H46.519V52.8494ZM55.9174 54.652L57.0381 53.5312L55.0523 51.5497L57.0381 49.5682L55.9174 48.4389L53.9316 50.4247L51.9415 48.4389L50.8251 49.5682L52.8066 51.5497L50.8251 53.5312L51.9415 54.652L53.9316 52.6662L55.9174 54.652ZM59.0623 55.8622H60.9671L64.5893 48.6648V47.1349H58.4657V48.6435H62.6802V48.7031L59.0623 55.8622Z" fill="#4CAF50" />
                </svg>
            </div>
            <h3 class="uptime-heading">24x7 Friendly Support</h3>
            <p class="uptime-pragrap">We Keep Your Web build Online 24x7x365.Downtime not only costs you lost visitors
                but also damages your
                reputation and search engine rankings.</p>
        </div>
    </div>

</div>

<!-- End Why you join Rokmari Tender Section -->

<!-- Start What client says Section -->
<div class="container-fluid mt-5 client-says-container">
    <div class="row ">
        <div class="text-center">
            <h3 class="client-says-heading">What client says</h3>
            <p class="client-says-pragrap">Bootstrap code with a well-organized Figma file to design & develop your next
                websites in minutes.</p>
        </div>
    </div>
</div>

<!-- End What client says Section -->

<!-- Start Incredible Experience carousel section -->
<div class="container-fluid carousal">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container ">
                    <div class="row  justify-content-center">
                        <div class=" col-md-6">
                            <div class="card carosul-card text-center">
                                <h3 class="carosul-heading">Incredible Experience</h3>
                                <p class="post">
                                    We had an incredible experience working with Landify and were impressed they made
                                    such a big difference in only three weeks. Our team is so grateful for the wonderful
                                    improvements they made and their ability to get familiar with the concept so
                                    quickly.
                                </p>
                            </div>
                            <div class="arrow-down"></div>
                            <div class="row  d-flex justify-content-center">
                                <div class="">
                                    <img class="profile-pic fit-image" src="images/Photo.png">
                                </div>
                                <p class="profile-name">Anya Tailor Joy</p>
                                <p class="profile-degination">CEO, SF Industires</p>
                            </div>
                        </div>
                        <div class=" col-md-6 carosul-2nd-div">
                            <div class="card carosul-card">
                                <h3 class="carosul-heading">Dependable, Responsive, Professional Partner</h3>
                                <p class="post">
                                    Fermin Apps has collaborated with Landify team for several projects such as Photo
                                    Sharing Apps and Custom Social Networking Apps. The experience has been pleasant,
                                    professional and exceeding our expectations.
                                </p>
                            </div>
                            <div class="arrow-down"></div>
                            <div class="row  d-flex justify-content-center">
                                <div class="">
                                    <img class="profile-pic fit-image" src="images/Photo.png">
                                </div>
                                <p class="profile-name">Anya Tailor Joy</p>
                                <p class="profile-degination">CEO, SF Industires</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container ">
                    <div class="row  justify-content-center">
                        <div class=" col-md-6">
                            <div class="card carosul-card text-center">
                                <h3 class="carosul-heading">Incredible Experience</h3>
                                <p class="post">
                                    We had an incredible experience working with Landify and were impressed they made
                                    such a big difference in only three weeks. Our team is so grateful for the wonderful
                                    improvements they made and their ability to get familiar with the concept so
                                    quickly.
                                </p>
                            </div>
                            <div class="arrow-down"></div>
                            <div class="row  d-flex justify-content-center">
                                <div class="">
                                    <img class="profile-pic fit-image" src="images/Photo.png">
                                </div>
                                <p class="profile-name">Anya Tailor Joy</p>
                                <p class="profile-degination">CEO, SF Industires</p>
                            </div>
                        </div>
                        <div class=" col-md-6 carosul-2nd-div">
                            <div class="card carosul-card">
                                <h3 class="carosul-heading">Dependable, Responsive, Professional Partner</h3>
                                <p class="post">
                                    Fermin Apps has collaborated with Landify team for several projects such as Photo
                                    Sharing Apps and Custom Social Networking Apps. The experience has been pleasant,
                                    professional and exceeding our expectations.
                                </p>
                            </div>
                            <div class="arrow-down"></div>
                            <div class="row  d-flex justify-content-center">
                                <div class="">
                                    <img class="profile-pic fit-image" src="images/Photo.png">
                                </div>
                                <p class="profile-name">Anya Tailor Joy</p>
                                <p class="profile-degination">CEO, SF Industires</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container ">
                    <div class="row  justify-content-center">
                        <div class=" col-md-6">
                            <div class="card carosul-card text-center">
                                <h3 class="carosul-heading">Incredible Experience</h3>
                                <p class="post">
                                    We had an incredible experience working with Landify and were impressed they made
                                    such a big difference in only three weeks. Our team is so grateful for the wonderful
                                    improvements they made and their ability to get familiar with the concept so
                                    quickly.
                                </p>
                            </div>
                            <div class="arrow-down"></div>
                            <div class="row  d-flex justify-content-center">
                                <div class="">
                                    <img class="profile-pic fit-image" src="images/Photo.png">
                                </div>
                                <p class="profile-name">Anya Tailor Joy</p>
                                <p class="profile-degination">CEO, SF Industires</p>
                            </div>
                        </div>
                        <div class=" col-md-6 carosul-2nd-div">
                            <div class="card carosul-card">
                                <h3 class="carosul-heading">Dependable, Responsive, Professional Partner</h3>
                                <p class="post">
                                    Fermin Apps has collaborated with Landify team for several projects such as Photo
                                    Sharing Apps and Custom Social Networking Apps. The experience has been pleasant,
                                    professional and exceeding our expectations.
                                </p>
                            </div>
                            <div class="arrow-down"></div>
                            <div class="row  d-flex justify-content-center">
                                <div class="">
                                    <img class="profile-pic fit-image" src="images/Photo.png">
                                </div>
                                <p class="profile-name">Anya Tailor Joy</p>
                                <p class="profile-degination">CEO, SF Industires</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev carosul_btn_width" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="view-tender-arrow-carousel" aria-hidden="true">
                <i class="fa-solid fa-arrow-left"></i>
            </span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next carosul_btn_width" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="view-tender-arrow-carousel" aria-hidden="true">
                <i class="fa-solid fa-arrow-right"></i>
            </span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- End Incredible Experience section -->

<!-- Start Get Your Tender Today! Section -->

<div class="container  get-your-tender">
    <div class="row ">
        <div class="col-md-6">
            <h3 class="tender-today">Get Your Tender Today!</h3>
            <p class="tender-dash"></p>
            <p class="tender-today-paragrap">This the first true value generator on the Internet. It uses alphas
                dictionary of over 200 Latin words.</p>
                <?php

                    if ($this->ion_auth->logged_in()) {
                        ?> 
                            <a href="<?= base_url('tenders') ?>" class="btn teder-today-btn">View Tender</a>
                        <?php
                    }else {
                        ?>
                            <a href="<?= base_url('user-registration') ?>" class="btn teder-today-btn">Sign Up</a> 
                        <?php
                    }

            ?>
            
        </div>
        <div class="col-md-6 text-center">
            <img src="images/Hand-sheak.png" alt="" class="hand-sheak-img">
        </div>
    </div>
</div>
<!-- End Get Your Tender Today! Section -->

<!-- Start Explore our pricing plans Section -->
<div class="container-fluid inovation-for-tender">
    <div class="row ">
        <div class="text-center explore-our">
            <h3 class="font-48px">Explore our pricing plans</h3>
            <p class="explore-paragrap">Donec ligula ligula, porta at urna non, faucibus congue urna. Nullam nulla <br>
                purus, facilisis vitae odio ac, tempus aliquet dolor.</p>
            <div class="">
                <button class="explore-button">
                    <a class="monthly-explore">Monthly</a>
                    <a class="monthly-yearly">Yearly</a>
                </button>
            </div>
            <button class="explore-recommended">Recommended</button>
        </div>
    </div>
</div>

<!-- End Explore our pricing plans Section -->

<!-- Start Standerd card -->

<div class="container shadow-box">
    <div class="row">
        <?php
            foreach ($all_tender_pkg as $key => $value) {
                
                ?> 
                        <div class="col-md-4">
                            <div class=" shadow_search_box p-4">
                                <div class="icon-dolar">
                                    <div>
                                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="80" height="80" rx="8" fill="#E7F5E8" />
                                            <path opacity="0.2" d="M25.1731 31.6587C25.0597 31.851 25 32.0701 25 32.2933V47.7062C25 47.928 25.059 48.1458 25.171 48.3373C25.283 48.5287 25.4439 48.687 25.6372 48.7957L39.3872 56.5301C39.5743 56.6353 39.7853 56.6906 40 56.6906L40.0016 56.6906L40.1483 39.9998L25.1731 31.6587L25.1731 31.6587Z" fill="#4CAF50" />
                                            <path d="M55 47.7063V32.2935C55 32.0717 54.941 31.8539 54.829 31.6624C54.717 31.4709 54.5561 31.3127 54.3628 31.204L40.6128 23.4696C40.4257 23.3644 40.2147 23.3091 40 23.3091C39.7853 23.3091 39.5743 23.3644 39.3872 23.4696L25.6372 31.204C25.4439 31.3127 25.283 31.4709 25.171 31.6624C25.059 31.8539 25 32.0717 25 32.2935V47.7063C25 47.9281 25.059 48.1459 25.171 48.3374C25.283 48.5288 25.4439 48.6871 25.6372 48.7958L39.3872 56.5302C39.5743 56.6354 39.7853 56.6907 40 56.6907C40.2147 56.6907 40.4257 56.6354 40.6128 56.5302L54.3628 48.7958C54.5561 48.6871 54.717 48.5288 54.829 48.3374C54.941 48.1459 55 47.9281 55 47.7063Z" stroke="#4CAF50" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M47.6597 43.8298V35.7048L32.5 27.3438" stroke="#4CAF50" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M54.8274 31.6603L40.148 39.9998L25.1729 31.6587" stroke="#4CAF50" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M40.1486 40L40.002 56.6908" stroke="#4CAF50" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="dolar-per-montd">
                                        <p class="dolar"> <?=$value->pkg_price?> </p>
                                        <span class="per-month">/Per Month</span>
                                    </div>
                                </div>
                                <h3 class="one_step_standard"><?=$value->pkg_name?></h3>
                                <p class="one_step_pragrap"><?=$value->pkg_description?></p>
                                <?php
                                    if (!$this->ion_auth->logged_in()) {
                                        ?>
                                             <a href="<?= base_url('user-registration') ?>" class="btn get-started-btn w-40">Get Started
                                                <i class="fa-solid fa-arrow-right mt-2 ms-2"></i>
                                            </a> 
                                        <?php
                                    }
                                ?>
                               
                                <hr>

                                <div class="checkbox-list">
                                    <div>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="24" height="24" rx="12" fill="#E7F5E8" />
                                            <path d="M16.8125 8.93799L10.6875 15.0627L7.625 12.0005" stroke="#4CAF50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                                            <path d="M16.8125 8.93799L10.6875 15.0627L7.625 12.0005" stroke="#4CAF50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                                            <path d="M16.8125 8.93799L10.6875 15.0627L7.625 12.0005" stroke="#4CAF50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                                            <path d="M16.8125 8.93799L10.6875 15.0627L7.625 12.0005" stroke="#4CAF50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                                            <path d="M16.8125 8.93799L10.6875 15.0627L7.625 12.0005" stroke="#4CAF50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                                            <path d="M16.8125 8.93799L10.6875 15.0627L7.625 12.0005" stroke="#4CAF50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                                            <path d="M16.8125 8.93799L10.6875 15.0627L7.625 12.0005" stroke="#4CAF50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
        ?>
        
        
    </div>
</div>

<!-- End Standerd card -->

<!-- Start latest blog -->

<div class="container  latest-blog-section">
    <div class="row ">
        <div class="text-center">
            <h3 class="font-48px">Latest Blog</h3>
        </div>


        <div class="gtco-testimonials">
            <div class="owl-carousel owl-carousel1 owl-theme">
                <div>
                    <div class="card"><img class="card-img-top" src="images/Rectangle-33.png" alt="">
                        <div class="card-body">
                            <p class="card-text">Solution for clean look working space </p>
                            <p class="card-text">10 jan 2020 </p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card"><img class="card-img-top" src="images/Rectangle-34.png" alt="">
                        <div class="card-body">
                            <p class="card-text">Make your cooking activity more fun with good setup </p>
                            <p class="card-text">20 jan 2020 </p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card"><img class="card-img-top" src="images/Rectangle-34.png" alt="">
                        <div class="card-body">
                            <p class="card-text">How to create a living room to love</p>
                            <p class="card-text">20 jan 2020 </p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card"><img class="card-img-top" src="images/Rectangle-32.png" alt="">
                        <div class="card-body">
                            <p class="card-text">How to create a living room to love </p>
                            <p class="card-text">20 jan 2020 </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>



<!-- End latest blog -->

<!-- Start Get more tender information Section -->

<div class="container-fluid information-bg-image">
    <div class="row ">
        <div class=" tender-information text-center">
            <h3 class="tender-information-heading">Get more tender information</h3>
            <p class="tender-information-dash"></p>
            <p class="tender-information-text">
                Making this the first true value generator on the Internet. It of over 200 Latin words, combined with a
                handful.
            </p>
            <div class="d-flax">
                <input type="text" class="from-control subscribe-input" placeholder="Your Email Id...">
                <button class="subscribe-btn">Subscribe</button>
            </div>
        </div>
    </div>
</div>
<!-- bootstrap 5 modal  -->
<div style="padding-right: 30%;" class="modal fade modal-md" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 175% !important;">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="tender_from_scr">
      <div id="search_content">
      
      <?php
      foreach($basic_tenders as $key=>$value)
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
                                    if($this->ion_auth->logged_in())
                                    {
                                    
                                    ?>
                                    <div class="d-flex pt-3">
                                        <div>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21.4875 3.01411C18.7781 0.735988 14.5922 1.07818 12 3.71724C9.40782 1.07818 5.22188 0.731301 2.51251 3.01411C-1.01249 5.9813 -0.49687 10.8188 2.01563 13.3829L10.2375 21.7594C10.7063 22.2376 11.3344 22.5047 12 22.5047C12.6703 22.5047 13.2938 22.2422 13.7625 21.7641L21.9844 13.3876C24.4922 10.8235 25.0172 5.98599 21.4875 3.01411ZM20.3813 11.8032L12.1594 20.1797C12.0469 20.2922 11.9531 20.2922 11.8406 20.1797L3.61876 11.8032C1.90782 10.0594 1.56094 6.75943 3.96094 4.73911C5.78438 3.2063 8.59688 3.43599 10.3594 5.2313L12 6.90474L13.6406 5.2313C15.4125 3.42661 18.225 3.2063 20.0391 4.73443C22.4344 6.75474 22.0781 10.0735 20.3813 11.8032Z" fill="#0B63E5" />
                                            </svg>
                                        </div>
                                    
                                        <p class="publish_save">Save</p>
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
      ?>
                        <div class="d-flex justify-content-center">

                              <button id="load_more" class="btn btn-primary m-4">Load More</button>
                        </div>
    </div>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>


<script>
      $(document).ready(function() {
            $('.select_box_text').select2();
      });
</script>


<script>
      $(document).ready(function(){
            $(document).on('click', '#src', function(e){
                e.preventDefault();
                  let date= $('#date').val();
                  let order_by = $('#order_by').find(":selected").val();
                  let pro_method = $('#pro_method').find(":selected").val();
                  let call_type = $('#call_type').find(":selected").val();
                  let Inviter = $('#Inviter').find(":selected").val();
                  let tender_on = $('#tender_on').find(":selected").val();
                  let bidding_type = $('#bidding_type').find(":selected").val();
                  let districts = $('#districts').find(":selected").val();
                  
                  
                  $.ajax({
                        url: "site/advance_search",
                        method: "POST",
                        data:{
                            date:date,
                              order_by:order_by,
                              pro_method:pro_method,
                              call_type:call_type,
                              Inviter:Inviter,
                              tender_on:tender_on,
                              bidding_type:bidding_type,
                              districts:districts,
                        },

                        success: function(output)
                              {
                                $("#exampleModal").modal('show');
                                    
                                    $('#tender_from_scr').empty();
                                    $('#tender_from_scr').html(output);
                              }
                  });
            })


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
           
      });
</script>