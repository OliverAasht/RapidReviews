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
     background-color: white;
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
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


    <div class="offset-by-six">
			<div class="border_box">
		<br>
			<h2>Register as a user</h2>

				<form method="post" action="register.php">
  						Username :<input name="username" type="text" id="username" maxlength="30"> 
  						<span id="user-result"></span><!----This line of code was copied from the website http://www.sanwebe.com/2013/04/username-live-check-using-ajax-php.
  						This is a website which provides related resources, tips and tutorials to web developers------>
  						<br>
  						Password: <input type="password" id="password" name="password" maxlength="100"/>
  						<span id="result"></span><!----The line of code was copied from:
						www.formget.com/password-strength-checker-in-jquery/. 
						formget is a website which provides tutorials on how to create html forms.-------->
						<br>
						Email: <input type="email" placeholder='example@email.co.uk' name="email" />
						<br>
						<!----The following code block, which begins with the comment "Captcha Image using Secure Image START" and ends with the comment "Captcha Image using Secure Image END",
						was ammended from the website https://www.phpcaptcha.org/. Securimage is an open-source free PHP CAPTCHA script for generating complex images and CAPTCHA codes to protect forms from spam and abuse ----->
						<!---Captcha Image using Secure Image START ------>
						<img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" /><br>
						<input type="text" name="captcha_code" size="10" maxlength="6" />
						<a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
						<!---Captcha Image using Secure Image END ------>
						<br>
						<br>
						<input type="submit" name="submit" value="submit" />

  				</form>
	
		<script>
							//This block of code, which starts with the comment "AJAX Begin" and ends with "AJAX End", was copied from the website http://www.sanwebe.com/2013/04/username-live-check-using-ajax-php.
  						//This is a website which provides related resources, tips and tutorials to web developers

  						//AJAX Begin
							$("#username").keyup(function (e) { //user types username on inputfiled
   							var username = $(this).val(); //get the string typed by user
   							$.post('check_username.php', {'username':username}, function(data) { //make ajax call to check_username.php
  								 $("#user-result").html(data); //dump the data received from PHP page
   							});
						});//AJAX End

							/*
	jQuery document ready.
*/
//The following script block, which begins with the comment "password check start" and ends with the comment "password check end", was ammended from:
//www.formget.com/password-strength-checker-in-jquery/. formget is a website which provides tutorials on how to created html forms.
//Password Check START 
$(document).ready(function()
{
	/*
		assigning keyup event to password field
		so everytime user type code will execute
	*/

	$('#password').keyup(function()
	{
		$('#result').html(checkStrength($('#password').val()))
	})	
	
	/*
		checkStrength is function which will do the 
		main password strength checking for us
	*/
	
	function checkStrength(password)
	{
		//initial strength
		var strength = 0
		
		//if the password length is less than 6, return message.
		if (password.length < 6) { 
			$('#result').removeClass()
			$('#result').addClass('short')
			return 'Too short' 
		}
		
		//length is ok, lets continue.
		
		//if length is 8 characters or more, increase strength value
		if (password.length > 7) strength += 1
		
		//if password contains both lower and uppercase characters, increase strength value
		if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1
		
		//if it has numbers and characters, increase strength value
		if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 
		
		//if it has one special character, increase strength value
		if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1
		
		//if it has two special characters, increase strength value
		if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
		
		//now we have calculated strength value, we can return messages
		
		//if value is less than 2
		if (strength < 2 )
		{
			$('#result').removeClass()
			$('#result').addClass('weak')
			return 'Weak'			
		}
		else if (strength == 2 )
		{
			$('#result').removeClass()
			$('#result').addClass('good')
			return 'Good'		
		}
		else
		{
			$('#result').removeClass()
			$('#result').addClass('strong')
			return 'Strong'
		}
	}
});
//password check End
		</script>

	<?php

	$username = $_POST['username'];
	$password2 = $_POST['password'];
	$email = $_POST['email'];
	$captcha = $_POST['captcha_code'];

			if (isset($_POST['submit'])) {

				$error_check = array();

			if (empty($username)) {
								$error_check[] = 'Please enter a username';

								}

			if (empty($password2)) {
								$error_check[] = 'Please enter a password';

								}

			if (strlen($password2) < '6') {
								$error_check[] = 'Your password must contain at least 6 characters';

								}
			if (preg_match('/[A-Za-z]/', $password2) && preg_match('/[0-9]/', $password2))
			{
   			//

			}
			else {
	   		$error_check[] = 'Password does not include both upper and lower case letters. At least one numerical value is also required';

			}


			if (empty($email)) {
								$error_check[] = 'Please enter an email';

								}

			if (empty($captcha)) {
								$error_check[] = 'Please enter an answer to the captcha question';

								}

			if (!empty($captcha)){

									//include_once $_SERVER['DOCUMENT_ROOT'] . 'securimage/securimage.php';
									include_once 'securimage/securimage.php';
									$securimage = new Securimage();


									if ($securimage->check($_POST['captcha_code']) == false) {
  									// the code was incorrect
									// you should handle the error so that the form processor doesn't continue
									// or you can use the following code if there is no validation or you do not know how
  										echo "The security code entered for the captcha image was incorrect.<br />";

  										echo "Please try again.";

 										exit;

								}	


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
					$email = filter_var($email, FILTER_SANITIZE_EMAIL);

					$user_type = 'User';

					$stored_password = password_hash($password2, PASSWORD_DEFAULT, array('cost' => 12));

					if (filter_var($email, FILTER_VALIDATE_EMAIL))
					{
						$query = "INSERT INTO rr_users (USERNAME, PASSWORD, EMAIL, USER_TYPE) VALUES ('$username', '$stored_password', '$email', '$user_type');";

												mysqli_query($connection, $query) or exit("Error in query: " . $query . mysqli_error());

					
												if (mysqli_affected_rows($connection) >= 1) {
												echo 'Success! You are now a registered user. Please log in.';

													} else {
													// print error message
													echo "Error in query: $query. " . mysqli_error($connection);
														exit ;
														}
					}
					else
					{
						echo 'Invalid email provided.';
					}


										}	

				}

	

	?>

	</div>
	<br>
	</div>
	</div>

</div>
<?php require 'footer.php'; ?>