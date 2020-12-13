<?php
include 'includes/snavbar.php';
include '../database/init.php';

// Get session data
$lec = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container mb-4">
        <div class="row ml-2">
            <div class="col-12 mt-3 mb-3">
                <h3>Welcome, Lecturer</h3>
            </div>
            <div class="col-8">
                <!-- lecturer personal information start -->
                <div>
                    <div>
                        <h5>Personal Details</h5>
                    </div>
                    <hr>
                    <?php
                    // SQL Query
                    $sql  = "SELECT * FROM tbl_lecturer AS tl
                INNER JOIN tbl_user AS tu ON tl.contactNo = tu.contactNo
                WHERE tu.username ='" . $lec . "'";
                    $result =  mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    $lecContact = $row['contactNo'];
                    ?>
                    <div class="row">
                        <div class="col-3">
                            <h6>Name</h6>
                            <h6>Contact No</h6>
                            <h6>Staff ID</h6>
                            <h6>Office</h6>
                            <h6>Joined Date</h6>
                        </div>
                        <div class="col-9">
                            <h6 class="font-weight-light"><?php echo $row['name']; ?></h6>
                            <h6 class="font-weight-light"><?php echo $row['contactNo']; ?></h6>
                            <h6 class="font-weight-light"><?php echo $row['staffId']; ?></h6>
                            <h6 class="font-weight-light"><?php echo $row['officeLocation']; ?></h6>
                            <h6 class="font-weight-light"><?php echo $row['dateJoined']; ?></h6>
                        </div>
                    </div>
                </div>
                <!-- lecturer personal information ends -->
            </div>
            <div class="col-4">
                <!-- lecturer project information start -->
                <h5>Projects details</h5>
                <hr>
                <?php
                // SQL Query
                $sql  = "SELECT * FROM tbl_project AS tp
                INNER JOIN tbl_lecturer_project AS tlp ON tp.projectNo=tlp.projectId
                INNER JOIN tbl_lecturer AS tl ON tlp.staffId = tl.staffId
                WHERE tl.contactNo='" . $lecContact . "'";
                $result =  mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <div class="row">
                        <div class="col-4">
                            <h6>Title</h6>
                            <h6>Company</h6>
                            <h6>Start Date</h6>
                            <h6>End Date</h6>
                            <h6>Time Spent</h6>
                            <h6>Description</h6>
                        </div>
                        <div class="col-8">
                            <h6 class="font-weight-light"><?php echo $row['projectTitle']; ?></h6>
                            <h6 class="font-weight-light"><?php echo $row['companyName']; ?></h6>
                            <h6 class="font-weight-light"><?php echo $row['startDate']; ?></h6>
                            <h6 class="font-weight-light"><?php echo $row['endDate']; ?></h6>
                            <h6 class="font-weight-light"><?php echo $row['time_spent'];  ?> hours</h6>
                            <h6 class="font-weight-light"><?php echo $row['description'];  ?></h6>
                        </div>
                    </div>
                    <hr>
                <?php } ?>
                <!-- lecturer project information ends -->
            </div>
        </div>
    </div>
</body>

</html>

<?php include 'includes/footer.php' ?>