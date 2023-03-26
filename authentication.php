<?php
$homepage = "client_input.php";
$login_page = "login.php";

// save the login info into the session and move forward to the input page
function logon($username, $password)
{
  global $homepage;

  session_start();

  $_SESSION["username"] = $username;
  $_SESSION["password"] = $password;

  header("location: " . $homepage);
}

// determine if user is logged in- if not then show login page
function check_auth()
{
  global $login_page;

  session_start();

  if (!isset($_SESSION["username"])) {
    header("location: " . $login_page);
    exit;
  }
}

// if already logged in then move forward to the input page
function forward_authenticated()
{
  global $homepage;

  session_start();

  if (isset($_SESSION["username"])) {
    header("location: " . $homepage);
    exit;
  }
}
?>