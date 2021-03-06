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
            <a href="?" href=".board-table">All</a>
            <a href="?categori=database">Database</a>
            <a href="?categori=thermometer-half">API</a>
            <a href="?categori=clone">Renewal</a>
            <a href="?categori=bar-chart-o">Planning</a>
          </div>

          <!-- Board-Table Start -->
          <div class="board-table">
            <ul>
              <li class="board-title">
                <span>??????</span>
                <span>??????</span>
                <span>??????</span>
                <span>?????????</span>
                <span>??????</span>
              </li>
              <?php
                $categoriSel = "";
                $sql = "select * from tp_table order by TP_idx desc";
                if (array_key_exists("categori", $_GET)) {
                  $categoriSel = $_GET['categori'];
                  $sql = "select * from tp_table where TP_categori='$categoriSel' order by TP_idx desc";
                }
                include $_SERVER['DOCUMENT_ROOT'].'/todo/include/tabs/categori.php';
              ?>
            </ul>
          </div>
          <!-- Board-Table End -->
          <div class="board-footer-btns">
              <!-- <form action="#" class="search-box" name="serch_box">
                <select name="" id="">
                  <option value="">?????????</option>
                  <option value="">??????</option>
                </select>
                <input type="text">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form> -->
              <button type="button" class="more-btn">?????????</button>
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
    $(function(){
      $(".more-btn").show();
      $(".board-contents").hide();
      $(".board-contents").slice(0,5).show();

      $(".more-btn").click(function(){
        $(".board-contents:hidden").slice(0,5).show();
        if($(".board-contents:hidden").length <= 0){
          $(this).hide();
        }
      });
    });
  </script>
  <script>
    const pathName = window.location.href;
    const tabBtns = document.querySelectorAll('.board-btns a');
    const tabElements = [null,'database', 'thermometer-half', 'clone', 'bar-chart-o'];

    for(let i = 0; i < tabBtns.length; i++){
      tabBtns[i].classList.remove('active');
      if(pathName.includes(tabElements[i])){
        tabBtns[i].classList.add('active');
      }
    }
  </script>
</body>

</html>