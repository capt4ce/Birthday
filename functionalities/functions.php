<?php
if (!isset($path)) $path="";
include($path."db_init.php");

//List of functions that can be invoked in any page

//for checking is th admin logged in
function isLoggedIn(){
  if ($_SESSION["user_name"]!=NULL && $_SESSION["level"]!=NULL)
    return true;
}

//for activating menus in admin panel if admin is logged in
function passURL($URL,$negative="disable"){
  if (isLoggedIn())
    return "http=\"".$URL."\"";
  else
    return $negative;
}

function getPronoun(){
  if ($config->sex == 'Male')
    return "him";
  return "hers";
}

function getPossession(){
  if ($config->sex == 'Male')
    return "his";
  return "her";
}

function generateSalt(){
  $intermediateSalt=md5(uniqid(rand(),true));
  $salt=substr($intermediateSalt,0,6);
  return $salt;
}

//function for login
function loginAdmin($uName, $pWord, $pWord){
  global $conn;
  $sql="SELECT salt FROM user_tbl WHERE username='$uName'";
  $result=mysqli_query($conn, $sql);
  if (mysqli_num_rows($result)!=1) die("The login details provided incorrect");
  $row=mysqli_fetch_array($result);
  $salt=$row['salt'];
  echo "$salt\n";
  $saltedPassword=hash("sha512",$pWord.$salt);
  echo "$pWord\n";
  echo $saltedPassword;
  $sql="SELECT username,level FROM user_tbl WHERE username='$uName' and password='$saltedPassword'";
  $result=mysqli_query($conn, $sql);

  if (mysqli_num_rows($result)==1){
    $row=mysqli_fetch_array($result);
    $id=$row['username'];
    $currDate=date("Y-m-d H:i:s");
    mysqli_query($conn, "UPDATE user_tbl SET last_login='$currDate' WHERE username='$id'") or die("Can not access the user");

    $_SESSION["user_name"] = $row['username'];
    $_SESSION["level"] = $row['level'];
    if ($_SESSION["level"]=='Super Admin'){
      header('Location: admin.php');
    }
    else if ($_SESSION["level"]=="wish Manager"){
      header('Location: admin_wish-management.php');
    }
    else if ($_SESSION["level"]=="Picture Collector"){
      header('Location: admin_album.php');
    }
  }
  else {
    echo "The login details provided are incorrect ";
  }
}

function addUser($uName, $pWord,$level){
  global $conn;
  $salt=generateSalt();
  $saltedPassword=hash("sha512",$pWord.$salt);

  $result=mysqli_query($conn, "SELECT * FROM user_tbl WHERE username='$uName'");
  if (mysqli_num_rows($result)==0){
    mysqli_query($conn, "INSERT INTO user_tbl(username,password,salt,level) VALUES('$uName','$saltedPassword','$salt','$level')") or die("En erorr occurs while trying to add the user");
    echo "The user has been created";
    header("Refresh:3; URL=../admin_user-management.php");
  }
  else {
    echo "The user is already exist";
  }
}

 ?>
