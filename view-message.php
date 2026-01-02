<?php include "includes/header.php"; ?>
<?php require_once "includes/message-inc.php";?>



<main class="main-content-wrapper p-0 overflow-hidden ">
<div class="row g-0 overflow-hidden bg-white" style="min-height: calc(100vh - 44px);">
    <!--Message Menu-->
    <?php include "includes/message-menu-inc.php"; ?>


      <!-- View Message -->
        <div class="col-12 col-md-9 d-flex flex-column bg-white p-0">
            <div class="p-3 border-bottom text-center" style="background:#385D7B;">
                <h6 class="mb-0 fw-bold text-white">View Message</h6>
            </div>

            <div class="p-4 d-flex flex-column flex-grow-1">
                <form class="d-flex flex-column flex-grow-1" action="view-message.php" enctype="multipart/form-data" method="post" >
                    <div class="mb-4 border-bottom">
                        <label class="small fw-bold text-muted">From:</label>
                        <input type="text"  name="from" class="form-control border-0 shadow-none p-0"  value="<?php echo $from ?>" readonly>
                    </div>

                     <div class="mb-4 border-bottom">
                        <label class="small fw-bold text-muted">To:</label>
                        <input type="text"  name="to" class="form-control border-0 shadow-none p-0"  value="<?php echo $to ?>" readonly>
                    </div>

                    <div class="mb-4 border-bottom">
                        <label class="small fw-bold text-muted">Subject:</label>
                        <input type="text" name="subject" class="form-control border-0 shadow-none p-0"  value="<?php echo $subject?>"  readonly />
                    </div>

                        <div class="mb-4 border-bottom">
                        <label class="small fw-bold text-muted">Date:</label>
                        <input type="text"  name="date" class="form-control border-0 shadow-none p-0" value="<?php echo $date?>"   readonly>
                    </div>

                     <div class="mb-4 border-bottom">
                        <label class="small fw-bold text-muted">Message:</label>
                        <input type="text" name="message" class="form-control border-0 shadow-none p-0" value="<?php echo $message?>" readonly/>
                    </div>

            </div>
                </form>
            </div>
        </div>

    </div>
</main>




<?php include "includes/footer.php"; ?>