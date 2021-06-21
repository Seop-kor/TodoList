<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="icon" href="/todo/img/favicon.ico" type="image/x-icon">
  <!-- Google Font Roboto, Noto Sans -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Plugin CSS link -->
  <link rel="stylesheet" href="/todo/lib/css/lightslider.css">
  <link rel="stylesheet" href="/todo/lib/css/piechart.css">
  <!-- Reset CSS Link -->
  <link rel="stylesheet" href="/todo/css/reset.css">
  <!-- Main CSS LINK -->
  <link rel="stylesheet" href="/todo/css/style.css">
  <link rel="stylesheet" href="/todo/css/animation.css">
  <!-- Animation CSS Link -->
  <link rel="stylesheet" href="/todo/css/media.css">
  <title>TODO Process</title>
</head>
<body>
  <div class="mobile-wrap">
    <div class="auth">
      <form action="/todo/php/sp_auth.php" method="post" name="auth_form" id="auth-form">
        <label for="authpass">
          <p>인증키 입력 : </p>
        </label>
        <input type="password" id="authpass" name="auth">
        <button type="button">입력</button>
      </form>
    </div>
  </div>
  <script>
    document.querySelector("#authpass").addEventListener('keydown', function(e){
      if(e.key === "Enter"){
        e.preventDefault();
        if(!document.querySelector("#authpass").value){
          alert("비밀번호를 입력해주세요.");
          document.querySelector("#authpass").focus();
          return;
        }
        document.auth_form.submit();
      }
    });
    document.querySelector("#auth-form button").addEventListener("click", function(){
      if(!document.querySelector("#authpass").value){
        alert("비밀번호를 입력해주세요.");
        document.querySelector("#authpass").focus();
        return;
      }
      document.auth_form.submit();
    });
  </script>
</body>
</html>