<?php
class Frontend_Controller extends MY_Controller
{
	function __construct ()
	{
		parent::__construct();
		
		$this->data['sufx'] = $this->config->item('url_suffix');	//09-04-18
		
		// Load stuff
		// $this->load->model('page_m');
		
		// Fetch navigation
		// $this->data['menu'] = $this->page_m->get_nested();
		// $this->data['news_archive_link'] = $this->page_m->get_archive_link();
		
		$this->load->model('Site_model');

		// $this->data['service_list'] = $this->Site_model->get_services();
		
		// $this->data['service_footer'] = $this->Site_model->get_footershow('services');
		// $this->data['product_footer'] = $this->Site_model->get_footershow('product');
		// $this->data['address_footer'] = $this->Site_model->get_footer_address_show('contact');

		// Load slide images
        // $this->data['brandLogo'] = $this->Site_model->get_brand_logo();
        // $this->data['subCategoryList'] = $this->Site_model->get_all_sub_category();
        // $this->data['bizConfiguration'] = $this->Site_model->get_business_config(1);
		
		$this->data['meta_title'] = 'Mysoftheaven';
		$this->data['meta_keywords'] = 'mysoftheaven website, mysoft erp';
        $this->data['meta_description'] = 'Mysoftheaven (BD) Ltd. is a diversified offshore IT services company established in 2003. We bring in economic value by employing highly qualified, skilled, resources that ensure accountability at minimal risk. Today, we are a new generation global services company that understands businesses and aims to deliver value to its customers through its software solutions and services. ';

        $this->data['contact_email'] = 'info@mysoftheaven.com';
        $this->data['contact_phone'] = '(+88) 029103637';
        $this->data['domain_title'] = 'mysoftheaven.com';
	}
}