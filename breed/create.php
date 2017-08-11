<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/breed.php';
 
$database = new Database();
$db = $database->getConnection();
$breed = new Breed($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
echo $data;
// set product property values
//$breed->breed = $data->breed;

 
// create the breed
if($breed->create()){
    echo '{';
        echo '"message": "Product was created."';
    echo '}';
}
 
// if unable to create the product, tell the user
else{
    echo '{';
        echo '"message": "Unable to create breed entry."';
    echo '}';
}
?>