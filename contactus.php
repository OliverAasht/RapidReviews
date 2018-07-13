<?php require 'header.php'; ?>
<div id="content"><!-- Content START-->

	<div class="container"><!-- Container START-->

		<div class="two-thirds column"><!-- 2/3s START-->
			<style>

			.error_msg
	{
    background-color: #EE5C42;
        border: 2px solid #e50914;
     width: 295px;
        color: black;

	}

			</style>
			<br>

			<h1>Contact Rapid Reviews</h1>
			<br>

			<p><strong>Please use the contact form below to submit any questions, bugs, suggestions or other related queries.</strong></p>
							<form name="input" action="contactus.php" method="post">
										
								Your Email: <input type ="email"  placeholder='example@email.co.uk' name="email"><br>
								Security question - What is 5 + 3? : <input type ="number" name="sq"><br><br>
								Subject: <input type ="text" name="subject"><br>
								Message: <textarea style="width: 600px; height: 250px;" placeholder='Your message' rows="6" cols="100" name="desc"></textarea><br>
						<input type="submit" name="submit" value="submit" />

							</form>

			<?php
			//collect form variables
			$to = 'rapid_reviewsuk@hotmail.com';

			$subject = $_POST['subject'];

			$message = $_POST['desc'];

			$sEmail = $_POST['email'];


			$secureQ = $_POST['sq'];


			if (isset($_POST['submit'])) {

				$error_check = array();

				if (empty($sEmail)) {
								$error_check[] = 'Please enter your email address';

								}

				if (empty($secureQ)) {
								$error_check[] = 'Please enter an answer for the security question';

								}

				 if (!is_numeric($secureQ)) {
				 				$error_check[] = 'Please enter a numerical number for the security question';


				 }

				if (empty($subject)) {
								$error_check[] = 'Please enter a subject title';

								
							}

				if (empty($message)) {
								$error_check[] = 'Please enter a message for Rapid Reviews';

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



			$sEmail = filter_var($sEmail,FILTER_SANITIZE_EMAIL);

			$headers = $sEmail . "\r\n" .

			'Reply-To: '. $sEmail . "\r\n" .

			'X-Mailer: PHP/' . phpversion();


			

	//sanitise
	$subject = trim($subject);
	$subject = strip_tags($subject);
	$subject = htmlspecialchars($$subject);
	$subject = addslashes($subject);
	$subject = mysqli_real_escape_string($connection, $subject);
	$subject = filter_var($subject,FILTER_SANITIZE_STRING);

	$message = trim($message);
	$message = strip_tags($message);
	$message = htmlspecialchars($message);
	$message = addslashes($message);
	$message = mysqli_real_escape_string($connection, $message);

	$message = filter_var($message,FILTER_SANITIZE_STRING);

	

if(filter_var($sEmail, FILTER_VALIDATE_EMAIL)){

	if($secureQ == '8'){
		if (mail($to, $subject, $message, $headers))
			{

				echo 'You have successfully submited an email message to Rapid Reviews. We will respond ASAP';
			}
		}
		else {
				echo 'Your answer to the security question was incorrect';
				}		
}
	else {
				echo 'Your email was not valid';
				}	

}
}
?>



		</div><!-- 2/3s END-->

		<div class="one-third column"><!-- 1/3 START-->
			

			 <?php
include 'connection.php';

include 'latest_tvshow.php';

echo '<br>';

include 'latest_movies.php';

echo '<br>';


    include 'latest_games.php';

  ?>

		</div><!-- 1/3 END-->

	</div><!-- Container END-->

</div><!-- Content END-->
<?php require 'footer.php'; ?>