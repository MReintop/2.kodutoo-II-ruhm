<?php

	require("../../config.php");
	require("../../config.php");
	require("User.class.php");
	require("Helper.class.php");
	require("Plant.class.php");
	
	
	//ÜHENDUS
	
	$database = "if16_mreintop";
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	
	
	$User = new User($mysqli);
	$Plant = new Plant($mysqli);
	$Helper = new Helper($mysqli);
	
	// see fail, peab olema k�igil lehtedel kus 
	// tahan kasutada SESSION muutujat
	session_start();
	
	//***************
	//**** SIGNUP ***
	//***************
	
	
	




	

?>