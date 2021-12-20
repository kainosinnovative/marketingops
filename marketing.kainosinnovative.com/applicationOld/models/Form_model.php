<?php
class Form_model extends CI_Model 
{
	function fetch_pass($session_id)
	{
	$fetch_pass=$this->db->query("select * from employeelist where id='$session_id'");
	$res=$fetch_pass->result();
	}
	function change_pass($session_id,$new_pass)
	{
		//$newpassword=password_hash($new_pass, PASSWORD_DEFAULT);
		//echo $newpassword;
	$update_pass=$this->db->query("UPDATE employeelist set Password='$new_pass'  where EmployeeEmail='$session_id'");
	}
}