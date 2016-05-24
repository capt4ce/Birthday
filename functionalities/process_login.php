<?php
include("functions.php");
$uName=mysqli_real_escape_string($conn, $_POST["uName"]);
$pWord=mysqli_real_escape_string($conn, $_POST["pWord"]);
$pWord=hash("sha512", $pWord);
loginAdmin($uName,$pWord,$pWord);
?>
