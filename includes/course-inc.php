<?php 
    require_once "dbh.php";
    require_once "functions.php";

if (isset($_POST['submit'])) {
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];
    $credits = $_POST['credits'];

    if (!is_numeric($credits) || $credits <= 0) {
        exit();
    }

    $credits = (float)$credits;

    addCourse($conn, $course_name, $course_description, $credits);
}
?>