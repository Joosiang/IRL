<?php include_once("../database/init.php"); ?>

<?php


if (empty($_GET['id'])) {
  redirect("manage_software.php");
}
// Software Id
$id = $_GET['softid'];

// Sql query
$sql  = " DELETE  FROM tbl_software WHERE softwareId ='$id'";


if ($result = query($sql)) {
  redirect("manage_software.php");
} else {
  echo "data not deleted";
}
?>
