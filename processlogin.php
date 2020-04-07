<?php session_start();

require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/user.php');

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] :  $errorCount++;


if ($email == "admin@admin.com") {
  

    $userString = file_get_contents("db/admin/admin@admin.com.json");

    $userObject = json_decode($userString);
    $passwordFromDB = $userObject->password;

    if (password_verify($password, $passwordFromDB)) {

         $_SESSION['fullname'] = $userObject->first_name;
         $_SESSION['loggedIn'] = $userObject->id;

        redirect_to("admindashboard.php");
    
    }


    




} else{



$_SESSION['email'] = $email;

if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";
    
    set_alert('error',$session_error);
      
    redirect_to("login.php");

}else{
    
    $currentUser = find_user($email);

        if($currentUser){
          //check the user password.
            $userString = file_get_contents("db/users/".$currentUser->email . ".json");
            $userObject = json_decode($userString);
            $passwordFromDB = $userObject->password;

            $passwordFromUser = password_verify($password, $passwordFromDB);
            
            if($passwordFromDB == $passwordFromUser){
                //redicrect to dashboard
                $_SESSION['logindate'] = $userObject->logindate;
                $_SESSION['date'] = $userObject->date;
                $_SESSION['loggedIn'] = $userObject->id; 
                $_SESSION['email'] = $userObject->email;
                $_SESSION['fullname'] = $userObject->first_name . " " . $userObject->last_name;
                $_SESSION['role'] = $userObject->designation;
                $_SESSION['track'] = $userObject->track;
                
                redirect_to("dashboard.php");


                die();
            }
          
        }        
        

    set_alert('error',"Invalid Email or Password");
    redirect_to("login.php");
    die();

}
}