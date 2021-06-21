<?php
include $_SERVER['DOCUMENT_ROOT']."/connect/connect.php";
$idx = $_GET['num'];
$title = addslashes($_POST['title']);
$content = nl2br($_POST['content']);
$content = addslashes($content);

$sql = "update tp_table set TP_title='$title', TP_content='$content' where TP_idx=$idx";

mysqli_query($dbcon,$sql);

echo "<script>
        alert('변경이 완료 되었습니다.');
        location.href='/todo/pages/sp_detail_view.php?num=$idx';
      </script>"
?>