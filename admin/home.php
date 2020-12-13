<?php
include 'includes/header.php';

// Project data
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
            <div class="row">
                <div class="col-lg-12">
                    <p class="bg-success">
                    </p>
                    <h1 class="page-header">
                        Manage Projects
                        <span><a href="add_proj.php" class="btn btn-primary btn-sm">Add Project</a></span>
                    </h1>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Company Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Budget</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo   $row['projectTitle']; ?></td>
                                        <td><?php echo  $row['companyName']; ?></td>
                                        <td><?php echo  $row['startDate'];  ?></td>
                                        <td><?php echo  $row['endDate']; ?></td>
                                        <td><?php echo  $row['budget']; ?></td>
                                        <td>
                                            <div class="action_links">
                                                <a href="deleteproj.php?id=<?php echo $row['projectNo']; ?>">Delete</a>
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
</body>

</html>
<?php include 'includes/footer.php'; ?>