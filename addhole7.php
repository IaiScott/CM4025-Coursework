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
<!--setting the JQuery and JS scripts for form validation on the page-->
    <script type='text/javascript' src='http://code.jquery.com/jquery.min.js'></script>
   
<script>
	function validateHolename() {
    	var element = document.getElementById('holename-field');
    	element.value = element.value.replace(/[^a-zA-Z ]+/, '');
	};
    </script>
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

//$holeimgurl = $_REQUEST['holeimgurl'];
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
    <div id="title-description">Please add the golf course information for your club. <br>
    This will generate the course map and scorecard!</div> 
<section class="sp50px"></section>

<form action="addhole8.php" method="POST" enctype="multipart/form-data">
    <table class ="center" border="0">
    <tr>
        <td class="title" colspan ="4">Create Golf Course<input type="hidden" name="clubname" value="<?php echo $clubname;?>" readonly="readonly"></td>
    </tr>
    <tr>
        <td class="title" colspan ="4">Hole: #7<input type="hidden" name="holeno" value="7" readonly="readonly"></td>
    </tr>
    <tr>
        <td class="white">Hole Name</td><td class="white">Yards (White)</td>
        <td class="white">PAR</td><td class="white">SI</td>
    </tr> 
    <tr>
        <td class="table-decoration-top"><input type="text" id="holename-field" class="center-form-input" name="holename" size="20" maxlength="20" pattern="[A-Za-z ]{,20}" title="Only letters and spaces are permitted!" required="required" onkeyup="validateHolename();"/></td>
        <td class="table-decoration-top"><input type="text" id="center-form" class="center-form-input" name="yardswhite" size="3" maxlength="3" pattern="[0-9]{,3}" title="Only digits are permitted!" required="required"/></td>
        <td class="table-decoration-top"><input type="text" id="center-form" class="center-form-input" name="parwhite" size="1" maxlength="1" pattern="[0-9]{1}" title="Only digits are permitted!"required="required"/></td>
        <td class="table-decoration-top"><input type="text" id="center-form" class="center-form-input" name="siwhite" size="2" maxlength="2" pattern="[0-9]{,2}" title="Only digits are permitted!" required="required"/></td>
    </tr>
    <tr>
        <td></td>
        <td class="yellow">Yards (Yellow)</td>
        <td class="yellow">PAR</td>
        <td class="yellow">SI</td>
    </tr>
    <tr>
        <td class="table-decoration-no-border"></td>
        <td class="table-decoration-top"><input type="text" id="center-form" class="center-form-input" name="yardsyellow" size="3" maxlength="3" pattern="[0-9]{,3}" title="Only digits are permitted!" required="required"></td>
        <td class="table-decoration-top"><input type="text" id="center-form" class="center-form-input" name="paryellow" size="1" maxlength="1" pattern="[0-9]{1}" title="Only digits are permitted!"required="required"></td>
        <td class="table-decoration-top"><input type="text" id="center-form" class="center-form-input" name="siyellow" size="2" maxlength="2" pattern="[0-9]{,2}" title="Only digits are permitted!" required="required"></td>
    </tr>
    <tr>
        <td class="table-decoration-no-border"></td>
        <td class="red">Yards (Red)</td>
        <td class="red">PAR</td><td class="red">SI</td>
    <tr>
        <td></td>
        <td class="table-decoration-top-bottom"><input type="text" id="center-form" class="center-form-input" name="yardsred" size="3" maxlength="3" pattern="[0-9]{,3}" title="Only digits are permitted!" required="required"></td>
        <td class="table-decoration-top-bottom"><input type="text" id="center-form" class="center-form-input" name="parred" size="1" maxlength="1" pattern="[0-9]{1}" title="Only digits are permitted!"required="required"></td>
        <td class="table-decoration-top-bottom"><input type="text" id="center-form" class="center-form-input" name="sired" size="2" maxlength="2" pattern="[0-9]{,2}" title="Only digits are permitted!" required="required"></td>
    </tr>
    <tr>
        <td colspan="4" class="table-decoration-top-bottom">Select image to upload: <input type="file" name="fileToUpload" id="fileToUpload" required="required"></td>
    </tr>
    <tr>
        <td colspan="4" class="table-decoration-no-border"></td>
    </tr>
    <tr>
        <td colspan="4"><button class="btn-black" type="submit">Submit</button></td>
    </tr>
    </table>
</form>
</div>
</section>

<section class ="sp50px"></section>
<section>
    <div class="container">
         <img src="img/whitemaleputt.jpg" id="panda">
</div>
</section>

</main>

<?php
    include('footer.inc.php');
?>
</body>
</html>