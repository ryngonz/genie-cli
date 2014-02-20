<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   Genie_CLI
 * @author    Ryan Gonzales <ryngonz@gmail.com>
 * @license   GPL-2.0+
 * @link      http://www.mojobitz.com
 * @copyright 2014 Ryan Gonzales
 */
?>

<script type="text/javascript">
	jQuery(document).ready(function ($) {
		$(document).keydown(function(e) {
		  if (e.which == 192){
			$('#genie-cli-window').modal();
		  }
		});
	});
</script>

<!-- modal content -->
<div id="genie-cli-window">
	<form method="POST">
		<input class="genie-cli-textbox" type="text" name="cli-exec" x-webkit-speech speech required />
	</form>
</div>

<!-- preload the images -->
<div style='display:none'>
	<img src='<?php echo plugins_url( '../assets/img/basic/x.png', __FILE__ ); ?>' alt='' />
</div>