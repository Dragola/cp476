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
    function __destruct()
    {
        //echo 'database connection closed';
    }
    //check to see if password and username are valid
    function CheckLogin()
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
    function takes servername, username, password, database, and student id
    query'd the database for courses student under students id
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
    mass query of the database for every entry.
    */
    function queryAll()
    {
        // Check connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->DB);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT Course_Table.Student_ID, Name_Table.Student_Name,Course_Table.Course_Code, Course_Table.Test1, Course_Table.Test2, Course_Table.Test3, Course_Table.Final FROM Course_Table INNER JOIN Name_Table ON Name_Table.Student_ID=Course_Table.Student_ID ORDER BY Student_ID, Course_Code";
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
        $test_id = "";
        if ($test === 1 || $test === 2 || $test === 3)
            $test_id = "Test" . $test;
        else if ($test_id === 4)
            $test_id = "Final";
        else
            // This would be an error if the test value is not 1-4. Return that an error has occured
            return -1;

        $sql = "UPDATE Course_Table SET " . $test_id . " = ? WHERE Student_ID = ? AND Course_Code = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $grade, $studentid, $course);
        $stmt->execute();

        $rows = $conn->affected_rows;
        $conn->close();
        return $rows;
    }
    /*
    get all students in the db
    */
    function allStudents()
    {
        // Check connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->DB);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM Name_Table";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
}
?>