<?php
include 'includes/header.php';

// Get category data
$sql  = " SELECT * FROM tbl_category ";
$result = query($sql);


if (isset($_POST['submit'])) {
  // Store POST data
  $title           = $_POST['title'];
  $dpur            = $_POST['dpur'];
  $licence         = $_POST['licence'];
  $price           = $_POST['price'];
  $publisher       = $_POST['publisher'];
  $version         = $_POST['version'];
  $category         = $_POST['category'];

  if (add_sw($title, $dpur, $licence, $price, $publisher, $version, $category)) {
    set_message("<p class = 'bg-success text-center'>Register Successfully!!!!</p>");
    redirect("manage_software.php");
  } else {
    set_message("<p class = 'bg-danger text-center'>Sorry we could not register the project Please try again</p>");
    redirect("addsw.php");
  }
}

// Add software function
function add_sw($title, $dpur, $licence, $price, $publisher, $version, $category)
{
  $title                 = escape($title);
  $dpur                 = escape($dpur);
  $licence              = escape($licence);
  $price                = escape($price);
  $publisher            = escape($publisher);
  $version              = escape($version);
  $category             = escape($category);


  // SQL queries
  $sql  = " INSERT INTO tbl_software(title, dateOfPurchase ,noOfLicense, pricePerLicense,publisher, version) ";
  $sql .= " VALUES('$title','$dpur',$licence,$price,'$publisher','$version')";
  $result = query($sql);
  confirm($result);

  $lastid = lastid();

  $sql2 = "INSERT INTO tbl_software_categories(softwareId, catId)";
  $sql2 .= "VALUES('$lastid', '$category')";

  if ($result2 = query($sql2)) {
    confirm($result2);
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
            Add Software
          </h1>
          <form method="post">
            <div class="col-md-6 col-md-offset-3">

              <div class="form-group">
                <label for="title">Software Title</label>
                <input type="text" name="title" class="form-control">
              </div>

              <div class="form-group">
                <label for="publisher">Publisher</label>
                <input type="text" name="publisher" class="form-control">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Select Category </label>

                <select class="form-control " id="ddl_ver" name="category">

                  <option>Select Options</option>
                  <?php

                  while ($row = mysqli_fetch_array($result)) {
                  ?>

                    <option value="<?php echo $row['catId'] ?>"><?php echo $row['type']; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="licence">No. of Licence</label>
                <input type="text" name="licence" class="form-control">
              </div>
              <div class="form-group">
                <label for="dpur">Date Purchase</label>
                <input type="date" name="dpur" class="form-control">
              </div>
              <div class="form-group">
                <label for="Price">Price</label>
                <input type="text" name="price" class="form-control">
              </div>
              <div class="form-group">
                <label for="version">Version</label>
                <input type="text" name="version" class="form-control">
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