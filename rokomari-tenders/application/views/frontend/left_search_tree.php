    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
      <div class="quick-link border">
        <div class="bg-primary pl-2 py-2 text-white font-weight-bold">
          <div style="width: 40%; float: left;">
            Search Tender
          </div>
          <?php
          if($this->ion_auth->logged_in()):
          ?>
          <div style="width: 36%; float: right;" id="my_prd_or_all_id">
            <div style="width: 50%; font-size: 14px; float: right;">
              <input type="radio" name="my_prd_or_all[]" onclick="get_tree_element_product(1)" checked> All
            </div>
            <div style="width: 50%; font-size: 14px; float: right;">
              <input type="radio" name="my_prd_or_all[]" onclick="get_tree_element_product(2)"> My
            </div>
          </div>
          <?php
          endif;
          ?>
          <div class="clearfix"></div>

        </div>
        <div class="d-flex flex-row justify-content-center">
          <div class="p-2 bg-danger text-white curpoint" id="tree_sel_product" onclick="change_tree(1)">Product</div>
          <div class="p-2 bg-secondary text-white curpoint" id="tree_sel_inviter" onclick="change_tree(2)">Inviter</div>
          <div class="p-2 bg-info text-white curpoint" id="tree_sel_source" onclick="change_tree(3)">Source</div>
          <div class="p-2 px-2 bg-dark text-white curpoint" id="tree_sel_location" onclick="change_tree(4)">Location</div>
        </div>
        
        <div class="input-group px-2 mt-2" id="left_tree_search_product">
          <input type="text" class="form-control" onkeyup="left_tree_onkeyup_search_product(this.value)" placeholder="Search for product">
          <!-- <span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
          </span> -->
        </div><!-- /input-group for category-->
        <div class="input-group px-2 mt-2" id="left_tree_search_inviter" style="font-size: 14px;">
          <input type="radio" name="left_tree_search_inviter[]" onclick="get_inviter_by_type(2)"> &nbsp;Government &nbsp;
          <input type="radio" name="left_tree_search_inviter[]" onclick="get_inviter_by_type(3)"> &nbsp;Private &nbsp;
          <input type="radio" name="left_tree_search_inviter[]" onclick="get_inviter_by_type(1)"> &nbsp;NGO
        </div><!-- /input-group for inviter-->
        <ul class="list-unstyled mt-2 px-3" style="font-size: 13px;" id="tree_element">
        <?php
          foreach($all_categories as $catRow):
        ?>
          <li class="hover-color-change" id="tree_branch<?= $catRow->category_id ?>" >
            <i class="fa fa-plus-square fa-fw"></i><?= $catRow->category_name ?>
            <ul style="display: none; padding-left: 5%; font-size: 12px;">
            <?php
              $cat_sub_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $catRow->category_id);
              foreach($cat_sub_cat as $subcatRow):
            ?>
              <li class="list-unstyled" onclick="get_tender_by_left_tree(<?= $subcatRow->sub_cat_id ?>, 'sub_cat')"><i class="fa fa-angle-right fa-fw"></i><?= $subcatRow->sub_cat_name ?></li>
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
    </div>