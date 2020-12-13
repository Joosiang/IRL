<?php include("includes/header.php"); ?>

<?php
if (isset($_POST['submit'])) {
  $error = [];

  $contact     = clean($_POST['contact']);
  $password  = clean($_POST['password']);

  if (empty($contact)) {
    $error[] = "contact field can not be empty";
  }
  if (empty($password)) {
    $error[] = "password field can not be empty";
  }

  if (!empty($error)) {
    foreach ($error as $errors) {
      validation_errors($errors);
    }
  } else {
    if (login_user1($contact, $password)) {
      redirect("Student/home.php");
    } else {
      validation_errors("Your credentials are not correct");
    }
  }
}
function login_user1($contact, $password)
{
  $sql = "SELECT password , Contact_No FROM tbl_student WHERE Contact_No = '" . escape($contact) . "' ";
  $result = query($sql);
  if (row_count($result) == 1) {
    $row = fetch_array($result);
    $db_password = $row['password'];

    if (md5($password) === $db_password) {
      return true;
    } else {
      return false;
    }
  }
}
?>
<?php include("includes/footer.php"); ?>
