<section id="table-section">
  <div class="new-update">
    <div class="new-update-title">
      <p>Recent Update</p>
      <a href="#">More</a>
    </div>
    <ul class="update-details">
      <?php
      include $_SERVER['DOCUMENT_ROOT'] . "/connect/connect.php";
      $sql = "select * from tp_table order by TP_idx desc limit 5";
      $result = mysqli_query($dbcon, $sql);
      if (mysqli_num_rows($result) == 0) {
      ?>
        <li>
          <p>입력된 일정이 없습니다.</p>
        </li>
        <?php
      } else {
        while ($row = mysqli_fetch_array($result)) {
          $idx = $row['TP_idx'];
          $categori = $row['TP_categori'];
          $title = $row['TP_title'];
          $content = $row['TP_content'];
          $reg = $row['TP_reg'];
        ?>
          <li>
            <i class="fa fa-<?= $categori ?>"></i>
            <div class="detail-text">
              <p><a href="#"><?= $title ?></a></p>
              <em><?= $reg ?></em>
            </div>
          </li>
      <?php
        }
      }
      ?>
    </ul>
  </div>
  <div class="each-contents">
    <div class="each-btns">
      <a href="?categori=database" class="active">Database</a>
      <a href="?categori=thermometer-half">API</a>
      <a href="?categori=clone">Renewal</a>
      <a href="?categori=bar-chart-o">Planning</a>
    </div>
    <ul class="update-details">
      <?php
      include $_SERVER['DOCUMENT_ROOT']."/connect/connect.php";
      $categoriSel = "database";
      if(array_key_exists("categori", $_GET)){
        $categoriSel = $_GET['categori'];
      }else{
        $categoriSel = "database";
      }

      $sql = "select * from tp_table where TP_categori='$categoriSel' order by TP_idx desc";
      $reslutdb = mysqli_query($dbcon, $sql);
      if(mysqli_num_rows($reslutdb) == 0){
      ?>
      <li><p>입력된 일정이 없습니다.</p></li>
      <?php
      } else {
        while($row = mysqli_fetch_array($reslutdb)){
          $idx = $row['TP_idx'];
          $categori = $row['TP_categori'];
          $title = $row['TP_title'];
          $content = $row['TP_content'];
          $reg = $row['TP_reg'];
      ?>
      <li>
        <i class="fa fa-<?= $categori ?>"></i>
        <div class="detail-text">
          <p><a href="#"><?= $title ?></a></p>
          <em><?= $reg ?></em>
        </div>
      </li>
      <?php
        }
      }
      ?>
    </ul>
  </div>
</section>