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
</head>
<body>
<?php
include('header.inc.php');
if (!isset($_COOKIE['playerid'])){
	require('login_functions.inc.php');
	redirect_user();
	}
require('mysqli_connect.php');
$clubname=$_REQUEST['clubname'];
$competitiontitle=$_REQUEST['competitiontitle'];

$q="INSERT INTO competitions (clubname, competitiontitle) VALUES ('$clubname', '$competitiontitle')";
$r = @mysqli_query($dbc, $q);

$q="SELECT competitionid FROM competitions WHERE clubname='$clubname' AND competitiontitle='$competitiontitle'";
$r = @mysqli_query($dbc, $q);
if($r) {
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
$competitionid=$row['competitionid'];
}}
?>
<main>
<div class="container">
<section class="sp25px"></section>
    <div class="box-title"><img src="img/add.png" class="box-icon"> 
Competition created... here are the details...</div>
<div id="title-description">Please make a note of the competition ID. <br>
This is required to be able to enter the event!</div> 
<section class="sp50px"></section>
<table class ="center" border="0">
<tr><td class="pad">
Golf Club:</td><td>
<input type="text" class="pad" id = "form-square" name="clubname" maxlength="20" value="<?php echo $clubname;?>"/></td></tr>
<tr><td class="pad">
Competition Title:</td><td>
<input type="text" class="pad" id = "form-square" name="competitiontitle" maxlength="30" value="<?php echo $competitiontitle;?>"/></td></tr>
<tr><td class="pad">Competition ID:</td><td>
<input type="text" class="pad" id = "form-square" name="competitionid" maxlength="30" value="<?php echo $competitionid;?>"/></td></tr>
<tr><td></td><td class="pad">

<button class="btn-black" type="submit"><a href="loggedin.php" class="link">Homepage</a></button>

</td></tr></table>


<section class ="sp25px"></section>

<div class = "boxes-loggedin"> 
<div class = "box-loggedin-left"> 
<h2>Competition Created</h2> 
In order for players to join a competition, 
it must first be created. This section allows users 
to create compititions for groups to join and play in. 
Although all users can create competitions, only Administrator 
account holders can add golf clubs and associated
golf course to the application.

            </div>  
              
            <div class = "box-loggedin-right"> 
                <h2>Competition ID</h2> 
Check the details of the event created and note the competition ID. 
When a competition is created a competition ID number is generated.
This number is required in the 'Enter Event' section to be able to enter the 
event and have their names displayed on the leaderboard with the results.
</div>  </div>   

<section class ="sp25px"></section>

<div class="parallax2"></div>
<section class ="sp5px"></section>
<div class="parallax2"></div>
<section class ="sp5px"></section>
<div class="parallax2"></div>
<section class ="sp5px"></section>
<div class="parallax2"></div>
<section class ="sp50px"></section>

<div class="script">
“Achievements on the golf course are not what matters, decency and honesty are what matter.” -Tiger Woods
</div>






<section class="sp50px"></section>






</main>
</div>


<?php
include('footer.inc.php');
?>

</body>
</html>