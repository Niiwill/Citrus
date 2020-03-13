<?php 

namespace Core;
use \PDO;

// Singleton class for Database connection
class Database 
{
	
	private static $objInstance;

	
	private function __construct() {}


	public static function getInstance() {

		$db_info = array(
			"db_host" => "localhost",
			"db_user" => "root",
			"db_pass" => "",
			"db_name" => "citrus",
			"db_charset" => "utf8mb4"
		);

		if(!self::$objInstance){

			try{
				self::$objInstance= new PDO("mysql:host=".$db_info['db_host'].';dbname='.$db_info['db_name'], $db_info['db_user'], $db_info['db_pass']);

				self::$objInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


			}catch(PDOException $e){
				die($e->getMessage());
			}

		}
		return self::$objInstance;

	}

}

?>