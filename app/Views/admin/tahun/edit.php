<?= $this->extend('/admin/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="my-3"><?= $title; ?></h2>
                    <form action="<?= base_url() ?>/admin/tahun/update" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" id="tahun" name="tahun" autofocus value="<?= (old('tahun')) ? old('tahun') : $tahun['tahun']; ?>">
                                <div id="validationServer05Feedback" class="invalid-feedback">
                                    <?= $validation->getError('tahun'); ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>