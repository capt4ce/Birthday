<?php
include("db_init.php");
//List of functions that can be invoked in any page

//for checking is th admin logged in
function isLoggedIn(){
  if ($_SESSION["user_name"]!=NULL && $_SESSION["level"]!=NULL)
    return true;
}

//for activating menus in admin panel if admin is logged in
function passURL($URL){
  if (isLoggedIn())
    return "http=\"".$URL."\"";
  else
    return "disabled";
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

//function for login
function loginAdmin($uName, $pWord, $pWord){
  $sql="SELECT * FROM user_tbl WHERE username='$uName' and password='$pWord'";
  $result=mysqli_query($conn, $sql);

  if (mysqli_num_rows($result)==1){
    $row=mysqli_fetch_array($result);
    $id=$row['id'];
    mysqli_query($conn, "UPDATE user_tbl SET last_login='".date("Y-m-d H:i:s")."' WHERE id='$id'") or die("Can not access the user");

    $_SESSION["user_name"] = $row['username'];
    $_SESSION["level"] = $row['level'];
    if ($_SESSION["level"]=='admin'){
      header('Location: admin.php');
    }
    else if ($_SESSION["level"]=="picCollector"){
      header('Location: album.php');
    }
  }
  else {
    echo "The login details provided are incorrect ";
  }
}

 ?>
