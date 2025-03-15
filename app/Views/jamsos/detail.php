<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container jamsos">
    <div class="row">
        <div class="col jamsos">
            <div class="card text-dark mb-3">
                <h1 style="text-align: center;"><b>Detail Data Jaminan Sosial</b></h1>
                <img src="/img/<?= $jamsos['image']; ?>" class="img-jamsos" alt="...">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td><b>Nama Perusahaan</b></td>
                            <td class="center">:</td>
                            <td><?= $jamsos['nama_perusahaan']; ?></td>
                        </tr>
                        <tr>
                            <td><b>NPP</b></td>
                            <td class="center">:</td>
                            <td><?= $jamsos['npp']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Pembina</b></td>
                            <td class="center">:</td>
                            <td><?= $jamsos['pembina']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Alamat</b></td>
                            <td class="center">:</td>
                            <td><?= $jamsos['alamat']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Asal Kabupaten/Kota</b></td>
                            <td class="center">:</td>
                            <td><?= $jamsos['asal_kabupaten']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Skala</b></td>
                            <td class="center">:</td>
                            <td><?= $jamsos['skala']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Program</b></td>
                            <td class="center">:</td>
                            <td><?= $jamsos['program']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Jumlah Tenaga Kerja Aktif</b></td>
                            <td class="center">:</td>
                            <td><?= $jamsos['jumlah_tk']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="<?= base_url('/jamsos'); ?>" class="btn btn-primary">Kembali Ke Daftar Data Jaminan Sosial</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>