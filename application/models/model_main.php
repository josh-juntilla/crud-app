<?php 

class Model_main extends ci_model{


	public function all_order($account,$where = "",$limit = ""){


		$query = "select * from {$account}_order where id is not null $where order by id desc $limit ";

		$result = $this->db->query($query);

		if($result->num_rows() > 0){

			$records = array();

			foreach($result->result() as $rows){

				$records[] = $rows;
			}
		
		}else{

			$records = array();
		}
	
		return $records;

	}


	public function get_order($account,$id){

		$query = "select * from {$account}_order where id = $id";

		$result = $this->db->query($query);

		if($result->num_rows() > 0){

			$row = $result->row();
		
		}else{

			$row = array();
		}
	
		return $row;

	}


	public function get_rows($account,$where="",$limit=""){

		$query = "select * from {$account}_order ";

		$result = $this->db->query($query);

		$records = $result->num_rows();

		return $records;

	}


	public function get_sysid($id_name){

		$query = "select * from sys_id where id_name = '$id_name'";

		$result = $this->db->query($query);

		if($result->num_rows() > 0){

			$row = $result->row();
		
		}else{

			$row = array();
		}

		return $row; 
	}


	public function update_sysid($id_name,$id_value){

		$query = "update sys_id set id_value = '$id_value' where id_name = '$id_name'";

		$this->db->query($query);
	}

}

?>