<div class="advance_search_bg">
      <div class="text-center mb-4">
            <p class="advanc_text">ADVANCED SEARCH </p>
      </div>
      <form action="" method="POST">
            <div class="row">
                  <div class="col-md-3 mb-3">
                        <input type="date" class="form-control" name="date" id="date">
                  </div>
                  <div class="col-md-3 mb-3">
                        <select name="order_by" id="order_by" class="form-control select_box_text">
                              <option value="">Order by</option>
                              <?php
                              foreach ($order_by_newest_oldest as $key => $value) {
                              ?><option value="<?= $value ?>"><?= $key ?></option><?php
                                                                              }
                                                                                    ?>
                        </select>
                  </div>
                  <div class="col-md-3 mb-3">
                        <select name="pro_method" id="pro_method" class="form-control select_box_text">
                              <option value="">Procurement Method</option>
                              <?php
                              foreach ($procurement_method as $key => $value) {
                              ?><option value="<?= $value->pro_method_id ?>"><?= $value->pro_method_name ?></option><?php
                                                                                                                  }
                                                                                                                        ?>
                        </select>
                  </div>
                  <div class="col-md-3 mb-3">
                        <select name="call_type" id="call_type" class="form-control select_box_text">
                              <option value="">Call Type</option>
                              <?php
                              foreach ($call_type as $key => $value) {
                              ?><option value="<?= $value ?>"><?= $key ?></option><?php
                                                                              }
                                                                                    ?>
                        </select>
                  </div>
                  <div class="col-md-3 mb-3">
                        <select name="Inviter" id="Inviter" class="form-control select_box_text">
                              <option value="">Inviter</option>
                              <?php
                              foreach ($tender_inviter as $key => $value) {
                              ?><option value="<?= $value ?>"><?= $key ?></option><?php
                                                                              }
                                                                                    ?>
                        </select>
                  </div>
                  <div class="col-md-3 mb-3">
                        <select name="tender_on" id="tender_on" class="form-control select_box_text">
                              <option value="">Tender On</option>
                              <?php
                              foreach ($tender_on as $key => $value) {
                              ?><option value="<?= $value ?>"><?= $key ?></option><?php
                                                                              }
                                                                                    ?>
                        </select>
                  </div>
                  <div class="col-md-3 mb-3">
                        <select name="bidding_type" id="bidding_type" class="form-control select_box_text">
                              <option value="">Bidding </option>
                              <?php
                              foreach ($bidding_type as $key => $value) {
                              ?><option value="<?= $value ?>"><?= $key ?></option><?php
                                                                              }
                                                                                    ?>
                        </select>
                  </div>
                  <div class="col-md-3 mb-3">
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
            <div class="advance_button">
                  <button class="reset">Reset</button>
                  <button class="search" id="src">
                        <i class="fa-solid fa-magnifying-glass me-2"></i>
                        Search
                  </button>
            </div>
      </form>
</div>



