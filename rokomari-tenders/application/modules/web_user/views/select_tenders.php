<?php

   if ($this->ion_auth->logged_in()) {
       $user_id=$this->session->userdata('user_id');
       $pck_product_no=$this->Common_model->get_tender_product_count();
       $user_selected_product=$this->Web_user_model->get_user_selected_product_count();
       $user_selected_product_no=count($this->Web_user_model->get_user_selected_product_count());
       $remaining_product_no= $pck_product_no->pkg_no_of_products - $user_selected_product_no;
        
    }

?>

<style>
      button.removeIt {
            height: 26px;
            width: 26px;
            border-radius: 50%;
            background: white;
            color: red;
            text-align: center;
            margin-left: 2%;
            border: 1px solid red;
      }
</style>
<div class="container-fluid teder_bg_image ">

</div>


<div class="container-fluid">
      <div class="row">
      <?php echo $this->load->view('all_tenders_page/left_sidebar'); ?>
            <div class="col-md-8 px-3">
                  
                  <input type="hidden" id="pck_product_no" value="<?=$pck_product_no->pkg_no_of_products?>"><br>
                  <h3 style="color: blue;">You are Enjoying <?=$pck_product_no->pkg_name?> package</h3>
                  <div class="selected_tenders" style="padding: 10px;">
                  <p style="color: red;" >Remaining Selection items: <span class="remaining_items"></span> <span class="pck_products_no"><?=$remaining_product_no?></span></p><br>
                        <?php

                                    if ($remaining_product_no>0) {
                                          ?> 
                                                
                                                      <?php
                                                            foreach ($user_selected_product as $product) {
                                                                  // var_dump($product);
                                                                  ?> 
                                                                        <ul>
                                                                             <li class="selected_product" data-id="<?=$product->sub_cat_id?>" style="padding: 5px;"><?=$product->sub_cat_name?></li>
                                                                        </ul>
                                                                        
                                                                  
                                                                  <?php 
                                                            }
                                                      
                                                      ?>
                                                
                                          
                                          <?php
                                    }
                        
                        ?>
                  </div>
                  <button class="btn btn-primary save_btn" style="margin-left: 0px; display:none">Save</button>
            </div>
      </div>
</div>

<script>

      var id_already_found=[];
     
      var permittated_length=$('#pck_product_no').val();
      $('.selected_product').each(function() {
         var all_prv_data=($(this).attr('data-id'));
         id_already_found.push(all_prv_data);
      });
      
      $(document).ready(function() {
            $('.select_box_text').select2();
            
            $('.accordion_body_a_tag').on('click', function(){
                  let sub_cat_id=$(this).attr('data-SubcatID');
                  let sub_cat_name=$(this).attr('data-SubcatName');
                  let selected_product_id=$('.selected_product').attr('data-id');
                  
                  
                  if($.inArray(sub_cat_id, id_already_found) == -1  && id_already_found.length < permittated_length ) {

                           id_already_found.push(sub_cat_id);
                           $('.selected_tenders').append('<li style="padding:10px" class="all_data" data-id="'+sub_cat_id+'" id="user_sub_cat_'+sub_cat_id+'" >'+sub_cat_name+'<button class="removeIt" data-id="'+sub_cat_id+'">x</button></li>');
                           
                           $('.pck_products_no').hide();
                           $('.remaining_items').text(permittated_length-id_already_found.length);

                  } 
                 
                  if (id_already_found.length >0) {
                        $('.save_btn').show();
                  }
                 
            })
            
      });
      $(document).on('click','.removeIt', function(){
            var data_id=$(this).data('id');
            // console.log(id_already_found);
            id_already_found=$.grep(id_already_found, function(value) {
               return value != data_id;
            });
           $('#user_sub_cat_'+data_id).remove();
           $('.remaining_items').text(permittated_length-id_already_found.length);
          
            if (id_already_found.length == 0) {
                  $('.save_btn').hide();
            }
      })

      $(document).on('click', '.save_btn', function(){
            let sub_cat_id=$('.accordion_body_a_tag').attr('data-SubcatID');
            var data_id=$('#user_sub_cat_'+sub_cat_id+'').data('id');
            
            var all_data_array=[];
            $( ".all_data" ).each(function( index ) {
                  all_data_array.push($( this ).data('id') );
            });
            // $('.selected_product').each(function() {
            //       var all_prv_data=($(this).attr('data-id'));
            //       all_data_array.push(all_prv_data);
            // });

        
            $.ajax({
              
                url: "<?php echo base_url('web_user/add_user_products'); ?>",
                method:"POST",
                data: { ids_array : all_data_array },
                success: function(data)
                {
                 console.log(data);
                  if(data=="success")
                  {
                        window.location.href = '<?php echo base_url('/tenders'); ?>';
                        
                  }
                 
                }
            });



      })
</script>