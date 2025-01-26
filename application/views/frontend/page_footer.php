<div class="footer">
        <p>২০১৭ © জেলা পরিষদ কার্যালয়, নাটোর । কারিগরি সহায়তায় : <a href="http://mysoftheaven.com/" >Mysoftheaven (BD) Ltd.</a></p>
    </div>
  </div>
  <script src='<?=base_url();?>fwedget/js/jquery.min.js'></script>
  <script src="<?=base_url();?>fwedget/js/bootstrap-3.1.1.min.js"></script>
  <script src="<?=base_url();?>fwedget/js/bootstrap-filestyle.min.js"></script>
  <script src="<?=base_url();?>fwedget/js/index.js"></script>
  <script type="text/javascript">
      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result).width(94).height(90);
                $('#blah2').attr('src', e.target.result).width(94).height(90);
            };

            reader.readAsDataURL(input.files[0]);
        }
      }

      function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#academic_certificate').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
      }

      function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#dob_certificate').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
      }

      function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#testimonial').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
      }

        function readURL4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#academic_certificate2').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
      }
  </script>
  <script type="text/javascript">

      $('#preview').click(function() {
          $('#first_name').html($('.first_name').val());
          $('#father_name').html($('.father_name').val());
          $('#mother_name').html($('.mother_name').val());
          $('#father_nid').html($('.father_nid').val());
          $('#mother_nid').html($('.mother_nid').val());
          $('#mobile').html($('.mobile').val());
          $('#day').html($('.day').val());
          $('#month').html($('.month').val());
          $('#year').html($('.year').val());

          $('#current_edu_institute').html($('.current_edu_institute').val());
          $('#current_edu_class').html($('.current_edu_class').val());
          $('#current_edu_year').html($('.current_edu_year').val());
          $('#current_edu_division').html($('.current_edu_division').val());
          $('#current_edu_sl').html($('.current_edu_sl').val());

          $('#application_exam_name').html($('.application_exam_name').val());
          $('#application_exam_year').html($('.application_exam_year').val());
          $('#application_exam_gpa').html($('.application_exam_gpa').val());
          $('#application_comment').html($('.application_comment').val());

          $('#permanent_village').html($('.permanent_village').val());
          $('#permanent_post_office').html($('.permanent_post_office').val());
          $('#permanent_union').html($('.permanent_union').val());
          $('#permanent_district').html($('.permanent_district').val());
          $('#communication_address').html($('.communication_address').val());
         
           if (document.getElementById('gender-male').checked) {
              $('#capable_your_family').html('হ্যাঁ');
           }

           if (document.getElementById('gender-female').checked) {
              $('#capable_your_family').html('না');
           }


      });

  </script>

  <script>
      $(":file").filestyle({input: false});
  </script>

  </body>
</html>
