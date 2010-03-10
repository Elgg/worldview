<p>
<?php
	echo elgg_echo('worldview:settings');
	echo elgg_view('input/text',array('internalname' => 'params[worldview]', 'value' => $vars['entity']->worldview));
	if (!empty($vars['entity']->worldview)) {
?>
	<a href="<?php echo $vars['url']; ?>mod/worldview/"><?php echo elgg_echo('worldview:see'); ?></a>
<?php
	}
?>
</p>