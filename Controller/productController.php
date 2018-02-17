<?php
//namespace productController;
require_once '../services/productService.php';


class productController{
	public $productService;
	public $connection;

	function __construct($connection){
		$this->connection = $connection;
		$this->productService = new ProductService($this->connection);
	}

	function fetchProducts($args){
		return $this->productService->fetchProducts($args);
	}

	function insertProducts($args){
		return $this->productService->insertProducts($args);
	}
}




?>