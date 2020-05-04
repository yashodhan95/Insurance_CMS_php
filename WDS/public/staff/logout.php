<?php
require_once('../../private/initialize.php');
$_SESSION['message'] = 'Logout Succesful!';
unset($_SESSION['username']);

// or you could use
// $_SESSION['username'] = NULL;

redirect_to(url_for('/index.php'));

?>
