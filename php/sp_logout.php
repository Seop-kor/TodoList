<?php
session_start();
session_destroy();
echo "<script>
  alert('로그아웃 완료!');
  window.location.href='/todo/index.php';
</script>"
?>