
<div class="pt-1"></div>
<div class="mt-1"></div>

<div class="py-2"></div>
<div class="main_content container">
  
  <div class="row">
    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12">
      <div class="content-1" id="search_content">
        <div class="content-2" style="background-color: #f3f3f3; border:1px solid #dfdfdf;">
          <p class="h6 px-3 pt-3">Choose Favorite Products<span class="ml-5 text-<?=$pkg_message_color?>"><?=$pkg_message?></span></p>
          <div class="text-justify px-3 py-1">
            <hr class="mt-1">
            
            <?php
              echo $this->session->flashdata('msgProduct');
            ?>

            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 ml-3 mr-4">
                <!-- start -->
                <div class="quick-link border">
                  <div class="bg-primary px-4 py-2 text-white font-weight-bold">Search Tender</div>
                  
                  <div class="input-group px-2 mt-2">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                      </span>
                    </div><!-- /input-group -->
                    <ul class="list-unstyled mt-2 px-3" style="font-size: 13px;" id="tree_element">
                    <?php
                      foreach($all_categories as $catRow):
                    ?>
                    <li class="hover-color-change" id="tree_branch<?= $catRow->category_id ?>" >
                      <i class="fa fa-plus-square fa-fw"></i><?= $catRow->category_name ?>
                      <ul style="display: none; padding-left: 5%;">
                      <?php
                        $cat_sub_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $catRow->category_id);
                        foreach($cat_sub_cat as $subcatRow):
                      ?>
                        <li class="list-unstyled" onclick="add_tender_my_list(<?= $subcatRow->sub_cat_id ?>, '<?= $subcatRow->sub_cat_name ?>')" id="all_sub_cat<?= $subcatRow->sub_cat_id ?>">
                          <input type="checkbox" onclick="add_tender_my_list(<?= $subcatRow->sub_cat_id ?>, '<?= $subcatRow->sub_cat_name ?>')" value="<?= $subcatRow->sub_cat_id ?>" <?= in_array($subcatRow->sub_cat_id, $user_sub_cat_list_arr)? 'checked':'' ?> > <?= $subcatRow->sub_cat_name ?>
                        </li>
                      <?php
                        endforeach;
                      ?>
                      </ul>
                    </li>
                    <?php
                      endforeach;
                    ?>
                  </ul>
                </div>
                <!-- end -->
              </div>
              <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                <form action="<?= base_url('add-favorite-product') ?>" method="post">
                  <div class="quick-link border">                    
                    <ul class="list-unstyled mt-2 px-3" style="font-size: 13px;" id="user_cat_list">
                    <?php
                      foreach($user_cats as $catRow):
                    ?>
                      <li class="hover-color-change" id="user_sub_cat<?= $catRow->sub_cat_id ?>" >
                        <div class="row">
                          <div class="col-md-11"><?= $catRow->sub_cat_name ?> </div>
                          <div class="col-md-1"><input type="checkbox" name="user_sub_cat_name[]" value="<?= $catRow->sub_cat_id ?>" checked></div>
                        </div>
                      </li>
                      <?php
                        endforeach;
                      ?>
                    </ul>
                  </div>
                  <!-- <br> -->
                  <div class="quick-link pull-right" style="font-size: 14px;">
                    Total <span id="total_user_cat"><?= $total_user_cat ?></span> product(s) selected
                  </div>
                  <br>
                  <hr>
                  <div class="quick-link">
                    Note: You can select maximum 50 products.
                  </div>
                  <hr>
                  <button class="btn btn-primary pull-right">Save</button>
                </form>
              </div>
            </div>
            <p class="pt-1"></p>
            <hr class="mt-3">
          </div>
        </div>
        <p class="py-1"></p>
      </div>
    </div><!-- end of col-xl-8 -->
    <?= $this->load->view('frontend/quick_link_sidebar') ?>
  </div><!-- end main of row -->
</div> <!-- end of main_content -->
<div class="py-3"></div>