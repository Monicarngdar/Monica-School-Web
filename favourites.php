<?php include "includes/inbox-inc.php"; ?>
<?php include "includes/header.php"; ?>

<?php
if (!isset($favourites)) {
    $favourites = []; 
}
?>

<script>
function submitForm(Id,action){
    
    form = document.getElementById('form' + Id);
    form.action.value=action;
    document.getElementById('form' + Id).submit();
}
</script>

<main class="main-content-wrapper p-0 overflow-hidden ">
    <div class="row g-0 overflow-hidden bg-white" style="min-height: calc(100vh - 44px);">

                  <!--Message Menu-->
    <?php include "includes/message-menu-inc.php"; ?>
    
            <!-- Favourites Title -->
        <div class="col-12 col-md-9 d-flex flex-column bg-white p-0">
            <div class="p-3 border-bottom text-center" style="background:#385D7B;">
                <h6 class="mb-0 fw-bold text-white">Favourites</h6>
            </div>

     <!--Favourites List-->
        <div class="p-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <h2 class="text-center mb-4"></h2>
                    </div>
                </div>
            
                <div class="bg-white p-3 ">
                    <div class="row fw-bold border-bottom pb-2 mb-3 text-secondary">
                        <div class="col-4">Subject</div>
                        <div class="col-3">From</div>
                        <div class="col-3">Date</div>
                        <div class="col-2">Actions</div> 
                    </div>

        <?php foreach($favourites as $mail): ?>
             <form action="favourites.php" method="post" id="form<?php  echo $mail['messageId']; ?>" class="mb-0">
                  <div class="row align-items-center py-3 border-bottom hover-effect">
                      <input type="hidden" name="messageId" value="<?php echo $mail['messageId']; ?>">
                      <input type="hidden" name="action" id="action<?php echo $mail['messageId']; ?>" value="view">

                    <div class="col-4 fw-bold text-dark">
                      <?php echo($mail['messageSubject']); ?>
                    </div>
                        <div class="col-3 text-muted">
                        <?php echo($mail['senderUsername']); ?>
                        </div>
                        <div class="col-3 text-muted small">
                        <?php echo date('M d, Y', strtotime($mail['sendDateTime'])); ?>
                    </div>

                    <div class="col-2 d-flex gap-2">

                   <!-- View button -->
                    <i class="fa-solid fa-envelope-open" 
                    style="color: #007bff;; cursor: pointer;" 
                    onclick="submitForm(<?php echo $mail['messageId']; ?>, 'viewinbox');"
                    title="View Message"></i>

                    <!-- Unfavourite button -->
                   <i class="fa-solid fa-star"   
                    style="color: #FFD43B; cursor: pointer;" 
                    onclick="submitForm(<?php echo $mail['messageId']; ?>, 'unfavourite');"
                    title="Remove Favourites Message"></i>             
                                                
                <!-- Delete button -->
                    <i class="fa-solid fa-trash"  
                    style="color: #dc3545; cursor: pointer;" 
                   onclick="submitForm(<?php echo $mail['messageId']; ?>, 'delete');"
                   title="Delete Message"></i>

                    </div>
                </div>
                </form>
                <?php endforeach; ?>


                </div>
            </div>
        </div>
     </div> 
    </main>

<?php include "includes/footer.php"; ?>