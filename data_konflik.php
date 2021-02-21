<div class="page-title">
    <div class="title_left">
        <h3>DATA KONFLIK</h3>
    </div>
</div>

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>DATA JENIS KONFLIK</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary tombolTambahUser" data-toggle="modal" data-target="#modalUser" style="float: right">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </button>
                    <br><br><br>
                    <div class="card-box table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('nama_jenis'); ?>"></div>
                            <?php if ($this->session->flashdata('nama_jenis')) : ?>
                            <?php endif; ?>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama Jenis Konflik</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($jenis as $val) { ?>
                                    <tr>
                                        <td>
                                            <center><?= $i; ?></center>
                                        </td>
                                        <td><?= $val['nama_jenis']; ?></td>
                                        <td>
                                            <center>
                                                <a href="" data-toggle="modal" data-target="#modalUser"><button type="button" name="ubah" class="btn btn-success btn-sm modalUbahJenis" data-id="<?= $val['id_jenis']; ?>"><i class="fa fa-pencil"></i></button></a>
                                                <!-- <a href="<?= site_url('Admin/update_jenis/' . $val['id_jenis']) ?>" data-toggle="modal" data-target="#modalUser" type="button" name="ubah" class="btn btn-success btn-sm modalUbahJenis" data-id="<?= $val['id_jenis']; ?>"><i class="fa fa-pencil"></i></a> -->
                                                <button href="<?= site_url('Admin/delete_konflik/' . $val['id_jenis']) ?>" type="button" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></button>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
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
<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Input Data</h5>
                <h5 class="modal-title">&ensp; Konflik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('Admin/save_konflik') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Jenis Konflik <font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="nama_jenis" id="nama_jenis" placeholder="Masukkan Jenis Konflik" required="required" />
                            <td><?php echo form_error('nama_jenis'); ?></td>
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