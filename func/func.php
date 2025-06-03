<?php
if (session_status() == PHP_SESSION_NONE) {
    // Set the session name before starting the session
    session_name('wizerentals');
    session_start();
}
include("../db_open.php");
$f=mysqli_real_escape_string($con,$_POST["fname"]);
include($f.".php");
include("../db_close.php");
?>