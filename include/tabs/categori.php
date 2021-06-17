<?php
  include $_SERVER['DOCUMENT_ROOT'] . "/connect/connect.php";

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
    <span class="board-btn">
      <a href="/todo/php/sp_delete_detail.php?idx=<?=$idx?>" class="del-btn txt">삭제</a>
      <i class="fa fa-close del-btn icon"></i>
    </span>
  </li>
  <?php
    }
  }
?>