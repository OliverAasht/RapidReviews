<?php require 'header.php'; ?>
<!-- Content -->
<div id="content">
	<div class="container">
		
	<style>
	body{
		 background-color: black;
	}
	#content
	{
     margin: 0 auto;
     top: 0;
     background-color: #f0f0f0;
	}
	.border_box {
        background: #fff;
        width: 310px;
        box-shadow: 3px 3px 5px rgba(90,90,90,0.5);
        margin-bottom: 0;
        padding-left: 10px;
    }
   input[type=submit] 
    {color:#fff;
    font-weight:bold;
    padding:6px 15px;
    font-size:14px;
    border-radius:4px;
    background:#e50914;
    border:0
		}
		input[type=submit]:hover
    {color:#fff;
    font-weight:bold;
    padding:6px 15px;
    font-size:14px;
    border-radius:4px;
    background:#e50914;
    border:0
		}
		.error_msg
	{
    background-color: #EE5C42;
        border: 2px solid #e50914;
     width: 295px;
        color: black;

	}
	</style>
	

	
    <div class="offset-by-six">
    	<br>
 		<div class="border_box">
	<h2 style=" text-align: center;">Login</h2>
					<form method="post" action="login.php">
						Username: <input type="text" name="username" />
						Password: <input type="password" name="password" />
						<input type="submit" name="submit" value="Log in" />
					</form>

		
	<?php

	if (isset($_POST['submit'])) {

			//Gather details submitted
			$username = $_POST['username'];
			$password2 = $_POST['password'];

			$error_check = array();

			if (empty($username)) {
								$error_check[] = 'Please enter a username';

								}

			if (empty($password2)) {
								$error_check[] = 'Please enter a password';

								}

			if (!empty($error_check)) {

				echo '<div class="error_msg">';
									foreach ($error_check as $key => $value) {
											
									echo $value . "<br />";
											}
									echo '</div>';
										}

										else {

	 include 'connection.php';
	 

 	//filter and clean
	$username = trim($username);
	$username = strip_tags($username);
	$username = htmlspecialchars($username);
	$username = addslashes($username);
	$username = mysqli_real_escape_string($connection, $username);

	$password2 = trim($password2);
	$password2 = strip_tags($password2);
	$password2 = htmlspecialchars($password2);
	$password2 = addslashes($password2);
	$password2 = mysqli_real_escape_string($connection, $password2);


	$username = filter_var($username, FILTER_SANITIZE_STRING);
	$password2 = filter_var($password2, FILTER_SANITIZE_STRING);
	

	//build query to SELECT records from the users table WHERE
	//the username AND password in the table are equal to those entered.
	$query = "SELECT * FROM rr_users WHERE username = '$username' ";

	//run query and store result
	$result = mysqli_query($connection, $query) or exit("Error in query: " . $query . mysqli_error());

	
	 while ($row = mysqli_fetch_assoc($result)) {

	 	$storedpassword = $row['PASSWORD'];
	 	$userid = $row['USER_ID'];
	 }

	// echo $storedpassword;
	

	if(password_verify($password2, $storedpassword))
	{
		$_SESSION['username'] = $username;
		$_SESSION['userid'] = $userid;
		//echo 'Third' . $_SESSION['username'];
			header('location:index.php');


	}
	else
	{
		echo 'Error. You are not recognised as a valid user.';
		echo 'Please try again';
	}



	}
}

	?>
	</div>
	</div>
	<br>
	</div>
</div>
<?php require 'footer.php'; ?>