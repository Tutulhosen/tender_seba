<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {
  
    public function register()
	{    
		$this->db->select('*');
		$this->db->where('name', $name);
		$this->db->where('title', $title);
		$this->db->where('status', $status);
        $query = $this->db->get('ts_web_user');  
		return $query;
	}
	
    public function is_user_already_exits($unser_input)
	{
		$this->db->where('webu_email', '!=', NULL);
		$this->db->where('webu_phone', '!=', NULL);
		$this->db->where('webu_email', $unser_input['email']);
		$this->db->or_where('webu_phone', $unser_input['mobile']);
		$this->db->from('ts_web_user');
        $query = $this->db->count_all_results();
		return $query;
	}

	public function getRecord()
	{    
		$this->db->select('id,name');
		$this->db->from($this->db->dbprefix('al_user'));
		$query = $this->db->get()->result();  
		return $query;
	}
	 //  Active Record or Query Builder
	public function runQuery()
	{ 
		//----------- insert single-----------------------------
	/* 	$data = array(
				'name' =>  'third',
				'email' => 'second@gmail.com',
				'phone_no' => '8989676781',
				'password' => '12345'
		);
		$this->db->insert('student',$data);
			echo $this->db->insert_id();
		*/

		//   ----------multiple insert ------------
		/* $data = array(
			array(
					'name' =>  'first',
					'email' => 'first@gmail.com',
					'phone_no' => '8989676781',
					'password' => '12345'
			),
			array(
					'name' =>  'second',
					'email' => 'second@gmail.com',
					'phone_no' => '8989676781',
					'password' => '12345'
			)
		); 
	   $this->db->insert_batch('student', $data);
 */

		//---------- update---------------- 
		
		/* $data = array(
					'name' =>  'LAST',
					'email' => 'second@gmail.com',
					'phone_no' => '8989676781',
					'password' => '12345'
			); 
		$this->db->where('id', 2);
		$this->db->update('student', $data); */ 

		//--------- DELETE ------------------  
			/* $this->db->where('id', '2');
			$this->db->delete('student');
		  */

		  //------------ SELECT -----------------
		/*   $arrayId = array(1,2,3,4);
			$this->db->select('*');
			$this->db->from('student');
			$this->db->join('subject','subject.student_id=student.id','INNER');
			$this->db->where('student.id', '2');
			$this->db->where('student.id !=', '3');
			$this->db->or_where('student.id !=', '4');

			$this->db->where_in('student.id ', $arrayId);
			$this->db->or_where_in('student.id ', $arrayId);
			$this->db->where_not_in('student.id ', $arrayId);
			$this->db->or_where_not_in('student.id ', $arrayId);

			$this->db->like('student.name', 'test'); 
			$this->db->or_like('student.name', 'test');
			$this->db->not_like('student.name', 'test');
			$this->db->or_not_like('student.name', 'test');
			//$this->db->group_by('student.id');
			$this->db->group_by( array('student.id','student.name'));

			$this->db->order_by('student.id','ASC');
			$this->db->order_by('student.name','DESC');
			$this->db->limit(10,1); */

			//-------- set or inside and condition ------------
			/* $this->db->select('*')->from('student')
				->group_start()
						->where('name', 'test')
						->or_group_start()
								->where('id', '2')
								->where('name', 'my')
						->group_end()
				->group_end()
				->where('email', 'test@gmail.com')
				->get();  */
		//	echo "<pre>"; print_r($query); die; 

			echo $this->db->last_query(); die;
	}
	public function registration_insert($data)
	{
		$this->db->insert('ts_web_user',$data);
        if($this->db->insert_id()) 
		{
			return true;
		}
	}
	public function get_all_pakg_list()
	{
		
        // $this->db->where('webu_email', $data['email']);
		// $this->db->where('email_otp', $data['email_otp']);
        // $this->db->get('ts_web_user');
		
		return $this->db
		->select('*')
		->get('ts_packages')
		->result();
        
	}
	public function get_home_page_basic_tender($start=1,$limit,$userid,$international_tender=false)
	{
		
		$start=4*($start-1);
		//tender_sub_category
		//ts_user_cat_list
		$sql="SELECT ts_tenders.tender_auto_id FROM ts_tenders INNER JOIN ts_user_cat_list on ts_tenders.tender_sub_category=ts_user_cat_list.ucat_sub_cat_id WHERE ts_user_cat_list.ucat_user_id = $userid";
		$query = $this->db->query($sql);
        
		$user_cat_tender_id=[];
		foreach($query->result_array() as $key=>$value){
            array_push($user_cat_tender_id,$value['tender_auto_id']);
	   }

		$this->db->select('A.*, B.inviter_name, C.pro_method_name');

    	$this->db->from('ts_tenders AS A');

    	$this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');
    	$this->db->join('ts_procurement_methods AS C', 'A.tender_pro_method = C.pro_method_id');

        if($international_tender)   //03-04-18
        {
            $this->db->where('A.tender_bidding_type', 2);
        }

        if(!empty($user_cat_tender_id))
		{

			$this->db->where_in('A.tender_auto_id', $user_cat_tender_id);
		}

    	$this->db->order_by('A.tender_auto_id', 'DESC');

    	$this->db->limit($limit, $start);
    
    	return $this->db->get()->result();
	}
	public function get_home_page_total_tender()
	{

		return $this->db->get('ts_tenders')->num_rows();
	}
	public function get_search_filter_total_rows($sub_cat, $inviter, $workarea,$userid)
    {
		$sql="SELECT ts_tenders.tender_auto_id FROM ts_tenders INNER JOIN ts_user_cat_list on ts_tenders.tender_sub_category=ts_user_cat_list.ucat_sub_cat_id WHERE ts_user_cat_list.ucat_user_id = $userid";
		$query = $this->db->query($sql);
		$user_cat_tender_id=[];
		foreach($query->result_array() as $key=>$value){
            array_push($user_cat_tender_id,$value['tender_auto_id']);
	   }

    	$this->db->select('A.*, B.inviter_name, C.pro_method_name');

    	$this->db->from('ts_tenders AS A');

    	$this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');
    	$this->db->join('ts_procurement_methods AS C', 'A.tender_pro_method = C.pro_method_id');

    	if($sub_cat != 0)
    	{
    		$this->db->where('A.tender_sub_category', $sub_cat);
    	}

    	if($inviter != 0)
    	{
    		$this->db->where('A.tender_inviter', $inviter);
    	}

    	if($workarea != 0)
    	{
    		$this->db->where('A.tender_district', $workarea);
    	}
		if(!empty($user_cat_tender_id))
		{

			$this->db->where_in('A.tender_auto_id', $user_cat_tender_id);
		}
	
    	return $this->db->get()->num_rows();
    }
	public function get_search_filter_tender($start=1,$limit, $sub_cat, $inviter, $workarea, $order,$userid)
    {
		$sql="SELECT ts_tenders.tender_auto_id FROM ts_tenders INNER JOIN ts_user_cat_list on ts_tenders.tender_sub_category=ts_user_cat_list.ucat_sub_cat_id WHERE ts_user_cat_list.ucat_user_id = $userid";
		$query = $this->db->query($sql);
		$user_cat_tender_id=[];
		foreach($query->result_array() as $key=>$value){
            array_push($user_cat_tender_id,$value['tender_auto_id']);
	   }

         //var_dump($userid);
		 //exit;
		$start=4*($start-1);

    	$this->db->select('A.*, B.inviter_name, C.pro_method_name');

    	$this->db->from('ts_tenders AS A');

    	$this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');
    	$this->db->join('ts_procurement_methods AS C', 'A.tender_pro_method = C.pro_method_id');

    	if($sub_cat != 0)
    	{
    		$this->db->where('A.tender_sub_category', $sub_cat);
    	}

    	if($inviter != 0)
    	{
    		$this->db->where('A.tender_inviter', $inviter);
    	}

    	if($workarea != 0)
    	{
    		$this->db->where('A.tender_district', $workarea);
    	}

    	if($order == 1)
    	{
    		$this->db->order_by('A.tender_auto_id', 'DESC');
    	}
    	else if($order == 2)
    	{
    		$this->db->order_by('A.tender_auto_id', 'ASC');
    	}
    	else if($order == 3)
    	{
    		$this->db->order_by('A.tender_view', 'DESC');
    	}
    	else if($order == 4)
    	{
    		$this->db->order_by('A.tender_closed_on', 'ASC');

            $this->db->where('A.tender_closed_on >=', date('Y-m-d'));
    	}
        
		if(!empty($user_cat_tender_id))
		{

			$this->db->where_in('A.tender_auto_id', $user_cat_tender_id);
		}

    	$this->db->limit($limit, $start);
    
    	return $this->db->get()->result();
    }
	public function get_tender_by($id, $search_by,$start=1,$limit,$userid)
    {
		$sql="SELECT ts_tenders.tender_auto_id FROM ts_tenders INNER JOIN ts_user_cat_list on ts_tenders.tender_sub_category=ts_user_cat_list.ucat_sub_cat_id WHERE ts_user_cat_list.ucat_user_id = $userid";
		$query = $this->db->query($sql);
		$user_cat_tender_id=[];
		foreach($query->result_array() as $key=>$value){
            array_push($user_cat_tender_id,$value['tender_auto_id']);
	   }

         //var_dump($userid);
		 //exit;
		$start=4*($start-1);

        $this->db->select('A.*, B.inviter_name, C.pro_method_name');

        $this->db->from('ts_tenders AS A');

        $this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');
        $this->db->join('ts_procurement_methods AS C', 'A.tender_pro_method = C.pro_method_id');

        $this->db->order_by('A.tender_auto_id', 'DESC');

        if($search_by == 'sub_cat')
        {
            $this->db->where('tender_sub_category', $id);
        }
        else if($search_by == 'inviter')
        {
            $this->db->where('tender_inviter', $id);
        }
        else if($search_by == 'source')
        {
            $this->db->where('tender_source', $id);
        }
        else if($search_by == 'location')
        {
            $this->db->where('tender_district', $id);
        }
        if(!empty($user_cat_tender_id))
		{

			$this->db->where_in('A.tender_auto_id', $user_cat_tender_id);
		}
		
		$this->db->order_by('A.tender_auto_id', 'DESC');

    	$this->db->limit($limit, $start);
     
	    return $this->db->get()->result();
	
		
        
    }
	public function get_tender_by_total_rows($id, $search_by,$userid)
	{
		$sql="SELECT ts_tenders.tender_auto_id FROM ts_tenders INNER JOIN ts_user_cat_list on ts_tenders.tender_sub_category=ts_user_cat_list.ucat_sub_cat_id WHERE ts_user_cat_list.ucat_user_id = $userid";
		$query = $this->db->query($sql);
		$user_cat_tender_id=[];
		foreach($query->result_array() as $key=>$value){
            array_push($user_cat_tender_id,$value['tender_auto_id']);
	   }

      

        $this->db->select('A.*, B.inviter_name, C.pro_method_name');

        $this->db->from('ts_tenders AS A');

        $this->db->join('ts_inviters AS B', 'A.tender_inviter = B.inviter_id');
        $this->db->join('ts_procurement_methods AS C', 'A.tender_pro_method = C.pro_method_id');

        $this->db->order_by('A.tender_auto_id', 'DESC');

        if($search_by == 'sub_cat')
        {
            $this->db->where('tender_sub_category', $id);
        }
        else if($search_by == 'inviter')
        {
            $this->db->where('tender_inviter', $id);
        }
        else if($search_by == 'source')
        {
            $this->db->where('tender_source', $id);
        }
        else if($search_by == 'location')
        {
            $this->db->where('tender_district', $id);
        }
        if(!empty($user_cat_tender_id))
		{

			$this->db->where_in('A.tender_auto_id', $user_cat_tender_id);
		}
		
		return $this->db->get()->num_rows();
	}
}
