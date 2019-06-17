<?php
use App\Coures\Coures;
$course = new Coures();
if (isset($_GET['action'])){
    $course->deletCourse($_GET);
}
?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Courses</a></li>
</ul>
<!-- END BREADCRUMB -->


<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START SIMPLE DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>ALL Course</strong></h3>
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
                                <th>Code</th>
                                <th>Name</th>
                                <th>Credit</th>
                                <th>Discription</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $result = $course->showCourse();
                            foreach ($result as $value){
                                ?>
                                <tr>
                                    <td><?php echo $value['course_code']?></td>
                                    <td><?php echo $value['course_name']?></td>
                                    <td><?php echo $value['course_cradite']?></td>
                                    <td><?php echo $value['course_description']?></td>
                                    <td>
                                        <a href="<?php echo SITE_URL.'/page/edit_course/?id='.$value['id']?>" class="btn btn-default btn-sm btn-icon icon-left"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <a href="<?php echo SITE_URL.'/page/courses/?action=delet&id='.$value['id']?>" class="btn btn-danger btn-sm btn-icon icon-left"> <i class="fa fa-trash-o" aria-hidden="true"></i>
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