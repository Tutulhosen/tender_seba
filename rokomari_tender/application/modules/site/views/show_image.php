
<div class="pt-1"></div>
<div class="mt-1"></div>

<div class="py-2"></div>
<div class="main_content container">
  
  <hr class="my-2">
  
  <div class="row">
    

    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12">
      <div class="content-1">
        <div class="content-2" style="background-color: #f3f3f3; border:1px solid #dfdfdf;">
          <p class="h6 px-3 pt-3"><strong><?= $tender_details->tender_title ?></strong></p>
          <div class="text-justify px-3 py-1">
            <img src="<?= $tender_details->tender_img_url ?>" height="1100" width="850">
          </div>
        </div>
        <p class="py-1"></p>
    </div>
    </div><!-- end of col-xl-8 -->

    <?= $this->load->view('frontend/quick_link_sidebar') ?>
    
  </div><!-- end main of row -->
</div> <!-- end of main_content -->
<div class="py-3"></div>