<?php $path="functionalities/"; $page="users"; include("functionalities/functions.php");?><!DOCTYPE html>
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
    <title>User Management</title>
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
          <h3>New User</h3>
          <div class="form-group col-md-4" style="padding: 0">
            <form method="post" action="functionalities/process_add-user.php">
              <label for="uName">Username:</label>
              <input class="form-control" id="uName" type="text" name="uName"><br>
              <label for="level">Level of User</label><br>
              <select class="form-control" id="level" name="level">
                <option>Super Admin</option>
                <option>Wish Manager</option>
                <option>Picture Collector</option>
              </select><br>
              <label for="pWord">Password</label><br>
              <input class="form-control" id="pWord" type="password" name="pWord"><br>
              <label for="rePWord">Retype Password</label><br>
              <input class="form-control" id="rePWord" type="password" name="rePWord"><br>
              <button class="btn btn-default" type="reset">Clear</button>
              <button class="btn btn-primary" type="submit">Make New User</button>
            </form>
          </div>
          <div class="container col-md-8">
            <table class="table table-hover displays datatables" id="usr-datatable">
              <thead>
                <tr>
                  <th></th>
                  <th>
                    <center>USERNAME</center>
                  </th>
                  <th>
                    <center>LEVEL</center>
                  </th>
                  <th>
                    <center>LAST LOGIN</center>
                  </th>
                </tr>
              </thead>
              <tbody><?php $result=mysqli_query($conn,"SELECT username,level,last_login FROM user_tbl"); while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                <tr>
                  <td align="center">
                    <input type="checkbox">
                  </td>
                  <td align="left"><?=$row['username']?></td>
                  <td align="left"><?=$row['level']?></td>
                  <td align="left"><?=$row['last_login']?></td>
                </tr><?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div><script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <script src="js/pg-users.js"></script>
  </body>
</html>