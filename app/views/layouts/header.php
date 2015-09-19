<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?= $app_title ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?= base_url('assets/css/metisMenu.min.css') ?>" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="<?= base_url() ?>assets/css/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?= base_url() ?>assets/css/dataTables.responsive.css" rel="stylesheet">

        <!-- Bootstrap 3 Datepicker -->
        <link href="<?= base_url() ?>assets/css/bootstrap-datetimepicker.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= base_url() ?>assets/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>


        <div id="wrapper">

            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url('home') ?>">Moataz TODO List</a>

                </div>


                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?= base_url('users/profile') ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
<!--                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>-->
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url('users/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>


                </ul>
                <div class="navbar-default sidebar" role="navigation">

                    <div class="sidebar-nav navbar-collapse">

                        <ul class="nav" id="side-menu">

                            <li class="active">
                                <a href="#"><i class="fa fa-magic fa-fw"></i>TODOs<span class="fa arrow"></span></a>

                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url('todos') ?>">Pending TODOs</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('todos/Done_TODOs') ?>">Done TODOs</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('todos/Voided_TODOs') ?>">Voided TODOs</a>
                                    </li>

                                </ul>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-th-category fa-fw"></i>Categories<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url('categories') ?>">Show Categories</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('categories/add_new_category') ?>">Add Category</a>
                                    </li>

                                </ul>
                            </li>




                            <li>
                                <a href="#"><i class="fa fa-info fa-fw"></i>App<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url('home/about')?>">About</a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://github.com/resist2b/newtodo_category">github</a>
                                    </li>

                                </ul>

                            </li>


                            <?php if (($this->session->userdata('is_admin'))): ?>
                                <li>
                                    <a href="#"><i class="fa fa-user fa-fw"></i>Users<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="<?= base_url() ?>users/">Show users</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url() ?>users/add_new_user">Add User</a>
                                        </li>

                                    </ul>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>