<?PHP if(!empty($error)): ?>
<div class='error'>
	<div class="messageicon">
		<img class='icon' src='images/icons/error.png' alt='' />
	</div>
	<div class="messagetext">
		<?PHP echo $error; ?>
	</div>
</div>
<?PHP endif; ?>