<?php
require_once "../util/dbFunctions.php";
require_once '../model/Product.php';
class ProductService{
	public $dbFunctions;
	public $connection;

	function __construct($connection){
		$this->connection = $connection;
		$this->dbFunctions = new DBFunctions($this->connection);
	}

	function fetchProducts($args){
		$query = "SELECT * FROM products where productId = :productId";
		$bindParams = $args;
		//$id = $args['id'];
		//print_r($args);
		//$bindParams = array(":productId"=>$id);
		//print_r($bindParams);
		$className = "Product";
		return $this->dbFunctions->select($query,$bindParams,$className);
	}

	function insertProducts($args){
		$query = "INSERT into products(productName,quantity,price,units) VALUES (:productName,:quantity,:price,:units)";
		$bindParams = $args[0];
		//print_r($bindParams);
		return $this->dbFunctions->tableupdates($query,$bindParams);
	}
}


?>