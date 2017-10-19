<?php
require_once("../connection/database.php");
$sth = $db->query("SELECT * FROM news WHERE newsID=".$_GET['newsID']);
$news = $sth->fetch(PDO::FETCH_ASSOC);
$sth2 = $db->query("SELECT * FROM news ORDER BY published_date DESC");
$latest_news = $sth2->fetch(PDO::FETCH_ASSOC);
 ?>
<!doctype html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>news - Cake House</title>
	<?php require_once("template/files.php"); ?>
</head>
<body>
	<div id="page">
		<?php require_once("template/header.php"); ?>
		<div id="body">
			<div class="header">
				<div>
					<h1>最新消息</h1>
				</div>
			</div>
			<div class="news">
				<div class="featured">

					<h1><?php echo $news['title']; ?></h1>
					<span><?php echo $news['published_date']; ?></span>
					<p><?php echo $news['content']; ?></p>

					<a href="news_list.php" class="load">返回列表</a>
				</div>
				<div class="sidebar">
					<h1>最新一則</h1>

					<h2><?php echo $latest_news['title']; ?></h2>
					<span><?php echo $latest_news['published_date']; ?></span>
					<p><?php echo mb_substr($latest_news['content'],0,50,'utf-8'); ?></p>
					<a href="news.php?newsID=<?php echo $latest_news['newsID']; ?>" class="more">Read More</a>
				</div>
			</div>
		</div>
		<?php require_once("template/footer.php"); ?>
	</div>
</body>
</html>
