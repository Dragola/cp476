<?php
require __DIR__ . '/functions.php';
/*
$servername = "localhost";
*/
$username = "root";
$password = "Silveroffice1!";
/*
$db = "StudentsDatabase";
*/
/*
251173274 Xiao Qiang PS275 86.0 64.0 65.0 59.0
251173274 Xiao Qiang EC140 98.0 58.0 59.0 52.0
*/
$studentname = "Xiao Qiang";
$studentid = 251173274;
$studentcourse = "PS275";
$test = 1;
$grade = 50;

$database = new Database($username, $password);
echo "hello";
$result = $database->allStudents();
// echo "<table><tr><th>Company</th> <th>Contact</th></tr>";

while ($row = $result->fetch_array()) {
  // echo "<tr>";
  // echo "<td>" . $row['Student_ID'] . "</td><td> " . $row['Student_Name'] . "</td>";
  echo "<br />";
}

// echo "</table>";

?>