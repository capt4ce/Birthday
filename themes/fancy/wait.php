<!DOCTYPE html>
<!--This website is made just for fun :p
Fabricated by: Ahmad Ali Abdilah
For Anusha, HAPPY BIRTHDAY!!
Hope you like this small piece of work :D :D
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE= edge">
    <meta name="viewport" content="width-device-width, initial-scale-1"><link href="<?php echo $theme_path;?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $theme_path;?>/css/style.css" rel="stylesheet">
    <title><?php echo $title;?></title><link rel="stylesheet" href="<?php echo $theme_path;?>/css/jquery.countdown.css">
  </head>
  <body id="wait">
    <div class="container text-center" id="main">
      <h3>The page will be up after...</h3>
      <p id="active_time" hidden><?php echo simplexml_load_file("config.xml")->active_time;?></p>
      <div id="countdown"></div>
      <h2>
        <u><?php echo simplexml_load_file("config.xml")->birthday_name;?></u> will have birthday after sometime
      </h2>
      <h4>Contribute by submitting your wish</h4><a class="btn btn-default btn-lg" id="wish-btn" href="wish.php">Click Here</a>
    </div><script src="<?php echo $theme_path;?>/js/jquery-2.2.0.min.js"></script>
<script src="<?php echo $theme_path;?>/js/bootstrap.min.js"></script><script src="<?php echo $theme_path;?>/js/jquery.countdown.js"></script>
<script src="<?php echo $theme_path;?>/js/script.js"></script>
  </body>
</html>