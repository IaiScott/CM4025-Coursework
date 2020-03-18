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
</head>

<body>
<main>

	<?php
	include('headerloggedin.inc.php');

	if (!isset($_COOKIE['playerid'])){
	require('login_functions.inc.php');
	redirect_user();
	}
	
	?>

<div class="container" id="logged-in-as">You are logged in as <b>
<?php echo $_COOKIE['firstname'];?> <?php echo $_COOKIE['lastname'];?></b>
 with <b>

<?php
if ($_COOKIE['access'] == "manofsteel"){
echo 'Super-user</b> access.</div>';
}else if ($_COOKIE['access'] == "ihavethepower"){
echo 'Power-user</b> access.</div>';
}else{
echo 'User</b> access.</div>';
}
?>


<?php

// if user access is super-user...
if ((isset($_COOKIE['playerid']))&&(basename($_SERVER['PHP_SELF']) != 'logout.php')&&($_COOKIE['access'] != "user")&&($_COOKIE['access'] != "ihavethepower")){
// do this.
?>


<div class="container">




<section class ="sp25px"></section>
<div class = "boxes-loggedin"> 
<div class = "box-loggedin-left"> 


<p><div class="box-title"><img src="img/access2.png" class="box-icon"> 
About: Super-user Access</div></p>




As a 'Super-user' you have access to all of the additional functionality on this page and the links 
have not been removed. The permissions are set using PHP which loads the page with 
the appropriate content according to the value of the site access cookie. 
The cookie is set by querying the database field 'access' during log-on.

            </div>  
              
            <div class = "box-loggedin-right"> 

<img src="img/super-user.png" id="super-user">
 </div>   </div>
<section class ="sp25px"></section>
<div class="parallax"></div>
<section class ="sp5px"></section>
<div class="parallax"></div>
<section class ="sp5px"></section>
<div class="parallax"></div>
<section class ="sp5px"></section>
<div class="parallax"></div>
<section class ="sp25px"></section>

<div class = "boxes-loggedin"> 
<div class = "box-loggedin-left"> 
<p><div class="box-title"><img src="img/user.png" class="box-icon"> 
Create User Accounts</div></p>

Super-user accounts can create elevated user access accounts.
When users register they are given 'user' access accounts only. Administrators 
can create accounts with 'Power-user' and 'Super-user' access rights. Power-users 
can add clubs and courses to the database whilst Super-users can also delete 
records from the database. Simply follow the 
link <a href="adminregistration.php" class="link-loggedin"><b>here</b></a>. 
 
            </div>  
              
            <div class = "box-loggedin-right"> 
                
 <p><div class="box-title"><img src="img/add.png" class="box-icon">  


Add Golf Club</div></p>
              
Super-user and Power-user accounts can add golf clubs and their associated golf 
courses to the database. The golf clubs will then be available within 
the application; allowing users to 'create' and 'enter' events at that club. 
Simply follow the link <a href="addgolfclub.php" class="link-loggedin"><b>here</b></a>. 
</div>   </div>   



<section class ="sp50px"></section>

<?php
// if user access is power-user...
} else if ((isset($_COOKIE['playerid']))&&(basename($_SERVER['PHP_SELF']) != 'logout.php')&&($_COOKIE['access'] != "manofsteel")&&($_COOKIE['access'] != "user")){
// do this..

?>
<div class="container">


<section class ="sp25px"></section>
<div class = "boxes-loggedin"> 
<div class = "box-loggedin-left"> 

<p><div class="box-title"><img src="img/access2.png" class="box-icon"> 
About: Power-user Access</div></p>

As a 'Power-user' you have access to some the additional functionality on this page; namely
adding golf clubs. The links to the other functionality have been removed. The permissions are set using PHP which loads the page with 
the appropriate content according to the value of the site access cookie. 
The cookie is set by querying the database field 'access' during log-on. 

            </div>  
              
            <div class = "box-loggedin-right"> 

               

<img src="img/power-user.jpg" id="power-user">




</div> 

 </div>   
<section class ="sp25px"></section>

<div class="parallax"></div>
<section class ="sp5px"></section>
<div class="parallax"></div>
<section class ="sp5px"></section>
<div class="parallax"></div>
<section class ="sp5px"></section>
<div class="parallax"></div>
<section class ="sp25px"></section>

<div class = "boxes-loggedin"> 
<div class = "box-loggedin-left"> 

<img src="img/whitemaleputt.jpg" id="power-user2">
 
            </div>  
              
            <div class = "box-loggedin-right"> 
                
 <p><div class="box-title"><img src="img/add.png" class="box-icon">  


Add Golf Club</div></p>
Super-user and Power-user accounts can add golf clubs and their associated golf 
courses to the database. The golf clubs will then be available within 
the application; allowing users to 'create' and 'enter' events at that club. 
Simply follow the link <a href="addgolfclub.php" class="link-loggedin"><b>here</b></a>. 



</div>  </div>   



<section class ="sp50px"></section>
<?php

}else {



?>

<div class="container">


<section class ="sp25px"></section>
<div class = "boxes-loggedin"> 
<div class = "box-loggedin-left"> 

<p><div class="box-title"><img src="img/access2.png" class="box-icon"> 
About: User Access</div></p>

As a 'User' you only have access to the features linked within the navigation menu. 
You do not have access to the additional functionality on this page and the links 
have been removed. The permissions are set using PHP which loads the page with 
the appropriate content according to the value of the site access cookie. 
The cookie is set by querying the database field 'access' during log-on. 

            </div>  
              
            <div class = "box-loggedin-right"> 

<img src="img/user.jpeg" id="user">
             

</div> 

 </div>   
<section class ="sp25px"></section>

<div class="parallax"></div>
<section class ="sp5px"></section>
<div class="parallax"></div>
<section class ="sp5px"></section>
<div class="parallax"></div>
<section class ="sp5px"></section>
<div class="parallax"></div>
<section class ="sp50px"></section>
<section>
<div> 

   <img src="img/joy.png" id="joy">           
             </div>   

</section>



<?php


}
?>

</div>
</main>
<?php
include('footer.inc.php');
?>


</body>
</html>