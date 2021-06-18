<nav id="navbar">
	<ul id="nav-links">
		<?php
		if (!isset($_SESSION['username'])) {
			echo '<li><a href="login.php">تسجيل الدخول</a></li>';
		} else {
			echo '<li><a href="logout.php">تسجيل خروج</a></li>';
			echo '<li><a href="myaccount.php">حسابي</a></li>';
		}
		?>
		<li><a href="shoppingcart.php">عربة التسوق</a></li>
		<li><a href="shop.php">تسوق</a></li>
		<li><a href="index.php" class="main">الصفحة الرئيسية</a></li>
	</ul>
	<div id="nav-icon">
		<div class="line1"></div>
		<div class="line2"></div>
		<div class="line3"></div>
	</div>
	<h2 id="title"><a href="index.php"><?php echo $websiteName ?></a></h2>
</nav>