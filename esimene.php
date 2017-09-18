<?php
	// Muutujad
	$myName = "Sergei";
	$myFamilyName = "Frolov";
	$practiceStarted = date("d.m.Y") ." " ."8:15";
	
	//echo strtotime($practiceStarted);
	//echo strtotime("now");
	$timePassed = strtotime("now") - strtotime($practiceStarted);
	
	$timePassed = round((strtotime("now") - strtotime($practiceStarted)) / 60);
	echo $timePassed . " ";
	
	$hourNow = date("H");
	$partOfDay = "";
	
	if ($hourNow < 8){
		$partOfDay = "Varane hommik. ";
	}
		else{
			$partOfDay = "koolipäev";
	}
	echo $partOfDay;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Yo, Froll siin</title>
		
		

	</head>

	<body>
		
		<h1>Froll siin</h1>
		<p>Harjutus #1</p>

		<p>Update 09.04.2017 14:17</p>
		<p></p>
		<p></p>
		<p>Kodutöö tehtud</p>
		<p>+++</p>
		
		<?php
			echo "<p>Ilm on hea</p>";
			echo "<p>Täna on ";
			echo date("d.m/Y");
			echo ".</p>";
			echo "Lehe laaimise hetkel oli kel: " .date("H:i:s")."</p>";
			
		?>
		<p> PHP käivitatkse lehe laadimisel ja siis tehakse kogu töö ära. Hilljem, kui vaja midagi jälle "kalkuleerida", siis laetakse kogu leht uuesti. </p>
		<?php
			echo "<p> Lehe autori täisnimi on: " .$myName ." " .$myFamilyName .".";
		?>
		
	
	</body>
</html>