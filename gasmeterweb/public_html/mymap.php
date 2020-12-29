<?php
if($_POST['gasreadlevel'] != ""){
$level = $_POST['gasreadlevel'];
$temp = $_POST['templevel'];
$fp = fopen('leveltemp.txt', 'w');
fwrite($fp, $temp);
fclose($fp);
$fp = fopen('levelgas.txt', 'w');
fwrite($fp, $level);
fclose($fp);
}



?>
