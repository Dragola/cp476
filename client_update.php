<?php
  $response = "'" .$_POST['mode']. "'";
  echo "Atempting to run " .$response. " on the database...<br>";

  if ($_POST['mode'] == "UPDATE") {
    $students= $_POST['students_info'];
    echo "<br>UPDATE selected.<br>";

    // No student names/id's
    if ($students_info == '') {
        echo "No students entered. Please enter a student name or ID for changing.";
    }
    else {
    }
}
?>