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
          <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/connect/connect.php";
            $idx = $_GET['num'];
            $sql = "select * from tp_table where TP_idx=$idx";
            $result = mysqli_query($dbcon, $sql);
            $row = mysqli_fetch_array($result);
            $idx = $row['TP_idx'];
            $categori = $row['TP_categori'];
            $title = $row['TP_title'];
            $content = nl2br($row['TP_content']);
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
          <form action="/todo/php/sp_detail_view_action.php?num=<?=$idx?>" method="post" name="detailViewForm">
          <div class="detail-title">
            <h2><?=$title?></h2>
            <input type="text" value="<?=$title?>" class="hidden-title" name="title">
          </div>
          <!-- Board-Table Start -->
          <div class="board-table detail-view">
            <ul>
              <li class="board-title">
                <span>번호</span>
                <span>분류</span>
                <span>내용</span>
                <span>등록일</span>
              </li>
              <li class="board-contents">
                <span><?=$idx?></span>
                <span><?=$categori?></span>
                <span>
                  <em><?=$content?></em>
                  <textarea class="hidden-content" name="content"><?=$content?></textarea>
                </span>
                <span><?=$reg?></span>
              </li>
            </ul>
          </div>
          <div class="send-update">
            <button type="submit">수정 입력</button>
          </div>
          </form>
          <div class="detail-btns">
            <button type="button" class="update-btn">수정</button>
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
  <script>
    $(".detail-btns .update-btn").on('click', function(){
      $(this).toggleClass("modi");
      if($(this).hasClass("modi")){
        $(this).text("수정 취소");
        $(".hidden-title").prev().css("display", "none");
        $(".hidden-title").css("display", "block");
        $(".hidden-content").prev().css("display", "none");
        $(".hidden-content").css("display", "block");
        $(".send-update").css("display", "flex");
      }else{
        $(this).text("수정");
        $(".hidden-title").prev().css("display", "block");
        $(".hidden-title").css("display", "none");
        $(".hidden-content").prev().css("display", "block");
        $(".hidden-content").css("display", "none");
        $(".send-update").css("display", "none");
      }
    });
  </script>
</body>
</html>