<div class="limiter">
    <div class="container-login100" style="background-image: url('<?= base_url("assets/login/") ?>images/silab.jpeg');">
        <div class="wrap-login100" style="width: 400px; margin-top: 50px">
            <?= $this->session->flashdata('registered'); ?>
            <br>
            <form class="login100-form validate-form" method="POST" action="<?= base_url('auth'); ?>">
                <span class="login100-form-logo">
                    <img src="<?= base_url() ?>assets/image/" alt="" style="width: 150px;">
                </span>

                <span class="login100-form-title p-b-34 p-t-27">
                    Log in
                </span>

                <div class="wrap-input100 validate-input" data-validate="Enter you Name">
                    <input class="input100" type="text" name="nama" placeholder="Username" id="nama" value="<?= set_value('nama'); ?>">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    <?= form_error('nama', '<small class="text-warning">', '</small>'); ?>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password" id="password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    <?= form_error('password', '<small class="text-warning">', '</small>'); ?>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-50">
                    <a class="txt1" href="#">
                        Forgot Password?
                    </a><br>
                    <a class="txt1" href="<?= base_url() ?>auth/registration">
                        Create an account?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>