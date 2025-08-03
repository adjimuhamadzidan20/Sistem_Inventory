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
    <title>SI Inventory | Register</title>

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
                                    <a href="{{ route('register') }}" class="mb-2">
                                       <h3 class="text-secondary">SI INVENTORY</h3>
                                    </a>
                                    <h6 class="text-secondary">REGISTER ACCOUNT</h6>
                                </div>
                                <div class="dropdown-divider mb-3"></div>
                                <div class="login-form">
                                    <form action="{{ route('register_proses') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Nama Anda</label>
                                                    <input class="au-input au-input--full" type="text" name="nama" placeholder="Masukkan Nama Anda" value="{{ old('nama') }}">
                                                    @error('nama')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Masukkan Email Anda" value="{{ old('email') }}">
                                                    @error('email')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <select class="form-control" name="jenis_kelamin">
                                                        <option value="" selected>-- Pilih Jenis Kelamin --</option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                    @error('jenis_kelamin')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Masukkan Username" value="{{ old('username') }}">
                                                    @error('username')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Masukkan Password">
                                                    @error('password')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button class="au-btn au-btn--block btn-primary mt-2" type="submit">Register</button>
                                    </form>
                                    <div class="register-link">
                                        <p>
                                            Do you have account?
                                            <a href="{{ route('login') }}" class="text-primary">Log in Here</a>
                                        </p>
                                    </div>
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