<?php
if (!isset($path)) $path="";
include($path."db_init.php");
session_start();

//List of functions that can be invoked in any page

//for checking is th admin logged in
function isLoggedIn(){
  global $_SESSION;
  if (isset($_SESSION["user_name"]) && isset($_SESSION["level"]))
    return $_SESSION["level"];
  else
    return false;
}

//for activating menus in admin panel if admin is logged in
function passURL($URL,$valid="Super Admin",$negative="disabled"){
  $level=isLoggedIn();
  if ($level=='Super Admin' || $level==$valid)
    return "href=\"".$URL."\"";
  else
    return $negative;
}

function getPronoun(){
  if ($config->sex == 'Male')
    return "him";
  return "hers";
}

function getPossession(){
  if ($config->sex == 'Male')
    return "his";
  return "her";
}

function incPageViews(){
  global $config;
  $page_views=$config->page_views;
  $page_views++;
  $config->page_views=$page_views;
}

function getPageViews(){
  global $config;
  return $config->page_views;
}

function getWishesCount(){
  global $conn;
  $sql="select s_no from wish_tbl";
  $result=mysqli_query($conn, $sql);
  return mysqli_num_rows($result);
}

function getStatusRule()
{
  global $config;
  if ($config->accept_all_wishes=='yes') return '1';
  return '0';
}

function generateSalt(){
  $intermediateSalt=md5(uniqid(rand(),true));
  $salt=substr($intermediateSalt,0,6);
  return $salt;
}

//function for login
function loginAdmin($uName, $pWord, $pWord){
  global $conn;
  $sql="SELECT salt FROM user_tbl WHERE username='$uName'";
  $result=mysqli_query($conn, $sql);
  if (mysqli_num_rows($result)!=1) die("The login details provided incorrect");
  $row=mysqli_fetch_array($result);
  $salt=$row['salt'];
  $saltedPassword=hash("sha512",$pWord.$salt);
  $sql="SELECT username,level FROM user_tbl WHERE username='$uName' and password='$saltedPassword'";
  $result=mysqli_query($conn, $sql);

  if (mysqli_num_rows($result)==1){
    $row=mysqli_fetch_array($result);
    $id=$row['username'];
    $currDate=date("Y-m-d H:i:s");
    mysqli_query($conn, "UPDATE user_tbl SET last_login='$currDate' WHERE username='$id'") or die("Can not access the user");

    $_SESSION["user_name"] = $row['username'];
    $_SESSION["level"] = $row['level'];
    if ($_SESSION["level"]=='Super Admin'){
      header('Location: ../admin.php');
    }
    else if ($_SESSION["level"]=="Wish Manager"){
      header('Location: ../admin_wishes.php');
    }
    else if ($_SESSION["level"]=="Picture Collector"){
      header('Location: ../admin_album.php');
    }
  }
  else {
    echo "The login details provided are incorrect ";
  }
}

function addUser($uName, $pWord,$level){
  global $conn;
  $salt=generateSalt();
  $saltedPassword=hash("sha512",$pWord.$salt);

  $result=mysqli_query($conn, "SELECT * FROM user_tbl WHERE username='$uName'");
  if (mysqli_num_rows($result)==0){
    mysqli_query($conn, "INSERT INTO user_tbl(username,password,salt,level) VALUES('$uName','$saltedPassword','$salt','$level')") or die("En erorr occurs while trying to add the user");
    echo "The user has been created";
    header("Refresh:2; URL=../admin_users.php");
  }
  else {
    echo "The user is already exist";
    header("Refresh:2; URL=../admin_users.php");
  }
}

function getSelectedPictures($start, $until){
  global $conn;
  $result=mysqli_query($conn, "SELECT s_no,link FROM picture_tbl order by rand()");
  return $result;
}

function getConfigDOM(){
  global $path;
  $dom=new DOMDocument();
  return $dom->load($path.'config.xml');
}

function saveDBDetails($servername, $username, $password, $dbname){
  $dom=getConfigDOM();
  $root=$dom->documentElement;
  $sys=$root->system_conf;

  $sys->server_name=$servername;
  $sys->db_user=$username;
  $sys->db_password=$password;
  $sys->db_name=$dbname;

  $dom->saveXML();

}

function saveConfigDetails($timezone,$theme_name,$page_title,$admin_name,$admin_pic,$birthday_name,$sex, $active_time,$accept_all_wishes){
  $dom=getConfigDOM();
  $root=$dom->documentElement;

  $sys=$root->system_conf;
  $sys->time_zone=$timezone;
  $sys->theme_name=$theme_name;
  $sys->page_title=$page_title;

  $root->admin_name=$admin_name;
  $root->admin_pic=$admin_pic;
  $root->birthday_name=$birthday_name;
  $root->birthday_sex=$sex;
  $root->active_time=$active_time;
  $root->admin_name=$accept_all_wishes;
  $root->page_views="0";

  $dom->saveXML();

}


function getPictures($path=''){
  global $conn;
  $sql="select s_no,link from picture_tbl";
  $result=mysqli_query($conn, $sql);
  if (mysqli_num_rows($result)==0) echo "No pictures in the database";
  else{
    $count=0;
    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $count++?>
      <div class="col-sm-2">
        <label for="picture_check_<?php echo $row['s_no'];?>" class="pointer">
          <img src="<?php echo $row['link']; ?>" alt="" class="img-thumbnail pictures">
        </label>
        <input type="checkbox" id="picture_check_<?php echo $row['s_no'];?>" name="pictures[]">
  		</div>
<?php
    }
  }
}

function getWishes(){
  global $conn;
  $sql="SELECT * FROM wish_tbl";
  $result=mysqli_query($conn, $sql);
  return $result;
}
?>
