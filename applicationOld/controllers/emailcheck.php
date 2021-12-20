<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_send extends CI_Controller {

	public function index()
	{
		
		$this->load->view('forget_pass');
		//$this->load->library('email');
	}
	public function send()
{
	
	 $to =  $this->input->post('from');
	// echo $to;
	$que=$this->db->query("select EmployeeEmail,Password from employeelist where EmployeeEmail='$to'");
			$row=$que->row();
			$user_email=$row->EmployeeEmail;
			$passwordlink="http://marketing.kainosinnovative.com/index.php/Forms/change_pass";
			
    $subject = "Reset link";
//echo $to;
//echo $pass;
    $from = 'contactkainosinnovative@gmail.com';              // Pass here your mail id
 // $this->load->library('email');
    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'smtp.googlemail.com';
     $config['smtp_port']    = '465';
    // $config['smtp_port']    = '587';
    $config['smtp_timeout'] = '20';

    $config['smtp_user']    = 'contactkainosinnovative@gmail.com';    //Important
    $config['smtp_pass']    = 'kainos123';  //Important
$config['send_multipart'] = FALSE;
$config['smtp_crypto'] = 'tls'; //FIXED
$config['protocol'] = 'smtp'; //FIXED
$config['mailtype'] = 'html'; 
    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not 

     

  $this->load->library('email');
$this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->from($from,'kainos innovative solutions');
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message("Click here to reset your password:".$passwordlink);
    $this->email->send();
if($this->email->send())
{
    echo 'Your email was sent.';
}

else
{
    show_error($this->email->print_debugger());
}
    $this->session->set_flashdata('msg',"Mail has been sent successfully");
    $this->session->set_flashdata('msg_class','alert-success');
    return redirect('email_send');
}

}