<?php
  require('functions.php');

  // check if operator SELECT or UPDATE was chosen
  if (key_exists('mode', $_POST) == false) {
    echo "No operation selected, please try again with either SELECT or UPDATE selected."; //print message that no operator was selected
  }
  else {
    $mode = $_POST['mode']; // get the mode (SELECT or UPDATE)
    $response = "'" .$mode. "'";
    echo "Atempting to run " .$response. " on the database...<br>";
    
    // grab list of students to process
    if ($mode == "SELECT") {
      $students= $_POST['students_select'];
    } else {
      $students= $_POST['students_update'];
    }
    echo "Students entered= " .$students. "<br><br>";
  
    // check that student string isn't empty
    $trimmed_students = trim($students);
    if ($trimmed_students == '') {

      // print error based on mode
      if ($mode == 'SELECT') {
        echo "No students entered, please try again with at least 1 student name/id."; // SELECT error
      } else {
        echo "No students entered, please try again with a single id."; // UPDATE error
      }
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
          echo "Student= " .$trimmed. ", ";
        }
      }
      
      // if operator SELECT was picked
      if ($mode == "SELECT") {
        echo "<br>SELECT selected.<br>";
    
        //loop through names
        foreach ($student_array as $value) {
          // id was entered
          if(ctype_digit($value[0])) {
            echo "Id Entered<br>";

            // Need database login to call this!
            // call backend function to get by id.
            #$result = grabStudentCoursesID($servername, $username,$password, $DB, $value);

            //print output
          }
          // name was entered
          else {
            echo "Name Entered<br>";

            // Need database login to call this!
            // call backend function to get by name.
            #$result = grabStudentCoursesName($servername, $username,$password, $DB, $value);
           
            //print output
          }
        }
      } else { // if operator UPDATE was picked
        echo "<br>UPDATE selected.<br>";

        // verify an id was entered
        if(ctype_digit($student_array[0][0])) {
          echo "Id Entered<br>";
          
        $error = 0; // determine if any information is missing
        // get the class to be updated for student
        $class= $_POST['students_class'];
        echo "Class= " .$class. "<br><br>";

        // get the test to be updated for student
        $test= $_POST['student_test'];
        echo "Test to update is= " .$test. "<br><br>";

        // get the new grade to set
        $grade= $_POST['students_grade'];
        echo "Grade will be updated= " .$grade. "<br><br>";

          // Need database login to call this!
          // call backend function to update the selected test (can just pass back number 1-4 to indicate what test to update)
          #updateTest($servername, $username, $password, $DB, $studentid,$course,$test1,$test2,$test3,$final);
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