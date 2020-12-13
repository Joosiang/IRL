<?php
include 'includes/header.php';

// Sql query
$sql  = " SELECT * FROM tbl_lecturer_project ";
$result = query($sql); ?>

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
        <div class="row">
          <div class="col-lg-12">
            <p class="bg-success">
              <?php
              ?>
            </p>
            <h1 class="page-header">
              Manage Lecturer
            </h1>
            <div class="col-md-12">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Staff Id</th>
                    <th>Lecturer Name</th>
                    <th>Contact No</th>
                    <th>Date Joined</th>
                    <th>Office Location</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = mysqli_fetch_array($result)) {
                  ?>

                    <tr>
                      <td>
                        <?php
                        echo $row['staffId'];
                        ?>
                      </td>
                      <td><?php
                          $lecid = $row['staffId'];
                          // Sql query
                          $sql_lec = "SELECT name FROM tbl_lecturer AS tl 
                                        INNER JOIN tbl_lecturer_project AS tlp ON tl.staffId=tlp.staffId WHERE tl.staffId= '" . $lecid . "' ";
                          $result_lec = query($sql_lec);
                          $row_lec = mysqli_fetch_array($result_lec);

                          ?>
                        <?php
                        echo $row_lec['name'];
                        ?>
                      </td>
                      <td>
                        <?php
                        $proid = $row['projectId'];
                        // Sql query
                        $sql_proj = "SELECT contactNo FROM tbl_lecturer AS tl
                                            INNER JOIN tbl_lecturer_project AS tlp ON tl.staffId=tlp.staffId WHERE tlp.projectId= '" . $proid . "' ";
                        $result_proj = query($sql_proj);
                        while ($row_proj = mysqli_fetch_array($result_proj)) {
                        ?>
                        <?php
                          echo $row_proj['contactNo'];
                        } ?></td>
                      <td>
                        <?php
                        $proid = $row['projectId'];
                        // Sql query
                        $sql_proj = "SELECT dateJoined FROM tbl_lecturer AS tl
                                            INNER JOIN tbl_lecturer_project AS tlp ON tl.staffId=tlp.staffId WHERE tlp.projectId= '" . $proid . "' ";
                        $result_proj = query($sql_proj);
                        while ($row_proj = mysqli_fetch_array($result_proj)) {
                        ?>
                        <?php
                          echo $row_proj['dateJoined'];
                        } ?>
                      </td>
                      <td>
                        <?php
                        $proid = $row['projectId']; 
                        // Sql query
                        $sql_proj = "SELECT officeLocation FROM tbl_lecturer AS tl
                                            INNER JOIN tbl_lecturer_project AS tlp ON tl.staffId=tlp.staffId WHERE tlp.projectId= '" . $proid . "' ";
                        $result_proj = query($sql_proj);
                        while ($row_proj = mysqli_fetch_array($result_proj)) {
                        ?>
                        <?php
                          echo $row_proj['officeLocation'];
                        } ?>
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