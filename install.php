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
    <meta name="viewport" content="width-device-width, initial-scale-1"><link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
    <title>User Management</title>
  </head>
  <body>
    <div class="row" id="tbl-main">
      <div id="cell-main">
        <h1 class="logo visible-lg visible-md">Birthday</h1>
        <hr class="visible-lg visible-md">
        <div class="row">
          <h3>Installation</h3>
          <div class="container">
            <div class="form-group">
              <!--form for providing information about the MySql Database installed-->
              <form method="post" role="form">
                <label for="servername">MySql Servername:</label>
                <input class="form-control" id="servername" type="text" name="servername"><br>
                <label for="username">MySql Username:</label>
                <input class="form-control" id="username" type="text" name="username"><br>
                <label for="password">MySql Password:</label>
                <input class="form-control" id="password" type="password" name="password"><br>
                <label for="dbname">Database Name for This Application:</label>
                <input class="form-control" id="dbname" type="text" name="dbname" value="birthday"><br>
                <button class="btn btn-primary" type="submit">Continue</button>
              </form>
            </div>
            <div class="form-group">
              <!--form for providing other details-->
              <form method="post" role="form">
                <label for="admin_name">Admin Name:</label>
                <input class="form-control" id="admin_name" type="text" name="admin_name"><br>
                <label>Admin Picture:</label>
                <label class="btn btn-default" for="admin_pic">Upload...</label><br><br>
                <label for="birthday_name">Name of The person Having Birthday:</label>
                <input class="form-control" id="birthday_name" type="text" name="birthday_name"><br>
                <div class="radio">
                  <label>
                    <input id="male_radio" type="radio" name="sex_radio"> Male
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input id="female_radio" type="radio" name="sex_radio"> Female
                  </label>
                </div><br>
                <label for="active_time">Active Time of The Page (dd/mm/yyyy):</label>
                <input class="form-control" id="active_time" type="text" name="active_time"><br>
                <label class="checkbox-inline">
                  <input id="accept_wishes" type="checkbox" name="accept_wishes">Accept All Wishes
                </label><br><br>
                <button class="btn btn-primary" type="submit">Continue</button>
              </form>
              <form method="post" hidden>
                <input id="featured-pic" type="file" name="admin_pic">
              </form>
            </div>
            <div class="form-group">
              <!--form for creatig the account for the admin-->
              <form method="post">
                <label for="uName">Admin Username:</label>
                <input class="form-control" id="uName" type="text" name="uName"><br>
                <label for="pWord">Admin Password:</label>
                <input class="form-control" id="pWord" type="password" name="pWord"><br>
                <label for="rePWord">Retype Password:</label>
                <input class="form-control" id="rePWord" type="password" name="rePWord"><br>
                <button class="btn btn-primary" type="submit">Finish</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
  </body>
</html>