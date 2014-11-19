<?php

	$colour = '#008b00';
	$gradient = array(
		'#008b00', // Left colour
		'#1aaf1a' // Right colour
	);
	
	$box_title = 'Map';
	$fa_icon = 'bars'; // Font awesome icon class name
	
	$transparency = 1; // 0.1 to 1
	$size = 3; // 1 to 12 (12 is the whole page wide)
	
	if($display_map_img) {
		$contents = '
			<div class="map-img">
				<img src="'.$mapname.'" width="100%" height="100%"></img>
			</div>
			<div class="box-inner">
				<h3><i class="fa fa-'.$fa_icon.'"></i> '.$box_title.'</h3><br>
				'.$clear_mapname.'
			</div>
		'; 
	} else {
		$contents = '
			<div class="box-inner">
				<h3><i class="fa fa-'.$fa_icon.'"></i> '.$box_title.'</h3><br>
				'.$clear_mapname.'
			</div>
		'; 
	}


?>