<?php include_once("../database/init.php"); ?>

<?php
if (empty($_GET['id'])) {
  redirect("manage_projects.php");
}

// Store project id
$id = $_GET['id'];

// SQL query
$sql  = " DELETE  FROM tbl_project WHERE projectNo = " . $id;


if ($result = query($sql)) {
  redirect("manage_projects.php");
} else {
  echo "data not deleted";
}
?>
