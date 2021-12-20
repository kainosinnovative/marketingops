<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
error_reporting(E_ALL); 

class Email_send extends CI_Controller {

	public function index()
	{
		
		$this->load->view('forget_pass');
		//$this->load->library('email');
	}
	public function send()
{
    
  $from = "contact@kainosinnovative.com";
  $to =  $this->input->post('from');
// $to = "vijayr@kainosinnovative.com";
$subject = "Reset Password Link";
$message = "Hi,
Click this link to reset password "."http://marketing.kainosinnovative.com/index.php/Forms/change_pass

Thanks,
Kaions Innovative Solutions
http://kainosinnovative.com/
";
$header = "From: ".$from;

mail($to,$subject,$message,$header);
// $_SESSION["resetLinkSes"] = "Password Reset Link Sent to your email";
echo '<script>alert("Password Reset Link Sent to your email")</script>';
redirect('auth/login', 'refresh');
}

}
?>