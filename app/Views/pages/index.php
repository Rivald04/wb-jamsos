<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid banner">
    <div class="container text-center col-lg-10 wow" data-wow-delay="0.5s"">
    <!-- <h1 class=" display-5 animated slideInDown"><b>Selamat Datang di Website Data Jaminan Sosial DisnakerTrans</b></h1> -->
        <img class="logo-title animated slideInDown fadeIn" src="<?= base_url(); ?>/img/Logo.png" alt="">
        <h1 class="display-7 stroke animated slideInDown fadeIn">Selamat Datang Di Data Jaminan Sosial</h1>
        <h1 class="display-7 stroke animated slideInDown fadeIn">Dinas Ketenagakerjaan Dan Transmigrasi Provinsi Bengkulu</h1>
    </div>
</div>

<!-- Firm Visit Start -->
<div class="container-fluid bg-secondary bg-icon mb-5 mt-5 py-6">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-md-7 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-5 text-white mb-3">Tentang Jaminan Sosial</h1>
                <p class="text-white mb-0">Jaminan sosial adalah salah satu bentuk perlindungan sosial yang diselenggarakan oleh negara guna menjamin warga negaranya untuk memenuhi kebutuhan hidup dasar yang layak, sebagaimana dalam deklarasi PBB tentang HAM tahun 1948 dan konvensi ILO No.102 tahun 1952.</p>
            </div>
            <div class="col-md-5 text-md-end wow fadeIn" data-wow-delay="0.5s">
                <a class="btn btn-lg btn-dark rounded-pill py-3 px-5" href="#daftar">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</div>
<!-- Firm Visit End -->

<!-- Contact Start -->
<div id="daftar" class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Hubungi Kami</h1>
            <p>Kirim data diri anda ! dan daftar jaminan sosial sekarang juga !</p>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-5 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-secondary text-white d-flex flex-column justify-content-center h-100 p-5">
                    <h5 class="text-white">Telepon Kami</h5>
                    <p class="mb-5"><i class="fa fa-phone-alt me-3"></i>+0736-22823</p>
                    <h5 class="text-white">Email Kami</h5>
                    <p class="mb-5"><i class="fa fa-envelope me-3"></i>disnakertrans.provbkl@gmail.com</p>
                    <h5 class="text-white">Alamat Kantor</h5>
                    <p class="mb-5"><i class="fa fa-map-marker-alt me-3"></i>Jln.Pembangunan No.12 Padang Harapan Bengkulu</p>
                    <h5 class="text-white">Ikuti Kami</h5>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="https://twitter.com/disnakertranBKL/" target="blank"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="https://www.facebook.com/disnakertrans.provbengkulu" target="blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="https://www.instagram.com/disnakertransbkl/" target="blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<!-- Javascript -->
<!-- <script>
    $(document).ready(function() {
        $('.formPesan').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnkirim').attr('disable', 'disabled');
                    $('.btnkirim').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btnkirim').removeAttr('disable');
                    $('.btnkirim').html('Kirim Pesan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.n_perusahaan) {
                            $('#n_perusahaan').addClass('is-invalid');
                            $('.errorn_perusahaan').html(response.error.n_perusahaan);
                        } else {
                            $('#n_perusahaan').removeClass('is-invalid');
                            $('.errorn_perusahaan').html('');
                        }

                        if (response.error.no_hp) {
                            $('#no_hp').addClass('is-invalid');
                            $('.errorno_hp').html(response.error.no_hp);
                        } else {
                            $('#no_hp').removeClass('is-invalid');
                            $('.errorno_hp').html('');
                        }

                        if (response.error.subjek) {
                            $('#subjek').addClass('is-invalid');
                            $('.errorsubjek').html(response.error.subjek);
                        } else {
                            $('#subjek').removeClass('is-invalid');
                            $('.errorsubjek').html('');
                        }

                        if (response.error.isi_pesan) {
                            $('#isi_pesan').addClass('is-invalid');
                            $('.errorisi_pesan').html(response.error.isi_pesan);
                        } else {
                            $('#isi_pesan').removeClass('is-invalid');
                            $('.errorisi_pesan').html('');
                        }

                    } else {
                        alert(response.sukses);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
</script> -->
<?= $this->endSection(); ?>