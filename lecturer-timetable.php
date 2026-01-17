<?php  
  include "includes/functions.php";
  include "includes/header.php";
  lecturerPage(); //Inforce lecturer only in this page
?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container user-register mt-5">
<div class="row justify-content-center">
<div class="col-12">
<div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle full-page-table">
                        <thead class="table-primary">
                            <tr>

                            
                                <th scope="col" style="width: 15%;">Time</th>

                                <th scope="col" >Monday </th>
                                <th scope="col">Tuesday</th>
                                <th scope="col">Wednesday</th>
                                <th scope="col">Thursday</th>
                                <th scope="col">Friday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                      $slots = [
                            "08:00 - 08:30",
                            "08:30 - 09:00",
                            "09:00 - 09:30",
                            "09:30 - 10:00",
                            "10:00 - 10:30",
                            "10:30 - 11:00",
                            "11:00 - 11:30",
                            "11:30 - 12:00",
                            "12:00 - 12:30",
                            "12:30 - 13:00",
                            "13:00 - 13:30",
                            "13:30 - 14:00",
                            "14:00 - 14:30",
                            "14:30 - 15:00",
                            "15:00 - 15:30",
                            "15:30 - 16:00",
                            "16:00 - 16:30",
                            "16:30 - 17:00",
                            "17:00 - 17:30",
                            "17:30 - 18:00",
                            "18:00 - 18:30",
                            "18:30 - 19:00"
                        ];
                       foreach ($slots as $slot): 
                            ?>
                            <tr>
                                <th scope="row"><?php echo $slot; ?><th scope="row">
                                <div class="card">
                                    <div class="card-body p-2">
                                    <p class="card-text mb-0" style="font-size: 0.85rem;">
                                        Unit<br>
                                        Lecturer<br>
                                        A111
                                    </p>
                                </div>
                            </div>
                        </th>


                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                               
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>




<?php  include "includes/footer.php";?>