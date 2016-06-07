<?php
$servername = mysqli_real_escape_string($conn, $_POST["servername"]);
$username = mysqli_real_escape_string($conn, $_POST["username"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);
$dbname  = mysqli_real_escape_string($conn, $_POST["dbname"]);

//creating database
try {
    $conn = new PDO("mysql:host=$servername;dbname=birthday", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE $dbname";
    // use exec() because no results are returned
    $conn->exec($sql);

    configFileCreate($serverame,$username,$password);

    echo "Database created successfully<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;

function configFileCreate($serverame,$username,$password){
  //creating XML config file
  $domtree = new DOMDocument('1.0', 'UTF-8');

  /* create the root element of the xml tree */
  $configRoot = $domtree->createElement("config");
  /* append it to the document created */
  $configRoot = $domtree->appendChild($configRoot);

  $system_conf = $domtree->createElement("system_conf");
  $system_conf = $configRoot->appendChild($system_conf);

  $system_conf->appendChild($domtree->createElement('server_name',$servername));
  $system_conf->appendChild($domtree->createElement('db_user',$username));
  $system_conf->appendChild($domtree->createElement('db_password',$password));
  $system_conf->appendChild($domtree->createElement('db_name',$dbname));
  $system_conf->appendChild($domtree->createElement('time_zone',''));
  $system_conf->appendChild($domtree->createElement('theme_name',''));
  $system_conf->appendChild($domtree->createElement('page_title',''));

  $configRoot->appendChild($domtree->createElement('admin_name',''));
  $configRoot->appendChild($domtree->createElement('admin_picture',''));
  $configRoot->appendChild($domtree->createElement('birthday_name',''));
  $configRoot->appendChild($domtree->createElement('birthday_sex',''));
  $configRoot->appendChild($domtree->createElement('active_time',''));
  $configRoot->appendChild($domtree->createElement('accept_all_wishes',''));

  $domtree->save("config.xml");
}

?>
