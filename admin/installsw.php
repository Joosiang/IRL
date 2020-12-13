<?php
include 'includes/header.php';

// Notebook and software SQL query
$sql_notebook  = " SELECT * FROM tbl_notebook ";
$sql_sw  = " SELECT * FROM tbl_software ";

$result_notebook = query($sql_notebook);
$result_sw = query($sql_sw);

if (isset($_POST['submit'])) {
  $notebook      = $_POST['ddl_serial'];
  $sw            = $_POST['ddl_software'];



  if (add_installsw($notebook, $sw)) {
    set_message("<p class = 'bg-success text-center'>Register Successfully!!!!</p>");
    redirect("manage_notebook.php");
  } else {
    set_message("<p class = 'bg-danger text-center'>Sorry we could not register the project Please try again</p>");
    redirect("installsw.php");
  }
}

// Install software function
function add_installsw($notebook, $sw)
{
  $notebook       = escape($notebook);
  $sw             = escape($sw);

  $sql  = " INSERT INTO tbl_notebook_software(serialNo, softwareId) ";
  $sql .= " VALUES('$notebook','$sw' )";
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
            Installed Software
          </h1>

          <form action="installsw.php" method="post">
            <div class="col-md-6 col-md-offset-3">

              <div class="form-group">
                <label for="exampleFormControlSelect1">Select Notebook </label>

                <select class="form-control " id="ddl_serial" name="ddl_serial">

                  <option>Select Notebook Serial</option>
                  <?php

                  while ($row_notebook = mysqli_fetch_array($result_notebook)) {
                  ?>

                    <option value="<?php echo $row_notebook['serialNo'] ?>"><?php echo $row_notebook['serialNo']; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">

                <label for="exampleFormControlSelect1">Select Software </label>

                <select class="form-control " id="ddl_software" name="ddl_software">

                  <option>Select Software</option>
                  <?php

                  while ($row_sw = mysqli_fetch_array($result_sw)) {
                  ?>

                    <option value="<?php echo $row_sw['softwareId'] ?>"><?php echo $row_sw['title']; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary pull-right">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>


<?php include 'includes/footer.php' ?>