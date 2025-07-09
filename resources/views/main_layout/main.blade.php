<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SI Inventory | {{ $title }}</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="<?= url('template'); ?>/assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= url('template'); ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= url('template'); ?>/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="<?= url('template'); ?>/assets/css/kaiadmin.min.css" />

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            @include('partials.sidebar')
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    @include('partials.header')
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    @include('partials.navbar')
                </nav>
                <!-- End Navbar -->
            </div>

            <!-- content main -->
            <div class="container">
               @yield('container')
            </div>

            <footer class="footer">
                @include('partials.footer')
            </footer>
        </div>

    </div>
    <!--   Core JS Files   -->
    <script src="<?= url('template'); ?>/assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="<?= url('template'); ?>/assets/js/core/popper.min.js"></script>
    <script src="<?= url('template'); ?>/assets/js/core/bootstrap.min.js"></script>
    <!-- jQuery Scrollbar -->
    <script src="<?= url('template'); ?>/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- jQuery Sparkline -->
    <script src="<?= url('template'); ?>/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
    <!-- Datatables -->
    <script src="<?= url('template'); ?>/assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Bootstrap Notify -->
    <script src="<?= url('template'); ?>/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
    <!-- jQuery Vector Maps -->
    <script src="<?= url('template'); ?>/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="<?= url('template'); ?>/assets/js/plugin/jsvectormap/world.js"></script>
    <!-- Sweet Alert -->
    <script src="<?= url('template'); ?>/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <!-- Kaiadmin JS -->
    <script src="<?= url('template'); ?>/assets/js/kaiadmin.min.js"></script>
    <!-- Fonts and icons -->
    <script src="<?= url('template'); ?>/assets/js/plugin/webfont/webfont.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["<?= url('template'); ?>/assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});
      })
    </script>

    @if ($pesan = Session::get('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ $pesan }}",
                icon: "success",
                confirmButtonColor: "#007BFF"
            });
        </script>          
    @endif

    <script>
        $('#editProfil').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget)
            let modal = $(this)

            let id = button.data('id')
            let nama = button.data('nama')
            let email = button.data('email')
            let gender = button.data('gender')
            let username = button.data('username')

            modal.find('#id').val(id)
            modal.find('#nama_user').val(nama)
            modal.find('#email').val(email)
            modal.find('#jenis_kelamin').val(gender)
            modal.find('#username').val(username)
        })
    </script>
   
</body>

</html>