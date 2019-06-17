<?php
use App\Department\Department;
use App\Student\Student;
$depart = new Department();
$department = $depart->showDepartment();
$student = new Student();

if (isset($_POST['add_student'])){
   $view = $student->addStudent($_POST);
}
?>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Add Student</a></li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <form id="jvalidate" role="form" class="form-horizontal" action="" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Add Student</strong></h3>
                    </div>
                    <div class="panel-body">
                        <h3 class="panel-title"><strong></strong></h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Student Name</label>
                                    <div class="col-md-9 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="s_name"/>

                                        </div>
                                        <span class="help-block">Required student name</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Contact No.</label>
                                    <div class="col-md-9 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="s_number"/>

                                        </div>
                                        <span class="help-block">Required student number</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9 col-xs-12">
                                        <div class="input-group">
                                            <input type="email" class="form-control" name="s_mail"/>

                                        </div>
                                        <span class="help-block">Required email</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Address</label>
                                    <div class="col-md-9 col-xs-12">
                                        <textarea class="form-control" rows="2" name="s_address"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Department</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="s_department">
                                            <?php foreach ($department as $value){ ?>
                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['department_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Date</label>
                                    <div class="col-md-9 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="s_date" value="<?php echo date("m.d.Y");;?>"/>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="panel-footer">
                        <button type="reset" class="btn btn-default">Clear Form</button>
                        <button type="submit" name="add_student" class="btn btn-primary pull-right">Add Student</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->