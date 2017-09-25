<?php
$myLoginEmail = "";
$myLoginPassword = "";
$mySignupEmail = "";
$mySignupPassword = "";
$mySignupName = "";
$mySignupSurname ="";
$mySignupGender = "";
$signupBirthMonth ="";

$monthNamesEt = ["Jaanuar", "Veebruar", "Märts" , "Aprill", "Mai", "Juuni", "Juuli", "August", "September", "Oktoober", "November", "Detsember"];

//synnikuu valik
$signupMonthSelectHTML="";
$signupMonthSelectHTML .= '<select name="signupBirthMonth">\n';
$signupMonthSelectHTML .='<option value="" selected disabled>Vali synnikuu</option> ."\n"';



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
	if (isset($_POST["gender"]) && !empty($_POST["gender"])){ //kui on määratud ja pole tühi
			$gender = intval($_POST["gender"]);
		} else {
			//$signupGenderError = " (Palun vali sobiv!) Määramata!";
	}
	if(isset($_POST["signupBirthMonth"])){
		$signupBirthMonth = intval($_POST["signupBirthMonth"]);
	}
	
	foreach($monthNamesEt as $key=>$month){
	if($key + 1 === $signupBirthMonth){
		$signupMonthSelectHTML .= '<option value="' .($key + 1) .'" selected>' .$month .'</option> ."\n"';
	}
	else {
		$signupMonthSelectHTML .= '<option value="' .($key + 1) .'">' .$month .'</option> ."\n"';
	}
}
	$signupMonthSelectHTML .='</select> ';

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
		<label for="loginEmail">Login</label>
		<input id="loginEmail" name="loginEmail" type="email">
		<label for="loginPassword">Parool</label>
		<input id="loginPassword" name="loginPassword" type="password">
		<input id="submitEmail" name="submitEmail" id="submitPassword" name="submitPassword" type="submit" value="kinnita">
		
	</form>
		
	<h2> Uus kasutaja:</h2>
	<p> Sisestage oma andmed</p>
	<form method="POST">
		<label for="signupFirstName">Nimi</label>
		<input name="signupFirstName" type="text">
		<label for="signupSurName">Perekonnanimi</label>
		<input name="signupSurName" type="text">
		<p></p>
		<label>Sugu</label><span>
		<br>
		<input type="radio" name="$mySignupGender" id="mees" value="1" <?php if ($mySignupGender == '1') {echo 'checked';} ?>><label>Mees</label> <!-- Kõik läbi POST'i on string!!! -->
		<input type="radio" name="$mySignupGender" id="naine" value="2" <?php if ($mySignupGender == '2') {echo 'checked';} ?>><label>Naine</label>
		<br><br>
		
		<?php
		
		?>
		<p></p>
		<label for="signupEmail">Teie Email</label>
		<input name="signupEmail" type="email">
		<label for="signupPassword">Teie parool</label>
		<input name="signupPassword" type="password">
		<p></p>
		<input name="signupFirstName" name="signupSurName" name="gender" name="signupEmail" name="signupPassword" type="submit" value="Kinnita">
		<label>Sisesta oma synnikuupaev</label>
		<?php
			echo$signupMonthSelectHTML;
		?>
	</form>
	</body>
</html>
