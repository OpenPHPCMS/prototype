<?php
	require_once('validation/validate_settings.php');	//Validation needed for this form
	require_once('essentials/date_and_time.php');
?>
<h1>General settings</h1>

<!-- Form -->
<form method="get" id="settingsForm" action="">
	<fieldset>
		<span class="formtitle">General</span>
		<hr/>
			<p><label class="formlabel">Title</label> 		
					<label class="help">Your website's name</label> 					
						<input class="textfield" type="text" name="title" value="<?php echo $_GET['title'] ?>"/>			
			</p>
			<p><label class="formlabel">Slogan</label> 		
					<label class="help">Your website's slogan</label>					
						<input class="textfield" type="text" name="slogan" value="<?php echo $_GET['slogan'] ?>"/>
			</p>
			<p><label class="formlabel">Description</label> 
					<label class="help">Your website's description</label>				
						<input class="textfield" type="text" name="description" value="<?php echo $_GET['description'] ?>"/>
			</p>
			<p><label class="formlabel">Titleformat</label> 
					<label class="help">Ex. [title] - [page]</label>					
						<input class="textfield" type="text" name="titleformat" value="<?php echo $_GET['titleformat'] ?>"/>
			</p>
			<p><label class="formlabel">E-mail</label> 		
					<label class="help">Your e-mail address</label>						
						<input class="textfield" type="text" name="email" value="<?php echo $_GET['email'] ?>"/>
			</p>
			<p><label class="formlabel">Base URL</label> 	
					<label class="help">Ex. http://www.openphpcms.org/</label>			
						<input class="textfield" type="text" name="baseurl" value="<?php echo $_GET['baseurl'] ?>"/>
			</p>
		<span class="formtitle">Date & Time</span>
		<hr/>
		<p><label class="formlabelselect">Timezone</label>
			<select name="gmt" id="gmt">
				<?php 
					//Declared in essentials/date_and_time.php
					get_timezone_select() 
				?>
			</select>
		</p>
		<p><label class="formlabel">Date format</label> <label class="help">Long</label>
			<select name="dateFormatLong">
				<?php
					//Declared in essentials/date_and_time.php
					generateLongDateFormat()
				?>
			</select>
		</p>
		<p><label class="formlabel">Date format</label> <label class="help">Medium</label>
			<select name="dateFormatLong">
				<?php
					//Declared in essentials/date_and_time.php
					generateMediumDateFormat()
				?>
			</select>
		</p>
		<p><label class="formlabel">Date format</label> <label class="help">Short</label>
			<select name="dateFormatLong">
				<?php
					//Declared in essentials/date_and_time.php
					generateShortDateFormat()
				?>
			</select>
		</p>
		
		<hr/>
		<input type="hidden" value="1" name="submitted"/>
		<input type="submit" value="Save" class="button buttrans bluebut" />
	</fieldset>
</form>