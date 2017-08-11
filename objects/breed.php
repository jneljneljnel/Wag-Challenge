<?php
class Breed{
 
    // database connection and table name
    private $conn;
    private $table_name = "dog_breeds";
 
    // object properties
    public $id;
    public $breed;

    public function __construct($db){
        $this->conn = $db;
    }

    // returns a list of just breeds
    function breedList(){

        $query = "SELECT
                     breed
                FROM
                    " . $this->table_name . " ";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        $stmt->execute();     
        return $stmt;
    }


	function create(){
	 
	    // query to insert record
	    $query = "INSERT INTO
	                " . $this->table_name . "
	            SET
	                breed=:breed";
	 
	    // prepare query
	    $stmt = $this->conn->prepare($query);
	 
	    // sanitize
	    $this->breed=htmlspecialchars(strip_tags($this->breed));
	   	 
	    // bind values
	    $stmt->bindParam(":breed", $this->breed);
	   	 
	    // execute query	    
	    if($stmt->execute()){
	        return true;
	    }else{
	        return false;
	    }
	}
}
