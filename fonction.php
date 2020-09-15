<?php

class maConnection {
    
    private static $connection = null;
    private  $host='localhost';
    private  $user='root';
    private  $pass='';
    private  $base='festival';
    
    private function __construct() {
        
    }

    
	static public final function getInstance() {
        if (is_null(self::$connection)){
			try {
              self::$connection=new PDO('mysql:host=localhost;dbname=festival','root','', array(
					 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
						PDO::ATTR_CASE => PDO::CASE_NATURAL));
			}
			 catch(PDOException $e) {
					die("Database connection failed: " . $e->getMessage());
					
				echo "erreur connexion";  
			}
             
        }   

        return self::$connection;     
    } 
   }





?>