
<!-- <div class="pt-1"></div> -->
<!-- <div class="mt-1"></div> -->

<div class="py-2"></div>
<div class="main_content container">
  <hr class="my-2">
  
  <div class="row">
    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12">
      <div class="content-1" id="search_content">
        <div class="content-2" style="background-color: #f3f3f3; border:1px solid #dfdfdf;">
          <p class="h6 px-3 pt-3"><?= $tender_details->tender_title ?></p>
          <div class="text-justify px-3 py-1">
            <div class="row">
              <div class="col-md-3">Tender ID</div>
              <div class="col-md-9">: <?= $tender_details->tender_manual_id ?></div>
            </div>
            <div class="row">
              <div class="col-md-3">Type</div>
              <div class="col-md-9">: <?= $tender_details->pro_method_name ?></div>
            </div>
            <div class="row">
              <div class="col-md-3">Inviter</div>
              <div class="col-md-9">: <?= $tender_details->inviter_name ?></div>
            </div>
            <div class="row">
              <div class="col-md-3">Schedule Purchase By</div>
              <div class="col-md-9">: <?= $sche_pur_date_days_time ?></div>
            </div>
            <div class="row">
              <div class="col-md-3" style="padding-right: 0px;">Prebid Meeting Date</div>
              <div class="col-md-9">: <?= date('d-m-Y', strtotime($tender_details->tender_prebid_meeting)) ?></div>
            </div>
            <div class="row">
              <div class="col-md-3" style="padding-right: 0px;">Opening Date</div>
              <div class="col-md-9">: <?= $opening_date_days_time ?></div>
            </div>
            <div class="row">
              <div class="col-md-3">Doc. Price</div>
              <div class="col-md-9">: <?= $tender_details->tender_doc_price ?></div>
            </div>
            <div class="row">
              <div class="col-md-3" style="padding-right: 0px;">Sec. Amount</div>
              <div class="col-md-9">: <?= $tender_details->tender_security_amount ?></div>
            </div>
            <div class="row">
              <div class="col-md-3" style="">Source</div>
              <div class="col-md-9">: <?= $tender_details->source_name ?></div>
            </div>
            <div class="row">
              <div class="col-md-3" style="">Product</div>
              <div class="col-md-9">: <?= $tender_details->category_name . ' [' . $tender_details->sub_cat_name . ']' ?></div>
            </div>
            <div class="row">
              <div class="col-md-3" style="padding-right: 0px;">Work Area</div>
              <div class="col-md-9">: <?= $tender_details->district_name ?></div>
            </div>
            <div class="row">
              <div class="col-md-3" style="padding-right: 0px;">Procuring Place</div>
              <div class="col-md-9">: <?= $tender_details->procuring_dist_name ?></div>
            </div>

            <p class="pt-4"></p>
            <hr class="mt-3">
          </div>
          <div class="row pb-3">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
              <p class="font-weight-normal px-3">Image: <a href="<?= base_url('site/show_image/' . $tender_details->tender_auto_id) ?>" target="_blank"><i class="fa fa-image fa-fw pl-5"></i></a></p>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
              <p class="font-weight-normal px-3">Published On: <?= date('d-m-Y', strtotime($tender_details->tender_published_on)) ?></p>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12">
              <p class="font-weight-normal px-3">Closed On:  <?= date('d-m-Y', strtotime($tender_details->tender_closed_on)) ?></p>
            </div>
          </div>  
        </div>
        <p class="py-1"></p>
      </div>
    </div><!-- end of col-xl-8 -->

    <?= $this->load->view('frontend/quick_link_sidebar') ?>
    
  </div><!-- end main of row -->
</div> <!-- end of main_content -->
<div class="py-3"></div>