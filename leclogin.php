<?php include("includes/header.php"); ?>
<?php

if (isset($_POST['submit'])) {
  $error = [];
  $username     = $_POST['username'];
  $password     = $_POST['password'];

  // check username and password fields are not empty
  if (empty($username)) {
    $error[] = "Username cannot be empty";
  }

  if (empty($password)) {
    $error[] = "Password cannot be empty";
  }

  if (!empty($error)) {
    foreach ($error as $errors) {
      validation_errors($errors);
    }
  } else {
    // password hashing
    $hashpass = md5($password);

    // SQL Query for get login
    $sql = "SELECT * FROM tbl_user WHERE username = '" . $username . "' AND password ='" . $hashpass . "' AND roleId = 2";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {

      // Save username and role in session
      $_SESSION['username'] = $username;
      $_SESSION['role'] = 2;

      // redirect to lecturer homepage
      redirect("lecturer/home.php");
    } else {
      // prompt when login details are wrong
      validation_errors("Your credentials are not correct");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-5">
        <!-- navigation start -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item"> <a class="nav-link " id="pills-Admin-tab" href="adminlogin.php">Admin Login</a> </li>
          <li class="nav-item"> <a class="nav-link " id="pills-Student-tab" href="index.php">Student Login</a> </li>
          <li class="nav-item"> <a class="nav-link active" id="pills-Lecturer-tab" href="leclogin.php">Lecturer Login</a> </li>
        </ul>
        <!-- navigation ends -->

        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <form class="form-signin" id="login-form" method="post" role="form">
              <h1 class="h3 mb-3 font-weight-normal">Lecturer Login</h1>
              
              <!-- login form start -->
              <div class="form-group">
                <label for="inputEmail" class="sr-only">Username</label>
                <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required="" autofocus=""> </div>
              <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required=""> </div>
              <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
            </form>
            <!-- login form ends -->
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php include("includes/footer.php"); ?>