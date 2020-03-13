<?php 
namespace Controller;
use Model\User;

class AdminController {

	public $error_message=[];

	function __construct(){}

	// GET ALL COMMENTS 
	public static function login($data)
	{
		$email = $data['email'];
		$password = $data['password'];
		// Also, here can be implemented hash password logic.

		$user=User::checkUser($email, $password);

		if($user){
			session_start();
			$_SESSION['user'] = 'true';
			header('Location: /admin');
			exit();
		}else{
			header('Location: /login');
		}
	}
}
?>