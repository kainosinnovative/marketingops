<?php 

class Model_company extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the company data */
	public function getCompanyData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM employeelist WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('employeelist', $data);
			return ($update == true) ? true : false;
		}
	}


}