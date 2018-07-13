<?php

//the following was ammended from the website http://www.sanwebe.com/2013/04/username-live-check-using-ajax-php.
//This is a website which provides related resources, tips and tutorials to web developers
if(isset($_POST["username"]))
{
  //connect to database
include 'connection.php';
  
  //received username value from registration page
  $username =  $_POST["username"]; 

  //check username in db
  $results = mysqli_query($connection,"SELECT username FROM rr_users WHERE username='$username'");
  
  $username_exist = mysqli_num_rows($results); //records count
  
  //if returned value is more than 0, username is not available
  if($username_exist) {
      die('<img src="assets/images/not-available.png" />');
  }else{
      die('<img src="assets/images/available.png" />');
  }
}
?>