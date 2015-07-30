<style type="text/css">
#topmenu
{
  background-color:#34495e;
   align-items: center;
    color: #fff;
    display: flex;
    font-size: 12px;
    font-weight: 700;
    height: 54px;
    justify-content: center;
    line-height: 15px;
    padding: 10px 14px;
    width: 100%;
    margin-bottom: 20px;
}
#home
{
  color:#ecf0f1 ;


}
#em{
position: relative;
top: 50px;
}

#pas{
  position: relative;
  top: 70px;
  margin-bottom: 40px;
}
</style>
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/AdminLTE.css">
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/AdminLTE.min.css">




<?php

include "connect.php";

$t=mysql_query("select * from teams");
$nb=mysql_num_rows($t);
//include("config.php");
$tk="Team name";
session_start();
$mypassword="hello";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from form 
if (!empty($_POST['username']) && !empty($_POST['password'])) {
  # code...
  $myusername=addslashes($_POST['username']); 
$mypassword=addslashes($_POST['password']); 

}


$sql="SELECT id FROM users WHERE login='$myusername' and password='$mypassword' ;";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$active=$row['active'];

$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{

$_SESSION['login_user']=$myusername;
echo "true success";
header("location:/ctf2/login/welcome.php");
session_register("myusername");
}
else 
{
$tk="invalide username";
}
}




?>

<div id="myhome"></div>
<!--Navigation bar !-->
<div class="navbar navbar-default navbar-fixed-top" id="topmenu">
<div class="container">
<div class="navbar-header">

<a class="navbar-brand" href="/ctf2" id="home"><span class="glyphicon glyphicon-flag">TDC_CTF</span></a>
<button class="navbar-toggle" data-target="#navbar-main" data-toggle="collapse" type="button">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<!-- this platform developped by iheb ben salem@IbsSoft !-->
</button>
</div>
<div id="navbar-main" class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li ><a href="#myhome" id="home">Home</a></li>
<li><a href="/ctf2/team" id="home">Team <span class="badge text-success"><?php echo $nb;   ?></span></a></li>
<li><a href="/ctf2/score" id="home">Score</a></li>
<li><a href="#author" id="home">Author</a></li>
<li><a href="#rules" id="home">Rules</a></li>
</ul>
<form class="navbar-form navbar-right" role="search" id="contact-form" method="POST">
<div class="form-group">
<input class="form-control" type="text" placeholder="<?php echo $tk; ?>" id="c_team" name="username" >
<input class="form-control" type="password" placeholder="Password" name="password">
</div>
<button class="btn btn-success wow fadeInUp" type="" >Login</button>

</form>
</div>
</div>
</div>

