<?php
$userinfo = new UserInfo();
$row = $userinfo->GetInfo($_SESSION['username']);
?>
<div class="sidebar">
	<p class="title">ادارة حسابي</p>
	<div class="sidebar-content">
		<ul>
			<a href="myaccount.php"><li>تعديل البيانات</li></a>
			<?php
				if ($row['GroupID'] == '1') {
					echo '<a href="?page=products"><li>حسابي التجاري</li></a>';
				}
			?>
		</ul>
	</div>
</div>