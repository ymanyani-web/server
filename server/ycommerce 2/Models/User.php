<?php
session_start();
require_once 'dbConnection.php';

class User
{
    public $Name;
    public $Mail;
    public $Pass;
    public $Phone;
    public $ProfileImg;

    public function __construct($nom, $addresseMail, $password, $tel, $profile)
    {
        $this->Name = $nom;
        $this->Mail = $addresseMail;
        $this->Pass= $password;
        $this->Phone = $tel;
        $this->ProfileImg = $profile;

    }

    public function UserRegisterLogic(){
        
        $dbConnection = Db::GetConnection();
        $response = $dbConnection->query("select * from users");
        while($row = $response->fetch())
        {
            if($row['Mail'] == $this->Mail){
                return false;
            }
        }
        $sql = 'insert into `users` (`UserId`, `Name`, `Mail`, `Pass`, `ProfileImg`, `Phone`) VALUES (NULL, "' . $this->Name .'", "' . $this->Mail .'", "' . $this->Pass .'","' . $this->ProfileImg . '", "' .  $this->Phone .'");';
        $added = $dbConnection->exec($sql);
        $dbConnection = null;
        if($added){
            return true;
        }
        return false;
    }

    public function UserLoginLogic(){
        
        $dbConnection = Db::GetConnection();
        $response = $dbConnection->query("select * from users");
        while($row = $response->fetch())
        {
            if($row['Mail'] == $this->Mail && $row['Pass'] == $this->Pass){
                $dbConnection = null;
                return true;
            }
        }
        $dbConnection = null;
        return false;
    }

    public static function getUserByMailAndPassword($mail, $pwd){
        
        $dbConnection = Db::GetConnection();
        $response = $dbConnection->query("select * from users");
        while($row = $response->fetch())
        {
            if($row['Mail'] == $mail && $row['Pass'] == $pwd){
                $dbConnection = null;
                return new User($row['Name'], $row['Mail'], $row['Pass'], $row['Phone'], $row['ProfileImg']);
            }
        }
        $dbConnection = null;
        return null;
    }
}
?>