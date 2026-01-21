    <?php

     if(!isset($_POST["submit"])){
     if (!isset($_SESSION["username"])){

         header("location: login.php");   
         exit();
      }

      $courseName = "";
      $className = "";
     
 $user = getUser($conn, $_SESSION["userId"]);
 $userProfile = getUserProfile($conn, $_SESSION["userId"]);
 $class = getUserClass($conn, $_SESSION["userId"]);
 if($class){
    $className = $class["className"];
    }
 $courseId = getEnrolledCourse($conn, $_SESSION["userId"]);
 if($courseId) {
 $course = getCourse($conn, $courseId);
 $courseName = $course["courseName"];
 }

    $username = $user['username'];
    $password = $user['password'];
    $roleId = $user['roleId'];
    $name = $userProfile['name'];
    $surname = $userProfile['surname'];
    $email = $userProfile['email'];
    $date_of_birth = $userProfile['date_of_birth'];
    $street1 = $userProfile['street1'];
    $street2 = $userProfile['street2'];
    $city =$userProfile['city'];
    $postCode = $userProfile['postCode'];
    }

    else{

         


    $street1 = $_POST['street1'];
    $street2 = $_POST['street2'];
    $city =$_POST['city'];
    $postCode =$_POST['postCode'];

   editProfile($conn, $_SESSION["userId"], $street1, $street2, $city, $postCode);

   header("location: profile.php");   
    exit();
    }

    ?>

