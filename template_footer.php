<script type="text/javascript" src="<?= base_url("assets/js/core/app.js") ?>"></script>
<!-- jQuery -->
<script src="<?= base_url("assets/vendors/jquery/dist/jquery.min.js") ?>"></script>
<!-- Bootstrap -->
<script src="<?= base_url("assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js") ?>"></script>
<!-- FastClick -->
<script src="<?= base_url("assets/vendors/fastclick/lib/fastclick.js") ?>"></script>
<!-- NProgress -->
<script src="<?= base_url("assets/vendors/nprogress/nprogress.js") ?>"></script>
<!-- Chart.js -->
<script src="<?= base_url("assets/vendors/Chart.js/dist/Chart.min.js") ?>"></script>
<!-- gauge.js -->
<script src="<?= base_url("assets/vendors/gauge.js/dist/gauge.min.js") ?>"></script>
<!-- bootstrap-progressbar -->
<script src="<?= base_url("assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js") ?>"></script>
<!-- iCheck -->
<script src="<?= base_url("assets/vendors/iCheck/icheck.min.js") ?>"></script>
<!-- Skycons -->
<script src="<?= base_url("assets/vendors/skycons/skycons.js") ?>"></script>
<!-- Flot -->
<script src="<?= base_url("assets/vendors/Flot/jquery.flot.js") ?>"></script>
<script src="<?= base_url("assets/vendors/Flot/jquery.flot.pie.js") ?>"></script>
<script src="<?= base_url("assets/vendors/Flot/jquery.flot.time.js") ?>"></script>
<script src="<?= base_url("assets/vendors/Flot/jquery.flot.stack.js") ?>"></script>
<script src="<?= base_url("assets/vendors/Flot/jquery.flot.resize.js") ?>"></script>
<!-- Flot plugins -->
<script src="<?= base_url("assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js") ?>"></script>
<script src="<?= base_url("assets/vendors/flot-spline/js/jquery.flot.spline.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/flot.curvedlines/curvedLines.js") ?>"></script>
<!-- DateJS -->
<script src="<?= base_url("assets/vendors/DateJS/build/date.js") ?>"></script>
<!-- JQVMap -->
<script src="<?= base_url("assets/vendors/jqvmap/dist/jquery.vmap.js") ?>"></script>
<script src="<?= base_url("assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js") ?>"></script>
<script src="<?= base_url("assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js") ?>"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url("assets/vendors/moment/min/moment.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.js") ?>"></script>

<!-- jQuery custom content scroller -->
<script src="<?= base_url("assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js") ?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?= base_url("assets/build/js/custom.min.js") ?>"></script>

<!-- SweatAlert -->
<script language="JavaScript" type="text/javascript" src="<?= base_url("assets/build/js/dist/sweetalert2.all.min.js") ?>"></script>
<script language="JavaScript" type="text/javascript" src="<?= base_url("assets/build/js/dist/myscript.js") ?>"></script>

<script language="JavaScript" type="text/javascript" src="<?= base_url("assets/build/js/script.js") ?>"></script>


<!-- Datatables -->
<script src="<?= base_url("assets/vendors/datatables.net/js/jquery.dataTables.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-buttons/js/buttons.flash.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-buttons/js/buttons.html5.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-buttons/js/buttons.print.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/jszip/dist/jszip.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/pdfmake/build/pdfmake.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/pdfmake/build/vfs_fonts.js") ?>"></script>


<!-- autocomplete -->
<!-- <script src="<?= base_url("assets/build/js/jquery-3.5.1.js") ?>" type="text/javascript"></script> -->
<!-- <script src="<?= base_url("assets/build/jquery-ui-1.11.4/jquery-ui.js") ?>" type="text/javascript"></script> -->


<script>
    $('.modalUbahUser').on('click', function() {

        $('#judulModal').html('Update Data User');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/silab/Admin/saveUpdate_user');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/silab/Admin/update_user',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id_user').val(data.id_user);
                $('#nama').val(data.nama);
                $('#id_wilayah').val(data.id_wilayah);
                $('#username').val(data.username);
                $('#password').val(data.password);
                if (data.jabatan == "1") {
                    document.getElementById("1").checked = true;
                } else {
                    document.getElementById("2").checked = true;
                }
            }
        });

    });

$('.modalUbahJenis').on('click', function() {

$('#judulModal').html('Update Data Jenis');
$('.modal-footer button[type=submit]').html('Ubah Data');
$('.modal-body form').attr('action', 'http://localhost/silab/Admin/saveUpdate_jenis');

const id = $(this).data('id_jenis');

$.ajax({
    url: 'http://localhost/silab/Admin/update_jenis',
    data: {
        id: id_jenis
    },
    method: 'post',
    dataType: 'json',
    success: function(data) {
        $('#id_jenis').val(data.id_jenis);
        $('#nama_jenis').val(data.nama_jenis);
    }
});

});

    //  $('.modalUbahJenis').on('click', function() {

    //     $('#judulModal').html('Update Data Jenis');
    //     $('.modal-footer button[type=submit]').html('Ubah Data');
    //     $('.modal-body form').attr('action', <?= site_url('Admin/update_jenis')?>);

    //     const id = $(this).data('id_jenis');

    //     $.ajax({
    //         url: <?= site_url('Admin/saveUpdate_jenis')?>,
    //         data: {
    //             id: id_jenis
    //         },
    //         method: 'post',
    //         dataType: 'json',
    //         success: function(data) {
    //             $('#id_jenis').val(data.id_jenis);
    //             $('#nama_jenis').val(data.nama_jenis);
    //         }
    //     });

    // });

    $('.modalUbahLokasi').on('click', function() {

        $('#judulModal').html('Update Data');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/silab/Admin/saveUpdate_lokasi');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/silab/Admin/update_lokasi',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id_lokasi);
                $('#id_prodi').val(data.id_prodi);
                $('#lab').val(data.nama_lab);
            }
        });

    });

    $('.modalUbahProdi').on('click', function() {

        $('#judulModal').html('Update Data');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/silab/Admin/saveUpdate_prodi');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/silab/Admin/update_prodi',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id_prodi);
                $('#nama').val(data.nama_prodi);
                $('#jurusan').val(data.jurusan);
                $('#fakultas').val(data.fakultas);
            }
        });

    });

    $('.modalUbahPelaporan').on('click', function() {

        $('#judulModal').html('Update Data');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/silab/Admin/saveUpdate_pelaporan');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/silab/Admin/update_pelaporan',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id_pelaporan);
                $('#nama_barang').val(data.kode_aset);
                $('#deskripsi').val(data.deskripsi_laporan);
                $('#status').val(data.status);
                $('#tanggapan').val(data.tanggapan);
            }
        });

    });

    $('.modalUbahTanggapan').on('click', function() {

        $('#judulModal').html('Tanggapan');
        $('.modal-footer button[type=submit]').html('Tanggapi');
        $('.modal-body form').attr('action', 'http://localhost/silab/Admin/saveUpdate_tanggapan');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/silab/Admin/update_tanggapan',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id_tanggapan').val(data.id_pelaporan);
                $('#tanggapan').val(data.tanggapan);
            }
        });

    });

    $('.modalUbahAset').on('click', function() {

        $('#judulModal').html('Update Data');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/silab/Admin/saveUpdate_aset');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/silab/Admin/update_aset',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
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
</body>

</html>