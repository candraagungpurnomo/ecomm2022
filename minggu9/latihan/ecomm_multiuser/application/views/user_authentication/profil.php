<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style type="text/css">
        /***
        User Profile Sidebar by @keenthemes
        A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
        Licensed under MIT
        ***/

        body {
        background: #F1F3FA;
        }

        /* Profile container */
        .profile {
        margin: 20px 0;
        }

        /* Profile sidebar */
        .profile-sidebar {
        padding: 20px 0 10px 0;
        background: #fff;
        }

        .profile-userpic img {
        float: none;
        margin: 0 auto;
        width: 50%;
        height: 50%;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
        }

        .profile-usertitle {
        text-align: center;
        margin-top: 20px;
        }

        .profile-usertitle-name {
        color: #5a7391;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 7px;
        }

        .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
        }

        .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
        }

        .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
        margin-right: 0px;
        }
            
        .profile-usermenu {
        margin-top: 30px;
        }

        .profile-usermenu ul li {
        border-bottom: 1px solid #f0f4f7;
        }

        .profile-usermenu ul li:last-child {
        border-bottom: none;
        }

        .profile-usermenu ul li a {
        color: #93a3b5;
        font-size: 14px;
        font-weight: 400;
        }

        .profile-usermenu ul li a i {
        margin-right: 8px;
        font-size: 14px;
        }

        .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
        }

        .profile-usermenu ul li.active {
        border-bottom: none;
        }

        .profile-usermenu ul li.active a {
        color: #5b9bd1;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        margin-left: -2px;
        }

        /* Profile Content */
        .profile-content {
        padding: 20px;
        background: #fff;
        min-height: 460px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="<?php echo $dataPengguna['photo']; ?>" class="img-responsive" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            <?php echo $dataPengguna['nama_depan'].' '.$dataPengguna['nama_belakang']; ?>
                        </div>
                        <div class="profile-usertitle-job">
                            Developer
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <button type="button" class="btn btn-success btn-sm">Follow</button>
                        <button type="button" class="btn btn-danger btn-sm">Message</button>
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">
                                <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                Overview </a>
                            </li>
                            <li>
                                <a href="#">
                                <i class="glyphicon glyphicon-user"></i>
                                Account Settings </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                <i class="glyphicon glyphicon-ok"></i>
                                Tasks </a>
                            </li>
                            <li>
                                <a href="#">
                                <i class="glyphicon glyphicon-flag"></i>
                                Help </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-content">
                <p>Logout from <a href="<?php echo base_url().'welcome/keluar'; ?>">here</a></p>
                </div>
            </div>
        </div>
    </div>
    <center>
    <strong>Powered by <a href="https://sharecodephp.com" target="_blank">sharecodephp</a></strong>
    </center>
</body>
</html>