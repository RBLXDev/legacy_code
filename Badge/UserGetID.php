<?php
	
	header("Content-Encoding: none");
	include("../../rblxdev_user/database.incl.php");
	
	if(!isset($_GET['id']) || !isset($_GET['bid'])) { die("-1"); }
	
	try {
		$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	} catch(PDOException $ex) {
		die("false db");
	}
	
	$stmt = $db->prepare("SELECT user_id FROM users WHERE user_name = :username");
	$stmt->bindParam(':username', $_GET['id'], PDO::PARAM_STR);
	$sq = $stmt->execute();
	$result = $stmt->fetchAll();
	foreach($result as $row)
	{
		echo $row['user_id'];
	}
	
	die();
	
?>