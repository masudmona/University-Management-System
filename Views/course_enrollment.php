<?php
use App\Coures\Coures;
use App\Student\Student;
$student = new Student();
$course = new Coures();
$getStudent = $student->showStudent();
$getcourse = $course->showCourse();
if (isset($_POST['course_enrollment'])){
    $course->enrollCourse($_POST);
//    print_r($_POST);
}

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
                        <h3 class="panel-title"><strong>Enroll In a Courses</strong></h3>
                    </div>
                    <div class="panel-body">
                        <h3 class="text-center">
                            <?php
                            if(isset($_GET['error'])){
                                msg('This Course is Already Assigned for this Student ', 'e');
                            }
                            ?>
                            <?php
                            if(isset($_GET['success'])){
                                msg('Course Enroll Sucessfull', 's');
                            }
                            ?>
                        </h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Student Reg.No.</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="regno" id="regno">
                                            <option value="0">--select--</option>
                                            <?php foreach ($getStudent as $value){ ?>
                                                <option value="<?php echo $value['id']?>"><?php echo $value['student_reg_no']?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Name</label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name" id="name"/>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Email</label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="email" id="email"/>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Department</label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="department" id="department"/>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Select Course</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="course" id="course">
                                            <option value="0">--select--</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Date</label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="date" value="<?php echo date("Y-m-d") ?>"/>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="panel-footer">
                        <button type="reset" class="btn btn-default">Clear Form</button>
                        <button type="submit" name="course_enrollment" class="btn btn-primary pull-right">Enroll Course</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->