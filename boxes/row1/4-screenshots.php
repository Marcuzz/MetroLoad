<?php

	$colour = '#fff';
	$gradient = array(
		'#fff', // Left colour
		'#fff' // Right colour
	);

	// In this file, these two are irrelevant
	$box_title = '';
	$fa_icon = ''; // Font awesome icon class name

	$transparency = 1; // 0.1 to 1
	$size = 3; // 1 to 12 (12 is the whole page wide)

	// Slideshow timer, 5000 = 5 seconds
	$box_slideshow_timer = 5000;
	$shuffle_slideshow = true; // true or false. Shuffle makes the images random

	$imageArray = array(
		'http://www.garrysmod.com/wp-content/uploads/2013/05/store_061.jpg',
		'http://i.imgur.com/x4axQ.jpg'
	);

	if($shuffle_slideshow){
		shuffle($imageArray);
	}

	// Foreach for images
	$images = '';
	foreach($imageArray as $image){
		$images .= '
			<img src="'.$image.'" width="100%" height="100%" style="position: absolute;"></img>
		';
	}

	$contents = '
		<div class="box-slideshow">
			'.$images.'
		</div>
	';
?>

<!-- Javascript, do not touch pls -->
<script>
	$(function () {
		$('.box-slideshow img:gt(0)').hide();

		setInterval(function () {
			$('.box-slideshow :first-child').fadeOut()
									.next('img')
									.fadeIn()
									.end()
									.appendTo('.box-slideshow');
		}, <?php echo $box_slideshow_timer; ?>);
	});
</script>
