<?php
  require('functions.php');

  require('authentication.php');
  check_auth();

  echo "<br> <br>";
?>

<html>
  <head>
    <script src="jquery-1.11.0.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <style>
      div{display:none}
    </style>
  </head>
  <body>
    <form action="client_result.php" method="post">
        
        <label for="response">Would you like to SELECT or UPDATE the database? </label>
        <br>
        
        <input type="radio" id="mode" name="mode" value="SELECT">
        <label for="radio">SELECT</label>
        <input type="radio" id="mode" name="mode" value="UPDATE">
        <label for="radio">UPDATE</label>
        <br>
        <br>
        <br>

        <div class="SELECT" id="SELECT" name="SELECT" style="display: none"> 
          <label for="students_select">Id/Name of students to select (use , to seperate)</label>
          <br>
          <textarea name="students_select" rows="2" cols="30"></textarea><br>
        </div>

        <div class="UPDATE" id="UPDATE" name="UPDATE" style="display: none">
          <label for="students_update">Id of student to update:</label>
          <br>
          <textarea name="students_update" rows="2" cols="30"></textarea><br>
          <br>

          <label for="students_class">Class the student is taking:</label>
          <br>
          <textarea name="students_class" rows="2" cols="30"></textarea><br>
          <br>

          <label for="test_info">Select the test you'd like to update: </label>
          <br>
          <input type="radio" id="student_test" name="student_test" value="1">
          <label for="radio">1</label>
          <input type="radio" id="student_test" name="student_test" value="2">
          <label for="radio">2</label>
          <input type="radio" id="student_test" name="student_test" value="3">
          <label for="radio">3</label>
          <input type="radio" id="student_test" name="student_test" value="4">
          <label for="radio">Final</label>
          <br><br>

          <label for="students_grade">Grade to update the test to:</label>
          <br>
          <textarea name="students_grade" rows="1" cols="30"></textarea><br>
        </div>

      
      <input type="submit" value="Call database"><br>
    </form> 

    <form action="logout.php" method="post">
    <input type="submit" value="Logout"><br>

  </form>
  
    <script>
      $(document).ready(function() {
        $('input[name="mode"]').click(function() 
          {
          // Hide 2 Selections until 1 is chosen
          $('#SELECT').hide();
          $('#UPDATE').hide();

          // Show either update or select suboptions from form
          var value = $(this).val();
          if (value == 'SELECT'){
            $('#SELECT').show();
          }
          else{
            $('#UPDATE').show();
          }
        });
      });
    </script>
  </body>
</html>
