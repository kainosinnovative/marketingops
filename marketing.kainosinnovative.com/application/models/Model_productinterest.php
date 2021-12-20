<?php
class model_productinterest extends CI_Model 
{
	
	function saverecords($data)
	{
        $this->db->insert('productcategory',$data);
        return true;
	}

    
    function saverecords_producttype($data)
	{
        $this->db->insert('producttype',$data);
        return true;
	}


        function saverecordsTblCategory($data1,$catname)
	{
                $sql = "SELECT id FROM tbl_categories WHERE item_name = '".$catname."'";
                $query = $this->db->query($sql);
                // return $query->row_array();
                $res = $query->row_array();
                // echo $res[0];
                // var_dump($res);

                $data1['parent_id']=$res['id'];


                $this->db->insert('tbl_categories',$data1);
                return true;
		
	

        //$this->db->insert('tbl_categories',$data1);
        //return true;
	}  


        function inserttblCategory($data1)
	{
        $this->db->insert('tbl_categories',$data1);
        return $data1;
	}



        public function getProductCategoryNameAsc() 
	{
		

		$sql = "SELECT * FROM productcategory ORDER BY category_name ASC";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
	
}

?>