<?php
/**
 * Created by PhpStorm.
 * User: Kuntal
 * Date: 4/25/2017
 * Time: 11:36 PM
 */

namespace App\Dbconnect;

use PDO;
class Dbconnect
{
    protected $dbhost = "localhost";
    protected $dbname = "university_db";
    protected $dbuser = "root";
    protected $dbpass = "";
    protected $pdo;

    public function __construct ()
    {
        if (!isset($this->pdo)){
            try{
                $db = new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname,$this->dbuser,$this->dbpass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $db;
            } catch (PDOException $e){
                die("Failed to connect with Database".$e->getMessage());

            }
        }
    }

    public function pdo ()
    {
        return $this->pdo;
    }

}