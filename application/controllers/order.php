<?php 

class Order extends ci_controller{


	public function __construct(){

		parent:: __construct();

		date_default_timezone_set("Asia/Manila");

		$this->load->model("model_main");

		$logged = $this->session->userdata("sof_userid");

		check_session($logged);

	}


	public function index($captcha_err = 0){

		$account = $this->session->userdata("sof_account");

		$this->load->view($account."_order");
	}


	public function do_submit(){

		$this->form_validation->set_rules("Job","Job","trim|required");
		$this->form_validation->set_rules("Client","Client","trim|required");
		$this->form_validation->set_rules("PM","PM/OPM","trim|required");
		$this->form_validation->set_rules("jobstat","Job Status","trim|required");
		$this->form_validation->set_rules("dateship","Date Shipped","trim|required");
		$this->form_validation->set_rules("DirectoryInfo","Directory Info","trim|required");
		$this->form_validation->set_rules("TrackingNumber","Tracking No","trim|required");
		$this->form_validation->set_rules("remarks","Comment","trim");

		$this->form_validation->set_error_delimiters("<span class='error'>","</span>");

		if($this->form_validation->run() == false){

			$this->index();
		
		}else{


			$insert_entry = array(

				"Job"            => $this->input->post("Job"),
				"Client"         => $this->input->post("Client"),
				"PM"             => $this->input->post("PM"),
				"jobstat"        => $this->input->post("jobstat"),
				"dateship"       => $this->input->post("dateship"),
				"DirectoryInfo"  => $this->input->post("DirectoryInfo"),
				"TrackingNumber" => $this->input->post("TrackingNumber"),
				"Comment"        => $this->input->post("Comment")
			);

			$this->db->insert("sof_order",$insert_entry);

			redirect(base_url('main'));


		}


	}


	public function do_update(){

		$id = $this->uri->segment(3);

		$account = $this->session->userdata("sof_account");

		$update_entry = array(
			
			"Job"            => $this->input->post("Job"),
			"Client"         => $this->input->post("Client"),
			"PM"             => $this->input->post("PM"),
			"jobstat"        => $this->input->post("jobstat"),
			"dateship"       => $this->input->post("dateship"),
			"DirectoryInfo"  => $this->input->post("DirectoryInfo"),
			"TrackingNumber" => $this->input->post("TrackingNumber"),
			"Comment"        => $this->input->post("Comment")
		);

		$this->db->where("id",$id);
		$this->db->update($account."_order",$update_entry);

		redirect(base_url("main"));
	}


	public function do_delete(){

		$id = $this->uri->segment(3);

		$account = $this->session->userdata("sof_account");

		$this->db->where("id",$id);
		$this->db->delete($account."_order");

		redirect(base_url("main"));
	}

}
?>
