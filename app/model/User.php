<?php 

namespace Model;

use Core\Database;
use \PDO;


class User extends Database{
	
	function __construct(){

	}

	// GET ALL COMMENTS 
	public static function checkUser($email,$password){
		
		$conn=self::getInstance();

		//Query statement with placeholder
		$query = "SELECT email 
		          FROM users 
		          WHERE email = ? AND password = ? ";

		//Put the parameters in an array
		$params = array($email, $password);

		//Execute it
		try {
		    $stmt = $conn->prepare($query);
		    $stmt->execute($params);

		    if($stmt->rowCount() > 0){
		        return true;
		    } else {
		        return false;
		    }
		    
		} catch(PDOException $ex) {
		    var_dump($ex->getMessage());
		}
	}

  	// INSERT NEW COMMENT
	public static function addComment($data){
		
		$conn=self::getInstance();
		$sql = "INSERT INTO comments (name, email, text) VALUES (?,?,?)";
		$conn= $conn->prepare($sql);
		$conn->execute([$data['name'], $data['email'], $data['text']]);

	}
}
?>