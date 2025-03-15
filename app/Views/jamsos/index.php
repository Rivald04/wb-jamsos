<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Data Jaminan Sosial</h1>
    </div>
</div>
<!-- Page Header End -->

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?= base_url('/filter'); ?>" method="get">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Tahun</label>
                                    <select class="form-select" id="fetchval" name="fetchval">
                                        <option value="" disabled selected>Pilih Tahun...</option>
                                        <?php foreach ($tahun as $t) : ?>
                                            <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                        </div>
                        <div class="col-md-6">
                            <button type="submit" id="filter" class="btn btn-outline-info">Filter</button>
                            <button type="reset" id="reset" class="btn btn-outline-warning">Reset</button>
                        </div>
                        </form>
                    </div>
                    <table id="jamsos" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th class="center">No</th>
                                <th class="center">NPP</th>
                                <th>Nama Perusahaan</th>
                                <th class="center">Tahun</th>
                                <!-- <th class="center">Status</th> -->
                                <th class="center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($jamsos as $j => $value) : ?>
                                <tr>
                                    <th class="center"><?= $i++; ?></th>
                                    <td class="center"><?= $value->npp; ?></td>
                                    <td><?= $value->nama_perusahaan; ?></td>
                                    <td class="center"><?= $value->tahun; ?></td>
                                    <!-- <td class="center"></td> -->
                                    <td class="center">
                                        <a href="<?= base_url('/jamsos'); ?>/<?= $value->id_jamsos; ?>" class="btn btn-success">Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#jamsos').DataTable();
    });
</script>
<?= $this->endSection(); ?>