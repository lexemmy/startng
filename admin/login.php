<?php include_once('header.php');
require_once('../functions/alert.php');
     

if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    // redirect to dashboard
    header("Location: admindashboard.php");
}

?>
<div class="container"  style="background-color: white;">
  
    <div class="row col-6">
        <h3>Login</h3>
    </div>
    <p>
        <?php  print_alert(); ?>
        </p>
    <div class="row col-6">
        
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
            
        </form>
    </div>
</div>
<?php include_once('footer.php'); ?>