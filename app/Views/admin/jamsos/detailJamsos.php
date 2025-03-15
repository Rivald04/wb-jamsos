<?= $this->extend('admin/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card text-black mb-3">
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
            <a href="/admin/jamsos" class="btn btn-primary">Kembali Ke Daftar Data Jaminan Sosial</a>
            <a href="/admin/jamsos/edit/<?= $jamsos['id_jamsos']; ?>" class="btn btn-warning">Edit Data</a>
            <form action="/admin/jamsos/<?= $jamsos['id_jamsos']; ?>" method="post" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger delete">Hapus Data</button>
            </form>
        </div>
    </div>
</div>
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