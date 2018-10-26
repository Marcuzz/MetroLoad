<?php
	require_once('inc/php.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>MetroLoad</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Oswald|Open+Sans:400,300,600,700|Montserrat:400,700" rel="stylesheet" type="text/css" />
	</head>

	<body class="bg" style="<?php echo $bg_img != '' ? 'background: url('.$bg_img.'); background-size: 100%; background-attachment: fixed;' : 'background: '.$bg_color.';';  echo 'color: '.$global_text_colour.';'; echo $map_bg ? 'background: url('.$mapname.'); background-size: 100%; background-attachment: fixed;' : ''; ?>">
		<?php if($enable_img_cycling) { ?>
			<div class="slideshow">
				<?php echo $images; ?>
			</div>
		<?php } ?>
		<div class="wrapper">
		<?php if($enable_music) { ?>
			<?php  if($youtube_ids[0] == '') { ?>
				<div class="musicAudio">
					<?php
						$songs = '';
						foreach($playlist as $i => $song){
							if($i == 0)
								$songs .= '<audio id="music" '.$att.' src="'.$song['file'].'" autoplay></audio>';
							else
								$songs .= '
									<div style="display: none;">
										<span class="file">'.$song['file'].'</span>
										<span class="name">'.$song['name'].'</span>
									</div>
								';
						}

						echo $songs;
					?>
				</div>
			<?php } ?>


			<div style="position:relative;width:267px;height:0px;overflow:hidden;">
				<div style="position:absolute;top:-276px;left:-5px">
					<iframe width="300" height="300" src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>?rel=0&autoplay=1"></iframe>
				</div>
			</div>
		<?php } ?>
		<div class="container content">
			<div class="row">
				<?php if($banner != '') { ?>
					<?php if($banner_align == 'center') { ?>
						<div class="col-xs-4"></div>
						<div class="col-xs-4">
							<img src="<?php echo $banner; ?>"></img>
						</div>
					<?php } ?>
					<?php if($banner_align == 'left') { ?>
						<div class="col-xs-4">
							<img src="<?php echo $banner; ?>"></img>
						</div>
					<?php } ?>
				<?php } ?>
				<div class="col-xs-4" style="text-align: right; float: right; opacity: <?php echo $profile_transparency; ?>;">
					<div class="col-xs-10" style="padding-right: 5px; margin-top: -12px;">
						<h3><?php echo $username; ?></h3><br>
						<?php echo convertCommunityIdToSteamId($steamid64); ?>
					</div>
					<div class="col-xs-2">
						<?php echo $img; ?>
					</div>
				</div>
			</div>

			<?php
				$row1_files = scandir('boxes' . DIRECTORY_SEPARATOR . 'row1' . DIRECTORY_SEPARATOR);
				unset($row1_files[0]);
				unset($row1_files[1]);

				echo '<div class="row">';
				foreach($row1_files as $file) {
					include('boxes' . DIRECTORY_SEPARATOR . 'row1' . DIRECTORY_SEPARATOR . $file);
					$file_wext = str_replace('.php', '', $file);

					if($one_colour == ''){
						echo "
							<style>
								.box-".$file_wext." {
								background: ".$gradient[0]."; /* Old browsers */
								background: -moz-linear-gradient(left,  ".$gradient[0]." 0%, ".$gradient[1]." 100%); /* FF3.6+ */
								background: -webkit-gradient(linear, left top, right top, color-stop(0%,".$gradient[0]."), color-stop(100%,".$gradient[1].")); /* Chrome,Safari4+ */
								background: -webkit-linear-gradient(left,  ".$gradient[0]." 0%,".$gradient[1]." 100%); /* Chrome10+,Safari5.1+ */
								background: -o-linear-gradient(left,  ".$gradient[0]." 0%,".$gradient[1]." 100%); /* Opera 11.10+ */
								background: -ms-linear-gradient(left,  ".$gradient[0]." 0%,".$gradient[1]." 100%); /* IE10+ */
								background: linear-gradient(to right,  ".$gradient[0]." 0%,".$gradient[1]." 100%); /* W3C */
								filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$gradient[0]."', endColorstr='".$gradient[1]."',GradientType=1 ); /* IE6-9 */
								}
							</style>
						";
					} else {
						echo "
							<style>
								.box-".$file_wext." {
								background: ".$one_colour."; /* Old browsers */
								background: -moz-linear-gradient(left,  ".$one_gradient[0]." 0%, ".$one_gradient[1]." 100%); /* FF3.6+ */
								background: -webkit-gradient(linear, left top, right top, color-stop(0%,".$one_gradient[0]."), color-stop(100%,".$one_gradient[1].")); /* Chrome,Safari4+ */
								background: -webkit-linear-gradient(left,  ".$one_gradient[0]." 0%,".$one_gradient[1]." 100%); /* Chrome10+,Safari5.1+ */
								background: -o-linear-gradient(left,  ".$one_gradient[0]." 0%,".$one_gradient[1]." 100%); /* Opera 11.10+ */
								background: -ms-linear-gradient(left,  ".$one_gradient[0]." 0%,".$one_gradient[1]." 100%); /* IE10+ */
								background: linear-gradient(to right,  ".$one_gradient[0]." 0%,".$one_gradient[1]." 100%); /* W3C */
								filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$one_gradient[0]."', endColorstr='".$one_gradient[1]."',GradientType=1 ); /* IE6-9 */
								}
							</style>
						";
					}

					echo '
						<div class="col-xs-'.$size.' box box-'.$file_wext.'" style="opacity: '.$transparency.';">
							'.$contents.'
						</div>
					';
				}
				echo '</div>';

				$row2_files = scandir('boxes' . DIRECTORY_SEPARATOR . 'row2' . DIRECTORY_SEPARATOR);
				unset($row2_files[0]);
				unset($row2_files[1]);

				echo '<div class="row">';
				foreach($row2_files as $file) {
					include('boxes' . DIRECTORY_SEPARATOR . 'row2' . DIRECTORY_SEPARATOR . $file);
					$file_wext = str_replace('.php', '', $file);

					if($one_colour == ''){
						echo "
							<style>
								.box-".$file_wext." {
								background: ".$gradient[0]."; /* Old browsers */
								background: -moz-linear-gradient(left,  ".$gradient[0]." 0%, ".$gradient[1]." 100%); /* FF3.6+ */
								background: -webkit-gradient(linear, left top, right top, color-stop(0%,".$gradient[0]."), color-stop(100%,".$gradient[1].")); /* Chrome,Safari4+ */
								background: -webkit-linear-gradient(left,  ".$gradient[0]." 0%,".$gradient[1]." 100%); /* Chrome10+,Safari5.1+ */
								background: -o-linear-gradient(left,  ".$gradient[0]." 0%,".$gradient[1]." 100%); /* Opera 11.10+ */
								background: -ms-linear-gradient(left,  ".$gradient[0]." 0%,".$gradient[1]." 100%); /* IE10+ */
								background: linear-gradient(to right,  ".$gradient[0]." 0%,".$gradient[1]." 100%); /* W3C */
								filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$gradient[0]."', endColorstr='".$gradient[1]."',GradientType=1 ); /* IE6-9 */
								}
							</style>
						";
					} else {
						echo "
							<style>
								.box-".$file_wext." {
								background: ".$one_colour."; /* Old browsers */
								background: -moz-linear-gradient(left,  ".$one_gradient[0]." 0%, ".$one_gradient[1]." 100%); /* FF3.6+ */
								background: -webkit-gradient(linear, left top, right top, color-stop(0%,".$one_gradient[0]."), color-stop(100%,".$one_gradient[1].")); /* Chrome,Safari4+ */
								background: -webkit-linear-gradient(left,  ".$one_gradient[0]." 0%,".$one_gradient[1]." 100%); /* Chrome10+,Safari5.1+ */
								background: -o-linear-gradient(left,  ".$one_gradient[0]." 0%,".$one_gradient[1]." 100%); /* Opera 11.10+ */
								background: -ms-linear-gradient(left,  ".$one_gradient[0]." 0%,".$one_gradient[1]." 100%); /* IE10+ */
								background: linear-gradient(to right,  ".$one_gradient[0]." 0%,".$one_gradient[1]." 100%); /* W3C */
								filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$one_gradient[0]."', endColorstr='".$one_gradient[1]."',GradientType=1 ); /* IE6-9 */
								}
							</style>
						";
					}

					echo '
						<div class="col-xs-'.$size.' box box-'.$file_wext.'" style="opacity: '.$transparency.';">
							'.$contents.'
						</div>
					';
				}
				echo '</div>';

				$row3_files = scandir('boxes' . DIRECTORY_SEPARATOR . 'row3' . DIRECTORY_SEPARATOR);
				unset($row3_files[0]);
				unset($row3_files[1]);

				echo '<div class="row">';
				foreach($row3_files as $file) {
					include('boxes' . DIRECTORY_SEPARATOR . 'row3' . DIRECTORY_SEPARATOR . $file);
					$file_wext = str_replace('.php', '', $file);

					if($one_colour == ''){
						echo "
							<style>
								.box-".$file_wext." {
								background: ".$gradient[0]."; /* Old browsers */
								background: -moz-linear-gradient(left,  ".$gradient[0]." 0%, ".$gradient[1]." 100%); /* FF3.6+ */
								background: -webkit-gradient(linear, left top, right top, color-stop(0%,".$gradient[0]."), color-stop(100%,".$gradient[1].")); /* Chrome,Safari4+ */
								background: -webkit-linear-gradient(left,  ".$gradient[0]." 0%,".$gradient[1]." 100%); /* Chrome10+,Safari5.1+ */
								background: -o-linear-gradient(left,  ".$gradient[0]." 0%,".$gradient[1]." 100%); /* Opera 11.10+ */
								background: -ms-linear-gradient(left,  ".$gradient[0]." 0%,".$gradient[1]." 100%); /* IE10+ */
								background: linear-gradient(to right,  ".$gradient[0]." 0%,".$gradient[1]." 100%); /* W3C */
								filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$gradient[0]."', endColorstr='".$gradient[1]."',GradientType=1 ); /* IE6-9 */
								}
							</style>
						";
					} else {
						echo "
							<style>
								.box-".$file_wext." {
								background: ".$one_colour."; /* Old browsers */
								background: -moz-linear-gradient(left,  ".$one_gradient[0]." 0%, ".$one_gradient[1]." 100%); /* FF3.6+ */
								background: -webkit-gradient(linear, left top, right top, color-stop(0%,".$one_gradient[0]."), color-stop(100%,".$one_gradient[1].")); /* Chrome,Safari4+ */
								background: -webkit-linear-gradient(left,  ".$one_gradient[0]." 0%,".$one_gradient[1]." 100%); /* Chrome10+,Safari5.1+ */
								background: -o-linear-gradient(left,  ".$one_gradient[0]." 0%,".$one_gradient[1]." 100%); /* Opera 11.10+ */
								background: -ms-linear-gradient(left,  ".$one_gradient[0]." 0%,".$one_gradient[1]." 100%); /* IE10+ */
								background: linear-gradient(to right,  ".$one_gradient[0]." 0%,".$one_gradient[1]." 100%); /* W3C */
								filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$one_gradient[0]."', endColorstr='".$one_gradient[1]."',GradientType=1 ); /* IE6-9 */
								}
							</style>
						";
					}

					echo '
						<div class="col-xs-'.$size.' box box-'.$file_wext.'" style="opacity: '.$transparency.';">
							'.$contents.'
						</div>
					';
				}
				echo '</div>';
			?>
		</div>
		</div>
	</body>

	<?php
		include('inc/javascript.php');
	?>
</html>
