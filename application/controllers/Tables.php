<?php 

class Tables extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Add Product Category';
		$this->load->model('model_tables');
		$this->load->model('model_stores');
		$this->load->model('model_productinterest');
	}

	public function index()
	{	
		$store_data = $this->model_stores->getActiveStore();
		$this->data['store_data'] = $store_data;

		$productcat_data = $this->model_productinterest->getProductCategoryNameAsc();
        $this->data['productcat_data'] = $productcat_data;

		$something = $this->input->post('category_name');

		if(isset($something))
		{
		    $data['category_name']=$this->input->post('category_name');
			
			$response=$this->model_productinterest->saverecords($data);


			$data1['item_name']=$this->input->post('category_name');
			$data1['parent_id']=0;
			
			$response1=$this->model_productinterest->inserttblCategory($data1);

			if($response==true){
				$this->session->set_tempdata('success', 'Successfully Product Category Created');
			       // echo "Records Saved Successfully";
			}
			else{
					//echo "Insert error !";
			}

			redirect('tables/index', 'refresh');
		}



		$something1 = $this->input->post('productcategory_id');

		if(isset($something1))
		{
			$productcategory_idArr = $this->input->post('productcategory_id'); // some IP address
   			$productcategory_idArrSplit = explode("#",$productcategory_idArr);


		    $data['productcategory_id']=$productcategory_idArrSplit[0];
		    $data['product_name']=$this->input->post('product_name');
			
			$response=$this->model_productinterest->saverecords_producttype($data);


			 

			$data1['item_name']=$this->input->post('product_name');
			// $data1['parent_id']=$this->input->post('productcategory_id');


			
			$response1=$this->model_productinterest->saverecordsTblCategory($data1,$productcategory_idArrSplit[1]);


			// $prodname = $this->model_productinterest->gettblCategoryid($productcategory_idArrSplit[1]);


			if($response==true){
				$this->session->set_tempdata('success', 'Successfully Product Created');
			       // echo "Records Saved Successfully";
			}
			else{
				//	echo "Insert error !";
			}

			redirect('tables/index', 'refresh');
		}
		

		$this->render_template('tables/index', $this->data);
	}

	public function fetchTableData()
	{
		if(!in_array('viewTable', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		$result = array('data' => array());

		$data = $this->model_tables->getTableData();

		foreach ($data as $key => $value) {

			$store_data = $this->model_stores->getStoresData($value['store_id']);

			// button
			$buttons = '';

			if(in_array('updateTable', $this->permission)) {
				$buttons = '<button type="button" class="btn btn-default" onclick="editFunc('.$value['id'].')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			}

			if(in_array('deleteTable', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			$available = ($value['available'] == 1) ? '<span class="label label-success">Available</span>' : '<span class="label label-warning">Unavailable</span>';
			$status = ($value['active'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$store_data['name'],
				$value['table_name'],
				$value['capacity'],
				$available,
				$status,
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	public function create()
	{
		// if(!in_array('createTable', $this->permission)) {
		// 	redirect('dashboard', 'refresh');
		// }

		// $response = array();

		// // if($this->input->post('save'))
		// // {
		//     $data['category_name']=$this->input->post('category_name');
			
		// 	$response=$this->Model_tables->saverecords($data);
		// 	if($response==true){
		// 	        echo "Records Saved Successfully";
		// 	}
		// 	else{
		// 			echo "Insert error !";
		// 	}

		// 	redirect('dashboard', 'refresh');
		// // }
	}

	public function fetchTableDataById($id = null)
	{
		if($id) {
			$data = $this->model_tables->getTableData($id);
			echo json_encode($data);
		}
		
	}

	public function update($id)
	{
		if(!in_array('updateTable', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if($id) {
			$this->form_validation->set_rules('edit_table_name', 'Table name', 'trim|required');
			$this->form_validation->set_rules('edit_capacity', 'Capacity', 'trim|integer');
			$this->form_validation->set_rules('edit_active', 'Active', 'trim|required');
			$this->form_validation->set_rules('edit_store', 'Store', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE) {
	        	$data = array(
	        		'table_name' => $this->input->post('edit_table_name'),
        			'capacity' => $this->input->post('edit_capacity'),	
        			'active' => $this->input->post('edit_active'),	
        			'store_id' => $this->input->post('edit_store'),	
	        	);

	        	$update = $this->model_tables->update($id, $data);
	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the brand information';			
	        	}
	        }
	        else {
	        	$response['success'] = false;
	        	foreach ($_POST as $key => $value) {
	        		$response['messages'][$key] = form_error($key);
	        	}
	        }
		}
		else {
			$response['success'] = false;
    		$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
	}

	public function remove()
	{
		if(!in_array('deleteTable', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		$table_id = $this->input->post('table_id');

		$response = array();
		if($table_id) {
			$delete = $this->model_tables->remove($table_id);
			if($delete == true) {
				$response['success'] = true;
				$response['messages'] = "Successfully removed";	
			}
			else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the brand information";
			}
		}
		else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}

		echo json_encode($response);
	}



	public function gettreeview()
	{

		$sql = "select id, item_name as name, item_name as text, parent_id from tbl_categories order by parent_id asc";
			$query = $this->db->query($sql);
			$tree_data= $query->result_array();	
		

//$tree_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($tree_data as $k => &$v){
    $tmp_data[$v['id']] = &$v;
}

foreach($tree_data as $k => &$v){
    if($v['parent_id'] && isset($tmp_data[$v['parent_id']])){
        $tmp_data[$v['parent_id']]['nodes'][] = &$v;
    }
}

foreach($tree_data as $k => &$v){
    if($v['parent_id'] && isset($tmp_data[$v['parent_id']])){
        unset($tree_data[$k]);
    }
}

echo json_encode($tree_data);
	}
	

}