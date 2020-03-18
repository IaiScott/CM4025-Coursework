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
if (!isset($_COOKIE['playerid'])){
	require('login_functions.inc.php');
	redirect_user();
	}
require('mysqli_connect.php');
$playerid=$_REQUEST['playerid'];
$competitionid=$_REQUEST['competitionid'];

?>
<main>


<div class="container">
<section class="sp25px"></section>
    <div class="box-title"><img src="img/cup.png" class="box-icon"> 
The Leaderboard</div>
<div id="title-description">Tournament ID:

<?php
echo $competitionid;
?>
</div>
<section class="sp50px"></section>


<table class="center" border="1"><tr><td class="title" colspan="6">LEADERBOARD
<?php

$q= "SELECT * FROM competitions WHERE competitionid ='$competitionid';";
$r = @mysqli_query($dbc, $q);

if($r) {
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){

echo '<br>';
echo $row['clubname'];
echo ' - ';
echo $row['competitiontitle'];
echo ' - Round: ';
echo $row['round'];

}}
?>
</td></tr>
<?php



$q= "SELECT * FROM leaderboard WHERE competitionid = '$competitionid' ORDER BY champ ASC";
$r = @mysqli_query($dbc, $q);
if($r) {
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){

$champ=$row['champ'];
$day=$row['day'];
$champbk="champ";

if ($row['champ'] == 0)
{
    $champ = "E";
    $champbk="champgreen";
    //echo $champbk;
}
if ($row['champ'] > 0)
{
    $champ = "+" . $row['champ'];
    $champbk="champblue";
    //echo $champbk;
}
if ($row['champ'] < 0)
{
    $champ = $row['champ'];
    $champbk="champ";
    //echo $champbk;
}

if ($row['day'] == 0)
{
    $day = "E";
}
if ($row['day'] > 0)
{
    $day = "+" . $row['day'];
}

echo '<tr><td class="nam">';
echo $row['name'];
echo '</td><td class="nat">';
echo $row['flag'];
echo '</td><td class="hol">';
echo $row['hole'];
echo '</td>';
if ($champbk=="champblue")
{
   echo '<td class="champblue">';
}
if ($champbk=="champgreen")
{
   echo '<td class="champgreen">';
}
if ($champbk=="champ")
{
   echo '<td class="champ">';
}

echo $champ;
echo '</td><td class="day">';
echo $day;
echo '</td><td class="gross">';
echo $row['gross'];
echo '</td></tr>';
}}
?>
</table>

<section class="sp50px"></section>
** This leaderboard is fictional. Any resemblance to real persons, dead or alive, past or present, is purely coincidental.

<section class="sp50px"></section>
</div>

<?php
include('footer.inc.php');
?>
</body>
</html>