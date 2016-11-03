<?php class Plant {
	
	private $connection;
	public $name;
	
	function __construct($mysqli){
		
		//This viitab klassile (THIS ==USER)
		$this->connection = $mysqli;
		
	}
	/*TEISED FUNKTSIOONID*/
	
	function save ($plant, $watering) {
		
		
		$stmt = $this->connection->prepare(
		"INSERT INTO flowers (plant, wateringInterval) VALUES (?,?)");
		
		echo $this->connection->error;
		
		
		
		//asendan küsimärgi
		$stmt->bind_param("ss", $plant,$watering);
		
		if ( $stmt->execute() )  {
			
			echo "salvestamine õnnestus";
			
		}  else  {
			
			echo "ERROR".$stmt->error;
		}
		
		
	}
	
	function getAll() {
		
		
	
		
		
		$stmt = $this->connection->prepare("
		
		  SELECT id, plant,wateringInterval FROM flowers
		 
		");
		echo $this->connection->error;
		
		
		$stmt -> bind_result ($id, $plant,$watering) ;
		$stmt ->execute();
		
		//tekitan massiivi
		
		$result=array();
		
		//Tee seda seni, kuni on rida andmeid. ($stmt->fech)
		//Mis vastab select lausele.
		//iga uue rea andme kohta see lause seal sees
		
		while($stmt->fetch()){
			
			//tekitan objekti
			
			$plantGroup = new StdClass();
			
		    $plantGroup->id=$id;
			$plantGroup->taim=$plant;
			$plantGroup->intervall=$watering;
			
			
			
			array_push($result, $plantGroup);
		}
		
		
		
	}
}
	
?>