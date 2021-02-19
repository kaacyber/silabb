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
                        Tambah Data User
                    </button>
                    <br><br><br>
                    <div class="card-box table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('konflik'); ?>"></div>
                            <?php if ($this->session->flashdata('konflik')) : ?>
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
                                <?php foreach ($user as $val) { ?>
                                    <tr>
                                        <td>
                                            <center><?= $i; ?></center>
                                        </td>
                                        <td><?= $val['nama_jenis']; ?></td>
                                        <td>
                                            <center>
                                                <a href="" data-toggle="modal" data-target="#modalUser"><button type="button" name="ubah" class="btn btn-success btn-sm modalUbahUser" data-id="<?= $val['id_jenis']; ?>"><i class="fa fa-pencil"></i></button></a>
                                                <a href="<?= site_url('Admin/delete_user/' . $val['id_jenis']) ?>"><button href="<?= site_url('Admin/delete_user/' . $val['id_jenis']) ?>" type="button" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></button></a>
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
                <h5 class="modal-title">&ensp; User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('Admin/save_user') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Name <font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama User" required="required" />
                            <td><?php echo form_error('nama'); ?></td>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Wilayah <font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="wilayah" id="wilayah" placeholder="Masukkan wilayah" required="required" />
                            <td><?php echo form_error('id_wilayah'); ?></td>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Username <font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="username" id="usernae" placeholder="Masukkan nama User" required="required" />
                            <td><?php echo form_error('usernae'); ?></td>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Jabatan <font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <!-- <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Masukkan jabatan User" required="required" /> -->
                            <input type="radio" name="jabatan" id="kepalaLaboran" value="Kepala Laboran" /> Super Admin<br>
                            <input type="radio" name="jabatan" id="laboran" value="Laboran" /> Admin Prov <br>
                            <input type="radio" name="jabatan" id="laboran" value="Laboran" /> Admin Kab <br>
                            <input type="radio" name="jabatan" id="laboran" value="Laboran" /> Admin Kec <br>
                            <td><?php echo form_error('id_role'); ?></td>
                        </div>
                    </div>
                    <input type="hidden" name="old_pass" id="old_pass">
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Password <font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input class="form-control" type="password" name="password" id="password" data-validate-length="6,8" required='required' placeholder="Enter Password" /></div>
                        <td><?php echo form_error('password'); ?></td>
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