  <link rel="stylesheet" href="/ctf2/bootstrap/css/bootstrap.min.css">
  <script src="/ctf2/bootstrap/js/jQuery.min.js"></script>
  <script src="/ctf2/bootstrap/js/bootstrap.min.js"></script>
<?php
include "../lock.php";
require_once "../../config.php";
$type_challange="reverse";
$msg="";
$color="";
$btn_color="primary";

$get_id_req=mysql_query("select * from teams where team_name='$login_session';");
$get_id_team=mysql_fetch_array($get_id_req);
$id_team=$get_id_team['id'];



$ch=mysql_query("select * from task where type='$type_challange'");
$ch2=mysql_query("select * from relation");


if (isset($_POST['action']) && !empty($_POST['t1'])) {
	# code...
$task_name2=addslashes($_POST['action']);

$datatext=secure_data($_POST['t1']);
$datatext_addsplash=addslashes($datatext);
$value=md5($datatext);

$req=mysql_query("select * from task where task_name='$task_name2'");
$data=mysql_fetch_array($req);
$bonus=$data['bonus'];

$req2=mysql_query(" select * from teams where id='$id_team'");
$data2=mysql_fetch_array($req2);
$somme_task=$data2['task'];


$somme_task=$task_name2." ".$somme_task;







$req=mysql_query(" select * from task where task_name='$task_name2'");
$data_task=mysql_fetch_row($req);

if ($data_task[4]==$value) {
	# code...
	$msg="Congratulation ! You Got it ";
	$color="info";
  if(mysql_num_rows(mysql_query("select * from relation where task='$task_name2' and id_users='$id_team'"))==0)
  {
  mysql_query("insert into relation(task,type_task,id_users) values ('$task_name2','$type_challange','$id_team')");
$req2=mysql_query(" UPDATE `score` SET score=score+$bonus where id_score='$id_team'"); 
$req3=mysql_query(" UPDATE `teams` SET task='$somme_task' where id='$id_team'"); 
$req6=mysql_query(" INSERT INTO relation(`id_users`, `task`,'type_task') VALUES ('$id_team', '$task_name2','$type_challange');"); 

$timeo=date('H:i:s');
$reqtime=mysql_query(" UPDATE `score` SET time='$timeo' where id_score='$id_team'"); 



}

}
else
{
	$msg="No flag for you !!";
	$color="danger";
}







}


function secure_data($input_data) {
  return htmlentities(stripslashes($input_data), ENT_QUOTES);
}


?>

<style type="text/css">

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
	.bs-example{
   
    }
</style>

<html>
<body>
<?php  
include_once "../../main_menu.php";
 ?>


<div class="row" >

<div >
                        <div class="col-md-6 pull-right">
   <?php  include "../menu2.php";  ?>
     </div> 

</div>  
</div>
          <div class="row" id="em">
   <center>

          <div class="col-md-12">
            <div class="col-md-3"></div>
<div class="col-md-6">
          <?php echo '<div class="alert alert-'.$color.'">'.$msg.'</div>' ?>
</div><br><br>

        </div>
        </center>
<?php
while ($data=mysql_fetch_array($ch)) {
	# code...
	$task=$data['task_name'];
	$score=$data['bonus'];
	$body_ch=$data['body_ch'];
	$location=$data['location'];
	$hint=$data['hint'];
	
	$k=mysql_query("select * from relation where task='$task' and id_users='$id_team' ");
	$lk=mysql_fetch_array($k);
	if ($lk['task']==$task) {
		# code...
		$btn_color="success";
	}
	else
	{
		$btn_color="primary";
	}
        echo '
          	<div class="col-md-3">

          		<div class="box box-'.$btn_color.'">
	
  <div class="box-header with-border">
    <h3 class="box-title">'.$task.'</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary"></span>
            <span class="label label-success">'.$score.'</span>
  <a href="#" class="bs-example" data-toggle="popover" title="H1nt" data-content="'.$hint.'"> Hint</a> 
 
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body"><h4>'.$body_ch.'</h4>

 <form role="form-control" method="POST">
<div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-'.$btn_color.'" name="action" type="submit" type="submit" value="'.$task.'">Submit</button>
      </span>
      <input type="text" class="form-control" placeholder="Enter password" name="t1">
    </div><!-- /input-group -->
</form>

  </div><!-- /.box-body -->
 
</div><!-- /.box -->
          	</div>
          ';
      }
      ?>
      </div>


</body>
</html>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(
	{
		placement:'top'
	}
	);   
});
</script>
