<?= $this->extend('admin/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col md-6">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Welcome Back ! <?= user()->username; ?></h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-sm-3 col-12 ml-2">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <img class="mr-3" src="<?= base_url(); ?>/img/dataJ.png" alt="gambar" style="width:50px">
                        </div>
                        <div class="media-body ms-auto">
                            <h3 class="text-info"><?= $hitungjamsos; ?></h3>
                            <span>Jumlah Data Jaminan Sosial</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-3 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <img class="mr-3" src="<?= base_url(); ?>/img/dataT.png" alt="gambar" style="width:50px">
                        </div>
                        <div class="media-body ms-auto">
                            <h3 class="text-warning"><?= $hitungtahun; ?></h3>
                            <span>Jumlah Data Tahun</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (in_groups('Admin')) : ?>
        <div class="col-xl-3 col-sm-3 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <img class="mr-3" src="<?= base_url(); ?>/img/dataU.png" alt="gambar" style="width:50px">
                            </div>
                            <div class="media-body ms-auto">
                                <h3 class="text-success"><?= $hitungusers; ?></h3>
                                <span>Jumlah Data User</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php endif; ?>

<div class="row mb-1 mt-4">
    <div class="col-sm-8 ml-2 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="card-title">Data Jamsos</h4>
                    <h6 class="text-secondary mb-4">5 Data Jaminan Sosial Terbaru</h6>
                </div>
                <div class="table-responsive mb-2">
                    <table id="dataJamsos" class="table table-striped" style="width: 100%">
                        <thead class="table-dark">
                            <tr>
                                <th class="center">No</th>
                                <th>Nama Perusahaan</th>
                                <th class="center">Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($jamsos as $j) : ?>
                                <tr>
                                    <td class="center"><?= $i++; ?></td>
                                    <td><?= $j['nama_perusahaan']; ?></td>
                                    <td class="center"><?= $j['tahun']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot style="text-align:center">
                            <tr>
                                <th>--</th>
                                <th></th>
                                <th>--</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Tahun</h4>
                <h6 class="text-secondary mb-4">5 Data Tahun Terbaru</h6>
                <?php $i = 1; ?>
                <?php foreach ($tahun as $t) : ?>
                    <div class="mt-2 pb-3 d-flex align-items-center">
                        <span class="btn btn-secondary btn-circle d-flex align-items-center">
                            <i class="ms-1 text-light"><?= $i++; ?></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold"><?= $t['tahun']; ?></h5>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-success text-light">Baru</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php if (in_groups('Admin')) : ?>
    <div class="row mb-4">
        <div class="col-sm-11 mr-2 ml-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Users</h4>
                    <h6 class="text-secondary mb-4">5 Data Users Terbaru</h6>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $u) : ?>
                        <div class="mt-2 pb-3 d-flex align-items-center">
                            <span class="btn btn-secondary btn-circle d-flex align-items-center">
                                <i class="ms-1 text-light"><?= $i++; ?></i>
                            </span>
                            <div class="ms-3">
                                <h5 class="mb-0 fw-bold"><?= $u['fullname']; ?></h5>
                                <span class="text-muted fs-6"><?= $u['email']; ?></span>
                            </div>
                            <div class="ms-auto">
                                <span class="badge bg-success text-light">Baru</span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?= $this->endSection(); ?>