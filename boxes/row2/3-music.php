<?php

	$colour = '#008b00';
	$gradient = array(
		'#008b00', // Left colour
		'#1aaf1a' // Right colour
	);
	
	$box_title = 'Track';
	$fa_icon = 'music'; // Font awesome icon class name
	
	$transparency = 1; // 0.1 to 1
	$size = 3; // 1 to 12 (12 is the whole page wide)
	
	if($youtube_ids[0] == ''){
		$contents = '
			<div class="box-inner">
				<h3><i class="fa fa-'.$fa_icon.'"></i> '.$box_title.'</h3><br>
				'.$play_name.'
			</div>
		';
	} else {
		$contents = '
			<div class="box-inner">
				<h3><i class="fa fa-'.$fa_icon.'"></i> '.$box_title.'</h3><br>
				'.$youtube_name.'
			</div>
		';
	}
?>