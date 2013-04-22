<h1>General settings</h1>

<!-- Form -->
<form action="#">
	<fieldset>
		<span class="formtitle">General</span>
		<hr/>
			<p><label class="formlabel">Title</label> 		<label class="help">Your website's name</label> 					<input class="textfield" type="text" id="name" /></p>
			<p><label class="formlabel">Slogan</label> 		<label class="help">Your website's slogan</label>					<input class="textfield" type="text" id="name" /></p>
			<p><label class="formlabel">Description</label> <label class="help">Your website's description</label>				<input class="textfield" type="text" id="name" /></p>
			<p><label class="formlabel">Titleformat</label> <label class="help">Ex. [title] - [page]</label>	<input class="textfield" type="text" id="name" /></p>
			<p><label class="formlabel">E-mail</label> 		<label class="help">Your e-mail address</label>						<input class="textfield" type="text" id="name" /></p>
			<p><label class="formlabel">Base URL</label> 	<label class="help">Ex. http://www.openphpcms.org/</label>	<input class="textfield" type="text" id="name" /></p>
		<span class="formtitle">Date & Time</span>
		<hr/>
		<p><label class="formlabelselect">Timezone</label>
			<select name="gmt" id="gmt">
				<?PHP echo $timezone; ?>
			</select>
		</p>
		<p><label class="formlabel">Date format</label> 		<label class="help">Long</label>
			<select>
				<option>hjhkd</option>
			</select>
		</p>
		
		<hr/>
		<input type="submit" value="Save" class="button buttrans bluebut" />
	</fieldset>
</form>