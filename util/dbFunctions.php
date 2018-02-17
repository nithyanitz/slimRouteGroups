<?php
class DBFunctions{
	public $connection;

	public function __construct($connection){
		$this->connection = $connection;
	}

	public function select($query,$bindParams,$className){
		try{
		$statement = $this->connection->prepare($query);
		$statement->execute($bindParams);
		$resultSet = $statement->fetchAll(PDO::FETCH_CLASS,$className);
		return $resultSet;
	}catch(PDOException $exception){
		return $exception->getMessage();
	}
}

	public function tableUpdates($query,$bindParams){
		try{
			$statement = $this->connection->prepare($query);
			$statement->execute($bindParams);
			/*$response = $response->withJSON(array("status"=>"insertion successful"));*/
			return array("status"=>"insertion successful");
		}catch(PDOException $exception){
		return array("status"=>$exception->getMessage());
	}
	}
}
?>