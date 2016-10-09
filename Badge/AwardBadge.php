<?php
	
	header("Content-Encoding: none");
	include("../../rblxdev_user/database.incl.php");
	
	if(empty($_GET)) { die("empty"); }
	
	try {
		$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	} catch(PDOException $ex) {
		die("false db");
	}
	
	// /Game/Badge/AwardBadge.ashx?UserID=%d&BadgeID=%d&PlaceID=%d
	
	$stmt = $db->prepare("SELECT * FROM badges WHERE id = :bid;");
	$stmt->bindParam(':bid', $_GET['BadgeID'], PDO::PARAM_INT);
	$sq = $stmt->execute();
	$result0 = $stmt->fetchAll();
	
	if($stmt->rowCount() < 1) {
		die("Invalid RBLXDev badge ID " . $_GET['BadgeID'] . "!");
	} else {
		$stmt1 = $db->prepare("SELECT * FROM users WHERE user_id = :uid");
		$stmt1->bindParam(':uid', $_GET['UserID'], PDO::PARAM_INT);
		$sq1 = $stmt1->execute();
		$result1 = $stmt1->fetchAll();
		foreach($result1 as $row1)
		{
			$stmt2 = $db->prepare("INSERT INTO obt_badges (badgeid, user) VALUES (:bid, :uid)");
			$stmt2->bindParam(':bid', $_GET['BadgeID'], PDO::PARAM_INT);
			$stmt2->bindParam(':uid', $_GET['UserID'], PDO::PARAM_INT);
			$sq2 = $stmt2->execute();
			
			foreach($result0 as $row0)
			{
				$stmt4 = $db->prepare("SELECT * FROM users WHERE user_id = :usr");
				$stmt4->bindParam(':usr', $_GET['UserID'], PDO::PARAM_STR);
				$sq4 = $stmt4->execute();
				$result4 = $stmt4->fetchAll();
				foreach($result4 as $row4)
				{
					// <user> won <creator>'s "<badge name>" award!
					echo $row4['user_name'] . " won " . $row0['creator'] . "'s \"" . $row0['name'] . "\" award!";
					die();
				}
			}
			
		}
	}
	
	
	
?>