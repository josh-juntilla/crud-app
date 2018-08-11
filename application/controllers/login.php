<?php 

class Login extends ci_controller{


	public function __construct(){

		parent:: __construct();

		$this->load->model("model_login");

	}


	public function index($login_error = 0){

		$data['login_error'] = $this->set_login_error($login_error);

		$this->load->view("login",$data);

	}


	public function do_validate(){

		$userid = $this->input->post("userid");
		$password = $this->input->post("password");

		$this->form_validation->set_rules("userid","Username","trim|required");
		$this->form_validation->set_rules("password","Password","trim|required");
		$this->form_validation->set_error_delimiters("<span class='error'>","</span>");

		if($this->form_validation->run() == false){

			$this->index();

		}else{

			$login_checked = $this->model_login->check_login($userid,$password);

			if($login_checked){

				if(!$this->model_login->check_user_status($userid)){

					$login_error = 2;

					$this->index($login_error);
				
				}else{

					$this->do_login($userid);	
				}

			}else{

				$login_error = 1;

				$this->index($login_error);
			}

		}

	}


	private function set_login_error($login_error){

		switch ($login_error){
			case 1:
				$error_log = "<span class='error'>Invalid Username or Password.</span>";
				break;

			case 2:
				$error_log = "<span class='error'>Username you're trying to access is Disabled</span>";
				break;
			
			default:
				$error_log = "";
				break;
		}

		return $error_log;
	}


	private function do_login($userid = null){

		$row = $this->model_login->get_user($userid,$password);

		$this->session->set_userdata("sof_userid",$row->userid);
		$this->session->set_userdata("sof_username",$row->username);
		$this->session->set_userdata("sof_usertype",$row->usertype);
		$this->session->set_userdata("sof_account",$this->set_account($row->usertype));

		redirect(base_url("main"));

	}


	private function set_account($usertype){

		switch ($usertype) {
			
			case 'USRADM':

				$account = "sof";
				
				break;

			case 'USRVWR':

				$account = "sof";

				break;

			default:

				$account = "";
				
				break;
		}


		return $account;
	}


}

?>