<?php
	include './db.php';

	$db = new Database("localhost", "urlshorter", "root", "");
	$db = $db->connect();

	$id = $_GET['c'];

	$query = "SELECT * FROM tbl_urlshortner WHERE ID = :ID LIMIT 1";
	$stmt = $db->prepare($query);

	$params = array(
		"ID" => $id
	);

	$stmt->execute($params);

	$url = $stmt->fetch();
	print_r($url);

	header("location: " . $url['long_url']);
	