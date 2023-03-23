<?php

require('authentication.php');
require('functions.php');

// If user is already logged in, forward to homepage
forward_authenticated();

// Form values
$username = "";
$password = "";
$error_username = "";
$error_password = "";
$credential_error = "";

// Process information if coming from POST request (previous attempted login)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Check if username is empty
  if (empty(trim($_POST["username"]))) {
    $error_username = "Please enter username.";
  } else {
    $username = trim($_POST["username"]);
  }

  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $error_password = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate credentials
  if (empty($error_username) && empty($error_password)) {
    $db = new Database($username, $password);
    if ($db->CheckLogin()) {
      logon();
    } else {
      $error_username = "";
      $error_password = "";
      $credential_error = "Incorrect username/password.";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      font: 14px sans-serif;
    }

    .container {
      display: flex;
      justify-content: center;
    }

    .content {
      width: 450px;
      padding-top: 100px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="content">

      <h2>Welcome to Student Information Database!</h2>
      <p>Please enter the database username and password to login.</p>

      <?php
      if (!empty($credential_error)) {
        echo '<div class="alert alert-danger">' . $credential_error . '</div>';
      }
      ?>

      <form method="post">
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username"
            class="form-control <?php echo (!empty($error_username)) ? 'is-invalid' : ''; ?>"
            value="<?php echo $username; ?>">
          <span class="invalid-feedback">
            <?php echo $error_username; ?>
          </span>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password"
            class="form-control <?php echo (!empty($error_password)) ? 'is-invalid' : ''; ?>">
          <span class="invalid-feedback">
            <?php echo $error_password; ?>
          </span>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Login">
        </div>

      </form>
    </div>
  </div>
</body>

</html>