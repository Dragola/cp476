<?php
/*
function takes servername, username, password, database, and student
query'd the database for courses student under students name 
*/
function grabStudentCoursesName($servername, $username,$password, $DB,$studentname){
    // Create connection
    $conn = new mysqli($servername, $username, $password, $DB);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Course_Table WHERE Student_ID IN ( SELECT Student_ID FROM Name_Table WHERE Student_Name = '$studentname')";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}
/*
function takes servername, username, password, database, and student id
query'd the database for courses student under students id
*/
function grabStudentCoursesID($servername, $username,$password, $DB,$studentid){
    // Check connection
    $conn = new mysqli($servername, $username, $password, $DB);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
        $sql = "SELECT * FROM Course_Table WHERE Student_ID = $studentid";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
}
/*
mass query of the database for every entry.
*/
function queryAll($servername, $username,$password, $DB){
    // Check connection
    $conn = new mysqli($servername, $username, $password, $DB);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
        $sql = "SELECT Course_Table.Student_ID, Name_Table.Student_Name,Course_Table.Course_Code, Course_Table.Test1, Course_Table.Test2, Course_Table.Test3, Course_Table.Final FROM Course_Table INNER JOIN Name_Table ON Name_Table.Student_ID=Course_Table.Student_ID ORDER BY Student_ID";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
}

?>
