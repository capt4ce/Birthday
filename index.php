<?php


//if (file_exists("install.php")){
//  include("install.php");
//}
//else{
  $path="functionalities/";
  include($path."functions.php");
  $start_time=strtotime($config->active_time);
  $current_time=strtotime(date("Y/m/d H:i:s"));
  $theme_path="themes/$system_obj->theme_name";
  $title=$system_obj->page_title;

  if ($current_time>$start_time){
    //include the primary page
    include("$theme_path/main.php");
    incPageViews();
  }
  else {
    //include the landing portal page
    incPageViews();
    include("$theme_path/wait.php");
  }
//}
 ?>
