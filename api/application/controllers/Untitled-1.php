$this->data['stat_tender'] = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 1));
$this->data['stat_corrigendum'] = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 2));
$this->data['stat_cancellation'] = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 3));
$this->data['stat_republished'] = sizeof($this->Common_model->get_data_by('ts_tenders', 'tender_call_type', 4));
$this->data['tenders'] = $this->Site_model->get_home_page_basic_tender($config['per_page'], $page, $international_tender);


$this->data['all_sub_categories'] = $this->Common_model->get_data('ts_sub_categories');
$this->data['all_inviters'] = $this->Common_model->get_data('ts_inviters');
$this->data['all_districs'] = $this->Common_model->get_data('ts_districts');
$this->data['all_categories'] = $this->Common_model->get_data('ts_categories', 'category_name', 'ASC');


$all_categories_sub_categories=[];

            $all_categories=$this->Common_model->get_data('ts_categories', 'category_name', 'ASC');
            foreach($all_categories as $key=>$value)
            {
                $cat_sub_cat = $this->Common_model->get_data_by('ts_sub_categories', 'category_id', $value->category_id);
                $temp['category_id']=$value->category_id;
                $temp['category_name']=$value->category_name;
                $temp['category_desc']=$value->category_desc;
                $temp['category_created']=$value->category_created;
                $temp['category_updated']=$value->category_updated;
                $temp['sub_categories']=$cat_sub_cat;
                
                array_push($all_categories_sub_categories,$temp);
            }