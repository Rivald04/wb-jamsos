<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt me-2"></i>Jln.Pembangunan No.12 Padang Harapan Bengkulu</small>
            <small class="ms-4"><i class="fa fa-envelope me-2"></i>disnakertrans.provbkl@gmail.com</small>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Follow us:</small>
            <a class="text-body ms-3" href="https://www.facebook.com/disnakertrans.provbengkulu" target="blank"><i class="fab fa-facebook-f"></i></a>
            <a class="text-body ms-3" href="https://twitter.com/disnakertranBKL/" target="blank"><i class="fab fa-twitter"></i></a>
            <a class="text-body ms-3" href="https://www.instagram.com/disnakertransbkl/"><i class="fab fa-instagram" target="blank"></i></a>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('/'); ?>">Sistem Informasi Data Jaminan Sosial</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">>
                <ul class="navbar-nav bg-dark ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" <?= base_url('/jamsos'); ?>">Data Jamsos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" <?= base_url('/about'); ?>">About DisnakerTrans</a>
                    </li>
                </ul>
                <?php if (isset(user()->username)) : ?>
                    <ul class="navbar-nav bg-dark">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle ms-auto mb-2 mb-lg-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= user()->username; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= base_url('/admin/dashboard'); ?>">Dashboard Admin</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('logout'); ?>">Logout</a></li>
                            </ul>
                        </li>
                    </ul>

                <?php else : ?>
                    <a class="link-light btn btn-outline-secondary" href="<?= base_url('/login'); ?>">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->