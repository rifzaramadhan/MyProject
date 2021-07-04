<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Alamat</h1>
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
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Alamat Perusahaan</h4>
                            <!-- <button type="button" class="btn btn-block btn-outline-success btn-flat" style="height:45px;width:85px;float:left">Tambah</button> -->
                        </div>

                        <!-- /.card-header -->
                        <!-- <div class="swal" data-swalk="<?= session()->get('Pesan'); ?>"></div> -->

                        <!-- HTTP Spoofing for Delete -->
                        <form action="<?= base_url(); ?>/alamat/delete" method="POST" class="d-inline" id="formDelete">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id_alamat" id="coba" value="">
                        </form>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="<?= base_url(); ?>/img/imgAlamat/<?= $alamat['foto_depan']; ?>" class="img-fluid">
                                </div>
                                <div class="col-lg-8">
                                    <div class="user-profile-name"><?= $alamat['nm_usaha']; ?></div>
                                    <div class="user-send-message">
                                        <button class="btn btn-primary btn-addon" type="button">
                                            <i class="ti-email"></i>Send Message</button>
                                        <button class="btn btn-success" type="button" style="float: right;" onclick="document.location='<?= base_url(); ?>/alamat/'">Back</button>


                                    </div>
                                    <div class="custom-tab user-profile-tab">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#1" aria-controls="1" role="tab" data-toggle="tab">Detail</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="1">
                                                <div class="contact-information">
                                                    <h4>Information</h4>
                                                    <div class="phone-content">
                                                        <span class="contact-title">PIC</span>
                                                        <span class="phone-number"><?= $alamat['nm_alamat']; ?></span>
                                                    </div>
                                                    <div class="address-content">
                                                        <span class="contact-title">Alamat</span>
                                                        <span class="mail-address"><?= $alamat['dt_alamat']; ?></span>
                                                    </div>
                                                    <div class="email-content">
                                                        <span class="contact-title">Telephone</span>
                                                        <span class="contact-email"><?= $alamat['no_telp']; ?></span>
                                                    </div>
                                                    <div class="website-content">
                                                        <span class="contact-title">Koordinat</span>
                                                        <span class="contact-website"><?= $alamat['koordinat']; ?></span>
                                                    </div>
                                                    <a href="<?= base_url(); ?>/alamat/edit/<?= $alamat['slug_nm_usaha']; ?>" class="btn btn-info m-b-0 m-l-5">Edit</a>
                                                    <button type="submit" class="btn btn-danger" onclick="sweetdelete('<?= $alamat['id_alamat']; ?>')">Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>