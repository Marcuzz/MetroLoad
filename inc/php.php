<?php
	include('config.php');
	error_reporting(0);


	if(!isset($_GET["steamid"])){
		$userID = $default_steam64;
	} else {
		$userID = $_GET["steamid"];
	}

	function convertCommunityIdToSteamId($communityId) {
		$steamId1  = substr($communityId, -1) % 2;
		$steamId2a = intval(substr($communityId, 0, 4)) - 7656;
		$steamId2b = substr($communityId, 4) - 1197960265728;
		$steamId2b = $steamId2b - $steamId1;

		return "STEAM_0:$steamId1:" . (($steamId2a + $steamId2b) / 2);
	}

	$url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . $SteamAPIKey . "&steamids=" . $userID;
	$json = file_get_contents($url);
	$table2 = json_decode($json, true);
	$table = $table2["response"]["players"][0];

	$username = $table['personaname'];
	$img = '<img src="'.$table['avatarmedium'].'" width="64px" height="64px"></img>';
	$steamid64 = $table['steamid'];
	$mapname = $_GET['mapname'];
	if(!isset($mapname)){
		$mapname = $default_map;
	}

	if($gametracker_maps) {
		$clear_mapname = $mapname;
		$mapname = 'http://image.www.gametracker.com/images/maps/160x120/garrysmod/'.$mapname.'.jpg';
	} else {
		$clear_mapname = $mapname;
		if(file_exists('maps/'.$mapname.'.png')) {
			$mapname = 'maps/'.$mapname.'.png';
		} else {
			$mapname = 'maps/'.$mapname.'.jpg';
		}
	}

	if($enable_music && $youtube_ids[0] == '') {
		$dir = 'music';
		$playlist = [];

		foreach(glob($dir.'/*.ogg') as $file) {
			$files[] = $file;

			$play_name = str_replace('music/', '', $file);
			$play_name = str_replace('.ogg', '', $play_name);

			if (file_exists('music/' . $play_name . ".txt")) {
				$play_file = file_get_contents('music/' . $play_name . ".txt");
				$play_name = $play_file;
			}

			$playlist[] = [
				'file' => $file,
				'name' => $play_name
			];
		}

		shuffle($playlist);

		#die(var_dump($playlist));
	}

	if($enable_music && $youtube_ids[0] != '') {
		$n = array_rand($youtube_ids);
		$youtube_id = $youtube_ids[$n];
		$youtube_name = $youtube_names[$n];
	}

	foreach($colours as $colour) {
		$colours_l .= "'" . $colour . "', ";
	}
	$colours_l = rtrim($colours_l, ", ");
	$colours_l = "[" . $colours_l . "]";

	if($enable_img_cycling) {
		$dir = 'backgrounds';
		foreach(glob($dir.'/*.*') as $image) {
			$images .= "<img src='".$image."' width='100%' height='100%' />";
		}
	}
?>
