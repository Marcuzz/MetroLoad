<?php

	$colour = '#094ab2';
	$gradient = array(
		'#094ab2', // Left colour
		'#0a5bc4' // Right colour
	);
	
	$box_title = 'Rules';
	$fa_icon = 'circle-o'; // Font awesome icon class name
	
	$transparency = 1; // 0.1 to 1
	$size = 6; // 1 to 12 (12 is the whole page wide)
	
	// RULES CONFIG
	$rules_column1 = array( // You can fit up to 5 rules in a single column.
		"No ghosting!",
		"No prop killing!",
		"No prop blocking!",
		"No random KOS'es!",
	);
	
	$rules_column2 = array( // Only in use if size is greater than or equal to 6!!
		"No ghosting!",
		"No prop killing!"
	);
	
	$rules_column3 = array( // Only in use if size is greater than or equal to 6!!

	);
	
	////////////////////////////////////////////////////////////////////////////////////////
	//																					  //
	// DO NOT EDIT PAST THIS LINE UNLESS YOU KNOW WHAT YOU'RE DOING!					  //
	//																					  //
	////////////////////////////////////////////////////////////////////////////////////////
	
	$i = 1;
	foreach($rules_column1 as $rule) {
		$rules1 .= '#' . $i . ' ' . $rule . '<br>';
		$i++;
	}
	
	foreach($rules_column2 as $rule) {
		$rules2 .= '#' . $i . ' ' . $rule . '<br>';
		$i++;
	}
	
	foreach($rules_column3 as $rule) {
		$rules3 .= '#' . $i . ' ' . $rule . '<br>';
		$i++;
	}
	
	if($size <= 6) {
		$contents = '
			<div class="box-inner">
				<h3><i class="fa fa-'.$fa_icon.'"></i> '.$box_title.'</h3><br>
				<div class="col-xs-4">
					'.$rules1.'
				</div>
				<div class="col-xs-4">
					'.$rules2.'
				</div>
				<div class="col-xs-4">
					'.$rules3.'
				</div>
			</div>
		';
	} else {
		$contents = '
			<div class="box-inner">
				<h3><i class="fa fa-'.$fa_icon.'"></i> '.$box_title.'</h3><br>
				'.$rules1.'
			</div>
		';
	}

?>