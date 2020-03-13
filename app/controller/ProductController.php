<?php 
namespace Controller;
use Model\Product;

class ProductController 
{
	function __construct(){}
	
	// GET ALL CITRUS 
	public static function index()
	{
		$data=Product::getAllCitrus();

		while ($row = $data->fetch(\PDO::FETCH_ASSOC))
		{
	    	$citrus[] = $row; // appends each row to the array

	    }
	    return $citrus;
	}
}
?>