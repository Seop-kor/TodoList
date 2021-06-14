<?php
include $_SERVER['DOCUMENT_ROOT'] . "/connect/connect.php";
$categoriSel = "database";
if (array_key_exists("categori", $_GET)) {
  $categoriSel = $_GET['categori'];
} else {
  $categoriSel = "database";
}

$sql = "select * from tp_table where TP_categori='$categoriSel' order by TP_idx desc";
$reslutdb = mysqli_query($dbcon, $sql);
if (mysqli_num_rows($reslutdb) == 0) {
  echo "<li><p>입력된 일정이 없습니다.</p></li>";
} else {
  $arr = array();
  while ($row = mysqli_fetch_array($reslutdb)) {
    array_push($arr, array(
      "tp_idx" => $row['TP_idx'],
      "tp_categori" => $row['TP_categori'],
      "tp_title" => $row['TP_title'],
      "tp_content" => $row['TP_content'],
      "tp_reg" => $row['TP_reg']
    ));
  }
  echo json_encode($arr, JSON_UNESCAPED_UNICODE);
  // file_put_contents($_SERVER['DOCUMENT_ROOT']."/todo/data/tp_table.json", json_encode($arr, JSON_UNESCAPED_UNICODE));
}
?>
