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
if ((isset($_COOKIE['playerid']))&&(basename($_SERVER['PHP_SELF']) != 'logout.php')&&($_COOKIE['access'] != "manofsteel")&&($_COOKIE['access'] != "ihavethepower")){
?>

<main>
	<section>
    		<div class="container">
        		<section class ="sp25px"></section>
        		<div class="box-title"><img src="img/warning.png" class="box-icon"> You do not have permission to access this page!</div>
		<div id="title-description">Please sign-in with Power-user or Super-user access.</div>
        		<section class ="sp25px"></section>
        		<section><img src="img/Oops_man.png" id="panda"></section>
        		<section class ="sp50px"></section>
</div>
<?php
}else{

require('mysqli_connect.php');
?>
<main>
<section>
<div class="container">
<section class="sp25px"></section>
    <div class="box-title"><img src="img/add.png" class="box-icon"> 
Add a golf club</div>
<div id="title-description">Check the dropdown list for your golf club. <br>
If it is not in the list type your club name and submit!</div> 
<section class="sp50px"></section>

<form action="addedclub.php" method="post">
<table class="center" border="0">

            <tr>
                <td class="pad">Search DB:</td><td>



<select class="pad" id="form-square" name="clubname">
<option value="">Please select...</option>
<?php
  $q = "SELECT DISTINCT clubname FROM clubs";
    $r = @mysqli_query($dbc, $q);
if($r) {
while ($rows = mysqli_fetch_array($r, MYSQLI_ASSOC)){
    
    ?>
    <option value="<?php echo $rows['clubname'];?>"><?php echo $rows['clubname'];?></option>

    <?php
    } }
    ?>
</select>
  </td></tr><tr> <td class="pad">Club Name:</td></td>
<td><input type="text" class="pad" id="form-square" name="clubname" maxlength="30"></td></tr><tr>
<td></td><td class="pad"><button type="submit" class="btn-black">Submit</button></td></tr></table>
</form>
</div>
</section>
<section class="sp50px"></section>

<section>
<div class="container">
<img src="img/whitemale.jpg" id="panda">
</div>
</section>


</main>
<?php
}
?>

<?php
include('footer.inc.php');
?>
</body>
</html>