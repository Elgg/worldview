<?php
// Elgg framework
require_once(dirname(dirname(dirname(__FILE__))) . '/engine/start.php');
		
// Make sure we're logged in
gatekeeper();
		
// Get current user
global $_SESSION;
$user = $_SESSION['user'];

// Get offset
$page = (int) get_input('page',1);
		
$worldview =  get_plugin_usersetting('worldview',0,'worldview'); // $user->worldview;
$lastcache = (int) $user->worldview_lastcache;
$query = '';
		
$terms = explode(',',$worldview);
$twitterquery = '';
foreach($terms as $term) {
	$term = trim($term);
	if (!empty($twitterquery)) $twitterquery .= ' OR ';
	$twitterquery .= $term;
}
foreach($terms as $term) {
	$term = trim($term);
	if (!empty($flickrquery)) $flickrquery .= ',';
	$flickrquery .= $term;
}
$twiturl = 'http://search.twitter.com/search.atom?page='.$page.'&rpp=20&q=' . urlencode($twitterquery);
$data = simplexml_load_file($twiturl);
		
$flickrurl = 'http://api.flickr.com/services/feeds/photos_public.gne?tags=' . $flickrquery . '&tagmode=any&format=json&jsoncallback=?';
		
$blogurl = 'http://blogsearch.google.com/blogsearch_feeds?as_q=&hl=en&scoring=d&ctz=0&c2coff=1&as_epq=&as_eq=&as_drrb=q&as_qdr=a&as_mind=1&as_minm=1&as_miny=2000&as_maxd=27&as_maxm=3&as_maxy=2009&lr=&safe=active&q='.urlencode($twitterquery).'&ie=utf-8&num=10&output=atom';
$blogdata = simplexml_load_file($blogurl);
		
$newsurl = 'http://news.google.com/news?pz=1&ned=us&hl=en&q='.urlencode($twitterquery).'&scoring=n&output=atom';
$newsdata = simplexml_load_file($newsurl);

$newsitems = elgg_view('worldview/blogitems',array('data' => $newsdata));
$blogitems = elgg_view('worldview/blogitems',array('data' => $blogdata, 'show_content' => 'yes'));
$flickritems = elgg_view('worldview/flickritems',array('data' => $flickrurl));
		
$body = elgg_view('worldview/list',array('data' => $data, 'page' => $page));
$body = elgg_view_layout("worldview", $body . $flatstring, $blogitems, $worldview, $newsitems,$flickritems);

page_draw(elgg_echo('worldview'),$body);