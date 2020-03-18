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
<main>
<?php
include('header.inc.php');
if (!isset($_COOKIE['playerid'])){
	require('login_functions.inc.php');
	redirect_user();
	}
require('mysqli_connect.php');
$clubname=$_REQUEST['clubname'];

$q="INSERT IGNORE INTO clubs (clubname) VALUES ('$clubname')";
$r = @mysqli_query($dbc, $q);

$q= "SELECT * FROM clubs WHERE clubname ='$clubname'";
$r = @mysqli_query($dbc, $q);

if($r) {
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
$clubname=$row['clubname'];
}}
?>
<section>
<div class="container">
<section class="sp25px"></section>
    <div class="box-title"><img src="img/add.png" class="box-icon"> 
Your golf club has been added...</div>
<div id="title-description">
You will need to add the course details for your club!</div> 
<section class="sp50px"></section>


<div id="title-description">Club name added: <b><?php echo $clubname; ?></b></div>

<form action="addhole1.php" method="post">

<div><input type="hidden"  name="clubname" value="<?php echo $clubname; ?>" readonly="readonly"></div>

<div id="title-description"><b>Click continue to add course details for <?php echo $clubname; ?>...</b>

<button type="submit" class="btn-black">Continue</button></div>
</form>
<div>
</section>
<section class="sp50px"></section>
<section>
<div class="container">
<img src="img/playgolf.jpg" id="panda">
</div>
</section>
<section class="sp50px"></section>
</main>
</div>
<?php
include('footer.inc.php');
?>

</body>
</html>