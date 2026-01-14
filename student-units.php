<?php 
    include "includes/header.php";
    include "includes/functions.php";
    include "includes/student-units-inc.php";
    studentPage();//Inforce student in this page
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php foreach($studentUnits as $unit):?>
    <div class="container my-5">
        <div class="card p-4 p-md-5">
            
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h5 class="fw-bold mb-0" name="unitName" value="unitName"><?php echo $unit['unitName']?></h5>
                    <h5 class="fw-bold" name="lecturerName" value="lecturerName">Lecturer Name: <?php echo $unit['name']?> <?php echo $unit['surname']?></h5>
                    <h6 class="fw-bold" name="semester" value="semester">Semester:<?php echo $unit['semester']?></h6>
                </div>
            </div>

            <div class="mt-3">
                <h6 name="unitDescription" value="unitDescription"><?php echo $unit['unitDescription']?></h6>
            </div>

        </div> 
    </div> 
<?php endforeach?>
</main>

<?php  include "includes/footer.php";  ?>
