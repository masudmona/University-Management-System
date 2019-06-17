<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <!-- META SECTION -->
    <title>Atlant - Responsive Bootstrap Admin Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo SITE_URL ?>/assets/css/theme-default.css"/>
    <!-- EOF CSS INCLUDE -->
</head>
<body>
<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation">
            <li class="xn-logo">
                <a href="<?php echo SITE_URL?>">ATLANT</a>
                <a href="#" class="x-navigation-control"></a>
            </li>

            <li class="xn-title">Navigation</li>

            <li class="xn-openable">
                <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Departments</span></a>
                <ul>
                    <li><a href="<?php echo SITE_URL?>/page/departments"><span class="fa fa-image"></span>All Departments</a></li>
                    <li><a href="<?php echo SITE_URL?>/page/add_department"><span class="fa fa-dollar"></span>Add Department</a></li>
                </ul>
            </li>
            <li class="xn-openable">
                <a href="#"><i class="fa fa-user-secret" aria-hidden="true"></i> <span class="xn-text">Teachers</span></a>
                <ul>
                    <li><a href="<?php echo SITE_URL?>/page/teachers"><i class="fa fa-user-secret" aria-hidden="true"></i>All Teachers</a></li>
                    <li><a href="<?php echo SITE_URL?>/page/add_teacher"><span class="fa fa-dollar"></span>Add Teacher</a></li>
                </ul>
            </li>
            <li class="xn-openable">
                <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span class="xn-text">Students</span></a>
                <ul>
                    <li><a href="<?php echo SITE_URL?>/page/students"><i class="fa fa-users" aria-hidden="true"></i>All Students</a></li>
                    <li><a href="<?php echo SITE_URL?>/page/add_student"><i class="fa fa-user-plus" aria-hidden="true"></i>Add Student</a></li>
                </ul>
            </li>
            <li class="xn-openable">
                <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Coures</span></a>
                <ul>
                    <li><a href="<?php echo SITE_URL?>/page/courses"><span class="fa fa-image"></span>All Coures</a></li>
                    <li><a href="<?php echo SITE_URL?>/page/add_course"><span class="fa fa-dollar"></span>Add Coures</a></li>
                    <li><a href="<?php echo SITE_URL?>/page/course_enrollment"><span class="fa fa-dollar"></span>Enroll In a Course</a></li>
                    </ul>
            </li>
            <li class="xn-openable">
                <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Coures Assign To Teacher</span></a>
                <ul>
                    <li><a href="<?php echo SITE_URL?>/page/course_asign"><span class="fa fa-dollar"></span>Coures Assign To Teacher</a></li>
                    <li><a href="<?php echo SITE_URL?>/page/course_statics"><span class="fa fa-dollar"></span>Coures Statics</a></li>
                </ul>
            </li>
            <li class="xn-openable">
                <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Room Allocation</span></a>
                <ul>
                    <li><a href="<?php echo SITE_URL?>/page/allocate_room"><span class="fa fa-image"></span>Allocate Room</a></li>
                    <li><a href="<?php echo SITE_URL?>/page/classScheduleandRoom"><span class="fa fa-dollar"></span>Class Shedul & Room Info</a></li>
                    </ul>
            </li>

        </ul>
        <!-- END X-NAVIGATION -->
    </div>
    <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
            <!-- SEARCH -->
            <li class="xn-search">
                <form role="form">
                    <input type="text" name="search" placeholder="Search..."/>
                </form>
            </li>
            <!-- END SEARCH -->
            <!-- POWER OFF -->
            <li class="xn-icon-button pull-right last">
                <a href="#"><span class="fa fa-power-off"></span></a>
                <ul class="xn-drop-left animated zoomIn">
                    <li><a href="pages-lock-screen.html"><span class="fa fa-lock"></span> Lock Screen</a></li>
                    <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                </ul>
            </li>
            <!-- END POWER OFF -->
        </ul>
        <!-- END X-NAVIGATION VERTICAL -->
