<?php 
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Allow-Headers: Content-Type");
	require_once "Connection.php";
	require_once "Music.php";

	$nome = $_POST['nome'];
	$artista = $_POST['artista'];
	$genero = $_POST['genero'];
	$link = $_POST['link'];

	$link = substr($link, 32);

	$music = new Music($nome, $artista, $genero, $link);
	$music->register();
	
?>