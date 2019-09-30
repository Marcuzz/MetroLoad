<?php

$colour = '#008b00';
$gradient = [
    // Left colour
    '#008b00',
    // Right colour
    '#1aaf1a'
];

$box_title = 'Map';

// Font awesome icon class name
$fa_icon = 'bars';

// 0.1 to 1
$transparency = 1;

// 1 to 12 (12 is the whole page wide)
$size = 3;

if (!isset($clear_mapname)) {
    $clear_mapname = 'Untitled';
}

$contents = '
    <div class="box-inner">
        <h3><i class="fa fa-' . $fa_icon . '"></i> ' . $box_title . '</h3><br>
        ' . $clear_mapname . '
    </div>
';

if ($display_map_img) {
    $contents = '
        <div class="map-img">
            <img src="' . $mapname . '" width="100%" height="100%"></img>
        </div>
        <div class="box-inner">
            <h3><i class="fa fa-' . $fa_icon . '"></i> ' . $box_title . '</h3><br>
            ' . $clear_mapname . '
        </div>
    ';
}
