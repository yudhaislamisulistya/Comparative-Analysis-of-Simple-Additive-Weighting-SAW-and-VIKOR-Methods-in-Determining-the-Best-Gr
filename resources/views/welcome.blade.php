<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from ventic.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Sep 2021 05:23:23 GMT -->
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Ventic : Ticketing Admin Template" />
	<meta property="og:title" content="Ventic : Ticketing Admin Template" />
	<meta property="og:description" content="Ventic : Ticketing Admin Template" />
	<meta property="og:image" content=""/>
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Login</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="<?= url('/') ?>/images/favicon.png" />
    <link href="<?= url('/') ?>/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Analisis Perbandingan Metode Simple Additive Weighting (SAW) dan VIKOR pada Penetapan Wisudawan Terbaik</h4>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    @if (Session::has('status'))
                                        @if (Session::get('status') == "gagal")
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                <strong>Error!</strong> Data Login Tidak Valid.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                                </button>
                                            </div>
                                        @endif
                                    @endif
                                    <form action="{{route('postLogin')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" placeholder="email@admin.com">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>`
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= url('/') ?>/vendor/global/global.min.js"></script>
    <script src="<?= url('/') ?>/js/custom.min.js"></script>
    <script src="<?= url('/') ?>/js/deznav-init.js"></script>
	<script src="<?= url('/') ?>/js/styleSwitcher.js"></script>
</body>

<!-- Mirrored from ventic.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Sep 2021 05:23:23 GMT -->
</html>
