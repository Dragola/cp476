<?php
  // check if operator SELECT or UPDATE was chosen
  if (key_exists('mode', $_POST) == false) {
    echo "No operation selected, please try again with either SELECT or UPDATE selected."; //print message that no operator was selected
  }
  else {
    $response = "'" .$_POST['mode']. "'";
    echo "Atempting to run " .$response. " on the database...<br>";
  
    // grab list of students to process (working for UPDATE but not SELECT...)
    $students= $_POST['students'];
    echo "Students entered= " .$students. "<br><br>";
  
    // check that student string isn't empty
    $trimmed_students = trim($students);
    if ($trimmed_students == '') {
      echo "No students entered, please try again with at least 1 student name/id.";
    }
    else {
      echo "Splitting students string...<br>";
      // seperate the student names/id's into an array
      $student_array= explode(",", $trimmed_students);

      // trim any whitespace in the students name
      foreach ($student_array as $value) {
        $trimmed = trim($value);
        
        // ensure that there is a string to check
        if($trimmed != '') {
          echo "Student= " .$trimmed. ": ";
        }
      }
      
      // if operator SELECT was picked
      if ($_POST['mode'] == "SELECT") {
        echo "<br>SELECT selected.<br>";
    
        //loop through names
        foreach ($student_array as $value) {
          // id was entered
          if(ctype_digit($value[0])) {
            echo "Id Entered<br>";
            // call backend function to get by id.
          }
          // name was entered
          else {
            echo "Name Entered<br>";
            // call backend function to get by name.
          }
        }
      }
      // if operator UPDATE was picked
      else if ($_POST['mode'] == "UPDATE") {
        echo "<br>UPDATE selected.<br>";

        $class= $_POST['students_class'];
        echo "Class= " .$class. "<br><br>";

        $test= $_POST['student_test'];
        echo "Test to update is= " .$test. "<br><br>";

        $grade= $_POST['students_grade'];
        echo "Grade will be updated= " .$grade. "<br><br>";
    
        // id was entered
        if(ctype_digit($student_array[0][0])) {
          echo "Id Entered<br>";
          // call backend function to update the selected test
        }
        // named was entered
        else {
          echo "Appologies, but you must use the studen't Id to update a grade. Please try again with the students Id.";
        }
      }
    }
  }
  
  #should pass back previous input (if I get time to figure out)
?>

<html>
    <form action="client_input.php" method="post">
        <br>
        <input type="submit" value="Return to Input"><br>
    </form>
<html>