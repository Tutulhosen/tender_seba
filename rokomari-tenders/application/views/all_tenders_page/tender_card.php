<div id="search_content">

      <?php

      foreach($basic_tenders as $key=>$value)
      {

      ?>
            <div class="govt_tender_div">
                  <div class="govt_tender_div2 container g-0">
                        <div class="d-flex">
                              <a href="javascript:void(0)" class="gov_tender_button"><?=get_inviter_type_by_id($value->tender_inviter)?> Tender</a>
                              <p class="gov_tender_id">ID: <span class="gov_tender_id_span"><?=$value->tender_manual_id?></span></p>
                        </div>
                        <div class="d-flex">
                              <div class="d-flex">
                                    <div>
                                          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.99998 6.11079C9.63197 6.11654 9.26668 6.175 8.91526 6.2844C9.07782 6.57027 9.16437 6.89305 9.16665 7.2219C9.16665 7.47724 9.11635 7.73009 9.01864 7.966C8.92092 8.20191 8.77769 8.41627 8.59713 8.59683C8.41657 8.77738 8.20222 8.92061 7.96631 9.01833C7.7304 9.11605 7.47755 9.16634 7.2222 9.16634C6.89335 9.16406 6.57058 9.07751 6.2847 8.91495C6.05916 9.69717 6.08545 10.5305 6.35984 11.297C6.63424 12.0634 7.14283 12.7241 7.81358 13.1855C8.48433 13.6468 9.28323 13.8854 10.0971 13.8675C10.911 13.8495 11.6986 13.576 12.3484 13.0855C12.9982 12.5951 13.4772 11.9127 13.7176 11.1349C13.9579 10.3571 13.9475 9.52338 13.6877 8.75185C13.4279 7.98032 12.932 7.31009 12.2701 6.83608C11.6083 6.36208 10.8141 6.10833 9.99998 6.11079ZM19.8791 9.49273C17.9962 5.81877 14.2684 3.33301 9.99998 3.33301C5.73158 3.33301 2.00276 5.82051 0.120814 9.49308C0.0413845 9.6502 0 9.82379 0 9.99985C0 10.1759 0.0413845 10.3495 0.120814 10.5066C2.0038 14.1806 5.73158 16.6663 9.99998 16.6663C14.2684 16.6663 17.9972 14.1788 19.8791 10.5063C19.9586 10.3491 20 10.1756 20 9.9995C20 9.82344 19.9586 9.64985 19.8791 9.49273ZM9.99998 14.9997C6.57463 14.9997 3.43436 13.09 1.73852 9.99967C3.43436 6.9094 6.57429 4.99967 9.99998 4.99967C13.4257 4.99967 16.5656 6.9094 18.2614 9.99967C16.566 13.09 13.4257 14.9997 9.99998 14.9997Z" fill="#4CAF50" />
                                          </svg>
                                    </div>
                                    <p class="publish_views"><?=$value->tender_view?> Views</p>
                              </div>
                              <div class="ms-4">
                                    <p class="publish_date">Publish Date <?=custom_date_maker($value->tender_published_on)?></p>
                              </div>
                        </div>
                  </div>
                  <div class="pt-md-4">
                        <p class="gov_tender_pragrap">
                        <?= $value->tender_description ?>

                        </p>
                  </div>
                  <div class="govt_tender_div2 container g-0">
                        <div class="d-flex">
                              <div>
                                    <p class="close_on">Closed On(<?= left_day_count(date('Y-m-d'),$value->tender_closed_on);?> )</p>
                                    <p class="close_on_date"><?=custom_date_maker($value->tender_closed_on)?></p>
                              </div>
                              <div class="ms-5">
                                    <p class="close_on">Procuring Place</p>
                                    <div class="d-flex">
                                          <div>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2481 4.032C15.1278 2.91138 13.6145 2.27205 12.0301 2.25H11.9701C10.3856 2.27173 8.87202 2.91085 7.75148 4.03139C6.63094 5.15193 5.99182 6.66546 5.97009 8.25C5.95059 9.375 6.26709 10.4805 6.87909 11.4255L11.6011 21H12.4006L17.1211 11.4255C17.7346 10.4805 18.0511 9.375 18.0301 8.25C18.008 6.66559 17.3687 5.15229 16.2481 4.032ZM11.8876 3.75L12.0106 3.765L12.1216 3.75C13.2999 3.80132 14.4139 4.3021 15.2344 5.14939C16.0549 5.99668 16.5196 7.12611 16.5331 8.3055C16.5446 9.14254 16.3002 9.96313 15.8326 10.6575L15.8026 10.7085L15.7771 10.761L12.0001 18.4185L8.22459 10.7685L8.19909 10.71L8.16909 10.659C7.70151 9.96463 7.45711 9.14404 7.46859 8.307C7.48138 7.12625 7.94668 5.99539 8.76857 5.14755C9.59046 4.2997 10.7063 3.79948 11.8861 3.75H11.8876ZM12.8056 7.0035C12.6418 6.89398 12.458 6.81779 12.2648 6.77928C12.0716 6.74078 11.8726 6.74071 11.6794 6.77908C11.4861 6.81746 11.3023 6.89352 11.1384 7.00293C10.9746 7.11234 10.8339 7.25296 10.7243 7.41675C10.6148 7.58054 10.5386 7.7643 10.5001 7.95754C10.4616 8.15077 10.4615 8.3497 10.4999 8.54296C10.5383 8.73622 10.6144 8.92004 10.7238 9.0839C10.8332 9.24777 10.9738 9.38848 11.1376 9.498C11.4684 9.71919 11.8735 9.79992 12.2638 9.72242C12.6541 9.64492 12.9976 9.41554 13.2188 9.08475C13.44 8.75396 13.5208 8.34885 13.4433 7.95854C13.3658 7.56823 13.1364 7.22469 12.8056 7.0035ZM10.3051 5.7555C10.6324 5.52543 11.0024 5.36315 11.3933 5.2782C11.7843 5.19326 12.1882 5.18736 12.5815 5.26086C12.9747 5.33436 13.3493 5.48577 13.6832 5.70618C14.017 5.9266 14.3035 6.21156 14.5255 6.54431C14.7476 6.87706 14.901 7.25087 14.9764 7.64374C15.0519 8.03662 15.0481 8.44062 14.9651 8.83198C14.8821 9.22334 14.7217 9.59416 14.4933 9.92261C14.2649 10.2511 13.9731 10.5305 13.6351 10.7445C12.9734 11.1634 12.1742 11.307 11.4081 11.1446C10.6421 10.9822 9.96985 10.5266 9.5351 9.87528C9.10034 9.22394 8.93752 8.42841 9.08139 7.65864C9.22526 6.88886 9.66443 6.20585 10.3051 5.7555Z" fill="#0B63E5" />
                                                </svg>
                                          </div>
                                          <p class="close_on_date"><?=get_tender_district_by_id($value->tender_district)?></p>
                                    </div>
                              </div>
                        </div>
                        <div class="d-flex">
                              <?php
                                    if($is_logged_in && !empty($user_pkg))
                                    {
                                    
                                    ?>
                                    <div class="d-flex pt-3">
                                         
                                          
                                          <?php
                                                if (!empty($fvrt_ten_id)) {
                                                      if (in_array($value->tender_auto_id, json_decode($fvrt_ten_id))) {
                                                            $color='red';
                                                     }else{
                                                            $color='black';
                                                     }
                                                }else{
                                                      $color='black';
                                                }
                                                
                                          ?>
                                          <button value="<?=$value->tender_auto_id?>" id="save_btn_<?=$value->tender_auto_id?>"  class="btn save_btn <?=$color?>" ><i class="fa-solid fa-bookmark "></i></button>  save 
                                    </div>
                                    <?php
                                    }
                              ?>
                              <div class="ms-4 pt-3">
                                    <a href="<?= base_url() . 'site/tenders_details/' . $value->tender_auto_id ?>" class="publish_view_details_btn">View
                                          Details <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path d="M15.5 7.5L20 12M20 12L15.5 16.5M20 12H4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                          </span></a>
                              </div>
                        </div>
                        
                  </div>
            </div>
      <?php
      }
      ?>
                        <?php
                              if ($this->ion_auth->logged_in()) {
                                    ?> 
                                          <!-- <div class="d-flex justify-content-center">
                                                <button id="load_more" class="btn btn-primary m-4">Load More</button>
                                          </div> -->
                                    <?php
                              }
                        ?>
</div>


<script>
          $(document).on('click', '.save_btn', function(e){
                  e.preventDefault();
                  let save_tender_id=$(this).val();
                  $.ajax({
                        type:"GET",
                        url:"site/save_tender/" + save_tender_id,
                        success:function(data)
                        {
                              
                              if($('#save_btn_'+save_tender_id).hasClass('red'))
                              {
                                    $('#save_btn_'+save_tender_id).removeClass("red");
                                    $('#save_btn_'+save_tender_id).addClass("black");
                              }else
                              {
                                    $('#save_btn_'+save_tender_id).removeClass("black");
                                    $('#save_btn_'+save_tender_id).addClass("red"); 
                              }
                  
                              
                        }
                  });
            });
</script>