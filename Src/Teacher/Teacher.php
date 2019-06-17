<?php
/**
 * Created by PhpStorm.
 * User: Kuntal
 * Date: 4/28/2017
 * Time: 1:16 AM
 */

namespace App\Teacher;

use App\Dbconnect\Dbconnect;
use PDO;

class Teacher extends Dbconnect
{
    public function addTeacher ($data = '')
    {
        $pdo = $this->pdo;
        $query = 'SELECT * FROM teachers WHERE teacher_email=:email';
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':email', $data['t_mail']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row > 0) {
            if ($row['teacher_email'] == $data['t_mail']) {
                $_SESSION['msg'] = "This email Already exiset!!!!";
                    }

                header('location:' . SITE_URL . '/page/add_teacher');
            } else {
                $query = 'INSERT INTO teachers (`designation_id`,`department_id`,`teacher_name`, `teacher_address`,`teacher_email`,`teacher_contactNo`,`teacher_creditTaken`,`teacher_remainingcredit`, `created_at`) 
                        VALUES (:desig,:depart,:name,:address,:email,:contactNo,:creditTaken,:remainingcredit,:date)';
                $join_at = date('Y-m-d H:i:s');
                $stmt = $pdo->prepare($query);
                $data = array(
                    ':desig' => $data['designation'],
                    ':depart' => $data['department'],
                    ':name' => $data['t_name'],
                    ':address' => $data['t_address'],
                    ':email' => $data['t_mail'],
                    ':contactNo' => $data['t_number'],
                    ':creditTaken' => $data['t_credit'],
                    ':remainingcredit' => $data['t_credit'],
                    ':date' => $join_at
                );
                $status = $stmt->execute($data);
                if ($status) {
                    $_SESSION['msg'] = "Course Add Successfully";
                    header('location:' . SITE_URL . '/page/teachers');

                }
            }

        }


        public function showTeacher(){
            $pdo = $this->pdo;
            $query = 'SELECT * FROM teachers WHERE status = 1 ORDER BY id DESC';
            $result = $pdo->query($query);
            return $result;
        }

        public function deletTeacher($data = ''){
            $pdo = $this->pdo;
            $query = 'UPDATE teachers SET status =:status, deleted_at =:time WHERE id = :id';
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
                header('location:'.SITE_URL.'/page/teachers');
            }
        }
}