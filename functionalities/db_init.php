<?php
include($path."config.php");
$server=$system_obj->server_name;
$user=$system_obj->db_user;
$password=$system_obj->db_password;
$db=$system_obj->db_name;
$conn=mysqli_connect($server,$user,$password,$db) or die("Couldn't connect to the database");
 ?>
