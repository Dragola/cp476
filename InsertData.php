<?php
//you should make sure it logins on your mysql
$servername = "localhost";
$username = "root";
$password = "";

$dbname = "studentsdatabase";

$dbname = "StudentsDatabase";
$studentstable = "tbl_students";
$studentgradetable = "tbl_course_grades";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$myfile = fopen("NameFile.txt", "r") or die("Unable to open file!");
/* 
Output one line until end-of-file
parse the data values and split them into ID and Name
*/
while(!feof($myfile)) {
    $string = substr(fgets($myfile), 0, -1);
    $infoArray="";
    if (strlen($string) >= 1){
        $infoArray=explode(", ",$string);
        $sql = "INSERT INTO $studentstable (Student_ID, firstname)
        VALUES ($infoArray[0], '$infoArray[1]')";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully\n";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    //echo $string;
    //print_r($infoArray);
}
fclose($myfile);
$myfile = fopen("CourseFile.txt", "r") or die("Unable to open file!");
/* 
Output one line until end-of-file
parse the data values and split them into ID, course code, test1, test2,test3, and final
*/
while(!feof($myfile)) {
    $string = substr(fgets($myfile), 0, -1);
    $infoArray="";
    if (strlen($string) >= 1){
        $infoArray=explode(", ",$string);
        $sql = "INSERT INTO $studentgradetable (Student_ID, Course_Code, Test1, Test2, Test3, Final)
        VALUES ($infoArray[0], '$infoArray[1]',$infoArray[2],$infoArray[3],$infoArray[4],$infoArray[5])";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully\n";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    //echo $string;
    //print_r($infoArray);
}
fclose($myfile);

$conn->close();
?> 