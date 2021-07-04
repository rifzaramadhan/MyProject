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
                        <div class="swal" data-swal="<?= session()->get('Pesan'); ?>"></div>

                        <!-- HTTP Spoofing for Delete -->
                        <form action="<?= base_url(); ?>/alamat/delete" method="POST" class="d-inline" id="formDelete">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id_alamat" id="coba" value="">
                        </form>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Perusahaan</th>
                                        <th>PIC</th>
                                        <th>Koordinat</th>
                                        <th>
                                            <div style="text-align: center;">
                                                <button type="button" class="btn btn-success btn-flat" style="text-align:center;" onclick="document.location='<?= base_url(); ?>/alamat/create'">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($alamat as $a) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $a['nm_usaha']; ?></td>
                                            <td><?= $a['nm_alamat']; ?></span></td>
                                            <td><?= $a['koordinat']; ?></td>
                                            <td>
                                                <div class="btn-group" style="text-align: center;">
                                                    <button type="button" class="btn btn-info btn-flat" onclick="document.location='<?= base_url(); ?>/alamat/<?= $a['slug_nm_usaha']; ?>'"><i class="fas fa-search"></i></button>
                                                    <button type="button" class="btn btn-warning btn-flat" onclick="document.location='<?= base_url(); ?>/alamat/edit/<?= $a['slug_nm_usaha']; ?>'"><i class="fas fa-edit"></i></button>
                                                    <button type="submit" class="btn btn-danger btn-flat" onclick="sweetdelete('<?= $a['id_alamat']; ?>')"><i class="fas fa-trash-alt"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Perusahaan</th>
                                        <th>PIC</th>
                                        <th>Koordinat</th>
                                        <th>
                                            <div style="text-align: center;">
                                                <button type="button" class="btn btn-success btn-flat" style="text-align:center;" onclick="document.location='<?= base_url(); ?>/alamat/create'">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
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