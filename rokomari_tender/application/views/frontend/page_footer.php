    <div class="pt-2"></div>
    <div class="rt_footer bg-primary py-3">
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <p class="h6 ">About Rokomari Tender</p>
            <p class="text-whit text-justify pr-5">This is a Software Development Company established in 2001, named Ultimate Information Architect. Ultimate Information Architect Limited (UIAL) is a specialized sdfdffdfdfd software development company</p>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <p class="h6 ">Info Center </p>
            <ul class="list-unstyled">
              <li><i class="fa fa-angle-double-right fa-fw"></i>Pro</li>
              <li><i class="fa fa-angle-double-right fa-fw"></i>Contact</li>
              <li><i class="fa fa-angle-double-right fa-fw"></i>Terms and Conditions</li>
              <li><i class="fa fa-angle-double-right fa-fw"></i>Privacy Policy</li>
              <li><i class="fa fa-angle-double-right fa-fw"></i>Nulla volutpat</li>
            </ul>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <p class="h6 ">Useful Link </p>
            <ul class="list-unstyled">
              <li><i class="fa fa-angle-double-right fa-fw"></i>Pro</li>
              <li><i class="fa fa-angle-double-right fa-fw"></i>Contact</li>
              <li><i class="fa fa-angle-double-right fa-fw"></i>Terms and Conditions</li>
              <li><i class="fa fa-angle-double-right fa-fw"></i>Privacy Policy</li>
              <li><i class="fa fa-angle-double-right fa-fw"></i>Nulla volutpat</li>
            </ul>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <p class="h6 ">Contact Us </p>
            <ul class="list-unstyled">
              <li><i class="fa fa-paper-plane fa-fw pr-4"></i>19-B/2-C & 2-D, Block-F, 5th Floor, <span class="pl-4"></span> Ring Road, Shymoli, Dhaka-1207.</li>
              <li><i class="fa fa-phone fa-fw pr-4"></i>02-9143366, 02-55020230</li>
              <li><i class="fa fa-envelope fa-fw pr-4"></i>info@rokomari-tender</li>
              <li><span class="font-weight-bold "> Connect Us</span></li>
              <li class="pl-4"><i class="fa fa-facebook-square fa-2x"></i> <i class="fa fa-twitter-square fa-2x"></i></li>
            </ul>
          </div>
        </div>
      </div>
      <nav class="nav text-center container">
        <a class="nav-link active text-white" href="#">Home</a>
        <a class="nav-link text-white" href="#">About Us</a>
        <a class="nav-link text-white" href="#">Services</a>
        <a class="nav-link text-white" href="#">How it works</a>
        <a class="nav-link text-white" href="#">Pro</a>
        <a class="nav-link text-white" href="#">Link</a>
        <a class="nav-link text-white" href="#">Amenities</a>
        <a class="nav-link text-white" href="#">News & Articles</a>
      </nav>
    </div>
    <div class="bg-dark text-center text-white py-2">Copyright @ 2018 The Rokomari Tender</div>
    <!-- end of footer -->
    <div class="back-to-top cd-top" style="position: fixed; right: 20px; bottom: 10px;">
      <button type="button" class="btn btn-primary btn-sm"><a href="#0" class="cd-top"><i class="fa fa-angle-double-up text-white"></i>
      </a></button>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <!-- back to top -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>

    <script src="<?= base_url() ?>assets/js/rokomari_tender.js"></script>
    <script src="<?= base_url() ?>assets/js/rokomari_search_tender.js"></script>
    <script src="<?=base_url();?>assets/js/advance_search.js"></script>

    <script src="<?= base_url() ?>assets/js/modernizr.js"></script>
    <script src="<?= base_url() ?>assets/js/select2.full.min.js"></script>

    <!-- bootstrap datepicker 10-03-18 -->
    <script src="<?=base_url();?>assets/js/datepicker/bootstrap-datepicker.js"></script>
    
    <script type="text/javascript">
      $(document).ready(function() {
        $('.select2').select2();

        $('#loader_image').hide();
        $('#user_agree_err_msg').hide();
        $('#password_mismatch_text').hide();
        $('#left_tree_search_inviter').hide();  //030318

        $('#tree_element').on('click', '.hover-color-change', function(e) {
          // $(this).find('ul').css({display: 'block'});
          
          if($(e.target).hasClass('list-unstyled') == false)
          {
            $(this).find('ul').toggle("slow");

          // $(this).siblings('li').find('ul').hide('slow');

            if($(this).find('i:first').hasClass('fa-plus-square'))
            {
              $(this).find('i:first').removeClass('fa-plus-square');

              $(this).find('i:first').addClass('fa-minus-square');
            }
            else
            {
              $(this).find('i:first').removeClass('fa-minus-square');

              $(this).find('i:first').addClass('fa-plus-square');            
            }
          }
        });

        $('#ten_day_sign_up').click(function() {
          window.location.href = "<?php echo base_url('user-registration') . $sufx ?>";
        });

        //Date picker 10-03-18
        $('#datepicker').datepicker({
          format: "dd-mm-yyyy",
          autoclose: true
        });
        
        $('.datepicker').datepicker({
          format: "dd-mm-yyyy",
          autoclose: true
        });

      });

      function change_tree(treeid)
      {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('site/get_tree/'); ?>" + treeid,
          success: function(data)
          {
            $('#tree_element').html(data);

            if(treeid == 1)
            {
              $('#left_tree_search_inviter').hide();  //030318
              $('#left_tree_search_product').show();  //030318
              $('#my_prd_or_all_id input:first').prop('checked', true);   //040318
              $('#my_prd_or_all_id').show();   //040318

              $('#tree_sel_product').removeClass('bg-danger bg-warning');
              $('#tree_sel_product').addClass('bg-warning');

              $('#tree_sel_inviter').removeClass('bg-warning bg-secondary');
              $('#tree_sel_inviter').addClass('bg-secondary');

              $('#tree_sel_source').removeClass('bg-warning bg-info');
              $('#tree_sel_source').addClass('bg-info');

              $('#tree_sel_location').removeClass('bg-warning bg-dark');
              $('#tree_sel_location').addClass('bg-dark');

              $('#tree_sel_product').html('<strong>Product</strong>');

              $('#tree_sel_inviter').html('Inviter');
              $('#tree_sel_source').html('Source');
              $('#tree_sel_location').html('Location');
            }
            else if(treeid == 2)
            {
              $('#my_prd_or_all_id').hide();   //040318

              $('#left_tree_search_inviter').show();  //030318
              $('#left_tree_search_product').hide();  //030318
              $('#left_tree_search_inviter input:first').prop('checked', true);   //030318

              $('#tree_sel_inviter').removeClass('bg-secondary bg-warning');
              $('#tree_sel_inviter').addClass('bg-warning');

              $('#tree_sel_product').removeClass('bg-warning bg-danger');
              $('#tree_sel_product').addClass('bg-danger');

              $('#tree_sel_source').removeClass('bg-warning bg-info');
              $('#tree_sel_source').addClass('bg-info');

              $('#tree_sel_location').removeClass('bg-warning bg-dark');
              $('#tree_sel_location').addClass('bg-dark');

              $('#tree_sel_inviter').html('<strong>Inviter</strong>');

              $('#tree_sel_product').html('Product');
              $('#tree_sel_source').html('Source');
              $('#tree_sel_location').html('Location');
            }
            else if(treeid == 3)
            { 
              $('#my_prd_or_all_id').hide();   //040318

              $('#left_tree_search_inviter').hide();  //030318
              $('#left_tree_search_product').hide();  //030318

              $('#tree_sel_source').removeClass('bg-info bg-warning');
              $('#tree_sel_source').addClass('bg-warning');
              
              $('#tree_sel_inviter').removeClass('bg-warning bg-secondary');
              $('#tree_sel_inviter').addClass('bg-secondary');

              $('#tree_sel_product').removeClass('bg-warning bg-danger');
              $('#tree_sel_product').addClass('bg-danger');

              $('#tree_sel_location').removeClass('bg-warning bg-dark');
              $('#tree_sel_location').addClass('bg-dark');

              $('#tree_sel_source').html('<strong>Source</strong>');

              $('#tree_sel_inviter').html('Inviter');
              $('#tree_sel_product').html('Product');
              $('#tree_sel_location').html('Location');
            }
            else if(treeid == 4)
            {
              $('#my_prd_or_all_id').hide();   //040318
              
              $('#left_tree_search_inviter').hide();  //030318
              $('#left_tree_search_product').hide();  //030318

              $('#tree_sel_location').removeClass('bg-dark bg-warning');
              $('#tree_sel_location').addClass('bg-warning');

              $('#tree_sel_source').removeClass('bg-warning bg-info');
              $('#tree_sel_source').addClass('bg-info');
              
              $('#tree_sel_inviter').removeClass('bg-warning bg-secondary');
              $('#tree_sel_inviter').addClass('bg-secondary');

              $('#tree_sel_product').removeClass('bg-warning bg-danger');
              $('#tree_sel_product').addClass('bg-danger');

              $('#tree_sel_location').html('<strong>Location</strong>');

              $('#tree_sel_inviter').html('Inviter');
              $('#tree_sel_product').html('Product');
              $('#tree_sel_source').html('Source');
            }
          }
        });
      }

      function show_details(tenid)
      {
        window.open("<?php echo base_url('tender-details/'); ?>" + tenid, '_blank');
        // window.open("<?php echo base_url('site/show_details/'); ?>" + tenid, '_blank');
      }

      function search_filter()
      {
        var srch_prd = $('#srch_prd').val();
        var srch_invtr = $('#srch_invtr').val();
        var srch_workarea = $('#srch_workarea').val();
        var srch_new = $('#srch_new').val();

        if(srch_prd == '')
          srch_prd = 0;

        if(srch_invtr == '')
          srch_invtr = 0;

        if(srch_workarea == '')
          srch_workarea = 0;

        if(srch_new == '')
          srch_new = 0;

        if(srch_prd == 0 && srch_invtr == 0 && srch_workarea == 0 && srch_new == 0)
        {
          window.location.href = "<?php echo base_url('site'); ?>";
        }
        else
        {
          window.location.href = "<?php echo base_url('site/search_filter/'); ?>" + srch_prd + '/' + srch_invtr + '/' + srch_workarea + '/' + srch_new;
        }
      }

      //Created: 22-02-18
      function add_tender_my_list(subcatid, subcatname)
      {
        var total_user_cat = 0; //06-03-18

        if($('#all_sub_cat' + subcatid + ' input[type=checkbox]').is(':checked'))
        {
          $('#all_sub_cat' + subcatid + ' input[type=checkbox]').prop('checked', false);

          if($('#user_cat_list #user_sub_cat' + subcatid).length != 0)
          {
            $('#user_sub_cat' + subcatid).remove();
          }
        }
        else
        {
          total_user_cat = $('[name="user_sub_cat_name[]"]:checked').length;  //06-03-18
          if(total_user_cat != 50)  //06-03-18
          {
            $('#all_sub_cat' + subcatid + ' input[type=checkbox]').prop('checked', true);

            if($('#user_cat_list #user_sub_cat' + subcatid).length == 0)
            {
              $('#user_cat_list').append('<li class="hover-color-change" id="user_sub_cat'+subcatid+'" ><div class="row"><div class="col-md-11">'+subcatname+'</div><div class="col-md-1"><input type="checkbox" name="user_sub_cat_name[]" value="'+subcatid+'" checked></div></div></li>');
            }
            else
            {
              $('#user_sub_cat' + subcatid).remove();
            }
          }
          else
          {
            alert('You reached to your limit!');
          }
        }

        total_user_cat = $('[name="user_sub_cat_name[]"]:checked').length;  //06-03-18
        $('#total_user_cat').html(total_user_cat);  //06-03-18

      }
      //end of add_tender_my_list


      $.fn.extend({
        treed: function (o) {
      
          var openedClass = 'glyphicon-minus-sign';
          var closedClass = 'glyphicon-plus-sign';
      
          if (typeof o != 'undefined'){
            if (typeof o.openedClass != 'undefined'){
              openedClass = o.openedClass;
            }
            if (typeof o.closedClass != 'undefined'){
              closedClass = o.closedClass;
            }
          };
      
          //initialize each of the top levels
          var tree = $(this);
          tree.addClass("tree");
          tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
              if (this == e.target) {
                var icon = $(this).children('i:first');
                icon.toggleClass(openedClass + " " + closedClass);
                $(this).children().children().toggle();
              }
            })
            branch.children().children().toggle();
          });
          //fire event from the dynamically added icon
          tree.find('.branch .indicator').each(function(){
            $(this).on('click', function () {
              $(this).closest('li').click();
            });
          });
          //fire event to open branch if the li contains an anchor instead of text
          tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
              $(this).closest('li').click();
              e.preventDefault();
            });
          });
          //fire event to open branch if the li contains a button instead of text
          tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
              $(this).closest('li').click();
              e.preventDefault();
            });
          });
        }
      });

      //Initialization of treeviews
      $('#tree1').treed();

      $('#tree2').treed({openedClass:'glyphicon-folder-open', closedClass:'glyphicon-folder-close'});

      $('#tree3').treed({openedClass:'glyphicon-chevron-right', closedClass:'glyphicon-chevron-down'});

    </script>
  </body>
</html>