<?php
include 'includes/header.php';

if (isset($_POST['submit'])) {
	// Assign POST data
	$serial        = $_POST['serial'];
	$model         = $_POST['model'];
	$processor     = $_POST['processor'];
	$os           = $_POST['os'];
	$hdd           = $_POST['hdd'];
	$ram           = $_POST['ram'];
	$made          = $_POST['made'];


	if (add_notebook($serial, $model, $processor, $os, $hdd, $ram, $made)) {
		set_message("<p class = 'bg-success text-center'>Register Successfully!!!!</p>");
		redirect("manage_notebook.php");
	} else {
		set_message("<p class = 'bg-danger text-center'>Sorry we could not register the project Please try again</p>");
		redirect("add_notebook.php");
	}
}

// Add Notebook function
function add_notebook($serial, $model, $processor, $os, $hdd, $ram, $made)
{
	$serial			       = escape($serial);
	$model             = escape($model);
	$processor         = escape($processor);
	$os                = escape($os);
	$hdd               = escape($hdd);
	$ram               = escape($ram);
	$made               = escape($made);

	// SQL query
	$sql  = " INSERT INTO tbl_notebook(serialNo, model, processor, os, hardDisk, ram ,make) ";
	$sql .= " VALUES('$serial','$model','$processor','$os','$hdd','$ram','$made' )";
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
				<div class="col-lg-12">
					<h1 class="page-header">
						Add Notebook
					</h1>
					<form action="add_notebook.php" method="post">
						<div class="col-md-6 col-md-offset-3">
							<div class="form-group">
								<label for="title">Serial No.</label>
								<input type="text" name="serial" class="form-control"> </div>
							<div class="form-group">
								<label for="company">Made by</label>
								<input type="text" name="made" class="form-control"> </div>
							<div class="form-group">
								<label for="sdate">Model</label>
								<input type="text" name="model" class="form-control"> </div>
							<div class="form-group">
								<label for="edate">Processor</label>
								<input type="text" name="processor" class="form-control"> </div>
							<div class="form-group">
								<label for="budget">OS</label>
								<input type="text" name="os" class="form-control"> </div>
							<div class="form-group">
								<label for="password">Hard Disk Capacity</label>
								<input type="text" name="hdd" class="form-control"> </div>
							<div class="form-group">
								<label for="desc">RAM Size</label>
								<input type="text" name="ram" class="form-control"> </div>
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
<?php include 'includes/footer.php' ?>