<div class="limiter">
    <div class="container-login100" style="background-image: url('<?= base_url("assets/login/") ?>images/silab.jpeg');">
        <div class="wrap-login100" style="width: 400px; margin-top: 50px">
            <form class="login100-form validate-form" method="POST" action="<?= base_url('auth/registration') ?>">
                <span class=" login100-form-logo">
                    <img src="<?= base_url() ?>assets/image/Undiksha.png" alt="" style="width: 150px;">
                </span>

                <span class="login100-form-title p-b-34 p-t-27">
                    Create an Account!
                </span>

                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    <input class="input100" type="text" name="nama" placeholder="Username" id="nama" value="<?= set_value('nama'); ?>">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    <?= form_error('name', '<small class="text-warning">', '</small>'); ?>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password1" placeholder="Password" id="password1">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    <?= form_error('password1', '<small class="text-warning">', '</small>'); ?>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password2" placeholder="Repeat Password" id="password2">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Register
                    </button>
                </div>

                <div class="text-center p-t-50">
                    <a class="txt1" href="#">
                        Forgot Password?
                    </a><br>
                    <a class="txt1" href="<?= base_url() ?>auth">
                        Already have an account? Login!
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>