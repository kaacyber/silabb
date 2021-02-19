<!--===============================================================================================-->
<script src="<?= base_url("assets/login/") ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url("assets/login/") ?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url("assets/login/") ?>vendor/bootstrap/js/popper.js"></script>
<script src="<?= base_url("assets/login/") ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url("assets/login/") ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url("assets/login/") ?>vendor/daterangepicker/moment.min.js"></script>
<script src="<?= base_url("assets/login/") ?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url("assets/login/") ?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url("assets/login/") ?>js/main.js"></script>
</body>

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
</html>