<?php
$myLoginEmail = "";
$myLoginPassword = "";
$mySignupEmail = "";
$mySignupPassword = "";
$mySignupName = "";
$mySignupSurname ="";
$mySignupGender = "";
	if(isset($_POST["loginEmail"])){
		$myLoginEmail = $_POST["loginEmail"];
	}
	if(isset($_POST["loginPassword"])){
		$myLoginPassword = $_POST["loginPassword"];
	}
	if(isset($_POST["signupEmail"])){
		$mySignupEmail = $_POST["signupEmail"];
	}
	if(isset($_POST["signupPassword"])){
		$mySignupPassword = $_POST["signupPassword"];
	}
	if(isset($_POST["signupFirstName"])){
		$mySignupName = $_POST["signupFirstName"];
	}
	if(isset($_POST["signupSurName"])){
		$mySignupSurname = $_POST["signupSurName"];
	}
	if(isset($_POST["gender"])){
		$mySignupGender = $_POST["gender"];
	}
	
	

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> 
			Login 
		</title>
	</head>
	
	<body>
	
	<form method="POST">
		<input id="loginEmail" name="loginEmail" type="email">
		<input id="loginPassword" name="loginPassword" type="password">
		<input id="submitEmail" name="submitEmail" id="submitPassword" name="submitPassword" type="submit" value="kinnita">
		
	</form>
		
	<p> Loome uut kasutajat:</p>
	<p> Sisestage oma andmed</p>
	<form method="POST">
		<label for="signupFirstName">Nimi</label>
		<input name="signupFirstName" type="text">
		<label for="signupSurName">Perekonnanimi</label>
		<input name="signupSurName" type="text">
		<p></p>
		<label for="mees">Mees</label>
		<input type="radio" name="gender" id="mees" value="1">
		<label for="naine">Naine</label>
		<input type="radio" name="gender" id="naine" value="2">
		<?php
		
		?>
		<p></p>
		<label for="signupEmail">Teie Email</label>
		<input name="signupEmail" type="email">
		<label for="signupPassword">Teie parool</label>
		<input name="signupPassword" type="password">
		<p></p>
		<input name="signupFirstName" name="signupSurName" name="gender" name="signupEmail" name="signupPassword" type="submit" value="Kinnita">
	</form>
	</body>
</html>
