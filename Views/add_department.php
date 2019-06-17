<?php
use\App\Department\Department;
$department = new Department();

if (isset($_POST['add_department'])){
    $department->addDepartment($_POST);

}

?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Add Department</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <form id="jvalidate" role="form" class="form-horizontal" action="" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Add Deparment</strong></h3>
                    </div>
                    <div class="panel-body">
                        <h3 class="panel-title">
                            <?php if (isset($_SESSION['msg'])){?>
                                <strong><?php echo $_SESSION['msg']?></strong>
                                <?php
                                session_unset();
                            }  ?>
                        </h3>
                     </div>

                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Department Code</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="d_code" id="d_code"/>
                                        </div>
                                        <div id="check-code" style="color: red"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Department Name</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="d_name" id="d_name"/>
                                        </div>
                                        <div id="check-name" style="color: red"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-default" type="reset">Clear Form</button>
                        <button class="btn btn-primary pull-right" type="submit" name="add_department">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->