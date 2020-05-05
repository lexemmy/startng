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
                <input  <?php              
                    if(isset($_SESSION['first_name'])){
                        echo "value=" . $_SESSION['first_name'];                                                             
                    }               
                ?> type="text" class="form-control" name="first_name" placeholder="First Name" />

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
                        if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Medical Team</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Patient</option>
                     
                </select>


            </p>
            <p>
                <label class="label" for="department">Department</label><br />
                <select class="form-control" name="department" >
                
                    
                <option 
                <?php              
                    if(isset($_SESSION['department']) && $_SESSION['department'] == 'General suregery'){
                        echo "selected";                                                           
                    }                
                ?>
                >General surgery</option>
                <option 
                <?php              
                    if(isset($_SESSION['department']) && $_SESSION['department'] == 'Cardiology'){
                        echo "selected";                                                           
                    }                
                ?>
                >Cardiology</option>
                <option 
                <?php              
                    if(isset($_SESSION['department']) && $_SESSION['department'] == 'Physiotherapy'){
                        echo "selected";                                                           
                    }                
                ?>
                >Physiotherapy</option>
                <option 
                <?php              
                    if(isset($_SESSION['department']) && $_SESSION['department'] == 'Gynecology'){
                        echo "selected";                                                           
                    }                
                ?>
                >Gynecology</option>
                <option 
                <?php              
                    if(isset($_SESSION['department']) && $_SESSION['department'] == 'Neurology'){
                        echo "selected";                                                           
                    }                
                ?>
                >Neurology</option>
                 
            </select>

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