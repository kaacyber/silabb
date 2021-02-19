<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>GRAFIK KONFLIK</h2>
            <div class="clearfix"></div>
        </div>
        <!-- <center><img src="<?= base_url('assets/image/') ?>" width="300px"></center> -->
    </div>
</div>

 

<!-- <div class="page-title">
    <div class="title_left">
        <h3>DATA ASET</h3>
    </div>
</div>

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>DATA ASET</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary tombolTambahAset" data-toggle="modal" data-target="#modalAset  " style="float: right">
                        <i class="fa fa-plus"></i>
                        Tambah Data Aset
                    </button>
                    <br><br><br>
                    <div class="card-box table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('aset'); ?>"></div>
                            <?php if ($this->session->flashdata('aset')) : ?>
                            <?php endif; ?>
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Lokasi</th>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Spesifikasi</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($aset as $val) { ?>
                                    <tr>
                                        <td>
                                            <center><?= $i; ?></center>
                                        </td>
                                        <td><?= $val['nama_lab']; ?></td>
                                        <td><?= $val['nama_barang']; ?></td>
                                        <td><?= $val['spesifikasi']; ?></td>
                                        <td>
                                            <center><?= $val['jumlah'] . ' ' . $val['satuan'];; ?><center>
                                        </td>
                                        <!-- <td><?= $val['satuan']; ?></td> -->
                                        <!-- <td>
                                            <center><?= $val['keterangan']; ?></center>
                                        </td>
                                        <td class="text-center">
                                            <figure img src="<?= base_url("upload/barang/" . $val['foto']) ?>" class="gal"><img src="<?= base_url("upload/barang/" . $val['foto']) ?>" alt="" width="50px"></figure>
                                        </td>
                                        <td>
                                            <center>
                                                <a data-toggle="modal" data-target="#modalAset"><button type="button" name="ubah" class="btn btn-success btn-sm modalUbahAset" data-id="<?= $val['kode_aset']; ?>"><i class="fa fa-pencil"></i></button></a>
                                                <a href="<?= site_url('Admin/delete_aset/' . $val['kode_aset']) ?>"><button href="<?= site_url('Admin/delete_aset/' . $val['kode_aset']) ?>" type="button" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></button></a>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  -->



<!-- Modal -->
<!-- <div class="modal fade" id="modalAset" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Input Data Aset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('Admin/save_aset') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 label-align">Lokasi Aset</label>
                        <div class="col-md col-sm ">
                            <select name="id_lokasi" id="id_lokasi" class="form-control">
                                <?php foreach ($lokasi as $val) { ?>
                                    <option value="<?= $val['id_lokasi']; ?>"><?= $val['nama_lab']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Barang <font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="barang" id="barang" placeholder="Masukkan barang" required="required" />
                            <td><?php echo form_error('barang'); ?></td>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Spesifikasi <font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <textarea name="spesifikasi" id="spesifikasi"></textarea>
                            <td><?php echo form_error('spesifikasi'); ?></td>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Jumlah <font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan jumlah" required="required" />
                            <td><?php echo form_error('jumlah'); ?></td>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Satuan <font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Masukkan satuan" required="required" />
                            <td><?php echo form_error('satuan'); ?></td>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Keterangan <font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan keterangan" required="required" />
                            <td><?php echo form_error('keterangan'); ?></td>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Foto</label>
                        <div class="col-md col-sm">
                            <input type="file" name="foto" id="foto" />
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
</div> -->