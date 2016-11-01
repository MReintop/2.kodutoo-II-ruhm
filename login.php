<?php

require("../../config.php");
require("functions.php");

if(isset($_SESSION["userID"])){
	
	header("Location:data.php");
	exit();
}


	
	//MUUTUJAD
	$signupEmailError = "";
	$signupPasswordError = "";
	$registerEmailError = "";
	$registerPasswordError ="";
	$signupEmail = "";	
	$registerEmail = "";
	$personalError = "";
	
	
	if(isset($_POST["personal"])) {
		if( empty($_POST["personal"])){
			
			$personalError = "Kirjuta enda kohta midagi! :)";
		}
		
	}
	


	if( isset($_POST["signupEmail"] )){

	

		if( empty($_POST["signupEmail"])) {

			$signupEmailError = "see väli on kohustuslik";
			
		}else{
			
			//email olemas
			$signupEmail=$_POST["signupEmail"];



			}
	}



	if( isset($_POST["signupPassword"])) {

		if( empty($_POST["signupPassword"])) {

			$signupPasswordError = "see väli on kohustuslik";
		}else{
		//Siia jõuan siis, kui parool oli olemas ja parool ei olnud tühi. !ELSE!
			if(strlen($_POST["signupPassword"])<8) {

				$signupPasswordError = "Parool peab olema vähemalt 8 märki pikk";
			}




	}
	}

	if( isset($_POST["registerEmail"] )){

		

		if( empty($_POST["registerEmail"])) {

			$registerEmailError = "e-mail on kohustuslik";
         }else{
			
			//email olemas
			$registerEmail=$_POST["registerEmail"];




		}
	}



if( isset($_POST["registerPassword"] )){

		

		if( empty($_POST["registerPassword"])) {

			$registerPasswordError = "parool on kohustuslik";
			
			
		} else {

             if(strlen($_POST["registerPassword"])<8) {

				$registerPasswordError = "Parool peab olema vähemalt 8 märki pikk";
			}

		}
	}



	
	if($registerEmailError == "" && empty ($registerPasswordError) && isset($_POST["registerEmail"])
			&& isset($_POST["registerPassword"])&& isset($_POST["personal"]))  {
			
	
		
		//salvestame andmebaasi
		
		echo "Salvestan...";
		echo "email : ".$_POST["registerEmail"]."<br>";
		echo "password: ".$_POST["registerPassword"]."<br>";
		
		$password = hash("whirlpool", $_POST["registerPassword"]);
		
		
		signUp((cleanInput($registerEmail)),(cleanInput($password)));
	
		
	
	}
	
//var_dump($_POST);
$error="";

if( isset($_POST["signupEmail"]) && isset($_POST["signupPassword"])&& isset($_POST["personal"])&&
			!empty($_POST["signupEmail"]) && !empty($_POST["signupPassword"]) && !empty($_POST["personal"])
			){
				
				$error = login(cleanInput($_POST["signupEmail"]),(cleanInput($_POST["signupPassword"])));
			}
	
	
?>


<!DOCTYPE html>
<html>
<head>
<title>´Logi sisse või loo kasutaja</title>
</head>
<body background="http://www.pixeden.com/media/k2/galleries/165/004-subtle-light-pattern-background-texture-vol5.jpg">

<br><br><br><br><br>

<center><h2><font face="verdana" color="green">Logi sisse</font></h2></center>



	<center><form method=POST>



		<input name=signupEmail placeholder="e-mail" type="text" value="<?=$signupEmail;?>"> <?php echo $signupEmailError;  ?>

	<br><br>


		<input name=signupPassword placeholder="parool" type="password"> <?php echo $signupPasswordError; ?>

	<br><br>

		<input type="submit" value="Logi sisse">
	<br><br>
	<br><br><br>



	</form></center>

	
	<center><h2><font face="verdana" color="green">Loo kasutaja</font></h2></center>
	

	<center><?php echo $registerEmailError;?></center>
	<center><?php echo $registerPasswordError;?></center>
	

	<center><form method=post>

	<input type=text  name=registerEmail  placeholder="Sisesta meiliaadress" value="<?=$registerEmail;?>"> <br><br>
	
	

	<input type=password name=registerPassword  placeholder="Vali parool" > <br><br>
	<br><br><?php echo $personalError;  ?>
	<center><h2><font face="verdana" color="green"> Kirjuta enda kohta midagi huvitavat</font><br>
	<input type=text name=personal placeholder="Kirjuta midagi enda kohta" size=50> <br><br>
	
	<input type="submit" value="Kinnitan">
	
	



	</form></center>
	

	


	



</body>
</html>
