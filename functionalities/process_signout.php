<?php
session_start();
session_destroy();
echo "You have been successfully logged out";
header("Refresh: 2; URL=../login.php");
?>
