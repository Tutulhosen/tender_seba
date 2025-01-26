
<div class="pt-1"></div>
<div class="mt-1"></div>

<div class="py-2"></div>
<div class="main_content container">
  
  <div class="row">
    <?= $this->load->view('frontend/left_search_tree') ?>

    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12">
      <div class="content-1">
        <div class="content-2" style="background-color: #f3f3f3; border:1px solid #dfdfdf;">
          <p class="h6 px-3 pt-3">Reminders</p>
          <div class="text-justify px-3 py-1">
            <hr class="mt-1">
            
            <?php
              echo $this->session->flashdata('msgProduct');
            ?>

            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table table-bordered table-responsive" style="font-size: 14px;">
                  <thead>
                    <tr style="">
                      <td class="align-middle">Event</td>
                      <td>Today <br> <?= date('M d') ?></td>
                      <td><?= date('D', strtotime($today_plus_str_1)) ?> <br> <?= date('M d', strtotime($today_plus_str_1)) ?></td>
                      <td><?= date('D', strtotime($today_plus_str_2)) ?> <br> <?= date('M d', strtotime($today_plus_str_2)) ?></td>
                      <td><?= date('D', strtotime($today_plus_str_3)) ?> <br> <?= date('M d', strtotime($today_plus_str_3)) ?></td>
                      <td><?= date('D', strtotime($today_plus_str_4)) ?> <br> <?= date('M d', strtotime($today_plus_str_4)) ?></td>
                      <td><?= date('D', strtotime($today_plus_str_5)) ?> <br> <?= date('M d', strtotime($today_plus_str_5)) ?></td>
                      <td><?= date('D', strtotime($today_plus_str_6)) ?> <br> <?= date('M d', strtotime($today_plus_str_6)) ?></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="align-middle">Schedule Purchase</td>
                      <td <?= $schedule_purchase_today!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'schedule_pur\', \''. $today .'\')"':'' ?> ><?= $schedule_purchase_today ?></td>

                      <td <?= $schedule_purchase_plus_1!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'schedule_pur\', \''. $today_plus_1 .'\')"':'' ?> ><?= $schedule_purchase_plus_1 ?></td>

                      <td <?= $schedule_purchase_plus_2!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'schedule_pur\', \''. $today_plus_2 .'\')"':'' ?> ><?= $schedule_purchase_plus_2 ?></td>

                      <td <?= $schedule_purchase_plus_3!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'schedule_pur\', \''. $today_plus_3 .'\')"':'' ?> ><?= $schedule_purchase_plus_3 ?></td>

                      <td <?= $schedule_purchase_plus_4!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'schedule_pur\', \''. $today_plus_4 .'\')"':'' ?> ><?= $schedule_purchase_plus_4 ?></td>

                      <td <?= $schedule_purchase_plus_5!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'schedule_pur\', \''. $today_plus_5 .'\')"':'' ?> ><?= $schedule_purchase_plus_5 ?></td>

                      <td <?= $schedule_purchase_plus_6!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'schedule_pur\', \''. $today_plus_6 .'\')"':'' ?> ><?= $schedule_purchase_plus_6 ?></td>
                    </tr>
                    <tr>
                      <td class="align-middle">Prebid Meeting</td>
                      <td <?= $prebid_meeting_today!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'prebid_meet\', \''. $today .'\')"':'' ?> ><?= $prebid_meeting_today ?></td>

                      <td <?= $prebid_meeting_plus_1!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'prebid_meet\', \''. $today_plus_1 .'\')"':'' ?> ><?= $prebid_meeting_plus_1 ?></td>
                      
                      <td <?= $prebid_meeting_plus_2!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'prebid_meet\', \''. $today_plus_2 .'\')"':'' ?> ><?= $prebid_meeting_plus_2 ?></td>
                      
                      <td <?= $prebid_meeting_plus_3!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'prebid_meet\', \''. $today_plus_3 .'\')"':'' ?> ><?= $prebid_meeting_plus_3 ?></td>

                      <td <?= $prebid_meeting_plus_4!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'prebid_meet\', \''. $today_plus_4 .'\')"':'' ?> ><?= $prebid_meeting_plus_4 ?></td>

                      <td <?= $prebid_meeting_plus_5!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'prebid_meet\', \''. $today_plus_5 .'\')"':'' ?> ><?= $prebid_meeting_plus_5 ?></td>

                      <td <?= $prebid_meeting_plus_6!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'prebid_meet\', \''. $today_plus_6 .'\')"':'' ?> ><?= $prebid_meeting_plus_6 ?></td>
                    </tr>
                    <tr>
                      <td class="align-middle">Submission</td>
                      <td <?= $submission_today!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'closed_on\', \''. $today .'\')"':'' ?> ><?= $submission_today ?></td>
                      
                      <td <?= $submission_plus_1!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'closed_on\', \''. $today_plus_1 .'\')"':'' ?> ><?= $submission_plus_1 ?></td>

                      <td <?= $submission_plus_2!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'closed_on\', \''. $today_plus_2 .'\')"':'' ?> ><?= $submission_plus_2 ?></td>
                      
                      <td <?= $submission_plus_3!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'closed_on\', \''. $today_plus_3 .'\')"':'' ?> ><?= $submission_plus_3 ?></td>
                      
                      <td <?= $submission_plus_4!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'closed_on\', \''. $today_plus_4 .'\')"':'' ?> ><?= $submission_plus_4 ?></td>

                      <td <?= $submission_plus_5!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'closed_on\', \''. $today_plus_5 .'\')"':'' ?> ><?= $submission_plus_5 ?></td>
                      
                      <td <?= $submission_plus_6!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'closed_on\', \''. $today_plus_6 .'\')"':'' ?> ><?= $submission_plus_6 ?></td>
                    </tr>
                    <tr>
                      <td class="align-middle">Opening</td>
                      <td <?= $opening_today!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'opening\', \''. $today .'\')"':'' ?> ><?= $opening_today ?></td>

                      <td <?= $opening_plus_1!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'opening\', \''. $today_plus_1 .'\')"':'' ?> ><?= $opening_plus_1 ?></td>

                      <td <?= $opening_plus_2!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'opening\', \''. $today_plus_2 .'\')"':'' ?> ><?= $opening_plus_2 ?></td>

                      <td <?= $opening_plus_3!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'opening\', \''. $today_plus_3 .'\')"':'' ?>  ><?= $opening_plus_3 ?></td>

                      <td <?= $opening_plus_4!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'opening\', \''. $today_plus_4 .'\')"':'' ?>  ><?= $opening_plus_4 ?></td>

                      <td <?= $opening_plus_5!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'opening\', \''. $today_plus_5 .'\')"':'' ?>  ><?= $opening_plus_5 ?></td>

                      <td <?= $opening_plus_6!=''?'class="hover-color-change" onclick="get_tender_for_reminder(\'opening\', \''. $today_plus_6 .'\')"':'' ?>  ><?= $opening_plus_6 ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <hr class="mt-1">
          </div>
        </div>
        <p class="py-1"></p>
      </div>
      
      <hr>

      <p class="h5 text-primary" id="reminder_total_tender"></p>
      <div id="loader_image">
        <img src="<?= base_url('images/loader.gif') ?>" height="50" width="100%">
      </div>
      <div class="content-1" id="search_content">

        <!-- search content will go there -->
      </div>
    </div><!-- end of col-xl-8 -->
    <?= $this->load->view('frontend/quick_link_sidebar') ?>
  </div><!-- end main of row -->
</div> <!-- end of main_content -->
<div class="py-3"></div>