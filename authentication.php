<?php


function authenticate()
{
  session_start();

  if (!isset($_SESSION["loggedin"])) {
    header("location: login.php");
    exit;
  }
}
?>