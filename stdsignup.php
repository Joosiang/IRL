<?php include("includes/header.php");


if (isset($_POST['submit'])) {
	$error = [];
	$min   = 3;
	$max   = 20;

	// Getting data from POST
	$first_name       = $_POST['first_name'];
	$last_name        = $_POST['last_name'];
	$year_enrolled    = $_POST['year_enrolled'];
	$school_name      = $_POST['school_name'];
	$contact          = $_POST['contact'];
	$sid          	  = $_POST['sid'];
	$password         = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

	// Validation
	if (strlen($first_name) < $min) {
		$error[] = " Your First Name can not be less than {$min} characters ";
	}

	if (strlen($first_name) > $max) {
		$error[] = " Your First Name can not be greater than {$max} characters ";
	}

	if (strlen($last_name) < $min) {
		$error[] = " Your Last Name can not be less than {$min} characters ";
	}

	if (strlen($last_name) > $max) {
		$error[] = " Your Last Name can not be greater than {$maz} characters ";
	}

	if (username_exists($contact)) {
		$error[] = " Sorry that contact is already exist ";
	}

	if ($password !== $confirm_password) {
		$error[] = " Your password does not match ";
	}

	if (!empty($error)) {
		foreach ($error as $errors) {
			validation_errors($errors);
		}
	} else {
		if (register_user1($first_name, $last_name, $school_name, $year_enrolled, $contact, $password, $sid)) {
			set_message("<p class = 'bg-success text-center'>Register Successfully!!!!</p>");
			// Store data in session
			$_SESSION['username'] = $sid;
			$_SESSION['role'] = 3;

			// Redirect to lecturer home
			redirect("Student/home.php");
		} else {
			set_message("<p class = 'bg-danger text-center'>Sorry we could not register the user Please try again</p>");
			redirect("stdsignup.php");
		}
	}
}

function register_user1($first_name, $last_name, $school_name, $year_enrolled, $contact, $password, $sid)
{
	$first_name 		= escape($first_name);
	$last_name          = escape($last_name);
	$school_name        = escape($school_name);
	$year_enrolled      = escape($year_enrolled);
	$password           = escape($password);
	$contact            = escape($contact);
	$sid            	= escape($sid);

	if (username_exists($sid)) {
		return false;
	} else {
		// Password Hashing
		$password = md5($password);

		// SQL Query Insert data 
		$sql  = " INSERT INTO tbl_student(studentId, fName, lName , school, yearEnrolled, contactNo, status) ";
		$sql .= " VALUES('$sid','$first_name','$last_name','$school_name','$year_enrolled','$contact', 'pending')";
		$result = query($sql);
		confirm($result);

		// SQL Query Insert data 
		$sql2 = "INSERT INTO tbl_user(username, contactNo, password, roleId) ";
		$sql2 .= " VALUES('$sid','$contact','$password', 3)";
		$result2 = query($sql2);
		confirm($result2);

		return true;
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<div class="row justify-content-md-center">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-login">
				<div class="panel-heading">
					<div class="row mt-3">
						<!-- navigation start -->
						<ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">
							<li class="nav-item"> <a class="nav-link " id="pills-lec-tab" href="lecsignup.php">Sign Up For Lecturer</a> </li>
							<li class="nav-item"> <a class="nav-link active" id="pills-student-tab" href="stdsignup.php">Sign Up For Student</a> </li>
						</ul>
						<!-- navigation ends -->
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<!-- form start -->
							<form id="register-form" method="post" role="form">
								<div class="form-group">
									<input type="text" name="first_name" id="first_name" tabindex="1" class="form-control" placeholder="First Name" value="" required> </div>
								<div class="form-group">
									<input type="text" name="last_name" id="last_name" tabindex="2" class="form-control" placeholder="Last Name" value="" required> </div>
								<div class="form-group">
									<input type="text" name="sid" id="sid" tabindex="4" class="form-control" placeholder="Student Id" value="" required> </div>
								<div class="form-group">
									<input type="text" name="school_name" id="school_name" tabindex="5" class="form-control" placeholder="School Name" value="" required> </div>
								<div class="form-group">
									<input type="text" name="year_enrolled" id="year_enrolled" tabindex="6" class="form-control" placeholder="Year of Enrollment" value="" required> </div>
								<div class="form-group">
									<input type="text" name="contact" id="contact" tabindex="7" class="form-control" placeholder="contact No" required> </div>
								<div class="form-group">
									<input type="password" name="password" id="password" tabindex="8" class="form-control" placeholder="Password" required> </div>
								<div class="form-group">
									<input type="password" name="confirm_password" id="confirm-password" tabindex="9" class="form-control" placeholder="Confirm Password" required> </div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input class="btn btn-danger btn-sm" type="submit" name="submit" id="submit" tabindex="10" class="form-control btn btn-register" value="Register Now"> </div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<footer>
		<div class="row">
			<div class="col-lg-12  bg-light pt-2">
				<p class="text-center">© 2020. All Rights Reserved | <span class="text-primary">IRL Content Management System</span></p>
			</div>
		</div>
	</footer>
	<!-- Footer ends -->

</body>

<!-- jQuery -->
<script src="js/jquery-3.5.1.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap/bootstrap.min.js"></script>

</html>