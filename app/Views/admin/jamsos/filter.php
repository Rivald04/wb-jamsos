<?= $this->extend('/admin/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h1 class="mt-2">Daftar Data Jaminan Sosial</h1>
            <!-- <select id="tahun" class="form-select form-select-sm tahun" aria-label=".form-select-sm example">
                <option selected>Pilih Tahun</option>
                <//?php foreach ($tahun as $t) : ?>
                    <option><//?= $t['tahun']; ?></option>
                <//?php endforeach; ?>
            </select> -->
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?= base_url('/admin/jamsos/filter'); ?>" method="get">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Tahun</label>
                                    <select class="form-select" id="fetchval" name="fetchval">
                                        <option value="" disabled selected><?= $filter; ?></option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <a href="<?= base_url('/admin/jamsos'); ?>" id="reset" class="btn btn-outline-warning">Back</a>
                        </div>
                    </div>

                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <table id="jamsos" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th class="center">No</th>
                                <th class="center">NPP</th>
                                <th>Nama Perusahaan</th>
                                <th class="center">Data Tahun</th>
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
                                    <td class="center">
                                        <a href="<?= base_url('/admin/jamsos'); ?>/<?= $value->id_jamsos; ?>" class="btn btn-success">Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <!-- <tfoot>
                            <th style="visibility:hidden;" class="hidden" scope="col">No</th>
                            <th style="visibility:hidden;" class="center" scope="col">NPP</th>
                            <th style="visibility:hidden;" scope="col">Nama Perusahaan</th>
                            <th class="center" scope="col">Data Tahun</th>
                            <th style="visibility:hidden;" class="center" scope="col">Aksi</th>
                        </tfoot> -->
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