<?php
require_once('database.php');
$sth = $db->query("SELECT * FROM news");
$all_news = $sth->fetchAll(PDO::FETCH_ASSOC);
echo $all_news[1]['title'];
 ?>
