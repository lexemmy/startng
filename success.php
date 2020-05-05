<?php
include_once('lib/header.php');
require_once('functions/redirect.php');
require_once('functions/alert.php');
require_once('functions/email.php');
require_once('functions/user.php');

if(!isset($_SESSION['loggedIn']) || $_SESSION['role'] !== "Patient"){
    // redirect to login
    redirect_to('login.php');
}
?>

<?php 

if(isset($_GET['txref'])){
    $txref = $_GET['txref'];

    $userData = json_decode($_SESSION['userObject']);
    $date = (date("y-m-d",time()));
    $time = (date("h:i A",time()));
    $amount = 2000;
    $email = $_SESSION['email'];

    //create transaction object
    $transaction = [
        'date'=>$date,
        'time'=>$time,
        'amount'=>$amount,
        'txref'=>$txref,
        'email'=>$userData->email,
        'fullname'=>$userData->first_name . " " . $userData->last_name
    ];

    //save transaction to database
    save_transaction($transaction);

    //fetch and update user payment status in appointmnt
    $currentUser = $email . ".json";
    $userString = file_get_contents("db/appointments/".$currentUser);
    $userObject = json_decode($userString);
    $userObject->payment = "Paid"; //update payment status
    unlink("db/appointments/".$currentUser); // data deleted
    file_put_contents("db/appointments/". $email . ".json", json_encode($userObject)); // data updated
    
    //send confirmation mail to user
    $subject = "Transaction successfull";
    $message = "your transaction was successful! you paid NGN2,000 for your appointment";
    send_transaction_mail($subject,$message,$email);

    //redicte to dashboard with success message
    $_SESSION["message"] = "Your payment succussfully";
    redirect_to("patientdashboard.php");
    exit();
}


?>

<?php include_once('lib/footer.php'); ?>
