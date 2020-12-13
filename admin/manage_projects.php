<?php
include("includes/header.php");
// Sql query
$sql  = " SELECT * FROM tbl_project ";
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
                        Manage Projects
                    </h1>
                    <div class="col-md-12">
                        <!-- Table start -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Company Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Budget</th>
                                    <th>Edit/Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                while ($row = mysqli_fetch_array($result)) {
                                ?>

                                    <tr>
                                        <td><?php echo   $row['projectTitle']; ?>
                                        </td>

                                        <td><?php echo  $row['companyName']; ?>
                                        </td>
                                        <td>
                                            <?php echo  $row['startDate'];  ?>
                                        </td>


                                        <td><?php echo  $row['endDate']; ?></td>
                                        <td><?php echo  $row['budget']; ?></td>
                                        <td><?php // echo $user->username; 
                                            ?>
                                            <div class="action_links">
                                                <!-- Edit and Delete -->
                                                <a href="editproj.php?id=<?php echo  $row['projectNo']; ?>">Edit</a>
                                                <a href="delproj.php?id=<?php echo $row['projectNo']; ?>">Delete</a>
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
</body>

</html>

<?php include 'includes/footer.php' ?>