<?php

$colour = '#008b00';
$gradient = [
	// Left colour
    '#008b00',
	// Right colour
    '#1aaf1a'
];

$box_title = 'Track';

// Font awesome icon 4 class name
$fa_icon = 'music';

// 0.1 to 1
$transparency = 1;

// 1 to 12 (12 is the whole page wide)
$size = 3;

if (!isset($playlist)) {
	$youtube_name = [];
}

if (!isset($youtube_name)) {
	$youtube_name = 'Untitled';
}

if ($youtube_ids[0] == '') {
    $contents = '
			<div class="box-inner">
				<h3><i class="fa fa-' . $fa_icon . '"></i> ' . $box_title . '</h3><br>
				<span class="songName">' . $playlist[0]['name'] . '</span>
			</div>
		';
} else {
    $contents = '
		<div class="box-inner">
			<h3><i class="fa fa-' . $fa_icon . '"></i> ' . $box_title . '</h3><br>
			' . $youtube_name . '
		</div>
	';
}
