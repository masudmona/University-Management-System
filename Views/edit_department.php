<?php
use App\Department\Department;
$department = new Department();
if (isset($_GET['id'])){
    $show = $department->showDepartmentById($_GET);
}
if (isset($_POST['edit_department'])){
    $department->updateDepartment($_POST);
}
?>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Edit Department</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" action="" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Edit Deparment</strong></h3>
                    </div>
                    <div class="panel-body">
                        <h3 class="panel-title"><strong></strong></h3>
                    </div>

                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Department Code</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="d_code" value="<?php echo $show['department_code'] ?>"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Department Name</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="d_name" value="<?php echo $show['department_name'] ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-default" type="reset">Clear Form</button>
                        <button class="btn btn-primary pull-right" type="submit" name="edit_department">Update</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->