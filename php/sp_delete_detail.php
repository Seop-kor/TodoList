<?php
include $_SERVER['DOCUMENT_ROOT']."/connect/connect.php";
$idx = $_GET['idx'];
$sql = "delete from tp_table where TP_idx=$idx";
mysqli_query($dbcon, $sql);
echo "<script>
  alert('삭제 되었습니다.');
  location.href='/todo/pages/sp_detail_form.php';
  </script>";
?>