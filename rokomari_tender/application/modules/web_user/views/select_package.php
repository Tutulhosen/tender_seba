<div class="pt-1"></div>
<div class="mt-1"></div>

<div class="py-2"></div>
<div class="main_content container">

    <div class="row">
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12">
            <div class="content-1" id="search_content">
                <div class="content-2" style="background-color: #f3f3f3; border:1px solid #dfdfdf;">
                    <p class="h6 px-3 pt-3 text-center">Choose Your Package</p>
                    <div class="text-justify px-3 py-1">
                        <hr class="mt-1">
                        <div class="row">
                            <?php 
                            foreach($all_pkg as $key=>$value)
                            {
                                ?>
                                <div class="col-md-4">
                                <div class="card m-1">
                                <img src="<?=$value->pkg_logo_path?>" class="card-img-top w-100" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title" id="card_title_<?=$value->pkg_id?>"><?=$value->pkg_name?></h5>
                                    <p class="card-text">Price: <?=$value->pkg_price?></small></p>
                                    <p class="card-text">No of Products <?=$value->pkg_no_of_products?></small></p>
                                    <p class="card-text">Description: <?=$value->pkg_description?></p>
                                    <button class="btn buy_pkg btn-primary" id="<?=$value->pkg_id?>">Buy Now</button>
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
        </div><!-- end of col-xl-8 -->
        <?= $this->load->view('frontend/quick_link_sidebar') ?>
    </div><!-- end main of row -->
</div> <!-- end of main_content -->
<div class="py-3"></div>     


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
  $(document).ready(function() {
    

    $('.buy_pkg').click(function() {
      var id = $(this).attr('id');
      
      if(id == '' || id == 0)
        return;
       
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Web_user/buy_package'); ?>",
        data: { pkg_id : id },
        success: function(data)
        {
            
           alert('Thank You For Buying'+$('#card_title_'+id).html());
           location.reload();
        }
      });
    });

    //procuring division  //06-03-18
   
  });

  function readURL(input){
    if(input.files && input.files[0])
    {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#tender_image_pre').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>