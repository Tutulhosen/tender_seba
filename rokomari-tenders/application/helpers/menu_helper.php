<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('activate_menu_method')) {
    function activate_menu_method($method) {
        // Getting CI class instance.
        $CI = get_instance();
        // Getting router class to active.
        $class = $CI->router->fetch_method();
        return ($class == $method) ? 'current' : '';
    }
}

if(!function_exists('active_menu_class')) {
  	function activate_menu_class($controller) {
	    // Getting CI class instance.
	    $CI = get_instance();
	    // Getting router class to active.
	    $class = $CI->router->fetch_class();
	    return ($class == $controller) ? 'current' : '';
  	}
}

if (!function_exists('backend_activate_menu_method')) {
    function backend_activate_menu_method($method) {
        // Getting CI class instance.
        $CI = get_instance();
        // Getting router class to active.
        $class = $CI->router->fetch_method();
        return ($class == $method) ? 'menu_active' : '';
        // return ($class == $method) ? 'active' : '';  //09-04-18
    }
}

if(!function_exists('backend_active_menu_class')) {
    function backend_activate_menu_class($controller) {
      // Getting CI class instance.
      $CI = get_instance();
      // Getting router class to active.
      $class = $CI->router->fetch_class();
      return ($class == $controller) ? 'active' : '';
    }
}

if(!function_exists('custom_var_dump')) {
    function custom_var_dump($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;
    }
}

if(!function_exists('custom_date_maker')) {
    function custom_date_maker($data) {
        $formatted_date=explode('-',$data);
       
        $month_name_array=[
            '01'=>'January',
            '02'=>'February',
            '03'=>'March',
            '04'=>'April',
            '05'=>'May',
            '06'=>'June',
            '07'=>'July',
            '08'=>'August',
            '09'=>'September',
            '10'=>'October',
            '11'=>'November ',
            '12'=>'December',
        ];
        
        return $month_name_array[$formatted_date[1]].' '.$formatted_date[2].', '.$formatted_date[0];
}

}

if(!function_exists('tender_type_name_by_id')) {
    function tender_type_name_by_id($id) {
 
        $CI = get_instance();
        $CI->load->model('Common_model');
        $result = $CI->Common_model->get_data_by('ts_procurement_methods', 'pro_method_id', $id);
       
        return $result[0]->pro_method_name;
    }
}

if(!function_exists('tender_inviter_name_by_id')) {
    function tender_inviter_name_by_id($id) {
 
        $CI = get_instance();
        $CI->load->model('Common_model');
        $result = $CI->Common_model->get_data_by('ts_inviters', 'inviter_id', $id);
       
        return $result[0]->inviter_name;
    }
}

if(!function_exists('tender_source_name_by_id')) {
    function tender_source_name_by_id($id) {
 
        $CI = get_instance();
        $CI->load->model('Common_model');
        $result = $CI->Common_model->get_data_by('ts_sources', 'source_id', $id);
       
        return $result[0]->source_name;
    }
}

if(!function_exists('date_count')) {
    function date_count($date) {
    
        $date1 = new DateTime(date("Y/m/d"));
        $date2 = new DateTime($date);
        $interval = $date1->diff($date2);
        $result=$interval->y . " years, " . $interval->m." months, ".$interval->d." days ";
        return $result;
    }
}

if(!function_exists('tender_count_by')) {
    function tender_count_by($key, $val) {
    
        $CI = &get_instance();
        $CI->load->model('Common_model');
        $result = $CI->Common_model->get_cat_tender_count($key, $val);
        return (int)$result->total_tender;
    }
}

if(!function_exists('get_inviter_type_by_id')) {
    function get_inviter_type_by_id($id) {
    
        $CI = &get_instance();
        $CI->load->model('Common_model');
        $result = $CI->Common_model->get_data_by('ts_inviters', 'inviter_id', $id);
        switch($result[0]->inviter_type)
        {
              case 1:
                    return "NGO";
                    case 2:
                          return "Govt";
                          case 3:
                                return "Private";    
  
        }
    }
}

if(!function_exists('get_tender_district_by_id')) {
    function get_tender_district_by_id($district_id) {
    
        $CI = &get_instance();
        $CI->load->model('Common_model');
        $result = $CI->Common_model->get_data_by('ts_districts', 'district_id', $district_id);
        return $result[0]->district_name;
    }
}

if(!function_exists('left_day_count')) {
    function left_day_count($start_date,$end_date) {
    
        $days=(strtotime($end_date)-strtotime($start_date))/(60 * 60 * 24);
        if($days>0)
        {
            return $days . ' days left';
        }
        else
        {
            return "Closed";
        }
    }
}

if(!function_exists('tender_count_percent_with_pak')) {
    function tender_count_percent_with_pak($pak_durition) {
    
        if ($pak_durition>0) {
           return ceil($get_tender_count=(10*$pak_durition)/100);
        }
    }
}


if(!function_exists('discover_mgs')) {
    function discover_mgs($userid,$user_pkg) {
    
        

        $is_valid_pkg = false;
      
        if (!empty($user_pkg)) {
           
            $now = time(); 
            $your_date = strtotime($user_pkg->upkg_created_at);
            $datediff = $now - $your_date;
            $day_count=round($datediff / (60 * 60 * 24));
            if($user_pkg->pkg_duration-$day_count>7)
            {
               return 'You are Enjoying '.$user_pkg->pkg_name.' package';
            }
            elseif($user_pkg->pkg_duration-$day_count<7 && $user_pkg->pkg_duration-$day_count>0)
            {
                $difference=$user_pkg->pkg_duration-$day_count;
                return  'Your '.$user_pkg->pkg_name.' package will expire in '.$difference.' days';
            }
            elseif($user_pkg->pkg_duration==$day_count)
            {
              
                return  'Your '.$user_pkg->pkg_name.' package will expire today';
            }
            elseif($user_pkg->pkg_duration<$day_count)
            {
                return  'Your '.$user_pkg->pkg_name.' package is expired . Please renew a package to find more tenders';
                
            }
           
        } else {
            return  'Please choose a package to find more tenders';
        }
    }
}