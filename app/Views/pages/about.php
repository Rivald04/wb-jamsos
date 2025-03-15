<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Tentang DisnakerTrans</h1>
    </div>
</div>
<!-- Page Header End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container jamsos    ">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="<?= base_url('../img/disnaker.jpg'); ?>">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="display-5 mb-4">Tentang DisnakerTrans</h1>
                <p class="mb-4">Disnakertrans provinsi Bengkulu adalah dinas yang memiliki kewenangan dibidang pembinaan dan penempatan tenaga kerja juga perlindungan tenaga kerja pada wilayah provinsi Bengkulu.Tugas utama Disnakertrans adalah sebagai instansi pemerintah bidang tenaga kerja dan transmigrasi pada daerah wilayah kerjanya. </p>
                <p><i class="fa fa-check text-primary me-3"></i>Izin Operasional Perusahaan Penyedia Jasa Pekerja/Buruh.</p>
                <p><i class="fa fa-check text-primary me-3"></i>Kartu dan Izin Ketenagakerjaan.</p>
                <p><i class="fa fa-check text-primary me-3"></i>Izin kerja, hingga Izin Lembaga Pelatihan Kerja (LPK)</p>
                <a class="btn btn-secondary rounded-pill py-3 px-5 mt-3" href="https://nakertrans.bengkuluprov.go.id/" target="blank">Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Google Map Start -->
<div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
    <h3 class="display-10 mb-3">Lokasi Dinas Ketenagakerjaan Dan Transmigrasi Provinsi Bengkulu</h3>
</div>
<div class="container-xxl mb-4 px-0 wow fadeIn" data-wow-delay="0.1s" style="margin-bottom: -6px;">
    <iframe class="w-100" style="height: 450px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15923.865759007142!2d102.287561!3d-3.8173253!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb9a99c4b9a699527!2sDinas%20Tenaga%20Kerja%20dan%20Transmigrasi%20Prov%20Bengkulu!5e0!3m2!1sid!2sid!4v1652262739237!5m2!1sid!2sid" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<!-- Google Map End -->
<?= $this->endSection(); ?>