<!DOCTYPE html>
<html lang="ko">

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
      <!-- Graph Section Area -->
      <section id="graph-section" class="detail-section">
        <!-- total-pofol frame -->
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/todo/include/total_pofol.php";
        ?>
        <div class="each-pofol">
          <div>
            <!-- <div class="each-title">
              <h3>Each Portfolio Process Rate</h3>
            </div> -->
            <div class="each-graph">
            </div>
          </div>
        </div>
        <div class="detail-board">
          <div class="board-btns">
            <button type="button" class="active" data-categori="All">All</button>
            <button type="button" data-categori="DB Project">Database</button>
            <button type="button" data-categori="API Project">API</button>
            <button type="button" data-categori="Renewal Project">Renewal</button>
            <button type="button" data-categori="Planning Project">Planning</button>
          </div>
          <div class="board-table">
            <ul>
              <li class="board-title">
                <span>번호</span>
                <span>분류</span>
                <span>제목</span>
                <span>등록일</span>
                <span>삭제</span>
              </li>
              <?php
              include $_SERVER['DOCUMENT_ROOT'] . "/connect/connect.php";
              $sql = "select * from tp_table order by TP_idx desc limit 5";
              $result = mysqli_query($dbcon, $sql);
              if(mysqli_num_rows($result) == 0){
              ?>
              <li>
                <p>입력된 정보가 없습니다.</p>
              </li>
              <?php
              }else{
                while($row = mysqli_fetch_array($result)){
                  $idx = $row['TP_idx'];
                  $categori = $row['TP_categori'];
                  $title = $row['TP_title'];
                  $content = $row['TP_content'];
                  $reg = $row['TP_reg'];
                  switch($categori){
                    case "database":
                      $categori = "DB Project";
                      break;
                    case "thermometer-half":
                      $categori = "API Project";
                      break;
                    case "clone":
                      $categori = "Renewal Project";
                      break;
                    case "bar-chart-o":
                      $categori = "Planning Project";
                      break;
                  }
              ?>
              <li class="board-contents">
                <span><?=$idx?></span>
                <span><?=$categori?></span>
                <span><a href="#"><?=$title?></a></span>
                <span><?=$reg?></span>
                <span><a href="/todo/php/sp_delete_detail.php?idx=<?=$idx?>">삭제</a></span>
              </li>
              <?php
                }
              }
              ?>
            </ul>
          </div>
        </div>
      </section>
    </div>
  </div>
  <script src="/todo/lib/js/easypiechart.js"></script>
  <!-- Jquery Framework Load -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Plugins Load -->
  <script src="/todo/lib/js/lightslider.min.js"></script>
  <!-- Main JS Load -->
  <script src="/todo/js/main.js"></script>
  <!-- <script src="/todo/js/insert_form.js"></script> -->
  <script src="/todo/js/main_jquery.js"></script>
</body>

</html>