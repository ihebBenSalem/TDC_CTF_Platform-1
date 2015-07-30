<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/AdminLTE.css">
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/AdminLTE.min.css">




<?php
include "../menu.php";
include "../alert_page.php";
include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from form 

$myusername=addslashes($_POST['username']); 
$mypassword=addslashes($_POST['password']); 


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
header("location:welcome.php");
session_register("myusername");
}
else 
{
$error="Your Login Name or Password is invalid";
$col="danger";
}
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Page</title>

</head>
<body>

<div align="center">
<div style="width:650px;" align="left">
<div align="center" style="padding:20px;"><h2>Wellcome</h2>
</div>


<div style="margin:30px">

<form method="POST" role="form">

<div class="form-group has-success">
<label>Team name</label><input type="text" class="form-control" placeholder="Team name" name="username">
</div>


<div class="form-group has-error">
<label>Password</label><input type="password" class="form-control" id="pass" placeholder="Password" name="password">
</div>
<button class="btn btn-success" type="submit">Login</button>

</form>
<center>
<div style="margin-top:10px"><?php alert($error,$col); ?></div>
</center>
</div>
</div>
</div>

</body>
</html>















