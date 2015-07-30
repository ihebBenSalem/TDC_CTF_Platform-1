<!DOCTYPE html>
<html>
<header>
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/AdminLTE.css">
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/bootstrap.min.css">



<?php  
include_once "../main_menu.php";
 ?>
</header>




<body>
<center><h2 class="featurette-heading" id="to">Score <span class="text-muted">Board</span></h2></center>
<br><br><div class="content-wrapper">
	<?php        
include "../config.php";

?>

</div>






<div class="col-xs-12">
              <div class="box box-danger">
     
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                     	<th>#</th>
<th>Team name</th>
<th>Task</th>
<th>Score</th>
                    </tr>
<?php        

$ch=mysql_query("select team_name,score,task from score,teams where teams.id=score.id_score order by score DESC ,time ASC ");
$i=0;
while ($data=mysql_fetch_assoc($ch)) {
	$i=$i+1;
	if($data['score']>=1000)
	{
		$color="warning";
	}
	else if($data['score']>=100)
	{
$color="info";
	}
	else
	{
		$color="danger";
	}
?>
<tr class="<?php echo "$color";   ?>" id="to">
<td><?php  echo $i ; if($i==1){echo '  <span class="glyphicon glyphicon-tower" aria-hidden="true"></span>';}?></td>
<td><?php echo $data['team_name'];  ?></td>
<td><?php echo $data['task'];  ?></td>
<td><?php echo $data['score'] ; ?></td>
<?php } ; ?>
</tr>




           
              
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
</body>

</html>

<SCRIPT TYPE="text/javascript">
setTimeout(function b() {location.reload();}, 4000);


</SCRIPT>

</body>
