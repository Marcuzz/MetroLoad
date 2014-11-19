<?php

	$colour = '#ac193d';
	$gradient = array(
		'#ac193d', // Left colour
		'#bf1e4b' // Right colour
	);
	
	$box_title = 'Staff';
	$fa_icon = 'users'; // Font awesome icon class name
	
	$transparency = 1; // 0.1 to 1
	$size = 3; // 1 to 12 (12 is the whole page wide)
	
	// STAFF CONFIG
	$admins_column1 = array( // A list of admins. Works the same way as below.
		"Admin"
	);
	
	$admins_column2 = array( // Only in use if size is greater than or equal to 6!!
		""
	);
	
	$admins_column3 = array( // Only in use if size is greater than or equal to 6!!
		""
	);
	
	////////////////////////////////////////////////////////////////////////////////////////
	//																					  //
	// DO NOT EDIT PAST THIS LINE UNLESS YOU KNOW WHAT YOU'RE DOING!					  //
	//																					  //
	////////////////////////////////////////////////////////////////////////////////////////
	
	foreach($admins_column1 as $admin){
		$admin_d1 .= $admin . '<br>';
	}
	
	foreach($admins_column2 as $admin){
		$admin_d2 .= $admin . '<br>';
	}
	
	foreach($admins_column3 as $admin){
		$admin_d3 .= $admin . '<br>';
	}
	
	if($size <= 6) {
		$contents = '
			<div class="box-inner">
				<h3><i class="fa fa-'.$fa_icon.'"></i> '.$box_title.'</h3><br>
				<div class="col-xs-4">
					'.$admin_d1.'
				</div>
				<div class="col-xs-4">
					'.$admin_d2.'
				</div>
				<div class="col-xs-4">
					'.$admin_d3.'
				</div>
			</div>
		';
	} else {
		$contents = '
			<div class="box-inner">
				<h3><i class="fa fa-'.$fa_icon.'"></i> '.$box_title.'</h3><br>
				'.$admin_d1.'
			</div>
		';
	}

?>