<style>
.rel_content
{
	background-color: #dfdfdf;
	
}

</style>
<br>
<div class="rel_content">
	<div style="padding: 5px;">
<h3>Related Comedy Reviews</h3>
<?php
   $query_com = "SELECT * FROM  `rr_critic_review` WHERE GENRE LIKE  '%comedy%'";


    $com_res = mysqli_query($connection, $query_com) or exit("Error in query: " . $query . mysqli_error());

     while ($com_row = mysqli_fetch_assoc($com_res)) {


        echo '<a style="color: black;" href="'. $com_row['PAGE_NAME']. '"> '. $com_row['TITLE']. '</a>';
        echo '<br>';
             }

?>
</div>
</div>