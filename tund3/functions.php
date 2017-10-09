<?php
/*
$x = 5;
$y = 6;
addValues();
function addValues(){
	$z = $GLOBALS["x"] + $GLOBALS["y"] ."\n";
	echo "Summa on: " .$z;
	
}
*/
$database = "if17_frolov";\

//alustame sessiooni
session_start();


function signIn($email, $password){
	$notice = "";
	// yhendus serveriga
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $mysqli->prepare("SELECT id, email, password FROM vpusers where email = ?");
	$stmt->bind_param("s", $email);
	$stmt->bind_result($id, $emailFromDb, $passwordFromDb);
	$stmt->execute();
	
	
	if($stmt->fetch()){
		$hash = hash("sha512", $password);
		if($hash == $passwordFromDb){
			$notice = "Loggisite sisse!";
			
			//m22ran sessiooni muutujad
			$_SESSION["userId"] = $id;
			$_SESSION["userEmail"] = $emailFromDb;
			
			
			//liigume edasi pealehele (main.php)
			header("Location: main.php");
			exit();
		} else {
			$notice = "Vale salasona!";
		}
	} else {
		$notice = 'Sellise kasutajatunnusega "' .$email .'" pole registreeritud!';
	}
	
	$stmt->close();
	$mysqli->close();
	return $notice;
}
function test_input($data){
		$data = trim($data);//ebavajalikud tyhikud
		$data = stripslashes($data);//kaldkriipsud jms eemaldada
		$data = htmlspecialchars($data);//keelatud symbolit
		return $data;
	}
//kasutaja salvestamise funktioon
function signUp($signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword){
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		//valmistame ette käsu andmebaasiserverile
		$stmt = $mysqli->prepare("INSERT INTO vpusers (firstname, surname, birthday, gender, email, password) VALUES (?, ?, ?, ?, ?, ?)");
		echo $mysqli->error;
		//s - string
		//i - integer
		//d - decimal
		$stmt->bind_param("sssiss", $signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword);
		//$stmt->execute();
		if ($stmt->execute()){
			echo "\n Õnnestus!";
		} else {
			echo "\n Tekkis viga : " .$stmt->error;
		}
		$stmt->close();
		$mysqli->close();
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	?>