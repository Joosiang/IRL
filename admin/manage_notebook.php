<?php
include 'includes/header.php';
// Sql query
$sql  = " SELECT * FROM tbl_notebook ";
$result = query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="row" style="padding-top:20px;">
    <div id="page-wrapper">
      <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
          <div class="col-lg-12">
            <p class="bg-success">
              <?php // echo $message; 
              ?>
            </p>
            <h1 class="page-header">
              Manage Notebook
              <span><a href="installsw.php" class="btn btn-primary btn-sm">Install Software on Notebook</a></span>
            </h1>
            <div class="col-md-12">
              <!-- Table start -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Serial No.</th>
                    <th>Model</th>
                    <th>Made of</th>
                    <th>Processor</th>
                    <th>OS</th>
                    <th>RAM Size</th>
                    <th>Hard Disk</th>
                    <th>Installed Software</th>
                    <th>Edit/Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  while ($row = mysqli_fetch_array($result)) {
                  ?>

                    <tr>
                      <td><?php echo   $row['serialNo']; ?>
                      </td>

                      <td><?php echo  $row['model']; ?>
                      </td>
                      <td>
                        <?php echo  $row['make'];  ?>
                      </td>


                      <td><?php echo  $row['processor']; ?></td>
                      <td><?php echo  $row['os']; ?></td>
                      <td><?php echo  $row['ram']; ?></td>
                      <td><?php echo  $row['hardDisk']; ?></td>
                      <td><?php
                          $serial_id = $row['serialNo'];
                          $sql_swins = "SELECT * FROM tbl_notebook_software AS tns 
                                            INNER JOIN tbl_software AS ts ON tns.softwareId=ts.softwareId where tns.serialNo= '" . $serial_id . "' ";
                          $result_sw = query($sql_swins);
                          while ($row_sw = mysqli_fetch_array($result_sw)) {
                          ?>
                          <?php
                            echo $row_sw['publisher'] . " " . $row_sw['title'];
                            echo "</br> "; ?>
                        <?php
                          } ?></td>
                      <td>
                        <div class="action_links">
                          <!-- Edit and Delete -->
                          <a href="edit_notebook.php?id=<?php echo  $row['serialNo']; ?>">Edit</a>
                          <a href="del_notebook.php?id=<?php echo $row['serialNo']; ?>">Delete</a>
                        </div>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<?php include 'includes/footer.php' ?>