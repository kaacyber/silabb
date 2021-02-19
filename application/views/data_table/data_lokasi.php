<div class="page-title">
    <div class="title_left">
        <h3>DATA KONFLIK</h3>
    </div>
</div>

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>DATA KONFLIK PROVINSI</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary tombolTambahLokasi" data-toggle="modal" data-target="#modalLokasi  " style="float: right">
                        <i class="fa fa-plus"></i>
                        Tambah Data Konflik
                    </button>
                    <br><br><br>
                    <div class="card-box table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('lokasi'); ?>"></div>
                            <?php if ($this->session->flashdata('lokasi')) : ?>
                            <?php endif; ?>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Id Konflik</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Lokasi Konflik</th>
                                    <th class="text-center">Latitude</th>
                                    <th class="text-center">Longitude</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Jenis Konflik</th>
                                    <th class="text-center">Potensi Masalah</th>
                                    <th class="text-center">Uraian</th>
                                    <th class="text-center">Tindak Lanjut</th>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody> 
                                <?php $i = 1; ?>
                                <?php foreach ($lokasi as $val) { ?>
                                    <tr>
                                        <td>
                                            <center><?= $i++;; ?></center>
                                        </td>
                                        <td><?= $val['id_konflik']; ?></td>
                                        <td><?= $val['tahun']; ?></td>
                                        <td><?= $val['lokasi']; ?></td>
                                        <td><?= $val['latitude']; ?></td>
                                        <td><?= $val['longitude']; ?></td>
                                        <td><?= $val['tanggal']; ?></td>
                                        <td><?= $val['id_jenis']; ?></td>
                                        <td><?= $val['potensi_masalah']; ?></td>
                                        <td><?= $val['uraian']; ?></td>
                                        <td><?= $val['tindak_lanjut']; ?></td>
                                        <td><?= $val['foto']; ?></td>
                                        <td>
                                            <center>
                                                <a href="" data-toggle="modal" data-target="#modalLokasi"><button type="button" name="ubah" class="btn btn-success btn-sm modalUbahLokasi" data-id="<?= $val['id_konflik_provinsi']; ?>"><i class="fa fa-pencil"></i></button></a>
                                                <a href="<?= site_url('Admin/delete_lokasi/' . $val['id_konflik_provinsi']) ?>"><button href="<?= site_url('Admin/delete_lokasi/' . $val['id_konflik_provinsi']) ?>" type="button" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></button></a>
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
<div class="modal fade" id="modalLokasi" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Input Data</h5>
                <!-- <h5 class="modal-title">&ensp; Lokasi</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="<?= site_url('Admin/save_lokasi') ?>" method="POST" enctype="multipart/form-data">
                     <div class="row form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Tahun<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="number" class="form-control" name="tahun" id="datepicker" placeholder="Masukkan Tahun Konflik" required="required" />
                            <td><?php echo form_error('tahun'); ?></td>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Nama Provinsi<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <select class="form-control" name="id_provinsi" id="id_provinsi" required></select>
                            <td><?php echo form_error('id_provinsi'); ?></td>
                        </div>
                    </div>
                <div class="row form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Lokasi Konflik<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Masukkan Lokasi Konflik" required="required" />
                            <td><?php echo form_error('lokasi'); ?></td>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Latitude<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" required="required" />
                            <td><?php echo form_error('latitude'); ?></td>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Longitude<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" required="required" />
                            <td><?php echo form_error('longitude'); ?></td>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Tanggal<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" required="required" />
                            <td><?php echo form_error('tanggal'); ?></td>
                        </div>
                    </div>
                    <input type="hidden" id="id" name="id">
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3">Jenis Konflik<font color="red">*</font></label>
                        <div class="col-md col-sm ">
                            <select name="id_jenis" id="id_jenis" class="form-control">
                                <?php foreach ($jenis as $val) { ?>
                                    <option value="<?= $val['id_jenis']; ?>"><?= $val['nama_jenis']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Potensi Masalah<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="potensi_masalah" id="potensi_masalah" placeholder="Potensi Masalah" required="required" />
                            <td><?php echo form_error('potensi_masalah'); ?></td>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Uraian<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="uraian" id="uraian" placeholder="Uraian" required="required" />
                            <td><?php echo form_error('uraian'); ?></td>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Tindak Lanjut<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="tindak_lanjut" id="tindak_lanjut" placeholder="Tindak Lanjut" required="required" />
                            <td><?php echo form_error('tindak_lanjut'); ?></td>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-3 col-sm-3">Upolad Foto<font color="red">*</font></label>
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
</div>

<script>
    $("#id_provinsi").select2({
        minimumInputLength: 3,
        allowClear: true,
        placeholder: 'masukkan nama provinsi',
        ajax: {
            url: "<?php echo base_url(); ?>Admin/find_provinsi",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    provinsi: params.term // search term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    $("#datepicker").datepicker( {
    format: " yyyy",
    viewMode: "years", 
    minViewMode: "years"
});
</script>