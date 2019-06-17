<?php
/**
 * Created by PhpStorm.
 * User: Kuntal
 * Date: 5/1/2017
 * Time: 2:23 AM
 */

namespace App\Utility;


use App\Dbconnect\Dbconnect;
use PDO;

class Utility extends Dbconnect
{
    public function getRoom(){
        $pdo = $this->pdo;
        $query = 'SELECT * FROM roomes';
        $result = $pdo->query($query);
        return $result;
    }

    public function getDay(){
        $pdo = $this->pdo;
        $query = 'SELECT * FROM days';
        $result = $pdo->query($query);
        return $result;
    }

    public function timeConvert($data = ''){
            if (isset($data)){
                $time = $data;
            }
            $convertedTime = date('h:i a', strtotime($time));
            return $convertedTime;

    }


}