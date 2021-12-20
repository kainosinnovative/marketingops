<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Company';

		$this->load->model('model_company');
	}

    /* 
    * It redirects to the company page and displays all the company information
    * It also updates the company information into the database if the 
    * validation for each input field is successfully valid
    */
	public function index()
	{  
	
        if(!in_array('updateCompany', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
  
	
        if ($this->form_validation->run() == TRUE){ 
            // true case

        	$data = array(
        		'fname' => $this->input->post('firstname'),
        		'lname' => $this->input->post('lastname'),
        		'email' => $this->input->post('EmployeeEmail'),
        		'phone' => $this->input->post('phone'),
        		'Password' => $this->input->post('cpassword')
        	);

        	$update = $this->model_company->update($data, 3);
        	if($update == true) {
        		$this->session->set_tempdata('success', 'Successfully created');
        		redirect('company/', 'refresh');
        	}
        	else {
        		$this->session->set_tempdata('errors', 'Error occurred!!');
        		redirect('company/index', 'refresh');
        	}
        }
        else {

            // false case
            //  $this->data['currency_symbols'] = $this->currency();
        	$this->data['company_data'] = $this->model_company->getCompanyData($_SESSION['id']);
			$this->render_template('company/index', $this->data);			
        }	

		
	}

	public function update()
	{ 
	
	 if(!in_array('updateCompany', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		 if ($this->form_validation->run() == TRUE){ 
		
		$active=$this->input->post('active');
// 			if($active=="on")
// 			{
				$active=1;
// 			}
// 			else
// 			{
// 				$active=0;
//             }
		$datenow=date("Y-m-d");
		$data = array(
        		'EmployeeName' => $this->input->post('username'),
        		'firstname' => $this->input->post('fname'),
        		'lastname' => $this->input->post('lname'),
        		'phone' => $this->input->post('phone'),
				'Password' => $this->input->post('cpassword'),
        		'EmployeeActive' =>$active,
        		'Lastupddt' =>$datenow,
        		'Lastupdby' =>$_SESSION['username'],
        		'EmployeeEmail' => $this->input->post('email')
        	);
			
			
		$update = $this->model_company->update($data, $_SESSION['id']);
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Profile Updated');
        		redirect('company/', 'refresh');
        	}
			else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('company/index', 'refresh');
        	}
	}
	
	else {

            // false case
            //  $this->data['currency_symbols'] = $this->currency();
        	$this->data['company_data'] = $this->model_company->getCompanyData($_SESSION['id']);
			$this->render_template('company/index', $this->data);			
        }	
		
}

}