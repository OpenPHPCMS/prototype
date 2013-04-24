<H1>Add User</H1>

<form action="" method="post">
	<fieldset>
		<p>
			<label class="formlabel">Username</label>	
			<label class="help">Username for login </label> 		
			<input class="textfield" type="text" id="user_username" name="user_username" value="<?PHP echo $username ?>" />
			<span class="formError"><?PHP echo $error_username ?></span>
		</p>

		<p>
			<label class="formlabel">Password</label>	
			<label class="help">Password for login</label> 		
			<input class="textfield" type="text" id="user_password" name="user_password" value="<?PHP echo $password ?>" />
			<span class="formError"><?PHP echo $error_password ?></span>
		</p>

		<p>
			<label class="formlabel">Name</label>	
			<label class="help">Name of user</label> 		
			<input class="textfield" type="text" id="user_name" name="user_name" value="<?PHP echo $name ?>" />
			<span class="formError"><?PHP echo $error_name ?></span>
		</p>

		<p>
			<label class="formlabel">Surname</label>	
			<label class="help">Surname of user</label> 		
			<input class="textfield" type="text" id="user_surname" name="user_surname" value="<?PHP echo $surname ?>" />
			<span class="formError"><?PHP echo $error_surname ?></span>
		</p>

		<p>
			<label class="formlabel">Email</label>	
			<label class="help">Email of user</label> 		
			<input class="textfield" type="text" id="user_email" name="user_email" value="<?PHP echo $email ?>" />
			<span class="formError"><?PHP echo $error_email ?></span>
		</p>

		<p>
			<label class="formlabel">User role</label>	
			<label class="help">User acces role</label> 		
			<select name="user_level" id="user_level">
				<?PHP echo $user_roles; ?>
			</select>
			<span class="formError"><?PHP echo $error_level ?></span>
		</p>


		<hr/>
		<input type="submit" value="Save" name="user_submit" class="button buttrans bluebut" />
	</fieldset>
</form>