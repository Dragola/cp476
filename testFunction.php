<?php
require __DIR__ . '/functions.php';
/*
$servername = "localhost";
*/
$username = "root";
$password="mniwpp.12345";
/*
$db = "StudentsDatabase";
*/
/*
251173274 Xiao Qiang PS275 86.0 64.0 65.0 59.0
251173274 Xiao Qiang EC140 98.0 58.0 59.0 52.0
*/
$studentname = "Xiao Qiang";
$studentid = 251173274;
$studentcourse="PS275";
$test=1;
$grade=50;

$database = new Database($username,$password);

$table = $database->grabStudentCoursesName($studentname);
foreach ( $table as $var ) {
    echo "\n", $var['Student_ID'], " ",$var["Student_Name"] ," ", $var['Course_Code']," ",$var['Test1'], " ",$var['Test2'], " ", $var['Test3'], " " , $var['Final'];
}

/*
$table = grabStudentCoursesID($studentid);
foreach ( $table as $var ) {
    echo "\n", $var['Student_ID'], " ",$var["Student_Name"] ," ", $var['Course_Code']," ",$var['Test1'], " ",$var['Test2'], " ", $var['Test3'], " " , $var['Final'];
}


$table = queryAll();
foreach ( $table as $var ) {
    echo "\n", $var['Student_ID'], " ",$var["Student_Name"]," ", $var['Course_Code']," ",$var['Test1'], " ",$var['Test2'], " ", $var['Test3'], " " , $var['Final'];
}
*/
//updateTest($studentid,$studentcourse,$test,$grade)

?>
