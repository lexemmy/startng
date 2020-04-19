<?php session_start();
require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/tokens.php');
require_once('functions/user.php');
require_once('functions/email.php');

//Check for error

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$_SESSION['email'] = $email;

if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";

    set_alert('error', $session_error);

    redirect_to('forgot.php');

}else{

    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);

    for ($counter = 0; $counter < $countAllUsers ; $counter++) {
        
        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){
  
        $token = generate_token();  //generate token       

         $subject = "Password Reset Link";
         $message = "A password reset has been initiated from your account, if you did not initiate this reset, please ignore this message, otherwise, visit: localhost/start.ng/reset.php?token=".$token;
                 
         file_put_contents("db/tokens/". $email . ".json", json_encode(['token'=>$token]));
        
        //send password reset link
         send_mail($subject,$message,$email);

         die();

        }
        
    }
    set_alert('error',"Email not registered with us: " . $email);
   
    redirect_to("forgot.php");

}


