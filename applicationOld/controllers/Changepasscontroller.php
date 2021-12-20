<?php 
class Changepasscontroller extends CI_Controller 
{
	public function __construct()
	{
	/*call CodeIgniter's default Constructor*/
	parent::__construct();
	
	/*load database libray manually*/
	$this->load->database();
	
	/*load Model*/
	$this->load->model('ChangePwd_model');
	}
        /*Insert*/
	public function savedata()
	{
		/*load registration view form*/
		$this->load->view('change_pass');
	
		/*Check submit button */
		// if($this->input->post('save'))
		// {

            $email = $this->input->post('from');
            $pwd = $this->input->post('new_pass');

		    
			
			
            $response=$this->ChangePwd_model->update_password($email,$pwd);
            
    // $_SESSION["changepwdSes"] = "Password changed Successfully";
    echo '<script>alert("Password changed Successfully")</script>';
		redirect('auth/login', 'refresh');
	}
	
}
?>