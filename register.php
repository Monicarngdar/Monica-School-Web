<?php 
    include "includes/header.php";

?>

<div class="container" style="width:800px;">
    <div class="row">
        <div class="col">
            <h3>Register a User</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
        
            <form action="includes/register-inc.php" method="post">
                <div class="row">
                    <div class="col">
                        <input type="text" name="username" id="username" placeholder="joeborg" class="w-100 m-2">
                    </div>
                    <div class="col">
                        <input type="email" name="email" id="email" placeholder="joeborg@gmail.com" class="w-100 m-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="password" name="password" id="password" placeholder="abc123!" class="w-100 m-2">
                    </div>
                    <div class="col">
                        <input type="password" name="confpass" id="confpass" placeholder="abc123!" class="w-100 m-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="name" id="name" placeholder="Joe" class="w-100 m-2">
                    </div>
                    <div class="col">
                        <input type="text" name="surname" id="surname" placeholder="Borg" class="w-100 m-2">
                    </div>
                </div>
                
                <div class="row my-3">
                    <div class="col">
                        <button class="btn btn-success w-100 m-2" type="submit" name="submit" id="submit">Submit</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-danger w-100 m-2" type="reset" name="reset" id="reset">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

