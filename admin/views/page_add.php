<h1>Add Page</h1>
 <form method="post" id="settingsForm" action="">
	<fieldset>

		<input type="hidden" name="type" value="<?php echo $type ?>"/>	
	
	<p>
		<label class="formlabel">Name</label> 		
		<label class="help">Url name</label> 					
		<input class="name" type="text" name="name" value="<?php echo $name ?>"/>			
	</p>

	<p>
		<label class="formlabel">Title</label> 		
		<label class="help">Page title</label> 					
		<input class="name" type="text" name="title" value="<?php echo $title ?>"/>			
	</p>
	
	<?PHP require($page_form_file) ?>
	
	<hr/>
	<input type="submit" name="page_submit" value="Save" class="button buttrans bluebut" />
</fieldset>
</form>

<?PHP require($page_content_file) ?>