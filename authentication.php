<?php
$homepage = "client_input.php";
$login_page = "login.php";

function logon($username, $password)
{
  global $homepage;

  session_start();

  $_SESSION["username"] = $username;
  $_SESSION["password"] = $password;

  header("location: " . $homepage);
}

function check_auth()
{
  global $login_page;

  session_start();

  if (!isset($_SESSION["username"])) {
    header("location: " . $login_page);
    exit;
  }
}


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