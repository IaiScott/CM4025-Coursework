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
<!--setting the JQuery and JS scripts for form validation on the page-->
    <script type='text/javascript' src='http://code.jquery.com/jquery.min.js'></script>
    <script>
	function checkEmailsMatch() {
    	    var email1 = $("#email-field").val();
    	    var email2 = $("#confirm-email-field").val();
    		if (email1 != email2){
     			$("#doEmailsMatch").html("Emails do not match!").css('color', '#8B0000');
 			$("#email-field").css('border', '2px solid #8B0000');
			$("#confirm-email-field").css('border', '2px solid #8B0000');
    		}else{
			$("#doEmailsMatch").html("Emails match!").css('color', '#006400');
 			$("#email-field").css('border', '2px solid #006400');
			$("#confirm-email-field").css('border', '2px solid #006400');
		}}

	//run script when second form field 'confirm-email-field' is active and listen for changes.
	$(document).ready(function () {
	$("#confirm-email-field").keyup(checkEmailsMatch);
	});

    </script>
    <script>
	//create function to check if both password form fields on the registration page match.
	function checkPasswordsMatch() {
	    //create variables and assign the values of the form fields by css id
    	    var password1 = $("#password-field").val();
    	    var password2 = $("#confirm-password-field").val();
    	    //if variable 'field 1' is not equal to variable 'field 2' then print 'passwords do not match' to div
    	    //#doPasswordsMatch and change div border colour to red. Else, print passwords match and div to green.
    		if (password1 != password2){
        			$("#doPasswordsMatch").html("Passwords do not match!").css('color', '#8B0000');
 			$("#password-field").css('border', '2px solid #8B0000');
			$("#confirm-password-field").css('border', '2px solid #8B0000');
      		}else{
       			$("#doPasswordsMatch").html("Passwords match!").css('color', '#006400');
 			$("#password-field").css('border', '2px solid #006400');
			$("#confirm-password-field").css('border', '2px solid #006400');
		}
		}
        //run script when second form field 'confirm-password-field' is active and listen for changes
        $(document).ready(function () {
        $("#confirm-password-field").keyup(checkPasswordsMatch);
        });
    </script>
    <script>
	function validateFirstname() {
    	var element = document.getElementById('firstname-field');
    	element.value = element.value.replace(/[^a-zA-Z]+/, '');
	};
    </script>
    <script>
	function validateSurname() {
    	var element = document.getElementById('surname-field');
    	element.value = element.value.replace(/[^a-zA-Z]+/, '');
	};
    </script>
    <script>
	function validateCode() {
    	var element = document.getElementById('code-field');
    	element.value = element.value.replace(/[^a-zA-Z]+/, '');
	};
    </script>
    <script>
	function validateEmail() {
    	var element = document.getElementById('email-field');
    	element.value = element.value.replace(/[^a-zA-Z0-9@._-]+/, '');
	};
    </script>
    <script>
	function validateConfirmEmail() {
    	var element = document.getElementById('confirm-email-field');
    	element.value = element.value.replace(/[^a-zA-Z0-9@._-]+/, '');
	};
    </script>
    <script>
	function validatePassword() {
    	var element = document.getElementById('password-field');
    	element.value = element.value.replace(/[^a-zA-Z0-9@._-]+/, '');
	};
    </script>
    <script>
	function validateConfirmPassword() {
    	var element = document.getElementById('confirm-password-field');
    	element.value = element.value.replace(/[^a-zA-Z0-9@._-]+/, '');
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
if ((isset($_COOKIE['playerid']))&&(basename($_SERVER['PHP_SELF']) != 'logout.php')&&($_COOKIE['access'] != "manofsteel")){
?>

	<main>
	<section>
    		<div class="container">
        		<section class ="sp25px"></section>
        		<div class="box-title"><img src="img/warning.png" class="box-icon"> You do not have permission to access this page!</div>
		<div id="title-description">Please sign-in with Super-user access.</div>
        		<section class ="sp25px"></section>
        		<section><img src="img/Oops_man.png" id="panda"></section>
        		<section class ="sp50px"></section>
<?php
}else{
?>

	<main>
	<section>
		<div class="container">
		<section class="sp25px"></section>
    		<div class="box-title"><img src="img/add.png" class="box-icon"> Create a user account...</div>
		<div id="title-description">Complete and submit the registration form to gain access to this site.
		<br>It is completely free!</div> 
		<section class="sp50px"></section>

    <form action="userregisteredloggedin.php" method="POST">
        <table class="center" border="0">
            <tr>
                <td class="pad">Title:</td><td class="pad">
                    <select name="title" class="pad-box" id="form-square" required="required">
	       <option value="">Please select</option>                        
	       <option value="Mr">Mr</option>  
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        <option value="Ms">Ms</option>   
                    </select>
                </td>
            </tr>
            <tr>
                <td class="pad">Firstname:</td><td><input type="text" name="firstname" class="pad-box" id="firstname-field" 
	pattern="[A-Za-z]{,9}" title="Only letters are permitted!" maxlength="9" required="required" onkeyup="validateFirstname();"/></td>
            </tr>
            <tr>
                <td class="pad">Surname:</td><td><input type="text" name="surname" class="pad-box" id="surname-field" 
	pattern="[A-Za-z]{,15}" title="Only letters are permitted!" maxlength="15" required="required" onkeyup="validateSurname();"/></td>
            </tr>
            <tr>
                <td class="pad">Nationality Code:</td><td><input type="text" name="flag" class="pad-box" id="code-field" 
	pattern="[A-Za-z]{3}" title="Only three letter national codes are permitted!" maxlength="3" required="required" onkeyup="validateCode();"/></td>
            </tr>
            <tr>
                <td class="pad">Email:</td><td><input type="email" name="email" class="pad-box" id="email-field" 
	pattern="[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,}$" maxlength="20" required="required" onkeyup="validateEmail();"/></td>
            </tr> 
            <tr>
                <td class="pad">Re-type Email:</td><td><input type="email" name="email2" class="pad-box" id="confirm-email-field" 
	pattern="[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,}$" maxlength="20" required="required" onkeyup="validateConfirmEmail();"/></td>
            </tr> 
            <tr>
                <td class="pad"></td><td class="formAlert" id="doEmailsMatch"></td>
            </tr>
            <tr>
                <td class="pad">Password:</td><td><input type="password" name="password" class="pad-box" id="password-field"  
                 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain 8 or more characters with at least one number, one uppercase, and one lowercase letter."
	maxlength="15" required="required" onkeyup="validatePassword();"/></td>
            </tr>
            <tr>
                <td class="pad">Re-type Password:</td><td><input type="password" name="password2" class="pad-box" id="confirm-password-field" 
	pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain 8 or more characters with at least one number, one uppercase, and one lowercase letter."
	maxlength="15" required="required" onkeyup="validateConfirmPassword();"/></td>
            </tr>
	<tr>
                <td class="pad"></td><td class="formAlert" id="doPasswordsMatch"></td>
            </tr>
            <tr>
	<td class="pad">Account access:</td>
                <td>
 	<select name="access" class="pad-box" id="form-square" required="required">
                        <option value="">Please select</option>
                        <option value="user">User</option>  
                        <option value="ihavethepower">Power-user</option>
                        <option value="manofsteel">Super-user</option>
                    </select>
	</td>
            </tr> 
	<tr><td colspan="2" class="pad"></td></tr>
            <tr>
                <td></td><td><button class="btn-black" type="submit">Register</button></td>
            </tr>
        </table>
</form>

</section>
  
<section>
<div class="container">
<img src="img/playgolf.jpg" id="panda">
</div>

<?php
}
?>
</div>
</section>
</main>

<?php
	include('footer.inc.php');
?>

</body>
</html>