<html>
    <form action="client_result.php" method="post">
        <!-- <label for="info">What would you like to do?</label><br> -->
        
        <label for="response">Would you like to SELECT or UPDATE the database? </label>
        <br>
        <input type="radio" id="response" name="response" value="SELECT" checked="true">
        <label for="radio">SELECT</label>
        <input type="radio" id="response" name="response" value="UPDATE">
        <label for="radio">UPDATE</label>
        
        <!-- <br>
        <label for="name">Name:</label>
        <select name="formal" id="formal">
          <option value="Mr">Mr</option>
          <option value="Mrs">Mrs</option>
        </select>
        <input type="text" id="name" name="name" value=""><br>
        <br>
        <label for="email">Email Address:</label>
        <input type="text" id="email" name="email" value="larry@example.com"><br>
        <br>
        
        <br>
        <label for="comments">Comments:</label>
        <textarea name="comments" rows="2" cols="30"></textarea><br>
        <br> -->
        <input type="submit" value="Send my Feedback"><br>
      </form> 
</html>
