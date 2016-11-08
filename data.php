<?php 
	
	
	require("functions.php");
	
	$plant="";
	$wateringInterval="";
	$plantError="";
	$wateringIntervalError="";
	
	
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
	
	if (isset($_POST["user_plant"]) &&
		(isset($_POST["waterings"]) &&
		!empty($_POST["user_plant"]) &&
		!empty($_POST["waterings"])
		)) {
			
			savePlant(cleanInput($_POST["user_plant"]), $_POST["waterings"]);
			
			header("Location: data.php");
		    exit();
		}
		
		$plantData=getAllPlants();
		
		//echo"<pre>";
		//var_dump($plantData);
		//echo"</pre>";
		
	

	if( isset($_POST["user_plant"] )){

	

		if( empty($_POST["user_plant"])) {

			$plantError = "Sisesta taime nimetus!  ";
			
		}else{
			
			
			$plant=$_POST["user_plant"];



			}
	}
	
	if( isset($_POST["waterings"])) {
		
		if( empty($_POST["waterings"]))
        {
			$wateringIntervalError = "  Sisesta kastmisintervall!  ";
			
			} else { 
			
			$wateringInterval = $_POST["waterings"];
		
		}		
	}
	
?>


<html>
<head>
<title>Kalender</title>
</head>
<body background = "http://www.pixeden.com/media/k2/galleries/165/004-subtle-light-pattern-background-texture-vol5.jpg">
<center>
<br><br>
 Tere tulemast     <a href="user.php"><?=$_SESSION["firstName"];?>!</a>

<h2><font face="verdana" color="#006600"> Toataimede sisestamine</font> </h2></center>


	<center><form method=POST>
		<?php echo $plantError;  ?>
		<?php echo $wateringIntervalError;  ?>

          
	 <p><font face="verdana" color="#006600">Sisesta taime nimetus</font></p>
		<input name="user_plant" placeholder="taime nimetus"  type="text" value="<?=$plant;?>" > 

	<br><br>

        <p><font face="verdana"color="#006600">Sisesta taime kastmisintervall</font></p>
		<input name="waterings" placeholder="mitme päeva tagant"  type ="number"> 

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
	?><center>
	
	<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;height=400&amp;wkst=2&amp;hl=en_GB&amp;bgcolor=%23ffccff&amp;src=mreintop%40gmail.com&amp;color=%231B887A&amp;ctz=Europe%2FTallinn" style="border-width:0" width="800" height="400" frameborder="0" scrolling="no"></iframe>
	
	
	
	
		<a href="?logout=1">Logi välja</a>
	</font>
	
</center>


</body>
</html>

