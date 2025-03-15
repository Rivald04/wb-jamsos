<?= $this->extend('/admin/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="my-3"><?= $title; ?></h2>
                    <form action="<?= base_url() ?>/admin/profile/update/<?= user_id(); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="imageLama" value="<?= $users['user_image']; ?>">
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" value="<?= $users['email']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fullname" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" name="fullname" value="<?= (old('fullname')) ? old('fullname') : $users['fullname']; ?>">
                                <div id="validationServer05Feedback" class="invalid-feedback">
                                    <?= $validation->getError('fullname'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-2">
                                <img src="/img/<?= $users['user_image']; ?>" alt="..." class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" name="image" onchange="previewImg()">
                                    <div id="validationServer05Feedback" class="invalid-feedback">
                                        <?= $validation->getError('image'); ?>
                                    </div>
                                    <label class="custom-file-label" for="image"><?= $users['user_image']; ?></label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>