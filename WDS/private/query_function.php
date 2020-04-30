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
  		$sql .="WHERE $key_name='" . "$id" . "';";
  		$result = mysqli_query($db, $sql);
  		confirm_result_set($result);

  		$parcel = mysqli_fetch_assoc($result);

  		mysqli_free_result($result);
  		return $parcel;
	
	}

	function find_vehicle_driver_record($id,$id2){
		global $db;  
 		$sql = "SELECT * FROM vehicle_driver ";
  		$sql .="WHERE Vin='" . $id . "' AND License_no='" . $id2 . "';";
  
  		$result = mysqli_query($db, $sql);
  		confirm_result_set($result);

 		$parcel = mysqli_fetch_assoc($result);

		mysqli_free_result($result);  
		return $parcel;
	}


?>