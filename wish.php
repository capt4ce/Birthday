<?php $path="functionalities/"; $page=""; include("functionalities/functions.php");?><!DOCTYPE html>
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
        <div class="container">
          <h3>Write a wish to <u><b><?php echo $config->birthday_name;?></b></u></h3><br>
          <div class="form-group col-md-6">
            <form id="wish" action="functionalities/process_submit-wish.php" role="form" method="post" onsubmit="" enctype="multipart/form-data">
              <label for="name">Your Name:</label>
              <div class="input-group">
                <input class="form-control col-md-6" id="name" type="text" name="name"><span class="input-group-btn">
                  <label class="btn btn-default disabled" id="profile_label" for="profile_file">Choose Your Picture...</label>
                  <input id="profile_file_name" type="text" name="profile_file" hidden></span>
              </div>
              <p class="file_name" id="profile_file_status">No picture selected as your picture</p>
              <div class="progress" id="profile_file_prog_container" hidden>
                <div class="progress-bar progress-bar-info progress-bar-striped" id="profile_prog" role="progress-bar" aria-valuenow="0" aria-valuemax="100">0%</div>
                <p class="msg"></p>
              </div><br>
              <label for="wish">Your Wish:</label>
              <textarea class="form-control" id="wish" cols="70" rows="10" name="wish"></textarea><br>
              <label>Featured Picture (optional):</label>
              <label class="btn btn-default disabled" id="featured_label" for="featured_file">Choose A Picture...</label>
              <p class="file_name" id="featured_file_status">No picture selected for featured picture</p>
              <input id="featured_file_name" type="text" name="featured_file" hidden>
              <div class="progress" id="featured_file_prog_container" hidden>
                <div class="progress-bar progress-bar-info progress-bar-striped" id="featured_prog" role="progress-bar" aria-valuenow="0" aria-valuemax="100">0%</div>
                <p class="msg"></p>
              </div><br>
              <button class="btn btn-default" type="reset">Clear</button>
              <button class="btn btn-primary" id="submit" type="submit">Submit</button>
            </form>
            <form class="upload" id="profile_file_form" action="functionalities/process-upload.php" enctype="multipart/form-data" role="form" method="post" onsubmit="return false" hidden>
              <input id="profile_file" type="file" name="profile_file" onchange="input=this.id;prog='#'+input+'_prog_container';$('#profile_file_status').text(this.value);$('#inputID_p').val(input);$('#dir_path_p').val('../wishes/profile/');$('#profile_file_form').submit()" disabled>
              <input id="inputID_p" type="text" name="inputID">
              <input id="dir_path_p" type="text" name="dir_path">
            </form>
            <form class="upload" id="featured_file_form" action="functionalities/process-upload.php" enctype="multipart/form-data" role="form" method="post" onsubmit="return false" hidden>
              <input id="featured_file" type="file" name="featured_file" onchange="input=this.id;prog='#'+input+'_prog_container';$('#featured_file_status').text(this.value);$('#inputID_f').val(input);$('#dir_path_f').val('../wishes/embed/');$('#featured_file_form').submit()" disabled>
              <input id="inputID_f" type="text" name="inputID">
              <input id="dir_path_f" type="text" name="dir_path">
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--status modal dialog-->
    <div class="modal fade" id="status" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body" style="align: left"><img id="loader" src="src/loader.gif" width="160px" style="display: block; margin: 0 auto "></div>
          <div class="modal-footer" hidden><a class="btn btn-primary" id="ok" data-dismiss="modal" onclick="if(errorR){$('#name').focus(); else window.location='index.php';}">Ok</a></div>
        </div>
      </div>
    </div><script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/pg-wish.js"></script>
  </body>
</html>