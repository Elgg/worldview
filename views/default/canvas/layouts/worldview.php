<?php
/**
 * Elgg layout for the worldview plugin
 * 
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Curverider Ltd
 * @copyright Curverider Ltd 2008
 * @link http://elgg.org/
 */
	 
?>
<div id="top_column_worldview">
<div class="contentWrapper">
<div id="worldwide_intro">
<p><?php echo elgg_echo('worldview:overview'); ?>.</p>
</div>
<?php

	echo elgg_view_title(elgg_echo('worldview'));

	if (!empty($vars['area3'])) {
		echo autop(sprintf(elgg_echo('worldview:searchterms'),$vars['area3']) . ' | <a href="'.$vars['url']. 'pg/settings/plugins/'.$vars['user']->username.'/'.'">edit list</a>');
	} else {
		echo autop('<a href="'.$vars['url']. 'pg/settings/plugins/'.$vars['user']->username.'/'.'">'.elgg_echo('worldview:noterms').'</a>');
	}
	
?>
<div id="refresh_content"><p><a class="submit_button" href="<?php echo $vars['url']; ?>mod/worldview/"><?php echo elgg_echo('worldview:refresh'); ?></a></p></div>
<div class="clearfloat"></div>
</div>
</div>
<div id="left_column_worldview">
	<div class="contentWrapper">
		<img src="<?php echo $vars['url']; ?>mod/worldview/graphics/twitter_logo_small.png" alt="twitter" />
	</div>
	<div class="contentWrapper">
		<?php if (isset($vars['area1'])) echo $vars['area1']; ?>
	</div>
</div>
<div id="right_column_worldview">
	<div class="contentWrapper">
		<img src="<?php echo $vars['url']; ?>mod/worldview/graphics/google_blog.png" alt="Flickr" />
	</div>
	<div class="contentWrapper">
		<?php if (isset($vars['area2'])) echo $vars['area2']; ?>
	</div>
	<div class="contentWrapper">
		<img src="<?php echo $vars['url']; ?>mod/worldview/graphics/flickr.png" alt="Flickr" />
	</div>
	<div class="contentWrapper">
		<?php if (isset($vars['area5'])) echo $vars['area5']; ?>
	</div>
	<div class="contentWrapper">
		<img src="<?php echo $vars['url']; ?>mod/worldview/graphics/google_news.png" alt="Flickr" />
	</div>
	<div class="contentWrapper">
		<?php if (isset($vars['area4'])) echo $vars['area4']; ?>
	</div>
</div>