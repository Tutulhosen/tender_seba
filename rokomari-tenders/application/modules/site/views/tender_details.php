
<div class="container-fluid teder_bg_image ">
<?php echo $this->load->view('all_tenders_page/header_tender_count'); ?>
</div>


<div class="container-fluid">
      <div class="row">
      <?php echo $this->load->view('all_tenders_page/left_sidebar'); ?>
            <div class="col-md-8 px-3 pt-4">
                  <div class="advance_back_button">
                        <a href="javascript:window.history.go(-1);" class="back">
                        <svg class="me-2" width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M25.4904 13.8694C25.4889 16.1829 24.5695 18.4013 22.9341 20.0377C21.2987 21.6741 19.0808 22.5948 16.7673 22.5978H1.0625C0.780708 22.5978 0.510457 22.4858 0.311199 22.2866C0.111942 22.0873 0 21.8171 0 21.5353C0 21.2535 0.111942 20.9832 0.311199 20.784C0.510457 20.5847 0.780708 20.4728 1.0625 20.4728H16.7673C18.5076 20.4572 20.1713 19.7549 21.3964 18.5187C22.6215 17.2826 23.3089 15.6127 23.3089 13.8723C23.3089 12.1319 22.6215 10.4619 21.3964 9.2258C20.1713 7.98966 18.5076 7.28737 16.7673 7.27176H4.02794L7.50497 10.1304C7.61344 10.2188 7.70339 10.3277 7.76965 10.451C7.8359 10.5742 7.87717 10.7093 7.89108 10.8485C7.90498 10.9877 7.89125 11.1283 7.85068 11.2622C7.8101 11.3962 7.74347 11.5207 7.65463 11.6288C7.56578 11.7369 7.45646 11.8264 7.33294 11.8921C7.20942 11.9578 7.07413 11.9985 6.93485 12.0118C6.79557 12.0251 6.65503 12.0108 6.5213 11.9696C6.38758 11.9285 6.2633 11.8613 6.15559 11.772L0.387813 7.02951C0.375063 7.01888 0.3655 7.00613 0.353281 6.99498C0.325624 6.96988 0.299375 6.94328 0.274656 6.91529L0.266156 6.90732C0.258719 6.89882 0.249156 6.89245 0.241719 6.88394V6.88076C0.230562 6.86748 0.222594 6.85207 0.2125 6.83826C0.191603 6.81049 0.172271 6.78158 0.154594 6.75166C0.150344 6.74476 0.1445 6.73838 0.140781 6.73095C0.137063 6.72351 0.1275 6.71341 0.122719 6.70385C0.117937 6.69429 0.111562 6.67516 0.105187 6.66135C0.0910258 6.63042 0.0782631 6.59887 0.0669377 6.56679L0.063219 6.55723C0.0412878 6.49651 0.0257965 6.43365 0.0170003 6.36969C0.0138128 6.35004 0.00743784 6.33145 0.00584409 6.31179C0.00425034 6.29213 0.00584409 6.27407 0.00584409 6.25548C0.00584409 6.23688 0.00106242 6.22519 0.00106242 6.20926C0.00106242 6.19332 0.00531284 6.17844 0.00584409 6.16251V6.10673C0.00584409 6.08813 0.0138128 6.06795 0.0170003 6.04829C0.0257655 5.98433 0.0412576 5.92147 0.063219 5.86076L0.0669377 5.85119C0.0786252 5.81879 0.0908437 5.78745 0.105187 5.75663C0.111562 5.74282 0.115281 5.72795 0.122719 5.71413C0.130156 5.70032 0.135469 5.6966 0.140781 5.68704C0.146094 5.67748 0.150344 5.67323 0.154594 5.66632C0.171926 5.63643 0.190903 5.60752 0.211437 5.57973C0.221531 5.56591 0.2295 5.55051 0.240656 5.53723V5.53457C0.251281 5.52129 0.264563 5.51226 0.275719 5.49951C0.300156 5.47294 0.325125 5.44638 0.352219 5.42301C0.364438 5.41185 0.374 5.3991 0.38675 5.38848L0.392062 5.3837L6.15772 0.646008C6.26542 0.556692 6.3897 0.489529 6.52343 0.448373C6.65716 0.407216 6.79769 0.392878 6.93698 0.40618C7.07626 0.419482 7.21154 0.460163 7.33506 0.525888C7.45858 0.591613 7.5679 0.681087 7.65675 0.789173C7.7456 0.89726 7.81222 1.02183 7.8528 1.15573C7.89338 1.28964 7.90711 1.43024 7.8932 1.56946C7.8793 1.70869 7.83803 1.84379 7.77177 1.96702C7.70551 2.09026 7.61556 2.19919 7.50709 2.28757L4.03006 5.14676H16.7694C19.0817 5.14985 21.2984 6.06988 22.9333 7.70506C24.5681 9.34024 25.4878 11.5571 25.4904 13.8694Z" fill="#0B63E5"/>
                        </svg>      
                        Back
                        </a>
                        <a href="<?= base_url('tenders') ?>" class="search">
                              advanced Search
                        </a>
                        
                  </div>
                  <div id="details_div">
                        <div class="govt_tender_div2 container g-0 mt-4">
                              <div class="d-flex align-items-center">
                                    <p class="tender_details_title"><?php echo $tender_details[0]->tender_title ?></span></p>
                              </div>
                              <div class="d-flex align-items-center">
                                    
                                    <div class="ms-4">
                                          <div class="d-flex">
                                                <div>
                                                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.99998 6.11079C9.63197 6.11654 9.26668 6.175 8.91526 6.2844C9.07782 6.57027 9.16437 6.89305 9.16665 7.2219C9.16665 7.47724 9.11635 7.73009 9.01864 7.966C8.92092 8.20191 8.77769 8.41627 8.59713 8.59683C8.41657 8.77738 8.20222 8.92061 7.96631 9.01833C7.7304 9.11605 7.47755 9.16634 7.2222 9.16634C6.89335 9.16406 6.57058 9.07751 6.2847 8.91495C6.05916 9.69717 6.08545 10.5305 6.35984 11.297C6.63424 12.0634 7.14283 12.7241 7.81358 13.1855C8.48433 13.6468 9.28323 13.8854 10.0971 13.8675C10.911 13.8495 11.6986 13.576 12.3484 13.0855C12.9982 12.5951 13.4772 11.9127 13.7176 11.1349C13.9579 10.3571 13.9475 9.52338 13.6877 8.75185C13.4279 7.98032 12.932 7.31009 12.2701 6.83608C11.6083 6.36208 10.8141 6.10833 9.99998 6.11079ZM19.8791 9.49273C17.9962 5.81877 14.2684 3.33301 9.99998 3.33301C5.73158 3.33301 2.00276 5.82051 0.120814 9.49308C0.0413845 9.6502 0 9.82379 0 9.99985C0 10.1759 0.0413845 10.3495 0.120814 10.5066C2.0038 14.1806 5.73158 16.6663 9.99998 16.6663C14.2684 16.6663 17.9972 14.1788 19.8791 10.5063C19.9586 10.3491 20 10.1756 20 9.9995C20 9.82344 19.9586 9.64985 19.8791 9.49273ZM9.99998 14.9997C6.57463 14.9997 3.43436 13.09 1.73852 9.99967C3.43436 6.9094 6.57429 4.99967 9.99998 4.99967C13.4257 4.99967 16.5656 6.9094 18.2614 9.99967C16.566 13.09 13.4257 14.9997 9.99998 14.9997Z"
                                                                  fill="#4CAF50" />
                                                      </svg>
                                                </div>
                                                <p class="publish_views">25461 Views</p>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <div class="mt-3">
                              <p class="tender_details_pragrap">Request for Expression of Interest (EOI) from consultancy firm for individual junior consultant will be provide the assistance in planning, processing, execution, monitoring activites, implementation of the digital interactive knack for DIKKHA project</p>
                        </div>
                        <div class="mt-3">
                              <div class="d-flex align-items-center mb-1">
                                    <p class="tender_details_title2">Tender Publish Date:</p>
                                    <p class="tender_details_pragrap"><?php echo custom_date_maker($tender_details[0]->tender_published_on) ?></p>
                              </div>
                              <div class="d-flex align-items-center mb-1">
                                    <p class="tender_details_title2">Tender ID:</p>
                                    <p class="tender_details_pragrap"> <?php echo $tender_details[0]->tender_manual_id ?></p>
                              </div>
                              <div class="d-flex align-items-center mb-1">
                                    <p class="tender_details_title2">Tender Type:</p>
                                    <p class="tender_details_pragrap"><?php echo tender_type_name_by_id($tender_details[0]->tender_pro_method) ?></p>
                              </div>
                              <div class="d-flex align-items-center mb-1">
                                    <p class="tender_details_title2">Tender Inviter:</p>
                                    <p class="tender_details_pragrap"><?php echo tender_inviter_name_by_id($tender_details[0]->tender_inviter) ?></p>
                              </div>
                              <div class="d-flex align-items-center mb-1">
                                    <p class="tender_details_title2">Published On:</p>
                                    <p class="tender_details_pragrap"><?php echo custom_date_maker($tender_details[0]->tender_published_on) ?> ( <?php echo date_count($tender_details[0]->tender_published_on) ?> ) [<?php echo tender_source_name_by_id($tender_details[0]->tender_source) ?>]</p>
                              </div>
                              <div class="d-flex align-items-center mb-1">
                                    <p class="tender_details_title2">Schedule Purchase By:</p>
                                    <p class="tender_details_pragrap">-</p>
                              </div>
                              <div class="d-flex align-items-center mb-1">
                                    <p class="tender_details_title2">Prebid Meeting Date:</p>
                                    <p class="tender_details_pragrap"><?php echo custom_date_maker($tender_details[0]->tender_prebid_meeting) ?></p>
                              </div>
                              <div class="d-flex align-items-center mb-1">
                                    <p class="tender_details_title2">Closed On Date:</p>
                                    <p class="tender_details_pragrap"><?= custom_date_maker($tender_details[0]->tender_closed_on) ?> (<?= left_day_count(date('Y-m-d'),$tender_details[0]->tender_closed_on);?>  only)</p>
                              </div>
                              <div class="d-flex align-items-center mb-1">
                                    <p class="tender_details_title2">Opening Date:</p>
                                    <p class="tender_details_pragrap">-</p>
                              </div>
                              <div class="d-flex align-items-center mb-1">
                                    <p class="tender_details_title2">Procuring Place:</p>
                                    <p class="tender_details_pragrap">Dhaka</p>
                              </div>
                              <div class="d-flex align-items-center mb-1">
                                    <p class="tender_details_title2">Working Area:</p>
                                    <p class="tender_details_pragrap">Dhaka</p>
                              </div>
                              <div class="d-flex align-items-center mb-1">
                                    <p class="tender_details_title2">Security Amount:</p>
                                    <p class="tender_details_pragrap">See image for details</p>
                              </div>
                              <div class="d-flex align-items-center mb-1">
                                    <p class="tender_details_title2">Document Price:</p>
                                    <p class="tender_details_pragrap">See image for details</p>
                              </div>
                  </div>
                  <div class="d-flex justify-content-center mt-4">
                  <!-- <button class="search">Show the original image</button> -->
                  <a href="<?=  $tender_details[0]->tender_img_url ?>" target="blank" class="btn search">Show the original image</a>
                  </div>
                  </div>
            </div>
      </div>
</div>

