<?php 
ob_start();
require_once 'config/init.php';?>
<!DOCTYPE html>
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Rapid Reviews</title>
	<meta name="description" content="Rapid Reviews movies tv shows games">
	<meta name="author" content="Oliver Aasht">

	<!-- CSS
  ================================================== -->
	
	<link rel="stylesheet" href="assets/css/base.css">
	<link rel="stylesheet" href="assets/css//skeleton.css">
	<link rel="stylesheet" href="assets/css/layout.css">
	<link rel="stylesheet" href="assets/css/tabs.css">

	

</head>
<body>	
	
		<div id="header"><!----Start of first header------>
			
			<style>
					#header 
					{
    					background-color: black;
    					height: 68px;
    					width: 100%;

    					margin-top: 0;
    				
					}
					#primary-nav
					{
						margin-top: 20px;
						padding-left: 10%;
					}
					#primary-nav li
					 {
						text-decoration:none;
    					display: inline;
    					padding-left: 10%;

						}
					#primary-nav ul li a 
					{ 

						 list-style-type: none;
						text-decoration: none; 
						color: white;
						 font-size: 150%;
						 font-weight: bold;
						 padding:6px 15px;
						 
						 
					}
					#primary-nav ul li a:hover 
					{
    					/*border-radius: 0.5em;
    					padding: 1px;
    					background-color: #e50914;*/
    					/*padding:6px 15px;*/
    					border-radius:4px;
    					background:#e50914;
    					border:0
					}
					#search_box
					{
						margin-top: 20px;


					}
					#social_media 
					{
					
						padding-right: 2px;
						float: left;
						color: white;
						
					}
			</style>
				
					<div class="container">
						
						<div class="three columns">
							<style>
							.three{
							height: 68px;
						}
							</style>
							<a href="index.php">
							<img id="logo" src="assets/images/logo1.jpg" width="200px" height="65px">
							</a>

						

						</div>

			
						<div class="ten columns">
							<div id="primary-nav">
							<ul>
  	
  								<li><a href="tvshows.php">TV Shows</a></li>
 								<li><a href="movies.php">Movies</a></li>
  								<li><a href="games.php">Games</a></li>

							</ul>
							</div>

						</div>

						<div class="three columns">


						<form action="search_res.php" method="post" >
						<input id="search_box" name="sq" placeholder='Search for reviews' type="search">
						</form> 

						</div>

				
					</div>


		</div><!----END of first header------>
		<div id="header2"><!----Start of SECOND header------>
			
				<style>
					#header2
					 {
    					background:#e50914;/*ff000b*/
    					height: 40px;
    					width: 100%;
    					  
						}
					#user_options
					{
						float: right;
						padding-top: 5px;
						color: white;
						
					}
					#user_options a 
					{
						text-decoration: none; 
						color: white;
					}
					#user_options a:hover { text-decoration: underline;}
				

				</style>

				<div class="container">
					<div class="sixteen columns">

						
								<div id="social_media">
									<style>
									#social_media{
										margin-top: -15px;
										height: 40px;
									}

									</style>
							<p>
								<!---<strong style="color: white; ">FOLLOW US</strong>------>
								<ul  >
									<li style="display: inline; padding-right: 10px;">FOLLOW US</li>
									
									<li style="display: inline; padding-right: 5px;">
											<a  href="https://twitter.com/Rapid_ReviewsUK"><img src="assets/images/twitter1.png"  onmouseover="this.src='assets/images/twitter2.png'" onmouseout="this.src='assets/images/twitter1.png'"  /></a>

									</li>
									
									<li style="display: inline;">
										<a href="https://www.facebook.com/RapidReviewsUK" >
									<img src="assets/images/FB-f-Logo__blue_29.png" height="20px" width="20px" onmouseover="this.src='assets/images/FB-f-Logo__white_29.png'" onmouseout="this.src='assets/images/FB-f-Logo__blue_29.png'"  />
										</a>
									</li>

								</ul>
							</p>

							</div>
					   
					<?php
						/*echo '<div class="two-thirds column">';
						echo '<div id="social_media">';
						echo '<p>';
						echo '<strong style="color: white;">FOLLOW US</strong>';
						echo '</p>';
						echo '</div>';
						echo '</div>';*/

						if (isset($_SESSION['username'])) {
					echo '<div id="user_options">';
					echo 'Welcome ' . $_SESSION['username'] . ' | ';
					
					echo '<a href="logout.php">logout</a>' . ' ';
					echo '</div>';
					

						}

							if (!isset($_SESSION['username'])){
						echo '<div id="user_options">';
  						echo	'<a href="login.php">Log in</a>'. ' | ';
  						echo 	'<a href="register.php">Register</a>';
  						echo '</div>';
  					}


  							?>
  				</div>
  				</div>
  					
  		</div><!----END of SECOND header------>
					

	
	
	