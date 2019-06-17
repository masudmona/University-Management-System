<?php
include "define.php";
include_once (__DIR__. "/vendor/autoload.php");
use App\Dbconnect\Dbconnect;
use App\Utility\Utility;
$utility = new Utility();
$db = new Dbconnect();
$pdo = $db->pdo();
if (($_REQUEST['action'] == 'checkCode') && !empty($_REQUEST['keyword'])) {


    $code = "'" . $_REQUEST['keyword'] . "'";
    $query = "SELECT * FROM departments WHERE department_code=$code";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row > 0) {
     ?>
            <p><?php echo $code ?> Already exist</p>
    <?php
    }

} elseif (($_REQUEST['action'] == 'checkName') && !empty($_REQUEST['keyword'])) {
    $name = "'" . $_REQUEST['keyword'] . "'";
    $query = "SELECT * FROM departments WHERE department_name=$name";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row > 0) {
        ?>
        <p><?php echo $name ?> Already exist</p>
        <?php
    }
}elseif (($_REQUEST['action'] == 'querydepartment') && !empty($_REQUEST['keyword'])) {
    $did = $_REQUEST['keyword'];

    $query = 'SELECT * FROM teachers WHERE department_id=:did';
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':did', $did);
    $stmt->execute();
    $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $query2 = 'SELECT * FROM courses WHERE department_id=:did';
    $stmt2 = $pdo->prepare($query2);
    $stmt2->bindValue(':did', $did);
    $stmt2->execute();
    $courses = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    $data = [
            'teachers' => $teachers,
        'courses' => $courses
    ];

    echo json_encode($data);

}elseif (($_REQUEST['action'] == 'queryteacher') && !empty($_REQUEST['keyword'])) {
    $tid = $_REQUEST['keyword'];
    $query = 'SELECT * FROM teachers WHERE id=:tid';
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':tid', $tid);
    $stmt->execute();
    $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($teachers);
}elseif (($_REQUEST['action'] == 'querycourse') && !empty($_REQUEST['keyword'])) {
    $cid = $_REQUEST['keyword'];
    $query = 'SELECT * FROM courses WHERE cid=:cid';
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':cid', $cid);
    $stmt->execute();
    $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($teachers);

}elseif(($_REQUEST['action'] == 'queryClassSchedul') && !empty($_REQUEST['keyword'])){
    $did = $_REQUEST['keyword'];
    $query ="select c.course_code, c.course_name, group_concat(concat(s.room_id, ',', s.day_id, '-', s.startfrom, '-', s.endto) separator ';') as info from courses c join allocateclassrooms s on s.course_id = c.cid where s.department_id=:id group by c.course_code, c.course_name";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $did);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $value) {
        ?>
        <tr>
            <td><?php echo $value['course_code'] ?></td>
            <td><?php echo $value['course_name'] ?></td>
            <td><?php $test =  explode(';', $value["info"]);
                foreach ($test as $key=>$value){
                    $test2 = explode('-',$test[$key]);
                   echo "Room No. " .$test2[0]." ON " . $utility->timeConvert($test2[1]). " to " . $utility->timeConvert($test2[2]);
                    echo "<br>";
                }

                ?></td>
        </tr>

        <?php
    }
}elseif(($_REQUEST['action'] == 'queryRegno') && !empty($_REQUEST['keyword'])){
    $sid = $_REQUEST['keyword'];
    $query = 'SELECT * FROM students WHERE id=:id AND status = 1 ORDER BY id DESC';
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $sid);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $departid = $result['department_id'];
    $query2 = 'SELECT * FROM courses WHERE department_id=:did';
    $stmt2 = $pdo->prepare($query2);
    $stmt2->bindValue(':did', $departid);
    $stmt2->execute();
    $courses = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    $data = [
        'student' => $result,
        'courses' => $courses
    ];
    echo json_encode($data);

}

?>