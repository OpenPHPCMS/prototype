<section class="topbar">
	<div class="right">Welcome, <?PHP echo empty($_SESSION['user_username']) ? 'name' : $_SESSION['user_username']." <a href='".base_url('admin/logout.php')."'>logout</a>" ?></div>
</section>