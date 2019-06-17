<?php
use App\Teacher\Teacher;
use App\Department\Department;
$depart = new Department();
$department = $depart->showDepartment();
$designation = $depart->showDesignation();
$teacher = new Teacher();
if (isset($_POST['add_teacher'])){
    $teacher->addTeacher($_POST);
}
?>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Add Teacher</a></li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <form id="jvalidate" role="form" class="form-horizontal" action="" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Add Teacher</strong></h3>
                    </div>
                    <div class="panel-body">
                        <h3 class="panel-title"><strong></strong></h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Teacher Name</label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="t_name"/>

                                        </div>
                                        <span class="help-block">Required Teacher name</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Address</label>
                                    <div class="col-md-7 col-xs-12">
                                        <textarea class="form-control" rows="2" name="t_address"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Email</label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="input-group">
                                            <input type="email" class="form-control" name="t_mail"/>

                                        </div>
                                        <span class="help-block">Required Email Field</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Contact No.</label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="t_number"/>

                                        </div>
                                        <span class="help-block">Required Teacher number</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Designation</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="designation">
                                            <?php foreach ($designation as $value){ ?>
                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['designation']  ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Department</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="department">
                                            <?php foreach ($department as $value){ ?>
                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['department_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Credit To be Taken</label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="t_credit"/>

                                        </div>
                                        <span class="help-block">Required Teacher number</span>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="panel-footer">
                        <button type="reset" class="btn btn-default">Clear Form</button>
                        <button type="submit" name="add_teacher" class="btn btn-primary pull-right">Add Course</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->