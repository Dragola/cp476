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
    $sql = "SELECT Course_Table.Student_ID, Name_Table.Student_Name,Course_Table.Course_Code, Course_Table.Test1, Course_Table.Test2, Course_Table.Test3, Course_Table.Final FROM Course_Table INNER JOIN Name_Table ON Name_Table.Student_ID=Course_Table.Student_ID WHERE Student_Name = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $studentname);
    $stmt->execute();
    $result = $stmt->get_result();
    $conn->close();
    $stmt->close();

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
        
    $sql = "SELECT Course_Table.Student_ID, Name_Table.Student_Name,Course_Table.Course_Code, Course_Table.Test1, Course_Table.Test2, Course_Table.Test3, Course_Table.Final FROM Course_Table, Name_Table WHERE Name_Table.Student_ID=Course_Table.Student_ID AND Course_Table.Student_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $studentid);
    $stmt->execute();
    $result = $stmt->get_result();
    $conn->close();
    $stmt->close();

    return $result;
}
/*
mass query of the database for every entry.
*/
function queryAll($servername, $username, $password, $DB){
    // Check connection
    $conn = new mysqli($servername, $username, $password, $DB);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
        $sql = "SELECT Course_Table.Student_ID, Name_Table.Student_Name,Course_Table.Course_Code, Course_Table.Test1, Course_Table.Test2, Course_Table.Test3, Course_Table.Final FROM Course_Table INNER JOIN Name_Table ON Name_Table.Student_ID=Course_Table.Student_ID ORDER BY Student_ID, Course_Code";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
}

function updateTest($servername, $username, $password, $DB, $studentid, $course, $test, $grade){
    $conn = new mysqli($servername, $username, $password, $DB);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    switch ($test) {
        case 1:
            $sql = "UPDATE Course_Table SET Test1 = ? WHERE Student_ID = ? AND Course_Code = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iis", $grade, $studentid,$course);
            $stmt->execute();
            break;
        case 2:
            $sql = "UPDATE Course_Table SET Test2 = ? WHERE Student_ID = ? AND Course_Code = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iis", $grade, $studentid, $course);
            $stmt->execute();
            break;
        case 3:
            $sql = "UPDATE Course_Table SET Test3 = ? WHERE Student_ID = ? AND Course_Code = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iis", $grade, $studentid,$course);
            $stmt->execute();
            break;
        case 4:
            $sql = "UPDATE Course_Table SET Final = ? WHERE Student_ID = ? AND Course_Code = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iis", $grade, $studentid,$course);
            $stmt->execute();
            break;
    }
    $conn->close();
}
?>
