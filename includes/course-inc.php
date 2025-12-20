<?php 
    require_once "dbh.php";
    require_once "functions.php";

if (isset($_POST['submit'])) {
    $courseName = $_POST['courseName'];
    $courseDescription = $_POST['courseDescription'];
    $credits = $_POST['credits'];

    if (!is_numeric($credits) || $credits <= 0) {
        exit();
    }

    $credits = (float)$credits;

    addCourse($conn, $courseName, $courseDescription, $credits);
}
?>