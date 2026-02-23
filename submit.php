<?php
$host = "RDS-ENDPOINT-HERE";
$user = "RDS-USERNAME";
$pass = "RDS-PASSWORD";
$db   = "gradesdb";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed");
}

$student_id = $_POST['student_id'];
$grade = $_POST['grade'];

$sql = "INSERT INTO grades (student_id, grade)
        VALUES ('$student_id', $grade)";

$conn->query($sql);
$conn->close();

// Redirect to display page
header("Location: display.php");
exit();
?>