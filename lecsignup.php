<?php include("includes/header.php");

if (isset($_POST['submit'])) {

	$error = [];
	$min   = 3;
	$max   = 20;

	// Getting data from POST
	$name             = $_POST['name'];
	$date_joined      = $_POST['date_joined'];
	$office_loc       = $_POST['office_loc'];
	$contact          = $_POST['contact'];
	$password         = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$lecId 			  = $_POST['lecId'];

	// Validation
	if (strlen($name) < $min) {
		$error[] = " Your Name can not be less than {$min} characters ";
	}

	if (strlen($name) > $max) {
		$error[] = " Your Name can not be greater than {$max} characters ";
	}

	if (strlen($contact) < $min) {
		$error[] = " Your Contact No can not be less than {$min} characters ";
	}

	if (strlen($contact) > $max) {
		$error[] = " Your Contact No can not be greater than {$maz} characters ";
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
		if (register_user2($lecId, $name, $office_loc, $date_joined, $contact, $password)) {
			set_message("<p class = 'bg-success text-center'>Register Successfully!!!!</p>");
			// Store data in session
			$_SESSION['username'] = $lecId;

			// Redirect to lecturer home
			redirect("Lecturer/home.php");
		} else {
			set_message("<p class = 'bg-danger text-center'>Sorry we could not register the user Please try again</p>");
			redirect("lecsignup.php");
		}
	}
}


function register_user2($lecId, $name, $office_loc, $date_joined, $contact, $password)
{
	$name 			     = escape($name);
	$office_loc          = escape($office_loc);
	$date_joined         = escape($date_joined);
	$password            = escape($password);
	$contact             = escape($contact);
	$lecId				 = escape($lecId);

	if (username_exists($lecId)) {

		return false;
	} else {
		// Password Hashing
		$password = md5($password);

		// SQL Query Insert data 
		$sql  = " INSERT INTO tbl_lecturer(staffId, name, officeLocation , dateJoined, contactNo) ";
		$sql .= " VALUES('$lecId','$name','$office_loc','$date_joined','$contact')";
		$result = query($sql);
		confirm($result);

		// SQL Query Insert data 
		$sql2 = "INSERT INTO tbl_user(username, contactNo, password, roleId) ";
		$sql2 .= " VALUES('$lecId', '$contact','$password', 2)";
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
							<li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" href="lecsignup.php">Sign Up For Lecturer</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-profile-tab" href="stdsignup.php">Sign Up For Student</a>
							</li>
						</ul>
						<!-- navigation start -->
					</div>
					<hr>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<!-- form start -->
							<form id="register-form" method="post" role="form">
								<div class="form-group">
									<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" value="" required>
								</div>
								<div class="form-group">
									<input type="text" name="lecId" id="lecId" tabindex="2" class="form-control" placeholder="Lecturer Id" value="" required>
								</div>
								<div class="form-group">
									<input type="text" name="office_loc" id="office_loc" tabindex="4" class="form-control" placeholder="Office Location" value="" required>
								</div>
								<div class="form-group">
									<input type="date" name="date_joined" id="date_joined" tabindex="5" class="form-control" placeholder="Joining Date" value="" required>
								</div>
								<div class="form-group">
									<input type="text" name="contact" id="contact" tabindex="6" class="form-control" placeholder="contact No" required>
								</div>
								<div class="form-group">
									<input type="password" name="password" id="password" tabindex="7" class="form-control" placeholder="Password" required>
								</div>
								<div class="form-group">
									<input type="password" name="confirm_password" id="confirm-password" tabindex="8" class="form-control" placeholder="Confirm Password" required>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input class="btn btn-danger btn-sm" type="submit" name="submit" id="submit" tabindex="9" class="form-control btn btn-register" value="Register Now">
										</div>
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
			<div class="col-lg-12 bg-light pt-2">
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