<?php require 'header.php'; ?>
<div id="content">
<!-- Content -->
<div class="container">
    <div class="two-thirds column">
      <br>

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
	table, th, td {
    border: 1px solid white;
    text-align:left;
	}
	</style>
	
	<?php
    include 'connection.php';
    //Display heading
    echo "<h1>Search Results</h1>";

    echo "<hr>";
    //run query to select all records from customer table

      $search_query = $_POST["sq"];

     
    
    
    $query = "SELECT * FROM  `rr_critic_review` WHERE TITLE LIKE  '%$search_query%'";

     
    //store the result of the query in a variable called $result
    $result = mysqli_query($connection, $query) or exit("Error in query: " . $query . mysqli_error());

      if(mysqli_num_rows($result) == 0)
   {
    echo '<strong>SORRY, NO RESULTS FOUND FOR "'. $search_query. '" </strong>';
    echo '<br>';

    echo '<br>';

    echo '<br>';
  }
  if (empty($search_query))
   {
    echo '<strong>NO RESULTS, YOU DIDN\'T SEARCH FOR ANYTHING!</strong>';
    echo '<br>';

    echo '<br>';

    echo '<br>';
  }
    

     else if(mysqli_num_rows($result) > 0)
    {
     //Use a while loop to iterate through your $result array and display
    //each field wrapped in appropriate HTML table tags.

    print "<table cellpadding=10 border=1 align=\"center\" width=\"600\">";
    /* echo  '<col width="150">';
     echo  '<col width="150">';
       echo  '<col width="150">';
       echo  '<col width="150">';*/
      
  

    print "<th>Box Art</th><th><a style=\"color: #e50914;\" href=\"search_res.php?TITLE=TITLE ASC\">Title</a></th><th><a style=\"color: #e50914;\" href=\"search_res.php?REVIEW_DATE=REVIEW_DATE DESC\">Review Date</a></th><th><a style=\"color: #e50914;\" href=\"search_res.php?RATING=RATING DESC\">Rating</a></th>";
    while ($row = mysqli_fetch_assoc($result)) {

      $pname = $row['PAGE_NAME'];

      echo "<tr>";

       echo "<td>" . '<img src="assets/images/' . $row['THUMBNAIL'] . '" height="160" width="108" />' . "</td>";


      echo "<td>" . '<a style="color: black;" href="http://oliveraasht.co.uk/Rapid_Reviews/'. $pname. '">'.  $row['TITLE'] . '</a>'. "</td>";

      echo "<td>" . $row['REVIEW_DATE'] . "</td>";

      echo "<td>" . $row['RATING'] . "</td>";




      echo "</tr>";

    }

    Print "</table>";
    }
  

    

   
      ?>

	
</div>
<div class="one-third column">

  <?php

include 'latest_tvshow.php';

echo '<br>';

include 'latest_movies.php';

echo '<br>';


    include 'latest_games.php';

  ?>

  </div>
</div>
<br>
</div>
<?php require 'footer.php'; ?>