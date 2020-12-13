<?php
//database connection string
$con = mysqli_connect('localhost','root','','irl');

function row_count($result) // row count function
{
	return mysqli_num_rows( $result);
}

function escape($string) // escape function
{
	global $con;
	return mysqli_real_escape_string($con,$string);
}


function query( $query){  // run query function
global $con;
return mysqli_query($con,$query);
}

 function fetch_array($result) // fetch_array function
{
	# code...
	global $con;
	return mysqli_fetch_array($result);
}


 function confirm($result) // query excuited check function
{
	# code...
	global $con;
	if (!$result) {
		die("QUERY FAILED".mysqli_error($con));
	}
}

function lastId(){ // get last id of row inserted
	global $con;
	return mysqli_insert_id($con);
}
?>