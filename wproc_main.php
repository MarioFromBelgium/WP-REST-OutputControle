<!--
http://code.tutsplus.com/tutorials/create-a-custom-wordpress-plugin-from-scratch--net-2668
http://www.w3schools.com/php/php_form_complete.asp
http://wpengineer.com/968/wordpress-working-with-options/
-->



<!DOCTYPE html>
<head>
<title>Title</title>
<meta charset="utf-8" />



</head>
<body>

  
<?php

wp_register_script( 'wproc_js_script', plugins_url('js/wproc.js', __FILE__), array('jquery'));
wp_enqueue_script( 'wproc_js_script' );

$wproc_settings = new stdClass ();

if ($_POST ['wproc_hidden'] == 'Y') {
	// Form data sent --> new settings sould be implemented
	$wproc_settings->ALL = $_POST ['wproc_chkbx_all'];
	$wproc_settings->CUSTOM = $_POST ['wproc_chkbx_custom'];
	$wproc_settings->AUTH = $_POST ['wproc_chkbx_auth'];
	
	update_option ( 'wproc_settings', $wproc_settings );
	
	?>      
    	<div class="updated">
		<p>
			<strong><?php _e('Options saved.' ); ?></strong>
		</p>
	</div>
<?php
} else {
	// Normal page display
	$wproc_settings = get_option ( 'wproc_settings' );
}
?>

<div class="wrap">
    <?php
		echo "<h2>WP REST Output Controle - Settings</h2>";
		echo "Use this page to set what and under which conditions the WP-REST-API returns upon calls"?>
    	<form name="wproc_settings_form" method="post" 	action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
    	
		<input type="hidden" name="wproc_hidden" value="Y">
		<hr />
        <?php
								echo "<h3>Enable REST</h3>";
								echo "<b>IMPORTANT!:</b>WP Rest Controller disables by default all REST activity.";
								echo "<br>";
								echo "Enable yourself hereunder either <b>ALL</b> or only your <b>OWN CUSTOM</b> routes and endpoints.</h3>"?>
        <p><?php _e("Enable ALL REST routes:" ); ?>
                <input class="wproc_rest_onof" type="checkbox" id="wproc_chkbx_all" name="wproc_chkbx_all"
					<?php if (isset($wproc_settings->ALL) && $wproc_settings->ALL=="enabled") echo "checked";?>
					value="enabled">
			</p>
			<p>
			<span id=wproc_text_custom></span>
			<input class="wproc_rest_onof" type="checkbox" id ="wproc_chkbx_custom" name="wproc_chkbx_custom"
					<?php if (isset($wproc_settings->CUSTOM) && $wproc_settings->CUSTOM=="enabled") echo "checked";?>
					value="enabled">
			
			
       
			</p>
			<br>
			<div id=wproc_auth>
			<hr />
			<br>
			
        <?php
		echo "<h3>Requier Authentication</h3>";
		echo "<b>IMPORTANT!:</b>WP Rest Controller opens, by default, WP REST API to all, including non-athenticated, calls.";
		echo "<br>";
		echo "Enable the requierment for authentication hereunder (valid for ALL, including your custom, routes and endpoints.</h3>"?>
        <p>
        
        <?php _e("Require Authentication:" ); ?>
                <input type="checkbox" name="wproc_chkbx_auth"
					<?php if (isset($wproc_settings->AUTH) && $wproc_settings->AUTH=="required") echo "checked";?>
					value="required">Yes
			</p>
		</div>
			<hr />
			<p class="submit">
				<input type="submit" name="Submit" value="<?php _e('Save Settings') ?>" />
			</p>
			
		</form>
	</div>


</body>
</html>

