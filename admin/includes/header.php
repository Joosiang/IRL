<?php include_once("../database/init.php");

// Checking session for login data
if (!isset($_SESSION['contactNo']) && !isset($_SESSION['role'])) {
    redirect("/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IRL - Content Management System</title>
    <link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet">
</head>
    <!-- Navigation -->
    <?php include("navigation.php"); ?>

    <!-- Page Content -->
    <div class="container">