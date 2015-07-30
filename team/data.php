<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("127.0.0.1", "root", "root", "ctf");

$result = $conn->query("select * from teams order by id ");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"team":"'  . $rs["team_name"] . '",';
    $outp .= '"player1":"'   . $rs["player1"]        . '",';
    $outp .= '"player2":"'   . $rs["player2"]        . '",';
    $outp .= '"player3":"'   . $rs["player3"]        . '",';
    $outp .= '"fac":"'. $rs["fac"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?> 


