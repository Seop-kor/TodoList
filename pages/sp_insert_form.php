<!DOCTYPE html>
<html lang="ko">
<?php
session_start();
if(isset($_SESSION['auth'])){
  $auth = $_SESSION['auth'];
}else{
  header("Location: http://localhost/todo/pages/sp_auth_form.php");
}
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link rel="shortcut icon" href="/todo/img/favicon.ico" type="image/x-icon">
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
  <div class="wrapper">
    <!-- Main Dash Board Frame -->
    <div class="dashboard">
      <?php
      include $_SERVER['DOCUMENT_ROOT'] . "/todo/include/navigation.php";
      ?>

      <section id="graph-section">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/todo/include/total_pofol.php";
        ?>
        <div class="input-box">
          <div class="title-box">
            <h3>Today's Schedule</h3>
          </div>
          <form action="/todo/php/sp_insert_action.php" method="post" name="schedule_input_form">
            <div class="title-input">
              <input type="text" placeholder="일정 요약을 입력하세요." name="schedule_input_title">
              <select name="schedule_input_categori">
                <option value="database">DB Project</option>
                <option value="thermometer-half">API Project</option>
                <option value="clone">Renewal Project</option>
                <option value="bar-chart-o">Planning Project</option>
              </select>
            </div>
            <div class="content-input">
              <textarea name="schedule_input_content" cols="30" rows="10" placeholder="상세 일정을 입력해주세요."></textarea>
            </div>
          </form>
          <div class="buttons-input">
            <button type="button" onclick="tpInsert();">입력</button>
            <button type="button">취소</button>
          </div>
        </div>
      </section>
      <?php
      include $_SERVER['DOCUMENT_ROOT'] . "/todo/include/table_section.php";
      ?>
    </div>
  </div>

  <script src="/todo/lib/js/easypiechart.js"></script>
  <!-- Jquery Framework Load -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Plugins Load -->
  <script src="/todo/lib/js/lightslider.min.js"></script>
  <!-- Main JS Load -->
  <!-- <script src="/todo/js/main.js"></script> -->
  <script src="/todo/js/insert_form.js"></script>
  <script src="/todo/js/main_jquery.js"></script>
  <script>
    function tpInsert(){
      if(!document.schedule_input_form.schedule_input_title.value){
        document.schedule_input_form.schedule_input_title.focus();
        alert("일정 요약을 입력해주세요.");
        return;
      }
      if(!document.schedule_input_form.schedule_input_categori.value){
        document.schedule_input_form.schedule_input_categori.focus();
        alert("카테고리를 선택해주세요.");
        return;
      }
      if(!document.schedule_input_form.schedule_input_content.value){
        document.schedule_input_form.schedule_input_content.focus();
        alert("상세 일정을 입력해주세요.");
        return;
      }
      document.schedule_input_form.submit();
    }
  </script>
</body>

</html>