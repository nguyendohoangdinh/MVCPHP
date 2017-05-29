<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NEOLAB TRAINING</title>
	<link rel="stylesheet" type="text/css" href="site/frontend/css/style.css">
</head>
<body>
	<div class="container">
		<div id="header">
			<h1 class="header" style="color: red; ">NEOLAB VIETNAM</h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.php?c=home&a=index">Trang Chủ</a></li>
				<li><a href="index.php?c=user&a=login">Đăng nhập</a></li>
				<li><a href="index.php?c=user&a=signup">Đăng ký</a></li>
			</ul>
		</div>
		<div id="content">

			<div id="content1">
			<?php
				if (isset($path)) {
					require('application/views/frontend/'.$path.".php");
				}
				if (isset($path2)) {
					require('application/views/backend/'.$path2.".php");
				}
				if(isset($message)){
						echo "<h3>$message</h3>";
				}
			?>
			</div>
			<div id="content2">
			<?php
				if (isset($pathx)) {
					require('application/views/frontend/'.$pathx.'.php');
				}
			?>	
			</div>
		</div>
		<div id="footer">
			<h1>Training MVC PHP By Nguyen Viet Vu</h1>
		</div>
	</div>
</body>
</html>