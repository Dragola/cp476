<?php
  $response = "'" .$_POST['mode']. "'";
  echo "Atempting to run " .$response. " on the database...<br>";

  if ($_POST['mode'] == "SELECT") {
    $students= $_POST['students'];
    echo "<br>SELECT selected.<br>";
    echo "Students entered= " .$students. "<br><br>";

    // No student names/id's
    if ($students == '') {
      echo "No students entered, please try again with at least 1 student name/id.";
    }
    else {
      echo "Splitting students string...<br>";
      $student_array= explode(",", $students);
      foreach ($student_array as $value) {
        $trimmed = trim($value);
        
        // Ensure that there is a string to check
        if($trimmed != '') {
          echo "Student= " .$trimmed. ": ";
          //determine if the student was referenced by id or name
          if(ctype_digit($trimmed[0])) {
            echo "Id Entered<br>"; //not detecting properly...
            // call backend function to get by id.
          } 
          else {
            echo "Name Entered<br>";
            // call backend function to get by name.
          }
        }
      }
    }
  }

  # Call database with query...
  $sql_query = $response. " other parts of the query";

  #should pass back previous input (if I get time to figure out)
?>

<html>
    <form action="client_input.php" method="post">
        <br>
        <input type="submit" value="Return to Input"><br>
    </form>
<html>