
<div class="pt-1"></div>
<div class="mt-1"></div>

<div class="py-2"></div>
<div class="main_content container">
  <hr class="my-2">
  
  <div class="row">
    <?= $this->load->view('frontend/left_search_tree') ?>

    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12">
      <div class="content-1" id="search_content" style="background-color: #f3f3f3; border:1px solid #dfdfdf;">
          <p class="h6 px-3 pt-1">Advance Search</p>          
          <form method="post" id="advance_search_form" class="px-2 py-1" style="font-size: 12px;">
            <hr class="mt-1">
            <div class="row px-2">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 font-weight-bold">Inviter:</label>
                  <input type="text" name="inviter" class="form-control col-sm-9" placeholder="Write organization name" style="height: 25px;">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-4 font-weight-bold">Inviter Type:</label>
                  <input type="checkbox" name="inviter_type[]" value="2"> &nbsp;Govt. &nbsp;&nbsp;
                  <input type="checkbox" name="inviter_type[]" value="3"> &nbsp;Private &nbsp;&nbsp;
                  <input type="checkbox" name="inviter_type[]" value="1"> &nbsp;NGO
                </div>
              </div>
            </div> 
            <div class="row px-2">
              <div class="col-md-11">
                <div class="form-group row">
                  <label class="col-sm-3 font-weight-bold">Tender Type:</label>
                  <input type="checkbox" name="tender_type[]" value="3"> &nbsp;IFT &nbsp; &nbsp;
                  <input type="checkbox" name="tender_type[]" value="5"> &nbsp;Preq &nbsp; &nbsp;
                  <input type="checkbox" name="tender_type[]" value="2"> &nbsp;Enlistment &nbsp; &nbsp;
                  <input type="checkbox" name="tender_type[]" value="7"> &nbsp;EOI(Firm) &nbsp; &nbsp;
                  <input type="checkbox" name="tender_type[]" value="8"> &nbsp;EOI(Indv) &nbsp; &nbsp;
                  <input type="checkbox" name="tender_type[]" value="1"> &nbsp;RFP &nbsp; &nbsp;
                  <input type="checkbox" name="tender_type[]" value="4"> &nbsp;Auc/Sal
                </div>
              </div>
            </div> 
            <div class="row px-2">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-2 font-weight-bold">Call Type:</label>
                  <input type="checkbox" name="call_type[]" value="1"> &nbsp;Tender &nbsp;
                  <input type="checkbox" name="call_type[]" value="2"> &nbsp;Corrigendum &nbsp;
                  <input type="checkbox" name="call_type[]" value="3"> &nbsp;Cancellation
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-4 font-weight-bold">Procuring Place:</label>
                  <?= form_dropdown('procuring_place', $procuring_place, set_value('procuring_place'), 'class="form-control col-sm-8 select2"') ?>
                </div>
              </div>
            </div> 
            <div class="row px-2">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-4 font-weight-bold">Tender On:</label>
                  <input type="checkbox" name="tender_on[]" value="1"> &nbsp;Goods &nbsp; &nbsp;
                  <input type="checkbox" name="tender_on[]" value="2"> &nbsp;Works &nbsp; &nbsp;
                  <input type="checkbox" name="tender_on[]" value="3"> &nbsp;Services
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-4 font-weight-bold">Bidding Type:</label>
                  <input type="checkbox" name="bidding_type[]" value="1"> &nbsp;Local &nbsp; &nbsp;
                  <input type="checkbox" name="bidding_type[]" value="2"> &nbsp;International
                </div>
              </div>
            </div>
            <div class="row px-2">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-4 font-weight-bold">Working Area:</label>
                  <?= form_dropdown('working_area', $working_area, set_value('working_area'), 'class="form-control col-sm-8 select2"') ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-4 font-weight-bold">Source:</label>
                  <?= form_dropdown('source', $source, set_value('source'), 'class="form-control col-sm-8 select2"') ?>
                </div>
              </div>
            </div> 
            <div class="row px-2">
              <div class="col-md-11">
                <div class="form-group row">
                  <label class="col-sm-3 font-weight-bold">Search By Date:</label>
                  <select class="col-sm-4 form-control select2" name="search_by_date" id="search_by_date">
                    <option value="">-- Select --</option>
                    <option value="1">Published Date</option>
                    <option value="2">Schedule Purchase Deadline</option>
                    <option value="3">Submission Deadline</option>
                    <option value="4">Opening Date</option>
                    <option value="5">Pre-Bid Meeting</option>
                  </select>
                  &nbsp; &nbsp;
                  <input type="" name="date_1" id="date_1" class="datepicker form-control col-sm-2" style="height: 30px;"> 
                  &nbsp; &nbsp;
                  <input type="" name="date_2" id="date_2" class="datepicker form-control col-sm-2" style="height: 30px;">
                </div>
              </div>
            </div> 
            <div class="row px-2">
              <div class="col-md-1 offset-md-9">
                <button class="btn btn-danger btn-sm" id="reset_adv_search">Reset</button>
              </div>
              <div class="col-md-2">
                <button class="btn btn-info btn-sm" id="advance_search_btn">Search</button>
              </div>
            </div> 
          </form>
        <p class="py-1"></p>
      </div>
      <hr>
      <div id="loader_image">
        <img src="<?= base_url('images/loader.gif') ?>" height="50" width="100%">
      </div>
      <div class="content-1" id="advance_search_result">
        <!-- search result will show here -->
      </div>
    </div><!-- end of col-xl-8 -->

    <?= $this->load->view('frontend/quick_link_sidebar') ?>
  </div><!-- end main of row -->
</div> <!-- end of main_content -->
<div class="py-3"></div>