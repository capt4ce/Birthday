<?php
include("config.php");
$uName=mysqli_real_escape_string($conn, $_POST["uName"]);
$pWord=mysqli_real_escape_string($conn, $_POST["pWord"]);
$pWord=hash("sha512", $pWord);
$level=mysqli_real_escape_string($conn, $_POST["level"]);

$result=mysqli_query($conn, "SELECT * FROM user_tbl WHERE username='$uName'");
if (mysqli_num_rows($result)==0){
  mysqli_query($conn, "INSERT INTO user_tbl(username,password,level) VALUES('$uName','$pWord','$level')") or die("En erorr occurs while trying to add the user");
  header("Refresh:0");
}
else {
  echo "The user is already exist";
}
 ?>
