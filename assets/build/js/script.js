$(function () {

    // AJAX USER
    $('.tombolTambahUser').on('click', function () {

        $('#judulModal').html('Input Data User');
        $('.modal-footer button[type=submit]').html('Tambah Data');

        $('#id').val('');
        $('#nama').val('');
        $('#jabatan').val('');
        $('#old_pass').val('');
        $('#password').val('');

    });

    $('.modalUbahUser').on('click', function () {

        $('#judulModal').html('Update Data User');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/silab/Admin/saveUpdate_user');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/silab/Admin/update_user',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id_user);
                $('#nama').val(data.nama);
                $('#jabatan').val(data.jabatan);
                $('#old_pass').val(data.password);
                $('#password').val(data.password);
                if (data.jabatan == "Kepala Laboran") {
                    document.getElementById("kepalaLaboran").checked = true;
                } else {
                    document.getElementById("laboran").checked = true;
                }
            }
        });

    });
    // END AJAX USER

    // AJAX ASET
    $('.tombolTambahAset').on('click', function () {

        $('#judulModal').html('Input Data');
        $('.modal-footer button[type=submit]').html('Tambah Data');

        $('#id').val('');
        // $('#id_lokasi').val('');
        $('#barang').val('');
        $('#spesifikasi').val('');
        $('#jumlah').val('');
        $('#satuan').val('');
        $('#keterangan').val('');
        $('#foto').val('');

    });

    $('.modalUbahAset').on('click', function () {

        $('#judulModal').html('Update Data');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/silab/Admin/saveUpdate_aset');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/silab/Admin/update_aset',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.kode_aset);
                $('#id_lokasi').val(data.id_lokasi);
                $('#barang').val(data.nama_barang);
                $('#spesifikasi').val(data.spesifikasi);
                $('#jumlah').val(data.jumlah);
                $('#satuan').val(data.satuan);
                $('#keterangan').val(data.keterangan);
                $('#foto').val(data.foto);
            }
        });

    });
    // END AJAX ASET


    // AJAX LOKASI
    $('.tombolTambahLokasi').on('click', function () {

        $('#judulModal').html('Input Data Lokasi');
        $('.modal-footer button[type=submit]').html('Tambah Data');

        $('#id').val('');
        // $('#id_prodi').val('');
        $('#lab').val('');

    });

    $('.modalUbahLokasi').on('click', function () {

        $('#judulModal').html('Update Data Lokasi');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/silab/Admin/saveUpdate_lokasi');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/silab/Admin/update_lokasi',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id_lokasi);
                $('#id_prodi').val(data.id_prodi);
                $('#lab').val(data.nama_lab);
            }
        });

    });
    // END AJAX LOKASI

    // AJAX PRODI
    $('.tombolTambahProdi').on('click', function () {

        $('#judulModal').html('Input Data');
        $('.modal-footer button[type=submit]').html('Tambah Data');

        $('#id').val('');
        // $('#id_prodi').val('');
        $('#nama').val('');
        $('#jurusan').val('');
        $('#fakultas').val('');

    });

    $('.modalUbahProdi').on('click', function () {

        $('#judulModal').html('Update Data');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/silab/Admin/saveUpdate_prodi');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/silab/Admin/update_prodi',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id_prodi);
                $('#nama').val(data.nama_prodi);
                $('#jurusan').val(data.jurusan);
                $('#fakultas').val(data.fakultas);
            }
        });

    });
    // END AJAX PRODI

    // AJAX PELAPORAN
    $('.tombolTambahPelaporan').on('click', function () {

        $('#judulModal').html('Input Data');
        $('.modal-footer button[type=submit]').html('Tambah Data');

        $('#id').val('');
        // $('#id_pelaporan').val('');
        $('#nama_barang').val(1);
        $('#deskripsi').val('');
        $('#status').val('');
        $('#tanggapan').val('');

    });

    $('.modalUbahPelaporan').on('click', function () {

        $('#judulModal').html('Update Data');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/silab/Admin/saveUpdate_pelaporan');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/silab/Admin/update_pelaporan',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id_pelaporan);
                $('#nama_barang').val(data.kode_aset);
                $('#deskripsi').val(data.deskripsi_laporan);
                $('#status').val(data.status);
                $('#tanggapan').val(data.tanggapan);
            }
        });

    });

    $('.modalUbahTanggapan').on('click', function () {

        $('#judulModal').html('Tanggapan');
        $('.modal-footer button[type=submit]').html('Tanggapi');
        $('.modal-body form').attr('action', 'http://localhost/silab/Admin/saveUpdate_tanggapan');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/silab/Admin/update_tanggapan',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id_tanggapan').val(data.id_pelaporan);
                $('#tanggapan').val(data.tanggapan);
            }
        });

    });
    // END AJAX PELAPORAN


});