<?php
require __DIR__ . '/functions.php';
$servername = "localhost";
$username = "root";
$password="mniwpp.12345";
$db = "StudentsDatabase";
$nametable = "Name_Table";
$coursetable = "Course_Table";
/*
251173274 Xiao Qiang PS275 86.0 64.0 65.0 59.0
251173274 Xiao Qiang EC140 98.0 58.0 59.0 52.0
*/
$studentname = "Xiao Qiang";
$studentid = 251173274;
$studentcourse="PS275";
$test1=86;
$test2=64;
$test3=65;
$final=59;

$table = grabStudentCoursesName($servername, $username,$password, $db,$studentname);
foreach ( $table as $var ) {
    echo "\n", $var['Student_ID'], " ",$var["Student_Name"] ," ", $var['Course_Code']," ",$var['Test1'], " ",$var['Test2'], " ", $var['Test3'], " " , $var['Final'];
}

/*
$table = grabStudentCoursesID($servername, $username,$password, $db,$studentid);
foreach ( $table as $var ) {
    echo "\n", $var['Student_ID'], " ",$var["Student_Name"] ," ", $var['Course_Code']," ",$var['Test1'], " ",$var['Test2'], " ", $var['Test3'], " " , $var['Final'];
}


$table = queryAll($servername, $username,$password, $db);
foreach ( $table as $var ) {
    echo "\n", $var['Student_ID'], " ",$var["Student_Name"]," ", $var['Course_Code']," ",$var['Test1'], " ",$var['Test2'], " ", $var['Test3'], " " , $var['Final'];
}
*/
updateTest($servername, $username, $password, $db, $studentid,$studentcourse,$test1,$test2,$test3,$final)

?>
