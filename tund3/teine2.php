<?php
	// Muutujad
	$myName = "Sergei";
	$myFamilyName = "Frolov";
	$myAge = 0;
	$myBirthYear;
	$myLivedYearsList = "";

	$monthNamesEt = ["Jaanuar", "Veebruar", "Märts" , "Aprill", "Mai", "Juuni", "Juuli", "August", "September", "Oktoober", "November", "Detsember"];
	
	//var_dump($monthNamesEt);
	//echo $monthNamesEt[8];
	
	
	
	// html for POST and GET
	//  <ul> <li>1998</li> 	</ul>
	//	<ol> <li>1234</li> </ol>
	
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
	
	// kasutaja sisestas
	/*if (isset($_POST["yearBirth"])){
		$myBirthYear = $_POST["yearBirth"];
		$myAge = date("Y") - $myBirthYear;
		
		// kõik aastat mis sa oled elanud
		$myLivedYearsList .="<ol> \n";
		for($i=myBirthYear; $i<= date("Y"); $i++){
			//echo $i ." ";
			$myLivedYearsList .= "<li>" .$i ."</li> \n";
		}
		$myLivedYearsList .= "</ol> \n";
		
	} */
	//var_dump(%_POST);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Yo, Froll siin</title>
		
		<p>Minu sõber ALexander teeb veebi <a href="../../../../~lawralex/Veebiprogrammeerimine">siin</a>.</p>
		

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
			$monthIndex = date("n") - 1; 
			echo date("d ") .$monthNamesEt[$monthIndex] .date(" Y");
			echo ".</p>";
			echo "Lehe laaimise hetkel oli kel: " .date("H:i:s")."</p>";
			
		?>
		<p> PHP käivitatkse lehe laadimisel ja siis tehakse kogu töö ära. Hilljem, kui vaja midagi jälle "kalkuleerida", siis laetakse kogu leht uuesti. </p>
		<?php
			echo "<p> Lehe autori täisnimi on: " .$myName ." " .$myFamilyName .".";
		?>
		<h2>Vanus</h2>
		<p> Sisesta synniaasta!</p>
		<form method="POST">
			<label>Teie synniaasta: </label>
			<input id="yearBirth" name="yearBirth" type="number" min="1900" max="2017" value="<?php echo$myBirthYear; ?>">
			<input id="submitYearBirth" name="submitYearBirth" type="submit" value="Kinnita">
		
		
		</form>
		
		<p>Teie vanus on <?php echo $myAge; ?> aastat.</p>
		<?php
			if ($myLivedYearsList != ""){
				echo "<h3>Oled elanud järgnevatel aastatel</h3> \n";
				echo $myLivedYearsList;
			}
		?>
		<h2> Paar Linki</h2>
		<p>Õpime <a href="http://www.tlu.ee" target="_blank">Tallinna Ülikoolis</a>.</p>
		<p>Minu esimene php leht on <a href="../esimene.php">siin</a>.</p>
		<p>Pilti ülikoolist näeb <a href="foto.php">siin</a>.</p>
	</body>
</html>