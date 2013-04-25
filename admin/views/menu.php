<h1>Menu</h1>

<form method="post">
	<fieldset>
		<span class="formtitle">Add menu item</span>
		<p>
			<label class="formlabel">Name</label> 		
			<label class="help">Name of menu item</label> 					
			<input class="textfield" type="text" name="name" value="<?php echo $name ?>"/>			
		</p>
		<p>
			<label class="formlabel">Link</label> 		
			<label class="help">Where menu item links to</label> 					
			<input class="textfield" type="text" name="link" value="<?php echo $link ?>"/>	<a href="#">Select page</a>		
		</p>
		<p>
			<label class="formlabel">parent</label> 		
			<label class="help">Parent of menu item</label> 					
			<select name="parrent">
				<?php echo $parents ?>
			</select>		
		</p>
		<input type="submit" name="menu_submit" value="Add menu item" class="button buttrans bluebut" />
	</fieldset>
</form>

<hr>
<form method="post">

<table>
	<tr>
	<th>Name</th>
	<th>Link</th>
	<th>Order</th>
</tr>
<?PHP echo $menu ?>
</table>

<input type="submit" name="menu_save" value="Save" class="button buttrans bluebut" />
</form>