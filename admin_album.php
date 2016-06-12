<?php $path="functionalities/"; $page="album"; include("functionalities/functions.php");?><!DOCTYPE html>
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
    <title>Album</title>
  </head>
  <body id="dashboard">
    <div class="row" id="tbl-main">
      <nav class="navbar navbar-inverse visible-sm visible-xs" id="mobile-navbar">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.php">Birthday</a>
          </div>
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="menus"><a class="menu-labels" <?php echo passURL("admin.php");?>><span class="glyphicon glyphicon-stats"></span> Dashboard</a></li>
              <li class="menus"><a class="menu-labels" <?php echo passURL("admin_wishes.php","Wish Manager");?>><span class="glyphicon glyphicon-comment"></span> Wishes</a></li>
              <li><a class="menu-labels" <?php echo passURL("admin_album.php", "Picture Collector");?>><span class="glyphicon glyphicon-picture"></span> Album</a></li>
              <li><a class="menu-labels" <?php echo passURL("admin_users.php");?>><span class="glyphicon glyphicon-user"></span> Users</a></li>
              <li><a class="menu-labels" <?php echo passURL("admin_settings.php");?>><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
              <li><a class="menu-labels" href="about.php"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
              <li><a class="menu-labels" <?php echo passURL("functionalities/process_signout.php");?>><span class="glyphicon glyphicon-log-out"></span> Signout</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <input id="check-toggle" type="checkbox" name="check-toggle">
      <div class="panel panel-default col-md-2 text-right visible-lg visible-md" id="cell-menu">
        <label for="check-toggle"><a class="btn" id="sidebar-toggle" type="button"><span class="glyphicon glyphicon-menu-hamburger"></span></a></label>
        <ul>
          <li class="menus"><a class="menu-labels" <?php echo passURL("admin.php"); if ($page=='dashboard') echo " active"?>>Dashboard<span class="glyphicon glyphicon-stats"></span></a></li>
          <li class="menus"><a class="menu-labels" <?php echo passURL("admin_wishes.php","Wish Manager"); if ($page=='wishes') echo " active"?>>Wishes<span class="glyphicon glyphicon-comment"></span></a></li>
          <li class="menus"><a class="menu-labels" <?php echo passURL("admin_album.php","Picture Collector");  if ($page=='album') echo " active"?>>Album<span class="glyphicon glyphicon-picture"></span></a></li>
          <li class="menus"><a class="menu-labels" <?php echo passURL("admin_users.php"); if ($page=='users') echo " active"?>>Users<span class="glyphicon glyphicon-user"></span></a></li>
          <li class="menus"><a class="menu-labels" <?php echo passURL("admin_settings.php"); if ($page=='settings') echo " active"?>>Settings<span class="glyphicon glyphicon-cog"></span></a></li>
          <li class="menus"><a class="menu-labels" href="about.php">About<span class="glyphicon glyphicon-info-sign"></span></a></li>
          <li class="menus"><a class="menu-labels"  <?php echo passURL("functionalities/process_signout.php");?>>Signout<span class="glyphicon glyphicon-log-out"></span></a></li>
        </ul>
      </div>
      <div id="cell-main">
        <h1 class="logo visible-lg visible-md">Birthday</h1>
        <hr class="visible-lg visible-md">
        <label class="btn btn-default edit_button disabled" id="pictures_upload_label" for="pictures_upload">Upload Pictures...</label><a class="btn btn-danger edit_button"><span class="glyphicon glyphicon-trash"></span> Delete</a>
        <div class="panel panel-default picture_container" style="padding: 10px">
          <h4>Uploading Pictures</h4>
          <hr>
          <div class="row text-center" id="new">
            <p id="new_status">No files selected</p><img id="progress" src="src/loader.gif" style="display: none">
          </div>
        </div>
        <div class="panel panel-default picture_container" style="padding: 10px">
          <h4>Existing Pictures</h4>
          <hr>
          <div class="row text-center" id="existing">
            <form id="select_pictures" action="" method="post"><?php getPictures(); ?></form>
          </div>
        </div>
      </div>
    </div>
    <form class="upload" id="pictures" action="functionalities/process_multiple_upload.php" method="post" enctype="multipart/form-data" role="form" onsubmit="return false" hidden>
      <input id="pictures_upload" type="file" name="images[]" onchange="var input=this.id; $('#'+input).children('inputID').value=input;$('#'+input).children('dir_path').value='../album/'; $('#pictures').submit()" multiple disabled>
      <input id="inputID" type="text" name="inputID">
      <input id="dir_path" type="text" name="dir_path">
    </form><script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/pg-album.js"></script>
  </body>
</html>