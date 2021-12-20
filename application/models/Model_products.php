<?php 

class Model_products extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_users');
	}

	/* get the product data */
	public function getContactData($id=null)
	{ 
	   // echo $id;
			if($id)
			{
				$sql = "SELECT * FROM contactperson WHERE ContactId =?";
				$query = $this->db->query($sql, array($id));
		//print_r($query->result_array());
				return $query->row_array();
				
			}
			$sql = "SELECT * FROM contactperson ORDER BY Name DESC";
			$query = $this->db->query($sql, array(1));
		//print_r($query->result_array());
		return $query->result_array();
	}

	

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('contactperson', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('ContactId', $id);
			$update = $this->db->update('contactperson', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('ContactId', $id);
			$delete = $this->db->delete('contactperson');
			return ($delete == true) ? true : false;
		}
	}

	public function countTotalProducts()
	{
		$sql = "SELECT * FROM contactperson";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	public function edit($data = array(), $id = null)
	{
		$this->db->where('ContactId', $id);
		$update = $this->db->update('contactperson', $data);

		return ($update == true) ? true : false;	
	}
	
	function search_blog($title,$customerid){
        $this->db->like('Name', $title , 'both');
        $this->db->order_by('Name', 'ASC');
		// $this->db->limit(10);
		
		$query = $this->db->get_where('contactperson', array('CustomerId' => $customerid ))->result();
		return $query;
        // return $this->db->get('contactperson')->result();
    }
    
	function get_contact_data($Customerid)
	{
		$query = $this->db->get_where('contactperson', array('CustomerId' => $Customerid));
        return $query;
		
	}
	public function delete($id)
	{
		$this->db->where('ContactId', $id);
		$delete = $this->db->delete('contactperson');
		return ($delete == true) ? true : false;
	}
	
	

}