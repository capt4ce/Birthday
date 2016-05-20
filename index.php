<?php
include("functionalities/config.php");
$start_time=strtotime(simplexml_load_file("config.xml")->active_time);
$current_time=strtotime(date("Y/m/d H:i:s"));
$theme_path="themes/$system_obj->theme_name";
$title=$system_obj->page_title;
if ($current_time>$start_time){
  //include the primary page
  echo "true";
}
else {
  //include the landing portal page
  include("$theme_path/wait.php");
}

 ?>
