<?php require_once('../../../private/initialize.php'); 

if(is_post_request()){

  $Instal_ID = $_POST['Instal_ID'] ?? '';
  $Instal_amt = $_POST['Instal_amt'] ?? '';
  $Pay_date = $_POST['Pay_date'] ?? '';
  $Pay_method = $_POST['Pay_method'] ?? '';
  $Invoice_id = $_POST['Invoice_id'] ?? '';
	
	$sql = "Insert into payment ";
	$sql .= "(Instal_ID, Instal_amt, Pay_date, Pay_method, Invoice_id) ";
	$sql .= "values (";
	$sql .= "'" . $Instal_ID . "',";
	$sql .= "'" . $Instal_amt . "',";
	$sql .= "'" . $Pay_date . "',";
	$sql .= "'" . $Pay_method . "',";
	$sql .= "'" . $Invoice_id . "'";
		$sql .= ")";

	$result = mysqli_query($db, $sql);
	//for insert statement the result is True or False

	if($result){
		$new_id = mysqli_insert_id($db);
		redirect_to(url_for('/staff/payment/show.php?id=' . $Instal_ID));

	} else {
		//insert failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}
else{
	redirect_to(url_for('/staff/payment/new.php'));
	}

?>