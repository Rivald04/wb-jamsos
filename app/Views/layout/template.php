<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- DataTables CSS -->
    <link type="text/css" rel="stylesheet" href="/asset/plugin/datatables.min.css">
    <!-- <link rel="stylesheet" href="/asset/plugin/DataTables/css/dataTables.bootstrap5.min.css"> -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url(); ?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/foody-style.css">
    <link rel="icon" href="<?= base_url() ?>/img/favicon.ico" type="image/gif">

    <title><?= $title; ?></title>
</head>

<body>
    <?= $this->include('layout/navbar'); ?>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/lib/wow/wow.min.js"></script>
    <script src="<?= base_url(); ?>/lib/easing/easing.min.js"></script>
    <script src="<?= base_url(); ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url(); ?>/lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url(); ?>/js/main.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/asset/plugin/datatables.min.js"></script>

    <?= $this->renderSection('content'); ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left">

                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Website Jamsos Bengkulu</h5>
                    <p>
                        Selamat datang di Website Dinas Jaminan Sosial Provinsi Bengkulu, Website ini dimaksudkan sebagai sarana publikasi untuk memberikan Informasi mengenai layanan jaminan sosial di Dinas Ketenagakerjaan dan Transmigrasi Provinsi Bengkulu.
                    </p>
                    <p>
                        Melalui keberadaan website ini kiranya masyarakat dapat mengetahui seluruh informasi tentang jaminan sosial di Dinas Ketenagakerjaan dan Transmigrasi.
                    </p>

                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact Us</h5>
                    <p>
                        <i class="fas fa-location-dot mr-3"></i> Jln.Pembangunan No.12 Padang Harapan Bengkulu
                    </p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> <a href="">disnakertrans.provbkl@gmail.com</a>
                    </p>
                    <p>
                        <i class="fas fa-phone mr-3"></i> 0736-22823
                    </p>
                    <p>
                        <i class="fas fa-print mr-3"></i> 0736-21082
                    </p>
                </div>

                <hr class="mb-4">
                <div class="row align-items-center">
                    <div class="col-md-7 col-lg-8">
                        <p>
                            Copyright @<?= date('Y'); ?> All rights reserved by:
                            <a href="https://nakertrans.bengkuluprov.go.id/" style="text-decoration: none;" target="blank">
                                <strong class="text-warning">Dinas Ketenagakerjaan Dan Transmigrasi Provinsi Bengkulu</strong>
                            </a>
                        </p>
                    </div>

                    <div class="col-md-5 col-lg-4">
                        <div class="text-center text-md-right">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                    <a href="https://www.facebook.com/disnakertrans.provbengkulu" class="btn-floating btn-sm text-white" style="font-size: 23px;" target="blank">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://twitter.com/disnakertranBKL/" class="btn-floating btn-sm text-white" style="font-size: 23px;" target="blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.instagram.com/disnakertransbkl/" class="btn-floating btn-sm text-white" style="font-size: 23px;" target="blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <!-- <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="/asset/plugin/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="/asset/plugin/DataTables/js/dataTables.bootstrap5.min.js"></script> -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-secondary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
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