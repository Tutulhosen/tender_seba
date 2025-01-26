<style>
 .custom_card{
    width: 100%;
    height: 100%;
    flex-shrink: 0;
    border-radius: 20px;
    border: 1px solid var(--p-1, #0B63E5);
    background: var(--gray-00, #FFF);
 }
 .background-image-header{
    height: 100% !important;
 }
 .icon{
    height: 80px;
    width: 80px;
    border-radius: 10px;
    background-color: #E7F5E8;
    position: relative;
 }
 .icon img{
    position: absolute;
    top: 20%;
    left: 20%;
 }
 .start_brn {
    width: 153px;
    height: 50px;
    border: 1px solid #0B63E5;
    text-align: center;
    padding: 10px;
    border-radius: 10px;
    font-size: 18px;
}
.package_details ul{
    list-style: none;
    padding-left: 0px;
}
.package_details ul li{
    padding: 5px;
    
}
.package_details img{

    /* display: flex; */
    padding: 5px;
    align-items: flex-start;
    gap: 10px;
    border-radius: 100px;
    background: var(--success-50, #E7F5E8);
    
}
.package_details span{
    padding-right: 5px;
}
</style>
<div class="container-fluid background-image-header ">
      <div class="row teder_bg_row">
         
            <div class="col-md-12 px-3">
              <div class="content-1" id="search_content">
                  <div class="content-2">
                  <h6 class=" px-3 pt-3 text-center text-<?=$pkg_message_color?>" style="background-color: white; width:60%; margin:auto; padding-bottom:5px;border-radius: 15px; opacity:.7;"><?=$pkg_message?></h6><br>
                      <div class="p-2 bg-white w-50 m-auto" style="border-radius: 15px; opacity:.7;">
                            <h3 class=" px-3 pt-3 text-center" style="color: #0B63E5; ">Choose Your Package</h3>
                      </div>
                      <div class="text-justify px-3 py-1">
                          <hr class="mt-1">
                          <div class="row">
                              <?php 
    
                              foreach($all_pkg as $key=>$value)
                              {
                                
                                 if($key == 0 && $duration>=$pkg_duration)
                                 {
                                   continue;
                                 }
                                    ?>

                                    <div class="col-md-4 mb-3">
                                       <div class="card custom_card p-3">
                                          <div class="card-body">
                                              <div class="row">
                                                  <div class="col-md-3">
                                                      <!-- <div class="icon"><img style="position:absolute" src="<?=$value->pkg_logo_path?>" alt=""></div> -->
                                                      <div class="icon"><img style="position:absolute" src="assets/icon/RocketLaunch.svg" alt=""></div>
                                                  </div>
                                                  
                                                  <div class="col-md-1"></div>
                                                  <div class="col-md-8 pt-3"><h1 style="color:#0B63E5">$<?=$value->pkg_price?><span class="h5" style="color:black">/par month</span></h1></div>
                                              </div><br>
                                              <h3><?=$value->pkg_name?></h3>
                                              <p>In ornare ligula lorem, sit amet faucibus velit vehicula eget. </p>
                                                  <br>
                                              <div class="start_brn">
                                                  <a href="<?php base_url() ?>web_user/buy_package?id=<?= $value->pkg_id ?>" class="buy_pkg">Get Started <img src="assets/icon/ArrowRight.svg" alt=""></a>
                                              </div>
                                              <br>
                                              <div class="package_details">
                                                      <ul>
                                                          <li> <span><img src="assets/icon/Check.svg" alt=""></span> User Dashboard</li>
                                                          <li> <span><img src="assets/icon/Check.svg" alt=""></span> Post 3 Ads per week</li>
                                                          <li> <span><img src="assets/icon/Check.svg" alt=""></span> Multiple images & videos</li>
                                                          <li> <span><img src="assets/icon/Check.svg" alt=""></span> Basic customer support</li>
                                                          <li> <span><img src="assets/icon/Check.svg" alt=""></span> Featured ads</li>
                                                          <li> <span><img src="assets/icon/Check.svg" alt=""></span> Special ads badge</li>
                                                          <li> <span><img src="assets/icon/Check.svg" alt=""></span> Call to Action in Every Ads</li>
                                                          <li> <span><img src="assets/icon/Check.svg" alt=""></span> Max 12 team members</li>
                                                          
                                                          
                                                      </ul>
                                              </div>
                                          </div>
                                       </div>
                                    </div>
                                    
                                    <?php
                                  

                              }
                              ?>
                          </div>
                          <p class="pt-1"></p>
                          <hr class="mt-3">
                      </div>
                  </div>
                  <p class="py-1"></p>
              </div>
            </div>
           
      </div>
</div>
<script>


    // $(document).ready(function(){
    //     $('.buy_pkg').click(function() {
    //     var id = $(this).attr('id');

    //         $.ajax({
    //             type: "POST",
    //             url: "<?php echo base_url('Web_user/buy_package'); ?>",
    //             data: { pkg_id : id },
    //             success: function(data)
    //             {
                    
    //             alert('Thank You For Buying'+$('#card_title_'+id).html());
    //             location.reload();
    //             }
    //         });
    //     });
    // })



</script>