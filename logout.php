<?php
// destroys the current session to clear login then forwards to login page
session_start();
session_destroy();
header("location: login.php");
exit;

?>