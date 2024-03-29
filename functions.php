<?php
/*
function takes servername, username, password, database, and student
query'd the database for courses student under students name 
*/
class Database
{
    private $servername = "localhost";
    private $username;
    private $password;
    private $DB = "StudentsDatabase";
    //constructor of the database taking in the database username and password.
    function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;

    }
    //check to see if password and username are valid
    function checkLogin()
    {
        try {
            $conn = new mysqli($this->servername, $this->username, $this->password);

            // Correct credentials but might have other error
            if ($conn->connect_error) {
                return false;
            }
            $conn->close();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /*
    function takes student name and queries the database for students matching said name
    */
    function grabStudentCoursesName($studentname)
    {
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->DB);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT DISTINCT Course_Table.Student_ID, Name_Table.Student_Name,Course_Table.Course_Code, Course_Table.Test1, Course_Table.Test2, Course_Table.Test3, Course_Table.Final FROM Course_Table INNER JOIN Name_Table ON Name_Table.Student_ID=Course_Table.Student_ID WHERE Student_Name = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $studentname);
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        $stmt->close();

        return $result;
    }
    /*
    function takes student id and queries the database for students matching said id
    */
    function grabStudentCoursesID($studentid)
    {
        // Check connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->DB);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT DISTINCT Course_Table.Student_ID, Name_Table.Student_Name,Course_Table.Course_Code, Course_Table.Test1, Course_Table.Test2, Course_Table.Test3, Course_Table.Final FROM Course_Table, Name_Table WHERE Name_Table.Student_ID=Course_Table.Student_ID AND Course_Table.Student_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $studentid);
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        $stmt->close();

        return $result;
    }
    /*
    mass query of the database for every student
    */
    function allStudents()
    {
        // Check connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->DB);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT DISTINCT Course_Table.Student_ID, Name_Table.Student_Name FROM Course_Table INNER JOIN Name_Table ON Course_Table.Student_ID=Name_Table.Student_ID ORDER BY Student_Name";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
    /*
    updates student's test within a clourse, updates either test1 test2 test3 or final
    */
    function updateTest($studentid, $course, $test, $grade)
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->DB);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        switch ($test) {
            // test 1
            case 1:
                $sql = "UPDATE Course_Table SET Test1 = ? WHERE Student_ID = ? AND Course_Code = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("dis", $grade, $studentid, $course);
                $stmt->execute();
                break;
            // test 2
            case 2:
                $sql = "UPDATE Course_Table SET Test2 = ? WHERE Student_ID = ? AND Course_Code = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("dis", $grade, $studentid, $course);
                $stmt->execute();
                break;
            // test 3
            case 3:
                $sql = "UPDATE Course_Table SET Test3 = ? WHERE Student_ID = ? AND Course_Code = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("dis", $grade, $studentid, $course);
                $stmt->execute();
                break;
            // final test
            case 4:
                $sql = "UPDATE Course_Table SET Final = ? WHERE Student_ID = ? AND Course_Code = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("dis", $grade, $studentid, $course);
                $stmt->execute();
                break;
        }

        $rows = $conn->affected_rows;
        $conn->close();
        return $rows;
    }
}
?>