<?php
/**
 * Created by PhpStorm.
 * User: Kuntal
 * Date: 4/26/2017
 * Time: 12:41 AM
 */

namespace App\Department;


use App\Dbconnect\Dbconnect;
use PDO;

class Department extends Dbconnect
{

    public function addDepartment($data =''){
        $pdo = $this->pdo;
        $query = 'SELECT * FROM departments WHERE department_code=:code OR department_name=:name';
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':code', $data['d_code']);
        $stmt->bindValue(':name', $data['d_name']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row > 0){
            if ($row['department_code'] == $data['d_code']){
                $_SESSION['msg']="Department Code exiset!!!!";
            }elseif ($row['department_name'] == $data['d_name']){
                $_SESSION['msg']="Department Name exiset!!!!";
            }

            header('location:'.SITE_URL.'/page/add_department');
        }else{
            $query = 'INSERT INTO departments (`department_code`, `department_name`,`created_at`) VALUES (:code,:name,:date)';
            $join_at = date('Y-m-d H:i:s');
            $stmt = $pdo->prepare($query);
            $data = array(
                ':code' => $data['d_code'],
                ':name' => $data['d_name'],
                ':date' => $join_at
            );
            $status = $stmt->execute($data);
            if ($status){
                $_SESSION['msg']="Department Add Successfully";
                header('location:'.SITE_URL.'/page/departments');

            }
        }


    }

    public function showDepartment(){
        $pdo = $this->pdo;
        $query = 'SELECT * FROM departments WHERE status = 1 ORDER BY id DESC';
        $result = $pdo->query($query);
        return $result;
    }

    public function showDepartmentById($data = ''){
        $id = $data['id'];
        $pdo = $this->pdo;
        $query = 'SELECT * FROM departments WHERE id=:id';
        $stmt = $pdo->prepare($query);
        $data = array(
            ':id' => $id
        );
        $stmt->execute($data);
        $value = $stmt->fetch(PDO::FETCH_ASSOC);
        return $value;
    }

    public function updateDepartment($data =''){
        $pdo = $this->pdo;
        $query = 'UPDATE  departments SET department_code = :code , department_name = :name , updated_at = :time  WHERE id = :id';
        $updated_at = date('Y-m-d H:i:s');
        $stmt = $pdo->prepare($query);
        $data = array(
            ':id' => $_GET['id'],
            ':code' => $data['d_code'],
            ':name' => $data['d_name'],
            ':time' => $updated_at
        );
        $result = $stmt->execute($data);
        if ($result){
            $_SESSION['msg']="Department Update Successfully";
            header('location:'.SITE_URL.'/page/departments');

        }

    }

    public function deleteDepartment($data = ''){
        $pdo = $this->pdo;
        $query = 'UPDATE departments SET status =:status, deleted_at =:time WHERE id = :id';
        $deleted_at = date('Y-m-d H:i:s');
        $stmt = $pdo->prepare($query);
        $data = array(
            ':id' => $_GET['id'],
            ':status' => 0,
            ':time' => $deleted_at
        );
        $result = $stmt->execute($data);
        if ($result) {
            $_SESSION['msg']="Department Deleted Sucessfully";
            header('location:'.SITE_URL.'/page/departments');
        }

    }

    public function showSemester(){
        $pdo = $this->pdo;
        $query = 'SELECT * FROM semesters ORDER BY id DESC';
        $result = $pdo->query($query);
        return $result;
    }

    public function showDesignation(){
        $pdo = $this->pdo;
        $query = 'SELECT * FROM designation ORDER BY id DESC';
        $result = $pdo->query($query);
        return $result;
    }
}