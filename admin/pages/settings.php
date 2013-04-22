<section class="main">
<!-- Heading -->
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
		<?php
			function get_timezone_select() {
			$timezone_arr = array(
				"-12" => "(GMT -12:00) Eniwetok, Kwajalein",
				"-11" => "(GMT -11:00) Midway Island, Samoa",
				"-10" => "(GMT -10:00) Hawaii",
				"-9" => "(GMT -9:00) Alaska",
				"-8" => "(GMT -8:00) Pacific Time (US &amp; Canada)",
				"-7" => "(GMT -7:00) Mountain Time (US &amp; Canada)",
				"-6" => "(GMT -6:00) Central Time (US &amp; Canada), Mexico City",
				"-5" => "(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima",
				"-4" => "(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz",
				"-3.5" => "(GMT -3:30) Newfoundland",
				"-3" => "(GMT -3:00) Brazil, Buenos Aires, Georgetown",
				"-2" => "(GMT -2:00) Mid-Atlantic",
				"-1" => "(GMT -1:00) Azores, Cape Verde Islands",
				"0" => "(GMT) Western Europe Time, London, Lisbon, Casablanca",
				"1" => "(GMT +1:00) Amsterdam, Brussels, Copenhagen, Madrid, Paris",
				"2" => "(GMT +2:00) Kaliningrad, South Africa",
				"3" => "(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg",
				"3.5" => "(GMT +3:30) Tehran",
				"4" => "(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi",
				"4.5" => "(GMT +4:30) Kabul",
				"5" => "(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent",
				"5.5" => "(GMT +5:30) Bombay, Calcutta, Madras, New Delhi",
				"6" => "(GMT +6:00) Almaty, Dhaka, Colombo",
				"7" => "(GMT +7:00) Bangkok, Hanoi, Jakarta",
				"8" => "(GMT +8:00) Beijing, Perth, Singapore, Hong Kong",
				"9" => "(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk",
				"9.5" => "(GMT +9:30) Adelaide, Darwin",
				"10" => "(GMT +10:00) Eastern Australia, Guam, Vladivostok",
				"11" => "(GMT +11:00) Magadan, Solomon Islands, New Caledonia",
				"12" => "(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka"
			);

			$output='';
			
			foreach ( $timezone_arr as $key=>$value ) {
				//$selected = ( ($_POST['gmt']==$key) ? $selected ='selected="selected"' : $selected = '' );
				$output .= '<option value="'.$key.'">'.$value.'</option>';
			}
				return $output;
			}
			 
			echo '
			<select name="gmt" id="gmt">
			'.get_timezone_select().'
			</select>
			'
		?>
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
<!-- End content -->
</section>