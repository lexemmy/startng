<?php include_once('lib/header.php');
      require_once('functions/alert.php');
      require_once('functions/redirect.php');


if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    // redirect to dashboard
    if ($_SESSION['role'] == "Medical Team") {
        redirect_to('medicaldashboard.php');
    }else{
        redirect_to('patientdashboard.php');
    }
    
}

?>


    <div class="container border shadow-sm" style="background-color: silver;">
    <div class="row">
        <h3>Login</h3>
    </div>
    <div class="row">
    <p>
        <?php  print_alert(); ?>
        </p>
    </div>
    <div class="row">
        
        <form method="POST" action="processlogin.php">
         <p>
                <label>Email</label><br />
                <input
                
                <?php              
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];                                                             
                    }                
                ?>

                type="text" class="form-control" name="email" placeholder="Email"  />
            </p>

            <p>
                <label>Password</label><br />
                <input class="form-control" type="password" name="password" placeholder="Password"  />
            </p>       
        
        
            <p>
                <button class="btn btn-sm btn-primary" type="submit">Login</button>
            </p>
            <p>
                <a href="forgot.php">Forgot password</a>
            </p>
            <p>
                <a href="register.php">Don't have an account? Register</a>
            </p>
        </form>
    </div>

   
    
</div>
<?php include_once('lib/footer.php'); ?>