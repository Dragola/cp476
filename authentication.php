<?php
$homepage = "client_input.php";
$login_page = "login.php";

function logon()
{
  global $homepage;

  session_start();

  $_SESSION["loggedin"] = true;
  header("location: " . $homepage);
}

function check_auth()
{
  global $login_page;

  session_start();

  if (!isset($_SESSION["loggedin"])) {
    header("location: " . $login_page);
    exit;
  }
}


function forward_authenticated()
{
  global $homepage;

  session_start();

  if (isset($_SESSION["loggedin"])) {
    header("location: " . $homepage);
    exit;
  }
}
?>