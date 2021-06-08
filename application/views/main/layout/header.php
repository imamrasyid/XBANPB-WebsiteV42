<!DOCTYPE html>
<html>
    
<head>
<title><?php echo $title ?></title>

<!-- Responsive -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="[DEV] EyeTracker">
<meta name="description" content="Latest Private Server Development On 2020, FPS Genre & Old Style, Updated UI, New Feature, And Much More. So, What are you waiting for? Lets Play immediately and Get Your Rewards!. BRING YOUR NOSTALGIC MOMENT BACK!">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!-- Stylesheets -->
<link href="<?php echo base_url() ?>base/gamon/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url() ?>base/gamon/css/style.css" rel="stylesheet">
<link href="<?php echo base_url() ?>base/gamon/css/responsive.css" rel="stylesheet">
<link href="<?php echo base_url() ?>base/gamon/css/custom.css" rel="stylesheet">

<script src="<?php echo base_url() ?>base/gamon/js/jquery.js"></script>
<script defer src="<?php echo base_url() ?>base/gamon/vendor/fontawesome-free/js/all.js"></script>
<script defer src="<?php echo base_url() ?>base/gamon/vendor/fontawesome-free/js/v4-shims.js"></script>

<link rel="shortcut icon" href="<?php echo base_url() ?>base/gamon/images/favicon.png" type="image/x-icon">
<link rel="icon" href="<?php echo base_url() ?>base/gamon/images/favicon.png" type="image/x-icon">
</head>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"><div class="icon"></div></div>

    <!-- Main Header -->
    <header class="main-header">
        <!-- Header Top -->
        <div class="header-top">
            <div class="auto-container clearfix">

                <div class="top-left clearfix">
                    <ul class="info-list">
                    </ul>
                </div>

                <div class="top-right">
                    <ul class="social-icons">
                    </ul>
                </div>
            </div>
        </div>

        <!-- Header Upper -->
        <div class="header-upper">
            <div class="inner-container">
                <div class="auto-container clearfix">
                    <!--Logo-->
                    <div class="logo-outer">
                        <div class="logo"><a href="<?php echo base_url('home') ?>"><img src="<?php echo base_url() ?>base/gamon/images/weblogo.png" alt="" style="max-width: 160px;"></a></div>
                    </div>

                    <!--Nav Box-->
                    <div class="nav-outer clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><span class="icon flaticon-menu-1"></span></div>

                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix pull-left">
                                    <li class="<?php if ($title == "XBAN Origin || Home"){echo 'current';} ?>"><a href="<?php echo base_url() ?>">Home</a></li>
									<li class="<?php if ($title == "XBAN Origin || Players Rank" || $title == "XBAN Origin || Clans Rank"){echo 'current';} ?> dropdown"><a href="javascript:void(0)">Rank</a>
                                        <ul>
                                            <li><a href="<?php echo base_url('players_rank') ?>">Players Rank</a></li>
                                            <li><a href="<?php echo base_url('clans_rank') ?>">Clans Rank</a></li>
                                        </ul>
                                    </li>
                                    <li class="<?php if ($title == "XBAN Origin || Download"){echo 'current';} ?>"><a href="<?php echo base_url('download') ?>">Download</a></li>
                                </ul>
                                <ul class="navigation pull-right clearfix">
                                    <li class="<?php if ($title == "XBAN Origin || Recharge"){echo 'current';} ?>"><a href="<?php echo base_url('recharge') ?>">Recharge</a></li>
                                    <li class="">
                                        <a href="javascript:void(0)" title="Coming Soon!">Featured</a>
                                    </li>
                                    <?php if (empty($_SESSION['uid'])) : ?>
                                        <li class="<?php if ($title == "XBAN Origin || Login" || $title == "XBAN Origin || Register"){echo 'current';} ?> dropdown"><a href="javascript:void(0)">Login</a>
                                            <ul>
                                                <li><a href="<?php echo base_url('register') ?>">Register</a></li>
                                                <li><a href="<?php echo base_url('login') ?>">Login</a></li>
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($_SESSION['uid'])) : ?>
                                        <li class="dropdown <?php if ($title == "XBAN Origin || Player Panel" || $title == "XBAN Origin || Change Password" || $title == "XBAN Origin || Change Email" || $title == "XBAN Origin || Exchange Cash" || $title == "XBAN Origin || Redeem Code" || $title == "XBAN Origin || Create Hint"){echo 'current';} ?>"><a href="javascript:void(0)">User Area</a>
                                            <ul>
                                                <?php if ($_SESSION['access_level'] >= 3) : ?>
                                                    <li><a href="<?php echo base_url('404') ?>">Administrator Panel</a></li>
                                                <?php endif; ?>
                                                <li><a href="<?php echo base_url('playerpanel') ?>">Player Panel</a></li>
                                                <li><a href="<?php echo base_url('playerpanel/redeemcode') ?>">Redeem Code</a></li>
                                                <li><a href="javascript:void(0)" title="Coming Soon!">Inventory</a></li>
                                                <li><a href="<?php echo base_url('home/logout') ?>">Logout</a></li>
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <div class="logo pull-left">
                    <a href="<?php echo base_url('home') ?>" title=""><img src="<?php echo base_url() ?>base/gamon/images/logo.png" alt="" title=""></a>
                </div>
                <div class="pull-right">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
            </div>
        </div>

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-close"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="<?php echo base_url('home') ?>"><img src="<?php echo base_url() ?>base/gamon/images/logo.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
				<!--Social Links-->
				<div class="social-links">
                </div>
            </nav>
        </div><!-- End Mobile Menu -->
    </header>
    <!-- End Main Header -->