<?php 
use Controller\ProductController;
use Controller\CommentController;
use Controller\AdminController;

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
	
	// HOME PAGE ROUTE
	case '/' :

	$data=ProductController::index();
	$comments=CommentController::index(true);

	require __DIR__ . '/../views/home.php';
	break;

    // POST ROUTE FOR ADDING COMMENT
	case '/addComment' :

		if(!$_POST) {
			header('Location: /');
			exit();
		}else{
			$new_comment=new CommentController;
			$new_comment->addComment($_POST);
			$errors=$new_comment->error_message;
		}

		if(!empty($errors)){
			$data=ProductController::index();
			$comments=CommentController::index(true);
			require __DIR__ . '/../views/home.php';
		}

	break;
	

	// ADMIN INDEX PAGE
	case '/admin' :
		$comments=CommentController::index();
		require __DIR__ . '/../views/admin.php';
	break;

	// UPDATE COMMENT PUBLISHING TYPE  
	case '/admin/update-comment' :
		CommentController::updateComment($_POST);
		require __DIR__ . '/../views/admin.php';
	break;


	// ADMIN SING IN 
	case '/login' :

		if (empty($_POST)){
	    	require __DIR__ . '/../views/login.php';
		}else{
			AdminController::login($_POST);
		}
	break;


	// USER LOGOUT 
	case '/logout' :
		session_start();
		session_destroy();
		header('Location: /');
	break;

	default:
	http_response_code(404);
	require __DIR__ . '/views/404.php';
	break;
}

?>