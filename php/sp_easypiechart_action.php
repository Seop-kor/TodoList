<?php
include $_SERVER['DOCUMENT_ROOT']."/connect/connect.php";

$sql = "select * from tp_rate";
$result = mysqli_query($dbcon,$sql);
$arr = array();
while($row = mysqli_fetch_array($result)){
  $db_rate = $row['RATE_db'];
  $api_rate = $row['RATE_api'];
  $renew_rate = $row['RATE_renewal'];
  $plan_rate = $row['RATE_planning'];
  array_push($arr, array(
    'db_rate' => $db_rate,
    'api_rate' => $api_rate,
    'renew_rate' => $renew_rate,
    'plan_rate' => $plan_rate
  ));
}
// echo json_encode($arr);
file_put_contents($_SERVER['DOCUMENT_ROOT'].'/todo/data/tp_rate.json', json_encode($arr));
?>