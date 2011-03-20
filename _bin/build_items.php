<?php
$GOOGLE_FEED_URL = 'http://www.google.com/reader/public/javascript/feed/';
$ITEMS_FEED_URL  = 'http://funkatron.com/feeds/itemsofinterest';

$json = file_get_contents("{$GOOGLE_FEED_URL}{$ITEMS_FEED_URL}");

$feed = json_decode($json, true);
?>
---
layout: page
title: Items of Interest
---

<h2>{{page.title}}</h2>


<ul class="items">
	<?php foreach($feed['items'] as $item) : ?>
	<li><a href="<?=$item['alternate']['href']?>"><?=$item['title']?></a></li>
	<?php endforeach; ?>
</ul>
