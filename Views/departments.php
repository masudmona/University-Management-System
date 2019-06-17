<?php
use App\Department\Department;
$department = new Department();
if (isset($_GET['action'])){
    $department->deleteDepartment($_GET);
}
?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Departments</a></li>
</ul>
<!-- END BREADCRUMB -->


<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START SIMPLE DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>ALL Deparments</strong></h3>
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
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped datatable_simple">
                            <thead>
                            <tr>
                                <th>Department Code</th>
                                <th>Department Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $result = $department->showDepartment();
                            foreach ($result as $value){
                            ?>
                            <tr>
                                <td><?php echo $value['department_code']?></td>
                                <td><?php echo $value['department_name']?></td>
                                <td>
                                    <a href="<?php echo SITE_URL.'/page/edit_department/?id='.$value['id']?>" class="btn btn-default btn-sm btn-icon icon-left"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <a href="<?php echo SITE_URL.'/page/departments/?action=delet&id='.$value['id']?>" class="btn btn-danger btn-sm btn-icon icon-left"> <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        Delete
                                    </a>
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