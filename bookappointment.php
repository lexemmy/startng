<?php include_once('lib/header.php');
require_once('functions/redirect.php'); 
if(!isset($_SESSION['loggedIn']) || $_SESSION['role'] !== "Patient"){
    // redirect to login
    redirect_to('login.php');
}

?>


    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center border shadow-sm" style="background-color: #87ceeb;">
        <h1 class="display-5">Patient Dashboard</h1>
        <p class="lead">Hi, <?php echo $_SESSION['fullname'] ?> . Welcome to Startdotng Hospital</p>
        
      
    </div>
<div class="container">
	<div class="row">
		<div class="col-md-6 pt-3">
        <p class="lead">Please fill the form below to book an appointment</p>
       
        <form method="POST" action="processappointment.php">
	 <p>
                <label>Date</label>
                <input type="Date" class="form-control" name="date" value="<?php echo date('y-m-d'); ?>" />

            </p>
            <p>
                <label>Time</label>
                <input type="Time" class="form-control" name="time" value="<?php echo time('h:i A'); ?>" />

            </p>
            <p>
                <label>Nature of appointment</label>
                <input type="text" class="form-control" name="noa" placeholder="nature of appointment" />

            </p>
            <p>
                <label>Department</label>
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
                <label>Initial complaint</label>
                <textarea class="form-control" rows="5" name=complaint> </textarea>

            </p>
            <p>
                <button class="btn btn-sm btn-primary" type="submit">Book appointment</button>
            </p>
	
</form>
			
		</div>
        <div class="col-md-6 pt-5 pl-4 mx-auto text-center" >
		</div>
		
	</div>
	
</div>

<?php include_once('lib/footer.php'); ?>