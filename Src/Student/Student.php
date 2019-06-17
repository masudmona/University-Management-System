<?php
/**
 * Created by PhpStorm.
 * User: Kuntal
 * Date: 4/26/2017
 * Time: 4:36 AM
 */

namespace App\Student;


use App\Dbconnect\Dbconnect;
use PDO;

class Student extends Dbconnect
{

    public function addStudent($data = ''){
        $pdo = $this->pdo;
        $query = 'SELECT * FROM students WHERE student_email=:email';
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':email', $data['s_mail']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row > 0) {
            if ($row['student_email'] == $data['s_mail']) {
                $_SESSION['msg'] = "This email Already exiset!!!!";
            }

            header('location:' . SITE_URL . '/page/add_student');
        } else {
            $pdo = $this->pdo;
            $query = 'SELECT * FROM departments WHERE id=:id';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':id', $data['s_department']);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $code = $row['department_code'];
            $query = 'SELECT * FROM students WHERE department_id=:did';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':did', $data['s_department']);
            $stmt->execute();
            $total = $stmt->rowCount();
            $gtotal = $total+1;
            $regno = $code.'-'.date('Y').'-'.$gtotal;

            $query = 'INSERT INTO students (`department_id`, `student_name`,`student_reg_no`,`student_email`,`student_contactNo`,`student_address`, `created_at`) 
                          VALUES (:id,:name,:reg_no,:email,:contactNo,:address,:date)';
            $join_at = date('Y-m-d H:i:s');
            $stmt = $pdo->prepare($query);
            $data = array(
                ':id' => $data['s_department'],
                ':name' => $data['s_name'],
                ':reg_no' => $regno,
                ':email' => $data['s_mail'],
                ':contactNo' => $data['s_number'],
                ':address' => $data['s_address'],
                ':date' => $join_at
            );
            $status = $stmt->execute($data);
            if ($status) {
                $_SESSION['msg'] = "Student Add Successfully";
                header('location:' . SITE_URL . '/page/students');

            }
        }
    }

    public function showStudent(){
        $pdo = $this->pdo;
        $query = 'SELECT * FROM students WHERE status = 1 ORDER BY id DESC';
        $result = $pdo->query($query);
        return $result;
    }

    public function deletStudent($data = ''){
        $pdo = $this->pdo;
        $query = 'UPDATE students SET status =:status, deleted_at =:time WHERE id = :id';
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
            header('location:'.SITE_URL.'/page/students');
        }
    }
}