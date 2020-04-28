<?php


//Fundamental Steps to connect to database in php

//Credentials
$dbhost = "localhost";
$dbuser = "yash";
$dbpass = "12345";
$dbname = "wds";

//1.Create a Database Connection

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//2. Perfrom DB Query

$query = "select * from customer;";
$result_set = mysqli_query($connection, $query);

//3. Use Data
while($customer = mysqli_fetch_assoc($result_set)){
	echo $subject["c_id"] . "<br />";
}

///4. Release Data
$mysqli_free_result($result_set);

//5. Close Db Connection


mysqli_close($connection);

?>