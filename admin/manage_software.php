<?php
include("includes/header.php");

// Sql query
$sql  = " SELECT * FROM tbl_software ";
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
                        </p>
                        <h1 class="page-header">
                            Manage Software
                        </h1>

                        <div class="col-md-12">
                            <!-- Table start -->
                            <table class="table table-hover">
                                <thead>
                                    <tr>

                                        <th>Title</th>
                                        <th>Version</th>
                                        <th>Publisher</th>
                                        <th>No of licenece</th>
                                        <th>Purchase Date</th>
                                        <th>Price</th>
                                        <th>Edit/Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>

                                        <tr>
                                            <td><?php echo   $row['title']; ?></td>
                                            <td><?php echo  $row['version']; ?></td>
                                            <td><?php echo  $row['publisher'];  ?></td>
                                            <td><?php echo  $row['noOfLicense']; ?></td>
                                            <td><?php echo  $row['dateOfPurchase']; ?></td>
                                            <td><?php echo  $row['pricePerLicense']; ?></td>
                                            <td>
                                                <!-- Edit or delete button -->
                                                <div class="action_links">
                                                    <a href="swedit.php?softid=<?php echo  $row['softwareId']; ?>">Edit</a>
                                                    <a href="swdel.php?softid=<?php echo $row['softwareId']; ?>">Delete</a>
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