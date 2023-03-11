<?php 
  $response = "'" .$_POST['response']. "'";
  echo "Atempting to run " .$response. " on the database";

  # Call database with query...
  $sql_query = $response. " other parts of the query..."
?>

<html>
    <form action="client_input.php" method="post">
        <br>
        <input type="submit" value="Return to INput"><br>
    </form>
<html>