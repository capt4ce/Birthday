<?php
include("functions.php");
$uName=mysqli_real_escape_string($conn, $_POST["uName"]);
$pWord=mysqli_real_escape_string($conn, $_POST["pWord"]);
loginAdmin($uName,$pWord,$pWord);
?>
