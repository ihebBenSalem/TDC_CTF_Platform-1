<head>
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/AdminLTE.css">
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/AdminLTE.min.css">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>





<html>


<body>
<?php
include_once "menu_p.php";
include "connect.php";
include "alert_page.php";

$v1=0;$v2=0;$v3=0;$v4=0;
if (!empty($_POST['team'])) {
$team=addslashes($_POST['team']);
$email=addslashes($_POST['email']);
$v1=1;
}
if(!empty($_POST['p1']) && !empty($_POST['p2']) && !empty($_POST['p3'])  )
{
$p1=addslashes($_POST['p1']);
$p2=addslashes($_POST['p2']);
$p3=addslashes($_POST['p3']);
$v2=1;
}
if (!empty($_POST['fac'])) 
{
$fac=addslashes($_POST['fac']);
$v3=1;
}
if (!empty($_POST['pass'])) {
$pass=addslashes($_POST['pass']);
$v4=1;
}
$s=$v1+$v2+$v3+$v4;

if ($s==4) {

if(serach($team)==1)
{
$error="Team name aleardy exist";
 	$col="warning";
}
else
{
$req="INSERT INTO teams(`team_name`, `player1`, `player2`, `player3`, `fac`, `email`) VALUES ('$team', '$p1', '$p2', '$p3', '$fac','$email');";

$rep=mysql_query($req);

$chp=mysql_query("select * from teams where team_name='$team' ;");

while ($data1=mysql_fetch_assoc($chp)) {
	$ss=$data1['id'];
}

mysql_query("INSERT INTO score(id_score,score) VALUES ('$ss','0')");




$req_login=" INSERT INTO users(id,`login`, `password`) VALUES ('$ss','$team', '$pass');";

mysql_query($req_login);



if (mysql_affected_rows()) {
 	$error="You can now sign In and play !!";
 	$col="success";
 }

}
}
else
{
$error="empty field";
 	$col="danger";
}

function serach($M)
{
	$ch="SELECT team_name FROM `teams` WHERE team_name='$M'";
	$re=mysql_query($ch);
	if (mysql_num_rows($re)==1) {
		return 1;
	}
	else
	{
		return 0;
	}
	
	return 0;
}



?>

<!--Jumbotron !-->
<style type="text/css">
body
{
background-color:#FFFFFF;
}
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

#our
{
background-color:#FFFFFF;
margin-bottom: 150px;
}
</style>
<div class="jumbotron" id="jumb">
<div id="banner" class="page-header">
<div class="row" align="center">
<h1>Tunisian Developers Community</h1>
<h3>Wellcome to TDC CTF 2015</h3>
<p class="lead" id="dato">16 august,Ghazela</p>
<button class="btn btn-info btn-lg">Learn more</button>
<a href="#reg"> <button class="btn btn-primary btn-lg" type="submit">SignUp  </button> </a>

</div>
</div>
</div>
</div>
<!--End jambotron !-->
<style type="text/css">
#sec{
    padding-top: 50px;
}
#h2p{
    padding-left: 20px;
}
</style>
<!--block what about !-->
<div class="row featurette">
<div class="col-md-7">
<h2 class="featurette-heading" id="h2p">
what is CTF ?

<span class="text-muted"> what is TDC ?!!</span>
</h2>

<h3 id="h2p">
<p>
  
Capture the Flag (CTF) is a special kind of information security competitions. There are three common types of CTFs: Jeopardy, Attack-Defence and mixed.
</p>
 </h3>
</div>
<div class="col-md-4">

</div>
</div>
<!--End what about !-->
<style type="text/css">
#sec{
    padding-top: 50px;
}
</style>

<div class="section" id="sec">

    <div class="container">           
        <div class="row front-page-thumbnails" style="margin-top:45px">
          <div class="col-xs-6 col-md-3">
            <div class="thumbnail">
              <div class="circle-img-box">
                <img class="frontpage-thumbnail"  src="image/lock-fix-white.svg" alt="...">
              </div>
              <div class="caption">
                <h3>HACK</h3>
                <p>Hack, decrypt, reverse, and do whatever it takes to solve increasingly challenging security puzzles.</p>
              </div>
            </div>
          </div>
          <div class="col-xs-6 col-md-3">
            <div class="thumbnail">
              <div class="circle-img-box">
                <img class="frontpage-thumbnail" id="frontpage-thumbnail-book" src="image/book-white.svg" alt="...">
              </div>
              <div class="caption">
                <h3>LEARN</h3>
                <p>Learn by doing! </p>
              </div>
            </div>
          </div>
          <div class="col-xs-6 col-md-3">
            <div class="thumbnail">
              <div class="circle-img-box">
                <img class="frontpage-thumbnail" id="frontpage-thumbnail-trophy" src="image/trophy-white.svg" alt="...">
              </div>
              <div class="caption">
                <h3>WIN</h3>
                <p>No price until now.</p>
              </div>
            </div>
          </div>        
          <div class="col-xs-6 col-md-3">
            <div class="thumbnail">
              <div class="circle-img-box">
                <img class="frontpage-thumbnail" id="frontpage-thumbnail-teacher" src="image/teacher-white.svg" alt="...">
              </div>
              <div class="caption">
                <h3>TEACH</h3>
                <p>Learn each others</p>                
              </div>
            </div>
          </div>        
        </div> 
    </div>
</div>










<style type="text/css">
#well{
padding-bottom: 40px

}
</style>


  <div id="rules"></div>


<div class="row" id="well"></div>



<!--End Rules !-->
<div class="col-lg-12">
  
<h2>Rules</h2>
<div class="box box-warning">

<div class="alert" id="alert1">
<p>
<b>Players will need to create an account in order to participate in the challenge</b>
<a class="alert-link" href="#">Click here</a>
</p>
</div>
</div>
</div>


<div class="col-lg-4">
<div class="box box-info">
<div class="alert " id="alert2">
<p>
Attacking machines other than designated TDC machines is prohibited.
</p>
</div>
</div>
</div>

<div class="col-lg-4">
<div class="box box-danger">
<div class="alert alert-danger " id="alert3">
<p>
<b>Sharing keys or solutions is prohibited. This action is subject to disqualification.</b>
</p>
</div>
</div>
</div>

<div class="col-lg-4">
<div class="box box-info">
<div class="alert " id="alert4">
<p>
If you think you have the valid key that the system rejects, contact us <a class="alert-link" href="#">Click here</a>
</p>
</div>
</div>
</div>



<div class="col-lg-4">
<div class="box box-info">
<div class="alert " id="alert5">
<p>
There is no limit in the number of people participating per team.
Also, you only need one registration per team.
</p>
</div>
</div>
</div>

<div class="col-lg-4">
<div class="box box-info">
<div class="alert " id="alert6">
<p>
The problems cover various fields such as vulnerability, web, cryptography and reversing
</p>
</div>
</div>
</div>



<div class="col-lg-4">
<div class="box box-info">
<div class="alert" id="alert7">
<p>
Don't be a <b>jerk</b>, eg. preventing other people from having fun.</p>
</div>
</div>
</div>

<center>
<style type="text/css">
  #myimage
  {
  height: 700px;
  width: 2000px;
  }

</style>


<img src="image/c.jpg" id="myimage">
<h2><span2>Expect the Unexpected</span2></h2>


<style>
h2 span2 { 
   color: white; 
   font: bold 24px/45px Helvetica, Sans-Serif; 
   letter-spacing: -1px;  
   background: rgb(0, 0, 0); /* fallback color */
   background: rgba(0, 0, 0, 0.7);
   padding: 10px; 
   position:relative;
   top:-420;
   font-size:70px;;
}
</style>

</div>
</center>
<!--End Rules !-->



<!-- author !-->
<!-- <hr class="featurette-divider">
<div class="row" class="pfblock">
<img src="image/c.jpg">
</div>
!-->


  <div id="author"></div>

<!-- Authors presentation !-->
<style>

#pad{
    padding-left: 20px;
    padding-top: 35px;
    padding-bottom: 20px;
}

</style>
<h2 id="pad">Authors</h2>
      <!-- Begin page content -->
      <div class="container">
        <div class="row col-md-12">         
                <div class="col-md-6">
                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">List of Authors</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-danger"></span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        <li>
                          <img src="image/iheb.jpg" alt="User Image"/>
                          <a class="users-list-name" href="#">Iheb ben salem</a>
                          <span class="users-list-date">CEO of TDC</span>
                        </li>
                          <li>
                          <img src="image/iheb.jpg" alt="User Image"/>
                          <a class="users-list-name" href="#">Iheb ben salem</a>
                          <span class="users-list-date">CEO of TDC</span>
                        </li>
                          <li>
                          <img src="image/iheb.jpg" alt="User Image"/>
                          <a class="users-list-name" href="#">Iheb ben salem</a>
                          <span class="users-list-date">CEO of TDC</span>
                        </li>
                     
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
<button class="btn btn-success">Follow us</button>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
                </div><!-- /.col -->   
<div class="col-md-6">
<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">What authors say about TDC</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="image/iheb.jpg" alt="Product Image"/>
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">iheb ben salem<span class="label label-warning pull-right"></span></a>
                        <span class="product-description">
                         We believe in technology ,stay hungry stay spoolish
                        </span>
                      </div>
                 
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript::;" class="uppercase">More comment</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->

</div>
                  

                  </div><!--/col12 -->









                  
                </div><!-- /container -->
 
           
        </div>
      </div>
      <hr>
    </div>

    <div>
      <div class="col-md-12" id="our">
<center>
<h2 class="featurette-heading">Our Team do his best to boosts <span class="text-muted">Your SKILLS !!</span></h2>
<p>
Have fun and do your best
    </p>

</center>
     
      </div>










<style type="text/css">

#reg
{
padding-top: 100px;
}



</style>

<!-- login !-->
  <div id="reg"></div>

<div id="registration" id="rg">
            <div class="row">
    <div class="col-md-12"><center><?php alert($error,$col) ?></center>
    <p class="lead" id="h2p">
        Improve your skills, <strong>Join us !! TDC 2015</strong>!
    </p>
    <p id="h2p">
        <strong>Registration required</strong>.
        This year, rather than having a single team account shared by 
everyone, each participant needs to create an individual account and 
then either create a team or join an existing one.
    </p>    
</div>

</div>
<div class="row" id="sec">
    <div class="col-md-12">
        <form class="form-horizontal" id="user-registration-form" method="POST" action="#reg">                	
            <div id="registration-user-page">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="col-sm-4 control-label" for="team">Team name</label>
                        <div class="col-sm-8">
                            <input class="form-control" required="" name="team"  placeholder="Team name" type="text">
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="col-sm-4 control-label" for="email">email</label>
                        <div class="col-sm-8">
                            <input class="form-control" required="" name="email" id="lastname" placeholder="Email" type="email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="col-sm-4 control-label" for="email">Contestent 1</label>
                        <div class="col-sm-8 controls registration-controls">
                            <input name="p1" required="" placeholder="Contestent 1" class="form-control" type="text">
                        </div>
                    </div> 
                     <div class="col-md-6 form-group">
                        <label class="col-sm-4 control-label" for="lastname">University/community</label>
                        <div class="col-sm-8">
                            <input class="form-control" required="" name="fac"  placeholder="Fac/Institut" type="text">
                        </div>
                    </div>                           
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="col-sm-4 control-label" for="username">Contestent 2</label>
                        <div class="col-sm-8">
                            <input class="form-control" required="" name="p2" id="username" placeholder="Username" type="text">
                        </div>
                    </div>
 					<div class="col-md-6 form-group">
                        <label class="col-sm-4 control-label" >Password</label>
                        <div class="col-sm-8">
                            <input class="form-control" required="insert password" name="pass" placeholder="Password" type="password">
                        </div>
                    </div>



                    <div class="col-md-6 form-group">
                        <label class="col-sm-4 control-label" for="password">Contestent 3</label>
                        <div class="col-sm-8">
                            <input class="form-control" required="" name="p3" id="password" placeholder="Contestent 3" type="text">
                        </div>
                    </div>
                </div>
                <center>
                <div class="row"  align="center">
                    

                     <button class="btn btn-primary" type="submit" > Create New Team</button>
                   
                    </center>
                    </div>

                </div>
                   
        </form>
    </div>
</div>
<SCRIPT TYPE="text/javascript">

function kk(){
    Document.reload();
}

</SCRIPT>

        </div>
    </div>
</div>

        </div>
        
<style type="text/css">
#bfoot
{
  margin-top: 100px;
}
</style>

       
    <footer class="main-footer" id="bfoot">
        <div class="pull-right hidden-xs">
          <b>plat-form developped by</b> iheb ben salem
        </div>
        <strong>Copyright &copy; 2015-2016 <a href="https://www.youtube.com/channel/UC5POEY6B9rFIjospf7k2RMQ">Iheb ben salem</a>.</strong> All rights reserved.
      </footer>
    </div>


</body>

<!-- ##############################################################################"" !-->

<!-- CDN JQuery !-->
<script src="bootstrap/js/jQuery.min.js"></script>
<!-- ##############################################################################"" !-->


<!-- my js file !-->
<script src="bootstrap/js/custom.js"></script>
</html>

<SCRIPT TYPE="text/javascript">
/*setTimeout(function b() {
location.reload();}, 2000);
*/
</SCRIPT>
