<div class="page-title">
    <div class="title_left">
        <h3>DATA PROGRAM STUDI</h3>
    </div>
</div>

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>DATA PROGRAM STUDI</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary tombolTambahProdi" data-toggle="modal" data-target="#modalProdi  " style="float: right">
                        <i class="fa fa-plus"></i>
                        Tambah Data Prodi
                    </button>
                    <br><br><br>
                    <div class="card-box table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('prodi'); ?>"></div>
                            <?php if ($this->session->flashdata('prodi')) : ?>
                            <?php endif; ?>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama Prodi</th>
                                    <th class="text-center">Jurusan</th>
                                    <th class="text-center">Fakultas</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($prodi as $val) { ?>
                                    <tr>
                                        <td>
                                            <center><?= $i++; ?></center>
                                        </td>
                                        <td><?= $val['nama_prodi']; ?></td>
                                        <td><?= $val['jurusan']; ?></td>
                                        <td><?= $val['fakultas']; ?></td>
                                        <td>
                                            <center>
                                                <a href="" data-toggle="modal" data-target="#modalProdi    "><button type="button" name="ubah" class="btn btn-success btn-sm modalUbahProdi" data-id="<?= $val['id_prodi']; ?>"><i class="fa fa-pencil"></i></button></a>
                                                <a href="<?= site_url('Admin/delete_prodi/' . $val['id_prodi']) ?>"><button href="<?= site_url('Admin/delete_prodi/' . $val['id_prodi']) ?>" type="button" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></button></a>
                                            </center>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalProdi" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Input Data</h5>
                <h5 class="modal-title">&ensp; Prodi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('Admin/save_prodi') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="row form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Nama Prodi<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama prodi" required="required" />
                            <td><?php echo form_error('prodi'); ?></td>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Jurusan<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Masukkan jurusan" required="required" />
                            <td><?php echo form_error('jurusan'); ?></td>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Fakultas<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="fakultas" id="fakultas" placeholder="Masukkan fakultas" required="required" />
                            <td><?php echo form_error('fakultas'); ?></td>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>