<?php
include 'includes/snavbar.php';
include '../database/init.php';

// Session username
$stuser = $_SESSION['username'];
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
                <h3>Welcome, Student</h3>
            </div>
            <div class="col-8">
                <!-- student personal information start -->
                <div>
                    <div>
                        <h5>Personal Details</h5>
                    </div>
                    <hr>
                    <?php
                    // Get student data from db
                    $sql  = "SELECT * FROM tbl_student AS ts
                    INNER JOIN tbl_user AS tu ON ts.contactNo = tu.contactNo
                    WHERE tu.username ='" . $stuser . "'";
                    $result =  mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    $stContact = $row['contactNo'];
                    ?>
                    <div class="row">
                        <div class="col-3">
                            <h6>Name</h6>
                            <h6>Contact No</h6>
                            <h6>Student ID</h6>
                            <h6>School</h6>
                            <h6>Enrolled Year</h6>
                        </div>
                        <div class="col-9">
                            <h6 class="font-weight-light"><?php echo $row['fName'] . " " . $row['lName']; ?></h6>
                            <h6 class="font-weight-light"><?php echo $row['contactNo']; ?></h6>
                            <h6 class="font-weight-light"><?php echo $row['studentId']; ?></h6>
                            <h6 class="font-weight-light"><?php echo $row['school']; ?></h6>
                            <h6 class="font-weight-light"><?php echo $row['yearEnrolled']; ?></h6>
                        </div>
                    </div>
                </div>
                <!-- student personal information ends -->
            </div>
            <div class="col-4">
                <!-- student project information start -->
                <h5>Project Assigned</h5>
                <hr>
                <?php
                // assigned project data
                $sql  = "SELECT * FROM tbl_project AS tp
                INNER JOIN tbl_project_student AS tps ON tp.projectNo=tps.projectId
                INNER JOIN tbl_lecturer_project AS tlp ON tp.projectNo=tlp.projectId
                INNER JOIN tbl_student AS ts ON tps.studentId=ts.studentId
                WHERE ts.contactNo='" . $stContact . "'";
                $result =  mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result)
                ?>
                <div class="row">
                    <div class="col-4">
                        <h6>Title</h6>
                        <h6>Company</h6>
                        <h6>Start Date</h6>
                        <h6>End Date</h6>
                        <h6>Lecturer-In-Charge</h6>
                        <h6>Description</h6>
                    </div>
                    <div class="col-8">
                        <h6 class="font-weight-light"><?php echo $row['projectTitle']; ?></h6>
                        <h6 class="font-weight-light"><?php echo $row['companyName']; ?></h6>
                        <h6 class="font-weight-light"><?php echo $row['startDate']; ?></h6>
                        <h6 class="font-weight-light"><?php echo $row['endDate']; ?></h6>
                        <h6 class="font-weight-light"><?php echo $row['staffId']; ?></h6>
                        <h6 class="font-weight-light"><?php echo $row['description'];  ?></h6>
                    </div>
                </div>
                <!-- student project information ends -->
            </div>
        </div>
    </div>
</body>

</html>

<?php include 'includes/footer.php' ?>