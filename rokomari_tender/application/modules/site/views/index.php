<div class="pt-3"></div>
<div class="mt-2"></div>

<div class="filter  bg-warning py-3 container">
  <div class="container">
  <div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <select class="form-control select2" id="srch_prd" onchange="search_filter()">
        <option value="">Search By Product</option>
        <?php
          foreach($all_sub_categories as $subCatRow):
            $scid = $subCatRow->sub_cat_id;
        ?>
        <option value="<?= $scid ?>" <?= $srch_prd==$scid? 'selected':'' ?> ><?= $subCatRow->sub_cat_name ?></option>
        <?php
          endforeach;
        ?>
      </select>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <select class="form-control select2" id="srch_invtr" onchange="search_filter()">
        <option value="">Search By Inviter</option>
        <?php
          foreach($all_inviters as $inviterRow):
            $invid = $inviterRow->inviter_id;

        ?>
        <option value="<?= $invid ?>" <?= $srch_invtr==$invid? 'selected':'' ?> ><?= $inviterRow->inviter_name ?></option>
        <?php
          endforeach;
        ?>
      </select>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <select class="form-control select2" id="srch_workarea" onchange="search_filter()">
        <option value="">Search By Working Area</option>
        <?php
          foreach($all_districs as $districtRow):
            $warea = $districtRow->district_id;
        ?>
        <option value="<?= $warea ?>" <?= $srch_workarea==$warea? 'selected':'' ?> ><?= $districtRow->district_name ?></option>
        <?php
          endforeach;
        ?>
      </select>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
      <select class="form-control select2" id="srch_new" onchange="search_filter()">
        <option value="1" <?= $srch_new==1? 'selected':'' ?> >Newest First</option>
        <option value="2" <?= $srch_new==2? 'selected':'' ?> >Oldest First</option>
        <option value="3" <?= $srch_new==3? 'selected':'' ?> >Most Viewed On Top</option>
        <option value="4" <?= $srch_new==4? 'selected':'' ?> >Early Expired On Top</option>
      </select>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-xs-12">
      <button class="btn btn-sm btn-danger" onclick='window.location.href = "<?= base_url() ?>"'>Reset Filters</button>
    </div>
  </div>
  </div>
</div>
<!-- end of filter -->
<div class="py-2"></div>
<div class="main_content container">

  <?php if($this->ion_auth->logged_in()) { ?>
  <p class="h5 text-primary">Showing <span id="total_tender"><?= $total_tender ?></span> Tender</p>
  <?php } else { ?>
  <p class="h5 text-primary">Showing Featured Contents</p>
  <?php } ?>
  
  <hr class="my-2">
  
  <div class="row">
    <?= $this->load->view('frontend/left_search_tree') ?>
    <!-- end of col-xl-3 -->

    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12">      
      <div id="loader_image">
        <img src="<?= base_url('images/loader.gif') ?>" height="50" width="100%">
      </div>
      <div class="content-1" id="search_content">
        <?php
          if(empty($tenders))
            echo '<span style="color: red;">No Tender Found!</span>';
          
          foreach($tenders as $tenRow):
        ?>
          <div class="content-2" style="background-color: #f3f3f3; border:1px solid #dfdfdf;">
            <p class="h6 px-3 pt-3" id="tender_title<?= $tenRow->tender_auto_id ?>">
              <?php 
                if($this->ion_auth->logged_in() && in_array($tenRow->tender_auto_id, $favorite_tenders))
                  echo '<i class="fa fa-star" style="color: #ff0000;"></i> ' . $tenRow->tender_title;
                else
                  echo $tenRow->tender_title; 
              ?>
            </p>
            <div class="text-justify px-3 py-1">
              <div class="row">
                <div class="col-md-2">Tender ID</div>
                <div class="col-md-10">: <?= $tenRow->tender_manual_id ?></div>
              </div>
              <div class="row">
                <div class="col-md-2">Type</div>
                <div class="col-md-10">: <?= $tenRow->pro_method_name ?></div>
              </div>
              <div class="row">
                <div class="col-md-2">Inviter</div>
                <div class="col-md-10">: <?= $tenRow->inviter_name ?></div>
              </div>
              <div class="row">
                <div class="col-md-2">Doc. Price</div>
                <div class="col-md-10">: <?= $tenRow->tender_doc_price ?></div>
              </div>
              <div class="row">
                <div class="col-md-2">Sec. Amnt</div>
                <div class="col-md-10">: <?= $tenRow->tender_security_amount ?></div>
              </div>
              
              <p class="pt-"></p>
              <div class="float-right " style="margin-left: 10px; background-color: #ADD8E6; height: 30px; border: 1px solid #ADD8E6; border-radius: 5px;" title="Tender Viewed"> &nbsp;<strong><?= $tenRow->tender_view ?></strong> &nbsp; </div>
              <button class="btn float-right btn-sm border" onclick="show_details(<?= $tenRow->tender_auto_id ?>)"><span title="Show Details"><i class="fa fa-info-circle" style="color: #00c0ef;"></i></span></button>
              <?php
              if($this->ion_auth->logged_in())
              {
              ?>
              <button class=" mx-2 btn float-right btn-sm border" id="favcaticon<?= $tenRow->tender_auto_id ?>" onclick="addorremvfavcat(<?= $tenRow->tender_auto_id ?>)" title="Add to favorite" ><i class="fa fa-<?= in_array($tenRow->tender_auto_id, $favorite_tenders)?'times':'star' ?>" style="color: #ff0000;"></i></button>
              <?php
              }
              ?>
              <p class="pt-4"></p>
              <hr class="mt-3">
            </div>
            <div class="row pb-3">
              <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <p class="font-weight-normal px-3">Image: <a href="<?= base_url('site/show_image/' . $tenRow->tender_auto_id) ?>" target="_blank"><i class="fa fa-image fa-fw pl-5"></i></a></p>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <p class="font-weight-normal px-3">Published On: <?= date('d-m-Y', strtotime($tenRow->tender_published_on)) ?></p>
              </div>
              <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                <p class="font-weight-normal px-3">Closed On:  <?= date('d-m-Y', strtotime($tenRow->tender_closed_on)) ?></p>
              </div>
            </div>  
          </div>
          <p class="py-1"></p>
        <?php
          endforeach;
        ?>
      </div>
    </div><!-- end of col-xl-8 -->
    <?= $this->load->view('frontend/quick_link_sidebar') ?>
    
  </div><!-- end main of row -->
</div> <!-- end of main_content -->
<div class="py-3"></div>

<?php if($this->ion_auth->logged_in()): ?>
<div class="rt_pagination container w-50">
  <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <nav aria-label="..." id="pagination_nav">
          <?= $pagination_link ?>
        </nav>
      </div>
    </div>
</div>
<?php endif; ?>