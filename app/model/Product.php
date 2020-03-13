<?php 
namespace Model;

use Core\Database;
use \PDO;

class Product extends Database{
	
	function __construct(){

	}

	// GET ALL CITRUS 
	public static function getAllCitrus(){
		
		$conn=self::getInstance();
		return $result = $conn->query("SELECT * FROM products");
	}
}

?>