<?php
require_once('twitteroauth.php');

define('CONSUMER_KEY', 'DJoCWSTsovwzLZhGzfphJ8q4v');
define('CONSUMER_SECRET', '	7ourUVGHZhpVuft8XZkISB6giiJpZnM69tgDEWorMkDsEEVwpZ');
define('ACCESS_TOKEN', '746756169935560704-yW6vRGVbTVWuEptkBCWAkj1OgLV6G5m');
define('ACCESS_TOKEN_SECRET', 'F5ZsauZzFhxRv8hu0o1VUi9ESuQZfdoQ6QTya1eMw3NIk');

$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
$twitter->host = "https://api.twitter.com/1.1/";
$search = $twitter->get('search', array('q' => 'search key word', 'rpp' => 15));

$twitter->host = "https://api.twitter.com/1.1/";
foreach($search->results as $tweet) {
	$status = 'RT @'.$tweet->from_user.' '.$tweet->text;
	if(strlen($status) > 140) $status = substr($status, 0, 139);
	$twitter->post('statuses/update', array('status' => $status));
}

echo "Success! Check your twitter bot for retweets!";
