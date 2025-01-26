$('#per_info_details_btn').click(function(e){
  e.preventDefault();

  var user_name = $('#user_name').val();
  var user_phone = $('#user_phone').val();
  var user_email = $('#user_email').val();
  var user_designation = $('#user_designation').val();
  var user_company_name = $('#user_company_name').val();
  var user_company_type = $('#user_company_type').val();
  // var user_password = $('#user_password').val();
  // var user_confirm_password = $('#user_confirm_password').val();
  // var user_agree = $('#user_agree').is(':checked');

  var required = true;

  if(user_name == '' || user_name == 0)
  {
    $('#user_name').css("border", '1px solid red');
    required = false;
  }
  else
  {
    $('#user_name').css('border', '1px solid rgb(223, 223, 223)');
  }

  if(user_phone == '' || user_phone == 0)
  {
    $('#user_phone').css("border", '1px solid red');
    required = false;
  }
  else
  {
    $('#user_phone').css('border', '1px solid rgb(223, 223, 223)');
  }

  if(user_email == '' || user_email == 0)
  {
    $('#user_email').css("border", '1px solid red');
    required = false;
  }
  else
  {
    $('#user_email').css('border', '1px solid rgb(223, 223, 223)');
  }

  if(user_designation == '' || user_designation == 0)
  {
    $('#user_designation').css("border", '1px solid red');
    required = false;
  }
  else
  {
    $('#user_designation').css('border', '1px solid rgb(223, 223, 223)');
  }

  if(user_company_name == '' || user_company_name == 0)
  {
    $('#user_company_name').css("border", '1px solid red');
    required = false;
  }
  else
  {
    $('#user_company_name').css('border', '1px solid rgb(223, 223, 223)');
  }

  if(user_company_type == '' || user_company_type == 0)
  {
    $('.select2-selection').css("border", '1px solid red');
    required = false;
  }
  else
  {
    $('#user_company_type').css('border', '1px solid rgb(223, 223, 223)');
  }

  if(required == true)
  {
    $('#personal_info_details_tbl').submit();
  }
});
//end of per_info_details_btn click

$('#per_info_btn').click(function(e){
  e.preventDefault();

  var user_name = $('#user_name').val();
  var user_phone = $('#user_phone').val();
  var user_email = $('#user_email').val();
  var user_password = $('#user_password').val();
  var user_confirm_password = $('#user_confirm_password').val();
  var user_agree = $('#user_agree').is(':checked');

  var required = true;

  if(user_name == '' || user_name == 0)
  {
    $('#user_name').css("border", '1px solid red');
    required = false;
  }
  else
  {
    $('#user_name').css('border', '1px solid rgb(223, 223, 223)');
  }

  if(user_phone == '' || user_phone == 0)
  {
    $('#user_phone').css("border", '1px solid red');
    required = false;
  }
  else
  {
    $('#user_phone').css('border', '1px solid rgb(223, 223, 223)');
  }

  if(user_email == '' || user_email == 0)
  {
    $('#user_email').css("border", '1px solid red');
    required = false;
  }
  else
  {
    $('#user_email').css('border', '1px solid rgb(223, 223, 223)');
  }

  if(user_password == '' || user_password == 0)
  {
    $('#user_password').css("border", '1px solid red');
    required = false;
  }
  else
  {
    $('#user_password').css('border', '1px solid rgb(223, 223, 223)');
  }

  if(user_confirm_password == '' || user_confirm_password == 0)
  {
    $('#user_confirm_password').css("border", '1px solid red');
    required = false;
  }
  else
  {
    $('#user_confirm_password').css('border', '1px solid rgb(223, 223, 223)');
  }

  if(user_password != user_confirm_password)
  {
    $('#user_confirm_password').css("border", '1px solid red');
    $('#user_password').css("border", '1px solid red');

    $('#password_mismatch_text').show();

    required = false;
  }
  else
  {
    $('#password_mismatch_text').hide();
  }

  if(user_agree == false)
  {
    $('#user_agree_err_msg').show();
    required = false;
  }
  else
  {
    $('#user_agree_err_msg').hide();
  }

  if(required == true)
  {
    $('#personal_info_tbl').submit();
  }
});
//end of per_info_btn click

//Created: 08-03-18
function addorremvfavcat(tenid)
{
  $.ajax({
    type: "POST",
    url: webPath + "add-favorite-tender/" + tenid,
    success: function(data)
    {
      if(data == 1)
      {
        var iconsele = $('#favcaticon' + tenid + ' i');
        if(iconsele.hasClass('fa fa-star'))
        {
          iconsele.removeClass('fa fa-star');
          iconsele.addClass('fa fa-times');

          $('#tender_title' + tenid).prepend('<i class="fa fa-star" style="color: #ff0000;"></i> ');
        }
        else
        {
          iconsele.removeClass('fa fa-times');
          iconsele.addClass('fa fa-star');

          $('#tender_title' + tenid + ' i').remove();
        }
      }
      else
        console.log(data);
    }
  });
}