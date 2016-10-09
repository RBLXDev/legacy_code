<?php
	
	header("Content-Encoding: none");
	include("../../rblxdev_user/database.incl.php");
	
	if(!isset($_GET['id']) || !isset($_GET['bid'])) { die("0"); }
	
	try {
		$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	} catch(PDOException $ex) {
		die("false db");
	}
	
	$stmt = $db->prepare("SELECT * FROM obt_badges WHERE badgeid = :bid AND user = :uid;");
	$stmt->bindParam(':badgeid', $_GET['bid'], PDO::PARAM_INT);
	$stmt->bindParam(':uid', $_GET['id'], PDO::PARAM_INT);
	$sq = $stmt->execute();
	
	if($stmt->rowCount() < 1) {
		die("0");
	} else {
		die("1");
	}
	
	
	
?>