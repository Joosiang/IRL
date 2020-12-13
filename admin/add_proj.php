<?php
include 'includes/header.php';

if (isset($_POST['submit'])) {
	// Assign POST data
	$title      = $_POST['title'];
	$sdate      = $_POST['sdate'];
	$edate      = $_POST['edate'];
	$cname      = $_POST['cname'];
	$desc       = $_POST['desc'];
	$budget     = $_POST['budget'];

	if (add_proj($title, $cname, $sdate, $edate, $desc, $budget)) {
		set_message("<p class = 'bg-success text-center'>Register Successfully!!!!</p>");
		redirect("home.php");
	} else {
		set_message("<p class = 'bg-danger text-center'>Sorry we could not register the project Please try again</p>");
		redirect("add_proj.php");
	}
}

// Add project function
function add_proj($title, $cname, $sdate, $edate, $desc, $budget)
{
	$title 			     = escape($title);
	$cname               = escape($cname);
	$sdate               = escape($sdate);
	$edate               = escape($edate);
	$desc                = escape($desc);
	$budget              = escape($budget);

	// SQL query
	$sql  = " INSERT INTO tbl_project(projectTitle,startDate ,endDate, description,companyName, budget) ";
	$sql .= " VALUES('$title','$sdate','$edate','$desc','$cname','$budget' )";
	if ($result = query($sql)) {
		confirm($result);
		return true;
	} else {
		echo "Not Saved";
		return false;
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
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 mt-3">
					<h3 class="page-header">
						Add Project
					</h3>
					<form action="add_proj.php" method="post">
						<div class="col-md-6 col-md-offset-3">
							<div class="form-group">
								<label for="title">Project Title</label>
								<input type="text" name="title" class="form-control"> </div>
							<div class="form-group">
								<label for="company">Company Name</label>
								<input type="text" name="cname" class="form-control"> </div>
							<div class="form-group">
								<label for="sdate">Start Date</label>
								<input type="date" name="sdate" class="form-control"> </div>
							<div class="form-group">
								<label for="edate">End Date</label>
								<input type="date" name="edate" class="form-control"> </div>
							<div class="form-group">
								<label for="budget">Budget</label>
								<input type="text" name="budget" class="form-control"> </div>
							<div class="form-group">
								<label for="desc">Description:</label>
								<textarea class="form-control" rows="5" id="desc" name="desc"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" name="submit" class="btn btn-primary pull-right"> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

<?php include 'includes/footer.php'; ?>