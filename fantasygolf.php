<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>White Flag Fantasy Golf</title>
  <meta name="description" content="White Flag Fantasy Golf Scoring Application">
  <meta name="author" content="Iain Scott">
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto|Satisfy&display=swap" rel="stylesheet">
  <script src="js/slideShow.js"></script>
</head>
<!--load slide show js for image carousel-->
	<body onload="showSlides()">
<!--load the header with navigation links-->
	<?php
        	include('headerlogin.inc.php');
	?>
<!--set the background colour of the page-->
	<main id="backgd-colour">
 <!--login section with background image and transparency-->
	<section>
<!--set the section background image with overlay-->
    	<div class="backgd-img">
    	<div class="rgb-overlay">
<!--add the login form over the background image-->
   	<div class="form-login">
<!--space the content from the top of the form by 50px-->
       	<section class ="sp50px"></section>
<!--create login form-->
   	<div class="login-head">WHITE FLAG FANTASY GOLF</div>
  	<div class="login-sub">The mobile LIVE Web Scoring Application</div>
      	<section class ="sp50px"></section>
  	<form action="login.php" method="post">
	<div class="login-row">Username:</div>
	<div class="login-row"><input type="username" name="email" class="form" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" size="25" maxlength="25" required="required"/></div>
	<div class="login-row">Password:</div>
	<div class="login-row"><input type="password" name="password" class="form" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" size="25" maxlength="25" required="required"/></div>
	<div class="login-bottom"><input type="submit" class="btn" name="submit" value="Sign-in"/></div>
	</form>
	<div class="login-sub">Don't have an account? Register for FREE!</div>
	<div class="login-register"><a href="registration.php" class="link">Sign up for an account</a></div>
	</div>
	</div>
	</div>
<!--end this section-->
	</section>
<section class ="sp25px" id="colorBackground"></section>
<!--open another section for content after login section-->
<section>
<div class="boxes-wrapper-middle">
<table class="center" border="0">
<tr><td class="boxes-middle">

<p><div class="box-title"><img src="img/enter.png" class="box-icon"> 
	Enter Events</div></p>
	Enter events and record scores in real time. With real time 
	updates competitors can follow their progress in an event through 
	the leaderboard provided. It is updated as each competetor updates 
	their score hole by hole.                
 </td>
<td class="boxes-middle">

<p><div class="box-title"><img src="img/create.png" class="box-icon">  
	Create Events</div></p>
	Create your own events for you and your friends with 
	online course map features available. Monitor 
	in real time how you are placed in any event as you progress 
	through your round. </td></tr>
</table>
</div>
</section>

<section class ="sp50px" id="colorBackground"></section>

<section>
<div class="boxes-wrapper-middle">
<table class="center" border="0">
<tr><td class="boxes-middle">

<p><div class="box-title"><img src="img/cup.png" class="box-icon"> 
	In Game Leaderboards</div></p>
                	The '<i>in-game</i>' leaderboard will tell you where you are placed compared to your
	competitors, hole by hole. Are you in with a chance of victory going down the last?</td>
<td class="boxes-middle">


<p><div class="box-title"><img src="img/stat.png" class="box-icon"> 
	Statistical Analysis</div></p>
                	A performance analysis and summary is provided at the end of your round. The best part is that you 
	don't have to count your score, the system will do that too!  </td></tr>
</table>
</div>
</section>
<section class ="sp50px" id="colorBackground"></section>
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