<?php
	require("functions.php");
	$notice = "";
	$allIdeas = "";
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

	/*
	while($stmt->fetch()){
		
	}
	*/
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
	// kui soovitakse idee salvestada
	if(isset($_POST["ideaBtn"])){
		if(isset($_POST["ideaBtn"]) and isset($_POST["ideaColor"]) and !empty($_POST["ideaBtn"]) and !empty($_POST["ideaColor"])){
			$myIdea = test_input($_POST["idea"]);
			$notice = saveIdea($myIdea, $_POST["ideaColor"]);
		}
	}
	$allIdeas = readAllIdeas();
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
	<p><a href="?logout=1">Logi valja</a>!</p>
	<p><a href="main.php">Pealeht</a></p>
	<hr>
	<h2> Lisa uus mõtte </h2>
	<form method="POST" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>">
		<label>Päeva esimene mõtte: </label>
		<input name="idea" type="text">
		<br>
		<label>mõttega seostuv värv: </label>
		<input name="ideaColor" type="color">
		<br>
		<input name="ideaBtn" type="submit" value="Salvesta">
		<span><?php echo $notice; ?></span>
	</form>
	<hr>
	<h2>Senised mõtted</h2>
	<div style="width:40%">
		<?php echo $allIdeas; ?>
		
	</div>
	
</body>
</html>