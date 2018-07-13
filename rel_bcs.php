<style>
.rel_content
{
	background-color: #dfdfdf;
	
}

</style>
<br>
<div class="rel_content">
	<div style="padding: 5px;">
<h3>Other Better Call Saul Episodes</h3>
<?php
   $query_bcs = "SELECT * FROM  `rr_critic_review` WHERE TITLE LIKE '%Better Call Saul%' ";


    $bcs_res = mysqli_query($connection, $query_bcs) or exit("Error in query: " . $query . mysqli_error());

     while ($bcs_row = mysqli_fetch_assoc($bcs_res)) {


        echo '<a style="color: black;" href="'. $bcs_row['PAGE_NAME']. '"> '. $bcs_row['TITLE']. '</a>';
        echo '<br>';
             }

?>
</div>
</div>