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

$holeno=1;
$clubname=$_REQUEST['clubname'];

$q= "SELECT * FROM courses WHERE clubname ='$clubname' AND holeno='$holeno'";
$r = @mysqli_query($dbc, $q);

if($r) {
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){

$clubname = $row['clubname'];
$holeimgurl = $row['holeimgurl'];
$holename = $row['holename'];
$holeno = $row['holeno'];
$parred = $row['parred'];
$parwhite = $row['parwhite'];
$paryellow = $row['paryellow'];
$sired = $row['sired'];
$siwhite = $row['siwhite'];
$siyellow = $row['siyellow'];
$yardsred = $row['yardsred'];
$yardswhite = $row['yardswhite'];
$yardsyellow = $row['yardsyellow'];
$par = $parwhite;
echo $par;
}}
?>

<section class="sp50px"></section>
<table class="center" border="0">
<tr>
<td class="white">#<?php echo $holeno;?></td><td class="white"><?php echo $holename;?></td>
<td class="white"><?php echo $yardswhite;?> Yards</td><td class="white">Par <?php echo $parwhite;?></td>
<td class="white">S.I. <?php echo $siwhite;?></td>
</tr>
<tr>
<td class="white" colspan="2"></td><td class="yellow"><?php echo $yardsyellow;?> Yards</td>
<td class="yellow">Par <?php echo $paryellow;?></td><td class="yellow">S.I. <?php echo $siyellow;?></td>
</tr>
<tr>
<td colspan="2"></td><td class="red"><?php echo $yardsred;?> Yards</td>
<td class="red">Par <?php echo $parred;?></td><td class="red">S.I. <?php echo $sired;?></td>
</tr>
</table>
<section class="sp25px"></section>
<table class="center">
<tr>
<td><img src="<?php echo $holeimgurl;?>"></td>
</tr>
</table>
<section class="sp25px"></section>
<form action="hole2.php" method="post">
<table class="center" border="0">

<div><input type="hidden"  name="competitionid" value="<?php echo $competitionid;?>" maxlength="30" readonly="readonly"></div>
<div><input type="hidden"  name="clubname" value="<?php echo $clubname;?>" maxlength="30" readonly="readonly"></div>
<div><input type="hidden"  name="par" value="<?php echo $par;?>" maxlength="30" readonly="readonly"></div>
<tr>
<td class="table-decoration-top-bottom">#<?php echo $holeno;?></td><td class="table-decoration-top-bottom">Par <?php echo $parwhite;?></td>
<td class="table-decoration-top-bottom">
<input type="text" name="holescore" class="center-form-input" size="2" maxlength="2" pattern="[0-9]{,2}" title="Only digits are permitted!" required="required"/>
</td><td class="table-decoration-top-bottom"><button class="btn-black" type="submit">SUBMIT</button></td></tr>
</table>
</form>
<section class="sp50px"></section>


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
</div>

<?php
include('footer.inc.php');
?>
</body>
</html>