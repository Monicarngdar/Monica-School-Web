<?php 
    include "includes/header.php";

?>


<div class="container user-register mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6"> 
            
            <div class="row">
                <div class="col">
                    <h2 class="text-center mb-5">Manage Courses</h2>
                </div>
            </div>

    <div class="row">
        <div class="col">
        
            <form action="includes/course-inc.php" method="post" class="mt-4">
                <div class="row">
                    <div class="col">
                        <div class="row">
                <div class="col">
                    <form action="" method="post" class="mt-4">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="course_name" id="course_name" placeholder="Course Name" class="w-100 m-2" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <textarea name="course_description" id="course_description" placeholder="Course Description" class="w-100 m-2" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <input type="number" name="credits" id="credits" placeholder="Credits" class="w-100 m-2" >
                            </div>
                        </div>

        
                <div class="row my-3">
                    <div class="col">
                        <button class="btn btn-primary w-100 m-2" type="submit" name="submit" id="submit">CREATE</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-secondary w-100 m-2" type="reset" name="reset" id="reset">CANCEL</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

       <?php  include "includes/footer.php";?>
