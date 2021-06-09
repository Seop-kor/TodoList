<?php

use function PHPSTORM_META\type;

$url = $_SERVER['DOCUMENT_ROOT']."/todo/data/tp_rate.json";

  $jsonString = file_get_contents($url);
  echo $jsonString;
?>