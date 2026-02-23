<?php
$host = "RDS-ENDPOINT-HERE";
$user = "RDS-USERNAME";
$pass = "RDS-PASSWORD";
$db   = "gradesdb";

$conn = new mysqli($host, $user, $pass, $db);

$result = $conn->query("SELECT student_id, grade FROM grades");
$avgResult = $conn->query("SELECT AVG(grade) AS avg_grade FROM grades");
$avgRow = $avgResult->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Grades Summary</title>
</head>
<body>
    <h2>All Student Grades</h2>

    <table border="1">
        <tr>
            <th>Student ID</th>
            <th>Grade</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['student_id'] ?></td>
                <td><?= $row['grade'] ?></td>
            </tr>
        <?php } ?>
    </table>

    <h3>Average Grade: <?= round($avgRow['avg_grade'], 2) ?></h3>

    <a href="index.html">Enter Another Grade</a>
</body>
</html>

<?php $conn->close(); ?>