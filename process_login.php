<?php
include("config.php");
$uName=mysqli_real_escape_string($conn, $_POST["uName"]);
$pWord=mysqli_real_escape_string($conn, $_POST["pWord"]);
$pWord=hash("sha512", $pWord);

$sql="SELECT * FROM user_tbl WHERE username="$uName" and password="$pWord"";
$result=mysqli_query($conn, $sql);

if (mysqli_num_rows($result)==1){
  $row=mysqli_fetch_array($result);
  $id=row['id'];
  mysqli_query($conn, "UPDATE user_tbl SET last_login='".date("Y-m-d H:i:s")."' WHERE id='$id'") or die("Can not access the user");

  $_SESSION["user_name"] = $row['username'];
  $_SESSION["level"] = $row['level'];
  if ($_SESSION["level"]=='admin'){
    header('Location: admin.php');
  }
  else if ($_SESSION["level"]=="picCollector"){
    header('Location: album.php')
  }
}
else {
  echo "The login details provided are incorrect ";
}
 ?>
