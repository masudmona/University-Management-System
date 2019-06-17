<?php
/**
 * Created by PhpStorm.
 * User: Kuntal
 * Date: 5/1/2017
 * Time: 2:41 AM
 */

namespace App\Rooms;


use App\Dbconnect\Dbconnect;
use PDO;

class Rooms extends Dbconnect
{
    public function shoAllocatRoom ($data = '')
    {
        if (isset($data['did'])) {
            $dayId = $data['did'];
        }
        if (isset($data['rid'])) {
            $roomId = $data['rid'];
        }

        $db = $this->pdo;
        $query = 'SELECT * FROM allocateclassrooms LEFT JOIN courseassigntoteacher ON allocateclassrooms.course_id=courseassigntoteacher.course_id LEFT JOIN teachers ON courseassigntoteacher.teacher_id=teachers.id WHERE allocateclassrooms.room_id=:rid AND allocateclassrooms.day_id=:did';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':did', $dayId);
        $stmt->bindValue(':rid', $roomId);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function allocatRoom ($data = '')
    {
        if (isset($data['department'])) {
            $department = $data['department'];
        }
        if (isset($data['course'])) {
            $course = $data['course'];
        }
        if (isset($data['roomNo'])) {
            $roomNo = $data['roomNo'];
        }
        if (isset($data['day'])) {
            $day = $data['day'];
        }
        if (isset($data['from'])) {
            $from = $data['from'];
        }
        if (isset($data['to'])) {
            $to = $data['to'];
        }

        $db = $this->pdo;
        $query = "SELECT * FROM allocateclassrooms WHERE CAST(startfrom AS TIME) BETWEEN '".$from."' and '".$to."' AND CAST(endto AS TIME) BETWEEN '".$from."' and '".$to."' AND room_id=:rid AND day_id=:day";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':day', $day);
        $stmt->bindValue(':rid', $roomNo);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($row)){
            header('location:' . SITE_URL . '/page/allocate_room/?error&did=' . $day . '&rid=' . $roomNo);
        }else{
            $query = 'INSERT INTO allocateclassrooms (`department_id`,`course_id`,`room_id`, `day_id`,`startfrom`,`endto`,`created_at`)
VALUES (:did,:cid,:rid,:day,:from,:to,:time)';
            $join_at = date('Y-m-d H:i:s');
            $stmt = $db->prepare($query);
            $data = array(
                ':did' => $department,
                ':cid' => $course,
                ':rid' => $roomNo,
                ':day' => $day,
                ':from' => $from,
                ':to' => $to,
                ':time' => $join_at
            );

            $result = $stmt->execute($data);
            if ($result) {
                header('location:' . SITE_URL . '/page/allocate_room/?success');
            }
        }
    }

    public function classScheduleInfo(){
        $db = $this->pdo;

        $query ="select c.course_code, c.course_name, group_concat(concat(s.room_id, ',', s.day_id, '-', s.startfrom, '-', s.endto) separator ';') as info from courses c join allocateclassrooms s on s.course_id = c.cid group by c.course_code, c.course_name";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}