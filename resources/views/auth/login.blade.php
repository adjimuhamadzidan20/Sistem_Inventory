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
    <title>SI Inventory | Login</title>
    
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

    <!-- Main CSS-->
    <link href="<?= url('template'); ?>/css/theme.css" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo mb-3">
                            <a href="{{ route('login') }}" class="mb-2">
                               <h3 class="text-secondary">SI INVENTORY</h3>
                            </a>
                            <h6 class="text-secondary">LOGIN ADMIN</h6>
                        </div>
                        <div class="dropdown-divider mb-3"></div>
                        <div class="login-form">
                            <form action="{{ route('login_proses') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                                    @error('username')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="{{ route('forgot') }}" class="text-primary">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block btn-primary mt-2" type="submit">Login</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="{{ route('register') }}" class="text-primary">Register Here</a>
                                </p>
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
    <script src="<?= url('template'); ?>/vendor/slick/slick.min.js"></script>
    <script src="<?= url('template'); ?>/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?= url('template'); ?>/vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="<?= url('template'); ?>/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Main JS-->
    <script src="<?= url('template'); ?>/js/main.js"></script>

    @if ($pesan = Session::get('failed'))
        <script>
            Swal.fire({
                title: "Gagal login!",
                text: "{{ $pesan }}",
                icon: "error",
                confirmButtonColor: "#007BFF"
            });
        </script>          
    @endif

    @if ($pesan = Session::get('success'))
        <script>
            Swal.fire({
                title: "Register User!",
                text: "{{ $pesan }}",
                icon: "success",
                confirmButtonColor: "#007BFF"
            });
        </script>          
    @endif

    @if ($pesan = Session::get('success_validation'))
        <script>
            Swal.fire({
                title: "Validasi Password!",
                text: "{{ $pesan }}",
                icon: "success",
                confirmButtonColor: "#007BFF"
            });
        </script>          
    @endif

    @if ($pesan = Session::get('failed_validation'))
        <script>
            Swal.fire({
                title: "Validasi Password!",
                text: "{{ $pesan }}",
                icon: "error",
                confirmButtonColor: "#007BFF"
            });
        </script>          
    @endif
    
</body>

</html>
<!-- end document-->