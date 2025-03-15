<?= $this->extend('/admin/templates/index'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $title; ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>Edit User
                </div>
                <div class="card-body">
                    <!-- Form Data -->
                    <form action="<?= base_url() ?>/admin/users/update/<?= $users['id']; ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $users['id']; ?>">
                        <div class="mb-3 row">
                            <label for="fullname" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" name="fullname" value="<?= (old('fullname')) ? old('fullname') : $users['fullname']; ?>">
                                <div id="validationServer05Feedback" class="invalid-feedback">
                                    <?= $validation->getError('fullname'); ?>
                                </div>
                            </div>
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" value="<?= (old('email')) ? old('email') : $users['email']; ?>">
                                <div id="validationServer05Feedback" class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" value="<?= (old('username')) ? old('username') : $users['username']; ?>">
                                <div id="validationServer05Feedback" class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                            </div>
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" value="<?= (old('password')) ? old('password') : $users['password_hash']; ?>">
                                <div id="validationServer05Feedback" class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="role" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="role" required>
                                    <option value="" hidden>Pilih Role...</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Pegawai">Pegawai </option>
                                </select>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" type="submit">Simpan</button>
                            <button class="btn btn-danger" type="reset">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection(); ?>