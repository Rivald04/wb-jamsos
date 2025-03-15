<?= $this->extend('/admin/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h1 class="mt-2">Daftar Data User</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="<?= base_url() ?>/admin/users/create" class="mb-4 btn btn-primary tomboltambah">
                        <i class="fa fa-plus-circle"></i>
                        Tambah Data</a>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <table id="user" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th class="center">No</th>
                                <th class="center">Nama</th>
                                <th class="center">Username</th>
                                <th class="center">Email</th>
                                <th class="center">Role</th>
                                <th class="center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($users as $u) : ?>
                                <tr>
                                    <td class="center"><?= $i++; ?></th>
                                    <td class="center"><?= $u['fullname']; ?></td>
                                    <td class="center"><?= $u['username']; ?></td>
                                    <td class="center"><?= $u['email']; ?></td>
                                    <td class="center"><?= $u['group_name']; ?></td>
                                    <td class="center">
                                        <a href="/admin/users/edit/<?= $u['id']; ?>" class="btn btn-warning">Edit</a>
                                        <form action="/admin/users/<?= $u['id']; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger delete">Hapus</button>
                                        </form>
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
        $('#user').DataTable();
    });
</script>
<script>
    $('.delete').click(function(e) {
        e.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Menghapus Data Akun ?',
            text: "Kamu Akan Kehilangan Akun Secara Permanen !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            } else {
                swal.fire("Cancelled", "Akun Tidak Jadi Dihapus !", "error");
            }
        });
    });
</script>
<?= $this->endSection(); ?>