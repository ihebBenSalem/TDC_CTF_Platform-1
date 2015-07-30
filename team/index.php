
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "../menu_p.php"; ?>
<link rel="stylesheet" type="text/css" href="/ctf2/bootstrap/css/AdminLTE.css">
</head>
<body>
<style type="text/css">

body
{

	margin-top: 90px;
		  background-color: #ecf0f5;

}
</style>
<body>
<center>
<h2 class="featurette-heading">Teams <span class="text-muted">Board</span></h2>
</center><br>

<div class="row">
            <div class="col-xs-12">
							<div ng-app="scoreboard" ng-controller="score">

              <div class="box box-info">
               
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                     <th>#</th>
<th>Team name</th>
<th>Players name</th>
<th>University/community</th>
                    </tr>

  <tr ng-repeat="x in names">
<td>{{$index +1}}</td>
<td>{{x.team}}</td>
<td>{{x.player1}}-{{x.player2}}-{{x.player3}}</td>
<td>{{x.fac}}</td>
</tr>
                  </table>
                </div><!-- /.box-body -->
				</div>
              </div><!-- /.box -->
            </div>
          </div>
  


</body>
</html>



<script type="text/javascript" src="angulaire.min.js"></script>



<script>
var app = angular.module('scoreboard', []);
app.controller('score', function($scope, $http) {
   $http.get("data.php")
   .success(function (response) {$scope.names = response.records;

   });
});
</script>





