<?php require 'header.php'; ?>
<div id="content"><!-- Content START-->
	<div class="container"><!-- Container START-->
		<div class="two-thirds column"><!-- 2/3s START-->
			<br>
			<h1>Frequently Asked Questions</h1>
			<br>

			<p><strong>How do both critic ratings and user ratings work?</strong></p>
			<p>Critic ratings are determined by the critic alone. The overall user rating is calculated by taking an average of all the submitted user ratings for that particular piece of media. </p>

			<br>

			<p><strong>How do you determine what reviews to publish?</strong></p>
			<p>Reviews are made based on what TV shows and movies we watch and what games we play. If you would like to see a review on something we haven't reviewed yet please feel free to make a suggestion by completing the form found on the <a href="contactus.php">Contact Us</a> page. </p>

			<br>

			<p><strong>How can I edit my user review?</strong></p>
			<p>At this moment you cannot edit your user review once it has been submitted. However, we are aware that this is a pressing issue of our users. This kind of funtionality, as well as much more functionality for users, will be added in the near future by our developers.</p>

			<br>

			<p><strong>Where can I make suggestions on how to improve this site?</strong></p>
			<p>Please use the form found on the <a href="contactus.php">Contact Us</a> page of the website. Your constructive criticism is much appreciated. Please keep suggestions clean and don't add any bad language or unjustified negative criticism. We welcome your thoughts as we know this isn't a perfect site. </p>


			<br>

			<p><strong>How can I submit a question regarding the site?</strong></p>
			<p>Please use the form found on the <a href="contactus.php">Contact Us</a> page of the website. Your question may appear on the frequently asked questions page. Your question will be responded too as soon as possible. </p>

		</div><!-- 2/3s END-->

		<div class="one-third column"><!-- 1/3 START-->
			<br>

		<style>
		.rel_content
		{
			background-color: #dfdfdf;
	
		}

		</style>

		<div class="rel_content">
		<div style="padding: 5px;">
			<h3>Contact Rapid Reviews</h3>
			<p>Please use the <a href="contactus.php">Contact Us</a> page to make any suggestions on how the site can be improved. You can also use the page to submit any bugs that you find in the site. Also, use this page to suggest any reviews that you'd like to see appear on the site. </p>
		</div>
		</div>

		<?php 
		echo '<br>';

		include 'connection.php';

		include 'latest_tvshow.php';

		echo '<br>';

		include 'latest_movies.php';

		echo '<br>';


    	include 'latest_games.php';


		?>

		</div><!-- 1/3 END-->

	</div><!-- Container END-->
	<br>

</div><!-- Content END-->
<?php require 'footer.php'; ?>