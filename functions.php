<?php

	require("../../config.php");
	require("../../config.php");
	require("User.class.php");
	require("Helper.class.php");
	require("Plant.class.php");
	
	
	//ÃœHENDUS
	
	$database = "if16_mreintop";
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	
	
	$User = new User($mysqli);
	$Plant = new Plant($mysqli);
	$Helper = new Helper($mysqli);
	
	// see fail, peab olema kõigil lehtedel kus 
	// tahan kasutada SESSION muutujat
	session_start();
	
	//***************
	//**** SIGNUP ***
	//***************
	
	
	




	

?>