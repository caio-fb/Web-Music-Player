<?php 
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Allow-Headers: Content-Type");
	require_once "../Connection.php";
	require_once "Playlist.php";

	$nome = $_POST['nome'];
	$playlist = new Playlist($nome);
	$playlist->register();
	
?>