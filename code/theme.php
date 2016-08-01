<?php

//add theme shop submenu
add_action('admin_menu','_daxiawp_theme_menu_page');	
function _daxiawp_theme_menu_page(){
	add_submenu_page( 'DX-auto-save-images','主题商城','manage_options','daxiawp_theme','_daxiawp_theme_form' );
	function _daxiawp_theme_form(){
?>

<style type="text/css">
	ul.theme{width:980px;}
	ul.theme li{width:300px; float:left; border:1px solid #ccc; padding:5px; margin-right:10px; margin-bottom:15px;}
</style>

<script type="text/javascript" src="http://cbjs.baidu.com/js/m.js"></script>
<?php 
	$codes=array(
		'454435',
		'454451',
		'454453',
		'454454',
		'454455',
		'454457',
		'454459',
		'454461',
		'454462'
	);
?>

<?php		
	}
}