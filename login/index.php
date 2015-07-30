<?php
require_once "style.php";
require_once "connect.php";
$type_challange="web";
$msg="";
$color="";
$btn_color="primary";
$ch=mysql_query("select * from task where type='$type_challange'");
$ch2=mysql_query("select * from relative");
if (isset($_POST['action']) && !empty($_POST['t1'])) {
	# code...
$task_name2=$_POST['action'];
$value=$_POST['t1'];

$req=mysql_query(" select * from task where task_name='$task_name2'");
$data_task=mysql_fetch_row($req);

if ($data_task[4]==$value) {
	# code...
	$msg="congrudalation !! you Got it !!";
	$color="info";
	if(mysql_num_rows(mysql_query("select * from relative where task='$task_name2'"))==0)
	{
	mysql_query("insert into relative(task,task_type) values ('$task_name2','$type_challange')");
}
}
else
{
	$msg="No flag for you !!";
	$color="danger";
}









}

?>



    <nav role="navigation" class="navbar navbar-default">

        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">

            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">

                <span class="sr-only">Toggle navigation</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

            </button>

            <a href="#" class="navbar-brand">Brand</a>

        </div>

        <!-- Collection of nav links and other content for toggling -->

        <div id="navbarCollapse" class="collapse navbar-collapse">

            <ul class="nav navbar-nav">

                <li class="active"><a href="#">Home</a></li>

                <li><a href="#">Profile</a></li>

                <li><a href="#">Messages</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li><a href="#">Login</a></li>

            </ul>

        </div>

    </nav>

<ol class="breadcrumb">
            <li class="active">web</li>
            <li><a href="/ctf/reverse.php"><i class="fa fa-dashboard"></i>Reverse</a></li>
            <li><a href="#">Trivia</a></li>
         
          </ol>
          <center>
          <div class="col-md-12">
          <?php echo '<div class="alert alert-'.$color.'">'.$msg.'</div>' ?>
        </div>
        </center>
          <div class="row">
<?php

while ($data=mysql_fetch_array($ch)) {
	# code...
	$task=$data['task_name'];
	$score=$data['score'];
	$k=mysql_query("select * from relative where task='$task'");
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
      <span class="label label-primary">'.$score.'</span>
            <span class="label label-success">100</span>

    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
  the challange is about the hidden stuff on youtube
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