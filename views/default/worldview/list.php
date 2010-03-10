<?php
$data = (array) $vars['data'];
if (is_array($data['entry']))
	foreach($data['entry'] as $item) {
		$item = (array) $item;
		echo elgg_view('worldview/item',array('item' => $item));
	}
		
	$nav = '';
	$page = (int) $vars['page'];
	if ($vars['page'] > 1) {
		$nav .= '<a href="'.$vars['url'].'mod/worldview/?page='.($page-1).'">'.elgg_echo('previous').'</a> ';
	}
	if (sizeof($vars['data']) > 19) {
		$nav .= '<a href="'.$vars['url'].'mod/worldview/?page='.($page+1).'">'.elgg_echo('next').'</a> ';
	}
	
	if (!empty($nav)) {
		
?>
<div class="contentWrapper">
	<?php
		echo autop($nav);
	 ?>
</div>
<?php
	}
?>