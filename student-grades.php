<?php 
    include "includes/header.php";
    include "includes/functions.php";
    include "includes/student-grades-inc.php";
    studentPage()//Inforce student in this page
?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php foreach($grades as $grade):?>
    <div class="container my-5">
        <div class="card p-4 p-md-5">
            
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h5 class="fw-bold mb-0" name = "unitName" value="unitName"><?php echo $grade['unitName']?></h5>
                    <h5 class="fw-bold" name = "lecturerName" value="lecturerName"><?php echo $grade['name']?> <?php echo $grade['surname']?></h5>
                </div>

                <div class="text-end">
                    <h4 class="fw-bold mb-0" >Marks</h4>
                    <h4 name= "maxMark" value= "maxMark"><?php echo $grade['marksEarned']?>/<?php echo $grade['maxMark']?> </h4>
                </div>
            </div>

                <div class="mb-4">
                <p class="mb-0">
                    <span class="h6 fw-bold"  name = "taskTitle" value = "taskTitle"><?php echo $grade['taskTitle']?></span> 
                </p>
            </div>

            <div>
                <h6 class="fw-bold" >Comments:</h6>
                <p class="text-muted" name = "lecturerComment" value = "lecturerComment">
                    <?php echo $grade['lecturerComment']?>
                </p>
            </div>

        </div> 
    </div> 
<?php endforeach?>
    
</main>


<?php  include "includes/footer.php";?>