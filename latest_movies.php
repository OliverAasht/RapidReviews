<style>
.rel_content
{
	background-color: #dfdfdf;
	
}

</style>
<br>
<div class="rel_content">
	<div style="padding: 5px;">
<h3>Latest Movies</h3>
<?php
   $query_lm = "SELECT * FROM  `rr_critic_review` WHERE CATEGORY =  'Movie' ORDER BY REVIEW_DATE DESC LIMIT 5";


    $m_res = mysqli_query($connection, $query_lm) or exit("Error in query: " . $query . mysqli_error());

     while ($m_row = mysqli_fetch_assoc($m_res)) {


        echo '<a style="color: black;" href="'. $m_row['PAGE_NAME']. '"> '. $m_row['TITLE']. '</a>';
        echo '<br>';
             }

?>
</div>
</div>