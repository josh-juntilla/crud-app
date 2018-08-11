<?php  

class Change_password extends ci_controller{


	public function __construct(){

		parent:: __construct();

		$this->load->model("model_main");

		$logged = $this->session->userdata("sof_userid");

		check_session($logged);

	}


	public function index(){

		$this->load->view("change_password");
	}


	public function do_change(){

		$this->form_validation->set_rules("new_pass","Password","trim|required|matches[confirm_new]");
		$this->form_validation->set_rules("confirm_new","Confirm New Password","trim|required");
		$this->form_validation->set_error_delimiters("<span class='error'>","</span>");

		if($this->form_validation->run() == false){

			$this->index();
		
		}else{

			$hash_pass = crypt($this->input->post("new_pass"));

			$update_pass = array(

				"password" => $hash_pass
			);

			$this->db->where("userid",$this->session->userdata("sof_userid"));
			$this->db->update("tbl_user",$update_pass);

			redirect(base_url("main"));
		}
	}

}

?>