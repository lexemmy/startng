<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to SNG Hospital</title>

    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/styles2.css">
    <script src="js/scripts.js"></script>
</head>
<body style="background-color: #d8d8d8;">
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal"><a href="index.php">StartNG Academy</a></h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-light" href="index.php">Home</a>
            <?php if(!isset($_SESSION['loggedIn'])){ ?>
        
                <a class="p-2 text-light" href="login.php">Login</a> 
                <a class="p-2 text-light" href="register.php">Register</a> 
                
            <?php }else{ ?>
                
                <a class="p-2 text-light" href="reset.php">Reset password</a>  
                <a class="p-2 text-light" href="logout.php">Logout</a>
            <?php } ?>
          
        </nav>
       
    </div>