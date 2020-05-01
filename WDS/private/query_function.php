<?php

	function find_all($table_name){
		global $db;
		$sql_query = " SELECT * FROM $table_name ";
		$sql_query .= "ORDER BY 1 ;";
		$result = mysqli_query($db, $sql_query);
		return $result;
	}

	function find_record($table_name,$key_name,$id){
		global $db;
		$sql = "SELECT * FROM $table_name ";
  		$sql .="WHERE $key_name='" . db_escape($db,$id) . "';";
  		$result = mysqli_query($db, $sql);
  		confirm_result_set($result);

  		$parcel = mysqli_fetch_assoc($result);

  		mysqli_free_result($result);
  		return $parcel;
	
	}

	function find_vehicle_driver_record($id,$id2){
		global $db;  
 		$sql = "SELECT * FROM vehicle_driver ";
  		$sql .="WHERE Vin='" . db_escape($db,$id) . "' AND License_no='" . db_escape($db,$id2) . "';";
  
  		$result = mysqli_query($db, $sql);
  		confirm_result_set($result);

 		$parcel = mysqli_fetch_assoc($result);

		mysqli_free_result($result);  
		return $parcel;
	}

	function delete_record($table_name,$key_name,$id){
		global $db;

	$sql = "DELETE FROM $table_name ";
	$sql .="WHERE $key_name='" . db_escape($db,$id) . "' ";
	$sql .="LIMIT 1;";

	$result = mysqli_query($db, $sql);

	if($result){
		return true;
	} else{
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}

	}

	function delete_vehicle_driver_record($id,$id2){
		global $db;
		$sql = "DELETE FROM vehicle_driver ";
		$sql .="WHERE Vin='" . db_escape($db,$id) . "' AND License_no='" . db_escape($db,$id2) . "';";

	$result = mysqli_query($db, $sql);

	if($result){
		return true;
	} else{
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}


	}
	
	function validate_customer($customer) {
	$errors = [];

    if(is_blank($customer['Cid'])) {
      $errors[] = "Cid cannot be blank.";
    } 
   //  elseif(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
//       $errors[] = "Name must be between 2 and 255 characters.";
//     }
    return $errors;
	}

?>