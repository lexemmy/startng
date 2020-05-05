<?php session_start();




$email = $_SESSION['email'];
$currentUser = $email . ".json";
$userString = file_get_contents("db/users/".$currentUser);
$userObject = json_decode($userString);





                        $userObject->logindate = date("y/m/d h:i:s");
            
                        unlink("db/users/".$currentUser); //file delete, user data delete
                        
file_put_contents("db/users/". $email . ".json", json_encode($userObject));
                       
 


session_unset();
session_destroy();

header("Location: login.php");



?>
