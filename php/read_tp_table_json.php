<?php
  $url = $_SERVER['DOCUMENT_ROOT']."/todo/data/tp_table.json";
  $jsonString = "";
  if(file_exists($url)){
    $jsonString = file_get_contents($url);
  }else{
    $jsonString = null;
  }
  echo $jsonString;
?>