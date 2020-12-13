<?php include("includes/header.php"); ?>

<?php
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

        <!-- Page Heading -->
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
              <!-- Table start -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Staff Id</th>
                    <th>Lecturer Name</th>
                    <th>Project Title</th>
                    <th>Students Name</th>
                    <th>Date Joined</th>
                    <th>Office Location</th>
                    <th>Time Spend</th>
                    <th>Edit/Delete</th>
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
                          $lecid = $row['staffId']; // StaffId
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
                        $proid = $row['projectId']; // Project Id
                        // Sql query
                        $sql_proj = "SELECT projectTitle FROM tbl_project AS tp
                                            INNER JOIN tbl_lecturer_project AS tlp ON tp.projectNo=tlp.projectId WHERE tp.projectNo= '" . $proid . "' ";
                        $result_proj = query($sql_proj);
                        while ($row_proj = mysqli_fetch_array($result_proj)) {
                        ?>
                          <?php
                          echo $row_proj['projectTitle'];
                         ?>
                        <?php
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        $proj_id = $row['projectId']; // Project Id
                        // Sql query
                        $sql_std = "SELECT fName, lName FROM tbl_student AS ts
                        INNER JOIN  tbl_project_student AS tps ON ts.studentId=tps.studentId
                        WHERE tps.projectId = '$proj_id' ";
                        $result_std = query($sql_std);
                        while ($row_std = mysqli_fetch_array($result_std)) {
                        ?>
                          <?php
                          echo $row_std['fName'];
                          echo " ";
                          echo $row_std['lName'];
                          ?>
                        <?php
                        } ?></td>
                      <td>
                        <?php
                        $proid = $row['projectId']; // Project Id
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
                        $proid = $row['projectId']; // Project Id
                        // Sql query
                        $sql_proj = "SELECT officeLocation FROM tbl_lecturer AS tl
                                            INNER JOIN tbl_lecturer_project AS tlp ON tl.staffId=tlp.staffId WHERE tlp.projectId= '" . $proid . "' ";
                        $result_proj = query($sql_proj);
                        while ($row_proj = mysqli_fetch_array($result_proj)) {
                        ?>
                        <?php
                          echo $row_proj['officeLocation'];
                        } ?></td>
                      <td><?php echo   $row['time_spent']; ?>
                      </td>
                      <td>
                        <div class="action_links">
                          <!-- Edit and Delete -->
                          <a href="edit_lecturer.php?prid=<?php echo  $row['projectId']; ?>&lecId=<?php echo  $row['staffId']; ?>">Edit</a>
                          <a href="del_lecturer.php?prid=<?php echo  $row['projectId']; ?>&lecId=<?php echo  $row['staffId']; ?>">Delete</a>
                        </div>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <!-- Table ends -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<?php include 'includes/footer.php' ?>