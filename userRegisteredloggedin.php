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
</head>
<body>

<?php
include('header.inc.php');
?>
<section>
		<div class="container">
		<section class="sp25px"></section>
    		<div class="box-title"><img src="img/add.png" class="box-icon"> Registration Successful</div>
		<div id="title-description">You are now registered. Please log-in to gain access to this site.</div> 
		<section class="sp50px"></section>


<?php

require('mysqli_connect.php');

$title = $_REQUEST['title'];
$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['surname'];
$flag = $_REQUEST['flag'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$access = $_REQUEST['access'];


$q="INSERT IGNORE INTO users (title, firstname, lastname, flag, email, password, access) 
VALUES ('$title', '$firstname', '$lastname', '$flag', '$email', '$password', '$access')";
$r = @mysqli_query($dbc, $q);



$q= "SELECT * FROM users WHERE email='$email'";
$r = @mysqli_query($dbc, $q);
if($r) {
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
$playerid=$row['playerid'];
$playertitle=$row['title'];
$playerfirstname=$row['firstname'];
$playerlastname=$row['lastname'];
$playercountry=$row['flag'];
$playeraccess=$row['access'];
$playerusername=$row['email'];
}}
$q="INSERT IGNORE INTO leaderboard (playerid) VALUES ('$playerid')";
$r = @mysqli_query($dbc, $q);


?>
<section>
<div class="box-title">Account details...</div>
<div id="title-description">
<?php echo "Username:<b> $email";?></b><br>
<?php echo "Title:<b> $playertitle";?></b><br>
<?php echo "Firstname:<b> $playerfirstname";?></b><br>
<?php echo "Surname:<b> $playerlastname";?></b><br>
<?php echo "Country:<b> $playercountry";?></b><br>
<?php
if ($playeraccess == "manofsteel"){
echo 'Access: <b>Super-user</b></div>';
}else if ($playeraccess == "ihavethepower"){
echo 'Access: <b>Power-user</b></div>';
}else{
echo 'Access: <b>User</b></div>';
}
?>

</section>
<section class="sp50px"></section>
<section class="sp25px"></section>
<section>
<div id="title-description"><a href="adminregistration.php">Add another Player</a></div>
</section>
<section class="sp25px"></section>
<section>
<img src="img/playgolf.jpg" id="panda">
</section>

</div>
</section>

<section class="sp50px"></section>';
<?php
include('footer.inc.php');
?>

</body>
</html>