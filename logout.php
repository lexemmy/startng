<?php session_start();


$email = $_SESSION['email'];
$currentUser = $email . ".json";
$userString = file_get_contents("db/users/".$currentUser);
$userObject = json_decode($userString);
$userObject->logindate = $_SESSION['logintime']; //update userlogin date and time
unlink("db/users/".$currentUser); //user data deleted
file_put_contents("db/users/". $email . ".json", json_encode($userObject)); //user data updated

session_unset();
session_destroy();

header("Location: login.php");

?>
