<?php 

class Groups extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Call Log';
		$this->load->model('model_products');
		$this->load->model('model_category');
		$this->load->model('model_users');
		$this->load->model('model_groups');
	}

	public function index()
	{
		if(!in_array('viewGroup', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
         // echo $_SESSION['id'];
		$calllog_data = $this->model_groups->getCallLog();
       
		$result = array();
		

		$this->data['calllog_data'] = $calllog_data;
		
		$user_data = $this->model_users->getUserData();

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

			//$group = $this->model_users->getUserGroup($v['id']);
			//$result[$k]['user_group'] = $group;
		}

		$this->data['user_data'] = $result;
		//print_r($data);
		$user_data1 = $this->model_products->getContactData();
 
		$result1 = array();
		foreach ($user_data1 as $k => $v) {

			$result1[$k]['contact_info'] = $v;

					}
		$this->data['contact_data'] = $result1;
		$productcat_data = $this->model_groups->getProductCategory();
		$calltype_data=$this->model_groups->getCallType();
		$callstatus_data=$this->model_groups->getCallStatus();
		//print_R($callstatus_data);
		       
         $group = $this->model_groups->getProductType();
		 $this->data['producttype_group'] = $group;
		$this->data['productcat_data'] = $productcat_data;
	$this->data['calltype_data'] = $calltype_data;
	$this->data['callstatus_data'] = $callstatus_data;
	$calllog_data1="";
	$this->data['calllog_data1']=$calllog_data1;
	
	$city_data1=$this->model_users->getcity();
				//print_r($locality_data);
				
				$this->data['city_data1'] = $city_data1;
				
				$this->data['groupid'] = "";
	
		$this->render_template('groups/index', $this->data);
	

	
	}

	public function create()
	{
		if(!in_array('createGroup', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('CName', 'Contact Name', 'trim|required');
		$this->form_validation->set_rules('Name', 'Customer Name', 'trim|required');
		$this->form_validation->set_rules('mode', 'Mode', 'trim|required');
		$this->form_validation->set_rules('calltype', 'Call Type', 'trim|required');
		$this->form_validation->set_rules('Status', 'Call Status', 'trim|required');
		//$this->form_validation->set_rules('Follow_Up_Date', 'Next Date', 'trim|required');
		$this->form_validation->set_rules('datevisit', 'Visit Date', 'trim|required');
		

        if ($this->form_validation->run() == TRUE) {
            // true case
$producttags= $this->input->post('producttype');
//print_r($skilltags);
		    	$data = array(
			
        		'CustomerId' => $this->input->post('Name'),
        		'ContactId' => $this->input->post('CName'),
				'Call_date'=>$this->input->post('datevisit'),
				'EmployeeId'=>$_SESSION['id'],
        		'EncounterBy' => $this->input->post('mode'),
        		'EncounterType' => $this->input->post('calltype'),
        		'Status' => $this->input->post('Status'),
        		'Follow_Up_Date' => $this->input->post('Follow_Up_Date'),
        		'Notes' => $this->input->post('Notes'),
           	);
              // print_r($data['Follow_Up_Date']);
        	$create = $this->model_groups->create($data,$producttags);
        	if($create == true) {
        		$this->session->set_tempdata('success', 'Successfully created');
        		redirect('groups/', 'refresh');
        	}
        	else {
        		$this->session->set_tempdata('errors', 'Error occurred!!');
        		redirect('groups/create', 'refresh');
        	}
        }
        else {
            $user_data = $this->model_users->getUserData();

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

			//$group = $this->model_users->getUserGroup($v['id']);
			//$result[$k]['user_group'] = $group;
			
			$city_data=$this->model_users->getcity();
				//print_r($locality_data);
				
				$this->data['city_data'] = $city_data;
		}

		$this->data['user_data'] = $result;
		//print_r($data);
		$user_data1 = $this->model_products->getContactData();
 
		$result1 = array();
		foreach ($user_data1 as $k => $v) {

			$result1[$k]['contact_info'] = $v;

					}
		$this->data['contact_data'] = $result1;
		$productcat_data = $this->model_groups->getProductCategory();
		$calltype_data=$this->model_groups->getCallType();
		$callstatus_data=$this->model_groups->getCallStatus();
		//print_R($callstatus_data);
		       
         $group = $this->model_groups->getProductType();
		 $this->data['producttype_group'] = $group;
		$this->data['productcat_data'] = $productcat_data;
	$this->data['calltype_data'] = $calltype_data;
	$this->data['callstatus_data'] = $callstatus_data;
        $this->render_template('groups/create', $this->data);
        }	

		
	}

	public function edit($id = null)
	{
		if(!in_array('updateGroup', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if($id) {

			$this->form_validation->set_rules('CName', 'Contact Name', 'trim|required');
		$this->form_validation->set_rules('Name', 'Customer Name', 'trim|required');
		$this->form_validation->set_rules('mode', 'Mode', 'trim|required');
		$this->form_validation->set_rules('calltype', 'Call Type', 'trim|required');
		$this->form_validation->set_rules('Status', 'Call Status', 'trim|required');
		//$this->form_validation->set_rules('Follow_Up_Date', 'Next Date', 'trim|required');
		$this->form_validation->set_rules('datevisit', 'Visit Date', 'trim|required');
		

			        if ($this->form_validation->run() == TRUE) {
            // true case
$producttags= $this->input->post('producttype');
//print_r($skilltags);
		    	$data = array(
			
        		'CustomerId' => $this->input->post('Name'),
        		'ContactId' => $this->input->post('CName'),
				'Call_date'=>$this->input->post('datevisit'),
				'EmployeeId'=>$_SESSION['id'],
        		'EncounterBy' => $this->input->post('mode'),
        		'EncounterType' => $this->input->post('calltype'),
        		'Status' => $this->input->post('Status'),
        		'Follow_Up_Date' => $this->input->post('Follow_Up_Date'),
        		'Notes' => $this->input->post('Notes'),
           	);

	        	$update = $this->model_groups->edit($data, $id,$producttags);
	        	if($update == true) {
	        		$this->session->set_tempdata('success', 'Successfully updated');
	        		redirect('groups/', 'refresh');
	        	}
				
	        	else {
	        		$this->session->set_tempdata('errors', 'Error occurred!!');
	        		redirect('groups/edit/'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	           $calllog_data1 = $this->model_groups->getCallLog($id);
				
				
			    $this->data['calllog_data1']=$calllog_data1;
				
				
				$calllog_data = $this->model_groups->getCallLog();
				
				
			    $this->data['calllog_data']=$calllog_data;
				$product_data = $this->model_groups->getProductData($id);
	        	
		$this->data['product_data'] = $product_data;
		
			
		$user_data = $this->model_users->getUserData();
 
		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

			//$group = $this->model_users->getUserGroup($v['id']);
			//$result[$k]['user_group'] = $group;
		}

		$this->data['user_data'] = $result;
		//print_r($data);
		$user_data1 = $this->model_products->getContactData();
 
		$result1 = array();
		foreach ($user_data1 as $k => $v) {

			$result1[$k]['contact_info'] = $v;

					}
		$this->data['contact_data'] = $result1;
				$productcat_data = $this->model_groups->getProductCategory();
		$calltype_data=$this->model_groups->getCallType();
		$callstatus_data=$this->model_groups->getCallStatus();
		//print_R($callstatus_data);
		       
         $group = $this->model_groups->getProductType();
		 $this->data['producttype_group'] = $group;
		$this->data['productcat_data'] = $productcat_data;
	$this->data['calltype_data'] = $calltype_data;
	$this->data['callstatus_data'] = $callstatus_data;
	
	$city_data1=$this->model_users->getcity();
	//print_r($locality_data);
	
	$this->data['city_data1'] = $city_data1;
	$this->data['groupid'] = $id;
	
	
						$this->render_template('groups/index', $this->data);	
	        }	
		}
		 else {
	            // false case
	        	
				$this->render_template('users/index', $this->data);	
	        }	

		
	}

	public function delete($id)
	{
		if(!in_array('deleteGroup', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		if($id) {
// 			if($this->input->post('confirm')) {

				
					$delete = $this->model_groups->delete($id);
					if($delete == true) {
		        		$this->session->set_tempdata('success', 'Successfully removed');
		        		redirect('groups/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_tempdata('error', 'Error occurred!!');
		        		redirect('groups/delete/'.$id, 'refresh');
		        	}
					
// 			}	
// 			else {
// 				$this->data['id'] = $id;
// 				$this->render_template('groups/delete', $this->data);
// 			}	
		}
	}
	public function getContactDataid(){
        $Customerid = $this->input->post('id',TRUE);
		$data = $this->model_products->get_contact_data($Customerid)->result();
		//print_r($data);
		echo json_encode($data);
    }






	
	


}