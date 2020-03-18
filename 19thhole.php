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

	$playerid = $_COOKIE['playerid'];
	$competitionid = $_REQUEST['competitionid'];
	$clubname = $_REQUEST['clubname'];
	$holescore = $_REQUEST['holescore'];
	$lastpar = $_REQUEST['par'];
	$holeno =18;
 
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
	}}


$q="UPDATE leaderboard SET hole18 = '$holescore' WHERE playerid = $playerid";
$r = @mysqli_query($dbc, $q);

$q = "SELECT * FROM leaderboard WHERE playerid =$playerid";
$r = @mysqli_query($dbc, $q);
	
	if($r) {
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){

	$holeresult = $holescore - $lastpar;
	$champ = $row['champ'] + $holeresult;
	$day = $row['day'] + $holeresult;
	$hole = $row['hole'] + 1;
	$gross = '';

	$hole1 = $row['hole1'];
	$hole2 = $row['hole2'];
	$hole3 = $row['hole3'];
	$hole4 = $row['hole4'];
	$hole5 = $row['hole5'];
	$hole6 = $row['hole6'];
	$hole7 = $row['hole7'];
	$hole8 = $row['hole8'];
	$hole9 = $row['hole9'];
	$hole10 = $row['hole10'];
	$hole11 = $row['hole11'];
	$hole12 = $row['hole12'];
	$hole13 = $row['hole13'];
	$hole14 = $row['hole14'];
	$hole15 = $row['hole15'];
	$hole16 = $row['hole16'];
	$hole17 = $row['hole17'];
	$hole18 = $row['hole18'];
	}}

	if ($row['hole']= 18){

	$gross='F';

    	$grossScor = $hole1 + $hole2 + $hole3 + $hole4 + $hole5 + $hole6 + $hole7 + $hole8 + $hole9 + $hole10 +
                 $hole11 + $hole12 + $hole13 + $hole14 + $hole15 + $hole16 + $hole17 + $hole18;

  	$out = $hole1 + $hole2 + $hole3 + $hole4 + $hole5 + $hole6 + $hole7 + $hole8 + $hole9;
  	$in = $hole10 + $hole11 + $hole12 + $hole13 + $hole14 + $hole15 + $hole16 + $hole17 + $hole18;
	}

	$q="UPDATE leaderboard SET champ = '$champ', day = '$day', hole = '$grossScor', gross= '$gross' WHERE playerid =$playerid";
	$r = @mysqli_query($dbc, $q);

	?>



<section>
<div class="container">
<section class="sp25px"></section>
    <div class="box-title"><img src="img/cup.png" class="box-icon"> Round Completed!</div>
    <div id="title-description">Here are your results...</div> 
<section class="sp50px"></section>




<?php

echo '<table class="center" border="1"><tr><td class="title" colspan="10">SCORECARD</td></tr>

<tr class="yellow"><td class="holes">#1</td><td class="holes">#2</td><td class="holes">#3</td><td class="holes">#4</td><td class="holes">#5</td><td class="holes">#6</td>
<td class="holes">#7</td><td class="holes">#8</td><td class="holes">#9</td><td class="holes">OUT</td></tr>


<tr><td class="holes">'.$hole1.'</td><td class="holes">'.$hole2.'</td><td class="holes">'.$hole3.'</td><td class="holes">'.$hole4.'</td><td class="holes">'.$hole5.'</td><td class="holes">'.$hole6.'</td>
<td class="holes">'.$hole7.'</td><td class="holes">'.$hole8.'</td><td class="holes">'.$hole9.'</td><td class="holes">'.$out.'</td>

<tr class="yellow"><td class="holes">#10</td><td class="holes">#11</td><td class="holes">#12</td>
<td class="holes">#13</td><td class="holes">#14</td><td class="holes">#15</td><td class="holes">#16</td><td class="holes">#17</td><td  class="holes">#18</td><td class="holes">IN</td></tr>

<tr><td class="holes">'.$hole10.'</td><td class="holes">'.$hole11.'</td><td class="holes">'.$hole12.'</td>
<td class="holes">'.$hole13.'</td><td class="holes">'.$hole14.'</td><td class="holes">'.$hole15.'</td><td class="holes">'.$hole16.'</td><td class="holes">'.$hole17.'</td><td class="holes">'.$hole18.'</td><td class="holes">'.$in.'</td></tr>

<tr><td  class="holes2" colspan="9">TOTAL</td><td  class="holes" colspan="1">'.$grossScor.'</td></tr></table>';

?>

<section class ="sp50px"></section>

</div>
<section class ="sp50px"></section>









<table class="center" border="1"><tr><td class="title" colspan="6">LEADERBOARD

<?php

$q= "SELECT * FROM competitions WHERE competitionid =$competitionid";
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

$q= "SELECT * FROM leaderboard WHERE competitionid = $competitionid ORDER BY champ ASC";
$r = @mysqli_query($dbc, $q);

	if($r) {
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){

	$champ=$row['champ'];
	$day=$row['day'];
	$champbk="champ";

	if ($row['champ'] == 0){
    	$champ = "PAR";
    	$champbk="champgreen";
    	//echo $champbk;
	}

		if ($row['champ'] > 0){
	    	$champ = "+" . $row['champ'];
    		$champbk="champblue";
    		//echo $champbk;
		}
	if ($row['champ'] < 0){
    	$champ = $row['champ'];
    	$champbk="champ";
    	//echo $champbk;
	}

		if ($row['day'] == 0){
    		$day = "PAR";
		}
	if ($row['day'] > 0){
    	$day = "+" . $row['day'];
	}


	echo '<tr><td class="nam">';
	echo $row['name'];
	echo '</td><td class="nat">';
	echo $row['flag'];
	echo '</td><td class="hol">';
	echo $row['hole'];
	echo '</td>';

		if ($champbk=="champblue"){
   		echo '<td class="champblue">';
		}

	if ($champbk=="champgreen"){
   	echo '<td class="champgreen">';
	}

		if ($champbk=="champ"){
   		echo '<td class="champ">';
		}

	//echo '</td><td class=champ>';
	echo $champ;
	echo '</td><td class="day">';
	echo $day;
	echo '</td><td class="gross">';
	echo $row['gross'];
	echo '</td></tr>';
	}}
?>
</table>
</table>
</div>
<section class="sp50px"></section>
<section class="sp50px"></section>
<img src="img/joy.png" id="panda">
<section class="sp50px"></section>
<?php
    include('footer.inc.php');
?>
</body>
</html>


