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
  $text = "";
  while ($row = mysqli_fetch_array($reslutdb)) {
    $idx = $row['TP_idx'];
    $categori = $row['TP_categori'];
    $title = $row['TP_title'];
    $content = $row['TP_content'];
    $reg = $row['TP_reg'];

    $text = $text."<li>
                <i class='fa fa-$categori'></i>
                <div class='detail-text'>
                  <p><a href='#'>$title</a></p>
                  <em>$reg</em>
                </div>
              </li>";
  }
  echo $text;
}
?>
