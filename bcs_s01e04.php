<?php require 'header.php'; ?>
<script type="text/javascript">
   var php_var = "<?php echo $active_tab; ?>";

   if (var php_var == '1'){
    $("#crit-tab").removeClass("tab-content active");  // this deactivates the home tab
$("#user-tab").addClass("tab-content active");  // this activates the profile tab
   }
</script>
<?php
 //error_reporting(E_ALL); ini_set('display_errors', 'On'); 

    if (isset($_POST['submit'])){
        $_SESSION['chng_tab'] = 1;

    }
    else {
        $_SESSION['chng_tab'] = NULL;
    }

    include 'connection.php';

    $query = "SELECT * FROM rr_critic_review WHERE REVIEW_ID = '51'";

    $result = mysqli_query($connection, $query) or exit("Error in query: " . $query . mysqli_error());

     while ($row = mysqli_fetch_assoc($result)) {

        $rev_id = $row['REVIEW_ID'];
        $title = $row['TITLE'];     
        $score = $row['RATING'];
        $rev_text = $row['REVIEW'];
        $rev_pic = $row['ARTICLE_IMAGE'];
        $tn = $row['THUMBNAIL'];
        $rev_date = $row['REVIEW_DATE'];
        $genre = $row['GENRE'];
     }
    
    // echo $rev_text;
    // echo '<img src="assets/images/'. $rev_pic. '">';

    ?>
<div id="content"><!-- Content-->
  <div class="container">
    <div class="two-thirds column"><!-- 2/3s START-->
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
  
  </style>

  <br>
        <h2><?php echo $title;?></h2>

   <div id="tab-container">  <!---tab container------>
     <ul class="tab-menu">  
                <?php
                if ($_SESSION['chng_tab'] == '1')
                {
                    echo '<li id="crit">Critic Review</li>';
               echo  '<li id="user" class="active">User Review</li>';
                }
            else {
                echo '<li id="crit" class="active">Critic Review</li>';
               echo  '<li id="user">User Review</li>';
           }
                ?>
            </ul>  

    <div class="clear"></div>  
    <div class="tab-top-border"></div>

     <?php
                if ($_SESSION['chng_tab'] == '1')
                {
                    echo ' <div id="crit-tab" class="tab-content">';
                }
                else {
                    echo ' <div id="crit-tab" class="tab-content active">';
                }
                    ?>
                     <!---crit-tab START------>


            
       <div class="container">
         
        <div class="two columns">
            
        <?php echo '<img src="assets/images/' . $tn . '" height="160" width="108" />'?>
        </div>

       <div class="four columns">
        <br>

        <p><strong>Review date:</strong> <?php echo $rev_date;?></p>
        <p><strong>Genre:</strong> <?php echo $genre;?></p>
        <p><strong>Created by:</strong> Vince Gilligan & Peter Gould</p>
        <p>Spin-off series of Breaking Bad.</p>
        </div>

    <div class="four columns">
        <br>
<?php
        if (($score >= '0') && ($score <= '1.4')){
echo '<img src="assets/images/star_highlight.png">' . '<br>';
}
if (($score >= '1.5') && ($score <= '2.4')){
echo '<img src="assets/images/2_stars.jpg">' . '<br>';
}
if (($score>= '2.5') && ($score <= '3.4')){
echo '<img src="assets/images/3_stars.jpg">' . '<br>';
}
if (($score >= '3.5') && ($score <= '4.4')){
echo '<img src="assets/images/4_stars.jpg">' . '<br>';
}
if (($score >= '4.5') && ($score <= '5')){
echo '<img src="assets/images/5_stars.jpg">' . '<br>';
}
?>

       <p> <div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
</p>
<p>
<a href="https://twitter.com/share" class="twitter-share-button" data-text="Better Call Saul: S01E04 - &quot;Hero&quot;" data-via="Rapid_ReviewsUK">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</p>
    </div>

   

    
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
        
        
        <p style="width: 600px; font-size: 17px; line-height: 1.5;"><strong>Review: </strong><?php echo $rev_text;?></p>
    
                            <p style="padding-left: 100px;">
<iframe height="250" width="400" src="https://www.youtube.com/embed/FLnQDU7eGrM" frameborder="0" allowfullscreen></iframe>
                              <?php// echo '<img src="assets/images/'. $rev_pic. '" height="250" width="400">';   ?>
                            </p>
                            
                        
      
     
     
        </div>

                </div> <!---------Crit tab end------>
                <!-------User tab START------>

                   <?php

               if ($_SESSION['chng_tab'] == '1')
                {
                    echo '<div id="user-tab" class="tab-content active">';
                 
                }
                else {
                    echo '<div id="user-tab" class="tab-content">';
                   
                }
            
                    ?>
                    <style>
.rating {
   /* float:left;*/
    width:300px;
}
.rating span {float:right; position:relative; }
.rating span input {
    position:absolute;
    top:0px;
    left:0px;
    opacity:0;
}
.rating span label {
    display:inline-block;
    width:30px;
    height:30px;
   /* text-align:center;*/
    color:#FFF;
    background: url('assets/images/star_empty.png');
    font-size:30px;
    margin-right:2px;
    line-height:30px;
    border-radius:50%;
    -webkit-border-radius:50%;
}
.rating span:hover ~ span label,
.rating span:hover label,
.rating span.checked label,
.rating span.checked ~ span label {
    background:url('assets/images/star_highlight.png');
    color:#FFF;
}
.error_msg
{
    background-color: #EE5C42;
        border: 2px solid #e50914;
        width: 310px;
        color: black;

  

}
</style>
<h4>User Score</h4>
<?php

//how many users have voted
$countQ = "SELECT COUNT(*) FROM  rr_user_review WHERE REVIEW_ID = '$rev_id'";
$countQ_res = mysqli_query($connection, $countQ) or exit("Error in query: " . $countQ . mysqli_error());


$row = mysqli_fetch_row($countQ_res);



//average score of ratings
$avg_uScore = "SELECT AVG( RATING ) FROM rr_user_review WHERE REVIEW_ID =  '$rev_id'";
$avgUs_res = mysqli_query($connection, $avg_uScore) or exit("Error in query: " . $avg_uScore . mysqli_error());

$row2 = mysqli_fetch_row($avgUs_res);
$row3 = $row2[0];

if (($row3 >= '0') && ($row3 <= '1.4')){
echo '<img src="assets/images/star_highlight.png">' . '<br>';
}
if (($row3 >= '1.5') && ($row3 <= '2.4')){
echo '<img src="assets/images/2_stars.jpg">' . '<br>';
}
if (($row3 >= '2.5') && ($row3 <= '3.4')){
echo '<img src="assets/images/3_stars.jpg">' . '<br>';
}
if (($row3 >= '3.5') && ($row3 <= '4.4')){
echo '<img src="assets/images/4_stars.jpg">' . '<br>';
}
if (($row3 >= '4.5') && ($row3 <= '5')){
echo '<img src="assets/images/5_stars.jpg">' . '<br>';
}

echo 'Based on '. $row[0] . ' user reviews';

?>

<hr>

<h3>Review this TV Show</h3>


    <div class="rating">
      
        <?php

        if (isset($_SESSION['username'])){
        echo '<form id="user_review" method ="post" action ="index.php">';
   
        echo '<textarea style="width: 310px; height: 150px;" placeholder=\'Please type your review in here\' name="desc" maxlength="1000"></textarea>';
        echo '<br>';

       echo '<div style="float: left;">';
       
    echo ' <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>';
    echo '<span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>';
    echo '<span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>';
    echo '<span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>';
    echo '<span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>';
       echo '</div>';
    echo '<br>';
    echo '<br>';
   echo' <br>';

    echo '<input type = "Submit" name = "submit" VALUE = "Submit">';

        echo '</form>';
    }
    else 

    {
        echo 'You must be signed in to create a user review.';
    }
        ?>
</div>
    <?php 
    $user_rev = $_POST['desc'];
    //validate & sanitize user review
    $user_rev = trim($user_rev);
    $user_rev = strip_tags($user_rev);
    $user_rev = htmlspecialchars($user_rev);
    $user_rev = addslashes($user_rev);
    $user_rev = mysqli_real_escape_string($connection, $user_rev);
    $user_rev = filter_var($user_rev, FILTER_SANITIZE_STRING);


$uRating= $_POST['rating'];

$un = $_SESSION['username'];
$uid = $_SESSION['userid'];

if (isset($_POST['submit'])) {

        $_SESSION['chng_tab'] = 1;

        $active_tab = 1;

        $error_check = array();

            if (empty($user_rev)) {
                     $error_check[] = 'Please enter text into the user review area';

                                }
            if (empty($uRating)) {
                     $error_check[] = 'Please enter a rating';

                                }

            if (strlen($user_rev) < '200'){
                $error_check[] = 'Your user review must be at least 200 characters long';
            }

             if (!empty($error_check)) {
                
            echo '<div class="error_msg">';
                    foreach ($error_check as $key => $value) {
                                            
                                    echo $value . "<br />";
                                    
                                            }
                                            echo '</div>';
                                               // header("Location: http://www.oliveraasht.co.uk/Rapid_Reviews/index.php");
                                                    $_SESSION['chng_tab'] = 1;


                                        }
                                    else {

                                       //check if user has already submitted a user review
                                        $query_check = "SELECT * FROM rr_user_review WHERE USER_ID = '$uid' AND REVIEW_ID = '$rev_id'";

                                            $result = mysqli_query($connection, $query_check) or exit("Error in query: " . $query_check . mysqli_error());


                                       if ($row = mysqli_fetch_assoc($result)) {
                                    echo '<div class="error_msg">';
                                    echo 'You have already submitted a user review for this';
                                    echo '</div>';
                                    } 
                                    else
                                    {
                                    $query = "INSERT INTO rr_user_review (REVIEW, RATING, USERNAME, USER_ID, REVIEW_ID) VALUES ('$user_rev', '$uRating', '$un', '$uid', '$rev_id');";

                                                mysqli_query($connection, $query) or exit("Error in query: " . $query . mysqli_error());

                    
                                                if (mysqli_affected_rows($connection) >= 1) {
                                                echo 'You have successfully added a user review!';

                                                    } else {
                                                    // print error message
                                                    echo "Error in query: $query. " . mysqli_error($connection);
                                                        exit ;
                                                        }
                                    }




                                     
                                                    
                                    }



    }



?>
    
    <hr>

     <h3>User Reviews</h3>

    <?php
        
    $gather_uRevs = "SELECT * FROM rr_user_review WHERE REVIEW_ID = '$rev_id';";
    //store the result of the query in a variable called $result
    $store_uRevs = mysqli_query($connection, $gather_uRevs) or exit("Error in query: " . $query . mysqli_error());

 while ($user_rev_row = mysqli_fetch_assoc($store_uRevs)) {

     echo '<div class="u_review">';

       echo' <div style="padding: 5px;">';
        echo '<strong>' . $user_rev_row['USERNAME']. '</strong>';
        echo '<p>'. $user_rev_row['REVIEW'] . '</p>';
       // echo '<img src="assets/images/5_stars.jpg">';

        if ($user_rev_row['RATING'] == '1'){
echo '<img src="assets/images/star_highlight.png">' . '<br>';
}
if ($user_rev_row['RATING'] == '2'){
echo '<img src="assets/images/2_stars.jpg">' . '<br>';
}
if ($user_rev_row['RATING'] == '3'){
echo '<img src="assets/images/3_stars.jpg">' . '<br>';
}
if ($user_rev_row['RATING'] == '4'){
echo '<img src="assets/images/4_stars.jpg">' . '<br>';
}
if ($user_rev_row['RATING'] == '5'){
echo '<img src="assets/images/5_stars.jpg">' . '<br>';
}
       echo'</div>';

   echo' </div>';

   echo '<br>';

 }


    ?>

   
    <style>
    .u_review
    {
        border-radius: 10px;
        border: 2px solid gray;
    }
    </style>
                </div><!-----user tab END----->
                  
   

               

    <!---tab container END------>
  </div>

    </div><!-- 2/3s END-->

<div class="one-third column"><!-- 1/3s START-->
  <?php
  include 'latest_tvshow.php';

  echo '<br>';

  include 'rel_bcs.php';

  
  ?>



  </div><!-- 1/3s END-->
<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'rrbcss01e04';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>

    </div>

</div>
</div><!-- Content end-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
//  Check Radio-box
    $(".rating input:radio").attr("checked", false);
    $('.rating input').click(function () {
        $(".rating span").removeClass('checked');
        $(this).parent().addClass('checked');
    });

    $('input:radio').change(
    function(){
        var userRating = this.value;
        //alert(userRating);
        $.post('http://www.oliveraasht.co.uk/Rapid_Reviews/text.php', { "rating" : userRating});

    }); 
});

$(document).ready(function(){
    var activeTabIndex = -1;
    var tabNames = ["crit","user"];

    $(".tab-menu > li").click(function(e){
        for(var i=0;i<tabNames.length;i++) {
            if(e.target.id == tabNames[i]) {
                activeTabIndex = i;
            } else {
                $("#"+tabNames[i]).removeClass("active");
                $("#"+tabNames[i]+"-tab").css("display", "none");
            }
        }
        $("#"+tabNames[activeTabIndex]+"-tab").fadeIn();
        $("#"+tabNames[activeTabIndex]).addClass("active");
        return false;
    });
});


</script>
<script type="text/javascript" src="assets/js/jquery-1.8.1.min.js"></script>





  



<?php require 'footer.php'; ?>


