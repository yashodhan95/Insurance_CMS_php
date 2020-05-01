<?php require_once('../../../private/initialize.php'); 

if(is_post_request()){

  $Vin = $_POST['Vin'] ?? '';
  $V_make = $_POST['V_make'] ?? '';
  $V_model = $_POST['V_model'] ?? '';
  $V_year = $_POST['V_year'] ?? '';
  $V_status = $_POST['V_status'] ?? '';
  $Policy_no = $_POST['Policy_no'] ?? '';
	
	$sql = "Insert into vehicle ";
	$sql .= "(Vin, V_make, V_model, V_year, V_status, Policy_no) ";
	$sql .= "values (";
	$sql .= "'" . $Vin . "',";
	$sql .= "'" . $V_make . "',";
	$sql .= "'" . $V_model . "',";
	$sql .= "'" . $V_year . "',";
	$sql .= "'" . $V_status . "',";
	$sql .= "'" . $Policy_no . "'";
		$sql .= ")";

	$result = mysqli_query($db, $sql);
	//for insert statement the result is True or False

	if($result){
		$new_id = mysqli_insert_id($db);
		redirect_to(url_for('/staff/vehicle/show.php?id=' . $Vin));

	} else {
		//insert failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}
else{
	redirect_to(url_for('/staff/vehicle/new.php'));
	}

?>