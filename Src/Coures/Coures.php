<?php
/**
 * Created by PhpStorm.
 * User: Kuntal
 * Date: 4/26/2017
 * Time: 4:35 AM
 */

namespace App\Coures;


use App\Dbconnect\Dbconnect;
use PDO;

class Coures extends Dbconnect
{

    public function addCourse ($data = '')
    {
        $pdo = $this->pdo;
        $query = 'SELECT * FROM courses WHERE course_code=:code OR course_name=:name';
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':code', $data['c_code']);
        $stmt->bindValue(':name', $data['c_name']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row > 0) {
            if ($row['course_code'] == $data['c_code']) {
                $_SESSION['msg'] = "Course Code exiset!!!!";
            } elseif ($row['course_name'] == $data['c_name']) {
                $_SESSION['msg'] = "Course Name exiset!!!!";
            }

            header('location:' . SITE_URL . '/page/add_course');
        } else {
            $query = 'INSERT INTO courses (`department_id`,`semester_id`,`course_code`, `course_name`,`course_cradite`,`course_description`, `created_at`) 
VALUES (:depart,:semes,:code,:name,:cradite,:description,:date)';
            $join_at = date('Y-m-d H:i:s');
            $stmt = $pdo->prepare($query);
            $data = array(
                ':depart' => $data['department'],
                ':semes' => $data['semester'],
                ':code' => $data['c_code'],
                ':name' => $data['c_name'],
                ':cradite' => $data['c_credit'],
                ':description' => $data['c_discription'],
                ':date' => $join_at
            );
            $status = $stmt->execute($data);
            if ($status) {
                $_SESSION['msg'] = "Course Add Successfully";
                header('location:' . SITE_URL . '/page/courses');

            }
        }
    }

    public function showCourse ()
    {
        $pdo = $this->pdo;
        $query = 'SELECT * FROM courses WHERE status = 1 ORDER BY cid DESC';
        $result = $pdo->query($query);
        return $result;
    }

    public function deletCourse ($data = '')
    {
        $pdo = $this->pdo;
        $query = 'UPDATE courses SET status =:status, deleted_at =:time WHERE id = :id';
        $deleted_at = date('Y-m-d H:i:s');
        $stmt = $pdo->prepare($query);
        $data = array(
            ':id' => $_GET['id'],
            ':status' => 0,
            ':time' => $deleted_at
        );
        $result = $stmt->execute($data);
        if ($result) {
            $_SESSION['msg'] = "Course Deleted Sucessfully";
            header('location:' . SITE_URL . '/page/courses');
        }
    }


    public function courseAssign ($data = '')
    {
        if (isset($data['department'])) {
            $departmentId = $data['department'];
        }
        if (isset($data['teacher'])) {
            $teacherId = $data['teacher'];
        }
        if (isset($data['course'])) {
            $courseId = $data['course'];
        }
        if (isset($data['teacher_remaining_credit'])) {
            $remainingCradit = $data['teacher_remaining_credit'];
        }
        if (isset($data['course_credit'])) {
            $courseCradit = $data['course_credit'];
        }

        $remaining = $remainingCradit - $courseCradit;

        if ($remainingCradit <= .4) {

            echo "nai";

        } else {


            $db = $this->pdo;
            $query = 'SELECT * FROM courseassigntoteacher WHERE department_id=:did AND teacher_id=:tid AND course_id=:cid OR teacher_id=:tid AND course_id=:cid OR department_id=:did AND course_id=:cid';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':did', $departmentId);
            $stmt->bindValue(':tid', $teacherId);
            $stmt->bindValue(':cid', $courseId);
            $stmt->execute();
            $status = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($status > 0) {
                header('location:' . SITE_URL . '/page/course_asign/?error&cid='.$courseId);
            } else {
                $query = 'INSERT INTO courseassigntoteacher (`department_id`,`teacher_id`,`course_id`, `created_at`)
VALUES (:did,:tid,:cid,:date)';
                $join_at = date('Y-m-d H:i:s');
                $stmt = $db->prepare($query);
                $data = array(
                    ':did' => $departmentId,
                    ':tid' => $teacherId,
                    ':cid' => $courseId,
                    ':date' => $join_at
                );
                $stmt->execute($data);
                $query = 'UPDATE teachers SET teacher_remainingcredit=:rcradit, updated_at =:time WHERE id = :id';

                $updated_at = date('Y-m-d H:i:s');
                $stmt = $db->prepare($query);
                $data = array(
                    ':id' => $teacherId,
                    ':rcradit' => $remaining,
                    ':time' => $updated_at
                );
                $result = $stmt->execute($data);

                if ($result) {
                    header('location:' . SITE_URL . '/page/course_asign/?success');
                }


            }
        }
    }
    public function enrollCourse($data = ''){
        if (isset($data['regno'])){
            $studentId = $data['regno'];
        }
        if (isset($data['course'])){
            $courseId = $data['course'];
        }
        if (isset($data['date'])){
            $date = $data['date'];
        }
        if ((empty($studentId))&& (empty($courseId)) && (empty($date))){
            header('location:' . SITE_URL . '/page/course_enrollment/?error&blank');
        }else {
            $db = $this->pdo;
            $query = 'SELECT * FROM enrollcourses WHERE course_id=:cid AND student_id=:sid';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':cid', $courseId);
            $stmt->bindValue(':sid', $studentId);
            $stmt->execute();
            $status = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($status > 0) {
                header('location:' . SITE_URL . '/page/course_enrollment/?error&cid=' . $courseId);
            } else {
                $query = 'INSERT INTO enrollcourses (`student_id`,`course_id`,`date`, `created_at`)
VALUES (:sid,:cid,:dat,:date)';
                $created_at = date('Y-m-d H:i:s');
                $stmt = $db->prepare($query);
                $data = array(
                    ':sid' => $studentId,
                    ':cid' => $courseId,
                    ':dat' => $date,
                    ':date' => $created_at
                );
                $result = $stmt->execute($data);
                if ($result) {
                    header('location:' . SITE_URL . '/page/course_enrollment/?success');
                }
            }
        }


    }

    public function checkCourse($data = ''){
        if (isset($data['cid'])){
            $cid= $data['cid'];
        }
        $db = $this->pdo;
        $query = 'SELECT * FROM courseassigntoteacher WHERE course_id=:cid';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':cid', $cid);
        $stmt->execute();
        $status = $stmt->fetch(PDO::FETCH_ASSOC);
        $tid = $status['teacher_id'];
        $query = 'SELECT * FROM teachers WHERE id=:tid';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':tid', $tid);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    public function assignedCourse(){
        $pdo = $this->pdo;
        $query = 'SELECT courses.*,courseassigntoteacher.*,teachers.* FROM courses LEFT JOIN courseassigntoteacher ON  courseassigntoteacher.course_id=courses.cid LEFT JOIN teachers ON courseassigntoteacher.teacher_id=teachers.id ORDER BY courses.cid ASC ';
        $result = $pdo->query($query);
        return $result;
    }
}