<?php 

include './db.php';

$db = new Database("localhost", "urlshorter", "root", "");
$db = $db->connect();

$url = $_POST['long_url'];


$query = "INSERT INTO tbl_urlshortner (long_url) VALUES (:long_url)";
$stmt = $db->prepare($query);
$params = array(
	"long_url" => $url
);
$result = $stmt->execute($params);
header("location: /urlshortnerapp/?i=" . $db->lastInsertId());
//print_r($result);