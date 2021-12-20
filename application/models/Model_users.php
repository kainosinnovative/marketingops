<?php 

class Model_users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUserData($userId = null) 
	{
		//echo $userId;
		if($userId) {
			$sql = "SELECT * FROM customerlist WHERE CustomerId = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
			//print_r($query->row_array());
		}

		$sql = "SELECT * FROM customerlist WHERE CustomerId != ? ORDER BY OrgName";
		$query = $this->db->query($sql, array(1));
		//print_r($query->result_array());
		return $query->result_array();
		
	}
	
	public function getemployeeid($userId = null)    
	{
		//echo $userId;
		if($userId) {
			$sql = "SELECT * FROM employeelist WHERE id  = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
			print_r($query->row_array());
		}

		$sql = "SELECT * FROM employeelist WHERE id  != ?";
		$query = $this->db->query($sql, array(1));
		//print_r($query->result_array());
		return $query->result_array();
		
	}

	public function getUserGroup($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM user_group WHERE user_id = ?";
			$query = $this->db->query($sql, array($userId));
			$result = $query->row_array();

			$group_id = $result['group_id'];
			$g_sql = "SELECT * FROM groups WHERE id = ?";
			$g_query = $this->db->query($g_sql, array($group_id));
			$q_result = $g_query->row_array();
			return $q_result;
		}
	}

	public function create($data = '')
	{

		if($data) {
			$create = $this->db->insert('customerlist', $data);

			$user_id = $this->db->insert_id();

			

			return ($create == true ) ? true : false;
		}
	}

	public function edit($data = array(), $id = null)
	{
		$this->db->where('CustomerId', $id);
		$update = $this->db->update('customerlist', $data);

		
			
		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('CustomerId', $id);
		$delete = $this->db->delete('customerlist');
		return ($delete == true) ? true : false;
	}

	public function countTotalUsers($fromdate,$todate)
	{
	    $sql="SELECT distinct(CustomerId) FROM marketingcalllog WHERE Call_Date>='$fromdate' and Call_Date<='$todate'
		        AND CustomerId NOT IN (SELECT CustomerId FROM customerlist WHERE CreatedDate>='$fromdate' AND CreatedDate<='$todate')";
		//$sql = "SELECT distinct(CustomerId) FROM marketingcalllog WHERE Call_Date>='$fromdate' and Call_Date<='$todate'
		  //      AND CustomerId NOT IN (SELECT CustomerId FROM customerlist WHERE CreatedDate>='$fromdate' AND CreatedDate<='$todate') group by CustomerId";
		$query = $this->db->query($sql);
		

		
		return $query->num_rows();
		
	}
	public function countTotalContact($fromdate,$todate){
	    
	    
	     $sql="SELECT distinct(ContactId) FROM marketingcalllog WHERE Call_Date>='$fromdate' and Call_Date<='$todate'
		        AND ContactId NOT IN (SELECT ContactId FROM contactperson WHERE CreatedDate>='$fromdate' AND CreatedDate<='$todate')";
		//$sql = "SELECT distinct(CustomerId) FROM marketingcalllog WHERE Call_Date>='$fromdate' and Call_Date<='$todate'
		  //      AND CustomerId NOT IN (SELECT CustomerId FROM customerlist WHERE CreatedDate>='$fromdate' AND CreatedDate<='$todate') group by CustomerId";
		$query = $this->db->query($sql);
		

		
		return $query->num_rows();
	    
	    
	}
	public function countTotalNewCustomers($fromdate,$todate)
	{
		
	//	$sql = "SELECT * FROM customerlist WHERE CreatedDate>='$fromdate' AND CreatedDate<='$todate'";
	$sql = "select distinct(CustomerId) from marketingcalllog where Call_Date BETWEEN '$fromdate' and '$todate'  and CustomerId in
	   (SELECT CustomerId FROM customerlist WHERE CreatedDate BETWEEN '$fromdate' and '$todate')";
	   
	   
	   
		$query = $this->db->query($sql);
		

		
		return $query->num_rows();
		
		
	}
	public function countTotalNewContact($fromdate,$todate)
	{
	    
	    	$sql = "select distinct(ContactId) from marketingcalllog where Call_Date BETWEEN '$fromdate' and '$todate'  and ContactId in
	   (SELECT ContactId FROM contactperson WHERE CreatedDate BETWEEN '$fromdate' and '$todate')";
	   
	   
	   
		$query = $this->db->query($sql);
		

		
		return $query->num_rows();
	    
	    
	}
	
	public function countTotalUsersById($fromdate,$todate,$all)
	{
	    $sql1="SELECT firstname from employeelist WHERE id=".$all."";
		$query1= $this->db->query($sql1);
		$name=$query1->result_array();
		foreach ($name as $key=>$value)
		{
			$newname=$value['firstname'];
		}
		//echo $all;
	    $sql="SELECT distinct(CustomerId) FROM marketingcalllog WHERE Call_Date>='$fromdate' and Call_Date<='$todate' and EmployeeId=".$all." 
		        AND CustomerId NOT IN (SELECT CustomerId FROM customerlist WHERE CreatedDate>='$fromdate' AND CreatedDate<='$todate' and Lastupdby='$newname' )";
		//$sql = "SELECT distinct(CustomerId) FROM marketingcalllog WHERE Call_Date>='$fromdate' and Call_Date<='$todate'
		  //      AND CustomerId NOT IN (SELECT CustomerId FROM customerlist WHERE CreatedDate>='$fromdate' AND CreatedDate<='$todate') group by CustomerId";
		 // var_dump($sql);
		$query = $this->db->query($sql);
		return $query->num_rows();
		
	}
	
	public function countTotalContactById($fromdate,$todate,$all)
	{
	    $sql1="SELECT firstname from employeelist WHERE id=".$all."";
		$query1= $this->db->query($sql1);
		$name=$query1->result_array();
		foreach ($name as $key=>$value)
		{
			$newname=$value['firstname'];
		}
		//echo $all;
	    $sql="SELECT distinct(ContactId) FROM marketingcalllog WHERE Call_Date>='$fromdate' and Call_Date<='$todate' and EmployeeId=".$all." 
		        AND ContactId NOT IN (SELECT ContactId FROM contactperson WHERE CreatedDate>='$fromdate' AND CreatedDate<='$todate' and Lastupdby='$newname' )";
		//$sql = "SELECT distinct(CustomerId) FROM marketingcalllog WHERE Call_Date>='$fromdate' and Call_Date<='$todate'
		  //      AND CustomerId NOT IN (SELECT CustomerId FROM customerlist WHERE CreatedDate>='$fromdate' AND CreatedDate<='$todate') group by CustomerId";
		 // var_dump($sql);
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	public function countTotalNewCustomersById($fromdate,$todate,$all)
	{
		$sql1="SELECT firstname from employeelist WHERE id=".$all."";
		$query1= $this->db->query($sql1);
		$name=$query1->result_array();
		foreach ($name as $key=>$value)
		{
			$newname=$value['firstname'];
		}
		//echo $newname;
	   // $sql = "select CustomerId from customerlist where CreatedDate BETWEEN '$fromdate' and '$todate' and Lastupdby='$newname' and CustomerId in
	   // (SELECT CustomerId FROM marketingcalllog WHERE Call_Date BETWEEN '$fromdate' and '$todate' and EmployeeId=".$all.")";
	   $sql = "select  distinct (CustomerId) from marketingcalllog where Call_Date BETWEEN '$fromdate' and '$todate' and EmployeeId=".$all." and CustomerId in
	   (SELECT CustomerId FROM customerlist WHERE CreatedDate BETWEEN '$fromdate' and '$todate' and Lastupdby='$newname')";
	   
// 		$sql = "SELECT * FROM customerlist WHERE CreatedDate>='$fromdate' AND CreatedDate<='$todate' and Lastupdby='$newname' ";
		$query = $this->db->query($sql);
		
	
		
		return $query->num_rows();
		
		
	}
	
		public function countTotalNewContactById($fromdate,$todate,$all)
		{
		    
		   	$sql1="SELECT firstname from employeelist WHERE id=".$all."";
		$query1= $this->db->query($sql1);
		$name=$query1->result_array();
		foreach ($name as $key=>$value)
		{
			$newname=$value['firstname'];
		}
		//echo $newname;
	   // $sql = "select CustomerId from customerlist where CreatedDate BETWEEN '$fromdate' and '$todate' and Lastupdby='$newname' and CustomerId in
	   // (SELECT CustomerId FROM marketingcalllog WHERE Call_Date BETWEEN '$fromdate' and '$todate' and EmployeeId=".$all.")";
	   $sql = "select  distinct (ContactId) from marketingcalllog where Call_Date BETWEEN '$fromdate' and '$todate' and EmployeeId=".$all." and ContactId in
	   (SELECT ContactId FROM contactperson WHERE CreatedDate BETWEEN '$fromdate' and '$todate' and Lastupdby='$newname')";
	   
// 		$sql = "SELECT * FROM customerlist WHERE CreatedDate>='$fromdate' AND CreatedDate<='$todate' and Lastupdby='$newname' ";
		$query = $this->db->query($sql);
		
	
		
		return $query->num_rows(); 
		    
		    
		}
	
public function getNewuserlistById1($fromdate,$todate,$all) {
	    $sql1="SELECT firstname from employeelist WHERE id=".$all."";
		$query1= $this->db->query($sql1);
		$name=$query1->result_array();
		foreach ($name as $key=>$value)
		{
			$newname=$value['firstname'];
		}
	
	   $sql = "select CustomerId,id,Call_Date from marketingcalllog where Call_Date BETWEEN '$fromdate' and '$todate' and EmployeeId=".$all." and CustomerId in
	   (SELECT CustomerId FROM customerlist WHERE CreatedDate BETWEEN '$fromdate' and '$todate' and Lastupdby='$newname')";
	   

		$query = $this->db->query($sql);
		
						$name=$query->result_array();
						// dictionary created - use custmerid for key and date or multiple date for value
		$arrNewCustomer = array();
		foreach ($name as $key=>$value)
		{
			$customerid = $value['CustomerId'];
			if (!array_key_exists($customerid, $arrNewCustomer)) {
				$arrNewCustomer[$customerid] = $value['Call_Date'];
			}
			else {
				$ids = $arrNewCustomer[$customerid];
				$arrNewCustomer[$customerid] = $ids . "," .$value['Call_Date'];
			}
			
		
		  
		}

		return $arrNewCustomer;
	}



	public function getNewuserlist1($fromdate,$todate) {
	    
	
	   $sql = "select CustomerId,id,Call_Date from marketingcalllog where Call_Date BETWEEN '$fromdate' and '$todate' and CustomerId in
	   (SELECT CustomerId FROM customerlist WHERE CreatedDate BETWEEN '$fromdate' and '$todate')";
	   

		$query = $this->db->query($sql);
		
		// 				$name=$query->result_array();
		// $arrNewCustomer = array();
		// foreach ($name as $key=>$value)
		// {
		//     array_push($arrNewCustomer,$value['id']);
		  
		// }

		$name=$query->result_array();
		$arrNewCustomer = array();
		foreach ($name as $key=>$value)
		{
			$customerid = $value['CustomerId'];
			if (!array_key_exists($customerid, $arrNewCustomer)) {
				$arrNewCustomer[$customerid] = $value['Call_Date'];
			}
			else {
				$ids = $arrNewCustomer[$customerid];
				$arrNewCustomer[$customerid] = $ids . "," .$value['Call_Date'];
			}

		}
		return $arrNewCustomer;
	}
	
	function search_blog($title){
        $this->db->like('OrgName', $title , 'both');
        $this->db->order_by('OrgName', 'ASC');
        $this->db->limit(10);
        return $this->db->get('customerlist')->result();
    }
	
	public function getLocality()
	 {
		 $sql = "SELECT * FROM locality_list ORDER BY locality_id";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
		 
	 }
	 
	 public function getcity()
	 {
		 $sql = "SELECT * FROM city_list ORDER BY city_id";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
		 
	 }
	 
	 function get_city_data($city_id)
	{
		$query = $this->db->get_where('locality_list', array('city_id' => $city_id ));
        return $query;
	}
	public function employeeedit($data = array(), $id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('employeelist', $data);

		
			
		return ($update == true) ? true : false;	
	}
	
	
	
	// cityadd

	function savecitylist($data)
	{
		// print_r($data);
        $this->db->insert('city_list',$data);
        return true;
	}


	function savelocalitylist($data)
	{
		// print_r($data);
        $this->db->insert('locality_list',$data);
        return true;
	}

	
	function getcityCustomerAdd()
	{
		$query = $this->db->get('city_list');
		// $query = $this->db->get('city_list');
		return $query->result_array();
	}



	function getcitydata_popupAutoComplete($title){
		// echo $title;
        $this->db->like('city_name', $title , 'both');
        $this->db->order_by('city_name', 'ASC');
        // $this->db->limit(10);
        return $this->db->get('city_list')->result();
	}


	// function getLocalitydata_popupAutoComplete($title,$cityid){
	// 	// echo $title;
    //     $this->db->like('locality_name', $title , 'both');
	// 	$this->db->order_by('locality_name', 'ASC');
	// 	$query = $this->db->get_where('locality_list', array('city_id' => $cityid ))->result();
	// 	return $query;
    //     // $this->db->limit(10);
    //     // return $this->db->get('locality_list')->result();
	// }
	
	function getLocalitydata_popupAutoComplete($Customerid)
	{
		$query = $this->db->get_where('locality_list', array('city_id' => $Customerid));
        return $query;
		
	}


	function search_locality($title,$id){
        $this->db->like('locality_name', $title , 'both');
        $this->db->order_by('locality_name', 'ASC');
		// $this->db->limit(10);
		//$id = $this->session->userdata('cityidsessPopup');
		
		// return $this->db->get('locality_list')->result();
		$query = $this->db->get_where('locality_list', array('city_id' => $id ))->result();
		return $query;
    }

	
    public function getNewcontactlist1($fromdate,$todate) {
	    
	
		$sql = "select ContactId,id,Call_Date from marketingcalllog where Call_Date BETWEEN '$fromdate' and '$todate' and ContactId in
		(SELECT ContactId FROM contactperson WHERE CreatedDate BETWEEN '$fromdate' and '$todate')";
		
 
		 $query = $this->db->query($sql);
		 
		 
 
		 $name=$query->result_array();
		 $arrNewContact = array();
		 foreach ($name as $key=>$value)
		 {
			 $contactid = $value['ContactId'];
			 if (!array_key_exists($contactid, $arrNewContact)) {
				 $arrNewContact[$contactid] = $value['Call_Date'];
			 }
			 else {
				 $ids = $arrNewContact[$contactid];
				 $arrNewContact[$contactid] = $ids . "," .$value['Call_Date'];
			 }
 
		 }
		 return $arrNewContact;
	 }



	 public function getNewcontactlistById1($fromdate,$todate,$all) {
	    $sql1="SELECT firstname from employeelist WHERE id=".$all."";
		$query1= $this->db->query($sql1);
		$name=$query1->result_array();
		foreach ($name as $key=>$value)
		{
			$newname=$value['firstname'];
		}
	
	   $sql = "select ContactId,id,Call_Date from marketingcalllog where Call_Date BETWEEN '$fromdate' and '$todate' and EmployeeId=".$all." and ContactId in
	   (SELECT ContactId FROM contactperson WHERE CreatedDate BETWEEN '$fromdate' and '$todate' and Lastupdby='$newname')";
	   
    // var_dump($sql);
		$query = $this->db->query($sql);
		
						$name=$query->result_array();
						// dictionary created - use custmerid for key and date or multiple date for value
						$name=$query->result_array();
						$arrNewContact = array();
						foreach ($name as $key=>$value)
						{
							$contactid = $value['ContactId'];
							if (!array_key_exists($contactid, $arrNewContact)) {
								$arrNewContact[$contactid] = $value['Call_Date'];
							}
							else {
								$ids = $arrNewContact[$contactid];
								$arrNewContact[$contactid] = $ids . "," .$value['Call_Date'];
							}
				
						}
						return $arrNewContact;

		return $arrNewCustomer;
	}
	
	
// 	cust

public function countTotalUsersByCusId($fromdate,$todate,$all)
	{
	    
	    $sql="SELECT distinct(CustomerId) FROM marketingcalllog WHERE Call_Date>='$fromdate' and Call_Date<='$todate' and CustomerId=".$all." 
		        AND CustomerId NOT IN (SELECT CustomerId FROM customerlist WHERE CreatedDate>='$fromdate' AND CreatedDate<='$todate' )";
		
		$query = $this->db->query($sql);
		return $query->num_rows();
		
	}
	
	
	
		public function countTotalNewCustomersByCusId($fromdate,$todate,$all)
	{
		
	   
	   $sql = "select  distinct (CustomerId) from marketingcalllog where Call_Date BETWEEN '$fromdate' and '$todate' and CustomerId=".$all." and CustomerId in
	   (SELECT CustomerId FROM customerlist WHERE CreatedDate BETWEEN '$fromdate' and '$todate')";
	   

		$query = $this->db->query($sql);
		
	
		
		return $query->num_rows();
		
		
	}
	
	
	public function countTotalContactByCusId($fromdate,$todate,$all)
	{
	    
	    $sql="SELECT distinct(ContactId) FROM marketingcalllog WHERE Call_Date>='$fromdate' and Call_Date<='$todate' and CustomerId=".$all." 
		        AND ContactId NOT IN (SELECT ContactId FROM contactperson WHERE CreatedDate>='$fromdate' AND CreatedDate<='$todate')";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	
	
	public function getNewuserlistByCusId1($fromdate,$todate,$all) {
	    
	
	   $sql = "select CustomerId,id,Call_Date from marketingcalllog where Call_Date BETWEEN '$fromdate' and '$todate' and CustomerId=".$all." and CustomerId in
	   (SELECT CustomerId FROM customerlist WHERE CreatedDate BETWEEN '$fromdate' and '$todate')";
	   

		$query = $this->db->query($sql);
		
						$name=$query->result_array();
						// dictionary created - use custmerid for key and date or multiple date for value
		$arrNewCustomer = array();
		foreach ($name as $key=>$value)
		{
			$customerid = $value['CustomerId'];
			if (!array_key_exists($customerid, $arrNewCustomer)) {
				$arrNewCustomer[$customerid] = $value['Call_Date'];
			}
			else {
				$ids = $arrNewCustomer[$customerid];
				$arrNewCustomer[$customerid] = $ids . "," .$value['Call_Date'];
			}
			
		
		  
		}

		return $arrNewCustomer;
	}



    public function getNewcontactlistByCusId1($fromdate,$todate,$all) {
	    
	
	   $sql = "select ContactId,id,Call_Date from marketingcalllog where Call_Date BETWEEN '$fromdate' and '$todate' and CustomerId=".$all." and ContactId in
	   (SELECT ContactId FROM contactperson WHERE CreatedDate BETWEEN '$fromdate' and '$todate')";
	   
    // var_dump($sql);
		$query = $this->db->query($sql);
		
						$name=$query->result_array();
						// dictionary created - use custmerid for key and date or multiple date for value
						$name=$query->result_array();
						$arrNewContact = array();
						foreach ($name as $key=>$value)
						{
							$contactid = $value['ContactId'];
							if (!array_key_exists($contactid, $arrNewContact)) {
								$arrNewContact[$contactid] = $value['Call_Date'];
							}
							else {
								$ids = $arrNewContact[$contactid];
								$arrNewContact[$contactid] = $ids . "," .$value['Call_Date'];
							}
				
						}
						return $arrNewContact;

		return $arrNewCustomer;
	}
	
	
	
	public function countTotalNewContactByCusId($fromdate,$todate,$all)
		{
		    
		
		
	   $sql = "select  distinct (ContactId) from marketingcalllog where Call_Date BETWEEN '$fromdate' and '$todate' and CustomerId=".$all." and ContactId in
	   (SELECT ContactId FROM contactperson WHERE CreatedDate BETWEEN '$fromdate' and '$todate')";
	   
	   
	   
// 	
		$query = $this->db->query($sql);
		
	
		
		return $query->num_rows(); 
		    
		    
		}


// cust
    
    
}