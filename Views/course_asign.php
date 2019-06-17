<?php
use App\Teacher\Teacher;
use App\Department\Department;
use App\Coures\Coures;
$course = new Coures();
$allCourse = $course->showCourse();
$depart = new Department();
$department = $depart->showDepartment();

if (isset($_POST['course_assign_teacher'])){
    $course->courseAssign($_POST);
}
$check = $course->checkCourse($_GET);
?>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Course Assign To Teacher</a></li>
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
                                msg('This Course is Already Assigned To ' .$check['teacher_name'], 'e');
                            }
                            ?>
                            <?php
                            if(isset($_GET['success'])){
                                msg('This Course is Already Assigned', 's');
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
                                    <label class="col-md-5 control-label">Teacher</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="teacher" id="teacher">

                                            <option value="0">--select--</option>


                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Credit To be Taken</label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="teacher_credit" id="teacher_credit"/>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Remaining Credit</label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="teacher_remaining_credit" id="teacher_remaining_credit"/>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Course Code</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="course" id="course">
                                            <option value="0">--select--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Name</label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="course_name" id="course_name"/>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Credit</label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="course_credit" id="course_credit"/>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="panel-footer">
                        <button type="reset" class="btn btn-default">Clear Form</button>
                        <button type="submit" name="course_assign_teacher" class="btn btn-primary pull-right">Add Course</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->