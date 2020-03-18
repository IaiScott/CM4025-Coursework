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
  <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
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
$playerid=$_COOKIE['playerid'];

?>

<main>
<div class="container">
<section class="sp25px"></section>
    <div class="box-title"><img src="img/cup.png" class="box-icon"> 
View Leaderboard</div>
<div id="title-description">Enter the competition ID and submit.

</div> 
<section class="sp50px"></section>
<form action="theleaderboard.php" method="post">

<table class="center" border="0">
<tr><td class="pad">Enter Event ID:</td>
<td class="pad"><input type="text"  class="pad" id = "form-square" name="competitionid"></td></tr>
<tr><td class="pad">Player ID:</td><td class="pad"><input type="text"  class="pad" id = "form-square" name="playerid" value="<?php echo $playerid;?>" readonly="readonly"></td></tr>
<tr><td class="pad"></td><td><button type="submit" class="btn-black">Submit</button></td></tr>
</table>
</form>




<section class="sp50px"></section>
<section class="sp25px"></section>

<div class="script">
“As you walk down the fairway of life you must smell the roses, for you only get to play one round.” -Ben Hogan
</div>
</div>
<section class="sp50px"></section>
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



</main>



<?php
include('footer.inc.php');
?>
</body>
</html>