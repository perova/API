<?php

//  elseif(isset($_POST['logout'])) {
//     session_destroy();
//     $_SESSION = null;
// }


session_start();

session_destroy();
$_SESSION = null;

header("Location: login.php");

