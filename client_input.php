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
          <label for="students">Id/Name of students to select (use , to seperate)</label>
          <br>
          <textarea name="students" rows="2" cols="30"></textarea><br>
        </div>

        <div class="UPDATE" id="UPDATE" name="UPDATE" style="display: none">
          <label for="students">Id/Name of students to update (use , to seperate)</label>
          <br>
          <textarea name="students" rows="2" cols="30"></textarea><br>
          <br>
          <label for="students_class">Class of the students to update (use , to seperate)</label>
          <br>
          <textarea name="students_class" rows="2" cols="30"></textarea><br>
          <br>
          <label for="students_grade">Grade of the students to update (use , to seperate)</label>
          <br>
          <textarea name="students_grade" rows="1" cols="30"></textarea><br>
        </div>

      
      <input type="submit" value="Call database"><br>
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
