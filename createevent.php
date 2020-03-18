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

<body>
<?php
include('header.inc.php');
if (!isset($_COOKIE['playerid'])){
	require('login_functions.inc.php');
	redirect_user();
	}
require('mysqli_connect.php');
?>
<main>
<div class="container">
<section class="sp25px"></section>
    <div class="box-title"><img src="img/add.png" class="box-icon"> 
Competition Creation</div>
<div id="title-description">Select your golf club from the dropdown list.
<br>
Enter the name of your competition and submit.
</div> 
<section class="sp50px"></section>

<form action="createcompetition.php" method="post">
<table class="center" border="0">

            <tr>
                <td class="pad">Select Golf Club:</td><td>



<select class="pad" id = "form-square" name="clubname" required>
<option value="">Please select...</option>
<?php
//  $q = "SELECT DISTINCT clubname FROM clubs";
$q = "SELECT DISTINCT clubname FROM courses";
    $r = @mysqli_query($dbc, $q);
if($r) {
while ($rows = mysqli_fetch_array($r, MYSQLI_ASSOC)){
    
    ?>
    <option value="<?php echo $rows['clubname'];?>"><?php echo $rows['clubname'];?></option>

    <?php
    } }
    ?>
</select>
  </td></tr><tr> <td class="pad">Competion Name:</td></td>
<td><input type="text" class="pad" id = "form-square" name="competitiontitle" maxlength="30"></td></tr><tr>
<td></td><td class="pad"><button type="submit" class="btn-black">Submit</button></td></tr></table>
</form>


<section class ="sp25px"></section>

<div class = "boxes-loggedin"> 
<div class = "box-loggedin-left"> 
<h2>Create Competition</h2> 
In order for players to join a competition, 
it must first be created. This section allows users 
to create compititions for groups to join and play in. 
Although all users can create competitions, only Administrator 
account holders can add golf clubs and associated
golf course to the application.

            </div>  
              
            <div class = "box-loggedin-right"> 
                <h2>Create Competition Cont...</h2> 
Simply select your golf club from the drop-down list and enter the competition 
name and submit. When a competition is created a competition ID number is generated.
This number is required in the 'Enter Event' section to be able to enter the 
event and have their names displayed on the leaderboard with the results.
</div>  </div>   
</div>

<section class ="sp25px"></section>
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