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
if (!isset($_COOKIE['playerid'])){
require('login_functions.inc.php');
redirect_user();

}else{

setcookie('playerid', ' ', time()-3600, '/', ' ', 0, 0);
setcookie('firstname', ' ', time()-3600, '/', ' ', 0, 0);
setcookie('lastname', ' ', time()-3600, '/', ' ', 0, 0);
setcookie('access', ' ', time()-3600, '/', ' ', 0, 0);
}
$page_title = 'Logged Out!';
include('headerRegister.inc.php');
?>
<section>
<div class="container">
<section class ="sp25px"></section>

<div class="title-logout"><h1>Logged Out!</h1></div>
<div id="logged-out">You have been successfully logged out<b>
<?php
echo "{$_COOKIE['firstname']}!</b>";
?>





</div>





<section class ="sp25px"></section>



<section><img src="img/thankyou.png" id="panda"></section>
<section class ="sp25px"></section>

</div>
</section>

</main>



<?php
//echo $_COOKIE['playerid'];
include('footer.inc.php');
?>



</body>
</html>