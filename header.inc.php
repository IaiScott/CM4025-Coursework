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

<section>
<div class="banner">
  <div class="banner-left">
    <img src="img/logo.png">
  </div>
<div class="banner-right">
  <nav>
    <!--set menu list items/links for right hand side div of banner-->
    <a href="#" id="menu-icon"></a>
      <ul>
        <li><a href="loggedin.php" class="nav-link">Home</a></li>	
        <li><a href="entercompetition.php" class="nav-link">Enter Event</a></li>
        <li><a href="createEvent.php" class="nav-link">Create Event</a></li>
        <li><a href="leaderboard.php" class="nav-link">Leaderboard</a></li>
        <li><a href="helploggedin.php" class="nav-link">Help</a></li>
        <li>
            <?php
                if ((isset($_COOKIE['firstname']))&&(basename($_SERVER['PHP_SELF']) != 'logout.php')){
                    echo '<a href="logout.php" class="nav-link">Logout</a>';
                }else{
                    echo '<a href="fantasygolf.php" class="nav-link">Login</a>';
                }
            ?>
        </li>  
     </ul>
  </nav>
</div>
</div>
</section>

</body>
</html>



