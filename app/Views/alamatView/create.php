<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Tambah Data Alamat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Alamat</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-3"></div>
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url(); ?>/alamat/save" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_usaha">Nama Perusahaan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_usaha')) ? 'is-invalid' : ''; ?>" placeholder="Nama Perusahaan.." name="nama_usaha" id="nama_usaha" value="<?= old('nama_usaha'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_usaha'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputNamapic">Nama PIC Perusahaan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_pic')) ? 'is-invalid' : ''; ?>" placeholder="PIC.." name="nama_pic" id="nama_pic" value="<?= old('nama_pic'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_pic'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Perusahaan</label>
                                    <textarea class="form-control <?= ($validation->hasError('alamat_usaha')) ? 'is-invalid' : ''; ?>" rows="3" placeholder="Alamat.." name="alamat_usaha" id="alamat_usaha" value="<?= old('alamat_usaha'); ?>"></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_usaha'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telephone Perusahaan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control <?= ($validation->hasError('telp')) ? 'is-invalid' : ''; ?>" placeholder="0814xxxxxxxx" name="telp" id="telp" value="<?= old('telp'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('telp'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputNamapic">Google Maps Perusahaan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('koordinat_usaha')) ? 'is-invalid' : ''; ?>" placeholder="Google Maps Perusahaan.." name="koordinat_usaha" id="koordinat_usaha" value="<?= old('koordinat_usaha'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('koordinat_usaha'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fotoDepan">Upload Foto Depan Perusahaan (Max 2MB)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input <?= ($validation->hasError('fotoDepan')) ? 'is-invalid' : ''; ?>" id="fotoDepan" name="fotoDepan">
                                            <label class="custom-file-label" for="fotoDepan">Choose file</label>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('fotoDepan'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <div class="col-md-3">
                    <a class="btn btn-app" href="<?= base_url(); ?>/alamat/">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?= $this->endSection(); ?>