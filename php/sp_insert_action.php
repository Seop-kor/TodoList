<?php
  include $_SERVER['DOCUMENT_ROOT']."/connect/connect.php";

  $title = addslashes($_POST['schedule_input_title']);
  $content = addslashes($_POST['schedule_input_content']);
  $categori = $_POST['schedule_input_categori'];
  $reg = date('y-m-d');

  $sql = "insert into tp_table(TP_categori, TP_title, TP_content, TP_reg) values ('$categori', '$title', '$content', '$reg')";

  mysqli_query($dbcon,$sql);
?>