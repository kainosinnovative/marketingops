<?php 

class Model_groups extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_products');
	}

	public function getProductCategory($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM productcategory WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM productcategory ORDER BY id ASC";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
	public function getProductType($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM producttype WHERE productcategory_id = ?";
			$query = $this->db->query($sql, array($id));
		//	print_r($query->result_array());
			return $query->result_array();
		}

		$sql = "SELECT * FROM producttype ORDER BY productcategory_id";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
	 public function getCallType()
	 {
		 $sql = "SELECT * FROM calltype_list ORDER BY id";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
		 
	 }
	  public function getCallStatus()
	 {
		 $sql = "SELECT * FROM callstatus_list ORDER BY id";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
		 
	 }

	public function create($data,$producttags)
	{ 
	
	$create = $this->db->insert('marketingcalllog', $data);
	 $this->db->select_max('id');
    $this->db->from('marketingcalllog');
    $row = $this->db->get()->row();
	if (isset($row)) {
		$max=$row->id;
	}
// 	$ProducttagCount = count($producttags);
// 	echo $ProducttagCount;
	if (!empty($producttags)) {
		foreach($producttags as $key=>$value)
		{
			 $this->db->select('productcategory_id');
    $this->db->from('producttype');
    $this->db->where('product_id',$value);
    $row = $this->db->get()->row();
    if (isset($row)) {
        $pdcid= $row->productcategory_id;
    } 
		$data1=array(
		'id'=>$max,
		'productcategory_id' => $pdcid,
        		'product_id' => $value,
		);
 
		$create = $this->db->insert('product_interest', $data1);
		
		}
	}
		return ($create == true) ? true : false;
	}
		
	

	public function edit($data, $id,$producttags)
	{
		//print_r($producttags);
		$this->db->where('id', $id);
		$update = $this->db->update('marketingcalllog', $data);
		$this->db->where('id', $id);
		$delete = $this->db->delete('product_interest');
		if (!empty($producttags)) {
		foreach($producttags as $key=>$value)
		{
			 $this->db->select('productcategory_id');
    $this->db->from('producttype');
    $this->db->where('product_id',$value);
    $row = $this->db->get()->row();
    if (isset($row)) {
        $pdcid= $row->productcategory_id;
    } 
		$data1=array(
		'id'=>$id,
		'productcategory_id' => $pdcid,
        		'product_id' => $value,
		);
 
		$create = $this->db->insert('product_interest', $data1);
		
		}
		}
// 		return ($update == true && $delete==true && $create == true) ? true : false;
	return ($update == true) ? true : false;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('marketingcalllog');
		$this->db->where('id',$id);
		$delete1=$this->db->delete('product_interest');
		return ($delete == true && $delete1 == true) ? true : false;
	}

	public function existInUserGroup($id)
	{
		$sql = "SELECT * FROM user_group WHERE group_id = ?";
		$query = $this->db->query($sql, array($id));
		return ($query->num_rows() == 1) ? true : false;
	}

	public function getUserGroupByUserId($user_id) 
	{
		$sql = "SELECT * FROM user_group 
		INNER JOIN groups ON groups.id = user_group.group_id 
		WHERE user_group.user_id = ?";
		$query = $this->db->query($sql, array($user_id));
		$result = $query->row_array();

		return $result;

	}
	public function getCallLog($id = null)
	{

if($id)
		{
		$sql="SELECT a.id,a.call_Date,b.OrgName,c.Name,a.ContactId,EncounterBy,d.call_Status,a.Status,e.call_type,a.EncounterType,Follow_Up_Date,a.Notes FROM marketingcalllog a,customerlist b,contactperson c,callstatus_list d,calltype_list e
		WHERE  a.id=".$id." and 
		a.CustomerId=b.CustomerId and c.ContactId=a.ContactId and  
		a.EncounterType=e.id and a.Status=d.id order by a.call_Date";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
		}


else {

	if($_SESSION['id']==1 || $_SESSION['id']==2 || $_SESSION['id']==3 || $_SESSION['id']==11)
	{
		$sql="SELECT f.EmployeeName,a.id,a.call_Date,b.OrgName,c.Name,a.ContactId,EncounterBy,d.call_Status,a.Status,e.call_type,a.EncounterType,Follow_Up_Date,a.Notes FROM marketingcalllog a,customerlist b,contactperson c,callstatus_list d,calltype_list e, employeelist f
		WHERE a.EmployeeId=".$_SESSION['id']." and a.EmployeeId = f.id and
		a.CustomerId=b.CustomerId and c.ContactId=a.ContactId and  
		a.EncounterType=e.id and a.Status=d.id order by a.call_Date";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
	else {
		$sql="SELECT f.EmployeeName,a.id,a.call_Date,b.OrgName,c.Name,a.ContactId,EncounterBy,d.call_Status,a.Status,e.call_type,a.EncounterType,Follow_Up_Date,a.Notes FROM marketingcalllog a,customerlist b,contactperson c,callstatus_list d,calltype_list e , employeelist f
		WHERE a.EmployeeId = f.id and
		a.CustomerId=b.CustomerId and c.ContactId=a.ContactId and  
		a.EncounterType=e.id and a.Status=d.id order by a.call_Date";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

}

// 		if($id)
// 		{
// 		$sql="SELECT a.id,a.call_Date,b.OrgName,c.Name,a.ContactId,EncounterBy,d.call_Status,a.Status,e.call_type,a.EncounterType,Follow_Up_Date,a.Notes FROM marketingcalllog a,customerlist b,contactperson c,callstatus_list d,calltype_list e
// 		WHERE a.EmployeeId=".$_SESSION['id']." and a.id=".$id." and 
// 		a.CustomerId=b.CustomerId and c.ContactId=a.ContactId and  
// 		a.EncounterType=e.id and a.Status=d.id order by a.call_Date";
// 		$query = $this->db->query($sql, array(1));
// 		return $query->result_array();
// 		}
// 		else {
// 		$sql="SELECT a.id,a.call_Date,b.OrgName,c.Name,a.ContactId,EncounterBy,d.call_Status,a.Status,e.call_type,a.EncounterType,Follow_Up_Date,a.Notes FROM marketingcalllog a,customerlist b,contactperson c,callstatus_list d,calltype_list e
// 		WHERE 
// 		a.CustomerId=b.CustomerId and c.ContactId=a.ContactId and  
// 		a.EncounterType=e.id and a.Status=d.id order by a.call_Date";
// 		$query = $this->db->query($sql, array(1));
// 		return $query->result_array();
// 		}
	}
	public function getCallLogdata($fromdate,$todate)
	{
		$sql="SELECT a.CustomerId,a.id,a.call_Date,f.firstname,b.OrgName,c.Name,a.ContactId,EncounterBy,d.call_Status,a.Status,e.call_type,a.EncounterType,Follow_Up_Date,a.Notes FROM marketingcalllog a,customerlist b,contactperson c,callstatus_list d,calltype_list e,employeelist f
		WHERE a.Call_Date>='$fromdate' and a.Call_Date<='$todate' and f.id=a.EmployeeId and 
		a.CustomerId=b.CustomerId and c.ContactId=a.ContactId and  
		a.EncounterType=e.id and a.Status=d.id ";
// 		var_dump($sql);
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
		
		
		
		
	}
	
	public function getCallLogdataById($fromdate,$todate,$id)
	{
		$sql="SELECT a.CustomerId,a.id,a.call_Date,f.firstname,b.OrgName,c.Name,a.ContactId,EncounterBy,d.call_Status,a.Status,e.call_type,a.EncounterType,Follow_Up_Date,a.Notes FROM marketingcalllog a,customerlist b,contactperson c,callstatus_list d,calltype_list e,employeelist f
		WHERE a.Call_Date>='$fromdate' and a.Call_Date<='$todate' and a.EmployeeId=".$id." and  f.id=a.EmployeeId and 
		a.CustomerId=b.CustomerId and c.ContactId=a.ContactId and  
		a.EncounterType=e.id and a.Status=d.id ";
// 		var_dump($sql);
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
		public function getCallLogdataByCusId($fromdate,$todate,$id)
	{
		$sql="SELECT a.CustomerId,a.id,a.call_Date,f.firstname,b.OrgName,c.Name,a.ContactId,EncounterBy,d.call_Status,a.Status,e.call_type,a.EncounterType,Follow_Up_Date,a.Notes FROM marketingcalllog a,customerlist b,contactperson c,callstatus_list d,calltype_list e,employeelist f
		WHERE a.Call_Date>='$fromdate' and a.Call_Date<='$todate' and a.CustomerId=".$id." and  f.id=a.EmployeeId and 
		a.CustomerId=b.CustomerId and c.ContactId=a.ContactId and  
		a.EncounterType=e.id and a.Status=d.id ";
// 		var_dump($sql);
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
	

	public function getProductData($id)
	{
		$sql = "SELECT * FROM product_interest WHERE id = ?";
			$query = $this->db->query($sql, array($id));
		//	print_r($query->result_array());
			return $query->result_array();

	}
	public function getProductDataByDate($fromdate,$todate)
	{
		
		$sql = "SELECT distinct(a.id),c.product_name FROM product_interest a,producttype c WHERE  a.product_id=c.product_id and a.id in (SELECT  id  FROM marketingcalllog WHERE Call_Date>='$fromdate' and Call_Date<='$todate' order by Call_Date)";
			$query = $this->db->query($sql);
		//print_r($query->result_array());
			return $query->result_array();
		
	}
	public function getProductSelectedData($id)
	{
		$sql = "SELECT * FROM product_interest WHERE id = ?";
			$query = $this->db->query($sql, array($id));
		//	print_r($query->result_array());
			return $query->result_array();
		
	}
	public function countTotalPerson($fromdate,$todate)
	{
		
		$mode="In-person";
		$sql = "SELECT * FROM marketingcalllog WHERE Call_Date>='$fromdate' AND Call_Date<='$todate' AND EncounterBy='$mode'";
		$query = $this->db->query($sql);
		return $query->num_rows();
		
	}
	public function countTotalPersonById($fromdate,$todate,$all)
	{
		$mode="In-person";
		$sql = "SELECT * FROM marketingcalllog WHERE Call_Date>='$fromdate' AND Call_Date<='$todate' AND EncounterBy='$mode' and EmployeeId=".$all."";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
		public function countTotalPersonByCusId($fromdate,$todate,$all)
	{
		$mode="In-person";
		$sql = "SELECT * FROM marketingcalllog WHERE Call_Date>='$fromdate' AND Call_Date<='$todate' AND EncounterBy='$mode' and CustomerId=".$all."";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	public function countTotalPhone($fromdate,$todate)
	{
		
		$mode="phone";
		$sql = "SELECT * FROM marketingcalllog WHERE Call_Date>='$fromdate' AND Call_Date<='$todate' AND  EncounterBy='$mode'";
		$query = $this->db->query($sql);
		return $query->num_rows();
		
	}
	
	public function countTotalPhoneById($fromdate,$todate,$all)
	{
		
		$mode="phone";
		$sql = "SELECT * FROM marketingcalllog WHERE Call_Date>='$fromdate' AND Call_Date<='$todate' AND  EncounterBy='$mode'  and EmployeeId=".$all."";
		$query = $this->db->query($sql);
		return $query->num_rows();
		
	}
		public function countTotalPhoneByCusId($fromdate,$todate,$all)
	{
		
		$mode="phone";
		$sql = "SELECT * FROM marketingcalllog WHERE Call_Date>='$fromdate' AND Call_Date<='$todate' AND  EncounterBy='$mode'  and CustomerId=".$all."";
		$query = $this->db->query($sql);
		return $query->num_rows();
		
	}
    public function countTotalHot($fromdate,$todate)
	{
		
		
		$sql = "SELECT * FROM marketingcalllog WHERE Call_Date>='$fromdate' AND Call_Date<='$todate' AND  Status=3";
		$query = $this->db->query($sql);
		return $query->num_rows();
		
	}
	public function countTotalHotById($fromdate,$todate,$all)
	{
		
		
		$sql = "SELECT * FROM marketingcalllog WHERE Call_Date>='$fromdate' AND Call_Date<='$todate' AND  Status=3 and EmployeeId=".$all."";
		$query = $this->db->query($sql);
		return $query->num_rows();
		
	}
		public function countTotalHotByCusId($fromdate,$todate,$all)
	{
		
		
		$sql = "SELECT * FROM marketingcalllog WHERE Call_Date>='$fromdate' AND Call_Date<='$todate' AND  Status=3 and CustomerId=".$all."";
		$query = $this->db->query($sql);
		return $query->num_rows();
		
	}
	public function countTotalCold($fromdate,$todate)
	{
		
		
		$sql = "SELECT * FROM marketingcalllog WHERE Call_Date>='$fromdate' AND Call_Date<='$todate' AND  Status=1";
		$query = $this->db->query($sql);
		return $query->num_rows();
		
	}
	public function countTotalColdById($fromdate,$todate,$all)
	{
		
		
		$sql = "SELECT * FROM marketingcalllog WHERE Call_Date>='$fromdate' AND Call_Date<='$todate' AND  Status=1 and  EmployeeId=".$all."";
		$query = $this->db->query($sql);
		return $query->num_rows();
		
	}
		public function countTotalColdByCusId($fromdate,$todate,$all)
	{
		
		
		$sql = "SELECT * FROM marketingcalllog WHERE Call_Date>='$fromdate' AND Call_Date<='$todate' AND  Status=1 and  CustomerId=".$all."";
		$query = $this->db->query($sql);
		return $query->num_rows();
		
	}
	public function countTotalWarm($fromdate,$todate)
	{
		
		
		$sql = "SELECT * FROM marketingcalllog WHERE Call_Date>='$fromdate' AND Call_Date<='$todate' AND  Status=2";
		$query = $this->db->query($sql);
		return $query->num_rows();
		
	}
	public function countTotalWarmById($fromdate,$todate,$all)
	{
		
		
		$sql = "SELECT * FROM marketingcalllog WHERE Call_Date>='$fromdate' AND Call_Date<='$todate' AND  Status=2 and  EmployeeId=".$all."";
		$query = $this->db->query($sql);
		return $query->num_rows();
		
	}
		public function countTotalWarmByCusId($fromdate,$todate,$all)
	{
		
		
		$sql = "SELECT * FROM marketingcalllog WHERE Call_Date>='$fromdate' AND Call_Date<='$todate' AND  Status=2 and  CustomerId=".$all."";
		$query = $this->db->query($sql);
		return $query->num_rows();
		
	}

	public function getAllEmployee()
	{
		
		
		$sql = "SELECT * FROM employeelist order by id";
		$query = $this->db->query($sql, array());
		//	print_r($query->result_array());
			return $query->result_array();
		
	}
}