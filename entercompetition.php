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
require('mysqli_connect.php');
?>

<main>
<div class="container">
<section class="sp25px"></section>
    <div class="box-title"><img src="img/add.png" class="box-icon"> 
Competition Entry</div>
<div id="title-description">Enter the competition ID and select todays round to access your scorecard.<br>Event ID's provided by match secretary!</div> 
<section class="sp50px"></section>
<table class ="center" border="0">
<form action="enteredcompetition.php" method="post">
<tr><td class="pad">
Event ID:</td><td>



	<select class="pad" id = "form-square" name="competitionid" required>
	<option value="">Please select...</option>
<?php
	$q = "SELECT DISTINCT competitionid FROM competitions";
    	$r = @mysqli_query($dbc, $q);
	if($r) {
	while($rows = mysqli_fetch_array($r, MYSQLI_ASSOC)){
?>
    	<option value="<?php echo $rows['competitionid'];?>"><?php echo $rows['competitionid'];?></option>

<?php
    	} 
	}
?>
</select>



</td>
</tr>
<tr><td class="pad">
Today's Round:</td><td>
<select class="pad" id = "form-square" name="roundno" required>
<option value="">Please select...</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select></td></tr>
<tr><td class="pad">Player ID:</td><td>
<input type="text"  class="pad" id = "form-square" name="playerid" value="<?php echo $playerid; ?>" maxlength="14" readonly="readonly"></td></tr>
<tr><td></td><td class="pad">

<button type="submit" class="btn-black">Submit</button>

</td></tr></table>




<section class ="sp25px"></section>

<div class = "boxes-loggedin"> 
<div class = "box-loggedin-left"> 
<h2>Competition Entry</h2> 
In order for players to join a competition, 
it must first be created. Once an event has been created an
 event ID will be generated. This event ID is required for 
users to enter an event. If an event has more than one round 
the user must enter the round number (maximum of four rounds) 
when entering the event.

            </div>  
              
            <div class = "box-loggedin-right"> 
                <h2>Event & Player ID</h2> 
Generated when an event is created under the 'create event' section. The is
 required to be able to join an event. The player ID will be populated 
automatically using the cookie generated at log-on. This is the users ID that 
identifies them within the system.
</div>  </div>   


<section class ="sp25px"></section>



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










</main>



<?php
include('footer.inc.php');
?>
</body>
</html>