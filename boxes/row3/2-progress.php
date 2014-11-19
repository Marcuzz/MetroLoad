<?php

	$colour = '#80397b';
	$gradient = array(
		'#80397b', // Left colour
		'#9d4697' // Right colour
	);
	
	$transparency = 1; // 0.1 to 1
	$size = 6; // 1 to 12 (12 is the whole page wide)
	
	if($show_gif_spinner) {
		$contents = '
			<div class="box-inner" style="text-align: right;">
				<h2><img src="img/loader.gif" /> <div id="status">Retrieving server info...</div></h2><br>
				<div id="fileDL">No files downloading</div> [ <div id="percent">0</div>% ]<br>
				Files: <div id="needed">Needed</div> / <div id="total">Total</div><br>
				<div class="progress" style="width: 75%; float: right; background-color: '.$progress_bg.'">
					<div class="progress-bar" id="progressbar" style="background-color: '.$progress_inner.';">
					</div>
				</div>
			</div>
		';	
	} else {
		$contents = '
			<div class="box-inner" style="text-align: right;">
				<h2><i class="fa fa-spinner"></i> <div id="status">Retrieving server info...</div></h2><br>
				<div id="fileDL">No files downloading</div> [ <div id="percent">0</div>% ]<br>
				Files: <div id="needed">Needed</div> / <div id="total">Total</div><br>
				<div class="progress" style="width: 75%; float: right; background-color: '.$progress_bg.'">
					<div class="progress-bar" id="progressbar" style="background-color: '.$progress_inner.';">
					</div>
				</div>
			</div>
		';
	}
?>