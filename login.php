<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

require('mysqli_connect.php');
require('login_functions.inc.php');

list($check, $data) = check_login($dbc, $_POST['email'], $_POST['password']);

if($check) {

setcookie('playerid', $data['playerid']);
setcookie('firstname', $data['firstname']);
setcookie('lastname', $data['lastname']);
setcookie('access', $data['access']);

redirect_user('loggedin.php');
}else{
$errors = $data;
}
mysqli_close($dbc);
}
include('loginError.php');
?>
