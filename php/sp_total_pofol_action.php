<?php
include $_SERVER['DOCUMENT_ROOT']."/connect/connect.php";

$db_rate = $_POST['db_pro'];
$api_rate = $_POST['api_pro'];
$renewal_rate = $_POST['renewal_pro'];
$planning_rate = $_POST['planning_pro'];

$sql = "update tp_rate set RATE_db=$db_rate, RATE_api=$api_rate, RATE_renewal=$renewal_rate, RATE_planning=$planning_rate where RATE_idx=1";

mysqli_query($dbcon, $sql);
echo "<script>
  alert('변경 되었습니다.');
  location.href='/todo/index.php';
  </script>";
?>