<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
  
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
	public function verify_email_otp($data)
	{
		
        // $this->db->where('webu_email', $data['email']);
		// $this->db->where('email_otp', $data['email_otp']);
        // $this->db->get('ts_web_user');
		
		$data=$this->db
		->select('*')
		->where('webu_email',$data['email'])
		->where('email_otp',$data['email_otp'])
		->get('ts_web_user')
		->result();

        if ( sizeof($data)> 0) {
            $token_data['status'] =true;
			$token_data['webu_id'] =$data[0]->webu_id;
            $token_data['webu_full_name'] =$data[0]->webu_full_name;
            $token_data['webu_email'] = $data[0]->webu_email;
			$token_data['webu_phone'] = $data[0]->webu_phone;
			//webu_status
			$webu_status_update_data = array(
				'webu_status' => 1,
				);
		
		$this->db->where('webu_id',$data[0]->webu_id);
		$this->db->update('ts_web_user', $webu_status_update_data);


           return $token_data;
        } else {
			$token_data['status'] =false;
			return $token_data;
        }
	}
	public function is_user_exits_login($data)
	{
		
       
	   $email=$data["email"];
		$sql="SELECT * FROM `ts_web_user` WHERE webu_email='$email' limit 1";    
        $query = $this->db->query($sql);
		
        if(!empty($query->row())){
			$is_found_user_email['flag']=true;
		    $is_found_user_email['info']=$query->row();
		}
		else
		{
			$is_found_user_email['flag']=false;
		    $is_found_user_email['info']='';
		}
		
		return  $is_found_user_email;
	}
	public function update_otp_login($data)
	{
           
		$this->db->where('webu_email', $data['email']);
		$this->db->update('ts_web_user', array('email_otp' => $data['email_otp']));
	}
	public function package_select($data)
	{
		$insertdata=[
			'upkg_user_id'=>$data['userid'],
			'upkg_pkg_id'=>$data['package_id'],
			'upkg_created_at'=>date('Y-m-d')
		  ];
	  
		if($this->Common_model->save('ts_user_pkg_list', $insertdata)){
          
			return $data=$this->db
		    ->select('*')
		    ->where('pkg_id',$data['package_id'])
		    ->get('ts_packages')
		    ->row();
		
			
		}
	}
	public function select_user_cat_post($data)
	{

		foreach($data['request_sub_categories'] as $key=>$value)
		{
			$insertdata=[
				'ucat_user_id'=>$data['userid'],
				'ucat_sub_cat_id'=>$value,
			  ];

			  if(!$this->Common_model->save('ts_user_cat_list', $insertdata)){
				return false;
			  };
		}
		
		return true;
	}
}
