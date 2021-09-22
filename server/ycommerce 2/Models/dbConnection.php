<?php

class Db
{
    //public static $Connection = null;

    public static function GetConnection()
    {   
        try{
            $Connection = new PDO("mysql:host=localhost;dbname=ycommercedb", "root", "root");
            // $sql = "select * FROM users";
            // foreach($dbConenction->query($sql) as $row){
            //     echo "User Name: ". $row['Name'] . '<br /> User Mail : ' . $row['Mail'] . '<br /><img src="'. $row['ProfileImg'] . '" width="50" height="50" />';
            //     echo '<br />---------------------------------';
            // }
            return $Connection;
        }
        catch(Exception $e)
        {
            echo 'Error : '. $e->getMessage();
        }
    }    
}
