<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/connect/connect.php";
  $auth = $_POST['auth'];
  // $pass = password_hash($auth, PASSWORD_BCRYPT);
  // echo $pass;
  $sql = "select * from auth";
  $result = mysqli_query($dbcon,$sql);
  while($row = mysqli_fetch_array($result)){
    // echo $row['auth'];
    if(password_verify($auth, $row['auth'])){
      $_SESSION['auth'] = $auth;
      header("Location: /todo/index.php");
    }else{
      echo "<script>
        alert('비밀번호가 틀렸습니다.');
        window.location.href='/todo/pages/sp_auth_form.php';
      </script>";
    }
  }
?>

