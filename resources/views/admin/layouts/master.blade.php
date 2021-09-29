<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ventic.dexignzone.com/xhtml/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Sep 2021 05:22:16 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ventic : Ticketing Admin Template" />
    <meta property="og:title" content="Ventic : Ticketing Admin Template" />
    <meta property="og:description" content="Ventic : Ticketing Admin Template" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Admin Panel</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="<?= url('/') ?>/images/favicon.png" />

    <link rel="stylesheet" href="<?= url('/') ?>/vendor/chartist/css/chartist.min.css">
    <link href="<?= url('/') ?>/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?= url('/') ?>/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="<?= url('/') ?>/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Style css -->
    <link href="<?= url('/') ?>/css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--text"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="<?= url('/') ?>/index-2.html" class="brand-logo">
                <div class="brand-title">APP </div>
                <svg class="logo-abbr" width="54" height="54" viewBox="0 0 54 54" fill="none">
                    <rect class="svg-logo-rect" width="54" height="54" rx="14" fill="#0E8A74" />
                    <path class="svg-logo-path" d="M13 17H24.016L31.802 34.544L38.33 17H40.948L31.972 40.8H23.54L13 17Z"
                        fill="white" />
                </svg>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->


        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="input-group search-area d-xl-inline-flex d-none">
                                <button class="input-group-text"><i
                                        class="flaticon-381-search-2 text-primary"></i></button>
                                <input type="text" class="form-control" placeholder="Search here...">
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="<?= url('/') ?>/javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <div class="header-info me-3">
                                        <span class="fs-16 font-w600 ">Nurfadillah</span>
                                        <small class="text-end fs-14 font-w400">Super Admin</small>
                                    </div>
                                    <img src="<?= url('/') ?>/images/profile/pic1.jpg" width="20" alt="" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="<?= url('/') ?>/app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                            width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ms-2">Profile </span>
                                    </a>
                                    <a href="<?= url('/') ?>/page-error-404.html" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                            width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <span style="margin-left: 30px;">Master</span>
                    <li><a href="{{route('getDashboard')}}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-013-checkmark"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li><a href="{{route('getKriteria')}}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-013-checkmark"></i>
                            <span class="nav-text">Kriteria</span>
                        </a>
                    </li>
                    <li><a href="{{route('getSubKriteria')}}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-013-checkmark"></i>
                            <span class="nav-text">Sub Kritera</span>
                        </a>
                    </li>
                    <li><a href="{{route('getAlternatif')}}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-013-checkmark"></i>
                            <span class="nav-text">Alternatif</span>
                        </a>
                    </li>
                    <span style="margin-left: 30px;">Perhitungan</span>
                    <li><a href="{{route('getMetodeSaw')}}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-013-checkmark"></i>
                            <span class="nav-text">Metode SAW</span>
                        </a>
                    </li>
                    <li><a href="{{route('getMetodeVikor')}}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-013-checkmark"></i>
                            <span class="nav-text">Metode VIKOR</span>
                        </a>
                    </li>
                    <li><a href="{{route('getHasil')}}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-013-checkmark"></i>
                            <span class="nav-text">Hasil</span>
                        </a>
                    </li>
                </ul>
                <div class="copyright">
                    <p><strong>Craft With Love</strong> © 2021 All Rights Reserved</p>
                    <p class="fs-12">Made with <span class="heart"></span> by Nurfadillah</p>
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        @yield('content')
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">

            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="<?= url('/') ?>/https://dexignzone.com/"
                        target="_blank">Nurfadillah</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= url('/') ?>/vendor/global/global.min.js"></script>
    <script src="<?= url('/') ?>/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="<?= url('/') ?>/vendor/bootstrap-datetimepicker/js/moment.js"></script>
    <script src="<?= url('/') ?>/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?= url('/') ?>/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <!-- Chart piety plugin files -->
    <script src="<?= url('/') ?>/vendor/peity/jquery.peity.min.js"></script>

    <!-- Datatable -->
    <script src="<?= url('/') ?>/./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= url('/') ?>/./js/plugins-init/datatables.init.js"></script>

    <!-- Apex Chart -->
    <script src="<?= url('/') ?>/vendor/apexchart/apexchart.js"></script>

    <script src="<?= url('/') ?>/vendor/flot/jquery.flot.js"></script>
    <script src="<?= url('/') ?>/vendor/flot/jquery.flot.pie.js"></script>
    <script src="<?= url('/') ?>/vendor/flot/jquery.flot.resize.js"></script>
    <script src="<?= url('/') ?>/vendor/flot-spline/jquery.flot.spline.min.js"></script>
    <script src="<?= url('/') ?>/js/plugins-init/flot-init.js"></script>

    <!-- Dashboard 1 -->
    <script src="<?= url('/') ?>/js/dashboard/dashboard-1.js"></script>

    <script src="<?= url('/') ?>/js/custom.min.js"></script>
    <script src="<?= url('/') ?>/js/deznav-init.js"></script>
    <script src="<?= url('/') ?>/js/demo.js"></script>
    <script src="<?= url('/') ?>/js/styleSwitcher.js" ></script>
    @yield('javascript')
</body>

<!-- Mirrored from ventic.dexignzone.com/xhtml/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Sep 2021 05:22:38 GMT -->

</html>
