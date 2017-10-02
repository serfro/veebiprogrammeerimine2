<?php
	require("functions.php");
	
	// kui pole sisseloginud, siis sisselegimise lehele
	if(!isset($_SESSION["userId"])){
		header("Location: login.php");
		exit();
	}
	
	//kui logib valja
	
	if (isset($_GET["logout"])){
		// l6petame sessiooni
		session_destroy();
		header("Location: login.php");
	}

	$dirToRead = "../../pics/";
	//kuna tahan ainult pildifaile, siis filtreerin
	$picFileTypes = ["jpg", "jpeg", "png", "gif"];
	$picFiles = [];
	//$allFiles = scandir($dirToRead);
	//loen kataloogi ja viskan kaks esimest massiivi liiget (. ja ..) välja
	$allFiles = array_slice(scandir($dirToRead),2);
	//var_dump($allFiles);
	
	//tsükkel, mis töötab ainult massiividega
	foreach ($allFiles as $file){
		$fileType = pathinfo($file, PATHINFO_EXTENSION);
		//kas see tüüp on lubatud nimekirjas
		if (in_array($fileType, $picFileTypes) == true){
			array_push($picFiles, $file);
			//$picFiles[] = $file;
		}
	}//foreach lõppeb
	//var_dump($picFiles);
	
	//mitu pilti on?
	$fileCount = count($picFiles);
	$picNumber = mt_rand(0, $fileCount - 1);
	$picToShow = $picFiles[$picNumber];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		YO
	</title>
</head>
<body>
	<h1>YO</h1>
	
	<p>See veebileht on loodud veebiprogrammeerimise kursusel ning ei sisalda mingisugust tõsiseltvõetavat sisu.</p>
	<p><a href="?logout=1">Logi valja</a></p>
	<p><a href="userinfo.php">Kasutajate info</a></p>
	<p>Üks pilt Tallinna Ülikoolist!</p>
	<img src="<?php echo $dirToRead .$picToShow; ?>" alt="Tallinna Ülikool">
	
</body>
</html>