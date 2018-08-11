<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<title><?php echo $this->config->item('web_name') ?> ASEC | Service Order Form </title>

	<link rel="icon" type="image/png" href="<?php echo base_url('asec.ico') ?>">	
	<link rel="stylesheet" href="<?php echo base_url('css/normalize.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('css/main.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui.css') ?>">
	<script src="<?php echo base_url('js/jquery-1.11.0.min.js') ?>"></script>
	<script src="<?php echo base_url('js/jquery-ui.js') ?>"></script>

<script type="text/javascript">

	$(document).ready(function(){

	//let's create arrays
	var vinyl = [
		{display: "", value: "" },
	    {display: "10x22.6 15 inch bleed 3 inch pocket", value: "10x22_15b_3p" },
	    {display: "10x20 3 inch bleed 3 inch pocket", value: "10x20_3b_3p" },
	    {display: "10x24 3 inch bleed 3 inch pocket", value: "10x24_3b_3p" },
	    {display: "12x24 3 inch bleed 3 inch pocket", value: "12x24_3b_3p" },
	    {display: "12x40 3 inch bleed 3 inch pocket", value: "12x40_3b_3p" },
	    {display: "12x20 3 inch bleed 3 inch pocket", value: "12x20_3b_3p" },
	    {display: "12x44 3 inch bleed 3 inch pocket", value: "12x44_3b_3p" },
	    {display: "10x36 3 inch bleed 3 inch pocket", value: "10x36_3b_3p" },
	    {display: "12x50 3 inch bleed 3 inch pocket", value: "12x50_3b_3p" },
	    {display: "12x48 3 inch bleed 3 inch pocket", value: "12x48_3b_3p" },
	    {display: "10x40 3 inch bleed 3 inch pocket", value: "10x40_3b_3p" },
	    {display: "14x48 3 inch bleed 3 inch pocket", value: "14x48_3b_3p" },
	    {display: "10x28 3 inch bleed 3 inch pocket", value: "10x28_3b_3p" },
	    {display: "10x30 3 inch bleed 3 inch pocket", value: "10x30_3b_3p" },
	    {display: "10x36 3 inch bleed 3 inch pocket", value: "10x36_3b_3p" }
	];
	   
	var poster = [
		{display: "", value: "" },
		{display: "30 sheet bleed poster (10'5 x 22'8) (Most common)", value: "30sbp" },
		{display: "8 sheet bleed poster (5' x 11') (Most common)", value: "8sbp" }
	];
	   
	var oddsizes = [
		{display: "", value: "" },
		{display: "8x12 3 inch bleed 3 inch pocket", value: "8x12_3b_3p"},
		{display: "6x12 3 inch bleed 3 inch pocket", value: "6x12_3b_3p" },
		{display: "8'2x12 3 inch bleed 3 inch pocket", value: "82x12_3b_3p" },
		{display: "14x12 3 inch bleed 3 inch pocket", value: "14x12_3b_3p" },
		{display: "8x16 3 inch bleed 3 inch pocket", value: "8x16_3b_3p" },
		{display: "6x16 3 inch bleed 3 inch pocket", value: "6x16_3b_3p" },
		{display: "8x18 3 inch bleed 3 inch pocket", value: "8x18_3b_3p" }
	];

	var trivision = [
		{display: "", value: "" },
		{display: "10x30 (50 louvers)", value: "10x30_50l" },
		{display: "12x24 (48 louvers)", value: "12x24_48l" }
	]

	var led = [
		{display: "", value: "" },
		{display: "10x30 LED/Digital", value: "10x30_LED" },
		{display: "10'6x36 LED/Digital", value: "10-6x36_LED" },
		{display: "12x25 LED/Digital", value: "12x25_LED" }
	]

	//If parent option is changed
	$("#parent1").change(function() {
        var parent = $(this).val(); //get option value from parent
       
        switch(parent){ //using switch compare selected option and populate child
              case 'VNYL':
                list1(vinyl);
                break;
              case 'TRIV':
                list1(trivision);
                break;             
              case 'POST':
                list1(poster);
                break;
              case 'ODDS':
                list1(oddsizes);
                break;
              case 'LED':
                list1(led);
                break;
            default: //default child option is blank
                $("#child1").html('');  
                break;
           }
	});

	//function to populate child select box
	function list1(array_list)
	{
	    $("#child1").html(""); //reset child options
	    $(array_list).each(function (i) { //populate child options
	        $("#child1").append("<option value=\""+array_list[i].value+"\">"+array_list[i].display+"</option>");
	    });
	}


	//Board 2
	//If parent option is changed
	$("#parent2").change(function() {
        var parent = $(this).val(); //get option value from parent
       
        switch(parent){ //using switch compare selected option and populate child
              case 'VNYL':
                list2(vinyl);
                break;
              case 'TRIV':
                list2(trivision);
                break;             
              case 'POST':
                list2(poster);
                break;
              case 'ODDS':
                list2(oddsizes);
                break;
              case 'LED':
                list2(led);
                break;
            default: //default child option is blank
                $("#child2").html('');  
                break;
           }
	});

	//function to populate child select box
	function list2(array_list)
	{
	    $("#child2").html(""); //reset child options
	    $(array_list).each(function (i) { //populate child options
	        $("#child2").append("<option value=\""+array_list[i].value+"\">"+array_list[i].display+"</option>");
	    });
	}


	//Board 3
	//If parent option is changed
	$("#parent3").change(function() {
        var parent = $(this).val(); //get option value from parent
       
        switch(parent){ //using switch compare selected option and populate child
              case 'VNYL':
                list3(vinyl);
                break;
              case 'TRIV':
                list3(trivision);
                break;             
              case 'POST':
                list3(poster);
                break;
              case 'ODDS':
                list3(oddsizes);
                break;
              case 'LED':
                list3(led); 
                break;
            default: //default child option is blank
                $("#child3").html('');  
                break;
           }
	});

	//function to populate child select box
	function list3(array_list)
	{
	    $("#child3").html(""); //reset child options
	    $(array_list).each(function (i) { //populate child options
	        $("#child3").append("<option value=\""+array_list[i].value+"\">"+array_list[i].display+"</option>");
	    });
	}

	});
</script>

<script>
	
	$(function(){
		$("#dateship").datepicker({
			dateFormat: "yy-mm-dd",
		});
	});

 $(function() {
$( "#dialog-confirm" ).dialog({
resizable: false,
height:140,
modal: true,
buttons: {
"Are you sure want to delete entry": function() {
$( this ).dialog( "close" );
},
Cancel: function() {
$( this ).dialog( "close" );
}
}
});
});

</script>

<script>

	$(document).ready(function(){

		$('.add_more').click(function(e){
			e.preventDefault();
			$(this).before("<p><input type='file' name='file[]'/></p>");
		});
	});

</script>

</head>

<body>
	
	<div class="main_container">

		<div class="content">

			<div class="container clear">
				<a href="<?php echo base_url('main') ?>"><img src="<?php echo base_url('images/asecint.png') ?>" alt="service order form"></a>
			</div>

			<div class="container" style="float:right;">
				<div class="nav">
					<?php if($this->session->userdata("sof_usertype") == "USRADM"){ ?>
					<div class="nav_item"><a href="<?php echo base_url('order') ?>">create new order</a></div>
					<?php } ?>
					<!-- <div class="nav_item"><a href="<?php echo base_url('main') ?>">current orders</a></div>
					<div class="nav_item"><a href="<?php echo base_url('archive') ?>">archived orders</a></div> -->
					<div class="nav_item"><a href="<?php echo base_url('change_password') ?>">change password</a></div>
					<div class="nav_item"><a href="<?php echo base_url('main/logout') ?>">log-out</a></div>
				</div>
			</div>

			<div class="clear"></div>

