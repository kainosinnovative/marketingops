<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Customers Contact';
        $this->load->model('model_users');
		$this->load->model('model_products');
		$this->load->model('model_category');
		$this->load->model('model_stores');
	}

    /* 
    * It only redirects to the manage product page
    */
	public function index()
	{
        if(!in_array('viewProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$user_data = $this->model_products->getContactData();
 
		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

			$group = $this->model_users->getUserData($v['CustomerId']);
			$result[$k]['user_group'] = $group;
		}

		$this->data['user_data'] = $result;
		$user_data1=array('CustomerId'=>"",'Name'=>"",'ContactId'=>"",'PhoneNumber'=>"",'Designation'=>"",'EmailId'=>"",'Notes'=>"",'Active_Record'=>"",'CreatedDate'=>"");
	    $user_data2=array('OrgName'=>"",'Faxnumber'=>"",'Website'=>"",'Landline_Number'=>"",'Org_Phonenumber'=>"",
						  'Pincode'=>"",'Address_City'=>"",'Address_locality'=>"",'Adress_Street'=>"",'Active_Record'=>"",
						  'Notes_Abt_Customer'=>"");
						  
		$user_data3 = $this->model_users->getUserData();

		$result = array();
		foreach ($user_data3 as $k => $v) {

			$result[$k]['customer_info'] = $v;

			//$group = $this->model_users->getUserGroup($v['id']);
			//$result[$k]['user_group'] = $group;
		}

		$this->data['user_data3'] = $result;		
					
		
					

	        	$this->data['user_data1'] = $user_data1;
				$this->data['user_data2'] = $user_data2;
				//$this->data['user_data3'] = $user_data3;

		$this->render_template('products/index', $this->data);
	
	}
		
	

    
	public function create()
	{
		if(!in_array('createProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		 $this->form_validation->set_rules('orgname', 'Customer Name', 'trim|required');
		$this->form_validation->set_rules('personname', 'Contact name', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|min_length[10]');
// 		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('designation', 'Designation', 'trim|required');
		
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
        		'Name' => $this->input->post('personname'),
        		'CustomerId' => $this->input->post('orgname'),
        		'Designation' => $this->input->post('designation'),
        		'PhoneNumber' => $this->input->post('phone'),
				'EmailId' => $this->input->post('email'),
				'Notes'=>$this->input->post('notes'),
                'Active_Record' => $active,
				'Lastupdby'=>$_SESSION['username'],
				'Lastupddt'=>$datenow,
				'CreatedDate'=>$this->input->post('contactCreatedate'),
				'CreatedBy'=>$_SESSION['username'],
        	);

        	$create = $this->model_products->create($data);
        	if($create == true) {
				set_time_limit(5);
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
        		redirect('products/', 'refresh');
			}
        		
        // 		redirect('products/', 'refresh');
        	}
        	else {
        		$this->session->set_tempdata('errors', 'Error occurred!!');
        		redirect('products/create', 'refresh');
        	}
        }
        else {
            // false case

        	$user_data = $this->model_users->getUserData();

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

			//$group = $this->model_users->getUserGroup($v['id']);
			//$result[$k]['user_group'] = $group;
		}

		$this->data['user_data'] = $result;
		//print_r($data);
		$this->render_template('products/create', $this->data);
        }	
	}



	

    /*
    * This function is invoked from another function to upload the image into the assets folder
    * and returns the image path
    */
	
	public function update($product_id)
	{      
        if(!in_array('updateProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        if($product_id) {
                

        $this->form_validation->set_rules('personname', 'Contact name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|min_length[10]');
        $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('orgname', 'Organization Name', 'trim|required');
			
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
			
           $datenow=date("Y-M-d");
        	$data = array(
        		'Name' => $this->input->post('personname'),
        		'CustomerId' => $this->input->post('orgname'),
        		'Designation' => $this->input->post('designation'),
        		'PhoneNumber' => $this->input->post('phone'),
				'EmailId' => $this->input->post('email'),
				'Notes'=>$this->input->post('notes'),
                'Active_Record' => $active,
				'Lastupdby'=>$_SESSION['username'],
				'Lastupddt'=>$datenow,
				'CreatedDate'=>$this->input->post('contactCreatedate'),
				'CreatedBy'=>$_SESSION['username'],
        	);
               

           $update = $this->model_products->update($data, $product_id);
            if($update == true) {
                $this->session->set_tempdata('success', 'Successfully updated');
                redirect('products/', 'refresh');
            }
            else {
                $this->session->set_tempdata('errors', 'Error occurred!!');
                redirect('products/update/'.$product_id, 'refresh');
            }
        }
        else {
				$user_data = $this->model_products->getContactData($product_id);
	        	

	        	$this->data['user_data1'] = $user_data;
				$group = $this->model_users->getUserData($user_data['CustomerId']);
				//print_R($group);
			    $this->data['user_data2']=$group;
				//print_R($this->data);
				//$this->data['user_data3']=$group['CustomerId'];
		

				$user_data = $this->model_products->getContactData();
	        	foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

			$group = $this->model_users->getUserData($v['CustomerId']);
			$result[$k]['user_group'] = $group;
		}

		$this->data['user_data'] = $result;
		
		$customer_data = $this->model_users->getUserData();
	        	foreach ($customer_data as $k1 => $v1) {

			$result1[$k1]['customer_info'] = $v1;

			//$group = $this->model_users->getUserGroup($v['id']);
			//$result[$k]['user_group'] = $group;
		}

		$this->data['user_data3'] = $result1;
		
		
		
				$this->render_template('products/index', $this->data);	
        
     }   
		
		}	
		
		
			 else {
	            // false case
	        	$user_data = $this->model_products->getContactData($product_id);
	        	

	        	$this->data['product_data'] = $user_data;
	        	

				$this->render_template('users/index', $this->data);	
	        }	
	}

    /*
    * It removes the data from the database
    * and it returns the response into the json format
    */
	public function remove($product_id)
	{
        if(!in_array('deleteProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
        
        $response = array();
        if($product_id) {
            $delete = $this->model_products->remove($product_id);
            if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed"; 
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Error in the database while removing the product information";
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Refersh the page again!!";
        }

        echo json_encode($response);
	}
public function delete($id)
	{

		if(!in_array('deleteUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if($id) {
// 			if($this->input->post('confirm')) {

				
					$delete = $this->model_products->delete($id);
					if($delete == true) {
		        		$this->session->set_tempdata('success', 'Successfully removed');
		        		redirect('products/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_tempdata('error', 'Error occurred!!');
		        		redirect('products/delete/'.$id, 'refresh');
		        	}

// 			}	
// 			else {
// 				$this->data['id'] = $id;
// 				$this->render_template('products/delete', $this->data);
// 			}	
		}
	}
	function get_autocomplete(){
        if (isset($_POST['term'])) {
			// echo $_GET['term'];
            $result = $this->model_products->search_blog($_POST['term'],$_POST['term1']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->Name;
                echo json_encode($arr_result);
            }
        }
    }
	function getContactDataid(){
        $Customerid = $this->input->post('id',TRUE);
		$data = $this->model_products->get_contact_data($Customerid)->result();
		print_r($data);
        echo json_encode($data);
    }
}