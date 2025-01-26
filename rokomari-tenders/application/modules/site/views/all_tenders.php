
<div class="container-fluid teder_bg_image ">
<?php echo $this->load->view('all_tenders_page/header_tender_count'); ?>
</div>


<div class="container-fluid">
      <div class="row">
      <?php echo $this->load->view('all_tenders_page/left_sidebar'); ?>
            <div class="col-md-8 px-3">
                  <div class="mb-4">

                  <?php echo $this->load->view('all_tenders_page/advance_search'); ?>  

                  </div>
                  <?php echo $this->load->view('all_tenders_page/tender_card'); ?>  
            </div>
      </div>
</div>

<script>
      $(document).ready(function() {
            $('.select_box_text').select2();
      });
</script>



<script>
      $(document).ready(function(){
            $(document).on('click', '#src', function(e){
                  e.preventDefault();
                  let date= $('#date').val();
                  let order_by = $('#order_by').find(":selected").val();
                  let pro_method = $('#pro_method').find(":selected").val();
                  let call_type = $('#call_type').find(":selected").val();
                  let Inviter = $('#Inviter').find(":selected").val();
                  let tender_on = $('#tender_on').find(":selected").val();
                  let bidding_type = $('#bidding_type').find(":selected").val();
                  let districts = $('#districts').find(":selected").val();
                  
                  
                  $.ajax({
                        url: "site/advance_search",
                        method: "POST",
                        data:{
                              date:date,
                              order_by:order_by,
                              pro_method:pro_method,
                              call_type:call_type,
                              Inviter:Inviter,
                              tender_on:tender_on,
                              bidding_type:bidding_type,
                              districts:districts,
                        },

                        success: function(output)
                              {
                                    $('#search_content').empty();
                                    $('#search_content').html(output);
                              }
                  });
            })
           
      });
</script>