<?php
// Соединяемся, выбираем базу данных
$link = mysql_connect('localhost', 'bdfbl', 'bdfb2')
    or die('Не удалось соединиться: ' . mysql_error());
mysql_select_db('bdfb') or die('Не удалось выбрать базу данных');
?>