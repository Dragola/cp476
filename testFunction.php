<?php
require __DIR__ . '/functions.php';
$servername = "localhost";
$username = "root";
$password="mniwpp.12345";
$db = "StudentsDatabase";
$nametable = "Name_Table";
$coursetable = "Course_Table";

$studentname = "Xiao Qiang";
$studentid = 251173274;

$table = grabStudentCoursesName($servername, $username,$password, $db,$studentname);
foreach ( $table as $var ) {
    echo "\n", $var['Student_ID'], " ", $var['Course_Code']," ",$var['Test1'], " ",$var['Test2'], " ", $var['Test3'], " " , $var['Final'];
}
$table = grabStudentCoursesID($servername, $username,$password, $db,$studentid);
foreach ( $table as $var ) {
    echo "\n", $var['Student_ID'], " ", $var['Course_Code']," ",$var['Test1'], " ",$var['Test2'], " ", $var['Test3'], " " , $var['Final'];
}
$table = queryAll($servername, $username,$password, $db);
foreach ( $table as $var ) {
    echo "\n", $var['Student_ID'], " ",$var["Student_Name"]," ", $var['Course_Code']," ",$var['Test1'], " ",$var['Test2'], " ", $var['Test3'], " " , $var['Final'];
}
?>
