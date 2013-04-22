<?PHP if(!empty($loginError)): ?>
<div class='error'>
	<div class="messageicon">
		<img class='icon' src='images/icons/error.png' alt='' />
	</div>
	<div class="messagetext">
		<?PHP echo $loginError; ?>
	</div>
</div>
<?PHP endif; ?>

<form action="login.php" method="post">
	<fieldset>
		<span class="formtitle">Login</span>
		
		<input type="hidden" name="login_token" value="<?PHP echo $_SESSION['login_token']; ?>" />
		<p><label class="formlabel">Username</label> 		<input class="textfield" type="text" name="login_username" id="login_username" /></p>
		<p><label class="formlabel">Password</label> 		<input class="textfield" type="text" name="login_password" id="login_password" /></p>

		<hr/>
		<input type="submit" name="login_submit" value="login_submit" class="Login" />
	</fieldset>
</form>