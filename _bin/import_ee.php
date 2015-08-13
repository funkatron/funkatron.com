#!/usr/bin/env php
<?php
$URL = 
$OUTPUT_PATH = '../_posts/';

$file_str = file_get_contents('http://funkatron.com/exp/posts_jekyll');

$split = explode("<!-- end of post -->", $file_str);

$x = 0;
foreach($split as $post_str) {
	
	$post_str = trim($post_str);
	
	if ($post_str) {
		// get the yaml data out
		$post_pieces = explode('---', $post_str);
		$yaml = trim($post_pieces[1]);
		$yaml_lines = explode("\n", $yaml);
		foreach ($yaml_lines as $line) {
			if (preg_match("/^date:\s?(\d\d\d\d-\d\d-\d\d)$/i", $line, $matches)) {
				$date = $matches[1];
			}
			if (preg_match("/^url_title:\s?([A-Za-z0-9_-]+)$/i", $line, $matches)) {
				$slug = $matches[1];
			}
		}
		// write file
		
		$output_file = "{$OUTPUT_PATH}{$date}-{$slug}.html";
		echo "Writing {$output_file}\n";
		file_put_contents($output_file, $post_str);
	}
}
?>
