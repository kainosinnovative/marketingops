<?php
class ChangePwd_model extends CI_Model 
{
	
	function saverecords($data)
	{
        $this->db->insert('employeelist',$data);
        return true;
    }
    

    public function update_password($email,$pwd) {

        
            

        $data = [
            'Password' => $pwd,
        ];
        $this->db->where('EmployeeEmail', $email);
        $this->db->update('employeelist', $data);
        // echo $email;
        // print_r($data);
        //echo 'Password changed successfully';
    }
	
}
?>