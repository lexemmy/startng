<?php
include_once('lib/header.php');
require_once('functions/redirect.php');
require_once('functions/alert.php');
require_once('functions/fetch.php');

if(!isset($_SESSION['loggedIn'])){
    // redirect to login
    redirect_to('login.php');
}

$email = $_SESSION['email'];
?>


<div class="container">
	
	<div class="row">
		<div class="col-md-12 pt-3">
        <a class="btn btn-outline-primary" href="patientdashboard.php" style="margin: 20px"> < Back</a>

        
                <p>  Transaction history</p>
        <div id="table">
        
        
        <?php
        $rows = transaction($email);
        if ($rows) {

        ?>
            <table class="table table-bordered table-striped table-hover">
               
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Transaction reference</th>
                        <th scope="col">Email</th>
                        <th scope="col">Fullname</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php echo $rows; ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>You have no transaction</p>
        <?php } ?>

    </div>

		</div>
        
		
	</div>
		
	
	
</div>

<?php include_once('lib/footer.php'); ?>