<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// include database and object file
include_once '../config/database.php';
include_once '../objects/varian.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare varian object
$varian = new Varian($db);

// get varian id
$data = json_decode(file_get_contents("php://input"));

// set varian id to be deleted
$varian->id = $data->id;

// delete the varian
if($varian->delete()){
	echo '{';
		echo '"message": "Varian was deleted."';
	echo '}';
}

// if unable to delete the varian
else{
	echo '{';
		echo '"message": "Unable to delete object."';
	echo '}';
}
?>