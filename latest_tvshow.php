<style>
.rel_content
{
	background-color: #dfdfdf;
	
}

</style>
<br>
<div class="rel_content">
	<div style="padding: 5px;">
<h3>Latest TV Shows</h3>
<?php
   $query_ltv = "SELECT * FROM  `rr_critic_review` WHERE CATEGORY =  'TV Show' ORDER BY REVIEW_DATE DESC LIMIT 5";


    $ltv_res = mysqli_query($connection, $query_ltv) or exit("Error in query: " . $query . mysqli_error());

     while ($ltv_row = mysqli_fetch_assoc($ltv_res)) {


        echo '<a style="color: black;" href="'. $ltv_row['PAGE_NAME']. '"> '. $ltv_row['TITLE']. '</a>';
        echo '<br>';
             }

?>
</div>
</div>