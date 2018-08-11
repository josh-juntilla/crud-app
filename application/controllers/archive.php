<?php 

class Archive extends ci_controller{


	public function __construct(){

		parent:: __construct();

		$this->load->model("model_main");

		$logged = $this->session->userdata("ooh_userid");

		check_session($logged);

	}


	public function index($tofilter=array(),$row_num=0){

		$where = set_filter($tofilter);

		//Pagination
		$config['base_url']       = base_url($this->uri->segment(1)."/page");
		$config['total_rows']     = $this->model_main->get_rows($this->session->userdata("ooh_account"),$where,"");
		$config['per_page']       = 30;
		$config['uri_segment']    = 3;
		$config['num_links']      = ceil($config['total_rows']/$config['per_page']);
		$config['full_tag_open']  = "<div class='paging'>";
		$config['full_tag_close'] = "</div>";  

		$this->pagination->initialize($config);

		$limit = set_limit($l = array("row_num"=>$row_num,"max_row"=>$config['per_page']));


		//$data['query'] = $this->model_main->display_query($this->session->userdata("_account"),$where,$limit);

		$data['records'] = $this->model_main->all_archive($this->session->userdata("ooh_account"),$where,$limit);

		$this->load->view("archive",$data);

	}


	public function page(){

		$row_num = ($this->uri->segment(3) == null ? 0 : $this->uri->segment(3));

		$tofilter = array();

		$this->index($tofilter,$row_num);
	}


	public function filter(){

		$row_num = ($this->uri->segment(3) == null ? 0 : $this->uri->segment(3));

		$tofilter = array(
			"orderno" => $this->input->post("filter_orderno")
		);

		$this->index($tofilter,$row_num);
	}


	public function unarchive(){

		$id = $this->uri->segment(3);

		$account = $this->session->userdata("ooh_account");

		$update_entry = array(

			"archive" => "",
		);

		$this->db->where("id",$id);
		$this->db->update("tbl_$account",$update_entry);

		redirect(base_url("archive"));

	}


}

?>