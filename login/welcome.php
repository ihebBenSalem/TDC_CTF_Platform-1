<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/AdminLTE.css">
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/AdminLTE.min.css">



<?php
include "../alert_page.php";
include "lock.php";

$get_id_req=mysql_query("select * from teams where team_name='$login_session';");
$get_id_team=mysql_fetch_array($get_id_req);
$id_team=$get_id_team['id'];

$t = array ();
$cc=mysql_num_rows(mysql_query("select * from task"));

$task_to_array=mysql_query("select * from task ;");
$i=0;
while($task_data=mysql_fetch_array($task_to_array))
{
	$i=$i+1;
	$t[$i]=$task_data['task_name'];
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Challange page</title>
</head>
<?php  
include_once "main_menu.php";
 ?>











<header class="page-title">
            <div class="container">
                <h1 id="title">Team</h1>
            </div>
        </header>


<div id="main-content">
        <div class="container">

  <div class="row">
<div class="col-md-6">

<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Team:<strong> <?php echo $login_session  ?></strong></h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label"><i class="fa fa-info-circle"></i></span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
<div style="height: 200px; overflow: auto;">
     <p>Your Team Passphrase is <strong><?php echo $login_session  ?></strong>.</p>
      <p>Members:</p>
      <ul>
        <?php
$ireq=mysql_query("select * from teams where team_name='$login_session' ");
while ($idata=mysql_fetch_array($ireq))
{

echo '<li>'.$idata['player1'].'</li>';
echo '<li>'.$idata['player2'].'</li>';
echo '<li>'.$idata['player3'].'</li>';
}
$ich=mysql_query("SELECT * FROM score,teams WHERE score.id_score=teams.id and team_name='$login_session'");
$iscore=mysql_fetch_array($ich);

        ?>
          
        
      </ul>
        
            <p>You may have to solve more then 4 problem</p>
            <p>New team members can join at any time.</p>
  </div><!-- /.box-body -->
 
</div><!-- /.box -->

</div>
</div>

    <div class="col-md-6">
      


<div class="box box-solid box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Achievment</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
<strong>Score: <?php echo $iscore['score'];  ?></strong><br>
      <strong>Rank: <?php  $range=mysql_query("select * from score order by score DESC" ); 

$jk=0;

while ($bb=mysql_fetch_array($range)) {
    # code...
    if ($bb['id_score']==$id_team) {
        # code...
echo $jk+1;
break;
    }
    $jk=$jk+1;
}

       ?></strong>
  </div><!-- /.box-body -->
</div><!-- /.box -->
    </div>
  </div>


</div>





</div>






</div>









<!-- this platform developped by iheb ben salem@IbsSoft !-->

</body>
</html>
