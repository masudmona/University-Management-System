<?php
use App\Department\Department;
use App\Rooms\Rooms;
use App\Utility\Utility;
$allocaterooms = new Rooms();
$utility = new Utility();
$depart = new Department();
$department = $depart->showDepartment();
$rooms = $utility->getRoom();
$days = $utility->getDay();

if (isset($_POST['allocate_room'])){
    $allocate = $allocaterooms->allocatRoom($_POST);
}
if (isset($_GET['did']) && ($_GET['rid'])){
    $bookdRoom = $allocaterooms->shoAllocatRoom($_GET);
}

?>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Room allocation</a></li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <form id="jvalidate" role="form" class="form-horizontal" action="" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Course Assign To Teacher</strong></h3>
                    </div>
                    <div class="panel-body">
                        <h3 class="text-center">
                            <?php
                            if(isset($_GET['error'])){
                                foreach ($bookdRoom as $value) {
                                    msg('This Room is Already booked by '.$value['teacher_name'].' '.$value['course_id']. ' ON ' . $utility->timeConvert($value['startfrom']) . ' to ' . $utility->timeConvert($value['endto']), 'e');
                                }
                                }
                            ?>
                            <?php
                            if(isset($_GET['success'])){
                                msg('This Room is Alocated Successfully', 's');
                            }
                            ?>
                        </h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Department</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="department" id="department">
                                            <option value="0">--select--</option>
                                            <?php foreach ($department as $value){ ?>
                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['department_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Course</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="course" id="course">

                                            <option value="0">--select--</option>


                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Room No.</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="roomNo" id="roomNo">

                                            <option value="0">--select--</option>
                                            <?php foreach ($rooms as $value){ ?>
                                                <option value="<?php echo $value['room_no'] ?>"><?php echo $value['room_no'] ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Day</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="day" id="day">
                                            <option value="0">--select--</option>
                                            <?php foreach ($days as $value){ ?>
                                                <option value="<?php echo $value['day_name']?>"><?php echo $value['day_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">From</label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="from"/>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">To</label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="to"/>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="panel-footer">
                        <button type="reset" class="btn btn-default">Clear Form</button>
                        <button type="submit" name="allocate_room" class="btn btn-primary pull-right">Allocate</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->