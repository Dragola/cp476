<?php
$servername = "localhost";
$username = "root";
$password = "mniwpp.12345";

$dbname = "StudentsDatabase";
$studentstable = "tbl_students";
$studentgradetable = "tbl_course_grades";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//create student tabel
$sql = "CREATE TABLE $studentstable (
    Student_ID INT(9) NOT NULL,
    firstname VARCHAR(30) NOT NULL
    )";
    
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully\n";
} else {
    echo "Error creating table:\n " . $conn->error;
}
//create student course and grade tables
$sql = "CREATE TABLE $studentgradetable (
    Student_ID INT(9) NOT NULL,
    Course_Code VARCHAR(6) NOT NULL,
    Test1 numeric(2,1) NOT NULL,
    Test2 numeric(2,1) NOT NULL,
    Test3 numeric(2,1) NOT NULL,
    Final numeric(2,1) NOT NULL
    )";
    
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
?> 