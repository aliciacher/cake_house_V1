<?php
session_start();
require_once('../../connection/database.php');
if(isset($_POST['MM_update']) && $_POST['MM_update'] == "UPDATE"){
  $sql= "UPDATE news SET published_date =:published_date,
            title = :title,
            content = :content,
            updatedDate = :updatedDate WHERE newsID=:newsID";
  $sth = $db ->prepare($sql);

  $sth ->bindParam(":published_date", $_POST['published_date'], PDO::PARAM_STR);
  $sth ->bindParam(":title", $_POST['title'], PDO::PARAM_STR);
  $sth ->bindParam(":content", $_POST['content'], PDO::PARAM_STR);
  $sth ->bindParam(":updatedDate", $_POST['updatedDate'], PDO::PARAM_STR);
  $sth ->bindParam(":newsID", $_POST['newsID'], PDO::PARAM_INT);
  $sth -> execute();

  echo "<script>alert('更新成功!');</script>";
}
$sth = $db->query("SELECT * FROM member WHERE account='".$_SESSION['account']."'");

$member = $sth->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<!-- Website ../template by freewebsite../templates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cake House-會員資料修改</title>
	<?php require_once("../template/files2.php"); ?>
</head>
<body>
	<div id="page">
		<?php require_once("../template/header2.php"); ?>
		<div id="body" class="contact">
			<div class="header">
				<div>
					<h1>會員專區</h1>
				</div>
			</div>
			<div class="body">

			</div>
			<div class="footer">
				<ul class="Category">
					<li><a href="member_edit.php">會員資料修改</a></li>
					<li><a href="my_cart.php">我的購物車</a></li>
					<li><a href="my_orders.php">我的訂單</a></li>
				</ul>
				<div id="MemberForm">
					<h1>會員資料修改</h1>
					<form action="member_edit.php" method="post">
						<input type="hidden" name="MM_update" value="UPDATE">

						<table>
								<tr>
									<th>帳號：</th>
									<td><?php echo $member['account']; ?></td>
								</tr>
								<tr>
									<th>姓名：</th>
									<td>
										<input type="text" name="name" value="Andy">
										<div class="help-block with-errors"></div>
									</td>
								</tr>
								<tr>
									<th>性別：</th>
									<td>

										<input type="radio" name="gender" value="0" checked="<?php if($member['gender'] == 0) echo 'true'; ?>"> 男
										<input type="radio" name="gender" value="1" checked="<?php if($member['gender'] == 1) echo 'true'; ?>"> 女
									</td>
								</tr>
								<tr>
									<th>生日：</th>
									<td><input type="text" name="birthday" value="<?php echo $member['birthday']; ?>"></td>
								</tr>
								<tr>
									<th>聯絡電話：</th>
									<td><input type="text" name="phone" value="<?php echo $member['phone']; ?>"></td>
								</tr>
								<tr>
									<th>行動電話：</th>
									<td><input type="text" name="mobilePhone" value="<?php echo $member['mobilePhone']; ?>" ></td>
								</tr>
								<tr>
									<th>地址：</th>
									<td><input type="text" name="address"><?php echo $member['address']; ?></td>
								</tr>
								<tr>
									<td colspan="2" align="center">

										<input type="submit" value="更新資料" id="submit" >
									</td>
								</tr>
						</table>
					</form>

				</div>

			</div>
		</div>
		<?php require_once("../template/footer.php"); ?>
	</div>
</body>
</html>
