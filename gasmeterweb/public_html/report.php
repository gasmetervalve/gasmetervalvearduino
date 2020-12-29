<?php
$lever = $_POST['gasreading'];
$unlock = $_POST['pass'];

$fp = fopen('level.txt', 'w');
fwrite($fp, $lever);
fclose($fp);

echo "uploaded";

?>
