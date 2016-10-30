<?php
	session_start();
	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(0);
	
	if(!isset($_SESSION['user_name']) || empty(trim($_SESSION['user_name']))) {
		die();
	}
	
	function startsWith($haystack, $needle) {
		// search backwards starting from haystack length characters from the end
		return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
	}
	
	//$file = 'model.zl';
	//$post_data = file_get_contents('compress.zlib://php://input');
	$post_data = file_get_contents('php://input');
	if(startsWith($post_data, "<?xml")) {
		$post_data = gzcompress($post_data);
	}

	//file_put_contents($file, $post_data);
	
	if(strlen($post_data) > 10) {
		$file = tempnam(sys_get_temp_dir(), 'POST');
		file_put_contents($file, $post_data);
		$xml = XMLReader::open($file);
		$xml->setParserProperty(XMLReader::VALIDATE, true);
		
		if($xml->isValid() == true) {
			include("../_incl/config.php");
			
			$dbcon = new PDO('mysql:host=' . DB_HOST . ';port=3306;dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8; SET time_zone = '-04:00'"));
			$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
			
			require_once("../_incl/tickets.class.php");
			$tickets = new Tickets();
			$tickets->setDB($dbcon);
			
			if(!isset($_GET['name']) || empty($_GET['name'])) {
				$_GET['name'] = "Untitled Model";
			}
			$name = htmlentities(trim($_GET['name']), ENT_QUOTES | ENT_IGNORE, "UTF-8");
			if(!isset($_GET['description']) || empty($_GET['description'])) {
				$_GET['description'] = "";
			}
			$description = htmlentities(trim($_GET['description']), ENT_QUOTES | ENT_IGNORE, "UTF-8");

			$stmtUp = $dbcon->prepare("INSERT INTO assets (id,name,author,type,moderated,price,forsale,descr,new_title,new_descr,updatetime) VALUES (NULL,?,?,?,?,?,?,?,?,?,now())");
			$stmtUp->execute(array(trim($name), $tickets->getIdFromUser($_SESSION['user_name']), "model", 1, 0, 1, trim($description), trim($name), trim($description)));
			$newsid = $dbcon->lastInsertId();
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, array('asset_upload' => '@'.$file, 'id' => $newsid, 'asset_type' => 'model'));
			curl_setopt($ch, CURLOPT_URL, 'http://assets.nobelium.xyz/upload.php');
			curl_exec($ch);
			curl_close($ch);
			
			die($newsid);
		} else {
			die("Invalid");
		}
		
		unlink($file);
	} else {
		die("Invalid size");
	}
?>
