<?php 

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();


		$this->data['page_title'] = 'Dashboard';
		
		$this->load->model('model_products');
		$this->load->model('model_orders');
		$this->load->model('model_users');
		$this->load->model('model_stores');
	}

	public function index()
	{
       if($this->input->post('fromdate') && $this->input->post('todate'))
	   {
		 $fromdate=  $this->input->post('fromdate');
		 $todate=$this->input->post('todate');
		 $all=$this->input->post('employeename');
		// echo $all;
		 
	   }
	   else
	   {
		   $fromdate=date("Y-m-d"); 
		    $todate=date("Y-m-d"); 
			$all="ALL";
	   }
		$this->data['total_person'] = $this->model_groups->countTotalPerson($fromdate,$todate);
		$this->data['total_phone'] = $this->model_groups->countTotalPhone($fromdate,$todate);
		$this->data['total_cold'] = $this->model_groups->countTotalCold($fromdate,$todate);
		$this->data['total_warm'] = $this->model_groups->countTotalWarm($fromdate,$todate);
        $this->data['total_hot'] = $this->model_groups->countTotalHot($fromdate,$todate);
		$this->data['total_customers'] = $this->model_users->countTotalUsers($fromdate,$todate);
		$this->data['total_new'] = $this->model_users->countTotalNewCustomers($fromdate,$todate);
		$this->data['total_contact']=$this->model_users->countTotalContact($fromdate,$todate);
	    $this->data['total_newcontact']=$this->model_users->countTotalNewContact($fromdate,$todate);
		
		if($all == "ALL")
		{
		$this->data['calllog_data']=$this->model_groups->getCallLogdata($fromdate,$todate);
		$this->data['total_person'] = $this->model_groups->countTotalPerson($fromdate,$todate);
		$this->data['total_phone'] = $this->model_groups->countTotalPhone($fromdate,$todate);
		$this->data['total_cold'] = $this->model_groups->countTotalCold($fromdate,$todate);
		$this->data['total_warm'] = $this->model_groups->countTotalWarm($fromdate,$todate);
        $this->data['total_hot'] = $this->model_groups->countTotalHot($fromdate,$todate);
		$this->data['total_customers'] = $this->model_users->countTotalUsers($fromdate,$todate);
		$this->data['total_new'] = $this->model_users->countTotalNewCustomers($fromdate,$todate);
	    $this->data['total_contact']=$this->model_users->countTotalContact($fromdate,$todate);
	    $this->data['total_newcontact']=$this->model_users->countTotalNewContact($fromdate,$todate);
		
$this->data['newuserlist'] = $this->model_users->getNewuserlist1($fromdate,$todate);

$this->data['newContactlist'] = $this->model_users->getNewcontactlist1($fromdate,$todate);
		
		}
		else
		{
			//echo $all;
		$this->data['calllog_data']=$this->model_groups->getCallLogdataById($fromdate,$todate,$all);
		$this->data['total_person'] = $this->model_groups->countTotalPersonById($fromdate,$todate,$all);
		$this->data['total_phone'] = $this->model_groups->countTotalPhoneById($fromdate,$todate,$all);
		$this->data['total_cold'] = $this->model_groups->countTotalColdById($fromdate,$todate,$all);
		$this->data['total_warm'] = $this->model_groups->countTotalWarmById($fromdate,$todate,$all);
        $this->data['total_hot'] = $this->model_groups->countTotalHotById($fromdate,$todate,$all);
		$this->data['total_customers'] = $this->model_users->countTotalUsersById($fromdate,$todate,$all);
		$this->data['total_new'] = $this->model_users->countTotalNewCustomersById($fromdate,$todate,$all);
		$this->data['total_contact']=$this->model_users->countTotalContactById($fromdate,$todate,$all);
     	$this->data['total_newcontact']=$this->model_users->countTotalNewContactById($fromdate,$todate,$all);
		
	   $this->data['newuserlist'] = $this->model_users->getNewuserlistById1($fromdate,$todate,$all);
	   
	   $this->data['newContactlist'] = $this->model_users->getNewcontactlistById1($fromdate,$todate,$all);
		}
		
	$this->data['product_data']=$this->model_groups->getProductDataByDate($fromdate,$todate);
		//print_R($this->data);
		$this->data['employee_list']=$this->model_groups->getAllEmployee();
//print_r($this->data);
		$this->render_template('dashboard', $this->data);
	}
	
}