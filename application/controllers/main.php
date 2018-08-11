<?php 

class Main extends ci_controller{


	public function __construct(){

		parent:: __construct();

		$this->load->model("model_main");

		$logged = $this->session->userdata("sof_userid");

		check_session($logged);

	}


	public function index($tofilter=array(),$row_num=0){

		$where = set_filter($tofilter);

		//Pagination
		$config['base_url']       = base_url($this->uri->segment(1)."/page");
		$config['total_rows']     = $this->model_main->get_rows($this->session->userdata("sof_account"),$where,"");
		$config['per_page']       = 30;
		$config['uri_segment']    = 3;
		$config['num_links']      = 19;//ceil($config['total_rows']/$config['per_page']);
		$config['full_tag_open']  = "<div class='paging'>";
		$config['full_tag_close'] = "</div>";  

		$this->pagination->initialize($config);

		$limit = set_limit($l = array("row_num"=>$row_num,"max_row"=>$config['per_page']));


		//$data['query'] = $this->model_main->display_query($this->session->userdata("sof_account"),$where,$limit);

		$data['records'] = $this->model_main->all_order($this->session->userdata("sof_account"),$where,$limit);

		$this->load->view("main",$data);

	}


	public function edit(){

		$id = $this->uri->segment(3);

		$account = $this->session->userdata("sof_account");

		$data['row'] = $this->model_main->get_order($account,$id);

		$this->load->view($account."_edit",$data);

	}


	public function delete(){

		$id = $this->uri->segment(3);

		$account = $this->session->userdata("sof_account");

		$data['row'] = $this->model_main->get_order($account,$id);

		$this->load->view($account."_delete",$data);

	}


	public function page(){

		$row_num = ($this->uri->segment(3) == null ? 0 : $this->uri->segment(3));

		$tofilter = array();

		$this->index($tofilter,$row_num);
	}


	public function filter(){

		$row_num = ($this->uri->segment(3) == null ? 0 : $this->uri->segment(3));

		$tofilter = array(
			"id" => $this->input->post("filter_id"),
			"Job" => $this->input->post("filter_job"),
			"Client" => $this->input->post("filter_client"),
			"PM" => $this->input->post("filter_pm"),
			"TrackingNumber" => $this->input->post("filter_trackno"),
			"DateEntered" => $this->input->post("filter_date"),
			"DirectoryInfo" => $this->input->post("filter_directinfo")
		);

		$this->index($tofilter,$row_num);
	}


	public function logout(){

		$item = array(

			"sof_userid"   => $this->session->userdata("sof_userid"),
			"sof_username" => $this->session->userdata("sof_username"),
			"sof_usertype" => $this->session->userdata("sof_usetype"),
			"sof_account"  => $this->session->userdata("sof_account")
		);

		$this->session->unset_userdata($item);

		redirect(base_url());

	}

}

?>