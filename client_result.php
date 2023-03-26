<?php
require('authentication.php');

check_auth(); // check that user is logged in and valid
?>


<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <style>
    .container {
      display: flex;
      justify-content: center;
    }

    .content {

      padding-top: 50px;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
</head>
<div class="container">
  <div class="content">
    <form action="client_input.php" method="post">

      <?php
      require('functions.php');

      // check if either SELECT or UPDATE operator was picked
      if (key_exists('mode', $_POST) == false) {
        echo "No operation selected, please try again with either SELECT or UPDATE selected."; // error message for no operator
      } else {
        // get the mode (either SELECT or UPDATE)
        $mode = $_POST['mode']; 
        
        // grab list of students to process based on selected mode
        if ($mode == "SELECT") {
          $students = $_POST['students_select'];
        } else {
          $students = $_POST['students_update'];
        }
      
        // remove any white space before or after the list of names/id's
        $trimmed_students = trim($students);
        
        // check that student string isn't empty
        if ($trimmed_students == '') {

          // print error based on mode
          if ($mode == 'SELECT') {
            echo "No students entered, please try again with at least 1 student name/id."; // SELECT error
          } else {
            echo "No student entered, please try again with a single id."; // UPDATE error
          }
        } else {
          // seperate the student names/id's into an array
          $student_array = explode(",", $trimmed_students);

          // if more then 1 student was entered
          if (sizeof($student_array) > 1) {
            // trim any whitespace in the students name/id
            for($i = 0; $i < sizeof($student_array); $i++) {
              $student_array[$i] = trim($student_array[$i]);      
            }
          }

          // if operator SELECT was picked
          if ($mode == "SELECT") {
            echo "<br>SELECT selected.<br><br>";

            //loop through students
            foreach ($student_array as $value) {
              // id was entered
              if (ctype_digit($value[0])) {
                // echo "ID Entered: " . $value . "<br>";

                echo "<table><tr><th>Student ID</th> <th>Student Name</th><th>Course Code</th><th>Final grade (test
            1,2,3-3x20%, final
            exam 40%</th></tr>";

                $db = new Database($_SESSION["username"], $_SESSION["password"]);
                $result = $db->grabStudentCoursesID($value);

                while ($row = $result->fetch_array()) {

                  echo "<tr>";
                  echo "<td>" . $row['Student_ID'] . "</td>";
                  echo "<td>" . $row['Student_Name'] . "</td>";
                  echo "<td>" . $row['Course_Code'] . "</td>";
                  echo "<td>" . number_format($row['Test1'] * .2 + $row['Test2'] * .2 + $row['Test3'] * .2 + $row['Final'] * .3, 1) . "</td>";

                  echo "</tr>";
                }
                echo "</table><br/>";

              }
              // name was entered
              else {
                // echo "Name Entered: " . $value . "<br>";

                echo "<table><tr><th>Student ID</th> <th>Student Name</th><th>Course Code</th><th>Final grade (test
                1,2,3-3x20%, final
                exam 40%</th></tr>";

                $db = new Database($_SESSION["username"], $_SESSION["password"]);
                $result = $db->grabStudentCoursesName($value);

                while ($row = $result->fetch_array()) {

                  echo "<tr>";
                  echo "<td>" . $row['Student_ID'] . "</td>";
                  echo "<td>" . $row['Student_Name'] . "</td>";
                  echo "<td>" . $row['Course_Code'] . "</td>";
                  echo "<td>" . number_format($row['Test1'] * .2 + $row['Test2'] * .2 + $row['Test3'] * .2 + $row['Final'] * .3, 1) . "</td>";

                  echo "</tr>";
                }
                echo "</table><br/>";
              }
            }
          } 
          // if operator UPDATE was picked
          else { 
            echo "<br>UPDATE selected.<br>";
            try {
              // verify an id was entered
              $student_id = $student_array[0];
              if (ctype_digit($student_id) == false) {
                throw new Exception("Appologies, but you must use a students id to update a grade. Please try again with a student id.");
              }
      
              // get the class to be updated for student
              $course = $_POST['students_course'];

              // check if class is blank or doesn't start with alphabetic character
              if ($course === "" or ctype_alpha($course[0]) == false) {
                throw new Exception("No class entered or wrong format used. Please try again with a proper class.");
              }

              // get the test to be updated for student
              $test = $_POST['student_test'];

              // get the new grade to set
              $grade = $_POST['students_grade'];

              // check if grade is blank or doesn't start with a number
              if ($grade === "" or ctype_digit($grade[0]) == false) {
                throw new Exception("No grade entered or wrong format. Please try again with a number for the grade.");
              }

              // call backend function to update the selected test
              $db = new Database($_SESSION["username"], $_SESSION["password"]);
              $result = $db->updateTest($student_id, $course, $test, $grade);

              // If number of rows affected is not positive, then something went wrong.
              if ($result === -1 || $result === 0) {
                echo "Failed to update. ID or class code was entered incorrectly.<br>";
              } else {
                echo "Update complete. Please select the student to verify the change.<br>";
              }
            } catch (Exception $e) {
              echo $e->getMessage(); // print error message
            }
          }
        }
      }
      ?>

      <input type="submit" class="btn btn-primary" value="Return to Input"><br>
    </form>
  </div>
</div>
<html>