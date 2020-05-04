<?php require_once('../../../private/initialize.php'); 

if(is_post_request()){

	$Invoice_id = $_POST['Invoice_id'] ?? '';
	$Invoice_amt = $_POST['Invoice_amt'] ?? '';
	$Policy_no = $_POST['Policy_no'] ?? '';
	$Due_Date = $_POST['Due_Date'] ?? '';
	
	
	$sql = "Insert into invoice ";
	$sql .= "(Invoice_id, Invoice_amt, Policy_no, Due_Date) ";
	$sql .= "values (";
	$sql .= "'" . $Invoice_id . "',";
	$sql .= "'" . $Invoice_amt . "',";
	$sql .= "'" . $Policy_no . "',";
	$sql .= "'" . $Due_Date . "'";
	
	$sql .= ")";

	$result = mysqli_query($db, $sql);
	//for insert statement the result is True or False

	if($result){
		$new_id = mysqli_insert_id($db);
		redirect_to(url_for('/staff/invoice/show.php?id=' . $Invoice_id));

	} else {
		//insert failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}
else{
	redirect_to(url_for('/staff/invoice/new.php'));
	}

?>