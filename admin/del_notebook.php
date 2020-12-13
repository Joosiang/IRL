<?php include_once("../database/init.php"); ?>

<?php


if (empty($_GET['id'])) {
	redirect("manage_notebook.php");
}

// Store notebook id
$id = $_GET['id'];
// SQL Query
$sql  = " DELETE  FROM tbl_notebook WHERE serialNo = '".$id."' ";;

if ($result = query($sql)) {
  redirect("manage_notebook.php");
}
else {
  echo "data not deleted";
}
 ?>
