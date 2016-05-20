<?php
include("config.php");
$name=mysqli_real_escape_string($conn,$_POST["NAME"]);
$wish=mysqli_real_escape_string($conn,$_POST["WISH"]);
$embed=mysqli_real_escape_string($conn,$_POST["EMBED"]);

if ($name!='' && $wish!='' && $embed!=''){
  $result=mysqli_query($conn, "INSERT INTO wish_tbl(author,wish,embed,date_time,status) VALUES('$name', '$wish','$embed','".date("Y-m-d H:i:s")."','0')") or die("An error occurs while submitting the wish");
  echo "true";
}
else {
  echo "empty";
}
 ?>
