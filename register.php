<?php include_once('lib/header.php');
require_once('functions/alert.php');
 
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    // redirect to dashboard
    header("Location: dashboard.php");
}
// include_once('lib/header.php');

?>
<div class="container">
    <div class="row col-6">
        <h3>Register</h3>
    </div>
    <div class="row col-6">
        <p><strong>Welcome, Please Register</strong></p>
    </div>
    <div class="row col-6">
        <p>All Fields are required</p> 
        
    </div>
    <div class="row col-6">
         
        <p><?php  print_alert(); ?></p>
    </div>
    <div class="row col-12">

        <form method="POST" action="processregister.php">
        
            <p>
                <label>First Name</label>
                <input  
                <?php              
                    if(isset($_SESSION['first_name'])){
                        echo "value=" . $_SESSION['first_name'];                                                             
                    }                
                ?>
                type="text" class="form-control" name="first_name" placeholder="First Name" />

            </p>
            <p>
                <label>Last Name</label>
                <input
                <?php              
                    if(isset($_SESSION['last_name'])){
                        echo "value=" . $_SESSION['last_name'];                                                             
                    }                
                ?>
                type="text" class="form-control" name="last_name" placeholder="Last Name"  />
            </p>
            <p>
                <label>Email</label>
                <input
                
                <?php              
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];                                                             
                    }                
                ?>

                type="text" class="form-control" name="email" placeholder="Email"  />
                
            </p>

            <p>
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password"  />
            </p>
            <p>
                <label>Gender</label>
                <select class="form-control" name="gender" >
                <?php              
                    if(isset($_SESSION['department'])){
                        echo "value=" . $_SESSION['department'];                                                             
                    }                
                ?>
                    
                    <option 
                    <?php              
                        if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Female</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Male</option>
                </select>
            </p>
        
            <p>
                <label>Designation</label><br />
                <select class="form-control" name="designation" >
                
                    
                    <option 
                    <?php              
                        if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Mentor'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Mentor</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'rep'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Rep</option>
                     <option 
                    <?php              
                        if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Student'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Student</option>
                </select>


            </p>
            <p>
                <label class="label" for="track">Track</label><br />
                <input
                <?php              
                    if(isset($_SESSION['track'])){
                        echo "value=" . $_SESSION['track'];                                                             
                    }                
                ?>
                type="text" id="track" class="form-control" name="track" placeholder="Track"  />
            
            </p>
            <p>
                <button class="btn btn-sm btn-success" type="submit">Register</button>
            </p>
            <p>
                    
                    <a href="login.php">Already have an account? Login</a>
            </p>
        </form>

    </div>

</div>
<?php include_once('lib/footer.php'); ?>