<?php
use App\Teacher\Teacher;
use App\Department\Department;
use App\Coures\Coures;
$course = new Coures();
$allAssignedCourse = $course->assignedCourse();
$depart = new Department();
$department = $depart->showDepartment();
?>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Course Statics</a></li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START SIMPLE DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Course Statics</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"><div class="form-group">
                                <label class="col-md-4 control-label">DEPARTMENT : </label>
                                <div class="col-md-8">
                                    <select class="form-control select" name="department" id="department">

                                        <option value="0">--select--</option>
                                        <?php foreach ($department as $value){ ?>
                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['department_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div></div>
                        <div class="col-md-4"></div>
                    </div>

                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped datatable_simple">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Semester</th>
                                <th>Assigned To</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($allAssignedCourse as $value){ ?>
                            <tr>
                                <td><?php echo $value['course_code'] ?></td>
                                <td><?php echo $value['course_name'] ?></td>
                                <td><?php echo $value['semester_id'] ?></td>
                                <td>
                                    <?php if (!empty($value['teacher_name'])){
                                        echo $value['teacher_name'];
                                    } else{
                                        echo "Not Assigned Yeat!!";
                                    }?>
                                </td>
                                <td>
                                    <?php if (empty($value['teacher_name'])){?>
                                    <a href="<?php echo SITE_URL.'/page/edit_teacher/?id='.$value['cid']?>" class="btn btn-default btn-sm btn-icon icon-left"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    <?php } ?>

                                    <?php if (!empty($value['teacher_name'])){?>
                                        <a href="<?php echo SITE_URL.'/page/teachers/?action=delet&id='.$value['id']?>" class="btn btn-danger btn-sm btn-icon icon-left"> <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SIMPLE DATATABLE -->

        </div>
    </div>

</div>
<!-- PAGE CONTENT WRAPPER -->