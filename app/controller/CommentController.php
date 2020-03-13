<?php 

namespace Controller;

use Model\Comment;


class CommentController 
{
	public $error_message=[];

	function __construct(){}
	

	// GET ALL COMMENTS
	public static function index($published=null)
	{
		$data=Comment::getAllComments($published);

		while ($row = $data->fetch(\PDO::FETCH_ASSOC))
		{
	    	$comments[] = $row; // appends each row to the array

	    }
	    return $comments;
	}

	// ADD NEW COMMENT
	public function addComment($data){

		$name = $data['name'];
		$email = $data['email'];
		$text = $data['text'];

		if (empty($name)) {
			$this->error_message[]= "Name field is required";
		}
		if (empty($email)) {
			$this->error_message[]= "Email field is required";
		}
		if (empty($text)) {
			$this->error_message[]= "Text field is required";
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->error_message[]= "Invalid email format";
		}

		if(empty($this->error_message)){
			Comment::addComment($data);
			header('Location: /');
			exit();
		}
	}

	// UPDATE COMMENTS PUBLISH TYPE
	public static function updateComment($data){

		$comment_id=$data['comment_id'];
		$published=$data['published'];

		if(Comment::updateComment($comment_id,$published)){
			header('Location: /admin');
		}
	
	}


}
?>