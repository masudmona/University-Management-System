<?php
use App\Teacher\Teacher;
$teacher = new Teacher();
if (isset($_GET['action'])){
    $teacher->deletTeacher($_GET);
}
?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Teachers</a></li>
</ul>
<!-- END BREADCRUMB -->


<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START SIMPLE DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>ALL Teacher</strong></h3>
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
                                <th>Address</th>
                                <th>Contact No.</th>
                                <th>Credit to be taken</th>
                                <th>Remaining credit</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $result = $teacher->showTeacher();
                            foreach ($result as $value){
                                ?>
                                <tr>
                                    <td><?php echo $value['teacher_name']?></td>
                                    <td><?php echo $value['teacher_email']?></td>
                                    <td><?php echo $value['teacher_address']?></td>
                                    <td><?php echo $value['teacher_contactNo']?></td>
                                    <td><?php echo $value['teacher_creditTaken']?></td>
                                    <td><?php echo $value['teacher_remainingcredit']?></td>
                                    <td>
                                        <a href="<?php echo SITE_URL.'/page/edit_teacher/?id='.$value['id']?>" class="btn btn-default btn-sm btn-icon icon-left"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <a href="<?php echo SITE_URL.'/page/teachers/?action=delet&id='.$value['id']?>" class="btn btn-danger btn-sm btn-icon icon-left"> <i class="fa fa-trash-o" aria-hidden="true"></i>
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