<?php 

class Model_auth extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* 
		This function checks if the email exists in the database
	*/
	public function check_email($name) 
	{
		if($name) {
			$sql = 'SELECT * FROM employeelist WHERE EmployeeName = ?';
			$query = $this->db->query($sql, array($name));
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
	}

	/* 
		This function checks if the email and password matches with the database
	*/
	public function login($name, $password) {
		if($name && $password) {
			$sql = "SELECT * FROM employeelist WHERE EmployeeName = ? and EmployeeActive = 1" ;
			$query = $this->db->query($sql, array($name));

			if($query->num_rows() == 1) {
				$result = $query->row_array();

				//$hash_password = password_verify($password, $result['Password']);
				if($result['Password']=== $password) {
					return $result;	
				}
				else {
					return false;
				}

				
			}
			else {
				return false;
			}
		}
	}
}