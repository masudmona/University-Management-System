<?php
use App\Coures\Coures;
use App\Department\Department;
$course = new Coures();
$department = new Department();
$view = $department->showDepartment();
$semester = $department->showSemester();

if (isset($_POST['add_course'])){
    $course->addCourse($_POST);
}
?>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Add Course</a></li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <form id="jvalidate" role="form" class="form-horizontal" action="" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Add Course</strong></h3>
                    </div>
                    <div class="panel-body">
                        <h3 class="panel-title"><strong></strong></h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Course Code</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="c_code"/>

                                        </div>
                                        <span class="help-block">min size = 5</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Course Name</label>
                                    <div class="col-md-9 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="c_name"/>
                                            <span class="help-block">required Course name</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Course Credit</label>
                                    <div class="col-md-9 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="c_credit"/>
                                            <span class="help-block">min size = 0.5, max size = 5.0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Course Discription</label>
                                    <div class="col-md-9 col-xs-12">
                                        <textarea class="form-control" rows="2" name="c_discription"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Department</label>
                                    <div class="col-md-9">
                                        <select class="form-control select" name="department">
                                            <?php foreach ($view as $value){ ?>
                                            <option value="<?php echo $value['id']?>"><?php echo $value['department_name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Semester</label>
                                    <div class="col-md-9">
                                        <select class="form-control select" name="semester">
                                            <?php foreach ($semester as $value){ ?>
                                            <option value="<?php echo $value['id']?>"><?php echo $value['semester_name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="panel-footer">
                        <button type="reset" class="btn btn-default">Clear Form</button>
                        <button type="submit" name="add_course" class="btn btn-primary pull-right">Add Course</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->