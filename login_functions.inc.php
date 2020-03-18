<?php

function redirect_user($page = 'index.php') {

$url = 'http://' . $_SERVER['localhost'] . dirname($_SERVER['PHP_SELF']);

$url = rtrim($url, '/\\');
$url .= '/' . $page;
header("Location: $url");
exit();
}

function check_login($dbc, $email = '', $password = ''){

$errors = [];

if(empty($email)){
$errors[] = 'enter email address';
}else{
$e = mysqli_real_escape_string
($dbc, trim($email));
}
if(empty($password)){
$errors[] = 'enter password';
}else{
$p = mysqli_real_escape_string
($dbc, trim($password));
}

if(empty($errors)) {
$q = "SELECT playerid, firstname, lastname, access FROM users WHERE email='$e' AND password='$p'";
$r = @mysqli_query($dbc, $q);

if(mysqli_num_rows($r) == 1){
$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
return [true, $row];
}else{
$errors[] = 'The username and password do not match!';
}
}
return [false, $errors];
}
?>