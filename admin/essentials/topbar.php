<section class="topbar">
	<?php if(!empty($_SESSION['user_username'])): ?>
	<div class="right">Welcome, <?PHP echo $_SESSION['user_name'] .' '. $_SESSION['user_surname'] ?> <a class="buttonsmall bluebut" href='"<?php echo base_url('admin/logout.php') ?>"'>Log out</a></div>
	<?php endif; ?>
</section>