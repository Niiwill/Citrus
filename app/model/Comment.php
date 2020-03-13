<?php 
namespace Model;

use Core\Database;
use \PDO;

class Comment extends Database{
	
	function __construct(){

	}

	// GET ALL COMMENTS 
	public static function getAllComments($published){

		$conn=self::getInstance();
		$sql="SELECT * FROM comments ";
		if($published){
			$sql.="WHERE published=1";	
		}
		return $result = $conn->query($sql);
	}

  	// INSERT NEW COMMENT
	public static function addComment($data){
		
		$conn=self::getInstance();
		$sql = "INSERT INTO comments (name, email, text) VALUES (?,?,?)";
		$conn= $conn->prepare($sql);
		$conn->execute([$data['name'], $data['email'], $data['text']]);

	}

	// INSERT NEW COMMENT
	public static function updateComment($comment_id,$published){
		
		$conn=self::getInstance();
		$sql = "UPDATE comments SET published=? WHERE id=?";
		$stmt= $conn->prepare($sql);
		$stmt->execute([$published,$comment_id]);
		$count = $stmt->rowCount();

		if($count =='0'){
    		return false;
		}else{
	    	return true;
		}

	}
}
?>
