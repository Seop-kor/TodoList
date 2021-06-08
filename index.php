<!DOCTYPE html>
<html lang="en">
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

  <script defer>
    const hostname = window.location.hostname;
    //여기서 나눠줌. 예를 들어.
    //hostname이 어디어디이면 거기에 get파라미터를 더 붙여서 보낸다거나 그런 느낌으로
  </script>
</head>
<body>
  <div class="wrapper">
    <!-- Main Dash Board Frame -->
    <div class="dashboard">
      <!-- Navigation Section 
      <nav id="gnb">
        <h2><a href="#"><i class="logo-font">&#1330;</i></a></h2>
        <ul>
          <li><a href="#"><i class="fa fa-trello"></i></a></li>
          <li><a href="/todo/pages/sp_insert.php"><i class="fa fa-pencil"></i></a></li>
          <li><a href="#"><i class="fa fa-search"></i></a></li>
        </ul>
        <a href="#" class="sign-out"><i class="fa fa-sign-out"></i></a>
        <div class="mobile-menu">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>
      -->
      <?php
      include $_SERVER['DOCUMENT_ROOT']."/todo/include/navigation.php";
      ?>
      <!-- Graph Section Area -->
      <section id="graph-section">
        <div class="intro">
          <div class="slide-box database">
            <h2>Database Project Process</h2>
            <p>데이터베이스 테이블 설계 완료. <br>테이블 UI 디자인 완료</p>
            <a href="#">More Details</a>
            <i class="fa fa-database"></i>
          </div>
          <div class="slide-box api">
            <h2>Database Project Process</h2>
            <p>API 테이블 설계 완료. <br>테이블 UI 디자인 완료</p>
            <a href="#">More Details</a>
            <i class="fa fa-database"></i>
          </div>
          <div class="slide-box renewal">
            <h2>Database Project Process</h2>
            <p>리뉴얼 테이블 설계 완료. <br>테이블 UI 디자인 완료</p>
            <a href="#">More Details</a>
            <i class="fa fa-database"></i>            
          </div>
          <div class="slide-box gigi">
            <h2>Database Project Process</h2>
            <p>기획 테이블 설계 완료. <br>테이블 UI 디자인 완료</p>
            <a href="#">More Details</a>
            <i class="fa fa-database"></i>            
          </div>
        </div>
        <div class="each-pofol">
          <div>
            <div class="each-title">
              <h3>Each Portfolio Process Rate</h3>
            </div>
            <div class="each-graph">
              <div class="db">
                <span class="chart" data-percent="75">
                  <span class="percent"></span>
                </span>
                <b>DB Project</b>
                <i class="fa fa-database"></i>
              </div>
              <div class="api">
                <span class="chart" data-percent="60">
                  <span class="percent"></span>
                </span>
                <b>API Project</b>
                <i class="fa fa-thermometer-half"></i>
              </div>
              <div class="renewal">
                <span class="chart" data-percent="46">
                  <span class="percent"></span>
                </span>
                <b>Renewal Project</b>
                <i class="fa fa-clone"></i>
              </div>
              <div class="planning">
                <span class="chart" data-percent="89">
                  <span class="percent"></span>
                </span>
                <b>Planning Project</b>
                <i class="fa fa-bar-chart-o"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- total-pofol frame -->
        <?php
        include $_SERVER['DOCUMENT_ROOT']."/todo/include/total_pofol.php";
        ?>
      </section>
      <!-- Table Section Area -->
      <?php
      include $_SERVER['DOCUMENT_ROOT']."/todo/include/table_section.php";
      ?>
    </div>
  </div>
  <script src="/todo/lib/js/easypiechart.js"></script>
  <!-- Jquery Framework Load -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Plugins Load -->
  <script src="/todo/lib/js/lightslider.min.js"></script>
  <!-- Main JS Load -->
  <script src="/todo/js/main.js"></script>
  <script src="/todo/js/main_jquery.js"></script>
</body>
</html>