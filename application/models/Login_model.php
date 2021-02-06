<?php 
class Login_model extends CI_model{
		

	public function isvalidate($username , $password){
	

		 $q= $this->db->where(['username' => $username ,'password' => $password])
					 ->get('users');
					
			if($q->num_rows()){
				return $q->row()->id;
			}else{
				return false;
			}

	}

	public function register_user($data){
		return $this->db->insert('users',$data); // "table name" , "data";
	}

 
}


?>