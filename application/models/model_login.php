<?php 

class Model_login extends ci_model{


	public function check_login($userid,$password){

		$query = "select * from tbl_user where userid = '$userid' and password = '$password'";

		$result = $this->db->query($query);


		if($result->num_rows() > 0){

			$checked = true;
		
		}else{

			$query = "select * from tbl_user where userid = '$userid'";

			$result = $this->db->query($query);

			if($result->num_rows() > 0){

				$row = $result->row();

				if(crypt($password,$row->password) == $row->password){

					$checked = true;
				
				}else{

					$checked = false;
				}

			}else{

				$checked = false;
			}

		}

		return $checked;
	
	}


	public function check_user_status($userid){

		$query = "select * from tbl_user where userid = '$userid' and userstatus = 1";

		$result = $this->db->query($query);

		if($result->num_rows() > 0){

			$checked = true;
		
		}else{

			$checked = false;
		}

		return $checked;		
	}


	public function get_user($userid){

		$query = "select * from tbl_user where userid = '$userid'";

		$result = $this->db->query($query);

		if($result->num_rows() > 0){

			$row = $result->row();
		
		}

		return $row;	
	}




}


?>