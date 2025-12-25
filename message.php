<?php include "includes/header.php"; ?>

<main class="main-content-wrapper p-0 overflow-hidden ">
    <!--- Success and Errors Message in form -->
      <?php 
              if(isset($_GET["success"])) { 
                 $message = "Message Sent Successfully";
                 include "includes/show-success.php";
            }


        if(isset($_GET["error"])) { 
            $message = "";

            if (isset($_GET["username"])) {
                $message = "Username not found: {$_GET['username']}";
                include "includes/show-error.php";
            }
        
            ?>

    <?php } ?>    
        

    <div class="row g-0 overflow-hidden bg-white" style="min-height: calc(100vh - 44px);">
        <!-- Email menu -->
        <div class="col-12 col-md-3 p-0" style="background-color:#8296A3;">
            <div class="list-group list-group-flush">
                <a href="message.php" class="list-group-item text-white py-3 email-item">
                    <i class="fa-solid fa-pen-to-square me-2"></i>Compose
                </a>
                <a href="inbox.php" class="list-group-item text-white py-3 email-item">
                    <i class="fa-solid fa-inbox me-2"></i> Inbox
                </a>
                <a href="send-items.php" class="list-group-item text-white py-3 email-item">
                    <i class="fa-solid fa-paper-plane me-2"></i> Send Items
                </a>
                <a href="archives.php" class="list-group-item text-white py-3 email-item">
                    <i class="fa-solid fa-box-archive me-2"></i> Archives
                </a>
                <a href="favourites.php" class="list-group-item text-white py-3 email-item">
                    <i class="fa-solid fa-star me-2"></i> Favourites
                </a>
            </div>
        </div>

        <!-- Message -->
        <div class="col-12 col-md-9 d-flex flex-column bg-white p-0">
            <div class="p-3 border-bottom text-center" style="background:#385D7B;">
                <h6 class="mb-0 fw-bold text-white">New Message</h6>
            </div>

            <div class="p-4 d-flex flex-column flex-grow-1">
                <form class="d-flex flex-column flex-grow-1" action="includes/message-inc.php" method="post" >
                    <div class="mb-4 border-bottom">
                        <label class="small fw-bold text-muted">To:</label>
                        <input type="text"  name="recipients" class="form-control border-0 shadow-none p-0"  required=required>
                    </div>

                    <div class="mb-4 border-bottom">
                        <label class="small fw-bold text-muted">Subject:</label>
                        <input type="text" name="subject" class="form-control border-0 shadow-none p-0" required=required />
                    </div>

                    <textarea class="form-control border-0 shadow-none flex-grow-1 mb-3"
                        placeholder="Write your Message here..." name="messageBody" style="resize:none;" required=required></textarea>

                    <div class="pt-3 border-top d-flex align-items-center">
                        <button  type = "submit" name="submit" class="btn px-5 py-2 me-3" style="background:#2787B4;color:#fff;">
                            Send
                        </button>

                        <label class="btn btn-outline-secondary border-0 p-2 attach-file"> 
                            <i class="fa-solid fa-upload fs-4"></i> <input type="file" hidden name="file"> 
                        </label>
                    </div>
                </form>
            </div>
        </div>

    </div>
</main>

<?php include "includes/footer.php"; ?>
