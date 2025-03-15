<?= $this->extend('/admin/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="my-3"><?= $title; ?></h2>
                    <form action="<?= base_url() ?>/admin/jamsos/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="npp" class="col-sm-2 col-form-label">NPP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('npp')) ? 'is-invalid' : ''; ?>" id="npp" name="npp" autofocus value="<?= old('npp'); ?>">
                                <div id="validationServer05Feedback" class="invalid-feedback">
                                    <?= $validation->getError('npp'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama_perusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nama_perusahaan')) ? 'is-invalid' : ''; ?>" id="nama_perusahaan" name="nama_perusahaan" value="<?= old('nama_perusahaan'); ?>">
                                <div id="validationServer05Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nama_perusahaan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pembina" class="col-sm-2 col-form-label">Pembina</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('pembina')) ? 'is-invalid' : ''; ?>" id="pembina" name="pembina" value="<?= old('pembina'); ?>">
                                <div id="validationServer05Feedback" class="invalid-feedback">
                                    <?= $validation->getError('pembina'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" rows="4"><?= old('alamat'); ?></textarea>
                                <div id="validationServer05Feedback" class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="asal_kabupaten" class="col-sm-2 col-form-label">Asal Kabupaten/Kota</label>
                            <div class="col-sm-10">
                                <select class="form-select <?= ($validation->hasError('asal_kabupaten')) ? 'is-invalid' : ''; ?>" id="asal_kabupaten" name="asal_kabupaten" value="<?= old('asal_kabupaten'); ?>" required>
                                    <option value="" hidden>Pilih...</option>
                                    <option value="KOTA BENGKULU">KOTA BENGKULU</option>
                                    <option value="REJANG LEBONG">REJANG LEBONG</option>
                                    <option value="BENGKULU SELATAN">BENGKULU SELATAN</option>
                                    <option value="BENGKULU TENGAH">BENGKULU TENGAH</option>
                                    <option value="BENGKULU UTARA">BENGKULU UTARA</option>
                                    <option value="KAUR">KAUR</option>
                                    <option value="KEPAHIANG">KEPAHIANG</option>
                                    <option value="LEBONG">LEBONG</option>
                                    <option value="MUKO - MUKO">MUKO - MUKO</option>
                                    <option value="SELUMA">SELUMA</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="skala" class="col-sm-2 col-form-label">Skala</label>
                            <div class="col-sm-10">
                                <select class="form-select <?= ($validation->hasError('skala')) ? 'is-invalid' : ''; ?>" id="skala" name="skala" value="<?= old('skala'); ?>" required>
                                    <option value="" hidden>Pilih...</option>
                                    <option value="Mi">Mi</option>
                                    <option value="K">K</option>
                                    <option value="Mn">Mn</option>
                                    <option value="B">B</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="program" class="col-sm-2 col-form-label">Program</label>
                            <div class="col-sm-10">
                                <select class="form-select <?= ($validation->hasError('program')) ? 'is-invalid' : ''; ?>" id="program" name="program" value="<?= old('program'); ?>" required>
                                    <option value="" hidden>Pilih...</option>
                                    <option value="2P">2P</option>
                                    <option value="3P">3P</option>
                                    <option value="4P">4P</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jumlah_tk" class="col-sm-2 col-form-label">Jumlah Tenaga Kerja</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control <?= ($validation->hasError('jumlah_tk')) ? 'is-invalid' : ''; ?>" id="jumlah_tk" name="jumlah_tk" value="<?= old('jumlah_tk'); ?>">
                                <div id="validationServer05Feedback" class="invalid-feedback">
                                    <?= $validation->getError('jumlah_tk'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="id_tahun" required>
                                    <option value="" hidden>Pilih...</option>
                                    <?php foreach ($tahun as $t) : ?>
                                        <option value="<?= $t['id_tahun']; ?>"><?= $t['tahun']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-2">
                                <img src="/img/Jdefault.jpg" alt="..." class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" name="image" onchange="previewImg()">
                                    <div id="validationServer05Feedback" class="invalid-feedback">
                                        <?= $validation->getError('image'); ?>
                                    </div>
                                    <label class="custom-file-label" for="image">Jdefault.jpg</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>