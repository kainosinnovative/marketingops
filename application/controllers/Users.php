<?php 

class Users extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Customers';

		$this->load->model('model_users');
		$this->load->model('model_groups');
		$this->load->model('model_stores');
	}

	public function index()
	{

		if(!in_array('viewUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$user_data = $this->model_users->getUserData();

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

			//$group = $this->model_users->getUserGroup($v['id']);
			//$result[$k]['user_group'] = $group;
		}

		$this->data['user_data'] = $result;
		$user_data1=array('OrgName'=>"",'Faxnumber'=>"",'Website'=>"",'Landline_Number'=>"",'Org_Phonenumber'=>"",
						  'Pincode'=>"",'Address_City'=>"",'Address_locality'=>"",'Adress_Street'=>"",'Active_Record'=>"",
						  'Notes_Abt_Customer'=>"");
	        	

	        	$this->data['user_data1'] = $user_data1;
						$locality_data=$this->model_users->getLocality();
				$city_data=$this->model_users->getcity();
				//print_r($locality_data);
				$this->data['locality_data'] = $locality_data;
				$this->data['city_data'] = $city_data;
		$this->render_template('users/index', $this->data);
		//print_r($result);
	}

	public function create()
	{

		if(!in_array('createUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('customername', 'Customer Name', 'required');
		$this->form_validation->set_rules('address1', 'Address-Street', 'trim|required');
		$this->form_validation->set_rules('address2', 'Address-Locality', 'trim|required');
		$this->form_validation->set_rules('city', 'city', 'trim|required');
		$this->form_validation->set_rules('pincode', 'Pincode', 'trim|required|min_length[6]');
		//$this->form_validation->set_rules('phone', 'Contact Number', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('mphone', 'Mobile Number', 'trim|required|min_length[10]');
		//$this->form_validation->set_rules('fax', 'Fax', 'trim|required|min_length[14]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		//$this->form_validation->set_rules('active', 'Active', 'required');
		

      if ($this->form_validation->run() == TRUE) {
            // true case
			$active=$this->input->post('active');
			if($active=="on")
			{
				$active=1;
			}
			else
			{
				$active=0;
            }
			$datenow=date("Y-m-d");
        	$data = array(
        		'OrgName' => $this->input->post('customername'),
        		'Adress_Street' => $this->input->post('address1'),
				'Address_locality' =>$this->input->post('address2'),
				'Address_City' =>$this->input->post('city'),
				'Pincode' => $this->input->post('pincode'),
        		'Landline_Number' => $this->input->post('phone'),
				'Org_Phonenumber' => $this->input->post('mphone'),
        		'Faxnumber' => $this->input->post('fax'),
        		'Website' => $this->input->post('email'),
				'Active_Record' => $active,
				'Notes_Abt_Customer'=>$this->input->post('notes'),
				'CreatedBy'=>$_SESSION['username'],
				'CreatedDate'=>$this->input->post('create_date'),
				'Lastupdby'=>$_SESSION['username'],
				'Lastupddt'=>$datenow,
        	);

        	$create = $this->model_users->create($data);
        	if($create == true) {
        	$this->session->set_tempdata('success', 'Successfully created');
        	
        	$something = $this->input->post('groupform');
        	$something1 = $this->input->post('groupform1');
			if(isset($something)) {
				redirect('groups/create', 'refresh');
			}
			else if(isset($something1)) {
			    $groupformidhidden = $this->input->post('groupformidhidden');
			    if($groupformidhidden == null) {
			        redirect('groups', 'refresh');
			    }
			    else {
			        redirect('groups/edit/'.$groupformidhidden, 'refresh');
			    }
			    
				
			}
			else {
        		redirect('users/', 'refresh');
			}
        	
        // 		redirect('users/', 'refresh');
        	}
        	else {
        		$this->session->set_tempdata('errors', 'Error occurred!!');
        		redirect('users/create');
        	}
        }
     else {
            // false case
           // $this->data['store_data'] = $this->model_stores->getStoresData();
        	
			$locality_data=$this->model_users->getLocality();
			$city_data=$this->model_users->getcity();
			//print_r($locality_data);
			$this->data['locality_data'] = $locality_data;
			$this->data['city_data'] = $city_data;
            $this->render_template('users/create', $this->data);
			
			
        }	

		
	}

	public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}

	public function edit($id = null)
	{

		if(!in_array('updateUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		
	if($id) {
		
			$this->form_validation->set_rules('customername', 'Customer Name', 'required');
		$this->form_validation->set_rules('address1', 'Address-Street', 'trim|required');
		$this->form_validation->set_rules('address2', 'Address-Locality', 'trim|required');
		$this->form_validation->set_rules('city', 'city', 'trim|required');
		$this->form_validation->set_rules('pincode', 'Pincode', 'trim|required|max_length[6]');
		//$this->form_validation->set_rules('phone', 'Contact Number', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('mphone', 'Mobile Number', 'trim|required|min_length[10]');
		//$this->form_validation->set_rules('fax', 'Fax', 'trim|required|min_length[14]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		//$this->form_validation->set_rules('active', 'Active', 'required');


			if ($this->form_validation->run() == TRUE) {
	            // true case
		         $active=$this->input->post('active');
			if($active=="on")
			{
				$active=1;
			}
			else
			{
				$active=0;
            }
			$datenow=date("Y-m-d");
        	$data = array(
        		'OrgName' => $this->input->post('customername'),
        		'Adress_Street' => $this->input->post('address1'),
				'Address_locality' =>$this->input->post('address2'),
				'Address_City' =>$this->input->post('city'),
				'Pincode' => $this->input->post('pincode'),
        		'Landline_Number' => $this->input->post('phone'),
				'Org_Phonenumber' => $this->input->post('mphone'),
        		'Faxnumber' => $this->input->post('fax'),
        		'Website' => $this->input->post('email'),
				'Active_Record' => $active,
				'Notes_Abt_Customer'=>$this->input->post('notes'),
				'Lastupdby'=>$_SESSION['username'],
				'Lastupddt'=>$datenow,

        	);

		        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
		        	if($update == true) {
		        		$this->session->set_tempdata('success', 'Successfully updated');
		        		redirect('users/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_tempdata('errors', 'Error occurred!!');
		        		redirect('users/index/'.$id, 'refresh');
		        	}
		        
		        
		        
	        }
	        else {
	            // false case
	        	$user_data = $this->model_users->getUserData($id);
	        	

	        	$this->data['user_data1'] = $user_data;
				$user_data = $this->model_users->getUserData();
	        	foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

			//$group = $this->model_users->getUserGroup($v['id']);
			//$result[$k]['user_group'] = $group;
		}
		
			
			
		$this->data['user_data'] = $result;
		
				$locality_data=$this->model_users->getLocality();
				$city_data=$this->model_users->getcity();
				//print_r($locality_data);
				$this->data['locality_data'] = $locality_data;
				$this->data['city_data'] = $city_data;
				$this->render_template('users/index', $this->data);	
				
				
	        }	
		}	
		
			 else {
	            // false case

	        	$user_data = $this->model_users->getUserData($id);
	        	

	        	$this->data['user_data'] = $user_data;
	        	 
			
				$this->render_template('users/index', $this->data);	
	        }	

	}	
	


	public function delete($id)
	{

		if(!in_array('deleteUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if($id) {
// 			if($this->input->post('confirm')) {

				
					$delete = $this->model_users->delete($id);
					if($delete == true) {
		        		$this->session->set_tempdata('success', 'Successfully removed');
		        		redirect('users/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_tempdata('error', 'Error occurred!!');
		        		redirect('users/delete/'.$id, 'refresh');
		        	}

// 			}	
// 			else {
// 				$this->data['id'] = $id;
// 				$this->render_template('users/delete', $this->data);
// 			}	
		}
	}

	public function profile()
	{

		if(!in_array('viewProfile', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$user_id = $this->session->userdata('id');

		$user_data = $this->model_users->getUserData($user_id);
		$this->data['user_data'] = $user_data;

		$user_group = $this->model_users->getUserGroup($user_id);
		$this->data['user_group'] = $user_group;

        $this->render_template('users/profile', $this->data);
	}

	public function setting($id=null)
	{
		if(!in_array('updateSetting', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		if($id) {
			
				if($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        	'EmployeeName' => $this->input->post('username'),
		        		'firstname' => $this->input->post('fname'),
		        		'lastname' => $this->input->post('lname'),
		        		'phone' => $this->input->post('phone'),
						'Password' => $password,
						'EmployeeActive' => $this->input->post('active'),
		        		'Lastupddt' =>$datenow,
		        		'Lastupdby' =>$_SESSION['username'],
		        		'EmployeeEmail' => $this->input->post('email'),
			        		
			        	);

			        	$update = $this->model_users->employeeedit($data);
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('users/setting/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/setting/', 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->model_users->getemployeeid($id);
			        	$this->data['user_data'] = $user_data;
			        	$this->render_template('users/setting', $this->data);	
			        }	

		        
	        }
	        else {
	            // false case
	        	$user_data = $this->model_users->getemployeeid($id);
	        	

	        	$this->data['user_data'] = $user_data;
	        	

	           

				$this->render_template('users/setting', $this->data);	
	        }	
		}
	

	function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->model_users->search_blog($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->OrgName;
                echo json_encode($arr_result);
            }
        }
    }
	
	public function getCityDataid(){
        $city_id = $this->input->post('id',TRUE);
		$data = $this->model_users->get_city_data($city_id)->result();
		//print_r($data);
		echo json_encode($data);
    }
    
    
    
    public function loadAllCityData(){
        $city_id = $this->input->post('id',TRUE);
		$data = $this->model_users->getcityCustomerAdd();
		//print_r($data);
		echo json_encode($data);
	}

	
	public function cityadd()
    {
        if($this->input->post('city_name')) {

        $data = array(
            'city_name' => $this->input->post('city_name')
            
        );
		// echo json_encode($data);
		$response=$this->model_users->savecitylist($data);
	}
	else {

		$this->session->set_userdata('cityidsessPopup', $this->input->post('title'));
		
		$data = array(
			'city_id' => $this->input->post('title'),
			'locality_name' => $this->input->post('decs')
            
        );
		// echo json_encode($data);
		$response=$this->model_users->savelocalitylist($data);

	}

        // $this->db->insert('city_list',$data);
	}
	

	function get_autocompleteCityPopup(){
        if (isset($_GET['term'])) {
			// echo $_GET['term'];
            $result = $this->model_users->getcitydata_popupAutoComplete($_GET['term']);
            if (count($result) > 0) {
				// echo $result;
            foreach ($result as $row)
                $arr_result[] = $row->city_name;
                echo json_encode($arr_result);
            }
        }
	}


	// function get_autocompleteLocalityPopup(){
    //     if (isset($_GET['term'])) {
	// 		$queryString = $this->input->get('q');
	// 		// echo $_GET['term'];
    //         $result = $this->model_users->getLocalitydata_popupAutoComplete($_GET['term'],$queryString);
    //         if (count($result) > 0) {
	// 			// echo $result;
    //         foreach ($result as $row)
    //             $arr_result[] = $row->locality_name;
    //             echo json_encode($arr_result);
    //         }
    //     }
	// }
	
	function get_autocompleteLocalityPopup(){
        $Customerid = $this->input->post('id',TRUE);
		$data = $this->model_users->getLocalitydata_popupAutoComplete($Customerid)->result();
		// print_r($data);
        echo json_encode($data);
    }
	

	public function getLocalityPopup(){
		if (isset($_POST['term'])) {
            $result = $this->model_users->search_locality($_POST['term'],$_POST['term1']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->locality_name;
                echo json_encode($arr_result);
            }
        }
	  }
    
}