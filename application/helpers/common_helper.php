<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed'); 


//check the session of the user
if(!function_exists("check_session")){

	function check_session($logged){

		if(!$logged){

			redirect(base_url());
		}
	}
}


if(!function_exists("set_filter")){

	function set_filter($filter_items = array()){
		
		$filter = ""; 

		foreach($filter_items as $item => $val){

			if(!$val == null){

				$filter.= " and ($item = '$val')";
			}
		} 

		return $filter; 

	}

}


if(!function_exists("set_limit")){

	function set_limit($limit = array("row_num"=>0,"max_row"=>0)){

		if(!$limit['row_num'] == null or !$limit['row_num'] <> "0"){

			$limit = "limit $limit[row_num], $limit[max_row]";
		
		}else{

			$limit = "";
		}

		return $limit; 
	}
}


if(!function_exists("open_folder")){

	function open_folder($path,$href){

		$open_path = dir($path);

		$files = "";

		while(($file = $open_path->read()) !== false ){

			if(!($file == "." or $file == "..")){

				$files.= "<p><a href='$href/$file'>$file</a></p>";
			}
		}

		$open_path->close();

		return $files;
	}
}

?>