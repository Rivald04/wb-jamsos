<?= $this->extend('/admin/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h1 class="mt-2">Daftar Data Tahun</h1>
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
                    <a href="<?= base_url() ?>/admin/tahun/create" class="mb-4 btn btn-primary tomboltambah">
                        <i class="fa fa-plus-circle"></i>
                        Tambah Data</a>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <table id="tahun" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th class="center">No</th>
                                <th class="center">Tahun</th>
                                <th class="center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($tahun as $t) : ?>
                                <tr>
                                    <th class="center"><?= $i++; ?></th>
                                    <td class="center"><?= $t['tahun'] ?></td>
                                    <td class="center">
                                        <form action="/admin/tahun/<?= $t['id_tahun']; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger delete">Hapus Data</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <!-- <tfoot>
                            <th style=" visibility:hidden;" class="hidden" scope="col">No</th>
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
        $('#tahun').DataTable();
    });
</script>
<script>
    $('.delete').click(function(e) {
        e.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Menghapus Data ?',
            text: "Kamu Akan Kehilangan Data Secara Permanen !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            } else {
                swal.fire("Cancelled", "Data Tidak Jadi Dihapus !", "error");
            }
        });
    });
</script>
<?= $this->endSection(); ?>