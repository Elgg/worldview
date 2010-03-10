<?php
function worldview_pagesetup() {
	global $CONFIG;
	add_menu(elgg_echo('worldview'),$CONFIG->wwwroot . 'mod/worldview',array());
	// Extend system CSS with our own styles
	extend_view('css','worldview/css');
}
register_elgg_event_handler('pagesetup','system','worldview_pagesetup');