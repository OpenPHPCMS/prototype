<!-- Validation -->
<?php
function validateTitle($title) {
	if(strlen($title) < 5)
		return false;
	else
		return true;
}

function validateSlogan($slogan) {
	if(strlen($slogan) < 15)
		return false;
	else
		return true;
}
?>
<?php 
if( isset($_GET['submitted'])) { //Form must be submitted before validations can take place
	if(!validateTitle($_GET['title']) || !validateSlogan($_GET['slogan'])) { ?>
	
	<div id="error">
		<ul>
			<?php 
			if(!validateTitle($_GET['title']))
				echo "<li><strong>Invalid title:</strong> We want titles with more than 5 letters!</li>";
			if(!validateSlogan($_GET['slogan']))
				echo "<li><strong>Invalid slogan:</strong> We want slogans with more than 15 letters!</li>";
			?>
		</ul>
	</div>
<?php 
	} else {
?>
	<div id="success">
		<ul>
			<li><strong>All information is correct!</strong></li>
		</ul>
	</div>
<?php
	}
}	
?>