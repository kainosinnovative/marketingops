<?php 
class ProductInterestController extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();

		// $this->not_logged_in();

		// $this->data['page_title'] = 'Call Log';
		$this->load->model('model_products');
		$this->load->model('model_category');
		$this->load->model('model_users');
		$this->load->model('model_groups');
        $this->load->model('model_tables');
	
	/*load Model*/
	$this->load->model('model_productinterest');
	}
        /*Insert*/
	public function savedata()
	{
		

        $productcat_data = $this->model_groups->getProductCategory();
        $this->data['productcat_data'] = $productcat_data;


        /*load registration view form*/
		$this->load->view('company/index',$this->data);
	
		/*Check submit button */
		if($this->input->post('save'))
		{
		    $data['category_name']=$this->input->post('category_name');
			
			$response=$this->model_productinterest->saverecords($data);
			if($response==true){
			        echo "Records Saved Successfully";
			}
			else{
					echo "Insert error !";
			}
		}
	}




    public function saveProductdata()
	{
		

        $productcat_data = $this->model_groups->getProductCategory();
        $this->data['productcat_data'] = $productcat_data;


        /*load registration view form*/
		$this->load->view('company/index',$this->data);
	
		/*Check submit button */
		if($this->input->post('save1'))
		{   
            $data['productcategory_id']=$this->input->post('productcategory_id');
		    $data['product_name']=$this->input->post('product_name');
			
			$response=$this->model_productinterest->saverecords_producttype($data);
			if($response==true){
			        echo "Records Saved Successfully";
			}
			else{
					echo "Insert error !";
			}
		}
	}



    function get_autocomplete_Category(){
        if (isset($_GET['term'])) {
            $result = $this->model_tables->search_productCategory($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->category_name;
                echo json_encode($arr_result);
            }
        }
    }



     function getProductbasedCategory(){
		if (isset($_POST['term'])) {
            $result = $this->model_tables->search_productname($_POST['term'],$_POST['term1']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->product_name;
                echo json_encode($arr_result);
            }
        }
	  }
	
}
?>