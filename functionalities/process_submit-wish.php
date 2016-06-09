<?php
include("functions.php");
$name=mysqli_real_escape_string($conn,$_POST["name"]);
$wish=mysqli_real_escape_string($conn,$_POST["wish"]);
$picture=mysqli_real_escape_string($conn,$_POST["profile_file"]);
$embed=mysqli_real_escape_string($conn,$_POST["featured_file"]);
$status=getStatusRule();

if ($name!='' && $wish!=''){
  $result=mysqli_query($conn, "INSERT INTO wish_tbl(author,author_pic,wish,embed,date_time,status) VALUES('$name', '$picture', '$wish','$embed','".date("Y-m-d H:i:s")."','$status')") or die("An error occurs while submitting the wish");
  echo "The wish has been submitted";
  header("Refresh: 2; URL=../index.php");
}
else {
  echo "empty";
}
 ?>
