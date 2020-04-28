<?php require_once('../../../private/initialize.php'); 

if(is_post_request()){

	$Home_id = $_POST['Home_id'] ?? '';
	$Purchase_Date = $_POST['Purchase_Date'] ?? '';
	$Home_value = $_POST['Home_value'] ?? '';
	$Area = $_POST['Area'] ?? '';
	$Home_type = $_POST['Home_type'] ?? '';
	$Auto_fire = $_POST['Auto_fire'] ?? '';
	$Home_sec = $_POST['Home_sec'] ?? '';
	$Pool = $_POST['Pool'] ?? '';
	$Basement = $_POST['Basement'] ?? '';
	$Policy_no = $_POST['Policy_no'] ?? '';
	
	$sql = "Insert into home ";
	$sql .= "(Home_id, Purchase_Date, Home_value, Area, Home_type, Auto_fire, Home_sec, Pool, Basement, Policy_no) ";
	$sql .= "values (";
	$sql .= "'" . $Home_id . "',";
	$sql .= "'" . $Purchase_Date . "',";
	$sql .= "'" . $Home_value . "',";
	$sql .= "'" . $Area . "',";
	$sql .= "'" . $Home_type . "',";
	$sql .= "'" . $Auto_fire . "',";
	$sql .= "'" . $Home_sec . "',";
	$sql .= "'" . $Pool . "',";
	$sql .= "'" . $Basement . "',";
	$sql .= "'" . $Policy_no . "'";
	$sql .= ")";

	$result = mysqli_query($db, $sql);
	//for insert statement the result is True or False

	if($result){
		$new_id = mysqli_insert_id($db);
		redirect_to(url_for('/staff/home/show.php?id=' . $Home_id));

	} else {
		//insert failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}
else{
	redirect_to(url_for('/staff/home/new.php'));
	}

?>