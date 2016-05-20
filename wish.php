<!DOCTYPE html>
<!--This website is made just for fun :p
Fabricated by: Ahmad Ali Abdilah
For anyone who are interested for the source code, soon I will release it, so don't worry
and for Anusha, HAPPY BIRTHDAY :D :D
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE= edge">
    <meta name="viewport" content="width-device-width, initial-scale-1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Anusha ka Birthday!</title>
  </head>
  <body>
    <div class="container">
      <h1 class="logo">Birthday</h1>
      <hr>
      <div class="container col-md-6">
        <h3>Write your wish to <u><b><?php $xml=simplexml_load_file("config.xml"); echo $xml->birthday_name;?></b></u></h3><br>
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
  </body>
</html>