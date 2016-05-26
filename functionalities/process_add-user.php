<?php
include("functions.php");
$uName=mysqli_real_escape_string($conn, $_POST["uName"]);
$pWord=mysqli_real_escape_string($conn, $_POST["pWord"]);
$rePWord=mysqli_real_escape_string($conn, $_POST["rePWord"]);
if (isset($_POST["level"]))
  $level=mysqli_real_escape_string($conn, $_POST["level"]);
else
  $level="Super Admin";
if (strcmp($pWord,$rePWord)!=0){
  echo "The passwords entered are not the same";
  header("Refresh: 3; URL=../admin_user-management.php");
  exit();
}
addUser($uName, $pWord, $level);
 ?>
