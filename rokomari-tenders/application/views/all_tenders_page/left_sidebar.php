<div class="col-md-4 g-0">
                  <div class="tender_information_column">
                        <div class="d-flex mx-2 tender_information_bg_btn">
                              <div>
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M10 17H22V15H10V17ZM7 10V12H25V10H7ZM14 22H18V20H14V22Z" fill="white" />
                                    </svg>
                              </div>
                              <div>
                                    <p class="tender_information_text">Tender informations</p>
                              </div>
                        </div>
                        <div class="mt-3  ms-4 d-flex">
                              <div class="pt-2">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M23.6719 20.7516L18.9984 16.0781C18.7875 15.8672 18.5016 15.75 18.2016 15.75H17.4375C18.7313 14.0953 19.5 12.0141 19.5 9.75C19.5 4.36406 15.1359 0 9.75 0C4.36406 0 0 4.36406 0 9.75C0 15.1359 4.36406 19.5 9.75 19.5C12.0141 19.5 14.0953 18.7313 15.75 17.4375V18.2016C15.75 18.5016 15.8672 18.7875 16.0781 18.9984L20.7516 23.6719C21.1922 24.1125 21.9047 24.1125 22.3406 23.6719L23.6672 22.3453C24.1078 21.9047 24.1078 21.1922 23.6719 20.7516ZM9.75 15.75C6.43594 15.75 3.75 13.0688 3.75 9.75C3.75 6.43594 6.43125 3.75 9.75 3.75C13.0641 3.75 15.75 6.43125 15.75 9.75C15.75 13.0641 13.0688 15.75 9.75 15.75Z" fill="#757575" />
                                    </svg>
                              </div>
                              <div>
                                    <input type="search" class="form-control search_input" placeholder="Search">
                              </div>
                        </div>
                        <hr class="mt-2">

                        <div class="container" style="margin-top: 10px;">
                              <!-- Nav tabs -->
                              <ul class="nav nav-pills">
                                    <li class="nav-item">
                                          <a class="nav-link nav_tab_text_color active" data-bs-toggle="pill" href="#product">Product</a>
                                    </li>
                                    <li class="nav-item">
                                          <a class="nav-link nav_tab_text_color" data-bs-toggle="pill" href="#inviter">Inviter</a>
                                    </li>
                                    <li class="nav-item">
                                          <a class="nav-link nav_tab_text_color" data-bs-toggle="pill" href="#source">Source</a>
                                    </li>
                                    <li class="nav-item">
                                          <a class="nav-link nav_tab_text_color" data-bs-toggle="pill" href="#loc">Location</a>
                                    </li>
                              </ul>
                              <hr>

                              <!-- Tab panes -->
                              <div class="tab-content">
                                    <!-- start product tab  -->
                                    <div class="tab-pane container active" id="product">
                                          <div class="accordion mt-3 px-3" id="accordionExample">
                                                <?php
                                                foreach ($all_categories_sub_categories as $key => $value) {
                                                      if ($key == 0) {
                                                            $show = 'show';
                                                      } else {
                                                            $show = '';
                                                      }
                                                ?>
                                                      <div class="accordion-item accordion_border">
                                                            <h2 class="accordion-header" id="heading<?= $value['category_id'] ?>">
                                                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $value['category_id'] ?>" aria-expanded="true" aria-controls="collapse<?= $value['category_id'] ?>">
                                                                        <?= $value['category_name'] ?>
                                                                        <?php

                                                                        $count = tender_count_by('tender_category', $value['category_id']);
                                                                        if($count>0) echo '('.$count. ')'; 
                                                                        ?>
                                                                  </button>
                                                            </h2>
                                                      <div id="collapse<?= $value['category_id'] ?>" class="accordion-collapse collapse <?= $show ?>" aria-labelledby="heading<?= $value['category_id'] ?>" data-bs-parent="#accordionExample">
                                                                  <div class="accordion-body accordion_body_height">
                                                                        <?php
                                                                        foreach ($value['sub_categories'] as $sub_cat_key => $sub_cat_val) {
                                                                        ?>
                                                                              <a href="javascript:void(0)" onclick="get_tender_by_left_tree(<?= $sub_cat_val->sub_cat_id ?>, 'sub_cat')" class="accordion_body_a_tag" data-SubcatID="<?= $sub_cat_val->sub_cat_id ?>" data-SubcatName="<?= $sub_cat_val->sub_cat_name ?>">
                                                                                    <i class="fa-regular fa-circle circel_color"></i>
                                                                                    <p data-SubcatID="<?= $sub_cat_val->sub_cat_id ?>" data-catID="<?= $sub_cat_val->category_id ?>" class="sub_cat_on_click_search" ><?= $sub_cat_val->sub_cat_name ?><?php $count = tender_count_by('tender_sub_category',$sub_cat_val->sub_cat_id); if($count>0) echo '('.$count. ')'; ?>
                                                                                    </p>
                                                                              </a>
                                                                        <?php
                                                                        }
                                                                        ?>


                                                                  </div>
                                                            </div>
                                                      </div>
                                                <?php
                                                }

                                                ?>

                                          </div>
                                    </div>
                                    <!-- End product tab  -->

                                    <!-- Start Inviter tab  -->
                                    <div class="tab-pane container fade" id="inviter">
                                          <ul class="nav nav-pills">
                                                <li class="nav-item">
                                                      <a class="nav-link nav_tab_text_color active" data-bs-toggle="pill" href="#government">Government</a>
                                                </li>
                                                <li class="nav-item">
                                                      <a class="nav-link nav_tab_text_color" data-bs-toggle="pill" href="#private">Private</a>
                                                </li>
                                                <li class="nav-item">
                                                      <a class="nav-link nav_tab_text_color" data-bs-toggle="pill" href="#ngo">NGO</a>
                                                </li>
                                          </ul>

                                          <div class="tab-content">
                                                <div class="tab-pane container active" id="government">
                                                      <div class="source_body">
                                                            <?php
                                                            foreach ($ts_inviters_govt as $key => $value) {
                                                            ?>
                                                                  <a href="javascript:void(0)" class="accordion_body_a_tag" onclick="get_tender_by_left_tree(<?= $value->inviter_id ?>, 'inviter')">
                                                                        <i class="fa-regular fa-circle circel_color"></i>
                                                                        <p data-inviterID="<?= $value->inviter_id ?>" class="invt_id_click_search"> <?= $value->inviter_name ?>
                                                                        <?php 
                                                                        $count = tender_count_by('tender_inviter', $value->inviter_id);
                                                                        if($count>0) echo '('. $count .')';
                                                                        ?>
                                                                  </p>
                                                                  </a>
                                                            <?php
                                                            }
                                                            ?>
                                                      </div>
                                                </div>
                                                <div class="tab-pane container fade" id="private">
                                                      <div class="source_body">
                                                            <?php
                                                            foreach ($ts_inviters_private as $key => $value) {
                                                            ?>
                                                                  <a href="javascript:void(0)" class="accordion_body_a_tag" onclick="get_tender_by_left_tree(<?= $value->inviter_id ?>, 'inviter')">
                                                                        <i class="fa-regular fa-circle circel_color"></i>
                                                                        <p data-inviterID="<?= $value->inviter_id ?>" class="invt_id_click_search"> <?= $value->inviter_name ?>
                                                                        <?php 
                                                                        $count = tender_count_by('tender_inviter', $value->inviter_id);
                                                                        if($count>0) echo '('. $count .')';
                                                                        ?>
                                                                  </p>
                                                            <?php
                                                            }
                                                            ?>

                                                      </div>
                                                </div>
                                                <div class="tab-pane container fade" id="ngo">
                                                      <div class="source_body">
                                                            <?php
                                                            foreach ($ts_inviters_ngo as $key => $value) {
                                                            ?>
                                                                 <a href="javascript:void(0)" class="accordion_body_a_tag" onclick="get_tender_by_left_tree(<?= $value->inviter_id ?>, 'inviter')">
                                                                        <i class="fa-regular fa-circle circel_color"></i>
                                                                        <p data-inviterID="<?= $value->inviter_id ?>" class="invt_id_click_search"> <?= $value->inviter_name ?>
                                                                        <?php 
                                                                        $count = tender_count_by('tender_inviter', $value->inviter_id);
                                                                        if($count>0) echo '('. $count .')';
                                                                        ?>
                                                                  </p>
                                                            <?php
                                                            }
                                                            ?>

                                                      </div>
                                                </div>
                                          </div>

                                    </div>
                                    <!-- End Inviter tab  -->
                                    <!-- Start Source tab  -->
                                    <div class="tab-pane container fade" id="source">
                                          <div class="source_body">
                                                
                                                <?php
                                                            foreach ($ts_sources as $key => $value) {
                                                            ?>
                                                                 <a href="javascript:void(0)" class="accordion_body_a_tag" onclick="get_tender_by_left_tree(<?= $value->source_id ?>, 'source')">
                                                                        <i class="fa-regular fa-circle circel_color"></i>
                                                                        <p data-sourceID="<?= $value->source_id ?>" class="source_id_click_search"> <?= $value->source_name ?>
                                                                        <?php 
                                                                        $count = tender_count_by('tender_source', $value->source_id);
                                                                        if($count>0) echo '('. $count .')';
                                                                        ?>
                                                                  </p>
                                                            <?php
                                                            }
                                                            ?>
                                          </div>
                                    </div>
                                    <!-- End Source tab  -->

                                    <!-- Start Location tab  -->
                                    <div class="tab-pane container fade" id="loc">
                                          <div class="source_body">
                                                <?php
                                                foreach($all_divisions_districts as $key=>$value)
                                                {
                                                    ?>
                                                    <a href="javascript:void(0)" class="accordion_body_a_tag">
                                                      <i class="fa-solid fa-location-dot location_icon_color"></i>
                                                      <p class="division div_id_click_search" data-divID="<?=$value['division_id']?>"><?=$value['division_name']?></p>
                                                    </a>
                                                    <?php 
                                                    
                                                    foreach($value['district_single'] as $district_key=>$district_val)
                                                    {
                                                      ?>
                                                      <a href="javascript:void(0)" onclick="get_tender_by_left_tree(<?= $district_val->district_id ?>, 'location')" class="accordion_body_a_tag"><i class="fa-regular fa-circle circel_color"></i>
                                                      <p class="dis_id_click_search" data-disID="<?=$district_val->district_id?>"><?=$district_val->district_name?></p><?php
                                                            $count = tender_count_by('tender_district', $district_val->district_id);
                                                            if($count>0) echo '('. $count .')';
                                                            
                                                      ?>
                                                     </a>
                                                     
                                                      <?php
                                                    }
                                                    ?>
                                                    <?php
                                                }
                                                ?>
                                          </div>
                                    </div>
                                    <!-- End Location tab  -->

                              </div>
                        </div>

                  </div>
            </div>


            