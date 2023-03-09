<html>
    <form action="client.php" method="post">
        <label for="info">Please complete this form to submit your feedback:</label><br>
        <br>
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
        <label for="response">Response: This is... </label>
        <input type="radio" id="response" name="response" value="excellent" checked="true">
        <label for="radio">excellent</label>
        <input type="radio" id="response" name="response" value="okay">
        <label for="radio">okay</label>
        <input type="radio" id="response" name="response" value="boring">
        <label for="radio">boring</label><br>
        <br>
        <label for="comments">Comments:</label>
        <textarea name="comments" rows="2" cols="30"></textarea><br>
        <br>
        <input type="submit" value="Send my Feedback"><br>
      </form> 
</html>

<?php 
  #prevent from running unless there's actually a post
  $response = "'" .$_POST['response']. "'";
  echo "You stated that you found this example to be ";
  echo '<span style="color: red;">'.$response.'</span>';
  echo " and added the following comments:<br>";

  $comments = "'" .$_POST['comments']. "'";
  echo '<span style="color: red;">'.$comments.'</span>';
?>