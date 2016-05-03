/**
 * https://www.inkthemes.com/how-to-implement-custom-jquery-and-css-in-wordpress-plugin/
 * 
 * jQuery script called from wproc_main.php
 * basically only arranges the view and status of checkboxes based on selection of user
 * form logic is handled by php in wproc_main.php
 */

function wproc_arrange_chkbx_area(is_all_chkbx_checked) {
	jQuery('#wproc_chkbx_custom').toggle(!is_all_chkbx_checked);
	if (is_all_chkbx_checked) {
		jQuery('#wproc_text_custom').text('Custom routes & endpoints enabled');				
	}
	else {
		jQuery('#wproc_text_custom').text('Enable ONLY CUSTOM routes&endpoints');		
	}
}


jQuery( window ).load(function() { 	//console.log("document ready"); //alert('Hello! I am an alert box!!');
	if (jQuery('#wproc_chkbx_all').prop("checked")) {		//console.log("Chkbx_all is checked");
		wproc_arrange_chkbx_area(true)
		jQuery('#wproc_auth').show();
	}
	else {		//console.log("Chkbx_all is not checked");
		wproc_arrange_chkbx_area(false);
		jQuery('#wproc_auth').toggle(jQuery('#wproc_chkbx_custom').prop("checked"));		
	}	
});

jQuery('#wproc_chkbx_all').click(function() {
	jQuery('#wproc_auth').prop("checked", this.checked);
	jQuery('#wproc_chkbx_custom').prop( "checked", this.checked );
	jQuery('#wproc_auth').toggle(this.checked);
	wproc_arrange_chkbx_area(this.checked);
})

jQuery('#wproc_chkbx_custom').click(function(){	
	jQuery('#wproc_auth').prop("checked", this.checked);
	jQuery('#wproc_auth').toggle(this.checked);
})

