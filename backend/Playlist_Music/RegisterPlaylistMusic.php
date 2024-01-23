<?php 
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Allow-Headers: Content-Type");
	require_once "../Connection.php";
	require_once "Playlist_Music.php";

	$musica_id = $_POST['musica_id'];
	$playlist_id = $_POST['playlist_id'];
	$playlist_music = new Playlist_Music($musica_id, $playlist_id);
	$playlist_music->register();
	
?>