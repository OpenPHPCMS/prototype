<H1>Add User</H1>

<form action="" method="post">
	<fieldset>
		<p>
			<label class="formlabel">Username</label>	
			<label class="help">Username for login</label> 		
			<input class="textfield" type="text" id="user_username" name="user_username" value="<?PHP echo $username ?>" />
		</p>

		<p>
			<label class="formlabel">Password</label>	
			<label class="help">Password for login</label> 		
			<input class="textfield" type="text" id="user_password" name="user_password" value="<?PHP echo $password ?>" />
		</p>

		<p>
			<label class="formlabel">Name</label>	
			<label class="help">Name of user</label> 		
			<input class="textfield" type="text" id="user_name" name="user_name" value="<?PHP echo $name ?>" />
		</p>

		<p>
			<label class="formlabel">Surname</label>	
			<label class="help">Surname of user</label> 		
			<input class="textfield" type="text" id="user_surname" name="user_surname" value="<?PHP echo $surname ?>" />
		</p>

		<p>
			<label class="formlabel">Email</label>	
			<label class="help">Email of user</label> 		
			<input class="textfield" type="text" id="user_email" name="user_email" value="<?PHP echo $email ?>" />
		</p>

		<p>
			<label class="formlabel">User role</label>	
			<label class="help">User acces role</label> 		
			<select name="user_level" id="user_level">
				<?PHP echo $user_roles; ?>
			</select>
		</p>


		<hr/>
		<input type="submit" value="Save" name="user_submit" class="button buttrans bluebut" />
	</fieldset>
</form>