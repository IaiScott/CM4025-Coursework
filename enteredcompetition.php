<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>White Flag Fantasy Golf</title>
  <meta name="description" content="White Flag Fantasy Golf Scoring Application">
  <meta name="author" content="Iain Scott">
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto&display=swap" rel="stylesheet">
<script src="js/slideShow.js"></script>
</head>
<!--load slide show js for image carousel-->
	<body onload="showSlides()">



<?php
include('header.inc.php');
if (!isset($_COOKIE['playerid'])){
	require('login_functions.inc.php');
	redirect_user();
	}
require('mysqli_connect.php');

$playerid=$_REQUEST['playerid'];
$competitionid=$_REQUEST['competitionid'];
$roundno=$_REQUEST['roundno'];

$q="UPDATE competitions SET round = '$roundno' WHERE competitionid = '$competitionid'";
$r = @mysqli_query($dbc, $q);

$q="UPDATE leaderboard SET hole1 = '0', hole2 = '0', hole3 = '0', hole4 = '0', hole5 = '0', hole6 = '0'
, hole7 = '0', hole8 = '0', hole9 = '0', hole10 = '0', hole11 = '0', hole12 = '0', hole13 = '0', hole14 = '0', hole15 = '0'
, hole16 = '0', hole17 = '0', hole18 = '0', hole = '0', day = '0', gross = '' WHERE playerid='$playerid'";
$r = @mysqli_query($dbc, $q);

$q= "SELECT * FROM competitions WHERE competitionid ='$competitionid'";
$r = @mysqli_query($dbc, $q);

if($r) {
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){

$clubname=$row['clubname'];
$competitiontitle=$row['competitiontitle'];
$round=$row['round'];
}}

?>
<main>
<div class="container">

<section class="sp25px"></section>
    <div class="box-title"><img src="img/cup.png" class="box-icon"> 
You have been entered into the following event...</div>
<section class="sp25px"></section>
<div id="title-description"><?php echo $clubname; ?>
<br>
<?php echo $competitiontitle; ?>
<br>
Round: <?php echo $round; ?></div>
<section class="sp50px"></section>

<form action="hole1.php" method="post">

<div><input type="hidden"  name="competitionid" value="<?php echo $competitionid; ?>" maxlength="30" readonly="readonly"></div>
<div><input type="hidden"  name="playerid" value="<?php echo $playerid; ?>" maxlength="30" readonly="readonly"></div>
<div><input type="hidden"  name="clubname" value="<?php echo $clubname; ?>" maxlength="30" readonly="readonly"></div>

<div id="title-description"><b>Click Scorecard to begin... </b><button type="submit" class="btn-black">Scorecard</button></div>

</form>
<section class="sp50px"></section>
</div>
<section>
<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    
    <img src="img/lowry.jpg" style="width:100%">
    <div class="text">White Flag Fantasy Golf.</div>
  </div>

  <div class="mySlides fade">
  
    <img src="img/Phoenix.jpg" style="width:100%">
    <div class="text">White Flag Fantasy Golf.</div>
  </div>

  <div class="mySlides fade">
    
    <img src="img/pga.jpg" style="width:100%">
    <div class="text">White Flag Fantasy Golf.</div>
  </div>

 
</div>



</section>




<?php

$q= "SELECT * FROM users WHERE playerid ='$playerid'";
$r = @mysqli_query($dbc, $q);

if($r) {
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){

//echo '<p><h3>You have been entered into...';
$firstname= $row['firstname'];
$lastname= $row['lastname'];
$flag=$row['flag'];
$name = $firstname . ' ' . $lastname;
//echo $name;
//echo '</p></h3>';
}}




$q= "SELECT competitionid FROM leaderboard WHERE playerid ='$playerid'";
$r = @mysqli_query($dbc, $q);
$compdb=0;
if($r) {
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){

$compdb = $row['competitionid'];
}}
if($competitionid<>$compdb){


$q="UPDATE leaderboard SET competitionid = '$competitionid', name='$name', flag='$flag', hole1 = '0', hole2 = '0', hole3 = '0', hole4 = '0', hole5 = '0', hole6 = '0'
, hole7 = '0', hole8 = '0', hole9 = '0', hole10 = '0', hole11 = '0', hole12 = '0', hole13 = '0', hole14 = '0', hole15 = '0'
, hole16 = '0', hole17 = '0', hole18 = '0', champ = '0', hole = '0', day = '0', gross = '' WHERE playerid='$playerid'";
$r = @mysqli_query($dbc, $q);

}else{


$q="UPDATE leaderboard SET competitionid = '$competitionid' WHERE playerid='playerid'";
$r = @mysqli_query($dbc, $q);
}
?>




</main>

<?php
include('footer.inc.php');
?>
</body>
</html>