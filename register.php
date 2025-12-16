<?php 
    include "includes/header.php";

?>

<div class="container user-register mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6"> 
            
            <div class="row">
                <div class="col">
                    <h2 class="text-center mb-5">Register a User</h2>
                </div>
            </div>

    <div class="row">
        <div class="col">
        
            <form action="includes/register-inc.php" method="post" class="mt-4">
                <div class="row">
                    <div class="col">
                        <input type="text" name="username" id="username" placeholder="Username" class="w-100 m-2">
                    </div>
                    <div class="col">
                        <input type="email" name="email" id="email" placeholder="Email Address" class="w-100 m-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="password" name="password" id="password" placeholder="Password" class="w-100 m-2">
                    </div>
                    <div class="col">
                        <input type="password" name="confpass" id="confpass" placeholder="abc123!" class="w-100 m-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="name" id="name" placeholder="Name" class="w-100 m-2">
                    </div>
                    <div class="col">
                        <input type="text" name="surname" id="surname" placeholder="Surname" class="w-100 m-2">
                    </div>
                </div>
                
                <div class="row my-3">
                    <div class="col">
                        <button class="btn btn-primary w-100 m-2" type="submit" name="submit" id="submit">SUBMIT</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-danger w-100 m-2" type="reset" name="reset" id="reset">CANCEL</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

