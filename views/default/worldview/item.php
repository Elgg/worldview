<?php
$item = $vars['item'];
$icon = ((array) $item['link'][1]);
$icon = $icon['@attributes']['href'];
$desc = autop($item['content']);
$user_name = $item['author']->name;
$uri = $item['author']->uri;
$time = friendly_time(strtotime($item['updated']));
?>
<div class="twitter_view">
	<div class="twitter_icon">
		<?php
		     echo '<a href="'.$uri.'"><img src="'.$icon.'" border="0" style="width:48px" /></a>'; 
		?>
	</div>	
	<?php
	    echo "({$time}) <b><a href=\"{$uri}\">{$user_name}</a>: </b>";
		echo parse_urls($desc);
	?>
</div>	
	