<?php
$data = (array) $vars['data'];
if (!empty($data['entry'])){
	foreach($data['entry'] as $item) {
		$item = (array) $item;
		$link = (array) $item['link'];
		$link = $link['@attributes']['href'];
			
		if (isset($item['published'])) {
			$time = friendly_time(strtotime($item['published']));
		} else {
			$time = friendly_time(strtotime($item['issued']));
		}
			
		if($vars['show_content'] == 'yes')
			echo autop('<a href="'.$link.'">' . $item['title'] . '</a><br />' . $item['content'] . ' <small>('.$time.')</small>');
		else
			echo autop('<a href="'.$link.'">' . $item['title'] . '</a><br /><small>('.$time.')</small>');
	}
}