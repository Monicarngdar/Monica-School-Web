<?php 
    require_once "dbh.php";
    require_once "functions.php";

    if(isset($_GET["action"]) && $_GET["action"]=="list")
    { 
    $day =  date('l');
    // Enforce Monday when it is saturday or sunday, mainly for testing purposes
    if ($day == "Saturday" || $day == "Sunday"){
        $day = "Monday";
    }
    $lectures = getDayTimetable($conn, $day, $_SESSION["userId"]);
    } 

      if(isset($_POST["action"]) && $_POST["action"] == "edit"){
    $unitTimetableId = ($_POST["id"]);
    $date = date("Y-m-d");
    $attendances = getDailyAttendance($conn, $unitTimetableId, $date);
    if(!mysqli_num_rows($attendances)){  // when their is no attendance for the day, we need to create the empty attendances
        $students = getAttendanceStudents($conn, $unitTimetableId); //get the students that should attend the particular lecture
        foreach ($students as $student){
            addAttendance($conn, $student["studentId"], $student ["unitId"], $unitTimetableId); //add each student to the attendance as empty
        }
        $attendances = getDailyAttendance($conn, $unitTimetableId, $date); // getting the attendances again after inserting them
    }
    



  }






    ?>