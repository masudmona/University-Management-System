<?php
use App\Student\Student;
$student = new Student();
if (isset($_GET['action'])){
    $student->deletStudent($_GET);
}
?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Students</a></li>
</ul>
<!-- END BREADCRUMB -->


<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START SIMPLE DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>ALL Student</strong></h3>
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
                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-actions datatable_simple">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Reg No.</th>
                                <th>Address</th>
                                <th>Contact No.</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $result = $student->showStudent();
                            foreach ($result as $value){
                                ?>
                                <tr>
                                    <td><?php echo $value['student_name']?></td>
                                    <td><?php echo $value['student_email']?></td>
                                    <td><?php echo $value['student_reg_no']?></td>
                                    <td><?php echo $value['student_address']?></td>
                                    <td><?php echo $value['student_contactNo']?></td>
                                    <td>
                                        <a href="<?php echo SITE_URL.'/page/edit_student/?id='.$value['id']?>" class="btn btn-default btn-sm btn-icon icon-left"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <a href="<?php echo SITE_URL.'/page/students/?action=delet&id='.$value['id']?>" class="btn btn-danger btn-sm btn-icon icon-left"> <i class="fa fa-trash-o" aria-hidden="true"></i>
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