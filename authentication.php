<?php


function authenticate()
{
  session_start();

  if (!isset($_SESSION["loggedin"])) {
    header("location: login.php");
    exit;
  }
}


function forward_authenticated()
{
  session_start();

  if (isset($_SESSION["loggedin"])) {
    header("location: client_input.php");
    exit;
  }
}
?>