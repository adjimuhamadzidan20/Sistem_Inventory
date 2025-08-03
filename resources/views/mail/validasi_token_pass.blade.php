<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="si_inventory">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>SI Inventory | Validasi Password</title>

    <link rel="icon" href="<?= url('template'); ?>/assets/img/kaiadmin/favicon.ico" type="image/x-icon" />
    <!-- Fontfaces CSS-->
    <link href="<?= url('template'); ?>/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= url('template'); ?>/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= url('template'); ?>/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= url('template'); ?>/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= url('template'); ?>/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= url('template'); ?>/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= url('template'); ?>/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= url('template'); ?>/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= url('template'); ?>/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="<?= url('template'); ?>/vendor/select2/select2.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= url('template'); ?>/css/theme.css" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="login-wrap">
                            <div class="login-content">
                                <div class="login-logo mb-3">
                                    <h6 class="text-secondary">VALIDASI PASSWORD</h6>
                                </div>
                                <div class="dropdown-divider mb-3"></div>
                                <div class="login-form">
                                    <form action="{{ route('validasi_proses') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Password Baru</label>
                                                    <input class="au-input au-input--full" type="text" name="password_baru" placeholder="Masukkan Password Baru Anda" value="{{ old('password_baru') }}">
                                                    @error('password_baru')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button class="au-btn au-btn--block btn-primary mt-2" type="submit">Selesai</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?= url('template'); ?>/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?= url('template'); ?>/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= url('template'); ?>/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS -->
    <script src="<?= url('template'); ?>/vendor/slick/slick.min.js">
    </script>
    <script src="<?= url('template'); ?>/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?= url('template'); ?>/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?= url('template'); ?>/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?= url('template'); ?>/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= url('template'); ?>/vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="<?= url('template'); ?>/js/main.js"></script>

</body>

</html>
<!-- end document-->