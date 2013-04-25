<section class="sidebar">
	<a href='<?PHP echo base_url('admin') ?>'><img id='logo' src='images/logo_small.png' alt='logo' /></a>
	
	<ul id='menu'>
		<?PHP if(secure()->hasUserAccess(__ROLE_ADMIN)): ?>
			<a href='<?PHP echo base_url('admin/settings.php') ?>'><li><img class='icon' src='images/icons/settings.png' alt='' />		<span>Settings</span>	</li></a>
		<?PHP endif; 
		if(secure()->hasUserAccess(__ROLE_USER)): ?>
			<a href='<?PHP echo base_url('admin/pages.php') ?>'><li><img class='icon' src='images/icons/pages.png' alt='' />		<span>Pages</span>		</li></a>
		<?PHP endif; 
		if(secure()->hasUserAccess(__ROLE_DEV)): ?>
			<a href='<?PHP echo base_url('admin/menu.php') ?>'><li><img class='icon' src='images/icons/menu.png' alt='' />			<span>Menu</span>		</li></a>
		<?PHP endif; 
		if(secure()->hasUserAccess(__ROLE_USER)): ?>
			<a href='#'><li><img class='icon' src='images/icons/images.png' alt='' />		<span>Images</span>		</li></a>
		<?PHP endif; 
		if(secure()->hasUserAccess(__ROLE_ADMIN)): ?>
			<a href='#'><li><img class='icon' src='images/icons/component.png' alt='' />	<span>Components</span>	</li></a>
		<?PHP endif; 
		if(secure()->hasUserAccess(__ROLE_ADMIN)): ?>
			<a href='<?PHP echo base_url('admin/users.php') ?>'><li><img class='icon' src='images/icons/users.png' alt='' />		<span>Users</span>		</li></a>
		<?PHP endif; 
		if(secure()->hasUserAccess(__ROLE_DEV)): ?>
			<a href='#'><li><img class='icon' src='images/icons/template.png' alt='' />		<span>Templates</span>	</li></a>
		<?PHP endif; ?>
	</ul>
</section>