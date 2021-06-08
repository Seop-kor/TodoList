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
      <!-- <a href="?categori=database" class="active" data-categori="database">Database</a>
      <a href="?categori=thermometer-half" data-categori="thermometer-half">API</a>
      <a href="?categori=clone" data-categori="clone">Renewal</a>
      <a href="?categori=bar-chart-o" data-categori="bar-chart-o">Planning</a> -->
      <button type="button" class="active" data-categori="database">Database</button>
      <button type="button" data-categori="thermometer-half">API</button>
      <button type="button" data-categori="clone">Renewal</button>
      <button type="button" data-categori="bar-chart-o">Planning</button>
    </div>
    <ul class="update-details">
      
    </ul>
  </div>
</section>