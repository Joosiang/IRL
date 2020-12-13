<?php include_once("../database/init.php"); ?>

<?php
if (empty($_GET['id'])) {
  redirect("manage_lecturer.php");
}
// Store project Id and Lecturer Id
$projectId = $_GET['prid'];
$lecturerId = $_GET['lecId'];

// SQL Query
$sql  = " DELETE  FROM tbl_lecturer_project WHERE projectId = '$projectId' AND staffId='$lecturerId'";


if ($result = query($sql)) {
  redirect("manage_lecturer.php");
} else {
  echo "data not deleted";
}
?>
