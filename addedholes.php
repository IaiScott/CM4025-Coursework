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
  <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">

</head>
<body>

<?php

include('header.inc.php');
if (!isset($_COOKIE['playerid'])){
	require('login_functions.inc.php');
	redirect_user();
	}
require('mysqli_connect.php');



$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$clubname = $_REQUEST['clubname'];
$holeimgurl = "uploads/" . $_FILES["fileToUpload"]["name"];
$holename = $_REQUEST['holename'];
$holeno = $_REQUEST['holeno'];
$parred = $_REQUEST['parred'];
$parwhite = $_REQUEST['parwhite'];
$paryellow = $_REQUEST['paryellow'];
$sired = $_REQUEST['sired'];
$siwhite = $_REQUEST['siwhite'];
$siyellow = $_REQUEST['siyellow'];
$yardsred = $_REQUEST['yardsred'];
$yardswhite = $_REQUEST['yardswhite'];
$yardsyellow = $_REQUEST['yardsyellow'];

$q="INSERT INTO courses (clubname, holeimgurl, holename, holeno, parred, parwhite, paryellow, sired, siwhite, siyellow, yardsred, yardswhite, yardsyellow) 
VALUES ('$clubname', '$holeimgurl', '$holename', '$holeno', '$parred', '$parwhite', '$paryellow', '$sired', '$siwhite', '$siyellow', '$yardsred', '$yardswhite', '$yardsyellow')";
$r = @mysqli_query($dbc, $q);
?>

<main>
<section>
<div class="container">
<section class="sp25px"></section>
    <div class="box-title"><img src="img/add.png" class="box-icon"> Club name: <?php echo $clubname?></div>
    <div id="title-description">Golf Course information added successfully. <br>
    Here are the details. You can now create and enter events!</div> 
<section class="sp50px"></section>
</div>
<?php

$q= "SELECT * FROM courses WHERE clubname ='$clubname'";
$r = @mysqli_query($dbc, $q);
if($r) {

echo '<table class="center" border="0"><tr><td class="blue">Hole No.</td><td class="blue">Hole Name</td><td class="red">Yards (Red)</td><td class="red">Par (Red)</td><td class="red">S.I. (Red)</td><td class="yellow">Yards (Yellow)</td><td class="yellow">Par (Yellow)</td><td class="yellow">S.I. (Yellow)</td><td class="white">Yards (White)</td><td class="white">Par (White)</td><td class="white">S.I. (White)</td><td class="blue">Image url</td></tr>';

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
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

echo '<tr><td class="blue-bottom-top">'.$holeno.'</td><td class="blue-bottom-top">'.$holename.'</td>
<td class="red-bottom-top">'.$yardsred.'</td><td class="red-bottom-top">'.$parred.'</td><td class="red-bottom-top">'.$sired.'</td>
<td class="yellow-bottom-top">'.$yardsyellow.'</td><td class="yellow-bottom-top">'.$paryellow.'</td><td class="yellow-bottom-top">'.$siyellow.'</td>
<td class="white-bottom-top">'.$yardswhite.'</td><td class="white-bottom-top">'.$parwhite.'</td><td class="white-bottom-top">'.$siwhite.'</td>
<td class="blue-bottom-top">'.$holeimgurl.'</td></tr>';
}
echo '</table>';
}
?>

<section class="sp50px"></section>
<section class="sp50px"></section>
<img src="img/joy.png" id="panda">

</section>

</main>

<?php
    include('footer.inc.php');
?>
</body>
</html>