<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dleohr.dreamstechnologies.com/template-1/dleohr-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jun 2025 00:19:41 GMT -->

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

    <!-- Linearicon Font -->
    <link rel="stylesheet" href="<?= base_url('assets/css/lnr-icon.css') ?>">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-datetimepicker.min.css') ?>">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/select2/select2.min.css') ?>">

    <!-- Full Calendar CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fullcalendar/fullcalendar.min.css') ?>">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    <!-- Inner wrapper -->
    <div class="inner-wrapper">

        <!-- Loader
        <div id="loader-wrapper">

            <div class="loader">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div> -->


        <!-- Header -->
        <header class="header">

            <!-- Top Header Section -->
            <div class="top-header-section">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                            <div class="logo my-3 my-sm-0">
                                <a href="index.html">
                                    <img src="assets/img/logo.png" alt="logo image" class="img-fluid" width="100">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
                            <div class="user-block d-none d-lg-block">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="user-notification-block align-right d-inline-block">
                                            <div class="top-nav-search item-animated">
                                                <form>
                                                    <input type="text" class="form-control" placeholder="Search here">
                                                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                                </form>
                                            </div>
                                        </div>


                                        <!-- user info-->
                                        <div class="user-info align-right dropdown d-inline-block header-dropdown">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class=" menu-style dropdown-toggle">
                                                <div class="user-avatar d-inline-block">
                                                    <img src="assets/img/profiles/img-6.jpg" alt="user avatar" class="rounded-circle img-fluid" width="55">
                                                </div>
                                            </a>

                                            <!-- Notifications -->
                                            <div class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
                                                <a class="dropdown-item p-2" href="employment.html">
                                                    <span class="media align-items-center">
                                                        <span class="lnr lnr-user mr-3"></span>
                                                        <span class="media-body text-truncate">
                                                            <span class="text-truncate">Profile</span>
                                                        </span>
                                                    </span>
                                                </a>
                                                <a class="dropdown-item p-2" href="profile-settings.html">
                                                    <span class="media align-items-center">
                                                        <span class="lnr lnr-cog mr-3"></span>
                                                        <span class="media-body text-truncate">
                                                            <span class="text-truncate">Settings</span>
                                                        </span>
                                                    </span>
                                                </a>
                                                <a class="dropdown-item p-2" href="<?php echo site_url('logout'); ?>">
                                                    <span class="media align-items-center">
                                                        <span class="lnr lnr-power-switch mr-3"></span>
                                                        <span class="media-body text-truncate">
                                                            <span class="text-truncate">Logout</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </div>
                                            <!-- Notifications -->

                                        </div>
                                        <!-- /User info-->

                                    </div>
                                </div>
                            </div>
                            <div class="d-block d-lg-none">
                                <a href="javascript:void(0)">
                                    <span class="lnr lnr-user d-block display-5 text-white" id="open_navSidebar"></span>
                                </a>

                                <!-- Offcanvas menu -->
                                <div class="offcanvas-menu" id="offcanvas_menu">
                                    <span class="lnr lnr-cross float-left display-6 position-absolute t-1 l-1 text-white" id="close_navSidebar"></span>
                                    <div class="user-info align-center bg-theme text-center">
                                        <a href="javascript:void(0)" class="d-block menu-style text-white">
                                            <div class="user-avatar d-inline-block mr-3">
                                                <img src="assets/img/profiles/img-6.jpg" alt="user avatar" class="rounded-circle" width="50">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="user-notification-block align-center">
                                        <div class="top-nav-search item-animated">
                                            <form>
                                                <input type="text" class="form-control" placeholder="Search here">
                                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="user-menu-items px-3 m-0">
                                        <a class="px-0 pb-2 pt-0" href="index.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-home mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Dashboard</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="<?php echo site_url('admin/manage-users'); ?>">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-users mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Manage Users</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="company.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-apartment mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Company</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="calendar.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-calendar-full mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Calendar</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="leave.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-briefcase mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Leave</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="reviews.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-star mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Reviews</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="reports.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-rocket mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Reports</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="manage.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-sync mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Manage</span>
                                                </span>
                                            </span>
                                        </a>

                                        <a class="p-2" href="settings.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-cog mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Settings</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="employment.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-user mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Profile</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="login.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-power-switch mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Logout</span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <!-- /Offcanvas menu -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Top Header Section -->

            <!-- Slide Nav -->

            <!-- Slide Nav -->
            <div class="header-wrapper d-none d-sm-none d-md-none d-lg-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="header-menu-list d-flex bg-white rt_nav_header horizontal-layout nav-bottom">
                                <div class="append mr-auto my-0 my-md-0 mr-auto">
                                    <ul class="list-group list-group-horizontal-md mr-auto">
                                        <?php if ($this->session->userdata('RoleID') == 2): ?>
                                            <?php $current_page = uri_string(); // Gets the current URI like 'hr/dashboard'
                                            ?>

                                            <li class="mr-1 <?= ($current_page == 'hr/dashboard') ? 'active' : '' ?>">
                                                <a href="<?= site_url('hr/dashboard'); ?>" class="btn-ctm-space <?= ($current_page == 'hr/dashboard') ? 'text-white' : 'text-dark' ?>">
                                                    <span class="lnr lnr-home pr-0 pr-lg-2"></span>
                                                    <span class="d-none d-lg-inline">Dashboard</span>
                                                </a>
                                            </li>

                                            <li class="mr-1 <?= ($current_page == 'hr/manage-users') ? 'active' : '' ?>">
                                                <a href="<?= site_url('hr/manage-users'); ?>" class="btn-ctm-space <?= ($current_page == 'hr/manage-users') ? 'text-white' : 'text-dark' ?>">
                                                    <span class="lnr lnr-users pr-0 pr-lg-2"></span>
                                                    <span class="d-none d-lg-inline">Manage Users</span>
                                                </a>
                                            </li>

                                            <li class="mr-1 <?= ($current_page == 'hr/leave-approval') ? 'active' : '' ?>">
                                                <a href="<?= site_url('hr/leave-approval'); ?>" class="btn-ctm-space <?= ($current_page == 'hr/leave-approval') ? 'text-white' : 'text-dark' ?>">
                                                    <span class="lnr lnr-briefcase pr-0 pr-lg-2"></span>
                                                    <span class="d-none d-lg-inline">Leave Approval</span>
                                                </a>
                                            </li>
                                        <?php elseif ($this->session->userdata('RoleID') == 3) : ?>
                                            <?php $current_page = uri_string(); // Gets the current URI like 'hr/dashboard'
                                            ?>

                                            <li class="mr-1 <?= ($current_page == 'supervisor/dashboard') ? 'active' : '' ?>">
                                                <a href="<?= site_url('supervisor/dashboard'); ?>" class="btn-ctm-space <?= ($current_page == 'supervisor/dashboard') ? 'text-white' : 'text-dark' ?>">
                                                    <span class="lnr lnr-home pr-0 pr-lg-2"></span>
                                                    <span class="d-none d-lg-inline">Dashboard</span>
                                                </a>
                                            </li>

                                            <li class="mr-1 <?= ($current_page == 'supervisor/manage-trainees') ? 'active' : '' ?>">
                                                <a href="<?= site_url('supervisor/manage-trainees'); ?>" class="btn-ctm-space <?= ($current_page == 'supervisor/manage-trainees') ? 'text-white' : 'text-dark' ?>">
                                                    <span class="lnr lnr-users pr-0 pr-lg-2"></span>
                                                    <span class="d-none d-lg-inline">Manage Trainees</span>
                                                </a>
                                            </li>

                                            <li class="mr-1 <?= ($current_page == 'supervisor/request') ? 'active' : '' ?>">
                                                <a href="<?= site_url('supervisor/request'); ?>" class="btn-ctm-space <?= ($current_page == 'supervisor/request') ? 'text-white' : 'text-dark' ?>">
                                                    <span class="lnr lnr-sync pr-0 pr-lg-2"></span>
                                                    <span class="d-none d-lg-inline">Requests</span>
                                                </a>
                                            </li>
                                        <?php elseif ($this->session->userdata('RoleID') == 4) : ?>
                                            <?php $current_page = uri_string(); // Gets the current URI like 'hr/dashboard'
                                            ?>

                                            <li class="mr-1 <?= ($current_page == 'trainee/dashboard') ? 'active' : '' ?>">
                                                <a href="<?= site_url('trainee/dashboard'); ?>" class="btn-ctm-space <?= ($current_page == 'trainee/dashboard') ? 'text-white' : 'text-dark' ?>">
                                                    <span class="lnr lnr-home pr-0 pr-lg-2"></span>
                                                    <span class="d-none d-lg-inline">Dashboard</span>
                                                </a>
                                            </li>

                                            <li class="mr-1 <?= ($current_page == 'trainee/attendance-summary') ? 'active' : '' ?>">
                                                <a href="<?= site_url('trainee/attendance-summary'); ?>" class="btn-ctm-space <?= ($current_page == 'trainee/attendance-summary') ? 'text-white' : 'text-dark' ?>">
                                                    <span class="lnr lnr-calendar-full pr-0 pr-lg-2"></span>
                                                    <span class="d-none d-lg-inline">Attendance Summary</span>
                                                </a>
                                            </li>

                                            <li class="mr-1 <?= ($current_page == 'trainee/request') ? 'active' : '' ?>">
                                                <a href="<?= site_url('trainee/request'); ?>" class="btn-ctm-space <?= ($current_page == 'trainee/request') ? 'text-white' : 'text-dark' ?>">
                                                    <span class="lnr lnr-sync pr-0 pr-lg-2"></span>
                                                    <span class="d-none d-lg-inline">Requests</span>
                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li class="mr-1"><a class="text-dark btn-ctm-space " href="company.html"><span class="lnr lnr-apartment pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Company</span></a></li>
                                            <li class="mr-1"><a class="btn-ctm-space text-dark" href="calendar.html"><span class="lnr lnr-calendar-full pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Calendar</span></a></li>
                                            <li class="mr-1"><a class="btn-ctm-space text-dark" href="<?php echo site_url('hr/leave-approval'); ?>"><span class="lnr lnr-briefcase pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Leave</span></a></li>
                                            <li class="mr-1"><a class="text-dark btn-ctm-space" href="reviews.html"><span class="lnr lnr-star pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Reviews</span></a></li>
                                            <li class="mr-1"><a class="btn-ctm-space text-dark" href="reports.html"><span class="lnr lnr-rocket pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Reports</span></a></li>
                                            <li class="mr-1"><a class="btn-ctm-space text-dark" href="manage.html"><span class="lnr lnr-sync pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Manage</span></a></li>
                                            <li class="mr-1"><a class="btn-ctm-space text-dark" href="settings.html"><span class="lnr lnr-cog pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Settings</span></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Slide Nav -->

        </header>
        <!-- /Header -->