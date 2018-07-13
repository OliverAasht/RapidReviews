<style>
.rel_content
{
	background-color: #dfdfdf;
	
}

</style>
<br>
<div class="rel_content">
	<div style="padding: 5px;">
<h3>Latest Games</h3>
<?php
   $query_lg = "SELECT * FROM  `rr_critic_review` WHERE CATEGORY =  'Game' ORDER BY REVIEW_DATE DESC LIMIT 5";


    $g_res = mysqli_query($connection, $query_lg) or exit("Error in query: " . $query . mysqli_error());

     while ($g_row = mysqli_fetch_assoc($g_res)) {


        echo '<a style="color: black;" href="'. $g_row['PAGE_NAME']. '"> '. $g_row['TITLE']. '</a>';
        echo '<br>';
             }

?>
</div>
</div>