function get_tender_by_left_tree(id, search_by)
{

  $('#loader_image').show();

  $.ajax({
    type: "POST",
    url: webPath + "site/get_tender_by_left_tree/" + id + "/" + search_by,
    success: function(data)
    {
      var jsonData = $.parseJSON(data);

      $('#search_content').html(jsonData.result);

      $('#total_tender').html(jsonData.total_tender);
      
      $('#details_div').empty();
      $('#details_div').html(jsonData.result);

      $('#no_ten_div').empty();
      $('#no_ten_div').html(jsonData.result);

    },
    complete: function()
    {
      $('#loader_image').hide();
      $('#pagination_nav').hide();
    }
  });
}


//Created: 03-03-18
function get_inviter_by_type(type)
{
  $('#tree_element').hide('show');  //10-04-18

  $.ajax({
    type: "POST",
    url: webPath + "site/get_inviter_by_type/" + type,
    success: function(data)
    {
      $('#tree_element').show('show');  //10-04-18

      $('#tree_element').html(data);
    }
  });
}


//Created: 03-03-18
function left_tree_onkeyup_search_product(search_term)
{
  if(search_term != '' && search_term != 0)
  {
    $.ajax({
      type: "POST",
      url: webPath + "site/get_category_by_search_term/" + search_term,
      success: function(data)
      {
        $('#tree_element').html(data);
      }
    });
  }
  else
  {
    change_tree(1);
  }
}

//04-03-18
function get_tree_element_product(all_or_my)
{
  if(all_or_my == 1)
  {
    change_tree(1);
  }
  else
  {
    $.ajax({
      type: "POST",
      url: webPath + "favorite-product",
      success: function(data)
      {
        $('#tree_element').html(data)
      }
    });
  }
}


//06-03-18
function get_tender_for_reminder(type, date)
{
  $('#loader_image').show();

  if(type != '' && type != 0 && date != '' && date != 0)
  {
    $.ajax({
      type: "POST",
      url: webPath + "tender-reminder/" + type + "/" + date,
      success: function(data)
      {
        // alert(data);
        var jsonData = $.parseJSON(data);

        $('#search_content').html(jsonData.result);
        
        $('#reminder_total_tender').html('Showing ' + jsonData.total_tender + ' Tender');
      },
      complete: function()
      {
        $('#loader_image').hide();
      }
    });
  }
}

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



