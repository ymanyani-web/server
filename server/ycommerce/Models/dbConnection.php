<?php

class Db
{
    public static function GetConnection()
    {   
        try{
            $Connection = new PDO("mysql:host=localhost;dbname=ycommercedb", "root", "root");
            return $Connection;
        }
        catch(Exception $e)
        {
            echo 'Error : '. $e->getMessage();
        }
    }    
}
