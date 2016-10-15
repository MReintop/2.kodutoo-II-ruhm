<?php 
	
	
	require("functions.php");
	
	$taim="";
	$intervall="";
	$plantError="";
	$intervalError="";
	
	
	//kui ei ole kasutaja id'd
	if (!isset($_SESSION["userId"])){
		
		//suunan sisselogimise lehele
		header("Location: login.php");
		exit();
		
	}
	
	//kui on ?logout aadressireal siis login välja
	if (isset($_GET["logout"])) {
		
		session_destroy();
		header("Location: login.php");
		exit();
		
	}
	
	$msg = "";
	if(isset($_SESSION["message"])) {
		
		$msg = $_SESSION["message"];
		
		//kustutan ära, et pärast ei näitaks
		unset($_SESSION["message"]);
	}
	
	if (isset($_POST["taim"]) &&
		(isset($_POST["kastmiskorda"]) &&
		!empty($_POST["taim"]) &&
		!empty($_POST["kastmiskorda"])
		)) {
			
			savePlant(cleanInput($_POST["taim"]), $_POST["kastmiskorda"]);
			
			header("Location: data.php");
		    exit();
		}
		
		$plantData=getAllPlants();
		
		//echo"<pre>";
		//var_dump($plantData);
		//echo"</pre>";
		
	

	if( isset($_POST["taim"] )){

	

		if( empty($_POST["taim"])) {

			$plantError = "sisesta taime nimetus";
			
		}else{
			
			
			$taim=$_POST["taim"];



			}
	}
	
	if( isset($_POST["kastmiskorda"])) {
		
		if( empty($_POST["kastmiskorda"]))
        {
			$intervalError = "Sisesta kastmisintervall";
			
			} else { 
			
			$intervall = $_POST["kastmiskorda"];
		
		}		
	}
	
?>


<html>
<head>
<title>Pealkiri</title>
</head>
<body background = "http://www.intrawallpaper.com/static/images/HD-Background-Wallpapers-7_0tMpSq2.jpg">


<center><h1><font face="verdana" color="green">Andmete sisestamine</font></h1></center>

<center><h2><font face="verdana" color="green"> Salvesta toataim</font> </h2></center>


	<center><form method=POST>
   

          
	 <p><font face="verdana">Sisesta taime nimetus</font></p>
		<input name="taim" placeholder="taime nimetus"  type="text" > 

	<br><br>

        <p><font face="verdana">Sisesta taime kastmisintervall(iga mitme päeva tagant)</font></p>
		<input name="kastmiskorda" placeholder="mitme päeva tagant"  type ="number"> 

	<br>

		<input type="submit" value="Salvesta">
	<br><br>
	
	</form></center>




	
	
	
	
	<center><?php
	
	$html = "<table>";
	$html .= "<tr>";
		$html .= "<th>nr</th>";
		$html .= "<th>id</th>";
		$html .= "<th>taim</th>";
		$html .= "<th>intervall</th>";
	$html .= "</tr>";
	
	$i = 1;
	//iga liikme kohta massiivis
	foreach($plantData as $p) {
		//iga taim on $p
		//echo $p->taim."<br>";
	
		
		$html .= "<tr>";
			$html .= "<td>".$i."</td>";
			$html .= "<td>".$p->id."</td>";
			$html .= "<td>".$p->taim."</td>";
			$html .= "<td>".$p->intervall."</td>";
		$html .= "</tr>";
		
		$i += 1;
	}
	
	$html .= "</table>";
	
	echo $html;
	
	$listHtml="<br><br>";
	
	
	
	echo $listHtml;
	?></center>
	
	
	
	
	
	
	
	
	
<br><br>
<center><p><font face="verdana" color="green">
	Tere tulemast <?=$_SESSION["userEmail"];?>!
	<a href="?logout=1">Logi välja</a>
	</font>
</p></center>
	





</body>
</html>



