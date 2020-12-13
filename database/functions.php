<?php

/*********** helper functions ************/

function clean($string) // clean html data inputs
{
	return htmlentities($string);
}

function redirect($location) // redirects function
{
	return header('Location:' . $location);
}

function set_message($message) // set message function
{
	if (!empty($message)) {
		$_SESSION['message'] = $message;
	} else {
		$message = "";
	}
}

function display_message() // display message function
{
	if (isset($_SESSION['message'])) {

		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}


function validation_errors($error_message) // validate function
{
	echo '<div class="alert alert-danger alert-dismissible " role="alert">
  <strong>Warning!</strong> ' . $error_message . '
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
</div>';
}


function username_exists($username) // check username exist
{
	$sql = "SELECT username FROM user WHERE  = '$username'";
	$result = query($sql);
	$row_count = row_count($result);
	if ($row_count > 0) {
		return true;
	} else {
		return false;
	}
}
?>