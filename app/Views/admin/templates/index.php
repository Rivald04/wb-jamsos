<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- DataTables CSS -->
    <link type="text/css" rel="stylesheet" href="/asset/plugin/datatables.min.css">
    <!-- <link rel="stylesheet" href="/asset/plugin/DataTables/css/dataTables.bootstrap5.min.css"> -->
    <!-- My CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" href="<?= base_url() ?>/img/favicon.ico" type="image/gif">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->include('admin/templates/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('admin/templates/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Bootstrap core JavaScript-->
                <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
                <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

                <!-- Core plugin JavaScript-->
                <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

                <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
                <script type="text/javascript" src="/asset/plugin/datatables.min.js"></script>
                <script src="<?= base_url(); ?>/asset/sweetalert2/dist/sweetalert2.all.min.js"></script>
                <script>
                    function previewImg() {
                        const image = document.querySelector('#image');
                        const imageLabel = document.querySelector('.custom-file-label');
                        const imgPreview = document.querySelector('.img-preview');

                        imageLabel.textContent = image.files[0].name;

                        const fileImage = new FileReader();
                        fileImage.readAsDataURL(image.files[0]);

                        fileImage.onload = function(e) {
                            imgPreview.src = e.target.result;
                        }
                    }
                </script>

                <!-- Begin Page Content -->
                <?= $this->renderSection('content'); ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Dinas Ketenagakerjaan Dan Transmigrasi Provinsi Bengkulu <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda Ingin Logout ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" dibawah jika anda ingin keluar dari dashboard admin.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('a').each(function() {
                if ($(this).prop('href') == window.location.href) {
                    $(this).addClass('active');
                    $(this).parents('li').addClass('active');
                }
            });
        });
    </script>
</body>

</html>