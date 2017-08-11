<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/breed.php';
 

$database = new Database();
$db = $database->getConnection();
$breed = new Breed($db);
 

$stmt = $breed->breedList();
$num = $stmt->rowCount();

if($num>0){
 
    $breed_arr=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $breed_item = $breed;
        array_push($breed_arr, $breed_item);
    }
 
    echo json_encode($breed_arr);
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>