<?php
$config=simplexml_load_file("functionalities/config.xml") or die("failed to load configuration file");
$system_obj=$config->system_conf;
date_default_timezone_set($system_obj->time_zone);
 ?>
