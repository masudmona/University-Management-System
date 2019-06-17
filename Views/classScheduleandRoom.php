<?php
use App\Department\Department;
use App\Rooms\Rooms;
use App\Utility\Utility;
$utility = new Utility();
$roominfo = new Rooms();
$depart = new Department();
$department = $depart->showDepartment();
$schedulinfo = $roominfo->classScheduleInfo();
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
                                    <select class="form-control" name="department" id="schedulINdepartment">

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
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Schedule Info</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($schedulinfo as $value) { ?>
                            <tr>
                                <td><?php echo $value['course_code']?></td>
                                <td><?php echo $value['course_name']?></td>
                                <td><?php $test =  explode(';', $value["info"]);
                                foreach ($test as $key=>$value){
                                    $test2 = explode('-',$test[$key]);
                                    echo "<br>";
                                    echo "Room No." .$test2[0]." ON " . $utility->timeConvert($test2[1]). " to " . $utility->timeConvert($test2[2]);
                                }

                                    ?></td>
                            </tr>
                            <?php }?>

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