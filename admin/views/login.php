<form action="login.php" method="post">
	<fieldset>
		<span class="formtitle">Login</span>
		
		<input type="hidden" name="login_token" value="<?PHP echo $_SESSION['login_token']; ?>" />
		<p><label class="formlabel">Username</label> 		<input class="textfield" type="text" name="login_username" id="login_username" /></p>
		<p><label class="formlabel">Password</label> 		<input class="password" type="text" name="login_password" id="login_password" /></p>

		<hr/>
		<input type="submit" name="login_submit" value="Login" class="button buttrans bluebut" />
	</fieldset>
</form>