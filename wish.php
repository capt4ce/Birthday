<?php include("functionalities/config.php");?><!DOCTYPE html>
<!--This website is made just for fun :p
Fabricated by: Ahmad Ali Abdilah
For Anusha, HAPPY BIRTHDAY!!
Hope you like this small piece of work :D :D
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE= edge">
    <meta name="viewport" content="width-device-width, initial-scale-1"><link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
    <title>Wish</title>
  </head>
  <body>
    <div class="row" id="tbl-main">
      <div class="panel panel-default col-md-2 text-right" id="cell-menu"><a class="btn" id="sidebar-toggle" type="button"><span class="glyphicon glyphicon-align-justify"></span></a>
        <ul>
          <li class="menus"><a>Wish<span class="glyphicon glyphicon-pencil"></span></a></li>
          <li class="menus"><a>Album<span class="glyphicon glyphicon-picture"></span></a></li>
          <li class="menus"><a>Users<span class="glyphicon glyphicon-user"></span></a></li>
          <li class="menus"><a>Settings<span class="glyphicon glyphicon-cog"></span></a></li>
        </ul>
      </div>
      <div id="cell-main">
        <h1 class="logo">Birthday</h1>
        <hr>
        <div class="container col-md-6">
          <h3>Write your wish to <u><b><?php echo $config->birthday_name;?></b></u></h3><br>
          <div class="form-group">
            <form method="post">
              <label for="name">Your Name:</label><br>
              <input class="form-control" id="name" type="text" name="name"><br>
              <label for="wish">Your Wish:</label><br>
              <textarea class="form-control" id="wish" cols="70" rows="10" name="wish"></textarea><br>
              <label for="embed">Additional link (for picture):</label><br>
              <input class="form-control" id="embed" type="text" name="embed"><br>
              <button class="btn btn-default" type="reset">Clear</button>
              <button class="btn btn-primary" type="submit">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div><script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
  </body>
</html>