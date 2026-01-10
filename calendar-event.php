<?php 
    include "includes/header.php";
    include "includes/functions.php";
    adminPage(); //Inforce admin only in this page
    include "includes/calendar-event-inc.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-myskolar text-white">
                    <h4 class="mb-0 fw-bold text-center">Schedule New Event</h4>
                </div>
                <div class="card-body">
                    <form action="calendar-event.php" method="post" id="calendarForm">
                        
                        <div class="mb-3">
                            <input type="text" name="eventTitle" class="form-control" placeholder="Event Title" required>
                        </div>

                
                        <div class="mb-3">
                            <select name="eventType" id="eventType" class="form-select" required>
                            <option value="" selected disabled>Select Event</option>
                            <option value="event-publicholiday">Public Holidays</option>
                            <option value="event-schoolholiday">School Holidays</option>
                            <option value="event-semesterbreak">Semester Break</option>
                            </select> 
                        </div>

                       

                        <div class="mb-3">
                            <input type="text"  name="eventDate" placeholder="Event Date" class="form-control" 
                              onfocus="this.type='date'"
                              onblur="if(!this.value) this.type='text'">
                       </div>

                        <div class="mb-3">
                            <textarea name="eventDescription" class="form-control" rows="4"  value ="eventDescription"  placeholder="Enter details about this event..."></textarea>
                        </div>

                        <div class="text-end border-top pt-3">
                            <button type="reset" class="btn btn-secondary me-2">CANCEL</button>
                            <button type="submit" name="action" id="save" value ="save" class="btn btn-primary px-4">ADD TO CALENDAR</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<?php  include "includes/footer.php";?>
