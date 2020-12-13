<?php
session_start();
session_unset();
// Redirect to index
header("Location:index.php");
?>